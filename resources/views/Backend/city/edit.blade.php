@extends('../Layout/Backendmaster')
@section('content')
<div class="card shadow mb-4">
    <div class="py-3">
        <h4 class="m-0 font-weight-bold text-primary">Notice:  <span> <marquee behavior="" direction="left">Wellcome to E-ticket Platform. Please Edit Your City Be safely.</marquee></span></h4>
    </div>
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Cities / <a href="{{route('cities.city.lists')}}">City Lists</a></h6>
    </div>
    <div class="card-body">
        <h2 class="text-center">Please Update Your City</h2>
        <div class="w-50 mx-auto p-4">
            @if(session('success'))
            <div class="alert alert-success">{{session('success')}}</div>
            @endif
            <form method="post" action="{{route('cities.city.update', $city->id)}}">
                @csrf

                <div class="form-group">
                  <label for="">City Name</label>
                  <input type="text" name="update_city_name" class="form-control" id="" value="{{$city->city_name}}">
               
                </div>
                <button type="submit" class="btn btn-primary">UPDATE CITY</button>
              </form>
        </div>
    </div>
</div>
@endsection
 
 
