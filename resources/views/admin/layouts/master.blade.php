
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>

    @yield('title')
  </title>

  <!-- General CSS Files -->
  <link rel="stylesheet" href="{{asset('backend/assets/modules/bootstrap/css/bootstrap.min.css')}}">
  <link rel="stylesheet" href="{{asset('backend/assets/modules/fontawesome/css/all.min.css')}}">

  <!-- CSS Libraries -->
  <link rel="stylesheet" href="{{asset('backend/assets/modules/jqvmap/dist/jqvmap.min.css')}}">
  <link rel="stylesheet" href="{{asset('backend/assets/modules/weather-icon/css/weather-icons.min.css')}}">
  <link rel="stylesheet" href="{{asset('backend/assets/modules/weather-icon/css/weather-icons-wind.min.css')}}">
  <link rel="stylesheet" href="{{asset('backend/assets/modules/summernote/summernote-bs4.css')}}">

  <link rel="stylesheet" href="{{asset('backend/assets/css/bootstrap-iconpicker.min.css')}}">
  <link rel="stylesheet" href="{{asset('backend/assets/modules/bootstrap-daterangepicker/daterangepicker.css')}}">
  <link rel="stylesheet" href="{{asset('backend/assets/modules/select2/dist/css/select2.min.css')}}">


  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/notyf@3/notyf.min.css">





  <!-- Template CSS -->
  <link rel="stylesheet" href="{{asset('backend/assets/css/style.css')}}">
  <link rel="stylesheet" href="{{asset('backend/assets/css/components.css')}}">

<!-- Start GA -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-94034622-3"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-94034622-3');
</script>
<!-- /END GA --></head>

<style>
    body {
        overflow-x: hidden;
    }
</style>
<body>
  <div id="app">
    <div class="main-wrapper main-wrapper-1">
      <div class="navbar-bg" style="background-color: #b5002b;"></div>

        <!-- Navbar -->
      @include('admin.layouts.navbar')

        <!-- Sidebard -->
      @include('admin.layouts.sidebard')


      <!-- Main Content -->
        <div class="main-content">
          @yield('content')
        </div>


        <!-- Footer -->
        @include('admin.layouts.footer')
    </div>
</div>

<!-- General JS Scripts -->
<script src="{{asset('backend/assets/modules/jquery.min.js')}}"></script>


<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="{{asset('backend/assets/modules/popper.js')}}"></script>
<script src="{{asset('backend/assets/modules/tooltip.js')}}"></script>
<script src="{{asset('backend/assets/modules/bootstrap/js/bootstrap.min.js')}}"></script>
<script src="{{asset('backend/assets/modules/nicescroll/jquery.nicescroll.min.js')}}"></script>
<script src="{{asset('backend/assets/modules/moment.min.js')}}"></script>
<script src="{{asset('backend/assets/js/stisla.js')}}"></script>

  <!-- JS Libraies -->
  <script src="{{asset('backend/assets/modules/bootstrap-daterangepicker/daterangepicker.js')}}"></script>
  <script src="{{asset('backend/assets/modules/simple-weather/jquery.simpleWeather.min.js')}}"></script>
  <script src="{{asset('backend/assets/modules/chart.min.js')}}"></script>
  <script src="{{asset('backend/assets/modules/jqvmap/dist/jquery.vmap.min.js')}}"></script>
  <script src="{{asset('backend/assets/modules/jqvmap/dist/maps/jquery.vmap.world.js')}}"></script>
  <script src="{{asset('backend/assets/modules/summernote/summernote-bs4.js')}}"></script>
  <script src="{{asset('backend/assets/modules/chocolat/dist/js/jquery.chocolat.min.js')}}"></script>
  <script src="{{asset('backend/assets/modules/select2/dist/js/select2.full.min.js')}}"></script>

  <script src="https://cdn.jsdelivr.net/npm/notyf@3/notyf.min.js"></script>

  <script src="{{asset('backend/assets/js/bootstrap-iconpicker.bundle.min.js')}}"></script>






  <!-- Page Specific JS File -->
  <script src="{{asset('backend/assets/js/page/index-0.js')}}"></script>

  <!-- Template JS File -->
  <script src="{{asset('backend/assets/js/scripts.js')}}"></script>
  <script src="{{asset('backend/assets/js/custom.js')}}"></script>

    <script>

        $('.datepicker').on('apply.daterangepicker', function(ev, picker) {
            $(this).val(picker.startDate.format('YYYY-MM-DD'));
        });


        $('.datepicker').on('cancel.daterangepicker', function(ev, picker) {
            $(this).val('');
        });
    </script>



    <script>
        var notyf = new Notyf({
            duration: 5000,
            ripple: true,
            position: {
                x: 'right',
                y: 'top'
            }
        });
        
        @if($errors->any())
            @foreach($errors->all() as $error)

                notyf.error("{{ $error }}");
            @endforeach
        @endif

        @if($errors->updatePassword->any())
            @foreach($errors->updatePassword->all() as $error)

                notyf.error("{{ $error }}");

            @endforeach

        @endif
    </script>



    <script>
        $(document).ready(function(){

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $('body').on('click', '.delete-item', function(event){
                event.preventDefault();
                let deletUrl = $(this).attr('href');
                let clickedElement = $(this);

                Swal.fire({
                title: "@lang('admin.are_you_sure')",
                text: "@lang('admin.no_revert')",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "@lang('admin.yes_delete')",
                cancelButtonText: "@lang('admin.cancel')"
                }).then((result) => {
                if (result.isConfirmed) {

                    $.ajax({
                        method: 'DELETE',
                        url: deletUrl,

                        success: function(data)
                        {
                            if(data.status == 'success')
                            {
                                clickedElement.closest('tr').remove();

                                    Swal.fire({
                                        title: "@lang('admin.deleted')",
                                        text: data.message,
                                        icon: "success"
                                    }).then(() => {


                                        switch(data.type)
                                        {
                                            case 'category':
                                                window.location.href = "{{ route('admin.category.index') }}";
                                                break;
                                            case 'slider':
                                                window.location.href = "{{ route('admin.slider.index') }}";
                                                break;
                                            case 'subcategory':
                                                window.location.href = "{{ route('admin.sub-category.index') }}";
                                                break;

                                            case 'user':
                                                window.location.href = "{{ route('admin.users.index') }}";
                                                break;    
                                            case 'childcategory':
                                                window.location.href = "{{ route('admin.child-category.index') }}";
                                                break;
                                            case 'Brand':
                                                window.location.href = "{{ route('admin.brand.index') }}";
                                                break;

                                            case 'product':
                                                window.location.href = "{{ route('admin.product.index') }}";
                                                break;

                                            case 'order':
                                                window.location.href = "{{ route('admin.order.index') }}";
                                                break;    

                                            case 'imageGallery':
                                                   let item = $('body').find('.produit');
                                                   let id = item.data('id');

                                                window.location.href = "{{ route('admin.product-image-gallery.index', ['product' => '']) }}" + id;
                                                break;

                                            case 'variant':
                                                   let variant = $('body').find('.produit-item');
                                                   let product = variant.data('product');

                                                window.location.href = "{{ route('admin.product-variant.index', ['product' => '']) }}" + product;
                                                break;

                                            default:
                                                window.location.href = "{{ route('admin.dashboard') }}";
                                        }
                                    });


                            }else if(data.status == 'error')
                            {
                                Swal.fire({
                                title: "@lang('admin.cant_delete')",
                                text: data.message,
                                icon: "error"
                                });
                            }

                        },

                        error: function(xhr,status,error)
                        {
                            Swal.fire({
                                title: "@lang('admin.error')",
                                text: "@lang('admin.error_deleting')",
                                icon: "error"
                            });
                        },



                    });


                }
                });
            });
        });
    </script>

    @stack('scripts')
</body>
</html>