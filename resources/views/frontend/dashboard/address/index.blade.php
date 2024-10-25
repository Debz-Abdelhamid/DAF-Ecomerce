@extends('frontend.dashboard.layouts.master')

@section('title')
    {{$settings->site_name}} &mdash; Address
@endsection

@section('content')

<section id="wsus__dashboard">
    <div class="container-fluid">
        @include('frontend.dashboard.layouts.sidebard')
    
            
            <div class="row">
                    <div class="col-xl-9 col-xxl-10 col-lg-9 ms-auto">
                      <div class="dashboard_content">
                        <h3><i class="fal fa-gift-card"></i> address</h3>
                        <div class="wsus__dashboard_add">
                          <div class="row">
                            @foreach($addresses as $address)
                                <div class="col-xl-6">
                                <div class="wsus__dash_add_single">
                                    <h4>Billing Address <span>home</span></h4>
                                    <ul>
                                    <li><span>name :</span> {{ $address->name }}</li>
                                    <li><span>Phone :</span>{{ $address->phone }}</li>
                                    <li><span>email :</span>{{ $address->email }}</li>
                                    <li><span>country :</span>{{ $address->country }}</li>
                                    <li><span>city :</span>{{ $address->city }}</li>
                                    <li><span>State :</span>{{ $address->state }}</li>
                                    <li><span>zip code :</span> {{ $address->zip }} </li>
                                    <li><span>address :</span>{{ $address->address }}</li>
                                    </ul>
                                    
                                    <div class="d-flex" style="display:flex; justify-content:end; margin-bottom: 3px;">
                                        <a href="{{ route('user.address.edit', $address) }}"
                                            class="btn btn-primary" style="margin-right:8px;"><i class="far fa-edit"></i></a>

                                            <form id="delete-form-{{ $address->id }}" action="{{ route('user.address.destroy', $address) }}" method="POST" style="display: none;">
                                                @csrf
                                                @method('DELETE')
                                            </form>
                                            <div class="d-flex" style="margin-right:5px;">
                                                <button class="btn btn-danger" type="button" onclick="confirmDelete({{ $address->id }})">
                                                    <i class="far fa-trash-alt"></i>
                                                </button>
                                            </div>

                                    </div>

                                    
                                </div>
                                </div>  
                            @endforeach

                            {{ $addresses->links() }}

                            <div class="col-12">
                              <a href="{{route('user.address.create')}}" class="add_address_btn common_btn"><i class="far fa-plus"></i>
                                add new address</a>
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


@push('scripts')

<script>

    function confirmDelete(address) {
        Swal.fire({
            title: "Are you sure?",
            text: "You won't be able to revert this!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Yes, delete it!"
        }).then((result) => {
            if (result.isConfirmed) {

                document.getElementById('delete-form-' + address).submit();

            }
        });
    }

</script>    

@endpush