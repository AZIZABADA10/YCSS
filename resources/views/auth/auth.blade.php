<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>YCSS - Connexion & Inscription</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap');
        
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Inter', sans-serif;
        }

        body {
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            background: linear-gradient(135deg, #f0f4f8 0%, #e2e8f0 100%);
        }

        .auth-wrapper {
            background: #ffffff;
            width: 100%;
            max-width: 480px;
            border-radius: 16px;
            box-shadow: 0 10px 25px rgba(0,0,0,0.05);
            padding: 40px;
            margin: 20px;
        }

        .auth-header {
            text-align: center;
            margin-bottom: 30px;
        }

        .logo {
            max-height: 120px;
            max-width: 100%;
            margin-bottom: 16px;
        }

        .form-toggle {
            display: flex;
            background: #f1f5f9;
            border-radius: 8px;
            padding: 4px;
            margin-bottom: 24px;
        }

        .form-toggle button {
            flex: 1;
            padding: 10px;
            border: none;
            background: transparent;
            font-size: 14px;
            font-weight: 500;
            color: #64748b;
            cursor: pointer;
            border-radius: 6px;
            transition: all 0.3s ease;
        }

        .form-toggle button.active {
            background: #ffffff;
            color: #0d6efd;
            box-shadow: 0 2px 4px rgba(0,0,0,0.05);
        }

        .form-group {
            margin-bottom: 16px;
        }

        .form-group label {
            display: block;
            font-size: 13px;
            font-weight: 500;
            color: #334155;
            margin-bottom: 6px;
        }

        .form-control {
            width: 100%;
            padding: 12px 16px;
            border: 1px solid #cbd5e1;
            border-radius: 8px;
            font-size: 14px;
            transition: border-color 0.2s, box-shadow 0.2s;
            outline: none;
        }

        .form-control:focus {
            border-color: #0d6efd;
            box-shadow: 0 0 0 3px rgba(13, 110, 253, 0.1);
        }

        .btn-submit {
            width: 100%;
            padding: 12px;
            background: #0d6efd;
            color: white;
            border: none;
            border-radius: 8px;
            font-size: 15px;
            font-weight: 600;
            cursor: pointer;
            transition: background 0.3s;
            margin-top: 10px;
        }

        .btn-submit:hover {
            background: #0b5ed7;
        }

        .row {
            display: flex;
            gap: 16px;
        }
        
        .col { flex: 1; }

        .error-message {
            color: #ef4444;
            font-size: 12px;
            margin-top: 5px;
        }

        .alert {
            padding: 12px;
            border-radius: 8px;
            margin-bottom: 20px;
            font-size: 14px;
        }

        .alert-success { background: #d1fae5; color: #065f46; }
        .alert-error { background: #fee2e2; color: #991b1b; }

        .profile-pic-container {
            text-align: center;
            margin-bottom: 20px;
        }

        .profile-pic-upload {
            display: none;
        }

        .profile-pic-label {
            display: inline-block;
            width: 80px;
            height: 80px;
            border-radius: 50%;
            background: #f1f5f9;
            border: 2px dashed #cbd5e1;
            cursor: pointer;
            position: relative;
            overflow: hidden;
            transition: border-color 0.3s;
        }

        .profile-pic-label:hover {
            border-color: #0d6efd;
        }
        
        .profile-pic-label img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            display: none;
        }

        .profile-pic-add {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            color: #94a3b8;
            font-size: 24px;
        }

    </style>
</head>
<body>

<div class="auth-wrapper">
    <div class="auth-header">
        <img src="{{ asset('storage/logo/ycss_logo.png') }}" alt="YCSS Logo" class="logo">
        <p style="color: #64748b; font-size: 14px;">Intranet dédié à YouCode Safi</p>
    </div>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    
    @if (session('error'))
        <div class="alert alert-error">{{ session('error') }}</div>
    @endif

    <div class="form-toggle">
        <button id="show-login" class="active">Se connecter</button>
        <button id="show-register">M'inscrire</button>
    </div>

    <!-- LOGIN FORM -->
    <div id="login-form">
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <div class="form-group">
                <label>Adresse E-mail</label>
                <input type="email" name="email" class="form-control" value="{{ old('email') }}" placeholder="Ex: admin@ycss.ma" required autofocus>
                @error('email') <div class="error-message">{{ $message }}</div> @enderror
            </div>
            
            <div class="form-group">
                <label>Mot de passe</label>
                <input type="password" name="password" class="form-control" placeholder="Entrez votre mot de passe" required>
                @error('password') <div class="error-message">{{ $message }}</div> @enderror
            </div>

            <button type="submit" class="btn-submit">Connexion à mon espace</button>
        </form>
    </div>

    <!-- REGISTER FORM -->
    <div id="register-form" style="display: none;">
        <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
            @csrf
            
            <div class="profile-pic-container">
                <label class="profile-pic-label" for="register-photo">
                    <span class="profile-pic-add">+</span>
                    <img id="profile-preview" src="" alt="Aperçu">
                </label>
                <input type="file" id="register-photo" name="photo" class="profile-pic-upload" accept="image/*">
            </div>

            <div class="form-group">
                <label>Nom complet</label>
                <input type="text" name="nom_complet" class="form-control" value="{{ old('nom_complet') }}" placeholder="Jhon Doe" required>
                @error('nom_complet') <div class="error-message">{{ $message }}</div> @enderror
            </div>

            <div class="form-group">
                <label>Adresse E-mail</label>
                <input type="email" name="email" class="form-control" value="{{ old('email') }}" placeholder="jhon@ycss.ma" required>
                @error('email') <div class="error-message">{{ $message }}</div> @enderror
            </div>
            
            <div class="row">
                <div class="col form-group">
                    <label>Mot de passe</label>
                    <input type="password" name="password" class="form-control" required>
                    @error('password') <div class="error-message">{{ $message }}</div> @enderror
                </div>
                <div class="col form-group">
                    <label>Confirmation</label>
                    <input type="password" name="password_confirmation" class="form-control" required>
                </div>
            </div>

            <div class="row">
                <div class="col form-group">
                    <label>Ville</label>
                    <input type="text" name="ville" class="form-control" value="{{ old('ville') }}" placeholder="Safi">
                </div>
                <div class="col form-group">
                    <label>Téléphone</label>
                    <input type="text" name="telephone" class="form-control" value="{{ old('telephone') }}">
                </div>
            </div>

            <button type="submit" class="btn-submit">Créer mon compte</button>
        </form>
    </div>
</div>

<script>
    const loginForm = document.getElementById('login-form');
    const registerForm = document.getElementById('register-form');
    const showLoginBtn = document.getElementById('show-login');
    const showRegisterBtn = document.getElementById('show-register');
    const photoInput = document.getElementById('register-photo');
    const profilePreview = document.getElementById('profile-preview');
    const profileAdd = document.querySelector('.profile-pic-add');

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

    photoInput.addEventListener('change', function() {
        if (this.files && this.files[0]) {
            const reader = new FileReader();
            reader.onload = function(e) {
                profilePreview.src = e.target.result;
                profilePreview.style.display = 'block';
                profileAdd.style.display = 'none';
            }
            reader.readAsDataURL(this.files[0]);
        }
    });

    @if ($errors->has('nom_complet') || $errors->has('email') && old('nom_complet') || $errors->has('password') && old('nom_complet') )
        // Si les erreurs proviennent de l'inscription
        registerForm.style.display = 'block';
        loginForm.style.display = 'none';
        showRegisterBtn.classList.add('active');
        showLoginBtn.classList.remove('active');
    @endif
</script>

</body>
</html>
