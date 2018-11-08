<?php

namespace App\Admin\Controllers;

use App\Resume;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\HasResourceActions;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Layout\Content;
use Encore\Admin\Show;

class ResumeController extends Controller
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
            ->body($this->form()->edit($id));
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
        $grid = new Grid(new Resume);

        $grid->id('Id');
        $grid->name('Name');
        $grid->birth_date('Birth date');
        $grid->birth_city('Birth city');
        $grid->birth_country('Birth country');
        $grid->gender('Gender');
        $grid->photo_url('Photo url');
        $grid->citizenship('Citizenship');
        $grid->family('Family');
        $grid->passport_number('Passport number');
        $grid->passport_given_date('Passport given date');
        $grid->driver_license_category('Driver license category');
        $grid->height('Height');
        $grid->blood_group('Blood group');
        $grid->military_rank('Military rank');
        $grid->military_place('Military place');
        $grid->military_start('Military start');
        $grid->military_end('Military end');
        $grid->conviction('Conviction');
        $grid->address('Address');
        $grid->phone('Phone');
        $grid->mobile('Mobile');
        $grid->email('Email');
        $grid->seen('Seen');
        $grid->created_at('Created at');
        $grid->updated_at('Updated at');

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
        $show = new Show(Resume::findOrFail($id));

        $show->name('Name');
        $show->birth_date('Birth date');
        $show->birth_city('Birth city');
        $show->birth_country('Birth country');
        $show->gender('Gender');
        $show->photo_url('Photo url');
        $show->citizenship('Citizenship');
        $show->family('Family');
        $show->passport_number('Passport number');
        $show->passport_given_date('Passport given date');
        $show->driver_license_category('Driver license category');
        $show->height('Height');
        $show->blood_group('Blood group');
        $show->military_rank('Military rank');
        $show->military_place('Military place');
        $show->military_start('Military start');
        $show->military_end('Military end');
        $show->conviction('Conviction');
        $show->address('Address');
        $show->phone('Phone');
        $show->mobile('Mobile');
        $show->email('Email');
//        $show->seen('Seen');
        $show->created_at('Apply date');

        $show->experiences('Experience', function (Grid $experiences){
            $experiences->resource("admin/experiences");
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
        $form = new Form(new Resume);

        $form->tab('Main info', function (Form $form){
            $form->text('name', 'Name')->disable();
            $form->date('birth_date', 'Birth date')->disable();
            $form->text('birth_city', 'Birth city')->disable();
            $form->text('birth_country', 'Birth country')->disable();
            $form->text('gender', 'Gender')->disable();
            $form->image('photo_url', 'Photo')->disable();
            $form->text('citizenship', 'Citizenship')->disable();
            $form->text('family', 'Family')->disable();
            $form->text('passport_number', 'Passport number')->disable();
            $form->date('passport_given_date', 'Passport given date')->disable();
            $form->text('driver_license_category', 'Driver license category')->disable();
            $form->number('height', 'Height')->disable();
            $form->text('blood_group', 'Blood group')->disable();
            $form->text('military_rank', 'Military rank')->disable();
            $form->text('military_place', 'Military place')->disable();
            $form->date('military_start', 'Military start')->format("YYYY")->disable();
            $form->date('military_end', 'Military end')->format("YYYY")->disable();
            $form->switch('conviction', 'Conviction')->disable();
            $form->text('address', 'Address')->disable();
            $form->mobile('phone', 'Phone')->disable();
            $form->mobile('mobile', 'Mobile')->disable();
            $form->email('email', 'Email')->disable();
        })->tab('Experience', function (Form $form){
            return $form->hasMany('experiences', function (Form\NestedForm $nestedForm){
                $nestedForm->text('name')->disable();
                $nestedForm->text('position')->disable();
                $nestedForm->text('leaving_reason')->disable();
                $nestedForm->text('salary')->disable();
                $nestedForm->date('start')->disable();
                $nestedForm->date('end')->disable();
            });
        })->tab('Education', function (Form $form){
            return $form->hasMany('educations', function (Form\NestedForm $nestedForm){
                $nestedForm->text('name')->disable();
                $nestedForm->text('major')->disable();
                $nestedForm->text('salary')->disable();
                $nestedForm->date('start')->disable();
                $nestedForm->date('end')->disable();
            });
        })->tab('Languages', function (Form $form){
            return $form->hasMany('languages', function (Form\NestedForm $nestedForm){
                $nestedForm->text('name')->disable();
                $nestedForm->text('level')->disable();
            });
        })->tab('Software', function (Form $form){
            return $form->hasMany('softwares', function (Form\NestedForm $nestedForm){
                $nestedForm->text('name')->disable();
                $nestedForm->text('level')->disable();
            });
        })->tab('Relatives', function (Form $form){
            return $form->hasMany('relatives', function (Form\NestedForm $nestedForm){
                $nestedForm->text('full_name')->disable();
                $nestedForm->text('level')->disable();
                $nestedForm->text('working_place')->disable();
                $nestedForm->text('position')->disable();
                $nestedForm->date('birth_date')->disable();
            });
        })->tab('Known people from personal', function (Form $form){
            return $form->hasMany('known_personal', function (Form\NestedForm $nestedForm){
                $nestedForm->text('full_name')->disable();
                $nestedForm->text('level')->disable();
                $nestedForm->text('position')->disable();
            });
        });


        return $form;
    }
}
