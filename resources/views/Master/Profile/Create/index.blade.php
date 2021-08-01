{{-- memanggil isi content yang ada di app.blade.php --}}
@extends('layouts.app')
@section('title','Profile')
@section('breadcrumb','Profile')

{{-- memanggil isi content yang ada di html.blade.php --}}
@section('content')
    {{-- @livewire('master.akses.index') --}}
    @include('Master.Profile.Create.home')
@endsection

{{-- mengaktifkan jquery --}}
@section('extra_javascript')
    @include('Master.Profile.Create.jsSide')
    @include('Master.Profile.Create.jsLive')
@endsection
