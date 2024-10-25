@php
    // Decode the popularCategory value only if it exists and is not null
    $popularCategories = isset($popularCategory->value) ? json_decode($popularCategory->value, true) : [];
@endphp

<section id="wsus__monthly_top" class="wsus__monthly_top_2">
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <div class="wsus__section_header for_md">
                    <h3>Popular Categories</h3>
                    <div class="monthly_top_filter">
                        @php
                            // Initialize an empty products array
                            $products = [];
                        @endphp
                        
                        <!-- Check if $popularCategories is an array -->
                        @if(is_array($popularCategories) && !empty($popularCategories))
                            @foreach($popularCategories as $popularcat)
                                @php
                                    $lastkey = [];

                                    // Ensure $popularcat is an array and process it
                                    if (is_array($popularcat)) {
                                        foreach ($popularcat as $key => $category) {
                                            if ($category === null) {
                                                break;
                                            }

                                            // Set the last non-null category
                                            $lastkey = [$key => $category]; 
                                        }
                                    }

                                    // Check if $lastkey is not empty and then determine the category type
                                    if (!empty($lastkey)) {
                                        $categoryType = array_key_first($lastkey);
                                        $categoryId = $lastkey[$categoryType];

                                        // Fetch the category and related products based on the type
                                        switch ($categoryType) {
                                            case 'category':
                                                $category = \App\Models\Category::find($categoryId);
                                                $products[] = \App\Models\Product::where('category_id', $category->id)->take(12)->orderBy('id', 'DESC')->get();
                                                break;
                                            case 'sub_category':
                                                $category = \App\Models\Subcategory::find($categoryId);
                                                $products[] = \App\Models\Product::where('subcategory_id', $category->id)->take(12)->orderBy('id', 'DESC')->get();
                                                break;
                                            case 'child_category':
                                                $category = \App\Models\ChildCategory::find($categoryId);
                                                $products[] = \App\Models\Product::where('childcategory_id', $category->id)->take(12)->orderBy('id', 'DESC')->get();
                                                break;
                                        }
                                    }
                                @endphp

                                <!-- Check if $category exists before displaying the button -->
                                @if(isset($category))
                                    <button class="{{ $loop->index == 0 ? 'auto_click active' : '' }}" data-filter=".category-{{ $loop->index }}">
                                        {{ $category->name }}
                                    </button>
                                @endif
                            @endforeach
                        @else
                            <p>No popular categories found.</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-xl-12 col-lg-12">
                <div class="row grid">
                    <!-- Check if products array is populated -->
                    @if(!empty($products))
                        @foreach($products as $key => $product)
                            @foreach($product as $item)
                                <div class="col-xl-2 col-6 col-sm-6 col-md-4 col-lg-3 category-{{ $key }}">
                                    <a class="wsus__hot_deals__single" href="#">
                                        <div class="wsus__hot_deals__single_img">
                                            <img src="{{ asset('storage/' . $item->thumb_image) }}" alt="product image" class="img-fluid w-100">
                                        </div>
                                        <div class="wsus__hot_deals__single_text mt-3">
                                            <h5>{!! limitText($item->name) !!}</h5>
                                            
                                            @if(checkDiscount($item))
                                                <p class="wsus__tk">{{ $item->offer_price }} {{ $settings->currency_icon }}<del>{{ $item->price }} {{ $settings->currency_icon }}</del></p>
                                            @else
                                                <p class="wsus__tk">{{ $item->price }} {{ $settings->currency_icon }}</p>
                                            @endif
                                        </div>
                                    </a>
                                </div>
                            @endforeach
                        @endforeach
                    @else
                        <p>No products available for these categories.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>
