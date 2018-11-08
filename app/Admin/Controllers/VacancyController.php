<?php

namespace App\Admin\Controllers;

use App\Branch;
use App\Vacancy;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\HasResourceActions;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Layout\Content;
use Encore\Admin\Show;

class VacancyController extends Controller
{
    use HasResourceActions;

    /**
     * Index interface.
     *
     * @param Content $content
     * @return Content
     */
    public function index(Content $content)
    {
        return $content
            ->header('Index')
            ->description('description')
            ->body($this->grid());
    }

    /**
     * Show interface.
     *
     * @param mixed $id
     * @param Content $content
     * @return Content
     */
    public function show($id, Content $content)
    {
        return $content
            ->header('Detail')
            ->description('description')
            ->body($this->detail($id));
    }

    /**
     * Edit interface.
     *
     * @param mixed $id
     * @param Content $content
     * @return Content
     */
    public function edit($id, Content $content)
    {
        return $content
            ->header('Edit')
            ->description('description')
            ->body($this->form()->edit($id));
    }

    /**
     * Create interface.
     *
     * @param Content $content
     * @return Content
     */
    public function create(Content $content)
    {
        return $content
            ->header('Create')
            ->description('description')
            ->body($this->form());
    }

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Vacancy);

        $grid->position('Position');
        $grid->branch_id('Branch')->display(function ($branch_id){
            $branch = Branch::findOrFail($branch_id);

            return $branch->name;
        });

        return $grid;
    }

    /**
     * Make a show builder.
     *
     * @param mixed $id
     * @return Show
     */
    protected function detail($id)
    {
        $show = new Show(Vacancy::findOrFail($id));

        $show->position_az('Position az');
        $show->position_en('Position en');
        $show->position_ru('Position ru');
        $show->branch_id('Branch')->as(function ($branch_id){
            $branch = Branch::findOrFail($branch_id);

            return $branch->name;
        });

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Vacancy);

        $form->text('position_az', 'Position az')->rules('required|string|max:191');
        $form->text('position_en', 'Position en')->rules('required|string|max:191');
        $form->text('position_ru', 'Position ru')->rules('required|string|max:191');
        $form->select('branch_id', 'Branch')->options(Branch::all()->pluck('name_az', 'id'));

        return $form;
    }
}
