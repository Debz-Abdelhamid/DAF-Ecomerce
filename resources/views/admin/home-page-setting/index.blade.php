@extends('admin.layouts.master')

@section('title')
    {{$settings->site_name}} &mdash; Home Page Settings
@endsection

@section('content')
    <!-- Main Content -->

    <section class="section">
        <div class="section-header">
            <h1>@lang('admin.HomePageSettings')</h1>

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
                                <a class="list-group-item list-group-item-action active" id="list-profile-list" data-toggle="list" href="#list-profile" role="tab">@lang('admin.PopularCategorySection') </a>

                              </div>
                            </div>
                            <div class="col-10">
                              <div class="tab-content" id="nav-tabContent">
                               
                                    @include('admin.home-page-setting.sections.popular-category-section')
                               
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
