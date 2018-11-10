<?php

namespace App\Admin\Controllers;

use App\Article;
use App\Doctor;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\HasResourceActions;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Layout\Content;
use Encore\Admin\Show;

class ArticleController extends Controller
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
        $grid = new Grid(new Article);

        $grid->title('Title');
        $grid->views('Views');
        $grid->doctor('Doctor')->full_name();

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
        $show = new Show(Article::findOrFail($id));

        $show->title_az('Title az');
        $show->title_en('Title en');
        $show->title_ru('Title ru');
        $show->body_az('Body az');
        $show->body_en('Body en');
        $show->body_ru('Body ru');
        $show->photo('Photo')->image();
        $show->views('Views');
        $show->doctor_id('Doctor')->as(function ($doctor_id){
            $doctor = Doctor::findOrFail($doctor_id);
            return $doctor->full_name;
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
        $form = new Form(new Article);

        $form->text('title_az', 'Title az')->rules("required|string|max:191");
        $form->text('title_en', 'Title en')->rules("required|string|max:191");
        $form->text('title_ru', 'Title ru')->rules("required|string|max:191");
        $form->editor('body_az', 'Body az')->rules("required|string");
        $form->editor('body_en', 'Body en')->rules("required|string");
        $form->editor('body_ru', 'Body ru')->rules("required|string");
        $form->image('photo_url', 'Photo')->uniqueName()->move('images/articles')
            ->rules('required|image|max:2048|mimetypes:image/png,image/jpg,image/jpeg|mimes:jpg,jpeg,png');
        $form->select('doctor_id', 'Doctor')->options(function (){
            return Doctor::all()->pluck('full_name_az', 'id');
        });

        return $form;
    }
}
