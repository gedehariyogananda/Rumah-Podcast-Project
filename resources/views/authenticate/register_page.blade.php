@extends('layout.master_authenticate')

@push('styling')
<style>
    .form-container {
        width: 600px;
        margin: 0 auto;
        padding: 20px;
    }

    .register-form-container {
        background-color: #f8f9fa;
        padding: 30px;
        border-radius: 10px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    .register-form-container h2 {
        margin-bottom: 20px;
    }

    #foto-preview {
        display: none;
        margin-top: 10px;
        max-width: 100%;
        max-height: 200px;
    }

    .register-link a {
        color: #007bff;
        text-decoration: none;
    }
</style>
@endpush

@section('content')
<div class="container">
    <div class="text-center mb-4">
        <br><br>
        <img class="img-fluid w-25" src="{{ asset('storage/logo/logooo.jpeg') }}" alt="Logo">
    </div>
    <div class="form-container">
        <div class="register-form-container">
            <h2 class="text-center">Register</h2>
            <form action="{{ route('register') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" id="name" placeholder="Enter your name" name="name"
                        autocomplete="off" required>
                    @error('name')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" class="form-control" id="username" placeholder="Enter your username"
                        name="username" autocomplete="off" required>
                    @error('username')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <input type="hidden" name="level" value="2">
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" id="email" placeholder="Enter your email" name="email"
                        autocomplete="off" required>
                    @error('email')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" id="password" placeholder="Enter your password"
                        name="password" autocomplete="off" required>
                    @error('password')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="level">Register As</label>
                    <select class="form-control" name="level" id="level" required>
                        <option value="2">User</option>
                        <option value="3">Creator</option>
                    </select>
                    @error('level')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="foto">Photo</label>
                    <input type="file" id="foto" class="form-control-file" name="foto" onchange="previewPhoto()">
                    @error('foto')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                    <img id="foto-preview" src="" alt="Photo Preview">
                </div>
                <button type="submit" class="btn btn-primary btn-block">Register</button>
            </form>
        </div>
        <div class="register-link">
            <p>Sudah punya akun? <a href="{{ route('get.login') }}">Login</a></p>
        </div>

    </div>
</div>

<script>
    function previewPhoto() {
    const file = document.getElementById('foto').files[0];
    const preview = document.getElementById('foto-preview');

    if (file) {
      const reader = new FileReader();

      reader.onload = function (e) {
        preview.src = e.target.result;
        preview.style.display = 'block';
      }

      reader.readAsDataURL(file);
    } else {
      preview.style.display = 'none';
    }
  }
</script>
@endsection

@push('scripts')
{{-- Add any additional JS scripts here --}}
@endpush