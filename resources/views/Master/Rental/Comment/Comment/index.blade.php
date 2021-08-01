{{-- memanggil isi content yang ada di app.blade.php --}}
@extends('layouts.app')
@section('title','Comment')
@section('breadcrumb','Comment')

{{-- memanggil isi content yang ada di html.blade.php --}}
@section('content')
    {{-- @livewire('master.akses.index') --}}
    @include('Master.Rental.Comment.Comment.home')
@endsection

{{-- mengaktifkan jquery --}}
@section('extra_javascript')
    @include('Master.Rental.Comment.Comment.jsSide')
    @include('Master.Rental.Comment.Comment.jsLive')
@endsection
