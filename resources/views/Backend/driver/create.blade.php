@extends('../Layout/Backendmaster')
@section('content')
<div class="card shadow mb-4">
    <div class="py-3">
        <h4 class="m-0 font-weight-bold text-primary">Notice:  <span> <marquee behavior="" direction="left">Wellcome to E-ticket Platform. Please Registation Your Bus Driver.</marquee></span></h4>
    </div>
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Drivers / <a href="{{route('drivers.driver.lists')}}">Driver Lists</a></h6>
    </div>
    <div class="card-body">
        <h2 class="text-center">Please Registration Your Bus Driver</h2>
        <div class="w-50 mx-auto p-4">
         
            @if(session('success'))
            <div class="alert alert-success">{{session('success')}}</div>
            @endif
            <form method="post" action="{{route('drivers.driver.store')}}" enctype="multipart/form-data">
                @csrf

                <div class="form-group">
                    <label for="">Bus Name</label>
                    <select name="bus_id" id="" class="form-control">
                            <option value="" selected>Please choose one</option>
                            @if ($allBuses->count() > 0)
                                @foreach ($allBuses as $bus)
                                    <option value="{{$bus->id}}">{{$bus->bus_name}}</option>
                                @endforeach
                            @else
                                <option value="" selected>No Bus Added</option>
                            @endif
                    </select>
                    @error('bus_id')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>


                <div class="form-group">
                  <label for="">Bus Driver Name</label>
                  <input type="text" name="bus_driver_name" class="form-control" id=""placeholder="Enter Your Bus Driver Name">
                  @error('bus_driver_name')
                    <span class="text-danger">{{$message}}</span>
                  @enderror
                </div>


                <div class="form-group">
                  <label for="">Bus Driver Mobile</label>
                  <input type="tel" name="bus_driver_mobile_no" class="form-control" id="" placeholder="Enter Your Bus Driver mobile no">
                  @error('bus_driver_mobile_no')
                    <span class="text-danger">{{$message}}</span>
                  @enderror
                </div>

                <div class="form-group">
                  <label for="">Driver Photo</label>
                  <input type="file" name="bus_driver_image" class="form-control" id="">
                </div>
                <button type="submit" class="btn btn-primary">ADD DRIVER</button>
              </form>
        </div>
    </div>
</div>
@endsection
 
 
