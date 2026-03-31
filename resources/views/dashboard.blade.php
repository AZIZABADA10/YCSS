<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>YCSS - Tableau de Bord</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            text-align: center;
            margin: 0;
            background-color: #f8f9fa;
        }

        .header {
            background-color: #ffffff;
            padding: 20px;
            border-bottom: 2px solid #e5e7eb;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .logo {
            height: 90px;
            max-width: 100%;
        }

        .success-message {
            color: green;
            margin-bottom: 20px;
        }

        .container {
            max-width: 800px;
            margin: 50px auto;
            background: white;
            padding: 40px;
            border-radius: 12px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.05);
        }

        .btn {
            padding: 12px 24px;
            color: white;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            text-decoration: none;
            font-weight: 500;
            font-size: 16px;
        }

        .btn-logout {
            background-color: #dc3545;
        }

        .btn-admin {
            background-color: #2563eb;
            display: inline-block;
            margin-bottom: 15px;
        }

        .actions {
            margin-top: 30px;
            display: flex;
            flex-direction: column;
            gap: 15px;
            align-items: center;
        }
    </style>
</head>

<body>
    <div class="header">
        <img src="{{ asset('storage/logo/ycss_logo.png') }}" alt="YCSS Logo" class="logo">
        <div style="font-weight:600; color:#4b5563;">
            {{ Auth::user()->nom_complet }}
        </div>
    </div>

    <div class="container">
        @if (session('success'))
            <div class="success-message">{{ session('success') }}</div>
        @endif

        <h2 style="color:#1f2937;">Bienvenue sur votre espace YCSS</h2>
        <p style="color:#6b7280; margin-bottom: 30px;">L'intranet de YouCode Safi.</p>

        <div class="actions">
            @if(Auth::check() && Auth::user()->isAdmin())
                <a href="{{ route('admin.dashboard') }}" class="btn btn-admin">🛠️ Accéder à l'Administration</a>
            @endif

            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="btn btn-logout">Déconnexion</button>
            </form>
        </div>
    </div>
</body>

</html>