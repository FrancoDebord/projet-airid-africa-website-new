@extends('admin.layout')

@section('content')
    <div class="container-fluid pt-4 px-4">
        <div class="row g-4">
            <div class="col-12">
                <div class="bg-white rounded h-100 p-4">
                    <h6 class="mb-4">Ajouter un Blog</h6>

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

                    <form action="{{ route('admin.blogs.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="mb-3">
                            <label for="titre_blog" class="form-label">Titre du blog <span class="text-danger">*</span></label>
                            <input type="text" class="form-control @error('titre_blog') is-invalid @enderror" id="titre_blog" name="titre_blog" value="{{ old('titre_blog') }}" required>
                            @error('titre_blog')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="resume" class="form-label">Résumé du blog</label>
                            <textarea class="form-control @error('resume') is-invalid @enderror" id="resume" name="resume" rows="3" placeholder="Court résumé qui apparaîtra dans les listes">{{ old('resume') }}</textarea>
                            @error('resume')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            <small class="form-text text-muted">Ce résumé sera affiché dans les aperçus et listes de blogs.</small>
                        </div>

                        <div class="mb-3">
                            <label for="description_sans_html" class="form-label">Description (sans HTML)</label>
                            <textarea class="form-control @error('description_sans_html') is-invalid @enderror" id="description_sans_html" name="description_sans_html" rows="5" placeholder="Description en texte simple">{{ old('description_sans_html') }}</textarea>
                            @error('description_sans_html')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            <small class="form-text text-muted">Description en texte simple (sans balises HTML).</small>
                        </div>

                        <div class="mb-3">
                            <label for="description_riche" class="form-label">Description riche (avec HTML)</label>
                            <textarea class="form-control @error('description_riche') is-invalid @enderror" id="description_riche" name="description_riche" rows="10" placeholder="Description avec formatage HTML">{{ old('description_riche') }}</textarea>
                            @error('description_riche')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            <small class="form-text text-muted">Description complète avec formatage HTML qui sera affichée sur la page de détail.</small>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="photo_couverture_blog" class="form-label">Photo de couverture</label>
                                <input type="file" class="form-control @error('photo_couverture_blog') is-invalid @enderror" id="photo_couverture_blog" name="photo_couverture_blog" accept="image/*">
                                <small class="form-text text-muted">Formats acceptés: JPEG, PNG, JPG, GIF. Taille max: 2MB</small>
                                @error('photo_couverture_blog')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="date_blog" class="form-label">Date de publication</label>
                                <input type="date" class="form-control @error('date_blog') is-invalid @enderror" id="date_blog" name="date_blog" value="{{ old('date_blog') }}">
                                @error('date_blog')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                                <small class="form-text text-muted">Date à laquelle le blog doit être publié (optionnel).</small>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary">Ajouter</button>
                        <a href="{{ route('admin.blogs.index') }}" class="btn btn-secondary">Annuler</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
