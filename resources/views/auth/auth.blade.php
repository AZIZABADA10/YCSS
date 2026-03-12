<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion / Inscription</title>
    <style>
        body {
            font-family: sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            background-color: #f0f2f5;
            margin: 0;
        }
        .auth-container {
            background: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            width: 400px;
        }
        .form-toggle {
            text-align: center;
            margin-bottom: 20px;
        }
        .form-toggle button {
            background: none;
            border: none;
            padding: 10px 15px;
            cursor: pointer;
            font-size: 1em;
            margin: 0 5px;
            color: #555;
        }
        .form-toggle button.active {
            border-bottom: 2px solid #007bff;
            color: #007bff;
        }
        .form-group {
            margin-bottom: 15px;
        }
        .form-group label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }
        .form-group input, .form-group select {
            width: calc(100% - 22px);
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
        }
        .form-group button {
            width: 100%;
            padding: 10px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 1.1em;
        }
        .form-group button:hover {
            background-color: #0056b3;
        }
        #register-form {
            display: none;
        }
        .error-message {
            color: red;
            font-size: 0.8em;
            margin-top: 5px;
        }
        .success-message {
            color: green;
            font-size: 0.9em;
            margin-bottom: 10px;
        }
        .profile-pic-container {
            position: relative;
            width: 100px;
            height: 100px;
            border-radius: 50%;
            margin: 0 auto 20px;
            overflow: hidden;
        }
        .profile-pic {
            width: 100%;
            height: 100%;
            object-fit: cover;
            border-radius: 50%;
        }
        .profile-pic-input {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            opacity: 0;
            cursor: pointer;
        }
        .row {
            display: flex;
            justify-content: space-between;
        }
        .col {
            width: 48%;
        }
    </style>
</head>
<body>
    <div class="auth-container">
        @if (session('success'))
            <div class="success-message">{{ session('success') }}</div>
        @endif
        @if (session('error'))
            <div class="error-message">{{ session('error') }}</div>
        @endif
        <div class="form-toggle">
            <button id="show-login" class="active">Se connecter</button>
            <button id="show-register">Créer un compte</button>
        </div>
        <div id="login-form" class="form-container">
            <h3>Connexion</h3>
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="form-group">
                    <label for="login-email">Email</label>
                    <input type="email" id="login-email" name="email" value="{{ old('email') }}" required autofocus>
                    @error('email')
                        <div class="error-message">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="login-password">Mot de passe</label>
                    <input type="password" id="login-password" name="password" required>
                    @error('password')
                        <div class="error-message">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <button type="submit">Se connecter</button>
                </div>
            </form>
        </div>
        <div id="register-form" class="form-container">
            <h3>Inscription</h3>
            <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
                @csrf
                <div class="profile-pic-container">
                    <img src="default-profile-pic.jpg" alt="Profile Picture" class="profile-pic" id="profile-preview">
                    <input type="file" id="register-photo" name="photo" class="profile-pic-input">
                </div>
                <div class="form-group">
                    <label for="register-name">Nom complet</label>
                    <input type="text" id="register-name" name="nom_complet" value="{{ old('nom_complet') }}" required>
                    @error('nom_complet')
                        <div class="error-message">{{ $message }}</div>
                    @enderror
                </div>
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label for="register-email">Email</label>
                            <input type="email" id="register-email" name="email" value="{{ old('email') }}" required>
                            @error('email')
                                <div class="error-message">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="register-telephone">Téléphone</label>
                            <input type="text" id="register-telephone" name="telephone" value="{{ old('telephone') }}">
                            @error('telephone')
                                <div class="error-message">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="register-password">Mot de passe</label>
                    <input type="password" id="register-password" name="password" required>
                    @error('password')
                        <div class="error-message">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="register-password-confirm">Confirmer mot de passe</label>
                    <input type="password" id="register-password-confirm" name="password_confirmation" required>
                </div>
                <div class="form-group">
                    <label for="register-ville">Ville</label>
                    <input type="text" id="register-ville" name="ville" value="{{ old('ville') }}">
                    @error('ville')
                        <div class="error-message">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <button type="submit">S'inscrire</button>
                </div>
            </form>
        </div>
    </div>
    <script>
        const loginForm = document.getElementById('login-form');
        const registerForm = document.getElementById('register-form');
        const showLoginBtn = document.getElementById('show-login');
        const showRegisterBtn = document.getElementById('show-register');

        showLoginBtn.addEventListener('click', () => {
            loginForm.style.display = 'block';
            registerForm.style.display = 'none';
            showLoginBtn.classList.add('active');
            showRegisterBtn.classList.remove('active');
        });

        showRegisterBtn.addEventListener('click', () => {
            registerForm.style.display = 'block';
            loginForm.style.display = 'none';
            showRegisterBtn.classList.add('active');
            showLoginBtn.classList.remove('active');
        });

        @if ($errors->has('name') || $errors->has('email') || $errors->has('password') || $errors->has('statut') || $errors->has('role_id') || $errors->has('photo') || $errors->has('ville') || $errors->has('telephone'))
            registerForm.style.display = 'block';
            loginForm.style.display = 'none';
            showRegisterBtn.classList.add('active');
            showLoginBtn.classList.remove('active');
        @endif
    </script>
</body>
</html>
