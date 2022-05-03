@extends('admin.layouts.base')

@section('pageTitle', $apartment->title)

@section('content')
    <h1>Apartment: {{$apartment->title}}</h1>
@endsection