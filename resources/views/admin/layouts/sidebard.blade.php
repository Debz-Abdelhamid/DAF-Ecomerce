<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
      <div class="sidebar-brand">
        <a href="index.html">Stisla</a>
      </div>
      <div class="sidebar-brand sidebar-brand-sm">
        <a href="index.html">St</a>
      </div>

      <ul class="sidebar-menu">
        <li class="menu-header">Dashboard</li>
        <li class="dropdown active">
          <a href="{{ route('admin.dashboard') }}" class="nav-link"><i class="fas fa-fire"></i><span>Dashboard</span></a>

        </li>
        <li class="menu-header">Starter</li>


        <li class="dropdown {{ setActive([
          'admin.category.*',
          'admin.sub-category.*',
          'admin.child-category.*'

        ]) }}">
            <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i> <span>Manage Categories</span></a>
            <ul class="dropdown-menu">
              <li class="{{setActive(['admin.category.*'])}}"><a class="nav-link" href="{{ route('admin.category.index') }}">Category</a></li>
              <li class="{{setActive(['admin.sub-category.*'])}}"><a class="nav-link" href="{{ route('admin.sub-category.index') }}">Sub Category</a></li>
              <li class="{{setActive(['admin.child-category.*'])}}"><a class="nav-link" href="{{ route('admin.child-category.index') }}">Child Category</a></li>

            </ul>
        </li>


        <li class="dropdown {{ setActive([
            'admin.order.*',
            'admin.order-pending',
            'admin.order-destribution',
            'admin.order-delivered',
            'admin.order-canceled',
            
  
          ]) }}">
              <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i> <span>Orders</span></a>
              <ul class="dropdown-menu">
                <li class="{{setActive(['admin.order.*'])}}"><a class="nav-link" href="{{ route('admin.order.index') }}">All Orders</a></li>
                <li class="{{setActive(['admin.order-pending'])}}"><a class="nav-link" href="{{ route('admin.order-pending') }}">All Pending Orders</a></li>
                <li class="{{setActive(['admin.order-destribution'])}}"><a class="nav-link" href="{{ route('admin.order-destribution') }}">All Destribution Orders</a></li>
                <li class="{{setActive(['admin.order-delivered'])}}"><a class="nav-link" href="{{ route('admin.order-delivered') }}">All Delivered Orders</a></li>
                <li class="{{setActive(['admin.order-canceled'])}}"><a class="nav-link" href="{{ route('admin.order-canceled') }}">All Canceled Orders</a></li>
  
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
            <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i> <span>Manage Products</span></a>
            <ul class="dropdown-menu">
              <li class="{{setActive(['admin.brand.*'])}}"><a class="nav-link" href="{{ route('admin.brand.index') }}">Brands</a></li>
              <li class="{{setActive([
              'admin.product.*',
              'admin.product-image-gallery.*',
              'admin.product-variant.*',
              'admin.product-variant-item.*',


              ])}}"><a class="nav-link" href="{{ route('admin.product.index') }}">Product</a></li>
              <li class="{{setActive(['admin.seller-products.*'])}}"><a class="nav-link" href="{{ route('admin.seller-products.index') }}">Seller Products</a></li>
              <li class="{{setActive(['admin.seller-pending-products.*'])}}"><a class="nav-link" href="{{ route('admin.seller-pending-products.index') }}">Seller Pending Products</a></li>

            </ul>
        </li>


        <li class="dropdown {{ setActive([
            'admin.flash-sale.*',
            

          ]) }}">
            <a href="#" class="nav-link has-dropdown" phpdata-toggle="dropdown"><i class="fas fa-columns"></i> <span>Ecommerce</span></a>
            <ul class="dropdown-menu">
              <li class="{{setActive(['admin.flash-sale.*'])}}"><a class="nav-link" href="{{ route('admin.flash-sale.index') }}">Flash Sale</a></li>
            </ul>
        </li>

        <li class="dropdown {{ setActive([
          'admin.slider.*',
          'admin.home-page-setting'

        ]) }}">
          <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i> <span>Manage Website</span></a>
          <ul class="dropdown-menu">
            <li class="{{setActive(['admin.slider.*'])}}"><a class="nav-link" href="{{ route('admin.slider.index') }}">Slider</a></li>
            <li class="{{setActive(['admin.home-page-setting'])}}"><a class="nav-link" href="{{ route('admin.home-page-setting') }}">Home Page Setting</a></li>

          </ul>
        </li>


        <li class="dropdown {{ setActive([
            'admin.users.*',
            

        ]) }}">
          <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i> <span>All Admins</span></a>
          <ul class="dropdown-menu">
            <li class="{{setActive(['admin.users.*'])}}"><a class="nav-link" href="{{ route('admin.users.index') }}">Admins</a></li>
           

          </ul>
        </li>


        <li><a class="nav-link" href="{{route('home')}}"><i class="fas fa-home"></i><span>Home</span></a></li>
        <li><a class="nav-link" href="{{route('admin.settings.index')}}"><i class="fas fa-cog"></i><span>Settings</span></a></li>



        


        

      </ul>


    </aside>
</div>