<div class="tab-pane fade show active" id="list-home" role="tabpanel" aria-labelledby="list-home-list">
        <div class="card border">
            <div class="card-body" dir="{{ app()->getLocale() === 'ar' ? 'rtl' : 'ltr' }}">
                <form action="{{ route('admin.general-settings-update') }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group" dir="{{ app()->getLocale() === 'ar' ? 'rtl' : 'ltr' }}">
                        <input placeholder="@lang('admin.SiteName')" type="text" name="site_name" value="{{ old('site_name', @$generalsettings->site_name) }}" class="form-control">
                    </div>

                    <div class="form-group" dir="{{ app()->getLocale() === 'ar' ? 'rtl' : 'ltr' }}">
                        <select name="layout" id="layout" class="form-control">
                            <option value="" selected disabled>@lang('admin.Select') @lang('admin.Layout')</option>
                            <option {{ @$generalsettings->layout == 'RTL' ? 'selected' : '' }} value="RTL">RTL</option>    
                            <option {{ @$generalsettings->layout == 'LTR' ? 'selected' : '' }} value="LTR">LTR</option>    
                        </select>   
                    </div>

                    <div class="form-group" dir="{{ app()->getLocale() === 'ar' ? 'rtl' : 'ltr' }}">
                        <input placeholder="@lang('admin.ContactEmail')" type="text" name="contact_email" value="{{ old('contact_email', @$generalsettings->contact_email) }}" class="form-control">
                    </div>


                    <div class="form-group" dir="{{ app()->getLocale() === 'ar' ? 'rtl' : 'ltr' }}">
                        <label></label>
                        <input placeholder="@lang('admin.ContactPhone')" type="text" name="contact_phone" value="{{ old('contact_phone', @$generalsettings->contact_phone) }}" class="form-control">
                    </div>

                    <div class="form-group" dir="{{ app()->getLocale() === 'ar' ? 'rtl' : 'ltr' }}">
                        <select name="currency_name" id="currency_name" class="form-control ">
                            <option selected disabled>@lang('admin.Select') @lang('admin.DefaultCurrencyName')</option>
                            @foreach(config('settings.currency_list') as $currency)    
                                <option {{ @$generalsettings->currency_name == $currency ? 'selected' : '' }} value="{{ $currency }}">{{ $currency }}</option>
                            
                            @endforeach
                               
                        </select>   
                    </div>

                    <div class="form-group" dir="{{ app()->getLocale() === 'ar' ? 'rtl' : 'ltr' }}">
                        <input placeholder="@lang('admin.CurrencyIcon')" type="text" name="currency_icon" value="{{ old('currency_icon', @$generalsettings->currency_icon) }}" class="form-control">     
                    </div>


                    <div class="form-group" dir="{{ app()->getLocale() === 'ar' ? 'rtl' : 'ltr' }}">
                        <select name="time_zone" id="time_zone" class="form-control ">
                            <option selected disabled>@lang('admin.Select') @lang('admin.TimeZone')</option>
                            @foreach(config('settings.time_zone') as $key => $timezone)    
                                <option {{ @$generalsettings->time_zone == $key ? 'selected' : '' }} value="{{ $key }}">{{ $key }}</option>
                            
                            @endforeach    
                               
                        </select>   
                    </div>

                    <button type="submit" class="btn btn-success">@lang('admin.Update')</button>
                </form>   
            </div>    
        </div>   
</div>