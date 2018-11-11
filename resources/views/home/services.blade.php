<section id="services">
    <div class="wrapper-small">
        <div class="services-list flex flex-start flex-wrap">
            @foreach($services as $index => $service)
                <div class="service flex flex-col flex-middle flex-center">
                    <div class="service-icon"><img src="{{$service->icon}}" alt=""></div>
                    <div class="service-title fs-14"><h5>{{$service->title}}</h5></div>
                    <div class="main-item featured-item">
                        <div class="item-img"><img src="{{$service->background}}" alt=""></div>
                        <div class="item-details flex flex-col flex-between">
                            <div class="details">
                                <div class="item-category"><h5>{{$service->title}}</h5></div>
                                <div class="item-title"><h2>{{$service->description}}</h2></div>
                            </div>
                            <a href="#" class="button-style lined blue fs-10"><span>{{trans('home.more')}}</span></a></div>
                    </div>
                </div>
                @if($index == 2)
                    <div class="service medium flex flex-middle flex-end service-desc"><h3>{!! trans('home.our_services') !!}</h3>
                    </div>
                @endif
            @endforeach
        </div>
    </div>
</section>
