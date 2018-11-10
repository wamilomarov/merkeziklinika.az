<?php

namespace App\Admin\Controllers;

use App\ContactFormMessage;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\HasResourceActions;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Layout\Content;
use Encore\Admin\Show;

class ContactFormMessageController extends Controller
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
        $grid = new Grid(new ContactFormMessage);
        $grid->model()->orderBy('id', 'desc');
        $grid->disableCreateButton();

        $grid->name('Name');
        $grid->email('Email');
        $grid->topic('Topic');
        $grid->seen('Seen')->display(function ($seen){
            return $seen == false ? "<i class='fa fa-clock-o'></i>" : "<i class='fa fa-check' style='color: green;'></i>";
        });

        $grid->actions(function (Grid\Displayers\Actions $actions){
            $actions->disableEdit();
            $actions->disableDelete();
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
        $show = new Show(ContactFormMessage::findOrFail($id));

        $show->name('Name');
        $show->email('Email');
        $show->topic('Topic');
        $show->message('Message');
        $show->created_at('Created at');

        if ($show->getModel()->seen == false)
        {
            $show->getModel()->seen = true;
            $show->getModel()->save();
        }

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new ContactFormMessage);

        $form->text('name', 'Name');
        $form->email('email', 'Email');
        $form->text('topic', 'Topic');
        $form->text('message', 'Message');
        $form->switch('seen', 'Seen');

        return $form;
    }
}
