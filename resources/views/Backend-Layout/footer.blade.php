<?php
  $profiles = Auth::user()->profile;
?>

<footer class="main-footer no-print">
    <strong>Copyright &copy; {{$profiles->copyright}} </strong>
    {{-- <strong><i class="fas fa-sm fa-phone ml-1 mr-1"></i> 021-xxxxxxx</strong> --}}
    <strong><i class="fas fa-sm fa-envelope ml-1 mr-1"></i>{{$profiles->email}}</strong>

    {{-- <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 3.0.5.1
    </div> --}}
</footer>