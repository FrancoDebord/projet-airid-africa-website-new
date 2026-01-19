@extends('admin.layout')

@section('content')
    <div class="container-fluid pt-4 px-4">
        <div class="row g-4">
            <div class="col-12">
                <div class="bg-white rounded h-100 p-4">
                    <h6 class="mb-4">Ajouter un membre du staff</h6>

                    @if($errors->any())
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <ul class="mb-0">
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        </div>
                    @endif

                    <form action="{{ route('admin.staff.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="titre" class="form-label">Titre <span class="text-danger">*</span></label>
                                <input type="text" class="form-control @error('titre') is-invalid @enderror" id="titre" name="titre" value="{{ old('titre') }}" required>
                                @error('titre')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="prenom_personnel" class="form-label">Prénom <span class="text-danger">*</span></label>
                                <input type="text" class="form-control @error('prenom_personnel') is-invalid @enderror" id="prenom_personnel" name="prenom_personnel" value="{{ old('prenom_personnel') }}" required>
                                @error('prenom_personnel')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="nom_personnel" class="form-label">Nom <span class="text-danger">*</span></label>
                                <input type="text" class="form-control @error('nom_personnel') is-invalid @enderror" id="nom_personnel" name="nom_personnel" value="{{ old('nom_personnel') }}" required>
                                @error('nom_personnel')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="photo_personnel" class="form-label">Photo</label>
                                <input type="file" class="form-control @error('photo_personnel') is-invalid @enderror" id="photo_personnel" name="photo_personnel" accept="image/*">
                                <small class="form-text text-muted">Formats acceptés: JPEG, PNG, JPG, GIF. Taille max: 2MB</small>
                                @error('photo_personnel')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="departement_id" class="form-label">Département <span class="text-danger">*</span></label>
                                <select class="form-control @error('departement_id') is-invalid @enderror" id="departement_id" name="departement_id" required>
                                    <option value="">Sélectionner un département</option>
                                    @foreach($departements ?? [] as $departement)
                                        <option value="{{ $departement->id }}" {{ old('departement_id') == $departement->id ? 'selected' : '' }}>{{ $departement->nom_departement }}</option>
                                    @endforeach
                                </select>
                                @error('departement_id')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="poste_id" class="form-label">Poste <span class="text-danger">*</span></label>
                                <select class="form-control @error('poste_id') is-invalid @enderror" id="poste_id" name="poste_id" required>
                                    <option value="">Sélectionner un poste</option>
                                    @foreach($postes ?? [] as $poste)
                                        <option value="{{ $poste->id }}" {{ old('poste_id') == $poste->id ? 'selected' : '' }}>{{ $poste->intitule_poste }}</option>
                                    @endforeach
                                </select>
                                @error('poste_id')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="niveau_poste" class="form-label">Niveau Poste <span class="text-danger">*</span></label>
                                <input type="number" class="form-control @error('niveau_poste') is-invalid @enderror" id="niveau_poste" name="niveau_poste" value="{{ old('niveau_poste') }}" min="1" required>
                                @error('niveau_poste')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="poids_personnel" class="form-label">Poids Personnel <span class="text-danger">*</span></label>
                                <input type="number" class="form-control @error('poids_personnel') is-invalid @enderror" id="poids_personnel" name="poids_personnel" value="{{ old('poids_personnel') }}" min="1" required>
                                @error('poids_personnel')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Ajouter</button>
                        <a href="{{ route('admin.staff.index') }}" class="btn btn-secondary">Annuler</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
