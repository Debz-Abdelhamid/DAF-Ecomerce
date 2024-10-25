<script>
    
    $(document).ready(function(){

        $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
        });   
        
      
        /** Add To Cart */

        $('.shopping-cart-form').on('submit', function(e){
            e.preventDefault();
                let formData = $(this).serialize();
                
            $.ajax({

                method:'POST',
                data: formData,
                url: "{{ route('add-to-cart') }}",

                success: function(data)
                {
                    if(data.status == 'success')
                    {   
                        getCartCount();
                        fetchSidebardCartProducts();
                        $('.mini_cart_actions').removeClass('d-none');
                        notyf.success(data.message);

                    }else if(data.status == 'error')
                    {
                        notyf.error(data.message);
                    }
                },
                
                error: function(xhr,status,error)
                {
                    

                }

            });


        });


        function getCartCount()
        {
            $.ajax({
                method: 'GET',
                url: "{{ route('cart.count') }}",


                success: function(data)
                {
                    $('#cart-count').text(data);
                },

                error: function(xhr,status,error)
                {

                }
            });
        }


        function fetchSidebardCartProducts(){
                    
            $.ajax({

                method:'GET',
                url: "{{ route('cart.sidebard') }}",

                success: function(data)
                {
            
                    $('.mini_cart_wrapper').html("");
                    var html = '';
                    for(let item in data)
                    {
                        let product = data[item];
                        
                        html +=`
                        <li id="mini_cart_${product.rowId}">
                            <div class="wsus__cart_img">
                                <a href="${'{{ route("product-detail", ":slug") }}'.replace(':slug', product.options.slug)}"><img src="${'{{ asset("/storage") }}' + '/' + product.options.image}" alt="product" class="img-fluid w-100"></a>
                                
                            </div>
                            <div class="wsus__cart_text">
                                <a class="wsus__cart_title" href="${'{{ route("product-detail", ":slug") }}'.replace(':slug', product.options.slug)}">${product.name}</a>
                                <p>{{ $settings->currency_icon }}${product.price}</p>
                                 <small>Variants Total: {{$settings->currency_icon}} ${product.options.variant_total}</small>
                            <br>
                                <small>
                                    Quantity: ${product.qty}
                                </small> 
                            </div>
                        </li>`;

                    }

                    $('.mini_cart_wrapper').html(html);
                    getSidebarSubtotal();
                },
                    
                error: function(xhr,status,error)
                {
                        

                }

            });

        }


        /** Get Sidebar Cart Subtotal */

        function getSidebarSubtotal()
        {
            $.ajax({
                method: 'GET',
                url: "{{ route('cart.sidebard-product-subtotal') }}",
                success: function(data)
                {
                    $('#mini_cart_subtotal').text("{{ $settings->currency_icon }}"+data);
                },

                error: function()
                {

                }
            });
        }




    });
</script>