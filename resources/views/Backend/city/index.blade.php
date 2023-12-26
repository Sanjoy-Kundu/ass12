@extends('../Layout/Backendmaster')
@section('content')
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Buses / <a href="{{route('buses.busRegistration')}}">Add Bus</a></h6>
    </div>
    <div class="card-body">
        <h2 class="text-center">Your City Lists</h2>
        @if ($allCities->count() == 0)
        <h5 class="text-center">Total Cities: 0</h5>
        @else
        <h5 class="text-center">Total Cities: {{$allCities->count()}}</h5>
        @endif
        <table id="example" class="display table" style="width:100%">
            <thead>
                <tr class="text-center">
                    <th>ID</th>
                    <th>City Name</th>
                    <th>Creation Date</th>
                    <th>Update Date</th>
                    <th>Action</th>
                    {{--  --}}
                </tr>
            </thead>
            <tbody>
                @if ($allCities->count() == 0)
                <tr align="center">
                    <td colspan="6" align="center">No Data Found</td>
                </tr>
                @else
                @foreach ($allCities as $city)
                <tr align="center">
                    <td>{{$loop->index+1}}</td>
                    <td>{{$city->city_name}}</td>
                    <td>{{$city->created_at->format('d-M-Y')}}</td>
                    <td>@if (!$city->updated_at->format('d-M-Y'))
                        <button class="btn btn-badge bg-primary">Pending</button>
                    @else
                    {{$city->updated_at->format('d-M-Y')}}
                    @endif</td>
                    <td>
                        <div class="btn-group" role="group" aria-label="Basic example">
                            <button type="button" class="btn btn-primary text-white">
                                <a href="{{route('cities.city.view', $city->id)}}" class="text-decoration-none text-white">VIEW</a>
                            </button>
                            <button type="button" class="btn btn-warning text-white">
                                <a href="{{route('cities.city.edit', $city->id)}}" class="text-decoration-none text-white">EDIT</a>
                            </button>
                            <button type="button" class="btn btn-danger text-white">
                                <a href="" class="text-decoration-none text-white">DELETE</a>
                            </button>
                          </div>
                    </td>
                </tr> 
                @endforeach
                
                @endif
            </tbody>
        </table>
        
        <script>
            // Initialize the DataTable
            $(document).ready(function() {
                $('#example').DataTable();
            });
        </script>
        
    </div>
</div>
@endsection
 
 
