@extends('layout.dashboard-sidenav')
@section('title','Suprlius Page')
@section('content')
    @include('components.back-end.Suprlius.suprlius-list')
    @include('components.back-end.Suprlius.suprlius-create')
@endsection
