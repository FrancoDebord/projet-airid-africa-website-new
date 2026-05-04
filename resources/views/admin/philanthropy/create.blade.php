@extends('admin.layout')

@section('content')
    <div class="container-fluid pt-4 px-4">
        <div class="row g-4">
            <div class="col-12">
                <div class="bg-white rounded h-100 p-4">
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <h6 class="mb-0">Ajouter une page Philanthropy</h6>
                        <a href="{{ route('admin.philanthropy.index') }}" class="btn btn-secondary">Liste</a>
                    </div>
                    @if($errors->any())
                        <div class="alert alert-danger"><ul class="mb-0">@foreach($errors->all() as $e)<li>{{ $e }}</li>@endforeach</ul></div>
                    @endif
                    <form action="{{ route('admin.philanthropy.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="slug" class="form-label">Slug (URL) <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="slug" name="slug" value="{{ old('slug') }}" pattern="[a-z0-9\-]+" placeholder="ex: my-new-page" required>
                                <small class="text-muted">Lettres minuscules, chiffres et tirets uniquement. URL: /philanthropy/<strong>slug</strong></small>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="title" class="form-label">Titre <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="title" name="title" value="{{ old('title') }}" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="closing_date" class="form-label">Date de clôture</label>
                                <input type="date" class="form-control" id="closing_date" name="closing_date" value="{{ old('closing_date') }}">
                                <small class="text-muted">Après cette date, le statut passera automatiquement à « Passé » et la page sera désactivée ; le bouton « Apply now » sera masqué.</small>
                            </div>
                            <div class="col-12 mb-3">
                                <label for="excerpt" class="form-label">Résumé (court texte sur la carte)</label>
                                <textarea class="form-control" id="excerpt" name="excerpt" rows="2" maxlength="500">{{ old('excerpt') }}</textarea>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="image_path" class="form-label">Image principale (carte + détail)</label>
                                <input type="file" class="form-control" id="image_path" name="image_path" accept=".jpg,.jpeg,.png,.gif,.webp">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="image_paths" class="form-label">Images supplémentaires (galerie, plusieurs possibles)</label>
                                <input type="file" class="form-control" id="image_paths" name="image_paths[]" accept=".jpg,.jpeg,.png,.gif,.webp" multiple>
                                <small class="text-muted">Sélectionnez une ou plusieurs images.</small>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="document_path" class="form-label">Document PDF (anglais)</label>
                                <input type="file" class="form-control" id="document_path" name="document_path" accept=".pdf">
                                <small class="text-muted">Brochure, formulaire… Max 20 Mo. Bouton affiché sur la page si présent.</small>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="document_path_fr" class="form-label">Document PDF (français)</label>
                                <input type="file" class="form-control" id="document_path_fr" name="document_path_fr" accept=".pdf">
                                <small class="text-muted">Même document en français. Bouton affiché sur la page si présent.</small>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="apply_form_type" class="form-label">Formulaire « Apply » (page /philanthropy/{slug}/apply)</label>
                                <select class="form-select" id="apply_form_type" name="apply_form_type">
                                    @foreach(\App\Models\PhilanthropyItem::applyFormTypeLabels() as $value => $label)
                                        <option value="{{ $value }}" {{ old('apply_form_type', '') === $value ? 'selected' : '' }}>{{ $label }}</option>
                                    @endforeach
                                </select>
                                <small class="text-muted">Si choisi, un bouton « Apply now » apparaît sur la page détail et une page formulaire est disponible.</small>
                            </div>
                            <div class="col-12 mb-3">
                                <label for="apply_intro" class="form-label">Intro page Apply (texte affiché au-dessus du formulaire)</label>
                                <textarea class="form-control" id="apply_intro" name="apply_intro" rows="3">{{ old('apply_intro') }}</textarea>
                                <small class="text-muted">Ex. : Date limite : 31 mars 2026. Envoyez le formulaire avec les documents demandés (PDF de préférence).</small>
                            </div>
                            <div class="col-md-3 mb-3">
                                <label for="sort_order" class="form-label">Ordre d'affichage</label>
                                <input type="number" class="form-control" id="sort_order" name="sort_order" value="{{ old('sort_order', 0) }}" min="0">
                            </div>
                            <div class="col-md-3 mb-3 d-flex align-items-end">
                                <div class="form-check">
                                    <input type="hidden" name="active" value="0">
                                    <input type="checkbox" class="form-check-input" id="active" name="active" value="1" {{ old('active', true) ? 'checked' : '' }}>
                                    <label class="form-check-label" for="active">Visible sur le site</label>
                                </div>
                            </div>
                            <div class="col-12 mb-3">
                                <label for="content" class="form-label">Contenu (détail de la page, HTML autorisé)</label>
                                <textarea class="form-control font-monospace" id="content" name="content" rows="18">{{ old('content') }}</textarea>
                            </div>
                            <div class="col-12">
                                <button type="submit" class="btn btn-primary">Enregistrer</button>
                                <a href="{{ route('admin.philanthropy.index') }}" class="btn btn-outline-secondary">Annuler</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
