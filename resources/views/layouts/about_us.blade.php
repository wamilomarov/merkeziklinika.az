<div id="about-us">
    <div class="flex about-us-flex">
        <div class="contact-details half left-to-container">
            <div class="logo-holder"><img src="{{$settings->logo}}" alt=""></div>
            <div class="category"><h3>{{trans('layout.about_us')}}</h3></div>
            <div class="title">{{$settings->short_about_us_heading}}</div>
            <div class="desc">
                {{$settings->short_about_us_text}}
            </div>
            <div class="social-networks-holder">
                <ul class="social-networks">
                    <li><a href="{{$settings->facebook}}"><i class="fab fa-facebook-f"></i></a></li>
                    <li><a href="{{$settings->instagram}}"><i class="fab fa-instagram"></i></a></li>
                    <li><a href="{{$settings->youtube}}"><i class="fab fa-youtube"></i></a></li>
                    <li><a href="{{$settings->linkedin}}"><i class="fab fa-linkedin-in"></i></a></li>
                </ul>
            </div>
            <div class="contact-desc flex">
                <div class="call desc-item col-md-6 col-xs-6 pa-0">
                    <div class="desc-title"><h3>{{trans('layout.address')}}</h3></div>
                    <div class="desc-details"><p>{{$settings->address}}</p></div>
                    <a href="" class="button-style blue lined fs-10"><span>{{trans('layout.contact')}}</span></a></div>
                <div class="email desc-item col-md-6 col-xs-6 pa-0">
                    <div class="desc-title"><h3>{{trans('layout.write_us')}}</h3></div>
                    <div class="desc-details"><a href="mailto:{{$settings->email}}">{{$settings->email}}</a></div>
                </div>
            </div>
        </div>
        <div class="map half">
            <iframe src="https://www.google.com/maps/embed
            1i1024!2i768!4f13.1!3m3!1m2!1s0x40307dcd8cea76cf%3A0xa414a01962d44dea!2sCentral+Clinic+Hospital!5e0!3m2!1sen!2s!4v1528184245399"
                    width="100%" height="100%" frameborder="0" style="border:0" allowfullscreen></iframe>
        </div>
    </div>
</div>