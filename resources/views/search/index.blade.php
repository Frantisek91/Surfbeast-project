@extends('layouts.app')

@section('content')

<div class="homepage">

    <section class="banner img-fluid">
        <div class="form">
            <form action="{{ action('SurfController@show') }}" method="get">

                    <div class="formicka">
                        <select name="destination_id" class="form-control">
                            @foreach($destinations as $destination)
                                <option value="{{ $destination->id }}">{{ $destination->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="formicka">
                        <input type="date" name="start" class="form-control" placeholder="Od kdy?"/>
                    </div>
                    <div class="formicka">
                        <input type="date" name="end" class="form-control" placeholder="Do kdy?"/>
                    </div>
                    <div class="formicka">
                        <input type="number" name="price_min" class="form-control" placeholder="Částka od"/>
                    </div>
                    <div class="formicka">
                        <input type="number" name="price_max" class="form-control" placeholder="do"/>
                    </div>
                    <button type="submit" class="btn btn-primary">Najdi surf kemp</button>
            
                </form>
                <br>
        </div>
    </section>

    <div class="slogan">
        <p>Mapa českých surfových kempů ve světě, na jednom místě.</p>
    </div>

    <h1 class="my-5">Proč vyrazit na surf kemp?</h1>

    <div class="container pictures-text">

        <div class="floating row">
            <div class="picture-fluid picture col-md-4">
                <img src="{{ asset('/img/surf2.jpg') }}" alt="">
            </div>
            <div class="text col-md-8">
                Surfování je vynikající aktivita, která Vám pomůže zlepšit celkové zdraví a dostat se do pohody. Proč? Vždycky je fajn, když je člověk venku, na čerstvém vzduchu a v objetí slunečních paprsků. Na surfu navíc procvičíte celé tělo. Pádlování rukama je perfektní kardiovaskulární cvičení, které posílí vaše paže a svaly celého trupu. A navíc, když už se na prkno konečně postavíte, tak si posílíte téměř všechny svaly dolní poloviny těla. A to je fajn.
            </div>
        </div>

        <div class="floating row middle">
            <div class="picture-fluid picture col-md-4">
                <img src="{{ asset('/img/surf2.jpg') }}" alt="">
            </div>
            <div class="text col-md-8">
                O surfovaní je známé, že je to vynikající odbourávač stresu a napětí, proto se mnozí lidé s náročným zaměstnáním anebo přetažení povinnostmi často vydávají surfovat, aby si tak vyčistili hlavu a mysl. Jen si představte, jak osvobozující to musí být: vy sami s větrem na otevřeném moři, vlny a jednoduchá deska pod nohami. Osvěžení pro duši i tělo – slibujeme!
            </div>
        </div>

        <div class="floating row">
            <div class="picture-fluid picture col-md-4">
                <img src="{{ asset('/img/surf2.jpg') }}" alt="">
            </div>
            <div class="text col-md-8">
                V dnešní době se kdokoliv může věnovat běhu, procestovat na kole celou zemi, do práce jezdit na kolečkových bruslích nebo hrát o víkendu tenis – a je to normální. Při surfování ale máte zaručené, že zažijete neopakovatelné dobrodružství. Surf si stále drží punc výjimečnosti a jedinečných zážitků.
            </div>
        </div>


        <h1 class="my-5">3 nejlepsi volby podle nasich recenzi</h1>
        <div class="row">
            @foreach($camps as $camp)
                <div class="col-12 col-md-4">
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
                                    
                                    <a href="{{ action('CampController@show', $camp->id) }}" target="_blank" class="btn btn-primary">Zobrazit detaily</a>
                                
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection