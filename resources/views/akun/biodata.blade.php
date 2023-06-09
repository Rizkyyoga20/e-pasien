@extends('route-tamplate')
@section('title', 'Klinik bersama')
@section('container')

    @if(session('berhasil'))
      <div class="alert alert-success alert-dismissible fade show" role="alert">
      {{ session('berhasil') }}
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
    @endif
    

<h3>Biodata Anda</h3>

@foreach( $users as $user)
@if(auth()->user()->no_ktp == "$user->no_ktp")


  <form action="{{ url('/akun/biodata',$user->id) }}" method="post">
      @csrf
      @method('put')
    <div class="form-floating mb-2">
      <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="@error('name') {{ old('name') }} @enderror {{ $user->name }}" placeholder="Name Registrasi"> 
      <label for="floatingInput">Nama Registrasi</label>
      @error('name')
        <div class="invalid-feedback">
          {{ $message }}
        </div>
      @enderror
    </div> 


    <div class="form-floating mb-2">
      <input type="text" class="form-control @error('no_telepon') is-invalid @enderror" name="no_telepon" value="{{ $user->no_telepon }}" placeholder="No Telepon" onkeypress="return isNumber(event)" maxlength="13"> 
      <label for="floatingInput">No Telepon</label>
      @error('no_telepon')
        <div class="invalid-feedback">
          {{ $message }}
        </div>
      @enderror
    </div>

    <div class="form-floating mb-2">
      <select name="jenis_kelamin" class="form-control @error('jenis_kelamin') is-invalid @enderror">
        <option value="{{ $user->jenis_kelamin }}">{{ $user->jenis_kelamin }}</option>
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
      <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ $user->email }}" placeholder="Email"> 
      <label for="floatingInput">Email</label>
      @error('email')
        <div class="invalid-feedback">
          {{ $message }}
        </div>
      @enderror
    </div>

    <div class="form-floating mb-2">
      <input type="text" name="alamat" class="form-control @error('alamat') is-invalid @enderror" value="{{ $user->alamat }}" placeholder="Email"> 
      <label for="floatingInput">Alamat</label>
      @error('alamat')
        <div class="invalid-feedback">
          {{ $message }}
        </div>
      @enderror
    </div>

    <div class="form-floating mb-2">
      <input type="number" name="usia" class="form-control @error('usia') is-invalid @enderror" value="{{ $user->usia }}" placeholder="Usia"> 
      <label for="floatingInput">Usia</label>
      @error('usia')
        <div class="invalid-feedback">
          {{ $message }}
        </div>
      @enderror
    </div>

    <div class="form-floating mb-2">
      <input type="text" name="status" class="form-control @error('status') is-invalid @enderror" value="{{ $user->status }}" placeholder="Status"> 
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


@endif
@endforeach



@endsection