
@extends('frontend.layouts.master')

@section('title')
    {{$settings->site_name}} &mdash; Login
@endsection

@section('content')
  <!--============================
         BREADCRUMB START
    ==============================-->
    <section id="wsus__breadcrumb">
        <div class="wsus_breadcrumb_overlay">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <h4>login / register</h4>
                        <ul>
                            <li><a href="#">home</a></li>
                            <li><a href="#">login / register</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--============================
        BREADCRUMB END
    ==============================-->


    <!--============================
       LOGIN/REGISTER PAGE START
    ==============================-->
    <section id="wsus__login_register">
        <div class="container">
            <div class="row">
                <div class="col-xl-5 m-auto">
                    <div class="wsus__login_reg_area">
                        
                        <div class="tab-content" id="pills-tabContent2">
                            <div class="tab-pane fade show active" id="pills-homes" role="tabpanel"
                                aria-labelledby="pills-home-tab2">
                                <div class="wsus__login">
                                    <form action="{{ route('login') }}" method="POST">
                                        @csrf

                                        <div class="wsus__login_input">
                                            <i class="fas fa-user-tie"></i>
                                            <input type="email" id="email" name="email" placeholder="Email" value="{{old('email')}}">
                                        </div>
                                        <div class="wsus__login_input">
                                            <i class="fas fa-key"></i>
                                            <input type="password" id="password" name="password" placeholder="Password">
                                        </div>
                                        <div class="wsus__login_save">
                                            <div class="form-check form-switch">
                                                <input id="remember_me" class="form-check-input" type="checkbox" name="remember"
                                                    id="flexSwitchCheckDefault">
                                                <label class="form-check-label" for="flexSwitchCheckDefault">{{ __('Remember me') }}</label>
                                            </div>
                                            <a class="forget_p" href="{{ route('password.request') }}">{{ __('forget password') }}</a>
                                        </div>
                                        <button class="common_btn" type="submit">login</button>
                                        {{--<p class="social_text">Sign in with social account</p>
                                        <ul class="wsus__login_link">
                                            <li><a href="#"><i class="fab fa-google"></i></a></li>
                                            <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                            <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                            <li><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
                                        </ul>--}}
                                    </form>
                                </div>
                            </div>
                          
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--============================
       LOGIN/REGISTER PAGE END
    ==============================-->
@endsection



