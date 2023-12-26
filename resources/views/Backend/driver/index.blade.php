@extends('../Layout/Backendmaster')
@section('content')
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Drivers / <a href="{{route('drivers.driverRegistration')}}">Add Driver</a></h6>
    </div>
    <div class="card-body">
        <h2 class="text-center">Your Driver List</h2>
        @if ($allDrivers->count() == 0)
        <h5 class="text-center">Total Driver: 0</h5>
        @else
        <h5 class="text-center">Total Bus: {{$allDrivers->count()}}</h5>
        @endif
        <table id="example" class="display table" style="width:100%">
            <thead>
                <tr class="text-center">
                    <th>ID</th>
                    <th>Driver Name</th>
                    <th>Driver Image</th>
                    <th>Driver Mobile</th>
                    <th>Joning Date</th>
                    <th>Bus Name</th>
                    <th>Bus Image</th>
                    <th>Bus Seats</th>
                    <th>Action</th>
                    {{--  --}}
                </tr>
            </thead>
            <tbody>
                @if ($allDrivers->count() == 0)
                <tr align="center">
                    <td colspan="6" align="center">No Data Found</td>
                </tr>
                @else
                @foreach ($allDrivers as $driver)
                <tr align="center">
                    <td>{{$loop->index+1}}</td>
                    <td>{{$driver->bus_driver_name}}</td>
                    <td> <img src="{{asset('uploads/backend/driver/profile')}}/{{$driver->bus_driver_image}}" style="width: 120px; height:120px"></td>
                    <td>{{$driver->bus_driver_mobile_no }}</td>
                    <td>{{$driver->created_at->format('d-M-Y')}}</td>
                    <td>{{$driver->bus[0]->bus_name}}</td>
                    <td> <img src="{{asset('uploads/backend/bus/main')}}/{{$driver->bus[0]->bus_image}}" style="width: 120px; height:120px"></td>
                    <td>{{$driver->bus[0]->bus_total_seats}}</td>
                    <td>
                        <div class="btn-group" role="group" aria-label="Basic example">
                            <button type="button" class="btn btn-primary text-white">
                                <a href="{{route('drivers.driver.view', $driver->id)}}" class="text-decoration-none text-white">VIEW</a>
                            </button>
                            <button type="button" class="btn btn-warning text-white">
                                <a href="{{route('buses.bus.edit', $driver->id)}}" class="text-decoration-none text-white">EDIT</a>
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
 
 
