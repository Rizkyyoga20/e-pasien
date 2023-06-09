<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="text/css" href="{{ asset('icon/logo-kelinik-bersama.jpg')}}">
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
    <form action="{{ url('/pasien/add_konsul') }}" method="POST">

        <a href="{{ url('/pasien') }}">
        <button type="button" class="btn" data-bs-dismiss="modal" aria-label="Close" style="float:right;">
          <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-backspace-fill" viewBox="0 0 16 16">
            <path d="M15.683 3a2 2 0 0 0-2-2h-7.08a2 2 0 0 0-1.519.698L.241 7.35a1 1 0 0 0 0 1.302l4.843 5.65A2 2 0 0 0 6.603 15h7.08a2 2 0 0 0 2-2V3zM5.829 5.854a.5.5 0 1 1 .707-.708l2.147 2.147 2.146-2.147a.5.5 0 1 1 .707.708L9.39 8l2.146 2.146a.5.5 0 0 1-.707.708L8.683 8.707l-2.147 2.147a.5.5 0 0 1-.707-.708L7.976 8 5.829 5.854z"/>
          </svg>      
        </button>
      </a><br><br>

        <h4>Buat form konsul</h4>

            @csrf

            <input type="hidden" name="id_pasien" value="{{ $pasien->no_ktp }}">     

            <div class="form-floating mb-2">
              <input type="number" class="form-control @error('no_antrian') is-invalid @enderror" name="no_antrian" value="{{ old('no_antrian') }}" placeholder="Nomor Antrian" onkeypress="return isNumber(event)" maxlength="3"> 
              <label for="floatingInput">Nomor Antrian</label>
              @error('no_antrian')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
              @enderror
            </div>

            <div class="form-floating mb-2">
	            <textarea name="catatan" class="form-control @error('catatan') is-invalid @enderror" placeholder="Catatan konsul" value="{{ old('catatan') }}">{{ old('catatan') }}</textarea> 
	            
	            <label for="floatingInput">Catatan konsul pasien</label>
	            @error('catatan')
	                <div class="invalid-feedback">
	                  {{ $message }}
	                </div>
	            @enderror
           </div>
           
           <input type="submit" value="Add Konsul" class="btn btn-primary" style="float:right;">




        <br><br><br>
</form>


</div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="{{ asset('js/app.js') }}"></script>

  </body>
</html>




