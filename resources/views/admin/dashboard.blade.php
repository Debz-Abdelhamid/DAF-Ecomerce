@extends('admin.layouts.master')

@section('title')
    {{$settings->site_name}} &mdash; Dashboard
@endsection

@section('content')

<section class="section">
  <div class="section-header">
    <h1>Dashboard</h1>
  </div>
  <div class="row">
    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
      <div class="card card-statistic-1">
        <div class="card-icon bg-primary">
          <i class="far fa-user"></i>
        </div>
        <div class="card-wrap">
          <div class="card-header">
            <h4>@lang('admin.TotalAdmin')</h4>
          </div>
          <div class="card-body">
            {{ $admins }}
          </div>
        </div>
      </div>
    </div>
    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
      <div class="card card-statistic-1">
        <div class="card-icon bg-danger">
          <i class="far fa-newspaper"></i>
        </div>
        <div class="card-wrap">
          <div class="card-header">
            <h4>@lang('admin.PendingOrders')</h4>
          </div>
          <div class="card-body">
            {{ $pending_orders }}
          </div>
        </div>
      </div>
    </div>
    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
      <div class="card card-statistic-1">
        <div class="card-icon bg-warning">
          <i class="far fa-file"></i>
        </div>
        <div class="card-wrap">
          <div class="card-header">
            <h4>@lang('admin.TotalProducts')</h4>
          </div>
          <div class="card-body">
            {{$Products}}
          </div>
        </div>
      </div>
    </div>
    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
      <div class="card card-statistic-1">
        <div class="card-icon bg-success">
          <i class="fas fa-circle"></i>
        </div>
        <div class="card-wrap">
          <div class="card-header">
            <h4>@lang('admin.TotalSliders')</h4>
          </div>
          <div class="card-body">
            {{ $sliders }}
          </div>
        </div>
      </div>
    </div>                  
  </div>
 
</section>

@endsection