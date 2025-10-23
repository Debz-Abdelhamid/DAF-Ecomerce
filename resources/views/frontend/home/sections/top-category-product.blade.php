@php
    
    $popularCategories = isset($popularCategory->value) ? json_decode($popularCategory->value, true) : [];
@endphp



<section id="wsus__monthly_top" class="wsus__monthly_top_2 p-2">
    <div class="container">
        <div class="row">
            <div class="col-xl-12">

                @if(App::getLocale() == 'ar')

                <div class="wsus__section_header for_md" dir="rtl">
                    <h3> @lang('navbar.Popular_Categories') :</h3>
                    <div class="monthly_top_filter">
                        @php
                            
                            $products = [];
                        @endphp
                        
                       
                        @if(is_array($popularCategories) && !empty($popularCategories))
                            @foreach($popularCategories as $popularcat)
                                @php
                                    $lastkey = [];

                                    
                                    if (is_array($popularcat)) {
                                        foreach ($popularcat as $key => $category) {
                                            if ($category === null) {
                                                break;
                                            }

                                            
                                            $lastkey = [$key => $category]; 
                                        }
                                    }

                                    
                                    if (!empty($lastkey)) {
                                        $categoryType = array_key_first($lastkey);
                                        $categoryId = $lastkey[$categoryType];

                                        
                                        switch ($categoryType) {
                                            case 'category':
                                                $category = \App\Models\Category::find($categoryId);
                                                $products[] = \App\Models\Product::with(['galleries' => function($query) {
                                                        $query->take(1);
                                                    }])
                                                    ->where('is_approved', 1)
                                                    ->where('status', 1)
                                                    ->where('category_id', $category->id)
                                                    ->take(12)
                                                    ->orderBy('id', 'DESC')
                                                    ->get();
                                                break;
                                            case 'sub_category':
                                                $category = \App\Models\Subcategory::find($categoryId);
                                                $products[] = \App\Models\Product::with(['galleries' => function($query) {
                                                        $query->take(1);
                                                    }])
                                                    ->where('is_approved', 1)
                                                    ->where('status', 1)
                                                    ->where('subcategory_id', $category->id)
                                                    ->take(12)
                                                    ->orderBy('id', 'DESC')
                                                    ->get();
                                                break;
                                            case 'child_category':
                                                $category = \App\Models\ChildCategory::find($categoryId);
                                                $products[] = \App\Models\Product::with(['galleries' => function($query) {
                                                        $query->take(1);
                                                    }])
                                                    ->where('is_approved', 1)
                                                    ->where('status', 1)
                                                    ->where('childcategory_id', $category->id)
                                                    ->take(12)
                                                    ->orderBy('id', 'DESC')
                                                    ->get();
                                                break;
                                        }
                                    }
                                @endphp

                                
                                @if(isset($category))
                                <button class="{{ $loop->index == 0 ? 'auto_click active' : '' }}" data-filter=".category-{{ $loop->index }}">
                                        {{ $category->name }}
                                    </button>

                                @endif
                            @endforeach
                        @else
                            <p>Aucune catégorie populaire trouvée</p>
                        @endif
                    </div>
                </div>

                @else

                <div class="wsus__section_header for_md">
                    <h3> @lang('navbar.Popular_Categories') :</h3>
                    <div class="monthly_top_filter">
                        @php
                            
                            $products = [];
                        @endphp
                        
                        
                        @if(is_array($popularCategories) && !empty($popularCategories))
                            @foreach($popularCategories as $popularcat)
                                @php
                                    $lastkey = [];

                                    
                                    if (is_array($popularcat)) {
                                        foreach ($popularcat as $key => $category) {
                                            if ($category === null) {
                                                break;
                                            }

                                            
                                            $lastkey = [$key => $category]; 
                                        }
                                    }

                                    
                                    if (!empty($lastkey)) {
                                        $categoryType = array_key_first($lastkey);
                                        $categoryId = $lastkey[$categoryType];

                                        
                                        switch ($categoryType) {
                                            case 'category':
                                                $category = \App\Models\Category::find($categoryId);
                                                $products[] = \App\Models\Product::with(['galleries' => function($query) {
                                                        $query->take(1);
                                                    }])
                                                    ->where('is_approved', 1)
                                                    ->where('status', 1)
                                                    ->where('category_id', $category->id)
                                                    ->take(12)
                                                    ->orderBy('id', 'DESC')
                                                    ->get();
                                                break;
                                            case 'sub_category':
                                                $category = \App\Models\Subcategory::find($categoryId);
                                                $products[] = \App\Models\Product::with(['galleries' => function($query) {
                                                        $query->take(1);
                                                    }])
                                                    ->where('is_approved', 1)
                                                    ->where('status', 1)
                                                    ->where('subcategory_id', $category->id)
                                                    ->take(12)
                                                    ->orderBy('id', 'DESC')
                                                    ->get();
                                                break;
                                            case 'child_category':
                                                $category = \App\Models\ChildCategory::find($categoryId);
                                                $products[] = \App\Models\Product::with(['galleries' => function($query) {
                                                        $query->take(1);
                                                    }])
                                                    ->where('is_approved', 1)
                                                    ->where('status', 1)
                                                    ->where('childcategory_id', $category->id)
                                                    ->take(12)
                                                    ->orderBy('id', 'DESC')
                                                    ->get();
                                                break;
                                        }

                                    }
                                @endphp

                                
                                @if(isset($category))
                                <button class="{{ $loop->index == 0 ? 'auto_click active' : '' }}" data-filter=".category-{{ $loop->index }}">
                                        {{ $category->name }}
                                    </button>

                                @endif
                            @endforeach
                        @else
                            <p>Aucune catégorie populaire trouvée</p>
                        @endif
                    </div>
                </div>

                @endif


            </div>
        </div>

        <div class="row">
            <div class="col-xl-12 col-lg-12">
                <div class="row grid">
                   
                    @if(!empty($products))
                        @foreach($products as $key => $product)
                            @foreach($product as $item)
                                <div class="col-xl-3 col-6 col-sm-6 col-md-4 col-lg-3 category-{{ $key }}">
                                    <div class="wsus__product_item">
                                        <a class="wsus__pro_link" href="{{route('product-detail', $item->slug)}}">
                                                <img src="{{ asset('storage/' . $item->thumb_image) }}" alt="product image"
                                                class="img-fluid object-fit-cover w-100 img_1">
                                                @if ($item->galleries->isNotEmpty())
                                                        <img src="{{ asset('storage/' . $item->galleries->first()->image) }}" alt="product" class="img-fluid w-100 img_2" />
                                                @else
                                                        <img src="{{ asset('storage/' . $item->thumb_image) }}" alt="product" class="img-fluid w-100 img_2" />
                                                @endif
                                        </a>
                                            <div class="wsus__product_details mt-3">
                                                <a class="wsus__pro_name">{!! limitText($item->name) !!}</a>
                                                
                                                @if(checkDiscount($item))
                                                    <p class="wsus__tk"> <span class='text-danger'> <b> {{ $item->offer_price }} {{ $settings->currency_icon }}<del>{{ $item->price_60 }} {{ $settings->currency_icon }}</del> </b><span class="text-danger"> <b>/Mois </b> </span></p></span>
                                                @else
                                                    <p class="wsus__tk"> <span class='text-danger'> <b>{{ $item->price_60 }} {{ $settings->currency_icon }}</b> <span class="text-danger"> <b>/Mois </b> </span></p></span> 
                                                @endif
                                            </div>
                                    </div>
                                </div>
                            @endforeach
                        @endforeach
                    @else
                        <p>Aucun produit disponible pour ces catégories</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>

