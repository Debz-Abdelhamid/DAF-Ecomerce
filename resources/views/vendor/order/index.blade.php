@extends('vendor.layouts.master')


@section('title')
    {{$settings->site_name}} &mdash; Product 
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
            <h3><i class="far fa-user"></i>Orders</h3>
            <div class="wsus__dashboard_profile">
              <div class="wsus__dash_pro_area">
               
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4>All Orders</h4>
                              
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-md">
                                        <tr>
                                            <th>#</th>
                                            <th>Inovice id</th>
                                            <th>Customer Name</th>
                                            <th>Customer Amount</th>           
                                            <th>Total Variants</th>
                                            <th>Total Amount</th>
                                            <th>Cart Facility</th>
                                            <th>Durée</th>
                                            <th>Product Qty</th>
                                            <th>Date</th>
                                            <th>Order Status</th>
                                            <th>Action</th>
                                        </tr>
                                        @php
                                            $i = 1;
                                        @endphp
                                        @forelse($orders as $order)

                                        <tr>
                                            <td>{{ $i }}</td>
                                            
                                            <td>{{ $order->inovice_id }}</td>

                                            <td>{{ $order->user->name }}</td>
                                            
                                            <td>{{ $order->user_amount }} {{ $settings->currency_icon }}</td>

                                            <td>{{ $order->total_variants }} {{ $settings->currency_icon }}</td>
                                            

                                            <td>{{ $order->amount }} {{ $settings->currency_icon }} </td>

                                            <td>{{ $order->total_facility }} {{ $settings->currency_icon }} / Mois</td>
                                            

                                            <td>{{ $order->duree }} Mois</td>

                                            <td>{{ $order->product_qty }}</td>

                                            <td>{{ date('Y-m-d', strtotime($order->created_at)) }}</td>

                                            @if($order->order_status == 'pending')
                                                <td><span class="badge bg-warning">Pending</span></td>
                                           
                                            @elseif($order->order_status == 'destribution')
                                                <td><span class="badge bg-info">Destribution</span></td>

                                            @elseif($order->order_status == 'deliverd')
                                                <td><span class="badge bg-success">Delivered</span></td>    

                                            @elseif($order->order_status == 'canceled')    
                                                <td><span class="badge bg-danger">Canceled</span></td>
                                            @endif
                                            
                                            <td>
                                                <div class="d-flex">

                                                    <a href="{{ route('vendor.orders.show', $order->id) }}"
                                                        class="btn btn-primary"><i class="far fa-eye"></i></a>

                                                </div>
                                            </td>
                                            
                                            
                                        </tr>
                                            
                                            @php
                                                $i++;
                                            @endphp
                                        @empty
                                            <tr>
                                                <td colspan="12" class="text-center">No orders available.</td>
                                            </tr>
                                        @endforelse
                                    </table>
                                    {{ $orders->links() }}
                                </div>
                            </div>
    
                        </div>
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

