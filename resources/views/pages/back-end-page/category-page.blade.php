@extends('layout.dashboard-sidenav')
@section('title','Category Page')
@section('content')
    @include('components.back-end.Category.category-list')
    @include('components.back-end.Category.category-create')
@endsection
