@extends('../Layout/Backendmaster')
@section('content')
<div class="card shadow mb-4">
    <div class="py-3">
        <h5 class="m-0 font-weight-bold text-primary">Notice:  <span> <marquee behavior="" direction="left">Sell Your Ticket. Enjoy Your Day</marquee></span></h5>
    </div>
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Passenger / <a href="{{route('passenger.lists')}}">Passenger Lists</a></h6>
    </div>
    <h4 class="text-center">Ticket Sell Section</h4>
    <div class="card-body">
        <div class="w-50 mx-auto p-4">
         
            @if(session('success'))
            <div class="alert alert-success">{{session('success')}}</div>
            @endif
            <form method="post" action="{{route('trip.Ticket.sell.store')}}">
                @csrf
                <div class="form-group" style="display:none">
                  <label for="">Bus ID</label>
                  <input type="text" name="bus_id"  value="{{$sellTicket->bus[0]->id}}" class="form-control">
                </div>
                <div class="form-group">
                  <label for="">Bus Name</label>
                  <input type="text" value="{{$sellTicket->bus[0]->bus_name}}" class="form-control">
                </div>
                <div class="form-group">
                  <label for="">Total Seats</label>
                  <input type="" name="total_seats" value="{{$sellTicket->bus[0]->bus_total_seats}}" class="form-control">
                </div>

                <div class="form-group">
                  <label for="">Seat Price</label>
                  <input name="seat_price" type="text" value="{{$sellTicket->ticket_price}}" class="form-control">
                </div>

                <div class="form-group">
                  <label for="">Passenger Seats</label>
                  <input name="passenger_seats" type="number" placeholder="Enter Your Seats" value="" class="form-control">
                </div>

                <div class="form-group">
                  <label for="">Passenger Name</label>
                  <input name="passenger_name" type="text" placeholder="Enter Your Name" value="" class="form-control">
                </div>

                <div class="form-group">
                  <label for="">Passenger Number</label>
                  <input name="passenger_number" placeholder="Enter Your Number" type="tel" value="" class="form-control">
                </div>

                

                <button type="submit" class="btn btn-primary">PURCHES TICEKT</button>
              </form>
        </div>
    </div>
</div>
@endsection
 
 
