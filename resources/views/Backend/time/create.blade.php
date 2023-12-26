@extends('../Layout/Backendmaster')
@section('content')
<div class="card shadow mb-4">
    <div class="py-3">
        <h4 class="m-0 font-weight-bold text-primary">Notice:  <span> <marquee behavior="" direction="left">Wellcome to E-ticket Platform. Add Your Bus Time Shedule.</marquee></span></h4>
    </div>
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Times / <a href="{{route('timeShedules.lists')}}">Time Lists</a></h6>
    </div>
    <div class="card-body">
        <h2 class="text-center">Add Your Time Shedule</h2>
        <div class="w-50 mx-auto p-4">
            @if(session('success'))
            <div class="alert alert-success">{{session('success')}}</div>
            @endif
            <form method="post" action="{{route('timeShedules.store')}}">
                @csrf

                <div class="form-group">
                    <select name="bus_id" id="" class="form-control">
                        <option value="s">-- Choose One --</option>
                        @foreach($Buses as $bus)
                        <option value="{{$bus->id}}">{{$bus->bus_name}}</option>
                        @endforeach
                        
                    </select>
                  @error('bus_id')
                    <span class="text-danger">{{$message}}</span>
                  @enderror
                </div>
                <div class="form-group">
                  <label for="">Add Time</label>
                  <input type="time" name="time" class="form-control" id="">
                  @error('time')
                    <span class="text-danger">{{$message}}</span>
                  @enderror
                </div>
                <button type="submit" class="btn btn-primary">ADD Time</button>
              </form>
        </div>
    </div>
</div>
@endsection
 
 
