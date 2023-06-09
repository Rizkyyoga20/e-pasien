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
    <form action="{{ url('/obat/update',$obats->id) }}" method="POST" enctype="multipart/form-data">

        <a href="{{ url('/obat') }}">
        <button type="button" class="btn" data-bs-dismiss="modal" aria-label="Close" style="float:right;">
          <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-backspace-fill" viewBox="0 0 16 16">
            <path d="M15.683 3a2 2 0 0 0-2-2h-7.08a2 2 0 0 0-1.519.698L.241 7.35a1 1 0 0 0 0 1.302l4.843 5.65A2 2 0 0 0 6.603 15h7.08a2 2 0 0 0 2-2V3zM5.829 5.854a.5.5 0 1 1 .707-.708l2.147 2.147 2.146-2.147a.5.5 0 1 1 .707.708L9.39 8l2.146 2.146a.5.5 0 0 1-.707.708L8.683 8.707l-2.147 2.147a.5.5 0 0 1-.707-.708L7.976 8 5.829 5.854z"/>
          </svg>      
        </button>
      </a><br><br>


        <h4>Edit Obat</h4>

            @csrf
            @method('PUT')


        <div class="form-floating mb-2">
            <input type="text" class="form-control @error('nama_obat') is-invalid @enderror" name="nama_obat" placeholder="Nama Obat" value="{{ $obats->nama_obat }}"> 
            <label for="floatingInput">Nama Obat</label>
            @error('nama_obat')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div> 

        <div class="form-floating mb-2">
            <input type="text" class="form-control @error('stok_obat') is-invalid @enderror" name="stok_obat"value="{{ $obats->stok_obat }}" placeholder="Stok Obat" onkeypress="return isNumber(event)" maxlength="10"> 
            <label for="floatingInput">Stok Obat</label>
            @error('stok_obat')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="form-floating mb-2">
            <input type="text" class="form-control @error('harga_obat') is-invalid @enderror" name="harga_obat" value="{{ $obats->harga_obat }}" placeholder="Harga Obat" onkeypress="return isNumber(event)" maxlength="10"> 
            <label for="floatingInput">Harga Obat</label>
            @error('harga_obat')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="form-floating mb-2">
            <select name="kategori_obat" class="form-control @error('kategori_obat') is-invalid @enderror">
                <option value="{{ $obats->kategori_obat }}">{{ $obats->kategori_obat }}</option>
                <option value="Obat Luar">Obat Luar</option>
                <option value="Obat Dalam">Obat Dalam</option>
            </select>
            <label for="floatingInput">Pilih Kategori Obat</label>
            @error('kategori_obat')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="form-floating mb-2">
            <textarea name="keterangan_obat" class="form-control @error('keterangan_obat') is-invalid @enderror" placeholder="Keterangan Obat">{{ $obats->keterangan_obat }}</textarea> 
            <label for="floatingInput">Keterangan Obat</label>
            @error('keterangan_obat')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

 

        <input type="submit" value="Update" class="btn btn-primary" style="float:right;">
        <br><br><br>
</form>

</div>



<script type="text/javascript">
    function previewimage(){
        const image = document.querySelector('#image');
        const imagepreview = document.querySelector('.img-preview');

        imagepreview.style.display = 'block';
        
        const oFReader = new FileReader(); 
        oFReader.readAsDataURL(image.files[0]);

        oFReader.onload = function(oFREvent){
        imagepreview.src = oFREvent.target.result;
        }
    }
</script>

    <script src="{{ asset('js/app.js') }}"></script>
  </body>
</html>