<?php

namespace App\Admin\Controllers;

use App\Department;
use App\MedicalDeviceCategory;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\HasResourceActions;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Layout\Content;
use Encore\Admin\Show;

class MedicalDeviceCategoryController extends Controller
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
        $grid = new Grid(new MedicalDeviceCategory);

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
        $show = new Show(MedicalDeviceCategory::findOrFail($id));

        $show->name_az('Name az');
        $show->name_en('Name en');
        $show->name_ru('Name ru');
        $show->production_date('Production date');
        $show->manufacturer('Manufacturer');
        $show->model('Model');
        $show->department_id('Department id');
        $show->information('Information');

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new MedicalDeviceCategory);

        $form->tab("Category", function (Form $form){
            $form->text('name_az', 'Name az')->rules('required|string|max:191');
            $form->text('name_en', 'Name en')->rules('required|string|max:191');
            $form->text('name_ru', 'Name ru')->rules('required|string|max:191');
        })->tab("Avadanlıqlar", function (Form $form){
            return $form->hasMany('devices', function (Form\NestedForm $nestedForm){
                $nestedForm->text('name_az', 'Name az')->rules('required|string|max:191');
                $nestedForm->text('name_en', 'Name en')->rules('required|string|max:191');
                $nestedForm->text('name_ru', 'Name ru')->rules('required|string|max:191');
                $nestedForm->date('production_date', 'Production date')->default(date('Y-m-d'));
                $nestedForm->text('manufacturer', 'Manufacturer');
                $nestedForm->text('model', 'Model');
                $nestedForm->select('department_id', 'Department')
                    ->options(function (){
                        return Department::all()->pluck('name_az', 'id');
                    });
                $nestedForm->editor('information', 'Information');
            });

        });


        return $form;
    }
}
