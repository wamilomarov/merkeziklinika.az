<?php

namespace App\Admin\Controllers;

use App\EducationalMaterial;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\HasResourceActions;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Layout\Content;
use Encore\Admin\Show;

class EducationalMaterialController extends Controller
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
        $grid = new Grid(new EducationalMaterial);

        $grid->name('Adı');

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
        $show = new Show(EducationalMaterial::findOrFail($id));

        $options = ['exam_results' => 'İmtahan nəticələri', 'exam_questions' => 'İmtahan sualları',
            'residency' => 'Rezidentura', 'education_plan' => 'Tədris planı'];

        $show->category('Kateqoriya')->using($options);
        $show->name_az('Adı az');
        $show->name_en('Adı en');
        $show->name_ru('Adı ru');
        $show->link('URL')->file();

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new EducationalMaterial);
        $options = ['exam_results' => 'İmtahan nəticələri', 'exam_questions' => 'İmtahan sualları',
            'residency' => 'Rezidentura', 'education_plan' => 'Tədris planı'];

        $form->select('category', 'Category')->options($options);
        $form->text('name_az', 'Name az')->rules("required|string|max:191");
        $form->text('name_en', 'Name en')->rules("required|string|max:191");
        $form->text('name_ru', 'Name ru')->rules("required|string|max:191");
        $form->file('link', 'File')->uniqueName()
            ->move('files/educational_materials')->rules('required|file');

        return $form;
    }
}
