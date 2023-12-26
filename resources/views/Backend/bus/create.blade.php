@extends('../Layout/Backendmaster')
@section('content')
<div class="card shadow mb-4">
    <div class="py-3">
        <h4 class="m-0 font-weight-bold text-primary">Notice:  <span> <marquee behavior="" direction="left">Wellcome to E-ticket Platform. Please Registation Your Bus Be safely.</marquee></span></h4>
    </div>
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Buses / <a href="{{route('buses.bus.lists')}}">Bus Lists</a></h6>
    </div>
    <div class="card-body">
        <h2 class="text-center">Please Registration Your Bus</h2>
        <div class="w-50 mx-auto p-4">
            @if(session('success'))
            <div class="alert alert-success">{{session('success')}}</div>
            @endif
            <form method="post" action="{{route('buses.bus.store')}}" enctype="multipart/form-data">
                @csrf

                <div class="form-group">
                  <label for="">Bus Name</label>
                  <input type="text" name="bus_name" class="form-control" id=""placeholder="Enter Your Bus Name">
                  @error('bus_name')
                    <span class="text-danger">{{$message}}</span>
                  @enderror
                </div>

                <div class="form-group">
                  <label for="">Bus Registration No</label>
                  <input type="text" name="bus_registration_no" class="form-control" id="" placeholder="Enter Your Bus Registraion">
                  @error('bus_registration_no')
                    <span class="text-danger">{{$message}}</span>
                  @enderror
                </div>

                <div class="form-group">
                  <label for="">Bus Image</label>
                  <input type="file" name="bus_image" class="form-control" id="">
                  @error('bus_image')
                    <span class="text-danger">{{$message}}</span>
                  @enderror
                </div>

                <div class="form-group">
                  <label for="">Bus Seats</label>
                  <input type="number" name="bus_total_seats" value="36" class="form-control" id=""  placeholder="Enter Your Bus Toal seats">
                  @error('bus_total_seats')
                    <span class="text-danger">{{$message}}</span>
                  @enderror
                </div>

                <button type="submit" class="btn btn-primary">ADD BUS</button>
              </form>
        </div>
    </div>
</div>
@endsection
 
 
