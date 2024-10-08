@extends('layout.dashboard-sidenav')
@section('title','Unit Page')
@section('content')
    @include('components.back-end.Unit.unit-list')
    @include('components.back-end.Unit.unit-create')
    @include('components.back-end.Unit.unit-update')
    @include('components.back-end.Unit.unit-delete')
@endsection
