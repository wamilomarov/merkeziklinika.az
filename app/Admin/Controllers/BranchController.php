<?php

namespace App\Admin\Controllers;

use App\Branch;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\HasResourceActions;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Layout\Content;
use Encore\Admin\Show;

class BranchController extends Controller
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
            ->header('Filiallar')
            ->description('Filiallarin siyahisi')
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
            ->body($this->form($id)->edit($id));
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
            ->header('Yeni filial')
            ->description('Xahiş edirik məlumat daxil edin')
            ->body($this->form());
    }

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Branch);

//        $grid->id('Id');
        $grid->name('Adı');
//        $grid->name_en('Name en');
//        $grid->name_ru('Name ru');
        $grid->address('Ünvanı');
//        $grid->address_en('Address en');
//        $grid->address_ru('Address ru');
        $grid->email('Email');
        $grid->hospital_phone('XƏSTƏXANA telefonu');
        $grid->ambulance_phone('AMBULATORİYA telefonu');
        $grid->fax('Fax');
//        $grid->latitude('Latitude');
//        $grid->longitude('Longitude');
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
        $show = new Show(Branch::findOrFail($id));

//        $show->id('Id');
        $show->name_az('Adı az');
        $show->name_en('Adı en');
        $show->name_ru('Adı ru');
        $show->address_az('Ünvanı az');
        $show->address_en('Ünvanı en');
        $show->address_ru('Ünvanı ru');
        $show->email('Email');
        $show->hospital_phone('XƏSTƏXANA telefonu');
        $show->ambulance_phone('AMBULATORİYA telefonu');
        $show->fax('Fax');
        $show->latitude('Latitude');
        $show->longitude('Longitude');
//        $show->created_at('Created at');
//        $show->updated_at('Updated at');

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form($id = null)
    {
        $form = new Form(new Branch);

        $form->text('name_az', 'Adı az')->rules('required|string|max:255');
        $form->text('name_en', 'Adı en')->rules('required|string|max:255');
        $form->text('name_ru', 'Adı ru')->rules('required|string|max:255');
        $form->text('address_az', 'Ünvanı az')->rules('required|string|max:255');
        $form->text('address_en', 'Ünvanı en')->rules('required|string|max:255');
        $form->text('address_ru', 'Ünvanı ru')->rules('required|string|max:255');
        $form->email('email', 'Email')->rules('required|email|unique:branches,email,'.$id);
        $form->text('hospital_phone', 'XƏSTƏXANA telefonu')->rules('required');
        $form->text('ambulance_phone', 'AMBULATORİYA telefonu')->rules('required');
        $form->text('fax', 'Fax')->rules('required');
        $form->decimal('latitude', 'Latitude')->rules('required|numeric');
        $form->decimal('longitude', 'Longitude')->rules('required|numeric');

        return $form;
    }
}
