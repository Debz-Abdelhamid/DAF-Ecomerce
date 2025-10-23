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

        <div class="section-body" style="box-sizing: border-box;">

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>@lang('admin.AllOrders')</h4>
                            
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-md">
                                <tr>
                                        <th>#</th>
                                        <th>@lang('admin.Inoviceid') </th>
                                        <th>@lang('admin.CustomerName') </th>
                                        <th>@lang('admin.CustomerTelephone') </th>
                                        <th>@lang('admin.CustomerAmount') </th>           
                                        <th>@lang('admin.dossier') </th>           
                                        <th>@lang('admin.TotalVariants') </th>
                                        <th>@lang('admin.TotalAmount') </th>
                                        <th>@lang('admin.CartFacility') </th>
                                        <th>@lang('admin.Durée')</th>
                                        <th>@lang('admin.ProductQty') </th>
                                        <th>@lang('admin.Date')</th>
                                        <th>@lang('admin.OrderStatus')</th>
                                        <th>@lang('admin.Action')</th>
                                </tr>
                                    @php
                                        $i = 1;
                                    @endphp
                                    @forelse($orders as $order)
                                        @php

                                            $address = json_decode($order->order_address);

                                        @endphp
                                        <tr>
                                            <td>{{ $i }}</td>
                                            
                                            <td>{{ $order->inovice_id }}</td>
                                            <td>{{ $address->name }}</td>
                                            <td>{{ $address->phone }}</td>

                                            
                                            
                                            <td>{{ $order->user_amount }} {{ $settings->currency_icon }}</td>
                                            <td>{{ $order->dossier }}</td>

                                            <td>{{ $order->total_variants }} {{ $settings->currency_icon }}</td>
                                            

                                            <td>{{ $order->amount }} {{ $settings->currency_icon }} </td>

                                            <td>{{ $order->total_facility }} {{ $settings->currency_icon }} / Mois</td>
                                            

                                            <td>{{ $order->duree }} Mois</td>

                                            <td>{{ $order->product_qty }}</td>

                                            <td>{{ date('Y-m-d', strtotime($order->created_at)) }}</td>

                                            @if($order->order_status == 'pending')
                                                <td><span class="badge badge-warning">@lang('admin.Pending')</span></td>
                                           
                                            @elseif($order->order_status == 'destribution')
                                                <td><span class="badge badge-info">@lang('admin.Destribution')</span></td>

                                            @elseif($order->order_status == 'canceled')    
                                                <td><span class="badge badge-danger">@lang('admin.Canceled')</span></td>
                                            @endif
                                            
                                            <td>
                                                <div class="d-flex">

                                                    <a href="{{ route('admin.order.show', $order) }}"
                                                        class="btn btn-success"><i class="far fa-eye"></i></a>

                                                    <a href="{{ route('admin.order.destroy', $order->id) }}"
                                                        data-id="{{ $order->id }}"
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
                                            <td colspan="12" class="text-center">@lang('admin.NoOrdersavailable')</td>
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
    </section>
@endsection


