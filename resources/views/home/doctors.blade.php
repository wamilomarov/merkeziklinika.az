<section id="doctors-list">
    <div class="section-header">
        <div class="wrapper-small"><h2>{{trans('home.our_doctors')}}</h2></div>
    </div>
    <div class="wrapper-small">
        <div class="flex flex-wrap">
            @each('partials.doctor', $doctors, 'doctor')
        </div>
    </div>
</section>