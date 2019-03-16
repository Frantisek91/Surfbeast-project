@extends('layouts.app')

@section('content')
@if (session('success'))
    <div class="alert alert-success">
        {{session('success')}}
    </div>
@endif
<h1>Page with reviews</h1>

<ul>
    @foreach($reviews as $review)
        <li>
            <a href="/reviews/{{$review->id}}">Review</a> 
        </li>
    @endforeach
</ul>

<a href="/reviews/create">CREATE</a>
@endsection