@extends('layout.dashboard-sidenav')
@section('title','Suprlius Page')
@section('content')
    @include('components.back-end.Suprlius.suprlius-list')
    @include('components.back-end.Suprlius.suprlius-create')
    @include('components.back-end.Suprlius.suprlius-update')
    @include('components.back-end.Suprlius.suprlius-delete')
@endsection
