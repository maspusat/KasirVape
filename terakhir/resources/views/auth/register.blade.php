<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Register Page</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
  <style>
    body {
      background-image: url('https://p0.piqsels.com/preview/884/414/421/summit-mountain-highland-valley.jpg');
      background-size: cover;
      background-repeat: no-repeat;
      background-position: center;
    }

    .register-container {
      max-width: 400px;
      margin: 0 auto;
      margin-top: 100px;
      padding: 20px;
      background-color: rgba(255, 255, 255, 0.7);
      border-radius: 10px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
    }

    .register-container h2 {
      text-align: center;
      margin-bottom: 20px;
    }

    .form-group {
      margin-bottom: 20px;
    }

    .form-group label {
      font-weight: bold;
    }

    .form-group input {
      width: 100%;
      padding: 10px;
      border-radius: 5px;
      border: 1px solid #ccc;
    }

    .btn-register {
      width: 100%;
      padding: 10px;
      background-color: #007bff;
      color: #fff;
      border: none;
      border-radius: 5px;
      cursor: pointer;
    }

    .btn-register:hover {
      background-color: #0069d9;
    }

    .login-link {
      display: block;
      text-align: center;
      color: #007bff;
      text-decoration: none;
      margin-top: 10px;
    }

    .login-link:hover {
      text-decoration: underline;
    }
  </style>
</head>

<body>
  <div class="register-container">
    <h2>Register</h2>
    <form method="POST" action="{{ route('register-proses') }}">
      @csrf
      <div class="form-group">
        <label for="name">Nama</label>
        <input type="text" id="name" name="name" value="{{ old('name') }}"  required>
        @error('name')
        <small>{{ $message }}</small>
        @enderror
      </div>
      <div class="form-group">
        <label for="email">Email</label>
        <input type="email" id="email" name="email" value="{{ old('email') }}" required>
        @error('email')
        <small>{{ $message }}</small>
        @enderror
      </div>
      <div class="form-group">
        <label for="password">Password</label>
        <input type="password" id="password" name="password" required>
        @error('password')
        <small>{{ $message }}</small>
        @enderror
      </div>
      <button type="submit" class="btn-register">Register</button>
    </form>
    <a href="{{ route('login') }}" class="login-link">Dah punya akun? Lansung masuk lahh...</a>
  </div>
</body>

</html>