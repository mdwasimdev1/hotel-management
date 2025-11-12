@extends('layouts.app')

@section('header')
@include('layouts.header')
@include('layouts.navbar')
@endsection

@section('content')
    @include('sections.contactUs')
    @include('sections.newsletter')
@endsection


@section('footer')
    @include('layouts.footer')
@endsection


