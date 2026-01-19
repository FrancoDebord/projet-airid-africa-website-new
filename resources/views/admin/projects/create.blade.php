@extends('admin.layout')

@section('content')
    <div class="container-fluid pt-4 px-4">
        <div class="row g-4">
            <div class="col-12">
                <div class="bg-white rounded h-100 p-4">
                    <h6 class="mb-4">Ajouter un projet</h6>

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

                    <form action="{{ route('admin.projects.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="short_title_project" class="form-label">Titre court <span class="text-danger">*</span></label>
                                <input type="text" class="form-control @error('short_title_project') is-invalid @enderror" id="short_title_project" name="short_title_project" value="{{ old('short_title_project') }}" required>
                                @error('short_title_project')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="long_title_project" class="form-label">Titre long <span class="text-danger">*</span></label>
                                <input type="text" class="form-control @error('long_title_project') is-invalid @enderror" id="long_title_project" name="long_title_project" value="{{ old('long_title_project') }}" required>
                                @error('long_title_project')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="category_id" class="form-label">Catégorie</label>
                                <select class="form-select @error('category_id') is-invalid @enderror" id="category_id" name="category_id">
                                    <option value="">Sélectionner une catégorie</option>
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>{{ $category->nom_categorie ?? 'Catégorie #' . $category->id }}</option>
                                    @endforeach
                                </select>
                                @error('category_id')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="etat_projet" class="form-label">État du projet <span class="text-danger">*</span></label>
                                <select class="form-select @error('etat_projet') is-invalid @enderror" id="etat_projet" name="etat_projet" required>
                                    <option value="ongoing" {{ old('etat_projet') == 'ongoing' ? 'selected' : '' }}>En cours</option>
                                    <option value="ended" {{ old('etat_projet') == 'ended' ? 'selected' : '' }}>Terminé</option>
                                    <option value="abandoned" {{ old('etat_projet') == 'abandoned' ? 'selected' : '' }}>Abandonné</option>
                                </select>
                                @error('etat_projet')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="date_debut_project" class="form-label">Date de début</label>
                                <input type="date" class="form-control @error('date_debut_project') is-invalid @enderror" id="date_debut_project" name="date_debut_project" value="{{ old('date_debut_project') }}">
                                @error('date_debut_project')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="date_fin_project" class="form-label">Date de fin</label>
                                <input type="date" class="form-control @error('date_fin_project') is-invalid @enderror" id="date_fin_project" name="date_fin_project" value="{{ old('date_fin_project') }}">
                                @error('date_fin_project')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4 mb-3">
                                <label for="creator_id" class="form-label">Créateur <span class="text-danger">*</span></label>
                                <select class="form-select @error('creator_id') is-invalid @enderror" id="creator_id" name="creator_id" required>
                                    <option value="">Sélectionner un créateur</option>
                                    @foreach($personnels as $personnel)
                                        <option value="{{ $personnel->id }}" {{ old('creator_id') == $personnel->id ? 'selected' : '' }}>{{ $personnel->prenom_personnel }} {{ $personnel->nom_personnel }}</option>
                                    @endforeach
                                </select>
                                @error('creator_id')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-4 mb-3">
                                <label for="study_director" class="form-label">Directeur d'étude</label>
                                <select class="form-select @error('study_director') is-invalid @enderror" id="study_director" name="study_director">
                                    <option value="">Sélectionner un directeur</option>
                                    @foreach($personnels as $personnel)
                                        <option value="{{ $personnel->id }}" {{ old('study_director') == $personnel->id ? 'selected' : '' }}>{{ $personnel->prenom_personnel }} {{ $personnel->nom_personnel }}</option>
                                    @endforeach
                                </select>
                                @error('study_director')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-4 mb-3">
                                <label for="project_manager" class="form-label">Chef de projet</label>
                                <select class="form-select @error('project_manager') is-invalid @enderror" id="project_manager" name="project_manager">
                                    <option value="">Sélectionner un chef de projet</option>
                                    @foreach($personnels as $personnel)
                                        <option value="{{ $personnel->id }}" {{ old('project_manager') == $personnel->id ? 'selected' : '' }}>{{ $personnel->prenom_personnel }} {{ $personnel->nom_personnel }}</option>
                                    @endforeach
                                </select>
                                @error('project_manager')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="sponsor_id" class="form-label">Sponsor</label>
                            <select class="form-select @error('sponsor_id') is-invalid @enderror" id="sponsor_id" name="sponsor_id">
                                <option value="">Sélectionner un sponsor</option>
                                @foreach($sponsors as $sponsor)
                                    <option value="{{ $sponsor->id }}" {{ old('sponsor_id') == $sponsor->id ? 'selected' : '' }}>{{ $sponsor->nom_partenaire }}</option>
                                @endforeach
                            </select>
                            @error('sponsor_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="resume" class="form-label">Résumé</label>
                            <textarea class="form-control @error('resume') is-invalid @enderror" id="resume" name="resume" rows="3">{{ old('resume') }}</textarea>
                            @error('resume')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="description_sans_html" class="form-label">Description (sans HTML)</label>
                            <textarea class="form-control @error('description_sans_html') is-invalid @enderror" id="description_sans_html" name="description_sans_html" rows="5">{{ old('description_sans_html') }}</textarea>
                            @error('description_sans_html')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="description_riche" class="form-label">Description riche (avec HTML)</label>
                            <textarea class="form-control @error('description_riche') is-invalid @enderror" id="description_riche" name="description_riche" rows="8">{{ old('description_riche') }}</textarea>
                            @error('description_riche')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="photo_couverture" class="form-label">Photo de couverture</label>
                                <input type="file" class="form-control @error('photo_couverture') is-invalid @enderror" id="photo_couverture" name="photo_couverture" accept="image/*">
                                <small class="form-text text-muted">Formats acceptés: JPEG, PNG, JPG, GIF. Taille max: 2MB</small>
                                @error('photo_couverture')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="seconde_photo" class="form-label">Seconde photo</label>
                                <input type="file" class="form-control @error('seconde_photo') is-invalid @enderror" id="seconde_photo" name="seconde_photo" accept="image/*">
                                <small class="form-text text-muted">Formats acceptés: JPEG, PNG, JPG, GIF. Taille max: 2MB</small>
                                @error('seconde_photo')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary">Ajouter</button>
                        <a href="{{ route('admin.projects.index') }}" class="btn btn-secondary">Annuler</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
