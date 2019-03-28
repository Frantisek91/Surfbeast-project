@extends('layouts.app')

@section('content')
<div class="container">    
  <div class="container results">
    <br>
      <h2>{{ $camp->name }}</h2>

      @include('alerts')

      <h3>{{ $camp->agency->name }}</h3>
      <br>

    <div class="banner row">
        <img src="{{ $camp->image_url_2 }}" alt="" class="col col-md-5 picture-fluid">
        <p class="row-6 col-md-7">{{ $camp->description }}</p>
    </div>

    <h4>Dostupné termíny:</h4>
    <br>
      @foreach ($camp->terms as $term)
      <div class="terms">  
        <div class="term">
          <div>Od: {{ $term->start }}</div>
          <div>Do: {{ $term->end }}</div>
          <div>Cena: {{ $term->price }} Kč</div>
        </div>
        <button type="button" class="btn btn-primary mx-2" data-toggle="modal" data-target=".bd-example-modal-lg">Zjistit obsazenost</button>
      </div>
      @endforeach
      
      <br>

      @php $counter = 0; @endphp
      @foreach ($pannels as $key => $value)
      <div class="panel-group" id="accordion">
        <div class="panel panel-default">
          <div class="panel-heading">
            <h4 class="panel-title">
              <a data-toggle="collapse" data-parent="#accordion" href="#collapse{{ $counter }}">
                {{ $value }}</a>
            </h4>
          </div>
          <div id="collapse{{ $counter++ }}" class="panel-collapse collapse in">
            <div class="panel-body container">{{ $camp->$key }}</div>
          </div>
        </div>
      @endforeach



      <h5>Lokalita</h5>
        <div class="widget">
          <div class="embed-responsive embed-responsive-16by9">
          <div classc="mapouter"><div class="gmap_canvas"><iframe id="gmap_canvas" src="{{ $camp->url }}" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe></div><style>.mapouter{position:relative;text-align:right;height:500px;width:600px;}.gmap_canvas {overflow:hidden;background:none!important;height:500px;width:600px;}</style></div>
          <br> 
        </div>
        <div class="embed-responsive embed-responsive-16by9">
          <div class="seaweed" style="background:#fff"><script type="text/javascript" src="{{ $camp->image_url_5 }}"></script><p><div style="font-family:Arial, Helvetica, sans-serif;text-align:center;font-size:10px;color:#000;height:25px;"><a href="{{ $camp->url_msw }}" style="color:#000;"></a></div></p></div>
        </div>
        </div>
          <!-- This code is issued by Magicseaweed.com under license 1553174474_96736 for the website  only subject to terms and conditions
      and this message being kept intact as part of the code. If you are not the license holder add this content to your website by registering at 
      Magicseaweed.com. All copyrights retained by Wavetrak Limited and any attempt to modify or redistribute this code is prohibited. 
      Please contact us for more information if required. -->


      <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <form method="post" action="{{ action("InquiryController@store", $term->id) }}">

              <div class="modal-header">
                <h5 class="modal-title">Zjisti obsazenost a naplánuj si výlet svých snů!</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                @csrf
                
                  <div class="form-group">
                      <label for="formGroupExampleInput">Jméno:</label>
                      <input name="f_name" type="text" class="form-control" id="formGroupExampleInput" placeholder="" value="{{old("f_name")}}" required>
                  </div>

                  <div class="form-group">
                      <label for="formGroupExampleInput">Příjmení:</label>
                      <input name="l_name" type="text" class="form-control" id="formGroupExampleInput" placeholder="" value="{{old("l_name")}}" required>
                  </div>

                  <div class="form-group">
                      <label for="formGroupExampleInput">E-mail:</label>
                      <input name="email" type="email" class="form-control" id="formGroupExampleInput" placeholder="" value="{{old("email")}}" required>
                  </div>

                  <div class="form-group">
                      <label for="formGroupExampleInput">Telefon:</label>
                      <input name="phone" type="tel" class="form-control" id="formGroupExampleInput" placeholder="" value="{{old("phone")}}" required>
                  </div>

                  <div class="form-group">
                      <label for="exampleFormControlTextarea1">Zpráva pro agenturu</label>
                      <textarea name ="message" class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Zpráva pro agenturu" required>{{old("description")}}</textarea>
                  </div>
              </div>

              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Zavřít</button>
                <button type="submit" class="btn btn-primary">Odeslat</button>
              </div>
            </form>

          </div>
        </div>
      </div>

      <br>
      <br>

      @if ($camp->reviews->count())
          <h5>Komentáře:</h5>

          @foreach ($camp->reviews as $review)
              <h5>Od: {{$review->user->name}}</h5>
              <p>Hodnocení:{{$review->rating}}</p>
              <p>Komentář:{{$review->description}}</p>

              @can("admin")

              <form method="POST" action="{{action("ReviewsController@destroy", $review->id) }}">
                @method("DELETE")
                @csrf
                <button type="submit" class="btn btn-danger">Smazat</button>
              </form>

              @endcan 
              
          @endforeach  

      @endif

      <form method="POST" action="{{action("ReviewsController@store", $camp->id)}}">
          @csrf

          <div class="form-group">
            <label>Celkové hodnocení:</label>
            <select class="form-control" name="rating">
              <option>1</option>
              <option>2</option>
              <option>3</option>
              <option>4</option>
              <option>5</option>
            </select>
          </div>

          <div class="form-group">
            <label>Komentář:</label>
            <textarea class="form-control" name="description" rows="3" required></textarea>
          </div>

          <div class="form-group row">
            <div class="col-sm-10">
              <button type="submit" class="btn btn-primary">Sdílet</button>
            </div>
          </div>
      </form>

  </div>
</div>

@endsection
