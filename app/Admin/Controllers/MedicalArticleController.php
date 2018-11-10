<?php

namespace App\Admin\Controllers;

use App\Doctor;
use App\MedicalArticle;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\HasResourceActions;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Layout\Content;
use Encore\Admin\Show;

class MedicalArticleController extends Controller
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
        $grid = new Grid(new MedicalArticle);

        $grid->name('Name');
        $grid->doctor('Doctor')->name();

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
        $show = new Show(MedicalArticle::findOrFail($id));

        $show->name_az('Name az');
        $show->name_en('Name en');
        $show->name_ru('Name ru');
        $show->link('Link')->file();
        $show->doctor_id('Doctor')->as(function ($id){
            $doctor = Doctor::findOrFail($id);
            return $doctor->name;
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
        $form = new Form(new MedicalArticle);

        $form->text('name_az', 'Name az')->rules("required|string|max:191");
        $form->text('name_en', 'Name en')->rules("required|string|max:191");
        $form->text('name_ru', 'Name ru')->rules("required|string|max:191");
        $form->file('link', 'File')->uniqueName()
            ->move('files/medical_articles')->rules('required|file');
        $form->select('doctor_id', 'Doctor')->options(function (){
            return Doctor::all()->pluck('full_name_az', 'id');
        });

        return $form;
    }
}
