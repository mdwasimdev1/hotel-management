@extends('layouts.app')

@section('header')
@include('layouts.header')
@include('layouts.navbar')
@endsection

@section('content')

    @include('sections.about')

    <!-- Testimonial Start -->
    @include('sections.testimonial')
    <!-- Testimonial End -->
    <!-- Newsletter Start -->
    @include('sections.newsletter')
    <!-- Newsletter End -->
@endsection


@section('footer')
    @include('layouts.footer')
@endsection
