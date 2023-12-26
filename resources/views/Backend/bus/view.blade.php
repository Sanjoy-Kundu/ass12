@extends('../Layout/Backendmaster')
@section('content')
<div class="card shadow mb-4">
    <div class="card-header">
        <h6 class="m-0 font-weight-bold text-primary">Buses / <a href="{{route('buses.bus.lists')}}">Bus Lists</a></h6>
    </div>
    <div class="card-body">
        <div class="mx-auto" style="width: 200px; height:200px; boder-radius:50%; border:1px solid black margin:0 auto">
            <img src="{{asset('uploads/backend/bus/main')}}/{{$singleBus->bus_image}}" class="w-100" alt="">
        </div>
        <h2 class="text-center"><span class="bg-warning text-white">The Name of The Paribahan is </span><span class="bg-primary text-white"> {{$singleBus->bus_name}}</span></h2>
      
        <hr><hr>

        <table class="table table-bordered primary">
            <thead>
              <tr align="center">
                <th scope="col">ID</th>
                <th scope="col">BUS NAME</th>
                <th scope="col">BUS REGISTRATION NUMBER</th>
                <th scope="col">BUST REGISTRATION DATE</th>
                <th scope="col">SEATS CAPACITY</th>
                <th scope="col">BUS IMAGE</th>
              </tr>
            </thead>
            <tbody>
              <tr align="center">
                <th scope="row">{{$singleBus->id}}</th>
                <td>{{$singleBus->bus_name}}</td>
                <td>{{$singleBus->bus_registration_no}}</td>
                <td>{{$singleBus->created_at->format('D-M-Y')}}</td>
                <td>{{$singleBus->bus_total_seats}}</td>
                <td><img src="{{asset('uploads/backend/bus/main')}}/{{$singleBus->bus_image}}" class="w-100 img-fluid" alt=""></td>
              </tr>
              <tr>
                <td colspan="6"><button class="btn btn-danger w-100 mx-auto"><a href="{{route('buses.bus.lists')}}" class="text-white text-decoration-none">Previous Page</a></button></td>
              </tr>
            </tbody>
          </table>
    </div>
</div>
@endsection
 
 
