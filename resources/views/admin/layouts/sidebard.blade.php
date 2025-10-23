<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
      <div class="sidebar-brand">
      <a class="wsus__header_logo" href="{{ route('home') }}">
                        <img style="width: 50%;" src="{{asset('frontend/images/DAF.svg')}}" alt="logo" class="img-fluid  relative ">
                    </a>
      </div>
      <div class="sidebar-brand sidebar-brand-sm">
        <a href="index.html">Logo</a>
      </div>

      <ul class="sidebar-menu">
        <li class="menu-header">Dashboard</li>
        <li class="dropdown active">
          <a href="{{ route('admin.dashboard') }}" class="nav-link"><i class="fas fa-fire"></i><span>Dashboard</span></a>

        </li>
        <li class="menu-header">@lang('admin.Starter')</li>


        <li class="dropdown {{ setActive([
          'admin.category.*',
          'admin.sub-category.*',
          'admin.child-category.*'

        ]) }}">
            <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-tags"></i> <span>@lang('admin.ManageCategories') </span></a>
            <ul class="dropdown-menu">
              <li class="{{setActive(['admin.category.*'])}}"><a class="nav-link" href="{{ route('admin.category.index') }}">@lang('admin.Category')</a></li>
              <li class="{{setActive(['admin.sub-category.*'])}}"><a class="nav-link" href="{{ route('admin.sub-category.index') }}">@lang('admin.SubCategory') </a></li>
              <li class="{{setActive(['admin.child-category.*'])}}"><a class="nav-link" href="{{ route('admin.child-category.index') }}">@lang('admin.ChildCategory') </a></li>

            </ul>
        </li>


        <li class="dropdown {{ setActive([
            'admin.order.*',
            'admin.order-pending',
            'admin.order-destribution',
            'admin.order-delivered',
            'admin.order-canceled',
            
  
          ]) }}">
              <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-box"></i> <span>@lang('admin.Orders')</span></a>
              <ul class="dropdown-menu">
                <li class="{{setActive(['admin.order.*'])}}"><a class="nav-link" href="{{ route('admin.order.index') }}">@lang('admin.AllOrders') </a></li>
                <li class="{{setActive(['admin.order-pending'])}}"><a class="nav-link" href="{{ route('admin.order-pending') }}">@lang('admin.AllPendingOrders') </a></li>
                <li class="{{setActive(['admin.order-destribution'])}}"><a class="nav-link" href="{{ route('admin.order-destribution') }}">@lang('admin.AllDestributionOrders')</a></li>
                <li class="{{setActive(['admin.order-delivered'])}}"><a class="nav-link" href="{{ route('admin.order-delivered') }}">@lang('admin.AllDeliveredOrders') </a></li>
                <li class="{{setActive(['admin.order-canceled'])}}"><a class="nav-link" href="{{ route('admin.order-canceled') }}">@lang('admin.AllCanceledOrders') </a></li>
  
              </ul>
        </li>



        <li class="dropdown {{ setActive([
            'admin.brand.*',
            'admin.product.*',
            'admin.product-image-gallery.*',
            'admin.product-variant.*',
            'admin.product-variant-item.*',
            'admin.seller-products.*',
            'admin.seller-pending-products.*',

          ]) }}">
            <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-list-alt"></i> <span>@lang('admin.ManageProducts') </span></a>
            <ul class="dropdown-menu">
              <li class="{{setActive(['admin.brand.*'])}}"><a class="nav-link" href="{{ route('admin.brand.index') }}">@lang('admin.Brands')</a></li>
              <li class="{{setActive([
              'admin.product.*',
              'admin.product-image-gallery.*',
              'admin.product-variant.*',
              'admin.product-variant-item.*',


              ])}}"><a class="nav-link" href="{{ route('admin.product.index') }}">@lang('admin.Product')</a></li>
              <li class="{{setActive(['admin.seller-products.*'])}}"><a class="nav-link" href="{{ route('admin.seller-products.index') }}">@lang('admin.SellerProducts') </a></li>
              <li class="{{setActive(['admin.seller-pending-products.*'])}}"><a class="nav-link" href="{{ route('admin.seller-pending-products.index') }}">@lang('admin.SellerPendingProducts')  </a></li>

            </ul>
        </li>


        <li class="dropdown {{ setActive([
            'admin.flash-sale.*',
            

          ]) }}">
            <a href="#" class="nav-link has-dropdown" phpdata-toggle="dropdown"><i class="fas fa-shopping-bag"></i> <span>@lang('admin.Ecommerce')</span></a>
            <ul class="dropdown-menu">
              <li class="{{setActive(['admin.flash-sale.*'])}}"><a class="nav-link" href="{{ route('admin.flash-sale.index') }}">@lang('admin.FlashSale') </a></li>
            </ul>
        </li>

        <li class="dropdown {{ setActive([
          'admin.slider.*',
          'admin.home-page-setting'

        ]) }}">
          <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-cogs"></i> <span>@lang('admin.ManageWebsite') </span></a>
          <ul class="dropdown-menu">
            <li class="{{setActive(['admin.slider.*'])}}"><a class="nav-link" href="{{ route('admin.slider.index') }}">@lang('admin.Slider')</a></li>
            <li class="{{setActive(['admin.home-page-setting'])}}"><a class="nav-link" href="{{ route('admin.home-page-setting') }}">@lang('admin.HomePageSetting')  </a></li>

          </ul>
        </li>


        <li class="dropdown {{ setActive([
            'admin.users.*',
            

        ]) }}">
          <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-user-shield"></i> <span>@lang('admin.AllAdmins')</span></a>
          <ul class="dropdown-menu">
            <li class="{{setActive(['admin.users.*'])}}"><a class="nav-link" href="{{ route('admin.users.index') }}">@lang('admin.AllAdmins')</a></li>
           

          </ul>
        </li>




        <li><a class="" href="{{ route('home') }}"><i class="fas fa-home"></i>@lang('vendor.GoToHome')</a></li>
        


        

      </ul>


    </aside>
</div>