@extends('../Layout/Backendmaster')
@section('content')
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Buses / <a href="{{route('buses.busRegistration')}}">Add Bus</a></h6>
    </div>
    <div class="card-body">
        <h2 class="text-center">Your Bus List</h2>
        @if ($allBuses->count() == 0)
        <h5 class="text-center">Total Bus: 0</h5>
        @else
        <h5 class="text-center">Total Bus: {{$allBuses->count()}}</h5>
        @endif
        <table id="example" class="display table" style="width:100%">
            <thead>
                <tr class="text-center">
                    <th>ID</th>
                    <th>Bus Name</th>
                    <th>Regi Date</th>
                    <th>Updated Date</th>
                    <th>Reg. No</th>
                    <th>Image</th>
                    <th>Seats</th>
                    <th>Action</th>
                    {{--  --}}
                </tr>
            </thead>
            <tbody>
                @if ($allBuses->count() == 0)
                <tr align="center">
                    <td colspan="6" align="center">No Data Found</td>
                </tr>
                @else
                @foreach ($allBuses as $bus)
                <tr align="center">
                    <td>{{$loop->index+1}}</td>
                    <td>{{$bus->bus_name}}</td>
                    <td>{{$bus->created_at->format('d-M-Y')}}</td>
                    <td>@if (!$bus->updated_at->format('d-M-Y'))
                        <button class="btn btn-badge bg-primary">Pending</button>
                    @else
                    {{$bus->updated_at->format('d-M-Y')}}
                    @endif</td>
                    <td>{{$bus->bus_registration_no}}</td>
                    <td> <img src="{{asset('uploads/backend/bus/main')}}/{{$bus->bus_image}}" style="width: 120px; height:120px"></td>
                    <td>{{$bus->bus_total_seats}}</td>
                    <td>
                        <div class="btn-group" role="group" aria-label="Basic example">
                            <button type="button" class="btn btn-primary text-white">
                                <a href="{{route('buses.bus', $bus->id)}}" class="text-decoration-none text-white">VIEW</a>
                            </button>
                            <button type="button" class="btn btn-warning text-white">
                                <a href="{{route('buses.bus.edit', $bus->id)}}" class="text-decoration-none text-white">EDIT</a>
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
 
 
