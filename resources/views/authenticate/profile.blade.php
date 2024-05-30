@extends('layout.master_main')
@section('name_fitur', 'Profile Panel')
@push('styling')
<style>
    .form-container {
        max-width: 600px;
        margin: 0 auto;
        padding: 20px;
        background-color: #f8f9fa;
        border-radius: 10px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    .form-container img {
        max-width: 100%;
        max-height: 200px;
    }
</style>
@endpush
@section('content')
<div class="container mt-5">
    <div class="form-container">
        <h3 class="text-center mb-4">Update Profile</h3>
        <form action="{{ route('editProfile') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PATCH')
            <div class="form-group mb-3">
                <label for="name">Name:</label>
                <input type="text" class="form-control" name="name" value="{{ $user->name }}" required>
                @error('name')
                <div class="text-danger">{{ $message }}</div>

                @enderror
            </div>
            <div class="form-group mb-3">
                <label for="username">Username:</label>
                <input type="text" class="form-control" name="username" value="{{ $user->username }}" required>
                @error('username')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group mb-3">
                <label for="foto">foto:</label>
                <input type="file" class="form-control" name="foto" accept="image/*">
                @error('foto')
                <div class="text-danger">{{ $message }}</div>
                @enderror

            </div>
            <div class="form-group mb-3">
                <img id="preview" src="#" alt="Preview" style="display: none; width: 100px;" class="img-thumbnail">
            </div>
            <div class="form-group text-center">
                <input type="submit" class="btn btn-primary" value="Update Profile">
            </div>
        </form>
    </div>
</div>

<script>
    document.querySelector("input[name='foto']").addEventListener('change', function() {
        const file = this.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                const preview = document.getElementById('preview');
                preview.src = e.target.result;
                preview.style.display = 'block';
            }
            reader.readAsDataURL(file);
        }
    });
</script>
@push('scripts')

@endpush
@endsection