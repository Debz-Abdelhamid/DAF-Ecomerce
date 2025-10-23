@extends('admin.layouts.master')

@section('title')
    {{$settings->site_name}} &mdash; Settings
@endsection

@section('content')
    <!-- Main Content -->

    <section class="section">
        <div class="section-header">
            <h1>@lang('admin.Settings')</h1>

        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                          <h4>@lang('admin.Settings')</h4>
                        </div>
                        <div class="card-body">
                          <div class="row">
                            <div class="col-2">
                              <div class="list-group" id="list-tab" role="tablist">
                                <a class="list-group-item list-group-item-action active" id="list-home-list" data-toggle="list" href="#list-home" role="tab">@lang('admin.GeneralSetting')</a>

                              </div>
                            </div>
                            <div class="col-10">
                              <div class="tab-content" id="nav-tabContent">
                                <div class="tab-pane fade show active" id="list-home" role="tabpanel" aria-labelledby="list-home-list">
                                    @include('admin.settings.general-settings')
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
@endsection
