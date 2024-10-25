@php
    // Vérification si $popularCategory est un tableau et contient des éléments
    $popularCategory = $popularCategory ?? [];
@endphp

<div class="tab-pane fade show active" id="list-profile" role="tabpanel" aria-labelledby="list-profile-list">
    <div class="border card">
        <div class="card-body">
            <form action="{{ route('admin.popular-category-section') }}" method="POST">
                @csrf
                @method('PUT')
                
                <!-- Category 1 -->
                <h5>Category 1</h5>
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Category</label>
                            <select name="cat_one" class="form-control main_category">
                                <option value="">Select</option>    
                                @foreach($categories as $category)
                                    <option {{ $category->id == ($popularCategory[0]->category ?? '') ? 'selected' : '' }} value="{{ $category->id }}">{{ $category->name }}</option>    
                                @endforeach
                            </select>   
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            @php
                                $subCategories1 = isset($popularCategory[0]) ? \App\Models\Subcategory::where('category_id', $popularCategory[0]->category)->get() : collect(); 
                            @endphp
                            <label>Sub Category</label>
                            <select name="sub_cat_one" class="form-control sub_category">
                                <option value="">Select</option>
                                @foreach($subCategories1 as $subcategory)
                                    <option {{ $subcategory->id == ($popularCategory[0]->sub_category ?? '') ? 'selected' : '' }} value="{{ $subcategory->id }}">{{ $subcategory->name }}</option>
                                @endforeach
                            </select>   
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            @php
                                $childCategories1 = isset($popularCategory[0]) ? \App\Models\ChildCategory::where('subcategory_id', $popularCategory[0]->sub_category)->get() : collect();
                            @endphp
                            <label>Child Category</label>
                            <select name="child_cat_one" class="form-control child_category">
                                <option value="">Select</option>
                                @foreach($childCategories1 as $childcategory)
                                    <option {{ $childcategory->id == ($popularCategory[0]->child_category ?? '') ? 'selected' : '' }} value="{{ $childcategory->id }}">{{ $childcategory->name }}</option>
                                @endforeach
                            </select>   
                        </div>
                    </div>
                </div>

                <!-- Category 2 -->
                <h5>Category 2</h5>
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Category</label>
                            <select name="cat_two" class="form-control main_category">
                                <option value="">Select</option>
                                @foreach($categories as $category)
                                    <option {{ $category->id == ($popularCategory[1]->category ?? '') ? 'selected' : '' }} value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>   
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            @php
                                $subCategories2 = isset($popularCategory[1]) ? \App\Models\Subcategory::where('category_id', $popularCategory[1]->category)->get() : collect();
                            @endphp
                            <label>Sub Category</label>
                            <select name="sub_cat_two" class="form-control sub_category">
                                <option value="">Select</option>
                                @foreach($subCategories2 as $subcategory)
                                    <option {{ $subcategory->id == ($popularCategory[1]->sub_category ?? '') ? 'selected' : '' }} value="{{ $subcategory->id }}">{{ $subcategory->name }}</option>
                                @endforeach
                            </select>   
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            @php
                                $childCategories2 = isset($popularCategory[1]) ? \App\Models\ChildCategory::where('subcategory_id', $popularCategory[1]->sub_category)->get() : collect();
                            @endphp
                            <label>Child Category</label>
                            <select name="child_cat_two" class="form-control child_category">
                                <option value="">Select</option>
                                @foreach($childCategories2 as $childcategory)
                                    <option {{ $childcategory->id == ($popularCategory[1]->child_category ?? '') ? 'selected' : '' }} value="{{ $childcategory->id }}">{{ $childcategory->name }}</option>
                                @endforeach
                            </select>   
                        </div>
                    </div>
                </div>

                <!-- Category 3 -->
                <h5>Category 3</h5>
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Category</label>
                            <select name="cat_three" class="form-control main_category">
                                <option value="">Select</option>
                                @foreach($categories as $category)
                                    <option {{ $category->id == ($popularCategory[2]->category ?? '') ? 'selected' : '' }} value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>   
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            @php
                                $subCategories3 = isset($popularCategory[2]) ? \App\Models\Subcategory::where('category_id', $popularCategory[2]->category)->get() : collect();
                            @endphp
                            <label>Sub Category</label>
                            <select name="sub_cat_three" class="form-control sub_category">
                                <option value="">Select</option>
                                @foreach($subCategories3 as $subcategory)
                                    <option {{ $subcategory->id == ($popularCategory[2]->sub_category ?? '') ? 'selected' : '' }} value="{{ $subcategory->id }}">{{ $subcategory->name }}</option>
                                @endforeach
                            </select>   
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            @php
                                $childCategories3 = isset($popularCategory[2]) ? \App\Models\ChildCategory::where('subcategory_id', $popularCategory[2]->sub_category)->get() : collect();
                            @endphp
                            <label>Child Category</label>
                            <select name="child_cat_three" class="form-control child_category">
                                <option value="">Select</option>
                                @foreach($childCategories3 as $childcategory)
                                    <option {{ $childcategory->id == ($popularCategory[2]->child_category ?? '') ? 'selected' : '' }} value="{{ $childcategory->id }}">{{ $childcategory->name }}</option>
                                @endforeach
                            </select>   
                        </div>
                    </div>
                </div>

                <!-- Category 4 -->
                <h5>Category 4</h5>
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Category</label>
                            <select name="cat_four" class="form-control main_category">
                                <option value="">Select</option>
                                @foreach($categories as $category)
                                    <option {{ $category->id == ($popularCategory[3]->category ?? '') ? 'selected' : '' }} value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>   
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            @php
                                $subCategories4 = isset($popularCategory[3]) ? \App\Models\Subcategory::where('category_id', $popularCategory[3]->category)->get() : collect();
                            @endphp
                            <label>Sub Category</label>
                            <select name="sub_cat_four" class="form-control sub_category">
                                <option value="">Select</option>
                                @foreach($subCategories4 as $subcategory)
                                    <option {{ $subcategory->id == ($popularCategory[3]->sub_category ?? '') ? 'selected' : '' }} value="{{ $subcategory->id }}">{{ $subcategory->name }}</option>
                                @endforeach
                            </select>   
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            @php
                                $childCategories4 = isset($popularCategory[3]) ? \App\Models\ChildCategory::where('subcategory_id', $popularCategory[3]->sub_category)->get() : collect();
                            @endphp
                            <label>Child Category</label>
                            <select name="child_cat_four" class="form-control child_category">
                                <option value="">Select</option>
                                @foreach($childCategories4 as $childcategory)
                                    <option {{ $childcategory->id == ($popularCategory[3]->child_category ?? '') ? 'selected' : '' }} value="{{ $childcategory->id }}">{{ $childcategory->name }}</option>
                                @endforeach
                            </select>   
                        </div>
                    </div>
                </div>




                <!-- Category 5 -->
                <h5>Category 5</h5>
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Category</label>
                            <select name="cat_five" class="form-control main_category">
                                <option value="">Select</option>
                                @foreach($categories as $category)
                                    <option {{ $category->id == ($popularCategory[4]->category ?? '') ? 'selected' : '' }} value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>   
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            @php
                                $subCategories5 = isset($popularCategory[4]) ? \App\Models\Subcategory::where('category_id', $popularCategory[4]->category)->get() : collect();
                            @endphp
                            <label>Sub Category</label>
                            <select name="sub_cat_five" class="form-control sub_category">
                                <option value="">Select</option>
                                @foreach($subCategories5 as $subcategory)
                                    <option {{ $subcategory->id == ($popularCategory[4]->sub_category ?? '') ? 'selected' : '' }} value="{{ $subcategory->id }}">{{ $subcategory->name }}</option>
                                @endforeach
                            </select>   
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            @php
                                $childCategories5 = isset($popularCategory[4]) ? \App\Models\ChildCategory::where('subcategory_id', $popularCategory[4]->sub_category)->get() : collect();
                            @endphp
                            <label>Child Category</label>
                            <select name="child_cat_five" class="form-control child_category">
                                <option value="">Select</option>
                                @foreach($childCategories5 as $childcategory)
                                    <option {{ $childcategory->id == ($popularCategory[4]->child_category ?? '') ? 'selected' : '' }} value="{{ $childcategory->id }}">{{ $childcategory->name }}</option>
                                @endforeach
                            </select>   
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Save</button>
            </form>
        </div>
    </div>
</div>


@push('scripts')
    <script>
        $(document).ready(function() {
            // Gérer la sélection dynamique des sous-catégories
            $('body').on('change', '.main_category', function() {
                let id = $(this).val();
                let row = $(this).closest('.row');

                // Réinitialiser la sélection des sous-catégories et catégories enfants
                let subCategorySelect = row.find('.sub_category');
                let childCategorySelect = row.find('.child_category');
                subCategorySelect.html('<option value="" selected>Select</option>');
                childCategorySelect.html('<option value="" selected>Select</option>');

                if (id) {
                    $.ajax({
                        method: 'GET',
                        url: "{{ route('admin.get-subcategories') }}",
                        data: { id: id },
                        success: function(data) {
                            $.each(data, function(id, name) {
                                subCategorySelect.append(`<option value="${id}">${name}</option>`);
                            });
                        },
                        error: function(xhr, status, error) {
                            console.error(error);
                        }
                    });
                }
            });

            // Gérer la sélection dynamique des catégories enfants
            $('body').on('change', '.sub_category', function() {
                let id = $(this).val();
                let row = $(this).closest('.row');
                let childCategorySelect = row.find('.child_category');
                childCategorySelect.html('<option value="" selected>Select</option>');

                if (id) {
                    $.ajax({
                        method: 'GET',
                        url: "{{ route('admin.product.get-childcategories') }}",
                        data: { id: id },
                        success: function(data) {
                            $.each(data, function(id, name) {
                                childCategorySelect.append(`<option value="${id}">${name}</option>`);
                            });
                        },
                        error: function(xhr, status, error) {
                            console.error(error);
                        }
                    });
                }
            });
        });
    </script>
@endpush
