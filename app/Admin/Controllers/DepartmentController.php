<?php

namespace App\Admin\Controllers;

use App\Department;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\HasResourceActions;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Layout\Content;
use Encore\Admin\Show;

class DepartmentController extends Controller
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
        $grid = new Grid(new Department);

        $grid->name('Adı');

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
        $show = new Show(Department::findOrFail($id));

        $show->name_az('Adı az');
        $show->name_en('Adı en');
        $show->name_ru('Adı ru');
        $show->information_az('Mətn az');
        $show->information_en('Mətn en');
        $show->information_ru('Mətn ru');

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Department);

        $form->text('name_az', 'Adı az')->rules('required|string|max:255');
        $form->text('name_en', 'Adı en')->rules('required|string|max:255');
        $form->text('name_ru', 'Adı ru')->rules('required|string|max:255');
        $form->editor('information_az', 'Mətn az')->rules('required|string|max:500');
        $form->editor('information_en', 'Mətn en')->rules('required|string|max:500');
        $form->editor('information_ru', 'Mətn ru')->rules('required|string|max:500');

        return $form;
    }
}
