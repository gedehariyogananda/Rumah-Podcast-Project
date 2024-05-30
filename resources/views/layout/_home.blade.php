@extends('layout.main')

@section('judul')
halaman home
@endsection

@section('isi')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
  <h1 class="h3 mb-0 text-gray-400">selamat datang {{$user->name}}</h1>
  <button type="submit" class="d-none d-sm-inline-block btn btn-sm btn-primary " data-bs-toggle="modal"
    data-bs-target="#simpan"> Logout</button>
  <div class="modal fade" id="simpan" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="simpan">notifikasi</h5>
          {{-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> --}}
        </div>
        <div class="modal-body">
          apakah anda yakin ingin keluar dari akun {{$user->name}}
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">tidak</button>
          <a href="/logout" class="btn btn-primary">iyaa</a>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="row">

  <!-- Second Blog post-->
  @if($user->level == 1)
  <div class="card mb-4">
    <a href="/home"><img class="card-img-top"
        src="https://i.pinimg.com/564x/c2/ec/8d/c2ec8ddde44fae32c37f10fde0d6fb34.jpg"
        style="width:300px; height:300px;;" alt="..." /></a>
    <div class="card-body">
      <div class="small text-muted">anda login sebagai admin</div>
      <h2 class="card-title h4">selamat datang {{$user->name}} </h2>
      <p class="card-text">Anda sekarang login sebagai admin</p>
    </div>
  </div>
  @endif
  <!-- Third Blog post-->
  @if($user->level == 2)
  <div class="card mb-4">
    <a href="/home"><img class="card-img-top" src="/air/{{$user->foto}}" style="width:300px; height:300px;;"
        alt="..." /></a>
    <div class="card-body">
      <div class="small text-muted">anda login sebagi user</div>
      <h2 class="card-title h4">selamat datang {{$user->name}}</h2>
      <p class="card-text">Anda sekarang login sebagai user</p>
      <a class="btn btn-primary" href="/user">Podcast lainnya →</a>
    </div>
  </div>
  @endif
  <!-- Third Blog post-->
  @if($user->level == 3)
  <div class="card mb-4">
    <a href="/home"><img class="card-img-top" src="/air/{{$user->foto}}" style="width:300px; height:300px;;"
        alt="..." /></a>
    <div class="card-body">
      <div class="small text-muted">anda login sebagi kreator</div>
      <h2 class="card-title h4">selamat datang {{$user->name}}</h2>
      <p class="card-text">Anda sekarang login sebagai kreator</p>
      <a class="btn btn-primary" href="/user">Podcast lainnya →</a>
    </div>
  </div>
  @endif
</div>
</div>
</div>

</div>
</div>


















@endsection