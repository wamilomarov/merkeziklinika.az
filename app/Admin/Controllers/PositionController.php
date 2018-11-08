<?php

namespace App\Admin\Controllers;

use App\Position;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\HasResourceActions;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Layout\Content;
use Encore\Admin\Show;
use Illuminate\Http\Request;

class PositionController extends Controller
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
        $grid = new Grid(new Position);

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
        $show = new Show(Position::findOrFail($id));

        $show->name_az('Name az');
        $show->name_en('Name en');
        $show->name_ru('Name ru');

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Position);

        $form->text('name_az', 'Name az')->rules('required|string|max:191');
        $form->text('name_en', 'Name en')->rules('required|string|max:191');
        $form->text('name_ru', 'Name ru')->rules('required|string|max:191');

        return $form;
    }

    public function positions(Request $request)
    {
        $q = $request->get('q');

        return Position::where('name_az', 'like', "%$q%")
            ->orWhere('name_en', 'like', "%$q%")
            ->orWhere('name_ru', 'like', "%$q%")
            ->paginate(null, ['id', 'name_az as text']);
    }
}
