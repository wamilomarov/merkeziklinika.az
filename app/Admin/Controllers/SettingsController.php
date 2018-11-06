<?php

namespace App\Admin\Controllers;

use App\Settings;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\HasResourceActions;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Layout\Content;
use Encore\Admin\Show;

class SettingsController extends Controller
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
        $grid = new Grid(new Settings);

        $grid->logo('Logo')->image(null, 100, 100);
        $grid->address('Address');
        $grid->email('Email');
        $grid->facebook('Facebook');
        $grid->linkedin('Linkedin');
        $grid->intagram('Intagram');
        $grid->youtube('Youtube');
        $grid->hospital_phone('Hospital phone');
        $grid->ambulance_phone('Ambulance phone');
        $grid->dentistry_phone('Dentistry phone');
        $grid->family_health_phone('Family health phone');

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
        $show = new Show(Settings::findOrFail($id));

        $show->logo_url('Logo');
        $show->address_az('Address az');
        $show->address_en('Address en');
        $show->address_ru('Address ru');
        $show->email('Email');
        $show->facebook('Facebook');
        $show->linkedin('Linkedin');
        $show->intagram('Intagram');
        $show->youtube('Youtube');
        $show->hospital_phone('Hospital phone');
        $show->ambulance_phone('Ambulance phone');
        $show->dentistry_phone('Dentistry phone');
        $show->family_health_phone('Family health phone');
        $show->latitude('Latitude');
        $show->longitude('Longitude');
        $show->short_about_us_heading_az('Short about us heading az');
        $show->short_about_us_heading_en('Short about us heading en');
        $show->short_about_us_heading_ru('Short about us heading ru');
        $show->short_about_us_text_az('Short about us text az');
        $show->short_about_us_text_en('Short about us text en');
        $show->short_about_us_text_ru('Short about us text ru');

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form($id = null)
    {
        $form = new Form(new Settings);

        $form->image('logo_url', 'Logo url')
            ->uniqueName()->move('services')
            ->rules('required|image|max:2048|mimetypes:image/png,image/jpg,image/jpeg|mimes:jpg,jpeg,png');
        $form->text('address_az', 'Address az')->rules('required|string|max:255');
        $form->text('address_en', 'Address en')->rules('required|string|max:255');
        $form->text('address_ru', 'Address ru')->rules('required|string|max:255');
        $form->email('email', 'Email')->rules('required|email|unique:branches,email,'.$id);
        $form->url('facebook', 'Facebook')->rules('required|string|max:255');
        $form->url('linkedin', 'Linkedin')->rules('required|string|max:255');
        $form->url('intagram', 'Intagram')->rules('required|string|max:255');
        $form->url('youtube', 'Youtube')->rules('required|string|max:255');
        $form->text('hospital_phone', 'Hospital phone')->rules('required|string|max:255');
        $form->text('ambulance_phone', 'Ambulance phone')->rules('required|string|max:255');
        $form->text('dentistry_phone', 'Dentistry phone')->rules('required|string|max:255');
        $form->text('family_health_phone', 'Family health phone')->rules('required|string|max:255');
        $form->decimal('latitude', 'Latitude')->rules('required|numeric');
        $form->decimal('longitude', 'Longitude')->rules('required|numeric');
        $form->text('short_about_us_heading_az', 'Short about us heading az')->rules('required|string|max:255');
        $form->text('short_about_us_heading_en', 'Short about us heading en')->rules('required|string|max:255');
        $form->text('short_about_us_heading_ru', 'Short about us heading ru')->rules('required|string|max:255');
        $form->textarea('short_about_us_text_az', 'Short about us text az')->rules('required|string|max:500');
        $form->textarea('short_about_us_text_en', 'Short about us text en')->rules('required|string|max:500');
        $form->textarea('short_about_us_text_ru', 'Short about us text ru')->rules('required|string|max:500');

        return $form;
    }
}
