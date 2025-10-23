<section id="wsus__brand_sleder" class="brand_slider_2">
    <div class="container">
        <div class="brand_border">
            <div class="row brand_slider">

                @foreach($brands as $brand)
                    <div class="col-xl-2">
                        <div class="wsus__brand_logo">
                            <img class="img-fluid card-img object-fit-cover" style="width: 100%;height: 200px;object-fit: cover;" src="{{ asset('storage/' .$brand->logo) }}"
                             alt="{{$brand->name}}"
                             >
                        </div>
                    </div>
                @endforeach    

             
              
            </div>
        </div>
    </div>
</section>