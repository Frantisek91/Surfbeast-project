@extends('layout')

@section('content')

@if(!empty($camps))
    {{ var_dump($camps->destination_id) }}
@endif

@endsection