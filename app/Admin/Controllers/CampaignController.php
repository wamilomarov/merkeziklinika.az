<?php

namespace App\Admin\Controllers;

use App\Campaign;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\HasResourceActions;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Layout\Content;
use Encore\Admin\Show;

class CampaignController extends Controller
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
        $grid = new Grid(new Campaign);

        $grid->title('Title');
        $grid->views('Views');

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
        $show = new Show(Campaign::findOrFail($id));

        $show->title_az('Title az');
        $show->title_en('Title en');
        $show->title_ru('Title ru');
        $show->text_az('Text az');
        $show->text_en('Text en');
        $show->text_ru('Text ru');
        $show->photo('Photo')->image();
        $show->views('Views');

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Campaign);

        $form->text('title_az', 'Title az')->rules('required|string|max:191');
        $form->text('title_en', 'Title en')->rules('required|string|max:191');
        $form->text('title_ru', 'Title ru')->rules('required|string|max:191');
        $form->editor('text_az', 'Text az')->rules('required|string');
        $form->editor('text_en', 'Text en')->rules('required|string');
        $form->editor('text_ru', 'Text ru')->rules('required|string');
        $form->image('photo_url', 'Photo')->uniqueName()->move('images/campaigns')
            ->rules('required|image|max:2048|mimetypes:image/png,image/jpg,image/jpeg|mimes:jpg,jpeg,png');

        return $form;
    }
}
