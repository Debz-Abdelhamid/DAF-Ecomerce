@php
    $categories = \App\Models\Category::where('status', 1)
    ->with(['subcategories' => function($query){
            $query->where('status', 1)
        ->with(['childCategories' => function($query){
            $query->where('status', 1);
        }]);
    }])
    ->get();


@endphp

    <nav class="wsus__main_menu d-none d-lg-block">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="relative_contect d-flex">
                        <div class="wsus_menu_category_bar">
                            <i class="far fa-bars"></i>
                        </div>
                       
                        
                        <ul class="wsus_menu_cat_item show_home toggle_menu">
                            

                            @foreach($categories as $category)
                            <li><a class="{{count($category->subcategories) > 0 ? 'wsus__droap_arrow' : ''}}" href="{{ route('products.index', ['category' =>$category->slug ]) }}"><i class="{{ $category->icon }}"></i> {{ $category->name }} </a>
                                @if(count($category->subcategories) > 0)
                                    <ul class="wsus_menu_cat_droapdown">
                                        @foreach($category->subcategories as $subcategory)

                                        <li><a href="{{ route('products.index', ['subcategory' => $subcategory->slug ]) }}">{{ $subcategory->name }} <i class="{{count($subcategory->childCategories) > 0 ? 'fas fa-angle-right' : '' }}"></i></a>
                                            @if(count($subcategory->childCategories) > 0)
                                                <ul class="wsus__sub_category">
                                                    @foreach($subcategory->childCategories as $childcategory)

                                                    <li><a href="{{ route('products.index', ['childcategory' => $childcategory->slug ]) }}">{{ $childcategory->name }}</a></li>

                                                    @endforeach
                                                </ul>
                                            @endif
                                        </li>
                                        @endforeach

                                    </ul>
                                @endif
                            </li>
                            @endforeach

                        </ul>
                        

                        <ul class="wsus__menu_item">
                            <li><a class="active" href="{{ route('home') }}">home</a></li>
                            <li><a href="{{ route('product-tracking.index') }}">track order</a></li>

                        </ul>
                        <ul class="wsus__menu_item wsus__menu_item_right">

                            <li><a href="contact.html">contact</a></li>

                            @if(auth()->check())

                                @if(auth()->user()->role == 'user')

                                    <li><a href="{{ route('user.dashboard') }}">My Account</a></li>

                                @elseif(auth()->user()->role == 'vendor')
                                    <li><a href="{{ route('vendor.dashboard') }}">My Account</a></li>

                                @elseif(auth()->user()->role == 'admin')

                                    <li><a href="{{ route('admin.dashboard') }}">My Account</a></li>

                                @endif

                            @else

                                <li><a href="{{ route('login') }}">login</a></li>

                            @endif
                            
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </nav>


    <section id="wsus__mobile_menu">
        <span class="wsus__mobile_menu_close"><i class="fal fa-times"></i></span>
        <ul class="wsus__mobile_menu_header_icon d-inline-flex">

            
        </ul>
        <form action="{{ route('products.index') }}" method="GET">
            <input type="text" name="search" placeholder="Search">
            <button type="submit"><i class="far fa-search"></i></button>
        </form>

        <ul class="mb-3 nav nav-pills" id="pills-tab" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home"
                    role="tab" aria-controls="pills-home" aria-selected="true">Categories</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-profile"
                    role="tab" aria-controls="pills-profile" aria-selected="false">main menu</button>
            </li>
        </ul>
        <div class="tab-content" id="pills-tabContent">
            <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                <div class="wsus__mobile_menu_main_menu">
                    <div class="accordion accordion-flush" id="accordionFlushExample">
                        <ul class="wsus_mobile_menu_category">
                            
                            @foreach($categories as $categoryItem)
                            <li><a href="#" class="{{ count($categoryItem->subcategories) > 0 ? 'accordion-button' : '' }} collapsed" data-bs-toggle="collapse"
                                    data-bs-target="#flush-collapseThreew-{{$loop->index}}" aria-expanded="false"
                                    aria-controls="flush-collapseThreew-{{$loop->index}}"><i class="{{ $categoryItem->icon }}"></i> {{ $categoryItem->name }}</a>

                                    @if(count($categoryItem->subcategories) > 0)
                                        <div id="flush-collapseThreew-{{$loop->index}}" class="accordion-collapse collapse"
                                            data-bs-parent="#accordionFlushExample">
                                            <div class="accordion-body">
                                                <ul>
                                                    @foreach($categoryItem->subcategories as $subcategoryItem)
                                                        <li><a href="#">{{ $subcategoryItem->name }}</a></li>
                                                    @endforeach

                                                </ul>
                                            </div>
                                        </div>
                                    @endif
                            </li>
                            @endforeach

                            
                        </ul>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                <div class="wsus__mobile_menu_main_menu">
                    <div class="accordion accordion-flush" id="accordionFlushExample2">
                        <ul>
                            <li><a href="{{ route('home') }}">Home</a></li>
                            <li><a href="{{ route('product-tracking.index') }}">track order</a></li>

                            @if(auth()->check())

                                @if(auth()->user()->role == 'user')

                                    <li><a href="{{ route('user.dashboard') }}">My Account</a></li>

                                @elseif(auth()->user()->role == 'vendor')
                                    <li><a href="{{ route('vendor.dashboard') }}">My Account</a></li>

                                @elseif(auth()->user()->role == 'admin')

                                    <li><a href="{{ route('admin.dashboard') }}">My Account</a></li>

                                @endif

                            @else

                                <li><a href="{{ route('login') }}">login</a></li>

                            @endif

                            
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
