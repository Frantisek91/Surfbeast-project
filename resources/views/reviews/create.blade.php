@extends('layouts.app')

@section('content')
<a href="/reviews">BACK TO REVIEWS</a>
<form method="POST" action="/reviews">
        @csrf
        {{-- <div class="form-group">
        <label>Name</label>
        <input type="text" name='name' class="form-control" placeholder="John Doe">
        </div> --}}

        <div class="form-group">
        <label>Overall Experience</label>
        <select class="form-control" name="rating">
            <option>1</option>
            <option>2</option>
            <option>3</option>
            <option>4</option>
            <option>5</option>
        </select>
        </div>

        <div class="form-group">
        <label>Describe your experience with this surf camp or agency</label>
        <textarea class="form-control" name="description" rows="3"></textarea>
        </div>

        <div class="form-group row">
            <div class="col-sm-10">
            <button type="submit" class="btn btn-primary">Share</button>
            </div>
        </div>
    </form>

@endsection