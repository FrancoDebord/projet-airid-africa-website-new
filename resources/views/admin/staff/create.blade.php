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
                            <div class="col-md-12 mb-3">
                                <label class="form-label">Catégorie(s) Our Team</label>
                                <div class="border rounded p-3 bg-light">
                                    @php
                                        $staffCategoryOptions = \App\Models\AIRID_Personnel::categorySlugs();
                                        $oldCategories = old('staff_categories', []);
                                    @endphp
                                    @foreach($staffCategoryOptions as $slug => $label)
                                        <div class="form-check" style="color: white">
                                            <input class="form-check-input @error('staff_categories') is-invalid @enderror" type="checkbox" name="staff_categories[]" value="{{ $slug }}" id="staff_cat_{{ $slug }}" {{ in_array($slug, $oldCategories) ? 'checked' : '' }}>
                                            <label class="form-check-label" for="staff_cat_{{ $slug }}">{{ $label }}</label>
                                        </div>
                                    @endforeach
                                </div>
                                @error('staff_categories')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                                @error('staff_categories.*')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                                <small class="form-text text-muted">Choisir une ou plusieurs catégories. La personne apparaîtra dans chaque filtre / page About correspondante. Aucune case cochée = n'apparaît pas dans les filtres Our Team ni sur les pages About.</small>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12 mb-3">
                                <label for="description_poste" class="form-label">Description du profil</label>
                                <textarea class="form-control @error('description_poste') is-invalid @enderror" id="description_poste" name="description_poste" rows="5" placeholder="Courte description du poste ou du profil (affichée sur la page équipe et la fiche détail)">{{ old('description_poste') }}</textarea>
                                <div class="d-flex justify-content-between align-items-center mt-1">
                                    <small class="form-text text-muted">Optionnel. Texte affiché sur la carte équipe et la page détail du membre.</small>
                                </div>
                                @error('description_poste')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
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

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="email_personnel" class="form-label">Email</label>
                                <input type="email" class="form-control @error('email_personnel') is-invalid @enderror" id="email_personnel" name="email_personnel" value="{{ old('email_personnel') }}">
                                @error('email_personnel')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                                <small class="form-text text-muted">Email pour l'authentification</small>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12 mb-3">
                                <label class="form-label">Réseaux sociaux</label>
                                <small class="form-text text-muted d-block mb-2">Optionnel. Seules les icônes avec une URL enregistrée seront affichées sur les vues (page équipe, fiche détail).</small>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="link_facebook" class="form-label"><i class="fab fa-facebook-f text-primary me-1"></i> Facebook</label>
                                <input type="url" class="form-control @error('link_facebook') is-invalid @enderror" id="link_facebook" name="link_facebook" value="{{ old('link_facebook') }}" placeholder="https://facebook.com/...">
                                @error('link_facebook')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="link_twitter" class="form-label"><i class="fab fa-twitter text-info me-1"></i> Twitter / X</label>
                                <input type="url" class="form-control @error('link_twitter') is-invalid @enderror" id="link_twitter" name="link_twitter" value="{{ old('link_twitter') }}" placeholder="https://twitter.com/...">
                                @error('link_twitter')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="link_linkedin" class="form-label"><i class="fab fa-linkedin-in text-primary me-1"></i> LinkedIn</label>
                                <input type="url" class="form-control @error('link_linkedin') is-invalid @enderror" id="link_linkedin" name="link_linkedin" value="{{ old('link_linkedin') }}" placeholder="https://linkedin.com/in/...">
                                @error('link_linkedin')
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
