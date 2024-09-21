@extends('layout.dashboard-sidenav')
@section('title','Modal Page')
@section('content')
    @include('components.back-end.model.model-list')
    @include('components.back-end.model.model-create')
@endsection
