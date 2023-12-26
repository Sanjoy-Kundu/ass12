@extends('../Layout/Backendmaster')
@section('content')
<div class="card shadow mb-4">
    <div class="card-header">
        <h6 class="m-0 font-weight-bold text-primary">Time / <a href="{{route('timeShedules.lists')}}">Time Lists</a></h6>
    </div>
    <div class="card-body">
      
        <hr><hr>

        <table class="table table-bordered primary">
            <thead>
              <tr align="center">
                <th scope="col">ID</th>
                <th scope="col">BUS NAME</th>
                <th scope="col">BUS IMAGE</th>
                <th scope="col">TIME</th>
                <th scope="col">SEATS CAPACITY</th>
              </tr>
            </thead>
            <tbody>
              <tr align="center">
                <th scope="row">{{$timelist->id}}</th>
                <td>{{$timelist->bus[0]->bus_name}}</td>
                <td><img src="{{asset('uploads/backend/bus/main')}}/{{$timelist->bus[0]->bus_image}}" class="w-100 img-fluid" alt=""></td>
                <td>{{$timelist->time}}</td>
                <td>{{$timelist->bus[0]->bus_total_seats}}</td>
              </tr>
              <tr>
                <td colspan="6"><button class="btn btn-danger w-100 mx-auto"><a href="{{route('timeShedules.lists')}}" class="text-white text-decoration-none">Previous Page</a></button></td>
              </tr>
            </tbody>
          </table>
    </div>
</div>
@endsection
 
 
