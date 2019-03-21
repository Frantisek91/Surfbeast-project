@extends('layouts.app')

@section('content')

<div class="homepage">

    <section class="banner">
        <div class="form">
            <form action="{{ action('SurfController@show') }}" method="get">

                    <select name="destination_id" class="form-control">
                        @foreach($destinations as $destination)
                            <option value="{{ $destination->id }}">{{ $destination->name }}</option>
                        @endforeach
                    </select>
            
                    <input type="date" name="start" class="form-control" placeholder="Od kdy?"/>
                    <input type="date" name="end" class="form-control" placeholder="Do kdy?"/>
            
                    <input type="number" name="price_min" class="form-control" placeholder="Částka od"/>
                    <input type="number" name="price_max" class="form-control" placeholder="do"/>
            
                    <button type="submit" class="btn btn-primary">Najdi surf kemp</button>
            
                </form>
                <br>
        </div>
    </section>

    <div class="slogan">
        <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. A velit, obcaecati ipsam labore non aut.</p>
    </div>

    <div class="container pictures-text">

        <div class="float row">
            <div class="picture col-md-4">
                <img src="{{ asset('/img/surf2.jpg') }}" alt="">
            </div>
            <div class="text col-md-8">
                Lorem ipsum dolor sit amet consectetur, adipisicing elit. Illo harum voluptates voluptatum officia minima repellat numquam iste ut totam mollitia?
            </div>
        </div>

        <div class="float row">
                <div class="text col-md-8">
                        Lorem ipsum dolor sit amet consectetur, adipisicing elit. Illo harum voluptates voluptatum officia minima repellat numquam iste ut totam mollitia?
                </div>
                <div class="picture col-md-4">
                    <img src="{{ asset('/img/surf2.jpg') }}" alt="">
                </div>
        </div>

        <div class="float row">
                <div class="picture col-md-4">
                    <img src="{{ asset('/img/surf2.jpg') }}" alt="">
                </div>
                <div class="text col-md-8">
                    Lorem ipsum dolor sit amet consectetur, adipisicing elit. Illo harum voluptates voluptatum officia minima repellat numquam iste ut totam mollitia?
                </div>
        </div>
    </div>

    <h1>3 nejlepsi volby podle nasich recenzi</h1>

    <div class="row">
        <div class="col-md-4">
            <div class="card text-center">
            <div class="card-body">
                <h5 class="card-title">Special title treatment</h5>
                <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                <a href="#" class="btn btn-primary">Go somewhere</a>
            </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card text-center">
            <div class="card-body">
                <h5 class="card-title">Special title treatment</h5>
                <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                <a href="#" class="btn btn-primary">Go somewhere</a>
            </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card text-center">
            <div class="card-body">
                <h5 class="card-title">Special title treatment</h5>
                <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                <a href="#" class="btn btn-primary">Go somewhere</a>
            </div>
            </div>
        </div>
    </div>


</div>

@endsection