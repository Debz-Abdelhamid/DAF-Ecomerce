<div class="dashboard_sidebar">
    <span class="close_icon">
      <i class="far fa-bars dash_bar"></i>
      <i class="far fa-times dash_close"></i>
    </span>
    <a href="dsahboard.html" class="dash_logo"><img src="images/logo.png" alt="logo" class="img-fluid"></a>
    <ul class="dashboard_link">
      <li><a class="{{setActive(['user.dashboard'])}}" href="{{ route('user.dashboard') }}"><i class="fas fa-tachometer"></i>Dashboard</a></li>

      <li><a class="" href="{{ route('home') }}"><i class="fas fa-home"></i>Go To Home</a></li>

      <li><a class="{{setActive(['user.orders.*'])}}" href="{{ route('user.orders.index') }}"><i class="fas fa-list-ul"></i> Orders</a></li>
      <li><a class="{{setActive(['user.address.*'])}}" href="{{ route('user.address.index') }}"><i class="fas fa-address-card"></i> Addresses</a></li>
      <li><a class="{{setActive(['user.profile'])}}" href="{{ route('user.profile') }}"><i class="far fa-user"></i> My Profile</a></li>
      <li>
        <form method="POST" action="{{ route('logout') }}">
          @csrf
          <a href="{{ route('logout') }}" onclick="event.preventDefault();
                    this.closest('form').submit();" ><i class="far fa-sign-out-alt"></i> Log out</a>
          
        </form>
      </li>

    </ul>
</div>