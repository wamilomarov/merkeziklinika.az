<?php

namespace App\Admin\Controllers;

use App\Department;
use App\Question;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\HasResourceActions;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Layout\Content;
use Encore\Admin\Show;

class QuestionController extends Controller
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
        $grid = new Grid(new Question);
        $grid->model()->orderBy('id', 'desc');

        $grid->disableCreateButton();

        $grid->name('Name');
        $grid->department('Department')->name();
        $grid->seen('Seen')->display(function ($seen){
            return $seen == false ? "<i class='fa fa-clock-o'></i>" : "<i class='fa fa-check' style='color: green;'></i>";
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
        $show = new Show(Question::findOrFail($id));

        $show->name('Name');
        $show->phone('Phone');
        $show->email('Email');
        $show->question('Question');
        $show->department_id('Department')->as(function ($department_id){
            $department = Department::findOrFail($department_id);
            return $department->name;
        });
        $show->seen('Seen')->using([false => 'No', true => 'Yes']);
        $show->answer('Cavab');
        $show->created_at('Created at');

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Question);

        $form->textarea('answer', 'Cavab')->rules("required|string");

        $form->saved(function (Form $form){
            $form->model()->seen = true;
            $form->model()->save();
        });

        return $form;
    }
}
