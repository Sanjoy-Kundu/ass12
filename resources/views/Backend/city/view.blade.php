@extends('../Layout/Backendmaster')
@section('content')
<div class="card shadow mb-4">
    <div class="card-header">
        <h6 class="m-0 font-weight-bold text-primary">Cities / <a href="{{route('cities.city.lists')}}">City Lists</a></h6>
    </div>
    <div class="card-body">
       
        <h2 class="text-center"><span class="bg-warning text-white">The Name of The City is </span><span class="bg-primary text-white"> {{$cities->city_name}}</span></h2>
      
        <hr><hr>

        <table class="table table-bordered primary">
            <thead>
              <tr align="center">
                <th scope="col">ID</th>
                <th scope="col">CITY NAME</th>
         
              </tr>
            </thead>
            <tbody>
              <tr align="center">
                <th scope="row">{{$cities->id}}</th>
                <td>{{$cities->city_name}}</td>
              </tr>
              <tr>
                <td colspan="6"><button class="btn btn-danger w-100 mx-auto"><a href="{{route('cities.city.lists')}}" class="text-white text-decoration-none">Previous Page</a></button></td>
              </tr>
            </tbody>
          </table>
    </div>
</div>
@endsection
 
 
