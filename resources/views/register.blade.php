@extends('master')

@section('content')
<header class="hero-section">
    <div class="hero-image-container">
        <img src="{{ asset('images/registration.jpg') }}" alt="Plaza Hotel" class="hero-image">
    </div>
    <div class="about-content">
        <h1>REGISTER</h1>
    </div>
</header>

<section class="registration-form-section">
    <div class="form-container">
        <!-- Success Message -->
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <!-- Error Messages -->
        @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="/register" method="POST">
            @csrf
            <div class="form-group">
                <label for="user-type">Register As</label>
                <select id="user-type" name="user_type" required>
                    <option value="customer" {{ old('user_type') == 'customer' ? 'selected' : '' }}>Customer</option>
                    <option value="travel_company" {{ old('user_type') == 'travel_company' ? 'selected' : '' }}>Travel Company</option>
                </select>
            </div>
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" id="name" name="name" value="{{ old('name') }}" required>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" value="{{ old('email') }}" required>
            </div>
            <div class="form-group">
                <label for="phone">Phone</label>
                <input type="tel" id="phone" name="phone" value="{{ old('phone') }}" required>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" required>
            </div>
            <div class="form-group">
                <label for="password_confirmation">Confirm Password</label>
                <input type="password" id="password_confirmation" name="password_confirmation" required>
            </div>
            <button type="submit" class="register-btn">REGISTER</button>
            <p class="login-link">Already have an account? <a href="/login">LOGIN</a></p>
        </form>
    </div>
</section>
@endsection