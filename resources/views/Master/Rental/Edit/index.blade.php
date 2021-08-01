{{-- memanggil isi content yang ada di app.blade.php --}}
@extends('layouts.app')
@section('title','Edit Rental')
@section('breadcrumb','Edit Rental')

{{-- memanggil isi content yang ada di html.blade.php --}}
@section('content')
    {{-- @livewire('master.akses.index') --}}
    @include('Master.Rental.Edit.home')
@endsection

{{-- mengaktifkan jquery --}}
@section('extra_javascript')
    @include('Master.Rental.Edit.jsSide')
    @include('Master.Rental.Edit.jsLive')
@endsection