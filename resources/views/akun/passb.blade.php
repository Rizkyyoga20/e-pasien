@extends('route-tamplate')
@section('title', 'Klinik Bersama')
@section('container')


	<form action="{{ url('passb/update', auth()->user()->id) }}" method="post">

	@if(session('berhasil'))
		<div class="alert alert-success alert-dismissible fade show" role="alert">
		{{ session('berhasil') }}
		<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
		</div>
	@endif

		<p>Silakan buat password baru</p>

			@csrf
			@method('put')
		<div class="form-floating mb-2">
			<input type="password" class="form-control @error('password') is-invalid @enderror" name="password" value="" placeholder="Password baru"> 
			<label for="floatingInput">Password baru</label>
			@error('password')
				<div class="invalid-feedback">
					{{ $message }}
				</div>
			@enderror
		</div> 


		<input type="submit" value="Verifikasi" class="btn btn-primary" style="float:right;">
		<br><br><br>

</form>


@endsection