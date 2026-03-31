@extends('layouts.admin')

@section('title', 'Créer un utilisateur')

@push('styles')
<style>
    .page-header {
        margin-bottom: 24px;
        display: flex;
        justify-content: space-between;
        align-items: center;
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

    .form-group {
        margin-bottom: 20px;
    }

    .form-label {
        display: block;
        margin-bottom: 8px;
        font-weight: 500;
        color: var(--text-dark);
        font-size: 14px;
    }

    .form-control {
        width: 100%;
        padding: 12px 16px;
        border: 1px solid var(--border-color);
        border-radius: 6px;
        font-size: 14px;
        outline: none;
        transition: border-color 0.2s;
    }

    .form-control:focus {
        border-color: var(--primary-blue);
    }

    .form-row {
        display: flex;
        gap: 20px;
    }

    .form-col {
        flex: 1;
    }

    .btn-secondary {
        background-color: white;
        color: var(--text-dark);
        border: 1px solid var(--border-color);
        padding: 10px 20px;
        border-radius: 6px;
        font-size: 14px;
        font-weight: 500;
        cursor: pointer;
        text-decoration: none;
        transition: background-color 0.2s;
    }

    .btn-secondary:hover {
        background-color: #f9fafb;
    }
    
    .form-actions {
        display: flex;
        gap: 12px;
        margin-top: 32px;
    }

    .invalid-feedback {
        color: #ef4444;
        font-size: 12px;
        margin-top: 4px;
        display: block;
    }
</style>
@endpush

@section('content')
    <div class="page-header">
        <div>
            <h1 class="page-title">Créer un utilisateur</h1>
            <p class="page-subtitle">Ajouter un nouveau membre dans le système</p>
        </div>
    </div>

    <div class="card" style="max-width: 800px;">
        <form method="POST" action="{{ route('admin.users.store') }}" enctype="multipart/form-data">
            @csrf

            <div style="text-align: center; margin-bottom: 24px;">
                <label for="photo" style="cursor: pointer; display: inline-block; position: relative;">
                    <div style="width: 100px; height: 100px; border-radius: 50%; background: #f1f5f9; border: 2px dashed #cbd5e1; display:flex; align-items:center; justify-content:center; overflow: hidden;">
                        <span id="photo-placeholder" style="color: #94a3b8; font-size: 24px;">+</span>
                        <img id="photo-preview" src="" alt="Aperçu" style="width: 100%; height: 100%; object-fit: cover; display: none;">
                    </div>
                    <div style="font-size: 12px; color: var(--text-gray); margin-top: 8px;">Photo de profil</div>
                </label>
                <input type="file" id="photo" name="photo" accept="image/*" style="display: none;" onchange="previewPhoto(event)">
                @error('photo')
                    <span class="invalid-feedback">{{ $message }}</span>
                @enderror
            </div>
            
            <div class="form-row">
                <div class="form-col form-group">
                    <label class="form-label">Nom Complet *</label>
                    <input type="text" name="nom_complet" class="form-control" value="{{ old('nom_complet') }}" required>
                    @error('nom_complet')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>
                
                <div class="form-col form-group">
                    <label class="form-label">Email *</label>
                    <input type="email" name="email" class="form-control" value="{{ old('email') }}" required>
                    @error('email')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <div class="form-row">
                <div class="form-col form-group">
                    <label class="form-label">Mot de passe *</label>
                    <input type="password" name="password" class="form-control" required>
                    @error('password')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-col form-group">
                    <label class="form-label">Statut *</label>
                    <select name="statut" class="form-control" required>
                        <option value="1" {{ old('statut', 1) == 1 ? 'selected' : '' }}>Actif</option>
                        <option value="0" {{ old('statut') == '0' ? 'selected' : '' }}>Inactif</option>
                    </select>
                </div>
            </div>

            <div class="form-row">
                <div class="form-col form-group">
                    <label class="form-label">Rôle *</label>
                    <select name="role_id" class="form-control" required>
                        <option value="">Sélectionnez un rôle</option>
                        @foreach($roles as $role)
                            <option value="{{ $role->id }}" {{ old('role_id') == $role->id ? 'selected' : '' }}>{{ $role->titre }}</option>
                        @endforeach
                    </select>
                    @error('role_id')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <div class="form-row">
                <div class="form-col form-group">
                    <label class="form-label">Ville</label>
                    <input type="text" name="ville" class="form-control" value="{{ old('ville') }}">
                </div>
                
                <div class="form-col form-group">
                    <label class="form-label">Téléphone</label>
                    <input type="text" name="telephone" class="form-control" value="{{ old('telephone') }}">
                </div>
            </div>

            <div class="form-actions">
                <button type="submit" class="btn-primary">Enregistrer l'utilisateur</button>
                <a href="{{ route('admin.users.index') }}" class="btn-secondary">Annuler</a>
            </div>
        </form>
    </div>

    <script>
        function previewPhoto(event) {
            const input = event.target;
            if (input.files && input.files[0]) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    document.getElementById('photo-preview').src = e.target.result;
                    document.getElementById('photo-preview').style.display = 'block';
                    document.getElementById('photo-placeholder').style.display = 'none';
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
@endsection
