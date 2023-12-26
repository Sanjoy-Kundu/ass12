@extends('../Layout/Backendmaster')
@section('content')
<div class="card shadow mb-4">
    <div class="py-3">
        <h5 class="m-0 font-weight-bold text-primary">Notice:  <span> <marquee behavior="" direction="left">Wellcome to E-ticket Platform. Please add your trip so fastly.</marquee></span></h5>
    </div>
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Trips / <a href="{{route('trips.lists')}}">Trip Lists</a></h6>
    </div>
    <h4 class="text-center">Add Your Bus Trip</h4>
    <div class="card-body">
        <div class="w-50 mx-auto p-4">
            @if(session('success'))
            <div class="alert alert-success">{{session('success')}}</div>
            @endif
            <form method="post" action="{{route('trips.trip.store')}}">
                @csrf

                <div class="form-group">
                  <label for="">Starting Point Journey</label>
                  <select name="start_journey_city_id" id="" class="form-control">
                    <option value="" selected>Plase choose one</option>
                    @if ($cities->count() > 0)
                    @foreach ($cities as $city)
                    <option value="{{$city->id}}">{{$city->city_name}}</option>
                    @endforeach
                    @else
                    <option value="">No city found</option>
                    @endif
                  </select>
                  @error('start_journey_city_id')
                    <span class="text-danger">{{$message}}</span>
                  @enderror
                </div>

                <div class="form-group">
                  <label for="">Ending Point Journey</label>
                  <select name="stop_journey_city_id" id="" class="form-control">
                    <option value="" selected>Plase choose one</option>
                    @if ($cities->count() > 0)
                    @foreach ($cities as $city)
                    <option value="{{$city->id}}">{{$city->city_name}}</option>
                    @endforeach
                    @else
                    <option value="">No city found</option>
                    @endif
                  </select>
                  @error('stop_journey_city_id')
                    <span class="text-danger">{{$message}}</span>
                  @enderror
                </div>

                <div class="form-group">
                  <label for="">Driver Name</label>
                  <select name="driver_id" id="" class="form-control">
                    <option value="" selected>Plase choose one</option>
                    @if ($drivers->count() > 0)
                    @foreach ($drivers as $driver)
                    <option value="{{$driver->id}}">{{$driver->bus_driver_name}}</option>
                    @endforeach
                    @else
                    <option value="">No driver found</option>
                    @endif
                  </select>
                  @error('driver_id')
                    <span class="text-danger">{{$message}}</span>
                  @enderror
                </div>

                <div class="form-group">
                  <label for="">Trip Date</label>
                    <input type="date" name="trip_date" class="form-control">
                  @error('trip_date')
                    <span class="text-danger">{{$message}}</span>
                  @enderror
                </div>

                <div class="form-group">
                    <label for="">Bus Name</label>
                    <select name="bus_name_id" id="" class="form-control">
                      <option value="" selected>Plase choose one</option>
                        @if ($buses->count() > 0)
                        @foreach ($buses as $buse)
                        <option value="{{$buse->id}}">{{$buse->bus_name}}</option>
                        @endforeach
                        @else
                        <option value="">No bus found</option>
                        @endif
                    </select>
                    @error('bus_name_id')
                      <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>

           

                  <div class="form-group">
                    <label for="">Bus Seats</label>
                    <select name="bus_seat_id" id="" class="form-control">
                      <option value="" selected>Plase choose one</option>
                        @if ($buses->count() > 0)
                        @foreach ($buses as $bus)
                        <option value="{{$buse->id}}">{{$bus->bus_name}} Seats({{$bus->bus_total_seats}})</option>
                        @endforeach
                        @else
                        <option value="">No bus found</option>
                        @endif
                    </select>
                    @error('bus_seat_id')
                      <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>

                  <div class="form-group">
                    <label for="">Select Your Time</label>
                    <select name="bus_time_id" id="" class="form-control">
                      <option value="" selected>Plase choose Time</option>
                        @if ($times->count() > 0)
                        @foreach ($times as $time)
                        <option value="{{$time->id}}">{{$time->time}}</option>
                        @endforeach
                        @else
                        <option value="">No bus found</option>
                        @endif
                    </select>
                    @error('bus_time_id')
                      <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>








                  <div class="form-group">
                    <label for="">Bus Condition</label>
                    <select name="bus_condition" id="" class="form-control">
                      <option value="ac">AC</option>
                      <option value="none_ac">NONE AC</option>
                    </select>
                    @error('bus_condition')
                      <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="">Ticket Price</label>
                      <input type="number"  name="ticket_price" class="form-control" placeholder="Enter ticket price">
                    @error('ticket_price')
                      <span class="text-danger">{{$message}}</span>
                    @enderror
                  </div>



                <button type="submit" class="btn btn-primary">ADD Trip</button>
              </form>
        </div>
    </div>
</div>
@endsection
 
 
