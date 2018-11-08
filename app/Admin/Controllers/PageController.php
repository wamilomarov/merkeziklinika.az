<?php

namespace App\Admin\Controllers;

use App\Page;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\HasResourceActions;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Layout\Content;
use Encore\Admin\Show;

class PageController extends Controller
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
        $grid = new Grid(new Page);

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
        $show = new Show(Page::findOrFail($id));

        $show->slug('Slug');
        $show->name_az('Name az');
        $show->name_en('Name en');
        $show->name_ru('Name ru');
        $show->type('Type');
        $show->group('Group');
        $show->parent_id('Parent id')->as(function ($parent_id){
            $parent = Page::findOrFail($parent_id);
            return $parent->name;
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
        $form = new Form(new Page);

        $form->tab('Page', function (Form $form){
            $form->text('slug', 'Slug')->rules('required|string|max:191');
            $form->text('name_az', 'Name az')->rules('required|string|max:191');
            $form->text('name_en', 'Name en')->rules('required|string|max:191');
            $form->text('name_ru', 'Name ru')->rules('required|string|max:191');
            $form->text('type', 'Type')->rules('required|string|max:191');
            $form->text('group', 'Group')->rules('required|string|max:191');
            $form->editor('text_az', 'Text az')->rules('required|string');
            $form->editor('text_en', 'Text en')->rules('required|string');
            $form->editor('text_ru', 'Text ru')->rules('required|string');
            $form->select('parent_id', 'Parent id')
                ->options(Page::all()->pluck('name_az', 'id'));
        })->tab('Slides', function (Form $form){
            $form->hasMany('slides', function (Form\NestedForm $nestedForm){
                $nestedForm->image('photo_url', 'Slide Photo')
                    ->uniqueName()->move('images/pages_slides')
                    ->rules('required|image|max:2048|mimetypes:image/png,image/jpg,image/jpeg|mimes:jpg,jpeg,png');
            });
        });


        return $form;
    }
}
