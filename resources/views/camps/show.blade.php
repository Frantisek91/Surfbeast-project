@extends('layouts.app')

@section('content')
    
<div class="container results">

    <h2>{{ $camp->agency->name }}</h2>

    @include('alerts')

    <h3>{{ $camp->name }}</h3>
    <br>

    <div class="banner col">
        <img src="{{ asset('/img/surf2.jpg') }}" alt="" class="row-6 col-md-4">
        <p class="row-6 col-md-4">{{ $camp->description }}</p>
    </div>

    <h5>Ubytování</h5>

    <p>{{ $camp->accommodation }}</p>

    <h5>Stravování</h5>

    <p>{{ $camp->catering }}</p>

    <h5>Doprava</h5>

    <p>{{ $camp->transport }}</p>

    <h5>Pojištění</h5>

    <p>{{ $camp->insurance }}</p>

    <h5>Transfer</h5>

    <p>{{ $camp->transfer }}</p>

    <h5>Program</h5>

    <p>{{ $camp->schedule }}</p>

    <h5>Lekce</h5>

    <p>{{ $camp->surf_lessons }}</p>

    <h5>Vybavení</h5>

    <p>{{ $camp->equipment }}</p>

    <h5>Úroveň</h5>

    <p>{{ $camp->skill_level }}</p>

    <h5>Instruktoři</h5>

    <p>{{ $camp->instructors }}</p>

    <h5>Lokalita</h5>

    <div class="mapouter"><div class="gmap_canvas"><iframe width="450" height="338" id="gmap_canvas" src="{{ $camp->url }}" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe></div><style>.mapouter{position:relative;text-align:right;height:500px;width:600px;}.gmap_canvas {overflow:hidden;background:none!important;height:500px;width:600px;}</style></div>
    <br>
    
    <!-- This code is issued by Magicseaweed.com under license 1553174474_96736 for the website  only subject to terms and conditions
    and this message being kept intact as part of the code. If you are not the license holder add this content to your website by registering at 
    Magicseaweed.com. All copyrights retained by Wavetrak Limited and any attempt to modify or redistribute this code is prohibited. 
    Please contact us for more information if required. -->
    <div style="width:400px;background:#fff"><script type="text/javascript" src="{{ $camp->image_url_5 }}"></script><p><div style="font-family:Arial, Helvetica, sans-serif;text-align:center;font-size:10px;color:#000;height:25px;"><a href="{{ $camp->url_msw }}" style="color:#000;"></a></div></p></div>

    <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bd-example-modal-lg">Zjistit obsazenost</button>

    <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg">
          <div class="modal-content">
              <form method="post" action="{{ action("InquiryController@store", $camp->id) }}">

              <div class="modal-header">
                <h5 class="modal-title">Zjisti obsazenost a naplánuj si výlet svých snů!</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                 @csrf
                  <div class="form-group">
                    <label>Jméno:</label>
                    <input type="text" name="f_name">
                  </div><br>
          
                  <div class="form-group">
                    <label>Příjmení:</label>
                    <input type="text" name="l_name">
                  </div><br>
                              
                  <div class="form-group">
                    <label>E-mail:</label>
                    <input type="email" name="email">
                  </div><br>
          
                  <div class="form-group">
                    <label>Tel.:</label>
                    <input type="tel" name="phone">
                  </div><br>
          
                  <div class="form-group">
                    <label>Zpráva pro cestovní kancelář/agenturu:</label>
                    <textarea name="message" id="" cols="30" rows="10"></textarea>
                  </div><br>
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
        <h5>Komentáře</h5>

        @foreach ($camp->reviews as $review)
            <h5>Od: {{$review->user->name}}</h5>
            <h5>Celkové hodnocení:{{$review->rating}}</h5>
            <p>Komentář:{{$review->description}}</p>

            @can("admin")

            <form method="POST" action="{{action("ReviewsController@destroy", $review->id) }}">
              @method("DELETE")
              @csrf
              <button type="submit" class="btn btn-primary">Smazat</button>
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

@endsection
