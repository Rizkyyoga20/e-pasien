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
    <form action="{{ url('/obat/update_img',$obats->id) }}" method="POST" enctype="multipart/form-data">

        <a href="{{ url('/obat') }}">
        <button type="button" class="btn" data-bs-dismiss="modal" aria-label="Close" style="float:right;">
          <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-backspace-fill" viewBox="0 0 16 16">
            <path d="M15.683 3a2 2 0 0 0-2-2h-7.08a2 2 0 0 0-1.519.698L.241 7.35a1 1 0 0 0 0 1.302l4.843 5.65A2 2 0 0 0 6.603 15h7.08a2 2 0 0 0 2-2V3zM5.829 5.854a.5.5 0 1 1 .707-.708l2.147 2.147 2.146-2.147a.5.5 0 1 1 .707.708L9.39 8l2.146 2.146a.5.5 0 0 1-.707.708L8.683 8.707l-2.147 2.147a.5.5 0 0 1-.707-.708L7.976 8 5.829 5.854z"/>
          </svg>      
        </button>
      </a><br><br>


        <h4>Update gambar obat</h4>

            @csrf
            @method('PUT')



        <div class="form-floating mb-2" style="background:no-repeat;">
               @if($obats->gambar_obat)
                    <img src="{{ asset('obats/' . $obats->gambar_obat)}}" class="img-preview img-fluid mb-1 col-sm-2">
               @else
                   <img class="img-preview img-fluid mb-1 col-sm-2">
               @endif

            <input type="hidden" name="old_gambar" value="{{ $obats->gambar_obat }}"> 
            <input type="file" class="form-control @error('gambar_obat') is-invalid @enderror" name="gambar_obat" style="background:no-repeat;" onchange="previewimage()" id="image"> 

            @error('gambar_obat')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror

        </div> 

        <input type="submit" value="Update" class="btn btn-primary" style="float:left;">
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