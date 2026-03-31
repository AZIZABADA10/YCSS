<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>YCSS - @yield('title', 'Administration')</title>
    <!-- Inclure FontAwsome pour les icônes -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <style>
        :root {
            --primary-blue: #2563eb;
            --primary-blue-hover: #1d4ed8;
            --bg-color: #f3f4f6;
            --sidebar-bg: #ffffff;
            --text-dark: #1f2937;
            --text-gray: #6b7280;
            --border-color: #e5e7eb;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        body {
            background-color: var(--bg-color);
            color: var(--text-dark);
            display: flex;
            height: 100vh;
            overflow: hidden;
        }

        /* Sidebar Styles */
        .sidebar {
            width: 260px;
            background-color: var(--sidebar-bg);
            border-right: 1px solid var(--border-color);
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            flex-shrink: 0;
        }

        .sidebar-brand {
            padding: 24px;
            font-size: 24px;
            font-weight: 900;
            color: var(--primary-blue);
            font-style: italic;
            border-bottom: 1px solid var(--border-color);
            display: flex;
            align-items: center;
        }

        .sidebar-nav {
            padding: 24px 16px;
            flex-grow: 1;
            overflow-y: auto;
        }

        .nav-item {
            display: flex;
            align-items: center;
            padding: 12px 16px;
            color: var(--text-gray);
            text-decoration: none;
            border-radius: 8px;
            margin-bottom: 8px;
            font-size: 14px;
            transition: all 0.2s;
        }

        .nav-item i {
            margin-right: 12px;
            width: 20px;
            text-align: center;
            font-size: 16px;
        }

        .nav-item:hover {
            background-color: #f3f4f6;
            color: var(--primary-blue);
        }

        .nav-item.active {
            background-color: var(--primary-blue);
            color: #ffffff;
        }

        .sidebar-footer {
            padding: 16px;
            border-top: 1px solid var(--border-color);
        }

        .sidebar-footer .nav-item {
            margin-bottom: 0;
        }

        /* Main Content */
        .main-content {
            flex-grow: 1;
            display: flex;
            flex-direction: column;
            overflow: hidden;
        }

        /* Header */
        header {
            background-color: #ffffff;
            height: 70px;
            border-bottom: 1px solid var(--border-color);
            display: flex;
            justify-content: flex-end;
            align-items: center;
            padding: 0 32px;
            flex-shrink: 0;
        }

        .user-profile {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .user-info {
            text-align: right;
        }
        
        .user-name {
            font-size: 14px;
            font-weight: 600;
            color: var(--text-dark);
            margin-bottom: 2px;
        }

        .user-role {
            font-size: 12px;
            color: var(--text-gray);
        }

        .avatar {
            width: 40px;
            height: 40px;
            background-color: var(--primary-blue);
            color: white;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: bold;
            font-size: 14px;
        }

        /* Page Content wrapper */
        .content-wrapper {
            padding: 32px;
            overflow-y: auto;
            flex-grow: 1;
        }
        
        /* Utility styles for views */
        .btn-primary {
            background-color: var(--primary-blue);
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 6px;
            font-size: 14px;
            font-weight: 500;
            cursor: pointer;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            transition: background-color 0.2s;
        }

        .btn-primary:hover {
            background-color: var(--primary-blue-hover);
        }

        .card {
            background-color: #ffffff;
            border-radius: 12px;
            border: 1px solid var(--border-color);
            box-shadow: 0 1px 3px rgba(0,0,0,0.05);
            padding: 24px;
        }

    </style>
    @stack('styles')
</head>
<body>

    <!-- Sidebar -->
    <aside class="sidebar">
        <div class="sidebar-brand" style="text-align: center; padding: 20px;">
            <img src="{{ asset('storage/logo/ycss_logo.png') }}" alt="YCSS Logo" style="max-height: 100px; max-width: 100%; width: auto;">
        </div>
        <nav class="sidebar-nav">
            <a href="{{ route('admin.dashboard') }}" class="nav-item {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                <i class="fa-solid fa-border-all"></i> Tableau de bord
            </a>
            <a href="{{ route('admin.users.index') }}" class="nav-item {{ request()->routeIs('admin.users.*') ? 'active' : '' }}">
                <i class="fa-solid fa-users"></i> Gestion des Utilisateurs
            </a>
            <a href="#" class="nav-item">
                <i class="fa-solid fa-chalkboard-user"></i> Gestion des Classes
            </a>
            <a href="#" class="nav-item">
                <i class="fa-solid fa-circle-xmark"></i> Absences
            </a>
            <a href="#" class="nav-item">
                <i class="fa-solid fa-file-signature"></i> Demandes de Certificats
            </a>
            <a href="#" class="nav-item">
                <i class="fa-solid fa-utensils"></i> Réservations Déjeuner
            </a>
            <a href="#" class="nav-item">
                <i class="fa-solid fa-calendar-minus"></i> Demandes de Congé
            </a>
            <a href="#" class="nav-item">
                <i class="fa-solid fa-gear"></i> Paramètres
            </a>
        </nav>
        <div class="sidebar-footer">
            <a href="#" class="nav-item" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                <i class="fa-solid fa-arrow-right-from-bracket"></i> Déconnexion
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        </div>
    </aside>

    <!-- Main Content -->
    <main class="main-content">
        <!-- Header -->
        <header>
            <div class="user-profile">
                <div class="user-info">
                    <div class="user-name">{{ auth()->user()->nom_complet ?? 'Admin User' }}</div>
                    <div class="user-role">{{ auth()->user()->role->titre ?? 'Administrateur' }}</div>
                </div>
                <!-- Initiales de l'utilisateur ou image -->
                <div class="avatar">
                    {{ strtoupper(substr(auth()->user()->nom_complet ?? 'A U', 0, 2)) }}
                </div>
            </div>
        </header>

        <!-- Page Content -->
        <div class="content-wrapper">
            @yield('content')
        </div>
    </main>

    @stack('scripts')
</body>
</html>
