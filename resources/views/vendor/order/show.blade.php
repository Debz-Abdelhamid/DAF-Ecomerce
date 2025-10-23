@php
    $address = json_decode($order->order_address);
@endphp

@extends('vendor.layouts.master')


@section('title')
    {{$settings->site_name}} &mdash; Order 
@endsection


@section('content')

  <!--=============================
    DASHBOARD START
  ==============================-->
  <section id="wsus__dashboard">
    <div class="container-fluid">
      @include('vendor.layouts.sidebard')
      

      <div class="row">
        <div class="col-xl-9 col-xxl-10 col-lg-9 ms-auto">
          <div class="mt-2 dashboard_content mt-md-0">
            <h3><i class="far fa-user"></i>La Facture</h3>
            <div class="wsus__dashboard_profile">
              <div class="wsus__dash_pro_area">
               
                
              <div class="section-body">
                    <div class="invoice">
                      <div class="invoice-print">
                        <div class="row">
                          <div class="col-lg-12">
                            
                            <div class="row">

                              <div class="col-sm-8">
                                <address>
                          

                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b><strong class="text-dark"> information du client :</strong></b><br>
                                      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>Nom :  </b> {{ $address->name }}<br>
                                      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="text-dark"> {{ $address->zip }} , {{ $address->city }} , {{ $address->state }}  ,
                                        {{ $address->country }} </span><br>
                                      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>Numéro téléphone : </b> {{ $address->phone }}<br>
                                      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>Type de Dossier : </b>{{ $order->dossier }}<br>

                                      
                                </address>
                              </div>

                              <div class="col-sm-4 text-md-right">
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
                        <br><br>

                        <div class="row mt-4">
                          <div class="col-md-12">
                            
                            <div class="table-responsive">
                              <table class="table table-striped table-hover table-md">
                                <tr>
                                <th data-width="40">#</th>
                                <th>Nom du produit</th>
                                <th>Marque</th>
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
                            <div class="row mt-4">
                              <div class="col-sm-8">

                                      <div class="col-md-4">
                                        <form action="{{ route('vendor.order.change-status', $order->id) }}" method="POST">
                                            @csrf
                                            @method('PUT')
                                            <div class="form-group">
                                                <label for="">Statut de la commande :</label>
                                                <select name="status" class="form-control" data-id="{{ $order->id }}" id="order_status">
            
                                                    <option {{ $order->order_status == 'pending' ? 'selected' : '' }} value="pending">@lang('admin.Pending')</option>
                                                    <option {{ $order->order_status == 'destribution' ? 'selected' : '' }} value="destribution">@lang('vendor.InTransit')</option>
                                                    <option {{ $order->order_status == 'deliverd' ? 'selected' : '' }} value="deliverd">@lang('admin.Delivered')</option>
                                                    <option {{ $order->order_status == 'canceled' ? 'selected' : '' }} value="canceled">@lang('admin.Canceled')</option>
            
                                                </select>
                                                <button type="submit" class="btn btn-primary save mt-3">Save</button>
                                            </div>
                                        </form>
                                    </div>                          

        
                              </div>
                              <br><br>
                              

                            </div>
<!--
                           <div class="row mt-3 d-blok justify-content-end">
                              <div class="col-sm-2 text-right mt-5">
                                    <div class="invoice-detail-item">
                                      <div class="invoice-detail-name">SOUS-TOTAL</div>
                                      <div class="invoice-detail-value"> <b>{{ $order->subtotal }} {{ $settings->currency_icon }}</b></div>
                                    </div>
            
                                    <hr class="mt-2 mb-2">
                                    <div class="invoice-detail-item">
                                      <div class="invoice-detail-name">TOTAL DU</div>
                                      <div class="invoice-detail-value invoice-detail-value-lg"> <b>{{ $order->amount }} {{ $settings->currency_icon }}</b> </div>
                                    </div>
                                  </div>
                              </div>
                            </div>
-->

                      </div>
                      
 <!--                
                      <div class="text-md-right">
        
                        <button class="btn btn-warning btn-icon icon-left print_inovice"><i class="fas fa-print"></i> Print</button>
                      </div>
-->
                    </div>
                  </div>
                   
               
              </div>

              
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!--=============================
    DASHBOARD START
  ==============================-->

@endsection



@push('scripts')
    <script>



    

            $('.print_inovice').on('click', function(){

                $('.save').addClass('d-none');
                 let printBody = $('.invoice-print');
                 let proginalContents = $('body').html();
                 $('body').html(printBody.html());

                 window.print();

    
                 $('body').html(proginalContents);


            });

        
    </script>
@endpush