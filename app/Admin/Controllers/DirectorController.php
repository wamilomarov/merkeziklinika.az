<?php

namespace App\Admin\Controllers;

use App\Director;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\HasResourceActions;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Layout\Content;
use Encore\Admin\Show;

class DirectorController extends Controller
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
        $grid = new Grid(new Director);

        $grid->position('Position');
        $grid->full_name('Full name');
        $grid->title('Title');

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
        $show = new Show(Director::findOrFail($id));

        $show->photo('Photo')->image();
        $show->position_az('Position az');
        $show->position_en('Position en');
        $show->position_ru('Position ru');
        $show->full_name_az('Full name az');
        $show->full_name_en('Full name en');
        $show->full_name_ru('Full name ru');
        $show->title_az('Title az');
        $show->title_en('Title en');
        $show->title_ru('Title ru');

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Director);

        $form->image('photo_url', 'Photo url')
            ->uniqueName()->move('images/directors')
            ->rules('required|image|max:2048|mimetypes:image/png,image/jpg,image/jpeg|mimes:jpg,jpeg,png');
        $form->text('position_az', 'Position az')->rules('required|string|max:191');
        $form->text('position_en', 'Position en')->rules('required|string|max:191');
        $form->text('position_ru', 'Position ru')->rules('required|string|max:191');
        $form->text('full_name_az', 'Full name az')->rules('required|string|max:191');
        $form->text('full_name_en', 'Full name en')->rules('required|string|max:191');
        $form->text('full_name_ru', 'Full name ru')->rules('required|string|max:191');
        $form->text('title_az', 'Title az')->rules('required|string|max:191');
        $form->text('title_en', 'Title en')->rules('required|string|max:191');
        $form->text('title_ru', 'Title ru')->rules('required|string|max:191');

        return $form;
    }
}
