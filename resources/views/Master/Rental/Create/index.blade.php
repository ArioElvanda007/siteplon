{{-- memanggil isi content yang ada di app.blade.php --}}
@extends('layouts.app')
@section('title','Create Rental')
@section('breadcrumb','Create Rental')

{{-- memanggil isi content yang ada di html.blade.php --}}
@section('content')
    {{-- @livewire('master.akses.index') --}}
    @include('Master.Rental.Create.home')
@endsection

{{-- mengaktifkan jquery --}}
@section('extra_javascript')
    @include('Master.Rental.Create.jsSide')
    @include('Master.Rental.Create.jsLive')
@endsection