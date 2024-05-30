@extends('layout.master_authenticate')

@push('styling')
<style>
  .login-form-container {
    width: 600px;
    margin: 0 auto;
    padding: 20px;
  }

  .register-link {
    text-align: center;
    margin-top: 15px;
  }

  .register-link a {
    color: #007bff;
    text-decoration: none;
  }

  .register-link a:hover {
    text-decoration: underline;
  }
</style>
@endpush

@section('content')
<div class="container">
  <div class="text-center mb-4">
    <br><br>
    <img class="img-fluid w-25" src="{{ asset('storage/logo/logooo.jpeg') }}" alt=" Logo">
  </div>
  <div class="form-container">
    <div class="login-form-container">
      <form action="{{ route('login') }}" method="POST">
        @csrf
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
          <input type="password" class="form-control" id="password" placeholder="Enter your password" name="password"
            autocomplete="off" required>
          @error('password')
          <div class="text-danger">{{ $message }}</div>
          @enderror
        </div>
        <button type="submit" class="btn btn-primary btn-block">Login</button>
      </form>
      <div class="register-link">
        <p>Belum punya akun? <a href="{{ route('get.register') }}">Register</a></p>
      </div>
    </div>
  </div>
</div>
@endsection

@push('scripts')
{{-- Add any additional JS scripts here --}}
@endpush