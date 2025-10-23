<div class="dashboard_sidebar" >
    <span class="close_icon">
      <i class="far fa-bars dash_bar"></i>
      <i class="far fa-times dash_close"></i>
    </span>
                    <a class="" href="{{ route('vendor.dashboard') }}">
                        <img style="width: 45%;" src="{{asset('frontend/images/DAF.svg')}}" alt="logo" class="img-fluid d-flex justify-content-center align-items-center m-2 w-75  ">
                    </a>
    <ul class="dashboard_link">
      <li><a class="{{setActive(['vendor.dashboard'])}}" href="{{ route('vendor.dashboard') }}"><i class="fas fa-tachometer"></i>Dashboard</a></li>

      <li><a class="" href="{{ route('home') }}"><i class="fas fa-home"></i>@lang('vendor.GoToHome')</a></li>

      <li><a class="{{setActive(['vendor.orders.*'])}}" href="{{ route('vendor.orders.index') }}"><i class="fas fa-box"></i>@lang('vendor.Orders')</a></li>

      <li><a class="{{setActive(['vendor.product.*'])}}" href="{{ route('vendor.product.index') }}"><i class="far fa-cart-plus"></i>@lang('vendor.Products')</a></li>
      
      <li><a class="{{setActive(['vendor.profile'])}}" href="{{ route('vendor.profile') }}"><i class="far fa-user"></i>@lang('vendor.MyProfile') </a></li>

      <li>
        <form method="POST" action="{{ route('logout') }}">
          @csrf
          <a href="{{ route('logout') }}" onclick="event.preventDefault();
                    this.closest('form').submit();" ><i class="far fa-sign-out-alt"></i>@lang('vendor.Logout') </a>

        </form>
      </li>

    </ul>
</div>