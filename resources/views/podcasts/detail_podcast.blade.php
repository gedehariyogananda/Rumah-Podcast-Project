@extends('layout.master_main')
@section('name_fitur', 'Podcast')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <h3 class="fw-bold text-center">{{ $podcast->title_podcast }}</h3>
        <img src="{{ asset('storage/' . $podcast->photo) }}" alt="{{ $podcast->title_podcast }}" class="img-fluid mb-3"
            style="object-fit: cover; height: 300px; width: 600px;">
    </div>
    <div class="row justify-content-center">
        <div class="row align-items-center justify-content-between">
            <div class="col-md-6">
                <div class="d-flex align-items-end">
                    <img src="{{ asset('storage/' . $podcast->user->foto) }}" alt="User Photo"
                        class="rounded-circle me-2" style="width: 40px; height: 40px; object-fit: cover;">
                    <span class="text-muted">{{ $podcast->user->username }}</span>
                </div>
            </div>
            <div class="col-md-6 text-end">
                <p>{{ $podcast->created_at->diffForHumans() }}</p>
            </div>
        </div>
    </div>
    <br><br>
    <h6 class="">{{ $podcast->description }}</h6>
</div>
<div class="row justify-content-center mt-4">
    <div class="col-md-8">
        <audio controls class="w-100">
            <source src="{{ asset('storage/' . $podcast->recording) }}" type="audio/mpeg">
            Your browser does not support the audio element.
        </audio>
    </div>
</div>
</div>
@endsection