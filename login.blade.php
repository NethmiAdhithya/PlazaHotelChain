<!-- resources/views/login.blade.php -->
@extends('master')

@section('content')
<header class="hero-section">
    <div class="hero-image-container">
        <img src="{{ asset('images/login.jpg') }}" alt="Plaza Hotel" class="hero-image">
    </div>
    <div class="about-content">
        <h1>LOGIN</h1>
    </div>
</header><br><br><br><br><br><br><br>

<section class="login-form-section">
    <div class="form-container">
        @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('login.post') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="login-as">Login as</label>
                <select id="login-as" name="login_as" required>
                    <option value="">Select Role</option>
                    <option value="manager" {{ old('login_as') == 'manager' ? 'selected' : '' }}>Manager</option>
                    <option value="reservation_clerk" {{ old('login_as') == 'reservation_clerk' ? 'selected' : '' }}>Reservation Clerk</option>
                    <option value="customer" {{ old('login_as') == 'customer' ? 'selected' : '' }}>Customer</option>
                    <option value="travel_company" {{ old('login_as') == 'travel_company' ? 'selected' : '' }}>Travel Company</option>
                </select>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" value="{{ old('email') }}" required>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" required>
            </div>
            <div class="form-group">
                <label>
                    <input type="checkbox" name="remember"> Remember Me
                </label>
            </div>
            <button type="submit" class="login-btn">LOGIN</button>
            <p class="forgot-password">
                Forgot password? <a href="{{ route('password.request') }}">click here</a>
            </p>
        </form>
    </div>
</section>
@endsection