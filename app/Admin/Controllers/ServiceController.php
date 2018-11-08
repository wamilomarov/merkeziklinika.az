<?php

namespace App\Admin\Controllers;

use App\Service;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\HasResourceActions;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Layout\Content;
use Encore\Admin\Show;

class ServiceController extends Controller
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
        $grid = new Grid(new Service);

        $grid->title('Başlıq');
        $grid->description('Mətn')->display(function ($description){
            return str_limit($description, 20);
        });
        $grid->icon('Icon')->image(null, 50, 50);
//        $grid->url('Url');
//        $grid->created_at('Created at');
//        $grid->updated_at('Updated at');

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
        $show = new Show(Service::findOrFail($id));

        $show->title_az('Başlıq az');
        $show->title_ru('Başlıq ru');
        $show->title_en('Başlıq en');
        $show->description_az('Mətn az');
        $show->description_ru('Mətn ru');
        $show->description_en('Mətn en');
        $show->icon('Icon')->image();
        $show->url('Link');

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Service);

        $form->text('title_az', 'Başlıq az')->rules('required|string|max:191');
        $form->text('title_ru', 'Başlıq ru')->rules('required|string|max:191');
        $form->text('title_en', 'Başlıq en')->rules('required|string|max:191');
        $form->text('description_az', 'Mətn az')->rules('required|string|max:191');
        $form->text('description_ru', 'Mətn ru')->rules('required|string|max:191');
        $form->text('description_en', 'Mətn en')->rules('required|string|max:191');
        $form->image('icon_url', 'Icon')
            ->uniqueName()->move('images/services')
            ->rules('required|image|max:2048|mimetypes:image/png,image/jpg,image/jpeg|mimes:jpg,jpeg,png');
        $form->url('url', 'Link')->rules('required|string|max:191');

        return $form;
    }
}
