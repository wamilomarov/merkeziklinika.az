<section id="news" class="flex news-home">
    <div class="news-all">
        <div class="news-item left-to-container">
            <div class="title"><h2>{!! trans('home.news') !!}</h2></div>
            <a href="{{url('news')}}" class="button-style orange lined fs-14"><span>{{trans('home.all_news')}}</span></a></div>
        <div class="news-item subscription left-to-container">
            <div class="title fs-18"><h2>{!! trans('home.news') !!}</h2></div>
            <div class="subscription-form">
                <form action="">
                    <div class="flex"><input type="text" placeholder="{{trans('email_placeholder')}}"
                                             class="input-style border-orange">
                        <button class="button-style orange fs-14"><span>{{trans('home.join')}}</span></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="news-list flex flex-bottom right-to-container">
        <div class="slider-holder owl-carousel">
            @for ($i = 0; $i < 6; $i += 2)
            <div class="slider-item news-home">
                <div class="list-holder flex">
                    <a class="news" href="{{url("news/{$news[$i]->id}")}}">
                        <div class="news-img"><img src="{{$news[$i]->photo}}" alt=""></div>
                        <div class="news-desc">
                            <div class="category date fs-12"><p>{{date("d.m.Y", strtotime($news[$i]->created_at))}}</p></div>
                            <div class="news-title fs-20"><h3>{{$news[$i]->title}}</h3></div>
                            <div class="news-preview fs-10"><p>{{str_limit($news[$i]->text, 100)}}</p></div>
                        </div>
                    </a>
                    <a class="news" href="{{url("news/{$news[$i+1]->id}")}}">
                        <div class="news-img"><img src="{{$news[$i+1]->photo}}" alt=""></div>
                        <div class="news-desc">
                            <div class="category date fs-12"><p>{{date("d.m.Y", strtotime($news[$i+1]->created_at))}}</p></div>
                            <div class="news-title fs-20"><h3>{{$news[$i+1]->title}}</h3></div>
                            <div class="news-preview fs-10"><p>{{str_limit($news[$i+1]->text, 100)}}</p></div>
                        </div>
                    </a>
                </div>
            </div>
            @endfor
        </div>
    </div>
    <div class="pagination-dots flex flex-col wrapper-small flex flex-bottom">
        <ul class="dot-numbers">
            <li><span class="fs-12">1</span></li>
            <li class="active"><span class="fs-12">2</span></li>
            <li><span class="fs-12">3</span></li>
        </ul>
        <div class="pagination-slider"><span class="progress"></span></div>
    </div>
</section>