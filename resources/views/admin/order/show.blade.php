@php
    $address = json_decode($order->order_address);

@endphp

@extends('admin.layouts.master')

@section('title')
    {{$settings->site_name}} &mdash; Product
@endsection

@section('content')
    <!-- Main Content -->

    <section class="section">
        <div class="section-header">
            <h1>@lang('admin.Orders')</h1>

        </div>

<br><br>
          <div class="section-body">
            <div class="invoice">
              <br><br>
              <div class="invoice-print">
                <div class="row">
                  <div class="col-lg-12">         
                    <div class="row mt-5 d-flex">
                      <div class="col-sm-6">
                        <address>
                          
                        &nbsp;&nbsp;&nbsp;<b><strong class="text-dark"> Information du client:</strong></b><br>
                            &nbsp;&nbsp;&nbsp;<b> Nom : </b>{{ $address->name }}<br>
                            &nbsp;&nbsp;&nbsp;<span class="text-dark"><b> Adress : </b> {{ $address->zip }} , {{ $address->city }} , {{ $address->state }}  ,
                              {{ $address->country }} </span><br>
                            &nbsp;&nbsp;&nbsp;&nbsp;<b>Numéro téléphone : </b> {{ $address->phone }}<br>
                            &nbsp;&nbsp;&nbsp;&nbsp;<b>Type de Dossier : </b> {{ $order->dossier }}<br>
                            
                        </address>
                      </div>
                      
                      <div class="col-sm-6 text-sm-right">
                        <address class="d-block justify-content-start">
                            <strong></strong><br>
                              <b>Commande N°  </b> #{{ $order->inovice_id }} <br>
                              <b>Date : </b> {{date('d F, Y', strtotime($order->created_at))}}<br>
                       
                          </address>
                      </div>
                    </div>
                    
                  </div>
                </div>
                <div class="container-fluid ">
                          <div class="row d-flex">
                            <div class="col-md-4"><b>Montant Total : </b> {{ $order->amount }} {{ $settings->currency_icon }}</div>
                            <div class="col-md-4"><b>Nombre d'échéance : </b> {{ $order->duree }} </div>
                            <div class="col-md-4"><b>Montant d'échéance : </b> {{ $order->total_facility }} {{ $settings->currency_icon }} <span>

                            </span>  </b></div>
                          </div>
                        </div>
              <br><br><br>
                <div class="row mt-5">
                  <div class="col-md-12">
                    
                    <div class="table-responsive">
                      <table class="table table-striped table-hover table-md">
                        <tr>
                          <th data-width="40">#</th>
                          <th>Produit</th>
                          <th class="text-center">Marque</th>
                          <th class="text-center">Quantité</th>
                          <th class="text-center">Prix</th>
                          <th class="text-right">Prix Total</th>

                        </tr>
                        @php
                            $i=1;
                        @endphp
                        @foreach($orderProducts as $orderProduct)
                            @php
                                $variants = json_decode($orderProduct->variants);
                            @endphp
                            <tr>
                                <td>{{$i}}</td>
                                <td><a href="javascript:;">{{$orderProduct->product_name}}</a></td>
                  
                                <td class="text-center">{{$orderProduct->product->brand->name}}</td>
                                <td class="text-center">{{$orderProduct->qty}}</td>
                                <td class="text-center">{{$orderProduct->unit_price}} {{ $settings->currency_icon }}</td>

                                <td class="text-right">{{ $orderProduct->qty * ($orderProduct->unit_price  + $orderProduct->variants_total)}} {{ $settings->currency_icon }}</td>
                            </tr>
                        @php
                            $i++;
                        @endphp
                        @endforeach
                      </table>
                    </div>
                    <br><br><br>
                    <div class="row mt-5">
                      <br>

                      <div class="col-sm-8">

 
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="">Statut de la commande</label>
                                    <select name="order_status" class="form-control" data-id="{{ $order->id }}" id="order_status">

                                        <option {{ $order->order_status == 'pending' ? 'selected' : '' }} value="pending">@lang('admin.Pending')</option>
                                        <option {{ $order->order_status == 'destribution' ? 'selected' : '' }} value="destribution">@lang('vendor.InTransit')</option>
                                        <option {{ $order->order_status == 'deliverd' ? 'selected' : '' }} value="deliverd">@lang('admin.Delivered')</option>
                                        <option {{ $order->order_status == 'canceled' ? 'selected' : '' }} value="canceled">@lang('admin.Canceled')</option>

                                    </select>

                                </div>
                            </div>                      


                      </div>

                    

                    
                      <br>
                      
                    </div>
                    <br><br>
                    <!--
                    <div class="row d-flex justify-content-end mt-5">
                        <div class="col-sm-3  mt-5">
                          <div class="invoice-detail-item">
                            <div class="invoice-detail-name">SOUS-TOTAL</div>
                            <div class="invoice-detail-value">{{ $order->subtotal }} {{ $settings->currency_icon }}</div>
                          </div>

                          <hr class="mt-2 mb-2">
                          <div class="invoice-detail-item">
                            <div class="invoice-detail-name">TOTAL DU</div>
                            <div class="invoice-detail-value invoice-detail-value-lg"> {{ $order->amount }} {{ $settings->currency_icon }} </div>
                          </div>
                        </div>
                          
                          
                    </div>
                    -->
                  </div>

  



                </div>


              </div>
             


             <!--
              <div class="text-md-right">

                <button class="btn btn-warning btn-icon icon-left print_inovice"><i class="fas fa-print"></i> Print</button>
              </div>
            -->

            </div>
          </div>


    </section>
@endsection


@push('scripts')
    <script>

        $(document).ready(function(){

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $('#order_status').on('change', function() {
                let status = $(this).val();
                let id = $(this).data('id');

                $.ajax({
                    method: 'PUT',
                    url: "{{ route('admin.order.change-status') }}",
                    data: {
                        status: status,
                        id: id
                    },
                    success: function(data) {
                        if (data.status == 'success') {
                            notyf.success(data.message);
                        }
                    },
                    error: function(data) {

                    }
                });
            });



            $('.print_inovice').on('click', function(){
                 let printBody = $('.invoice-print');
                 let proginalContents = $('body').html();
                 $('body').html(printBody.html());

                 window.print();

                 $('body').html(proginalContents);
            });

        });
    </script>
@endpush

