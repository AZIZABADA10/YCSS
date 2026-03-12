<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tableau de Bord</title>
    <style>
        body { font-family: sans-serif; text-align: center; margin-top: 50px; }
        .success-message { color: green; margin-bottom: 20px; }
        .user-info { margin-top: 30px; }
        .user-info img { width: 100px; height: 100px; border-radius: 50%; object-fit: cover; margin-bottom: 10px; }
        .logout-form { margin-top: 20px; }
        .logout-form button { padding: 10px 20px; background-color: #dc3545; color: white; border: none; border-radius: 4px; cursor: pointer; }
        .logout-form button:hover { background-color: #c82333; }
    </style>
</head>
<body>
    @if (session('success'))
        <div class="success-message">{{ session('success') }}</div>
    @endif

    <h2>Bienvenue sur votre Tableau de Bord, {{ Auth::user()->name }} !</h2>

    <div class="user-info">
        @if(Auth::user()->photo)
            <img src="{{ asset('storage/' . Auth::user()->photo) }}" alt="Photo de profil">
        @else
            <img src="{{ asset('images/default_profile.png') }}" alt="Photo de profil par défaut">
        @endif
        <p>Email: {{ Auth::user()->email }}</p>
        <!-- <p>Rôle: {{ Auth::user()->role ? Auth::user()->role->name : 'Non défini' }}</p> -->
        <p>Statut: {{ Auth::user()->statut ?? 'Non spécifié' }}</p>
        <p>Ville: {{ Auth::user()->ville ?? 'Non spécifiée' }}</p>
        <p>Téléphone: {{ Auth::user()->telephone ?? 'Non spécifié' }}</p>
    </div>

    <form class="logout-form" method="POST" action="{{ route('logout') }}">
        @csrf
        <button type="submit">Déconnexion</button>
    </form>

    <p>C'est ici que tu peux ajouter tout le contenu spécifique à l'utilisateur connecté.</p>
</body>
</html>