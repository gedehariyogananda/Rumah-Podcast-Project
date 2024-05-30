@extends('layout.master_main')
@section('name_fitur', 'Dashboard Panel')
@section('content')
<div class="container-fluid">
    <h4 class="text-center">ALL PODCAST</h4>
    <br>
    <form action="{{ route('recording.search') }}" method="GET">
        <div class="input-group mb-3">
            <input type="text" class="form-control" placeholder="Search Podcast By Title" name="search">
            <button class="btn btn-outline-secondary" type="submit" id="button-addon2">Search</button>
        </div>
    </form>
    <div class="row">
        @foreach ($podcasts as $podcast)
        <div class="col-md-6">
            <div class="card mb-4">
                <img src="{{ asset('storage/' . $podcast->photo) }}" alt="{{ $podcast->title_podcast }}"
                    class="img-fluid mb-3 img-top" style="object-fit: cover; height: 200px;">
                <div class="card-body">
                    <div class="d-flex align-items-center justify-content-between">
                        <a href="{{ route('getSpesifikPodcast', $podcast->slug) }}">
                            <h5 class="card-title fw-bold">{{ $podcast->title_podcast }}</h5>
                        </a>
                        @if($podcast->genre_podcast == 'Komedi')
                        <span class="badge badge-primary">Komedi</span>
                        @elseif($podcast->genre_podcast == 'Horor')
                        <span class="badge badge-danger">Horor</span>
                        @elseif($podcast->genre_podcast == 'Inspirasi')
                        <span class="badge badge-success">Inspirasi</span>
                        @endif
                        @if(Auth::user()->level == 1)
                        <form action="{{ route('recording.delete', $podcast->slug) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm"
                                onclick="return confirm('Are you sure you want to delete this podcast?')">
                                <i class="fa fa-trash"></i>
                            </button>
                        </form>
                        @endif

                    </div>
                    <p class="card-text">{{ Str::limit($podcast->description, 50, '...') }}</p>
                </div>
                <div class="card-footer d-flex justify-content-between">
                    <div class="d-flex align-items-center">
                        <img src="{{ asset('storage/' . $podcast->user->foto) }}" alt="User Photo"
                            class="rounded-circle me-2" style="width: 40px; height: 40px; object-fit: cover;">
                        <span class="text-muted">Podcaster : {{ $podcast->user->username }}</span>
                    </div>
                    <div>
                        <p>{{ $podcast->created_at->diffForHumans() }}</p>
                    </div>
                </div>

            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection