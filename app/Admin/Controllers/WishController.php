<?php

namespace App\Admin\Controllers;

use App\Wish;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\HasResourceActions;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Layout\Content;
use Encore\Admin\Show;

class WishController extends Controller
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
        $grid = new Grid(new Wish);

        $grid->disableActions();
        $grid->disableCreateButton();

        $options = ['wish' => 'Dilək', 'gratitude' => 'Təşəkkür', 'complaint' => 'Şikayət'];
        $grid->name('Name');
        $grid->purpose('Purpose')->display(function ($purpose) use ($options){
            return $options[$purpose];
        });
        $grid->notes('Notes');
        $grid->seen('Seen')->display(function ($seen){
            return $seen == false ? "<i class='fa fa-clock-o'></i>" : "<i class='fa fa-check' style='color: green;'></i>";
        });

        $grid->column('id', 'Actions')->display(function ($id){
            return "<a href='" .  url("admin/wishes/{$id}") . "'><i class='fa fa-eye'></i></a>";
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
        $wish = Wish::findOrFail($id);
        $show = new Show($wish);

        $show->name('Name');
        $show->phone('Phone');
        $show->email('Email');
        $show->purpose('Purpose');
        $show->notes('Notes');

        if ($wish->seen == false)
        {
            $wish->seen = true;
            $wish->save();
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
        $form = new Form(new Wish);

        $form->text('name', 'Name');
        $form->mobile('phone', 'Phone');
        $form->email('email', 'Email');
        $form->text('purpose', 'Purpose');
        $form->text('notes', 'Notes');

        return $form;
    }
}
