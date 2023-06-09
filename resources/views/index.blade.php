@extends('route-tamplate')
@section('title', 'Klinik Bersama')
@section('container')


<div class="row" style="margin:0px; padding:0px;">

    @if(session('berhasil'))
      <div class="alert alert-success alert-dismissible fade show" role="alert">
      {{ session('berhasil') }}
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
    @endif

  <div class="col-sm-6 text-center">
    <div class="card" style="background:no-repeat; border:none;">
      <div class="card-body">
		<img src="{{ asset('icon/sambutan.gif')}}" width="100%">
      </div>
    </div>
  </div>

  <div class="col-sm-6 text-center">
    <div class="card" style="background:no-repeat; border:none;">
      <div class="card-body">
		<img src="{{ asset('icon/logo-kelinik-bersama.jpg')}}" width="65%"><h3 align="center">Layanan Pasien</h3>
      </div>
    </div>
  </div>


</div>



@endsection