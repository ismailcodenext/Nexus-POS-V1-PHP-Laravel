@extends('layout.dashboard-sidenav')
@section('title','Purchase Page')
@section('content')
    @include('components.back-end.Purchase.purchase-list')
    @include('components.back-end.Purchase.purchase-create')
    @include('components.back-end.Purchase.purchase-update')
    @include('components.back-end.Purchase.purchase-delete')
@endsection
