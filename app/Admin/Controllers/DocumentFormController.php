<?php

namespace App\Admin\Controllers;

use App\DocumentForm;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\HasResourceActions;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Layout\Content;
use Encore\Admin\Show;

class DocumentFormController extends Controller
{
    use HasResourceActions;

    /**
     * Index interface.
     *
     * @param Content $content
     * @return Content
     */

    private $options = ['medical' => 'Tibbi', 'administrative' => 'Inzibati'];

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
        $grid = new Grid(new DocumentForm);
        $options = ['medical' => 'Tibbi', 'administrative' => 'Inzibati'];

        $grid->type('Type')->display(function ($type) use ($options){
            return $options[$type];
        });
        $grid->name('Name');

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
        $show = new Show(DocumentForm::findOrFail($id));

        $options = ['medical' => 'Tibbi', 'administrative' => 'Inzibati'];

        $show->type('Type')->as(function($type) use ($options){
            return $options[$type];
        });
        $show->name_az('Name az');
        $show->name_en('Name en');
        $show->name_ru('Name ru');
        $show->link('File')->file();

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new DocumentForm);

        $form->select('type', 'Type')->options($this->options);
        $form->text('name_az', 'Name az')->rules('required|string|max:191');
        $form->text('name_en', 'Name en')->rules('required|string|max:191');
        $form->text('name_ru', 'Name ru')->rules('required|string|max:191');
        $form->file('link', 'File')->uniqueName()->move("files/document_forms");

        return $form;
    }
}
