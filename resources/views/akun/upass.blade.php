@extends('route-tamplate')
@section('title', 'Klinik Bersama')
@section('container')


	<form action="{{ url('/upass') }}" method="post">


		

		<h4>Verifikasi</h4>
		<p>Masukan password anda saat ini untuk melakukan verifikasi password</p>
			@csrf
		<div class="form-floating mb-2">
			<input type="password" class="form-control @error('password') is-invalid @enderror" name="password" value="" placeholder="Password anda"> 
			<label for="floatingInput">Password anda</label>
			@error('password')
				<div class="invalid-feedback">
					{{ $message }}
				</div>
			@enderror
		</div> 


		<input type="submit" value="Verifikasi" class="btn btn-primary" style="float:right;">
		<br><br><br>

	</form>


	@if(session('gagal'))
		<div class="alert alert-success alert-dismissible fade show" role="alert">
		{{ session('gagal') }}
		<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
		</div>
	@endif


@endsection