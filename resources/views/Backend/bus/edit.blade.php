@extends('../Layout/Backendmaster')
@section('content')
<div class="card shadow mb-4">
    <div class="py-3">
        <h4 class="m-0 font-weight-bold text-primary">Notice:  <span> <marquee behavior="" direction="left">Wellcome to E-ticket Platform. Please Update Your <span class="text-danger">{{$busInfo->bus_name}}</span> Info.</marquee></span></h4>
    </div>
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Buses / <a href="{{route('buses.bus.lists')}}">Bus Lists</a></h6>
    </div>
    <div class="card-body">
        <h2 class="text-center">Update Your Bus Information</h2>
        <div class="w-50 mx-auto p-4">
            @if(session('success'))
            <div class="alert alert-success">{{session('success')}}</div>
            @endif
            <form method="post" action="{{route('buses.bus.update', $busInfo->id)}}">
                @csrf
                <div class="form-group">
                  <label for="">Bus Name</label>
                  <input type="text" name="update_bus_name" class="form-control" id="" value="{{$busInfo->bus_name}}">
        
                </div>

                <div class="form-group">
                  <label for="">Bus Registration No</label>
                  <input type="text" name="update_bus_registration_no" class="form-control" id="" value="{{$busInfo->bus_registration_no}}" >
               
                </div>

                <div class="form-group">
                  <label for="">Bus Image</label>
                  {{-- <input type="file" name="update_bus_image" class="form-control" id=""> --}}
                  <img src="{{asset('uploads/backend/bus/main')}}/{{$busInfo->bus_image}}" style="width: 180px; height:120px; margin-right:30px">
                </div>

                <div class="form-group">
                  <label for="">Bus Seats</label>
                  <input type="number" name="update_bus_total_seats" value="{{$busInfo->bus_total_seats}}" class="form-control" id="">
              
                </div>

                <button type="submit" class="btn btn-primary">UPDATE BUS</button>
              </form>
        </div>
    </div>
</div>
@endsection
 
 
