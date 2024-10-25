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
            <h1>Orders</h1>

        </div>


          <div class="section-body">
            <div class="invoice">
              <div class="invoice-print">
                <div class="row">
                  <div class="col-lg-12">
                    <div class="invoice-title">
                      <h2></h2>
                      <div class="invoice-number">Order #{{ $order->inovice_id }}</div>
                    </div>
                    <hr>
                    <div class="row">
                      <div class="col-md-6">
                        <address>
                          <strong>Billed To:</strong><br>
                            <b>Name: </b> {{ $address->name }} <br>
                            <b>Email: </b> {{ $address->email }}<br>
                            <b>Phone: </b> {{ $address->phone }}<br>
                            <b>Address: </b> {{ $address->address }}<br>
                            {{ $address->city }}, {{ $address->state }}, {{ $address->zip }}<br>
                            {{ $address->country }}<br>
                        </address>
                      </div>
                      <div class="col-md-6 text-md-right">
                        <address>
                            <strong>Billed To:</strong><br>
                              <b>Name: </b> {{ $address->name }} <br>
                              <b>Email: </b> {{ $address->email }}<br>
                              <b>Phone: </b> {{ $address->phone }}<br>
                              <b>Address: </b> {{ $address->address }}<br>
                              {{ $address->city }}, {{ $address->state }}, {{ $address->zip }}<br>
                              {{ $address->country }}<br>
                          </address>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">

                      </div>
                      <div class="col-md-6 text-md-right">
                        <address>
                          <strong>Order Date:</strong><br>
                          {{date('d F, Y', strtotime($order->created_at))}}<br><br>
                        </address>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="row mt-4">
                  <div class="col-md-12">
                    <div class="section-title">Order Summary</div>
                    <p class="section-lead">All items here cannot be deleted.</p>
                    <div class="table-responsive">
                      <table class="table table-striped table-hover table-md">
                        <tr>
                          <th data-width="40">#</th>
                          <th>Item</th>
                          <th>Variant</th>
                          <th class="text-center">Price</th>
                          <th class="text-center">Quantity</th>
                          <th class="text-center">Total Facility</th>
                          <th class="text-right">Totals</th>
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
                                <td><a href="{{ route('product-detail',$orderProduct->product->slug) }}">{{$orderProduct->product_name}}</a></td>
                                <td>
                                    @if(!is_null($variants))
                                        @foreach($variants as $key => $variant)
                                            <b>{{ $key }}</b>: {{ $variant->name }} ({{ (int) $variant->price }}) {{ $settings->currency_icon }}
                                        @endforeach
                                    @else
                                        <span class="badge badge-warning">None</span>
                                    @endif
                                </td>
                                <td class="text-center">{{$orderProduct->unit_price}} {{ $settings->currency_icon }}</td>
                                <td class="text-center">{{$orderProduct->qty}}</td>
                                <td class="text-center">{{ getFacility($orderProduct->product,$order->duree,$orderProduct->qty) }} {{ $settings->currency_icon }}</td>
                                <td class="text-right">{{ $orderProduct->qty * ($orderProduct->unit_price  + $orderProduct->variants_total)}} {{ $settings->currency_icon }}</td>
                            </tr>
                        @php
                            $i++;
                        @endphp
                        @endforeach
                      </table>
                    </div>
                    <div class="row mt-4">
                      <div class="col-lg-8">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="">Order Status</label>
                                    <select name="order_status" class="form-control" data-id="{{ $order->id }}" id="order_status">

                                        <option {{ $order->order_status == 'pending' ? 'selected' : '' }} value="pending">Pending</option>
                                        <option {{ $order->order_status == 'destribution' ? 'selected' : '' }} value="destribution">In Transit</option>
                                        <option {{ $order->order_status == 'deliverd' ? 'selected' : '' }} value="deliverd">Delivered</option>
                                        <option {{ $order->order_status == 'canceled' ? 'selected' : '' }} value="canceled">Canceled</option>

                                    </select>

                                </div>
                            </div>

                      </div>
                      <div class="col-lg-4 text-right">
                        <div class="invoice-detail-item">
                          <div class="invoice-detail-name">Subtotal</div>
                          <div class="invoice-detail-value">{{ $order->subtotal }} {{ $settings->currency_icon }}</div>
                        </div>

                        <hr class="mt-2 mb-2">
                        <div class="invoice-detail-item">
                          <div class="invoice-detail-name">Total</div>
                          <div class="invoice-detail-value invoice-detail-value-lg"> {{ $order->amount }} {{ $settings->currency_icon }} </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <hr>
              <div class="text-md-right">

                <button class="btn btn-warning btn-icon icon-left print_inovice"><i class="fas fa-print"></i> Print</button>
              </div>
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

