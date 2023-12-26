@extends('../Layout/Backendmaster')
@section('content')
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Buses / <a href="{{route('trips.lists')}}">Shedules</a></h6>
    </div>
    <div class="card-body">
        <h2 class="text-center">Your Passenger List</h2>
        @if ($passengers->count() == 0)
        <h5 class="text-center">Total Passenger: 0</h5>
        @else
        <h5 class="text-center">Total Bus: {{$passengers->count()}}</h5>
        @endif
        <table id="example" class="display table" style="width:100%">
            <thead>
                <tr class="text-center">
                    <th>ID</th>
                    <th>Passenger Name</th>
                    <th>Passenger Number</th>
                    <th>Totatl Seats</th>
                    <th>Passenger Ticket</th>
                    <th>Ticket Price</th>
                    <th>Amount</th>
                    <th>Bus Name</th>
                    <th>Action</th>
                    {{--  --}}
                </tr>
            </thead>
            <tbody>
                @if ($passengers->count() == 0)
                <tr align="center">
                    <td colspan="6" align="center">No Data Found</td>
                </tr>
                @else
                @foreach ($passengers as $passenger)
                <tr align="center">
                    <td>{{$loop->index+1}}</td>
                    <td>{{$passenger->passenger_name}}</td>
                    <td>{{$passenger->passenger_number}}</td>
                    <td>{{$passenger->busName[0]->bus_total_seats + $passenger->passenger_seats}}</td>
                    <td>{{$passenger->passenger_seats}}</td>
                    <td>{{$passenger->seat_price}}</td>
                    <td>{{$passenger->passenger_seats * $passenger->seat_price}}</td>
                    <td>{{$passenger->busName[0]->bus_name}}</td>
                    <td><button class="btn btn-danger"><a href="" class="text-decoration-none text-white">DELETE</a></button></td>
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
 
 
