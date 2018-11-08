<?php

namespace App\Admin\Controllers;

use App\SocialNews;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\HasResourceActions;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Layout\Content;
use Encore\Admin\Show;

class SocialNewsController extends Controller
{
    use HasResourceActions;

    /**
     * Index interface.
     *
     * @param Content $content
     * @return Content
     */

    private $options = [
        'newspapers' => "Newspapers and journals",
        'internet' => "Internet",
        'tv' => "TV and Radio"
    ];

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
        $grid = new Grid(new SocialNews);

        $grid->title('Title');
        $grid->date('Date');

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
        $show = new Show(SocialNews::findOrFail($id));

        $show->title_az('Title az');
        $show->title_en('Title en');
        $show->title_ru('Title ru');
        $show->category('Category')->as(function ($category){
            return $this->options[$category];
        });
        $show->link('Link')->link();
        $show->file('File')->file();

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new SocialNews);

        $form->date('date', 'Date')->format("DD-MM-YYYY");
        $form->text('title_az', 'Title az')->rules('required|string|max:191');
        $form->text('title_en', 'Title en')->rules('required|string|max:191');
        $form->text('title_ru', 'Title ru')->rules('required|string|max:191');
        $form->select('category', 'Category')
            ->options($this->options);
        $form->url('link', 'Link');
        $form->file('file', 'File')->rules('mimes:pdf');

        return $form;
    }
}
