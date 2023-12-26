@extends('../Layout/Backendmaster')
@section('content')
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Trips / <a href="{{route('trips.tripRegistration')}}">Add Trip</a></h6>
    </div>
    <div class="card-body">
        <h2 class="text-center">Your Trip Lists</h2>
        @if ($trips->count() == 0)
        <h5 class="text-center">Total Trips: 0</h5>
        @else
        <h5 class="text-center">Total Trips: {{$trips->count()}}</h5>
        @endif
        <table id="example" class="display table" style="width:100%">
            <thead>
                <tr class="text-center">
                    <th>ID</th>
                    <th>Route</th>
                    <th>Bus Name</th>
                    <th>Bus Image</th>
                    <th>Time</th>
                    <th>Driver Name</th>
                    <th>Driver Image</th>
                    <th>Seats</th>
                    <th>Bus Condition</th>
                    <th>Seat Price</th>
                    <th>Action</th>
                    {{--  --}}
                </tr>
            </thead>
            <tbody>
                @if ($trips->count() == 0)
                <tr align="center">
                    <td colspan="6" align="center">No Data Found</td>
                </tr>
                @else
                @foreach ($trips as $trip)
                <tr align="center">
                    <td>{{$loop->index+1}}</td>
                    <td>{{$trip->startCity[0]->city_name}} TO {{$trip->endCity[0]->city_name}}</td>
               
                    {{-- <td>{{$trip->endCity}}</td> --}}
                    <td>{{$trip->bus[0]->bus_name}}</td>
                    <td><img src="{{asset('uploads/backend/bus/main')}}/{{$trip->bus[0]->bus_image}}" style="width: 120px; height:120px"></td>
                    <td>{{$trip->time[0]->time}}</td>
                    <td>{{$trip->driver->bus_driver_name}}</td>
                    <td><img src="{{asset('uploads/backend/driver/profile')}}/{{$trip->driver->bus_driver_image}}" style="width: 120px; height:120px"></td>
                    <td>{{$trip->bus[0]->bus_total_seats}}</td>
                    <td>{{$trip->bus_condition}}</td>
                    <td>{{$trip->ticket_price}}</td>
                    <td>
                       
                        <button class="btn btn-warning"><a class="text-decoration-none text-white" href="{{route('trip.Ticket.sell', $trip->id)}}">TICKET SELL</a></button>
                    </td>
                    {{-- <td>{{$bus->bus_name}}</td>
                    <td>{{$bus->created_at->format('d-M-Y')}}</td>
                    <td>@if (!$bus->updated_at->format('d-M-Y'))
                        <button class="btn btn-badge bg-primary">Pending</button>
                    @else
                    {{$bus->updated_at->format('d-M-Y')}}
                    @endif</td>
                    <td>{{$bus->bus_registration_no}}</td>
                    <td> </td>
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
                    </td> --}}
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
 
 
