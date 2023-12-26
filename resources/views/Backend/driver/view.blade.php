@extends('../Layout/Backendmaster')
@section('content')
<div class="card shadow mb-4">
    <div class="py-3">
        <h4 class="m-0 font-weight-bold text-primary">Notice:  <span> <marquee behavior="" direction="left">Wellcome to E-ticket Platform. Update Your Bus Driver.</marquee></span></h4>
    </div>
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Drivers / <a href="{{route('drivers.driver.lists')}}">Driver Lists</a></h6>
    </div>
    <div class="card-body">
        <h2 class="text-center">Update Your Bus Driver</h2>
        <div class="w-50 mx-auto p-4">
         
            @if(session('success'))
            <div class="alert alert-success">{{session('success')}}</div>
            @endif
            <form method="post" action="{{route('drivers.driver.update', $driver->id)}}" enctype="multipart/form-data">
                @csrf

                <div class="form-group">
                    <label for="">Bus Name</label>
                    <select name="update_bus_id" id="" class="form-control">
                            <option value="{{$driver->bus_id}}" selected>{{$driver->bus[0]->bus_name}}</option>
                            @foreach ($allBuses as $bus)
                            <option value="{{$bus->id}}">{{$bus->bus_name}}</option>
                            @endforeach
                    </select>
    
                </div>


                <div class="form-group">
                  <label for="">Bus Driver Name</label>
                  <input type="text" name="update_bus_driver_name" class="form-control" id="" value="{{$driver->bus_driver_name}}">
                </div>


                <div class="form-group">
                  <label for="">Bus Driver Mobile</label>
                  <input type="tel" name="update_bus_driver_mobile_no" class="form-control" id="" value="{{$driver->bus_driver_mobile_no}}">
                </div>


                <div class="img" style="display: flex; justify-content:space-between; align-items:center">
                    <div class="form-group">
                    <label for="">Driver Photo</label>
                    <img  src="{{asset('uploads/backend/driver/profile')}}/{{$driver->bus_driver_image}}" style="width: 220px; height:220px" class="img-fluid" alt="">
                    </div>

                    <div class="form-group">
                    <label for="">Bus Photo</label>
                        <img src="{{asset('uploads/backend/bus/main')}}/{{$driver->bus[0]->bus_image}}" height="220" width="220" alt="">
                    </div>
                </div>

                <div class="form-group">
                  <label for="">Driver Photo</label>
                  <input type="file" name="bus_driver_image" class="form-control" id="">
                </div>
                <button type="submit" class="btn btn-primary">UPDATE DRIVER</button>
              </form>
        </div>
    </div>
</div>
@endsection
 
 
