@extends('layout.dashboard-sidenav')
@section('title','Brand Page')
@section('content')
    @include('components.back-end.brand.brand-list')
    @include('components.back-end.brand.brand-create')
@endsection
