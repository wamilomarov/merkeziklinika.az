<?php

namespace App\Admin\Controllers;

use App\SurveyResult;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\HasResourceActions;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Layout\Content;
use Encore\Admin\Show;

class SurveyResultController extends Controller
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
        $grid = new Grid(new SurveyResult);
        $grid->model()->orderBy('id', 'desc');
        $grid->disableCreateButton();

        $grid->name('Ad, soyad');
        $grid->department('Şöbə / Bölmə')->name();
        $grid->branch('Filial')->name();
        $grid->seen('Seen')->display(function ($seen){
            return $seen == false ? "<i class='fa fa-clock-o'></i>" : "<i class='fa fa-check' style='color: green;'></i>";
        });
        $grid->created_at('Created at');
        $grid->actions(function (Grid\Displayers\Actions $actions){
            $actions->disableEdit();
            $actions->disableDelete();
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
        $show = new Show(SurveyResult::findOrFail($id));

        $show->name('Ad, soyad ');
        $show->age('Yaş ');
        $show->gender('Cinsi')->using(['m' => 'Kişi', 'f' => 'Qadın']);
        $show->phone('Telefon ');
        $show->email('Email');
        $show->learned_from('Mərkəzi Klinikadan necə xəbərdar oldu');
        $show->appointment_type('Həkim qəbuluna hansı üsulla yazıldı');
        $show->department('Şöbə / Bölmə')->name();
        $show->branch('Filial')->name();
        $show->registration('Qeydiyyət şöbəsi');
        $show->doctor('Həkim');
        $show->nurse('Tibb bacısı');
        $show->laboratory('Tibbi laboratoriya');
        $show->diagnostics('Funksional diaqnostika');
        $show->hygiene('Klinikanın sanitar-gigiyenik vəziyyəti');
        $show->ambulance('Tibbi yardımın keyfiyyəti');
        $show->meal_quality('Qidanın keyfiyyəti');
        $show->imaging('Tibbi görüntüləmə');
        $show->waited('Müayinə olunmaq üçün gözlədi');
        $show->notes('Şərhlər');
        $show->suggestions('Təkliflər');
        $show->seen('Seen')->using([true => 'Yes', false => 'No']);
        $show->created_at('Zaman');

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new SurveyResult);

        $form->text('name', 'Name');
        $form->number('age', 'Age');
        $form->text('gender', 'Gender');
        $form->mobile('phone', 'Phone');
        $form->email('email', 'Email');
        $form->text('learned_from', 'Learned from');
        $form->text('appointment_type', 'Appointment type');
        $form->number('department_id', 'Department id');
        $form->number('branch_id', 'Branch id');
        $form->number('registration', 'Registration');
        $form->number('doctor', 'Doctor');
        $form->number('nurse', 'Nurse');
        $form->number('laboratory', 'Laboratory');
        $form->number('diagnostics', 'Diagnostics');
        $form->number('hygiene', 'Hygiene');
        $form->number('ambulance', 'Ambulance');
        $form->number('imaging', 'Imaging');
        $form->number('waited', 'Waited');
        $form->text('notes', 'Notes');
        $form->text('suggestions', 'Suggestions');
        $form->switch('seen', 'Seen');

        return $form;
    }
}
