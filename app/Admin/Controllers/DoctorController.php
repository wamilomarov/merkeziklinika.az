<?php

namespace App\Admin\Controllers;

use App\Department;
use App\Doctor;
use App\Http\Controllers\Controller;
use App\Language;
use App\Major;
use App\Position;
use Encore\Admin\Controllers\HasResourceActions;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Layout\Content;
use Encore\Admin\Show;

class DoctorController extends Controller
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
        $grid = new Grid(new Doctor);

        $grid->full_name('Full name');
        $grid->photo('Photo')->image();
        $grid->department_id('Department')->display(function ($department_id){
            $department = Department::find($department_id);
            return $department->name;
        });
        $grid->position_id('Position')->display(function ($position_id){
            $position = Position::find($position_id);
            return $position->name;
        });
        $grid->major_id('Major')->display(function ($major_id){
            $major = Major::find($major_id);
            return $major->name;
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
        $show = new Show(Doctor::findOrFail($id));

        $show->full_name_az('Full name az');
        $show->full_name_en('Full name en');
        $show->full_name_ru('Full name ru');
        $show->photo_url('Photo url');
        $show->department_id('Department')->as(function ($department_id){
            $department = Department::find($department_id);
            return $department->name;
        });
        $show->position_id('Position')->as(function ($position_id){
            $position = Position::find($position_id);
            return $position->name;
        });
        $show->major_id('Major')->as(function ($major_id){
            $major = Major::find($major_id);
            return $major->name;
        });
        $show->facebook('Facebook');
        $show->instagram('Instagram');
        $show->linkedin('Linkedin');
        $show->youtube('Youtube');
        $show->bio_az('Bio az');
        $show->bio_en('Bio en');
        $show->bio_ru('Bio ru');

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Doctor);

        $form->tab('Doctor', function (Form $form) {
            $form->text('full_name_az', 'Full name az')->rules('required|string|max:191');
            $form->text('full_name_en', 'Full name en')->rules('required|string|max:191');
            $form->text('full_name_ru', 'Full name ru')->rules('required|string|max:191');
            $form->image('photo_url', 'Photo url')
                ->uniqueName()->move('images/doctors')
                ->rules('required|image|max:2048|mimetypes:image/png,image/jpg,image/jpeg|mimes:jpg,jpeg,png');

            $form->select('department_id', 'Department')
                ->options(function ($id) {
                    $department = Department::find($id);

                    if ($department) {
                        return [$department->id => $department->name];
                    }
                })->ajax('/admin/api/departments');

            $form->select('position_id', 'Position')
                ->options(function ($id) {
                $position = Position::find($id);

                if ($position) {
                    return [$position->id => $position->name];
                }
            })->ajax('/admin/api/positions');

            $form->multipleSelect('language_id', 'Language')
                ->options(Language::all()->pluck('name_az', 'id'));

            $form->select('major_id', 'Major')
                ->options(function ($id) {
                $major = Major::find($id);

                if ($major) {
                    return [$major->id => $major->name];
                }
            })->ajax('/admin/api/majors');

            $form->url('facebook', 'Facebook')->rules('required|string|max:191');
            $form->url('instagram', 'Instagram')->rules('required|string|max:191');
            $form->url('linkedin', 'Linkedin')->rules('required|string|max:191');
            $form->url('youtube', 'Youtube')->rules('required|string|max:191');
            $form->radio('is_guest', 'Qonaq')->options([true => 'Qonaq', false => 'Yerli' ])->rules('required');
            $form->editor('bio_az', 'Bio az')->rules('required|string|max:1500');
            $form->editor('bio_en', 'Bio en')->rules('required|string|max:1500');
            $form->editor('bio_ru', 'Bio ru')->rules('required|string|max:1500');

        })->tab('Certificates', function (Form $form) {
            $form->hasMany('certificates', function (Form\NestedForm $nestedForm) {
                $nestedForm->image('Photo')
                    ->uniqueName()->move('images/news')
                    ->rules('required|image|max:2048|mimetypes:image/png,image/jpg,image/jpeg|mimes:jpg,jpeg,png');
            });
        })->tab('Education', function (Form $form) {
            $form->hasMany('educations', function (Form\NestedForm $nestedForm) {
                $nestedForm->date('start', 'Start')->format("YYYY");
                $nestedForm->date('end', 'End')->format("YYYY");
                $nestedForm->text('major_az', 'Ixtisas az')->rules('required|string|max:191');
                $nestedForm->text('major_en', 'Ixtisas en')->rules('required|string|max:191');
                $nestedForm->text('major_ru', 'Ixtisas ru')->rules('required|string|max:191');
                $nestedForm->text('name_az', 'Universitet az')->rules('required|string|max:191');
                $nestedForm->text('name_en', 'Universitet en')->rules('required|string|max:191');
                $nestedForm->text('name_ru', 'Universitet ru')->rules('required|string|max:191');
                $nestedForm->text('address_az', 'Address az')->rules('required|string|max:191');
                $nestedForm->text('address_en', 'Address en')->rules('required|string|max:191');
                $nestedForm->text('address_ru', 'Address ru')->rules('required|string|max:191');
            });
        })->tab('Experience', function (Form $form) {
            $form->hasMany('experiences', function (Form\NestedForm $nestedForm) {
                $nestedForm->text('period', 'Period')->rules('required|string|max:191');
                $nestedForm->text('name_az', 'Universitet az')->rules('required|string|max:191');
                $nestedForm->text('name_en', 'Universitet en')->rules('required|string|max:191');
                $nestedForm->text('name_ru', 'Universitet ru')->rules('required|string|max:191');
                $nestedForm->text('address_az', 'Address az')->rules('required|string|max:191');
                $nestedForm->text('address_en', 'Address en')->rules('required|string|max:191');
                $nestedForm->text('address_ru', 'Address ru')->rules('required|string|max:191');
            });
        })->tab('Trainings', function (Form $form) {
            $form->hasMany('trainings', function (Form\NestedForm $nestedForm) {
                $nestedForm->text('period', 'Period')->rules('required|string|max:191');
                $nestedForm->text('name_az', 'Adi az')->rules('required|string|max:191');
                $nestedForm->text('name_en', 'Adi en')->rules('required|string|max:191');
                $nestedForm->text('name_ru', 'Adi ru')->rules('required|string|max:191');
                $nestedForm->text('address_az', 'Address az')->rules('required|string|max:191');
                $nestedForm->text('address_en', 'Address en')->rules('required|string|max:191');
                $nestedForm->text('address_ru', 'Address ru')->rules('required|string|max:191');
            });
        })->tab('Articles', function (Form $form) {
            $form->hasMany('articles', function (Form\NestedForm $nestedForm) {
                $nestedForm->text('name_az', 'Name az')->rules('required|string|max:191');
                $nestedForm->text('name_en', 'Name en')->rules('required|string|max:191');
                $nestedForm->text('name_ru', 'Name ru')->rules('required|string|max:191');
                $nestedForm->text('authors_az', 'Authors az')->rules('required|string|max:191');
                $nestedForm->text('authors_en', 'Authors en')->rules('required|string|max:191');
                $nestedForm->text('authors_ru', 'Authors ru')->rules('required|string|max:191');
                $nestedForm->text('publication_az', 'Publication az')->rules('required|string|max:191');
                $nestedForm->text('publication_en', 'Publication en')->rules('required|string|max:191');
                $nestedForm->text('publication_ru', 'Publication ru')->rules('required|string|max:191');
            });
        });


        return $form;
    }
}
