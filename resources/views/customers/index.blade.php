@extends('admin.masterAdmin')

@section('content')
    <h3>Customers</h3>
    <div class="row">
    @if(count($customers) > 0)
        @foreach($customers as $customer)
            
            
                <div class="col-md-4">
                        <div class="box box-widget widget-user-2">
                                <!-- Add the bg color to the header using any of the bg-* classes -->
                                <div class="widget-user-header bg-aqua-active">
                                  <div class="widget-user-image">
                                    <img class="img-circle" style="width:75px; height:75px;" src="storage/cx_images/{{$customer->cx_image}}" alt="User Avatar">
                                  </div>
                                  <!-- /.widget-user-image -->
                                  <h3 class="widget-user-username"  >   <a  style="color:#fff;" href="customers/{{$customer->id}}">{{ $customer->cx_name }}</a></h3>
                                  <h5 class="widget-user-desc">   Id : {{$customer->id}}</h5>
                                </div>
                                <div class="box-footer no-padding">
                                  <ul class="nav nav-stacked">
                                    <li><a href="#">Name <span class="pull-right">{{ $customer->cx_name }}</span></a></li>
                                    <li><a href="#">father Name <span class="pull-right">{{ $customer->father_name }}</span></a></li>
                                    <li><a href="#">Passport No<span class="pull-right">{{ $customer->passport_number }}</span></a></li>
                                    <li><a href="#">DOB<span class="pull-right">{{ $customer->phone_number }}</span></a></li>
                                    
                                  </ul>
                                </div>
                              </div>

                </div>

            
        @endforeach

        {{$customers->links()}}
    @else
        <p>No Customer found</p>
    @endif
</div>

    
@endsection