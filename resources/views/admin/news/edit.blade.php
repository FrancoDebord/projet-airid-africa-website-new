@extends('admin.layout')

@section('content')
    <div class="container-fluid pt-4 px-4">
        <div class="row g-4">
            <div class="col-12">
                <div class="bg-white rounded h-100 p-4">
                    <h6 class="mb-4">Modifier une News / Blog</h6>

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

                    <form action="{{ route('admin.news.update', $news->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label for="titre_news" class="form-label">Titre de la news <span class="text-danger">*</span></label>
                            <input type="text" class="form-control @error('titre_news') is-invalid @enderror" id="titre_news" name="titre_news" value="{{ old('titre_news', $news->titre_news) }}" required>
                            @error('titre_news')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="resume" class="form-label">Résumé de la news</label>
                            <textarea class="form-control @error('resume') is-invalid @enderror" id="resume" name="resume" rows="3" placeholder="Court résumé qui apparaîtra dans les listes">{{ old('resume', $news->resume) }}</textarea>
                            @error('resume')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            <small class="form-text text-muted">Ce résumé sera affiché dans les aperçus et listes de news.</small>
                        </div>

                        <div class="mb-3">
                            <label for="description_sans_html" class="form-label">Description (sans HTML)</label>
                            <textarea class="form-control @error('description_sans_html') is-invalid @enderror" id="description_sans_html" name="description_sans_html" rows="5" placeholder="Description en texte simple">{{ old('description_sans_html', $news->description_sans_html) }}</textarea>
                            @error('description_sans_html')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            <small class="form-text text-muted">Description en texte simple (sans balises HTML).</small>
                        </div>

                        <div class="mb-3">
                            <label for="description_riche" class="form-label">Description riche (avec HTML)</label>
                            <textarea class="form-control @error('description_riche') is-invalid @enderror" id="description_riche" name="description_riche" rows="10" placeholder="Description avec formatage HTML">{{ old('description_riche', $news->description_riche) }}</textarea>
                            @error('description_riche')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            <small class="form-text text-muted">Description complète avec formatage HTML qui sera affichée sur la page de détail.</small>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="photo_couverture" class="form-label">Photo de couverture</label>
                                <input type="file" class="form-control @error('photo_couverture') is-invalid @enderror" id="photo_couverture" name="photo_couverture" accept="image/*">
                                @if($news->photo_couverture)
                                    @php
                                        $photoName = basename($news->photo_couverture);
                                        $photoPath = null;
                                        
                                        // Vérifier plusieurs emplacements possibles
                                        if (file_exists(public_path('assets/news/' . $photoName))) {
                                            $photoPath = asset('assets/news/' . $photoName);
                                        } elseif (file_exists(public_path('storage/assets/news/' . $photoName))) {
                                            $photoPath = asset('storage/assets/news/' . $photoName);
                                        } else {
                                            $photoPath = asset('assets/news/' . $photoName);
                                        }
                                    @endphp
                                    <small class="form-text text-muted d-block mt-2">Laissez vide pour garder l'image actuelle.</small>
                                    <img src="{{ $photoPath }}" alt="Photo actuelle" width="200" class="mt-2 rounded" onerror="this.onerror=null; this.style.display='none';">
                                @endif
                                <small class="form-text text-muted">Formats acceptés: JPEG, PNG, JPG, GIF. Taille max: 2MB</small>
                                @error('photo_couverture')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="seconde_photo" class="form-label">Seconde photo (optionnelle)</label>
                                <input type="file" class="form-control @error('seconde_photo') is-invalid @enderror" id="seconde_photo" name="seconde_photo" accept="image/*">
                                @if($news->seconde_photo)
                                    @php
                                        $photoName = basename($news->seconde_photo);
                                        $photoPath = null;
                                        
                                        if (file_exists(public_path('assets/news/' . $photoName))) {
                                            $photoPath = asset('assets/news/' . $photoName);
                                        } elseif (file_exists(public_path('storage/assets/news/' . $photoName))) {
                                            $photoPath = asset('storage/assets/news/' . $photoName);
                                        } else {
                                            $photoPath = asset('assets/news/' . $photoName);
                                        }
                                    @endphp
                                    <small class="form-text text-muted d-block mt-2">Laissez vide pour garder l'image actuelle.</small>
                                    <img src="{{ $photoPath }}" alt="Seconde photo actuelle" width="200" class="mt-2 rounded" onerror="this.onerror=null; this.style.display='none';">
                                @endif
                                <small class="form-text text-muted">Formats acceptés: JPEG, PNG, JPG, GIF. Taille max: 2MB</small>
                                @error('seconde_photo')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">

                            <div class="col-md-6 mb-3">
                                <label for="date_news" class="form-label">Date de publication</label>
                                <input type="date" class="form-control @error('date_news') is-invalid @enderror" id="date_news" name="date_news" value="{{ old('date_news', $news->date_news ? date('Y-m-d', strtotime($news->date_news)) : date('Y-m-d')) }}">
                                @error('date_news')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                                <small class="form-text text-muted">Date de publication de la news.</small>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary">Modifier</button>
                        <a href="{{ route('admin.news.index') }}" class="btn btn-secondary">Annuler</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
