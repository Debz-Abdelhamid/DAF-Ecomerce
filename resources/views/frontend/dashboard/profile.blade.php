@extends('frontend.dashboard.layouts.master')


@section('title')
    {{$settings->site_name}} &mdash; Profile
@endsection

@section('content')

  <!--=============================
    DASHBOARD START
  ==============================-->
  <section id="wsus__dashboard">
    <div class="container-fluid">
      @include('frontend.dashboard.layouts.sidebard')
      

      <div class="row">
        <div class="col-xl-9 col-xxl-10 col-lg-9 ms-auto">
          <div class="dashboard_content mt-2 mt-md-0">
            <h3><i class="far fa-user"></i> profile</h3>
            <div class="wsus__dashboard_profile">
              <div class="wsus__dash_pro_area">
                <h4>Profile Avatar</h4>
                
                  
                    <div class="col-md-12">

                        <div class="p-1">
                            <form action="{{ route('user.profile.updateAvatar') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PATCH')
                                <div class="col-md-2">
                                    <div class="wsus__dash_pro_img">
                                        <img src="{{ $user->image ? asset("storage/".$user->image) : asset('frontend/images/ts-2.jpg') }}" alt="img" class="img-fluid w-100">
                                        <input type="file" name="image" required>
                                    </div>

                                    <div class="col-xl-12 mt-3">
                                        <button class="common_btn mb-4 mt-2" type="submit">Save Avatar</button>
                                    </div>
                                </div>
                                
                            </form>    
                        </div>

                        <div class="p-1">

                            <form action="{{ route('user.profile.update') }}" method="POST">
                                @csrf
                                @method('PATCH')

                                <div class="col-md-12 mt-5">
                                <h4>Profile Information</h4>

                                <div class="wsus__dash_pro_single">
                                    <i class="fas fa-user-tie"></i>
                                    <input type="text" name="name" value="{{ old('name', $user->name) }}" placeholder="Name">
                                </div>
                                
                                </div>
                                
                                <div class="col-md-12">
                                <div class="wsus__dash_pro_single">
                                    <i class="fal fa-envelope-open"></i>
                                    <input type="email" name="email" value="{{ old('email', $user->email) }}" placeholder="Email">
                                </div>
                                
                                </div>
                            
                            
                                <div class="col-xl-12">
                                    <button class="common_btn mb-4 mt-2" type="submit">Save</button>
                                </div>
                            </form>
                        </div>
             
                    </div>
                   



                    <div class="wsus__dash_pass_change mt-2">
                        <form action="{{ route('user.profile.Password') }}" method="POST">
                            @csrf
                            @method('PUT')

                            <div class="row">
                                <h4>Update Password</h4>
                                <div class="col-xl-4 col-md-6">
                                <div class="wsus__dash_pro_single">
                                    <i class="fas fa-unlock-alt"></i>
                                    <input id="update_password_current_password" type="password" name="current_password" placeholder="Current Password">
                                </div>
                                </div>
                                <div class="col-xl-4 col-md-6">
                                <div class="wsus__dash_pro_single">
                                    <i class="fas fa-lock-alt"></i>
                                    <input id="update_password_password" type="password" name="password" placeholder="New Password">
                                </div>
                                </div>
                                <div class="col-xl-4">
                                <div class="wsus__dash_pro_single">
                                    <i class="fas fa-lock-alt"></i>
                                    <input id="update_password_password_confirmation" type="password" name="password_confirmation" placeholder="Confirm Password">
                                </div>
                                </div>
                                <div class="col-xl-12">
                                <button class="common_btn" type="submit">Save</button>
                                </div>
                            </div>
                        </form>
                    </div>
                  
               
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!--=============================
    DASHBOARD START
  ==============================-->

@endsection