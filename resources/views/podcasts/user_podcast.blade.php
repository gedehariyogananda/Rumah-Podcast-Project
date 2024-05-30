@extends('layout.master_main')
@section('name_fitur', 'Podcast User')
@push('styling')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@10/dist/sweetalert2.min.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
@endpush

@section('content')
<div class="card">
    <div class="card-header">
        <a class="btn btn-sm btn-primary" href="{{ route('recording.index') }}"><i class="fa fa-plus"> </i>
            Recording New Podcast</a>
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>NO</th>
                        <th>Podcast Title</th>
                        <th>Thumbnail</th>
                        <th>Genre</th>
                        <th>Recording</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($podcasts as $podcast)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $podcast->title_podcast }}</td>
                        <td><img src="{{ asset('storage/' . $podcast->photo) }}" alt="photo" width="100"></td>
                        <td>{{ $podcast->genre_podcast }}</td>
                        <td>
                            <audio controls>
                                <source src="{{ asset('storage/' . $podcast->recording) }}" type="audio/mpeg">
                            </audio>
                        </td>
                        <td>
                            <button class="btn btn-sm btn-danger delete-button"
                                data-url="{{ route('recording.destroy', $podcast->slug) }}">
                                <i class="fa fa-trash"></i>
                            </button>
                            <button class="btn btn-sm btn-primary" data-bs-toggle="modal"
                                data-bs-target="#edit{{ $podcast->id }}">
                                <i class="fa fa-edit"></i>
                            </button>
                            <div class="modal fade" id="edit{{ $podcast->id }}" tabindex="-1"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Edit Podcast</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="{{ route('recording.update', $podcast->slug) }}" method="post"
                                                enctype="multipart/form-data">
                                                @csrf
                                                @method('PATCH')
                                                <div class="form-group">
                                                    <label for="title_podcast">Title Podcast</label>
                                                    <input type="text" class="form-control" id="title_podcast"
                                                        placeholder="Enter title podcast" name="title_podcast"
                                                        value="{{ $podcast->title_podcast }}" required>
                                                    @error('title_podcast')
                                                    <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    <label for="photo">Thumbnail Podcast</label>
                                                    <div class="mb-3">
                                                        <img id="preview-image"
                                                            src="{{ asset('storage/' . $podcast->photo) }}"
                                                            alt="thumbnail" style="max-width: 100px;">
                                                    </div>
                                                    <input type="file" class="form-control" id="photo" name="photo"
                                                        onchange="previewImage(event)">
                                                    @error('photo')
                                                    <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    <label for="genre_podcast">Genre Podcast</label>
                                                    <select name="genre_podcast" id="genre_podcast"
                                                        class="form-control">
                                                        <option value="" disabled selected>-- selected</option>
                                                        <option value="Horor" @if($podcast->genre_podcast == 'Horor')
                                                            selected
                                                            @endif>Horor</option>
                                                        <option value="Komedi" @if($podcast->genre_podcast == 'Komedi')
                                                            selected
                                                            @endif>Komedi</option>
                                                        <option value="Inspirasi" @if($podcast->genre_podcast ==
                                                            'Inspirasi') selected
                                                            @endif>Inspirasi</option>
                                                    </select>
                                                    @error('genre_podcast')
                                                    <div class="text-danger">{{ $message }}</div>
                                                    @enderror

                                                    <div class="form-group">
                                                        <label for="recording">Recording</label>
                                                        <input value="{{ $podcast->recording }}" type="file"
                                                            class="form-control" id="recording" name="recording"
                                                            required>
                                                        @error('recording')
                                                        <div class="text-danger">{{ $message }}</div>
                                                        @enderror

                                                    </div>

                                                    <div class="form-group">
                                                        <label for="description">Description</label>
                                                        <textarea name="description" id="description"
                                                            class="form-control"
                                                            required>{{ $podcast->description }}</textarea>
                                                        @error('description')
                                                        <div class="text-danger">{{ $message }}</div>
                                                        @enderror

                                                    </div>




                                                </div>
                                                <button type="submit" class="btn btn-primary btn-block">Update</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@push('scripts')
<!-- SweetAlert2 JS -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10/dist/sweetalert2.all.min.js"></script>
<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
<script>
    function previewImage(event) {
        var reader = new FileReader();
        reader.onload = function () {
            var output = document.getElementById('preview-image');
            output.src = reader.result;
        }
        reader.readAsDataURL(event.target.files[0]);
    }
    
    document.addEventListener('DOMContentLoaded', function () {
        const deleteButtons = document.querySelectorAll('.delete-button');

        deleteButtons.forEach(button => {
            button.addEventListener('click', function () {
                const url = this.dataset.url;

                Swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = url;
                    }
                });
            });
        });
    });
</script>
@endpush

@endsection