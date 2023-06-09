@extends('route-tamplate')
@section('title', 'Klinik Bersama')
@section('container')

<style type="text/css">
a.info{
	text-decoration:none; 
	color:#000; 
	font-size:15px; 
	background:#fff; 
	padding:5px 10px; 
	font-weight:bold;
	border-radius:5px;
	float:right;
	margin-right:25px;
}

a.info:hover{
	background:#000;
	color:#fff;
}

</style>

<div class="row" style="margin:0px; padding:0px;">

  <div class="col-sm-6 text-center">
    <div class="card" style="background:no-repeat; border:none;">
      <div class="card-body">
		<img src="{{ asset('icon/loginn.gif')}}" width="100%">
		<a href="#" class="info" data-bs-toggle="modal" data-bs-target="#info"> For your information </a>
      </div>
    </div>
  </div>

  <div class="col-sm-6">

    <div class="card" style="background:no-repeat; border:none; margin-top:70px;">
      <div class="card-body">


	@if(session()->has('loginError'))
		<div class="alert alert-warning alert-dismissible fade show" role="alert">
		{{ session('loginError') }}
		<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
		</div>
	@endif


    @if(session('berhasil'))
      <div class="alert alert-success alert-dismissible fade show" role="alert">
      {{ session('berhasil') }}
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
    @endif


		<form action="{{ url('/loginn') }}" method="post">

				@csrf

			<div class="form-floating mb-2">
				<input type="text" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="Email" autofocus required> 
				<label for="floatingInput">Email</label>
				@error('email')
					<div class="invalid-feedback">
						{{ $message }}
					</div>
				@enderror
			</div>

			<div class="form-floating mb-2">
				<input type="password" class="form-control @error('password') is-invalid @enderror" name="password" value="" placeholder="Password" required> 
				<label for="floatingInput">Password</label>
				@error('password')
					<div class="invalid-feedback">
						{{ $message }}
					</div>
				@enderror
			</div>

			<input type="submit" value="Login" class="btn btn-primary" style="float:right;">
		</form>


      </div>
    </div>
  </div>


</div>



        <!-- Modal -->
        <div class="modal fade" id="info" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">For Your Information</h5>
                <button type="button" class="btn" data-bs-dismiss="modal" aria-label="Close">
                  <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-backspace-fill" viewBox="0 0 16 16">
                    <path d="M15.683 3a2 2 0 0 0-2-2h-7.08a2 2 0 0 0-1.519.698L.241 7.35a1 1 0 0 0 0 1.302l4.843 5.65A2 2 0 0 0 6.603 15h7.08a2 2 0 0 0 2-2V3zM5.829 5.854a.5.5 0 1 1 .707-.708l2.147 2.147 2.146-2.147a.5.5 0 1 1 .707.708L9.39 8l2.146 2.146a.5.5 0 0 1-.707.708L8.683 8.707l-2.147 2.147a.5.5 0 0 1-.707-.708L7.976 8 5.829 5.854z"/>
                  </svg>      
                </button>
              </div>
              <div class="modal-body">
              	<h5>Untuk melakukan testing program silakan login dengan akun dibawah ini;</h5>
              	<p>
              		<b>Admin : </b><br>
              		<b>Email : </b> encuy12@gmail.com | <b>Password : </b> encuy12
              	</p>
              	<p>
              		<b>Dokter : </b><br>
              		<b>Email : </b> rani12@gmail.com | <b>Password : </b> rani12
              	</p>
              	<p>
              		<b>Pasin : </b><br>
              		<b>Email : </b> reno12@gmail.com | <b>Password : </b> reno12
              	</p>
              	<p>
              		<b>Pasin : </b><br>
              		<b>Email : </b> amaral12@gmail.com | <b>Password : </b> amaral12
              	</p>
              </div>

              <div class="modal-footer">
              	<h5 style="float:left; width:100%;">Terima Kasih</h5>
              </div>


            </div>
          </div>
        </div>
        <!-- akhir dari model----->





@endsection