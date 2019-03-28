@extends('layouts.app')

@section('content')

@if($destination->id == 1)
  <div class="destination spain">
    <h2>{{ $destination->name }}</h2>
    <p>{{ $destination->description }}</p>
  </div>
@elseif($destination->id == 2)
  <div class="destination bali">
    <h2>{{ $destination->name }}</h2>
    <p>{{ $destination->description }}</p>
  </div>
@elseif($destination->id == 3)
  <div class="destination france">
    <h2>{{ $destination->name }}</h2>
    <p>{{ $destination->description }}</p>
  </div>
@endif

  <form action="{{ action('SurfController@show') }}" method="get">
  <div class="container">
    <div class="form-row my-3">
      <div class="col-12 col-md">
        <select name="destination_id" class="form-control form-control-sm">
          @foreach($destinations as $d)
            <option value="{{ $d->id }}" {{ $d->id == $destination->id ? "selected" : "" }}>{{ $d->name }}</option>
          @endforeach
        </select>
      </div>
      <div class="col-6 col-md">
        <input type="date" name="start" class="form-control form-control-sm" placeholder="Od kdy?" value="{{ $start }}"/>
      </div>
      <div class="col-6 col-md">
        <input type="date" name="end" class="form-control form-control-sm" placeholder="Do kdy?" value="{{ $end }}"/>
      </div>
      <div class="col-6 col-md">
        <input type="number" name="price_min" class="form-control form-control-sm" placeholder="Částka od" value="{{ $price_min }}"/>
      </div>
      <div class="col-6 col-md">
        <input type="number" name="price_max" class="form-control form-control-sm" placeholder="do" value="{{ $price_max }}"/>
      </div>
    {{--   <div class="col-12 col-md">
        <select name="sort" id="" class="form-control form-control-sm">
          <option value="start-asc" {{ $sort == "start-asc" ? "selected" : "" }}>Nejbližší</option>
          <option value="start-desc" {{ $sort == "start-desc" ? "selected" : "" }}>Nejpozdější</option>
        </select>
      </div> --}}
      <div class="col-12 col-md">
        <button type="submit" class="btn btn-primary btn-sm">Hledej</button>
      </div>
    </div>
  </div>
  </form>

  <div class="container">
    @if(!empty($camps))
    <div class="row">

      
        @foreach ($camps as $camp)  
        <div class="col-12 col-md-4">   
            @if(!empty($camp->terms))
            <div class="card mb-3" style="max-width: 540px;">
              <div class="row no-gutters">
                <div class="col-md-4">
                  <img src="{{ $camp->image_url_1 }}" class="card-img" alt="Surfcamp">
                  @if(!empty($camp->average_review))
                    <p class="text-center my-2">Hodnocení:</p>
                    <label class="text-center bg-warning mx-5 p-2 rounded-circle">{{$camp->average_review}}</label>
                  @else
                    <p class="text-center m-3">Bez hodnocení</p>
                  @endif
                </div>
                <div class="col-md-8">
                  <div class="card-body">
                    <h5 class="card-title">{{ $camp->name }}</h5>
                    <a href="{{ action('AgencyController@show', $camp->agency_id) }}" target="_blank"><h5>{{ $camp->agency->name }}</h5></a> 
              
                    <a href="{{ action('CampController@show', $camp->id) }}" class="btn btn-primary">Zobrazit detaily</a>
                      <br>
                      <br>
                  </div>
                </div>
              </div>
            </div>

            @endif
        </div>

        @endforeach
    </div>
    @endif
  </div>

@endsection