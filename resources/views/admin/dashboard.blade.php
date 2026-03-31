@extends('layouts.admin')

@section('title', 'Tableau de bord')

@push('styles')
<style>
    .page-header {
        margin-bottom: 24px;
    }

    .page-title {
        font-size: 24px;
        color: var(--text-dark);
        font-weight: 500;
        margin-bottom: 4px;
    }

    .page-subtitle {
        color: var(--text-gray);
        font-size: 14px;
    }

    .stats-grid {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 20px;
        margin-bottom: 32px;
    }

    .stat-card {
        background: white;
        border: 1px solid var(--border-color);
        border-radius: 12px;
        padding: 24px;
        display: flex;
        justify-content: space-between;
        align-items: center;
        box-shadow: 0 1px 3px rgba(0,0,0,0.02);
    }

    .stat-info .stat-title {
        font-size: 13px;
        color: var(--text-gray);
        font-weight: 500;
        margin-bottom: 8px;
    }

    .stat-info .stat-value {
        font-size: 28px;
        font-weight: 600;
        color: var(--text-dark);
        margin-bottom: 8px;
    }

    .stat-info .stat-trend {
        font-size: 12px;
        font-weight: 500;
    }
    
    .stat-trend.positive { color: #10b981; } /* Green */
    .stat-trend.negative { color: #ef4444; } /* Red */
    .stat-trend.neutral { color: #6b7280; } /* Gray */

    .stat-icon {
        width: 50px;
        height: 50px;
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 20px;
        color: white;
    }

    .icon-blue { background-color: #3b82f6; } /* Étudiants */
    .icon-green { background-color: #10b981; } /* Formateurs */
    .icon-purple { background-color: #8b5cf6; } /* Classes */
    .icon-orange { background-color: #f97316; } /* Réservations */
    .icon-red { background-color: #ef4444; } /* Absences */
    .icon-cyan { background-color: #0ea5e9; } /* Certificats */

    .recent-requests-card {
        background: white;
        border: 1px solid var(--border-color);
        border-radius: 12px;
        padding: 24px;
        box-shadow: 0 1px 3px rgba(0,0,0,0.02);
    }

    .card-title {
        font-size: 16px;
        font-weight: 600;
        color: var(--text-dark);
        margin-bottom: 20px;
    }

    .data-table {
        width: 100%;
        border-collapse: collapse;
    }

    .data-table th {
        text-align: left;
        padding: 12px 16px;
        font-size: 12px;
        color: var(--text-gray);
        font-weight: 500;
        border-bottom: 1px solid var(--border-color);
    }

    .data-table td {
        padding: 16px;
        font-size: 13px;
        color: var(--text-dark);
        border-bottom: 1px solid var(--border-color);
    }

    .data-table tr:last-child td {
        border-bottom: none;
    }

    .status-badge {
        padding: 4px 12px;
        border-radius: 20px;
        font-size: 11px;
        font-weight: 600;
        display: inline-block;
    }

    .status-pending { background-color: #fef08a; color: #854d0e; } /* Yellow */
    .status-approved { background-color: #d1fae5; color: #065f46; } /* Green */
    .status-rejected { background-color: #fee2e2; color: #991b1b; } /* Red */
    
    .empty-state {
        text-align: center;
        padding: 40px;
        color: var(--text-gray);
        font-size: 14px;
        font-style: italic;
    }
</style>
@endpush

@section('content')

    <div class="page-header">
        <h1 class="page-title">Tableau de bord</h1>
        <p class="page-subtitle">Bienvenue sur votre tableau de bord YCSS</p>
    </div>

    <!-- Stats Grid -->
    <div class="stats-grid">
        <!-- Étudiants -->
        <div class="stat-card">
            <div class="stat-info">
                <div class="stat-title">Total Étudiants</div>
                <div class="stat-value">{{ $totalEtudiants }}</div>
                <div class="stat-trend positive">+0%</div>
            </div>
            <div class="stat-icon icon-blue">
                <i class="fa-solid fa-users"></i>
            </div>
        </div>

        <!-- Formateurs -->
        <div class="stat-card">
            <div class="stat-info">
                <div class="stat-title">Total Formateurs</div>
                <div class="stat-value">{{ $totalFormateurs }}</div>
                <div class="stat-trend positive">+0</div>
            </div>
            <div class="stat-icon icon-green">
                <i class="fa-solid fa-graduation-cap"></i>
            </div>
        </div>

        <!-- Classes -->
        <div class="stat-card">
            <div class="stat-info">
                <div class="stat-title">Total Classes</div>
                <div class="stat-value">{{ $totalClasses }}</div>
                <div class="stat-trend positive">+0</div>
            </div>
            <div class="stat-icon icon-purple">
                <i class="fa-solid fa-book-open"></i>
            </div>
        </div>

        <!-- Réservations -->
        <div class="stat-card">
            <div class="stat-info">
                <div class="stat-title">Réservations Aujourd'hui</div>
                <div class="stat-value">{{ $reservationsAujourdhui }}</div>
                <div class="stat-trend positive">+0</div>
            </div>
            <div class="stat-icon icon-orange">
                <i class="fa-solid fa-utensils"></i>
            </div>
        </div>

        <!-- Absences -->
        <div class="stat-card">
            <div class="stat-info">
                <div class="stat-title">Absences Aujourd'hui</div>
                <div class="stat-value">{{ $absencesAujourdhui }}</div>
                <div class="stat-trend neutral">0</div>
            </div>
            <div class="stat-icon icon-red">
                <i class="fa-solid fa-circle-xmark"></i>
            </div>
        </div>

        <!-- Certificats -->
        <div class="stat-card">
            <div class="stat-info">
                <div class="stat-title">Demandes de Certificats</div>
                <div class="stat-value">{{ $demandesCertificats }}</div>
                <div class="stat-trend positive">+0</div>
            </div>
            <div class="stat-icon icon-cyan">
                <i class="fa-solid fa-file-signature"></i>
            </div>
        </div>
    </div>

    <!-- Table Section -->
    <div class="recent-requests-card">
        <h2 class="card-title">Demandes récentes</h2>
        <table class="data-table">
            <thead>
                <tr>
                    <th>Étudiant</th>
                    <th>Type</th>
                    <th>Date</th>
                    <th>Statut</th>
                </tr>
            </thead>
            <tbody>
                @forelse($demandesRecentes as $demande)
                    <!-- Données futures -->
                @empty
                    <tr>
                        <td colspan="4">
                            <div class="empty-state">
                                Les systèmes de requêtes (congés, certificats) ne sont pas encore opérationnels. 0 demande aujourd'hui.
                            </div>
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

@endsection
