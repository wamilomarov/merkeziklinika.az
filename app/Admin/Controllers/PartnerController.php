<?php

namespace App\Admin\Controllers;

use App\Partner;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\HasResourceActions;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Layout\Content;
use Encore\Admin\Show;

class PartnerController extends Controller
{
    use HasResourceActions;

    /**
     * Index interface.
     *
     * @param Content $content
     * @return Content
     */
    private $options = ['organisations' => 'Təşkilatlar', 'insurance' => 'Sığorta şirkətləri', 'embassy' => 'Səfirliklər'];
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
        $grid = new Grid(new Partner);

        $grid->name('Name');
        $grid->photo('Photo')->image(null, 100, 100);

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
        $show = new Show(Partner::findOrFail($id));
        $options = ['organisations' => 'Təşkilatlar', 'insurance' => 'Sığorta şirkətləri', 'embassy' => 'Səfirliklər'];
        $show->name_az('Name az');
        $show->name_en('Name en');
        $show->name_ru('Name ru');
        $show->type('Type')->as(function ($type) use ($options){
            return $options[$type];
        });
        $show->photo('Photo')->image();

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Partner);

        $form->text('name_az', 'Name az')->rules('required|string|max:191');
        $form->text('name_en', 'Name en')->rules('required|string|max:191');
        $form->text('name_ru', 'Name ru')->rules('required|string|max:191');
        $form->text('type', 'Type')->options($this->options);
        $form->image('photo_url', 'Photo')
            ->uniqueName()->move('images/news')
            ->rules('required|image|max:2048|mimetypes:image/png,image/jpg,image/jpeg|mimes:jpg,jpeg,png');
        $form->url('link', 'Link')->rules('required|string|max:191');

        return $form;
    }
}
