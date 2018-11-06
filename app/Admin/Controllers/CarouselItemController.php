<?php

namespace App\Admin\Controllers;

use App\CarouselItem;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\HasResourceActions;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Layout\Content;
use Encore\Admin\Show;

class CarouselItemController extends Controller
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
            ->header('Slaydlar')
            ->description('siyahisi')
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
            ->header('Yeni')
            ->description('Elan')
            ->body($this->form());
    }

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new CarouselItem);
        $grid->model()->orderBy('order', 'asc');

        $grid->title('Başlıq');
        $grid->description('Mətn')->display(function ($description){
            return str_limit($description, 20);
        });
        $grid->order('Sira');

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
        $show = new Show(CarouselItem::findOrFail($id));

        $show->title_az('Başlıq az');
        $show->title_ru('Başlıq ru');
        $show->title_en('Başlıq en');
        $show->description_az('Mətn az');
        $show->description_ru('Mətn ru');
        $show->description_en('Mətn en');
        $show->photo_url('Şəkil')->image();
        $show->button_text_az('Düymə mətni az');
        $show->button_text_ru('Düymə mətni ru');
        $show->button_text_en('Düymə mətni en');
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
        $form = new Form(new CarouselItem);

        $form->text('title_az', 'Başlıq az')->rules('required|string|max:255');
        $form->text('title_ru', 'Başlıq ru')->rules('required|string|max:255');
        $form->text('title_en', 'Başlıq en')->rules('required|string|max:255');
        $form->text('description_az', 'Mətn az')->rules('required|string|max:500');
        $form->text('description_ru', 'Mətn ru')->rules('required|string|max:500');
        $form->text('description_en', 'Mətn en')->rules('required|string|max:500');
        $form->image('photo_url', 'Şəkil')
            ->uniqueName()->move('carousel')
            ->rules('required|image|max:2048|mimetypes:image/png,image/jpg,image/jpeg|mimes:jpg,jpeg,png');
        $form->text('button_text_az', 'Düymə mətni az')->rules('required|string|max:50');
        $form->text('button_text_ru', 'Düymə mətni ru')->rules('required|string|max:50');
        $form->text('button_text_en', 'Düymə mətni en')->rules('required|string|max:50');
        $form->url('url', 'Link')->rules('required|string|max:255');

        return $form;
    }
}
