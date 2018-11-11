<section id="header">
    <div class="top">
        <div class="wrapper-large">
            <div class="flex row between-xs ma-0">
                <ul class="links-holder">
                    <li><a href="">{{trans('layout.address')}}: {{$settings->address}}</a></li>
                    <li><a href="">{{trans('layout.email')}}: {{$settings->email}}</a></li>
                </ul>
                <ul class="links-holder">
                    <li><a href="" class="hotline">ALO <b>105</b></a></li>
                    <li>
                        <ul class="social-networks">
                            <li><a href="{{$settings->facebook}}"><i class="fab fa-facebook-f"></i></a></li>
                            <li><a href="{{$settings->instagram}}"><i class="fab fa-instagram"></i></a></li>
                            <li><a href="{{$settings->youtube}}"><i class="fab fa-youtube"></i></a></li>
                            <li><a href="{{$settings->linkedin}}"><i class="fab fa-linkedin-in"></i></a></li>
                        </ul>
                    </li>
                    <li class="search-bar">
                        <div class="search-bar-element">
                            <div class="elements"><span>{{trans('layout.search')}}</span> <input type="text"
                                                                              class="search-bar-input input-style">
                            </div>
                            <div class="exit-element"><span>x</span></div>
                        </div>
                        <a><i class="fas fa-search"></i></a></li>
                    <li class="languages"><span class="active-lang">{{strtoupper(\Illuminate\Support\Facades\App::getLocale())}}</span>
                        <div class="languages-list">
                            <ul>
                                <li><a href="{{url('locale/az')}}">{{trans('layout.az')}}</a></li>
                                <li><a href="{{url('locale/ru')}}">{{trans('layout.ru')}}</a></li>
                                <li><a href="{{url('locale/en')}}">{{trans('layout.en')}}</a></li>
                            </ul>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="navbar">
        <div class="wrapper-large">
            <div class="row ma-0 between-xs middle-xs">
                <div class="brand-logo"><a href="#"><img src="{{$settings->logo}}" alt=""></a></div>
                <div class="btn-menu active"><span></span> <span></span> <span></span></div>
                <div class="menu-links">
                    <ul>
                        <li><a href="">{{trans('layout.main_page')}}</a></li>
                        <li><a href="">{{trans('layout.about_us')}}</a></li>
                        <li><a href="">{{trans('layout.departments')}}</a></li>
                        <li><a href="">{{trans('layout.doctors')}}</a></li>
                        <li><a href="">{{trans('layout.e_services')}}</a></li>
                        <li class="dropdown"><a href="">{{trans('layout.medical_info')}}</a>
                            <div class="dropdown-content">
                                <ul>
                                    <li>
                                        <div class="content"><a href="">{{trans('layout.medical_devices')}}</a></div>
                                    </li>
                                    <li>
                                        <div class="content"><a href="">{{trans('layout.medical_articles')}}</a></div>
                                    </li>
                                    <li>
                                        <div class="content"><a href="">{{trans('layout.popular_articles')}}</a></div>
                                    </li>
                                    <li>
                                        <div class="content"><a href="">{{trans('layout.q_a')}}</a></div>
                                    </li>
                                    <li>
                                        <div class="content"><a href="">{{trans('layout.patient_rights')}}</a></div>
                                    </li>
                                    <li>
                                        <div class="content"><a href="">{{trans('layout.education_and_study')}}</a></div>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li><a href="">{{trans('layout.news')}}</a></li>
                        <li><a href="">{{trans('layout.contact')}}</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>