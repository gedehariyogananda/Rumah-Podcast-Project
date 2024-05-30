@extends('layout.master_main')
@section('name_fitur', 'Setup Podcasts')
@push('styling')

@endpush
@section('content')
<div class="card">
    <div class="card-body">
        <form action="{{ route('recording.store', $podcast->slug) }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="title_podcast">Title Podcast</label>
                <input type="text" class="form-control" id="title_podcast" placeholder="Enter title podcast"
                    name="title_podcast" autocomplete="off" required>
                @error('title_podcast')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="photo">Thumnail Podcast</label>
                <input type="file" class="form-control-file" id="photo" name="photo" required>
                @error('photo')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="genre_podcast">Genre Podcast</label>
                <select name="genre_podcast" id="genre_podcast" class="form-control">
                    <option value="" disabled selected>-- selected</option>
                    <option value="Horor">Horor</option>
                    <option value="Komedi">Komedi</option>
                    <option value="Inspirasi">Inspirasi</option>
                </select>
                @error('genre_podcast')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <textarea name="description" id="description" class="form-control" required></textarea>
                @error('recording')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary btn-block">Create</button>
        </form>

    </div>
</div>


@push('scripts')

@endpush
@endsection