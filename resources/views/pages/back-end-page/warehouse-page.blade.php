@extends('layout.dashboard-sidenav')
@section('title','Warehouse Page')
@section('content')
    @include('components.back-end.Warehouse.warehouse-list')
    @include('components.back-end.Warehouse.warehouse-create')
    @include('components.back-end.Warehouse.warehouse-update')
    @include('components.back-end.Warehouse.warehouse-delete')
@endsection
