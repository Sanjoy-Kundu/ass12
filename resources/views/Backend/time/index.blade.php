@extends('../Layout/Backendmaster')
@section('content')
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Times / <a href="{{route('timeShedules.timeSheduleRegistration')}}">Add Time</a></h6>
    </div>
    <div class="card-body">
        <h2 class="text-center">Your Time Lists</h2>
       
        <table id="example" class="display table" style="width:100%">
            <thead>
                <tr class="text-center">
                    <th>ID</th>
                    <th>Bus Name</th>
                    <th>Bus Seats</th>
                    <th>Bus Image</th>
                    <th>Depature Time</th>
                    <th>Update Date</th>
                    <th>Action</th>
                    {{--  --}}
                </tr>
            </thead>
            <tbody>
                @if ($times->count() == 0)
                <tr align="center">
                    <td colspan="6" align="center">No Data Found</td>
                </tr>
                @else
                @foreach ($times as $time)
                <tr align="center">
                    <td>{{$loop->index+1}}</td>
                    <td>{{$time->bus[0]->bus_name}}</td>
                    <td>{{$time->bus[0]->bus_total_seats}}</td>
                    <td>
                        <img src="{{asset('uploads/backend/bus/main')}}/{{$time->bus[0]->bus_image}}" style="width: 120px; height:120px">
                    </td>
                    <td>{{$time->time}}</td>
                    <td>@if (!$time->updated_at->format('d-M-Y'))
                        <button class="btn btn-badge bg-primary">Pending</button>
                    @else
                    {{$time->updated_at->format('d-M-Y')}}
                    @endif</td>
                    <td>
                        <div class="btn-group" role="group" aria-label="Basic example">
                            <button type="button" class="btn btn-primary text-white">
                                <a href="{{route('timeShedules.view', $time->id)}}" class="text-decoration-none text-white">VIEW</a>
                            </button>
                            <button type="button" class="btn btn-warning text-white">
                                <a href="{{route('cities.city.edit', $time->id)}}" class="text-decoration-none text-white">EDIT</a>
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
 
 
