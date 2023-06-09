<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}" rel="stylesheet" type="text/css">

    <title>@yield('title', 'Klinik Bersama')</title>
  </head>

<script type="text/javascript">
  function isNumber(evt)
    {
      var charCode = (evt.width) ? evt.width : event.keyCode
      if(charCode > 31 && (charCode < 48 || charCode > 57))
      return false;
      return true;
    }
</script>

<style type="text/css">
    ::-webkit-scrollbar {
        width:5px;
        background:#fff;
        -webkit-border-radius:0px;
        border-radius:10px;
        overflow-x:hidden; 
    }

    ::-webkit-scrollbar-thumb {
        background:#1E90FF;
        -webkit-border-radius:0px;
        border-radius:10px;
    }


    ::placeholder {
        color: #000;
        opacity: 1; /* Firefox */
    }

    :-ms-input-placeholder { /* Internet Explorer 10-11 */
        color: #000;
    }

    ::-ms-input-placeholder { /* Microsoft Edge */
        color: #000;
    }
</style>


  <body class="bg-success" style="--bs-bg-opacity: .25;">

<div class="p-3">
	<form action="{{ url('/akun/update',$akuns->id) }}" method="post">

		<a href="{{ url('/akun') }}">
        <button type="button" class="btn" data-bs-dismiss="modal" aria-label="Close" style="float:right;">
          <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-backspace-fill" viewBox="0 0 16 16">
            <path d="M15.683 3a2 2 0 0 0-2-2h-7.08a2 2 0 0 0-1.519.698L.241 7.35a1 1 0 0 0 0 1.302l4.843 5.65A2 2 0 0 0 6.603 15h7.08a2 2 0 0 0 2-2V3zM5.829 5.854a.5.5 0 1 1 .707-.708l2.147 2.147 2.146-2.147a.5.5 0 1 1 .707.708L9.39 8l2.146 2.146a.5.5 0 0 1-.707.708L8.683 8.707l-2.147 2.147a.5.5 0 0 1-.707-.708L7.976 8 5.829 5.854z"/>
          </svg>      
        </button>
      </a><br><br>




		<h4>Edit Akun</h4>

			@csrf
			@method('put')
		<div class="form-floating mb-2">
			<input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="@error('name') {{ old('name') }} @enderror {{ $akuns->name }}" placeholder="Name Registrasi"> 
			<label for="floatingInput">Nama Registrasi</label>
			@error('name')
				<div class="invalid-feedback">
					{{ $message }}
				</div>
			@enderror
		</div> 


		<div class="form-floating mb-2">
			<input type="text" class="form-control @error('no_telepon') is-invalid @enderror" name="no_telepon" value="{{ $akuns->no_telepon }}" placeholder="No Telepon" onkeypress="return isNumber(event)" maxlength="13"> 
			<label for="floatingInput">No Telepon</label>
			@error('no_telepon')
				<div class="invalid-feedback">
					{{ $message }}
				</div>
			@enderror
		</div>

		<div class="form-floating mb-2">
			<select name="jenis_kelamin" class="form-control @error('jenis_kelamin') is-invalid @enderror">
				<option value="{{ $akuns->jenis_kelamin }}">{{ $akuns->jenis_kelamin }}</option>
				<option value="Laki-laki">Laki-laki</option>
				<option value="Perempuan">Perempuan</option>
			</select>
			<label for="floatingInput">Pilih Jenis Kelamin</label>
			@error('jenis_kelamin')
				<div class="invalid-feedback">
					{{ $message }}
				</div>
			@enderror
		</div>

		<div class="form-floating mb-2">
			<select name="status_akses" class="form-control @error('status_akses') is-invalid @enderror">
				<option value="{{ $akuns->status_akses }}">{{ $akuns->status_akses }}</option>
				<option value="Admin">Admin</option>
				<option value="Dokter">Dokter</option>
			</select>
			<label for="floatingInput">Pilih Status Akses</label>
			@error('status_akses')
				<div class="invalid-feedback">
					{{ $message }}
				</div>
			@enderror
		</div>

		<div class="form-floating mb-2">
			<input type="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ $akuns->email }}" placeholder="Email"> 
			<label for="floatingInput">Email</label>
			@error('email')
				<div class="invalid-feedback">
					{{ $message }}
				</div>
			@enderror
		</div>

		<div class="form-floating mb-2">
			<input type="text" name="alamat" class="form-control @error('alamat') is-invalid @enderror" value="{{ $akuns->alamat }}" placeholder="Email"> 
			<label for="floatingInput">Alamat</label>
			@error('alamat')
				<div class="invalid-feedback">
					{{ $message }}
				</div>
			@enderror
		</div>

		<div class="form-floating mb-2">
			<input type="number" name="usia" class="form-control @error('usia') is-invalid @enderror" value="{{ $akuns->usia }}" placeholder="Usia"> 
			<label for="floatingInput">Usia</label>
			@error('usia')
				<div class="invalid-feedback">
					{{ $message }}
				</div>
			@enderror
		</div>

		<div class="form-floating mb-2">
			<input type="text" name="status" class="form-control @error('status') is-invalid @enderror" value="{{ $akuns->status }}" placeholder="Status"> 
			<label for="floatingInput">Status</label>
			@error('status')
				<div class="invalid-feedback">
					{{ $message }}
				</div>
			@enderror
		</div>


		<input type="submit" value="Edit" class="btn btn-primary" style="float:right;">
		<br><br><br>

</form>

</div>

    <script src="{{ asset('js/app.js') }}"></script>

  </body>
</html>