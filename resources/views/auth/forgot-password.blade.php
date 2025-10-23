@extends('frontend.layouts.master')

@section('title')
    {{$settings->site_name}} &mdash; Forgot Password
@endsection


@section('content')



    <!--============================
        FORGET PASSWORD START
    ==============================-->
    <section id="wsus__login_register">
        <div class="container">
            <div class="row">
                <div class="col-xl-5 m-auto">
                    <div class="wsus__forget_area">
                        <span class="qiestion_icon"><i class="fal fa-question-circle"></i></span>
                        <h4>Mot de passe oublié ? </h4>
                        <div class="wsus__login">
                            <form method="POST" action="{{ route('password.email') }}">
                                @csrf
                                <div class="wsus__login_input">
                                    <i class="fal fa-envelope"></i>
                                    <input id="email" type="email" name="email" value="{{ old('email') }}" placeholder="Adress Email">
                                </div>
                                <button class="common_btn" type="submit">Envoyer</button>
                            </form>
                        </div>
                        <a class="see_btn mt-4" href="{{route('login')}}">Se connecter</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--============================
        FORGET PASSWORD END
    ==============================-->
@endsection

   