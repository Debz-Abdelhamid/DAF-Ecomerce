@extends('frontend.dashboard.layouts.master')

@section('title')
    {{$settings->site_name}} &mdash; Address
@endsection

@section('content')

<section id="wsus__dashboard">
    <div class="container-fluid">
        @include('frontend.dashboard.layouts.sidebard')
    
            
        <div class="row">
            <div class="col-xl-9 col-xxl-10 col-lg-9 ms-auto">
              <div class="dashboard_content mt-2 mt-md-0">
                <h3><i class="fal fa-gift-card"></i>Update Address</h3>
                <div class="wsus__dashboard_add wsus__add_address">
                  <form action="{{ route('user.address.update', $address) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="row">
                      <div class="col-xl-6 col-md-6">
                        <div class="wsus__add_address_single">
                          <label>name <b>*</b></label>
                          <input type="text" placeholder="Name" name="name" value="{{ old('name', $address->name) }}">
                        </div>
                      </div>
                      <div class="col-xl-6 col-md-6">
                        <div class="wsus__add_address_single">
                          <label>email</label>
                          <input type="email" placeholder="Email" name="email" value="{{ old('email', $address->email) }}">
                        </div>
                      </div>
                      <div class="col-xl-6 col-md-6">
                        <div class="wsus__add_address_single">
                          <label>phone <b>*</b></label>
                          <input type="text" placeholder="Phone" name="phone" value="{{ old('phone', $address->phone) }}">
                        </div>
                      </div>
                      <div class="col-xl-6 col-md-6">
                        <div class="wsus__add_address_single">
                          <label>country <b>*</b></label>
                          <div class="wsus__topbar_select">
                            <select class="select_2" name="country">
                              <option>Select</option>

                              @foreach(config('settings.country_list') as $country)
                                <option {{ $address->country == $country ? 'selected' : '' }} value="{{ $country }}">{{ $country }}</option>
                              @endforeach
                              
                            </select>
                          </div>
                        </div>
                      </div>

                      <div class="col-xl-6 col-md-6">
                        <div class="wsus__add_address_single">
                          <label>State<b>*</b></label>
                          <input type="text" placeholder="State" name="state" value="{{ old('state', $address->state) }}">
                        </div>
                      </div>

                      <div class="col-xl-6 col-md-6">
                        <div class="wsus__add_address_single">
                          <label>City<b>*</b></label>
                          <input type="text" placeholder="City" name="city" value="{{ old('city', $address->city) }}">
                        </div>
                      </div>

                     
                      <div class="col-xl-6 col-md-6">
                        <div class="wsus__add_address_single">
                          <label>zip code <b>*</b></label>
                          <input type="text" placeholder="Zip Code" name="zip" value="{{ old('zip', $address->zip) }}">
                        </div>
                      </div>

                      <div class="col-xl-6 col-md-6">
                        <div class="wsus__add_address_single">
                          <label>Address<b>*</b></label>
                          <input type="text" placeholder="Address" name="address" value="{{ old('address', $address->address) }}">
                        </div>
                      </div>
                      
                      
                      <div class="col-xl-6">
                        <button type="submit" class="common_btn">Update</button>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
            </div>
        </div>     
              
            
          
    </div>
  </section>

@endsection