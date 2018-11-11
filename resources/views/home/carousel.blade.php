<section id="home">
    <div class="homepage-slider">
        <div class="slider-frame">
            <div class="slider-holder owl-carousel">
                @foreach($carousel_items as $carousel_item)
                    <div class="slider-item">
                        <div class="item-img"><img class="item-image" src="{{$carousel_item->photo}}" alt=""></div>
                        <div class="wrapper-small">
                            <div class="item-desc">
                                <div class="item-title"><h1>{{$carousel_item->title}}</h1></div>
                                <div class="item-details"><p>{{$carousel_item->description}}</p></div>
                                <a href="{{$carousel_item->url}}"
                                   class="button-style orange lined fs-14"><span>{{$carousel_item->button_text}}</span></a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="pagination-dots flex flex-col wrapper-small flex flex-bottom">
                <ul class="dot-numbers">
                    <li><span class="fs-12">1</span></li>
                    <li class="active"><span class="fs-12">2</span></li>
                    <li><span class="fs-12">3</span></li>
                </ul>
                <div class="pagination-slider"><span class="progress"></span></div>
            </div>
        </div>
        <div class="featured-items">
            <div class="wrapper-small">
                <div class="flex">
                    <div class="main-item featured-item main-item-padding">
                        <div class="slider-owl-carousel-item owl-carousel">
                            @foreach($carousel_items as $carousel_item)
                            <div class="item">
                                <div class="div-element main-item featured-item">
                                    <div class="item-img"><img src="{{$carousel_item->photo}}" alt=""></div>
                                    <div class="item-details flex flex-col flex-between">
                                        <div class="details">
                                            <div class="item-category"><h5>{{$carousel_item->title}}</h5></div>
                                            <div class="item-title"><h2>{{$carousel_item->description}}</h2></div>
                                        </div>
                                        <a href="{{$carousel_item->url}}" class="button-style lined blue fs-10"><span>{{$carousel_item->button_text}}</span></a>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="right-side flex-grow flex flex-col">
                        <div class="slider-right-side">
                            <div class="slider-owl-carousel-item-2 owl-carousel">
                                @foreach($carousel_items as $carousel_item)
                                <div class="item">
                                    <div class="small-item featured-item">
                                        <div class="item-img"><img src="{{$carousel_item->photo}}" alt=""></div>
                                        <div class="item-details flex flex-col flex-between">
                                            <div class="details">
                                                <div class="item-category"><h5>{{$carousel_item->title}}</h5></div>
                                                <div class="item-title"><h2>{{$carousel_item->description}}</h2></div>
                                            </div>
                                            <a href="{{$carousel_item->url}}" class="button-style lined blue fs-10"><span>{{$carousel_item->button_text}}</span></a>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                                <div class="item">
                                    <div class="small-item featured-item">
                                        <div class="item-img"><img src="./images//home.png" alt=""></div>
                                        <div class="item-details flex flex-col flex-between">
                                            <div class="details">
                                                <div class="item-category"><h5>HAQQIMIZDA</h5></div>
                                                <div class="item-title"><h2>Qeydinizə qalmağa biz hər zaman
                                                        hazırıq.Müayinə qeydiyyatı.</h2></div>
                                            </div>
                                            <a href="#" class="button-style lined blue fs-10"><span>İNDİ YAZ</span></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="small-item featured-item">
                                        <div class="item-img"><img src="./images//home.png" alt=""></div>
                                        <div class="item-details flex flex-col flex-between">
                                            <div class="details">
                                                <div class="item-category"><h5>BİZƏ YAZIN</h5></div>
                                                <div class="item-title"><h2>Müayinə qeydiyyatı.</h2></div>
                                            </div>
                                            <a href="#" class="button-style lined blue fs-10"><span>İNDİ YAZ</span></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="info flex-grow flex flex-middle">
                            <div class="flex flex-between flex-grow flex-middle"><p>{{trans('home.call_for_ambulance')}}</p><a
                                        href="" class="hotline">ALO <b>105</b></a></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>