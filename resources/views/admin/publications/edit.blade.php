@extends('admin.layout')

@section('content')
    <div class="container-fluid pt-4 px-4">
        <div class="row g-4">
            <div class="col-12">
                <div class="bg-white rounded h-100 p-4">
                    <h6 class="mb-4">Modifier une publication</h6>

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

                    <form action="{{ route('admin.publications.update', $publication->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="titre_publication" class="form-label">Titre de la publication <span class="text-danger">*</span></label>
                                <input type="text" class="form-control @error('titre_publication') is-invalid @enderror" id="titre_publication" name="titre_publication" value="{{ old('titre_publication', $publication->titre_publication) }}" required>
                                @error('titre_publication')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="auteurs" class="form-label">Auteurs <span class="text-danger">*</span></label>
                                <input type="text" class="form-control @error('auteurs') is-invalid @enderror" id="auteurs" name="auteurs" value="{{ old('auteurs', $publication->auteurs) }}" required>
                                @error('auteurs')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="annee_publication" class="form-label">Année de publication <span class="text-danger">*</span></label>
                                <input type="number" class="form-control @error('annee_publication') is-invalid @enderror" id="annee_publication" name="annee_publication" value="{{ old('annee_publication', $publication->annee_publication) }}" min="1900" max="{{ date('Y') + 1 }}" required>
                                @error('annee_publication')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="url_publication" class="form-label">URL de la publication</label>
                                <input type="url" class="form-control @error('url_publication') is-invalid @enderror" id="url_publication" name="url_publication" value="{{ old('url_publication', $publication->url_publication) }}" placeholder="https://example.com">
                                @error('url_publication')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="resume_publication" class="form-label">Résumé de la publication</label>
                            <textarea class="form-control @error('resume_publication') is-invalid @enderror" id="resume_publication" name="resume_publication" rows="3">{{ old('resume_publication', $publication->resume_publication) }}</textarea>
                            @error('resume_publication')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="photo_couverture" class="form-label">Photo de couverture</label>
                                <input type="file" class="form-control @error('photo_couverture') is-invalid @enderror" id="photo_couverture" name="photo_couverture" accept="image/*">
                                @if($publication->photo_couverture)
                                    @php
                                        // Normaliser le nom du fichier (extraire juste le nom si c'est un chemin)
                                        $photoName = basename($publication->photo_couverture);
                                        
                                        // Vérifier plusieurs emplacements possibles dans l'ordre de priorité
                                        $photoPath = null;
                                        
                                        // 1. Nouveau système : public/assets/publications/couverture/
                                        if (file_exists(public_path('assets/publications/couverture/' . $photoName))) {
                                            $photoPath = asset('assets/publications/couverture/' . $photoName);
                                        }
                                        // 2. Ancien système via symlink : public/storage/assets/publications/couverture/
                                        elseif (file_exists(public_path('storage/assets/publications/couverture/' . $photoName))) {
                                            $photoPath = asset('storage/assets/publications/couverture/' . $photoName);
                                        }
                                        // 3. Par défaut, essayer avec storage/assets/publications/couverture (compatibilité ancien système)
                                        else {
                                            $photoPath = asset('storage/assets/publications/couverture/' . $photoName);
                                        }
                                    @endphp
                                    <small class="form-text text-muted d-block mt-2">Laissez vide pour garder l'image actuelle.</small>
                                    <img src="{{ $photoPath }}" alt="Photo actuelle" width="100" class="mt-2 rounded" onerror="this.onerror=null; this.style.display='none';">
                                @endif
                                <small class="form-text text-muted">Formats acceptés: JPEG, PNG, JPG, GIF. Taille max: 2MB</small>
                                @error('photo_couverture')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="fichier_publication" class="form-label">Fichier PDF</label>
                                <input type="file" class="form-control @error('fichier_publication') is-invalid @enderror" id="fichier_publication" name="fichier_publication" accept=".pdf">
                                @if($publication->fichier_publication)
                                    @php
                                        // Normaliser le nom du fichier (extraire juste le nom si c'est un chemin)
                                        $fileName = basename($publication->fichier_publication);
                                        
                                        // Vérifier plusieurs emplacements possibles dans l'ordre de priorité
                                        $filePath = null;
                                        
                                        // 1. Nouveau système : public/assets/publications/pdf/
                                        if (file_exists(public_path('assets/publications/pdf/' . $fileName))) {
                                            $filePath = asset('assets/publications/pdf/' . $fileName);
                                        }
                                        // 2. Ancien système via symlink : public/storage/assets/publications/pdf/
                                        elseif (file_exists(public_path('storage/assets/publications/pdf/' . $fileName))) {
                                            $filePath = asset('storage/assets/publications/pdf/' . $fileName);
                                        }
                                        // 3. Par défaut, essayer avec storage/assets/publications/pdf (compatibilité ancien système)
                                        else {
                                            $filePath = asset('storage/assets/publications/pdf/' . $fileName);
                                        }
                                    @endphp
                                    <small class="form-text text-muted d-block mt-2">Laissez vide pour garder le fichier actuel.</small>
                                    <a href="{{ $filePath }}" target="_blank" class="btn btn-sm btn-outline-primary mt-2">
                                        <i class="fas fa-file-pdf me-1"></i>Voir le PDF actuel
                                    </a>
                                @endif
                                <small class="form-text text-muted">Format: PDF. Taille max: 10MB</small>
                                @error('fichier_publication')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary">Modifier</button>
                        <a href="{{ route('admin.publications.index') }}" class="btn btn-secondary">Annuler</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
