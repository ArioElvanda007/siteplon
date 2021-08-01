{{-- memanggil isi content yang ada di app.blade.php --}}
@extends('layouts.app')
@section('title','Rental')
@section('breadcrumb','Rental')

{{-- memanggil isi content yang ada di html.blade.php --}}
@section('content')
    {{-- @livewire('master.akses.index') --}}
    @include('Master.Rental.Home.home')
@endsection

{{-- mengaktifkan jquery --}}
@section('extra_javascript')
    @include('Master.Rental.Home.jsSide')
    @include('Master.Rental.Home.jsLive')
@endsection