<div class="tab-pane fade show active" id="list-home" role="tabpanel" aria-labelledby="list-home-list">
        <div class="card border">
            <div class="card-body">
                <form action="{{ route('admin.general-settings-update') }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label>Site Name</label>
                        <input type="text" name="site_name" value="{{ old('site_name', @$generalsettings->site_name) }}" class="form-control">
                    </div>

                    <div class="form-group">
                        <label>Layout</label>
                        <select name="layout" id="layout" class="form-control">
                            <option {{ @$generalsettings->layout == 'RTL' ? 'selected' : '' }} value="RTL">RTL</option>    
                            <option {{ @$generalsettings->layout == 'LTR' ? 'selected' : '' }} value="LTR">LTR</option>    
                        </select>   
                    </div>

                    <div class="form-group">
                        <label>Contact Email</label>
                        <input type="text" name="contact_email" value="{{ old('contact_email', @$generalsettings->contact_email) }}" class="form-control">
                    </div>


                    <div class="form-group">
                        <label>Contact Phone</label>
                        <input type="text" name="contact_phone" value="{{ old('contact_phone', @$generalsettings->contact_phone) }}" class="form-control">
                    </div>

                    <div class="form-group">
                        <label>Default Currency Name</label>
                        <select name="currency_name" id="currency_name" class="form-control select2">
                            <option selected disabled>Select</option>
                            @foreach(config('settings.currency_list') as $currency)    
                                <option {{ @$generalsettings->currency_name == $currency ? 'selected' : '' }} value="{{ $currency }}">{{ $currency }}</option>
                            
                            @endforeach
                               
                        </select>   
                    </div>

                    <div class="form-group">
                        <label>Currency Icon</label>
                        <input type="text" name="currency_icon" value="{{ old('currency_icon', @$generalsettings->currency_icon) }}" class="form-control">     
                    </div>


                    <div class="form-group">
                        <label>Time Zone</label>
                        <select name="time_zone" id="time_zone" class="form-control select2">
                            <option selected disabled>Select</option>
                            @foreach(config('settings.time_zone') as $key => $timezone)    
                                <option {{ @$generalsettings->time_zone == $key ? 'selected' : '' }} value="{{ $key }}">{{ $key }}</option>
                            
                            @endforeach    
                               
                        </select>   
                    </div>

                    <button type="submit" class="btn btn-primary">Update</button>
                </form>   
            </div>    
        </div>   
</div>