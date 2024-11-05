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

        <div class="section-body" style="box-sizing: border-box;">

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>All Pending Orders</h4>
                            
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-md">
                                    <tr>
                                        <th>#</th>
                                        <th>Inovice id</th>
                                        <th>Customer Name</th>
                                        <th>Customer Telephone</th>
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
                                    @forelse($pendingOrders as $pendingOrder)

                                        @php
                                            $address = json_decode($pendingOrder->order_address);

                                        @endphp
                                        <tr>
                                            <td>{{ $i }}</td>
                                            
                                            <td>{{ $pendingOrder->inovice_id }}</td>

                                            <td>{{ $address->name }}</td>
                                            <td>{{ $address->phone }}</td>
                                            
                                            <td>{{ $pendingOrder->user_amount }} {{ $settings->currency_icon }}</td>

                                            <td>{{ $pendingOrder->total_variants }} {{ $settings->currency_icon }}</td>
                                            

                                            <td>{{ $pendingOrder->amount }} {{ $settings->currency_icon }} </td>

                                            <td>{{ $pendingOrder->total_facility }} {{ $settings->currency_icon }} / Mois</td>
                                            

                                            <td>{{ $pendingOrder->duree }} Mois</td>

                                            <td>{{ $pendingOrder->product_qty }}</td>

                                            <td>{{ date('Y-m-d', strtotime($pendingOrder->created_at)) }}</td>

                                            @if($pendingOrder->order_status == 'pending')

                                                <td><span class="badge badge-warning">Pending</span></td>
                                            
                                            @endif
                                            
                                            <td>
                                                <div class="d-flex">

                                                    <a href="{{ route('admin.order.show', $pendingOrder) }}"
                                                        class="btn btn-primary"><i class="far fa-eye"></i></a>

                                                    <a href="{{ route('admin.order.destroy', $pendingOrder->id) }}"
                                                        data-id="{{ $pendingOrder->id }}"
                                                        class="btn btn-danger ml-2 delete-item"><i
                                                            class="far fa-trash-alt"></i></a>

                                                           

                                                </div>
                                            </td>
                                            
                                            
                                        </tr>
                                        @php
                                            $i++;
                                        @endphp
                                    @empty
                                        <tr>
                                            <td colspan="12" class="text-center">No Pending Orders available.</td>
                                        </tr>
                                    @endforelse
                                </table>
                                {{ $pendingOrders->links() }}
                            </div>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </section>
@endsection


