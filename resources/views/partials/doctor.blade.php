<div class="col-md-3 col-sm-3 col-xs-12 pa-0 item">
    <div class="item-holder">
        <div class="item-img"><img src="{{$doctor->photo}}" alt="">
            <div class="item-social">
                <ul class="social-networks">
                    <li><a href="{{$doctor->facebook}}"><i class="fab fa-facebook-f"></i></a></li>
                    <li><a href="{{$doctor->instagram}}"><i class="fab fa-instagram"></i></a></li>
                    <li><a href="{{$doctor->youtube}}"><i class="fab fa-youtube"></i></a></li>
                    <li><a href="{{$doctor->linkedin}}"><i class="fab fa-linkedin-in"></i></a></li>
                </ul>
            </div>
        </div>
        <div class="item-desc">
            <div class="category"><h4>{{$doctor->position->name}}</h4></div>
            <div class="title fs-14"><h2><b>{{$doctor->full_name}}</b></h2></div>
            <div class="link"><a href="{{url("doctors/{$doctor->id}")}}" class="button-style blue lined fs-10"><span>{{trans('home.more')}}</span></a>
            </div>
        </div>
    </div>
</div>
