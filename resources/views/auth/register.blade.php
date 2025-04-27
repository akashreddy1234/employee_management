<!-- resources/views/auth/register.blade.php -->

<link href="https://fonts.googleapis.com/css?family=Open+Sans:700,600" rel="stylesheet" type="text/css" />

<style>
    body {
        font-family: "Open Sans", sans-serif;
        margin: 0;
        padding: 0;
        height: 100vh;
        background: linear-gradient(135deg, #74ebd5 0%, #ACB6E5 100%);
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .container {
        text-align: center;
        max-width: 400px;
        width: 100%;
        background: #ffffff;
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        padding: 30px;
        animation: fadeIn 0.5s ease-out;
    }

    @keyframes fadeIn {
        0% {
            opacity: 0;
            transform: translateY(10px);
        }
        100% {
            opacity: 1;
            transform: translateY(0);
        }
    }

    h1 {
        font-size: 2em;
        color: #333;
        margin-bottom: 10px;
    }

    p.subtitle {
        font-size: 1.1em;
        color: #777;
        margin-bottom: 20px;
    }

    .email, .password {
        background: #f9f9f9;
        border: 1px solid #ccc;
        padding: 10px;
        width: 80%;
        margin-bottom: 15px;
        font-size: 1em;
        border-radius: 6px;
        outline: none;
        transition: all 0.3s ease;
    }

    .email:focus, .password:focus {
        border-color: #3498db;
        box-shadow: 0 0 5px rgba(52, 152, 219, 0.5);
    }

    .btn-container {
        margin-top: 20px;
    }

    button {
        background: linear-gradient(135deg, #3498db, #2ecc71);
        color: white;
        width: 80%;
        padding: 12px;
        font-size: 1.1em;
        border-radius: 6px;
        border: none;
        cursor: pointer;
        transition: all 0.3s ease;
    }

    button:hover {
        background: linear-gradient(135deg, #2980b9, #27ae60);
    }

    .login-link {
        font-size: 0.9em;
        color: #333;
        margin-top: 15px;
    }

    .login-link a {
        text-decoration: none;
        color: #3498db;
    }

    .error-message {
        color: red;
        font-size: 0.9em;
        margin-bottom: 10px;
    }
</style>

<div class="container">
    <h1>Create Your Account</h1>
    
    <p class="subtitle">Please fill in the details to create an account</p>

    @if ($errors->any())
        <div class="error-message">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('register.submit') }}">
        @csrf

        <input type="text" name="name" class="email" placeholder="Enter your full name" value="{{ old('name') }}" required />

        <input type="email" name="email" class="email" placeholder="Enter your email" value="{{ old('email') }}" required />

        <input type="password" name="password" class="password" placeholder="Enter your password" required />

        <input type="password" name="password_confirmation" class="password" placeholder="Confirm your password" required />

        <div class="btn-container">
            <button type="submit">Register</button>
        </div>
    </form>

    <p class="login-link">
        Already have an account? <a href="{{ route('login') }}">Login here</a>
    </p>
</div>
