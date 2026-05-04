@extends('admin.layout')

@section('content')
    <div class="container-fluid pt-4 px-4">
        <div class="row g-4">
            <div class="col-12">
                <div class="bg-white rounded h-100 p-4">
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <h6 class="mb-0">Modifier : {{ $item->title }}</h6>
                        <div>
                            <a href="{{ route('philanthropyDetail', $item->slug) }}" class="btn btn-outline-secondary btn-sm" target="_blank">Voir sur le site</a>
                            <a href="{{ route('admin.philanthropy.index') }}" class="btn btn-secondary btn-sm">Liste</a>
                        </div>
                    </div>
                    @if(session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif
                    @if($errors->any())
                        <div class="alert alert-danger"><ul class="mb-0">@foreach($errors->all() as $e)<li>{{ $e }}</li>@endforeach</ul></div>
                    @endif
                    <form action="{{ route('admin.philanthropy.update', $item->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="slug" class="form-label">Slug (URL) <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="slug" name="slug" value="{{ old('slug', $item->slug) }}" pattern="[a-z0-9\-]+" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="title" class="form-label">Titre <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="title" name="title" value="{{ old('title', $item->title) }}" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="closing_date" class="form-label">Date de clôture</label>
                                <input type="date" class="form-control" id="closing_date" name="closing_date" value="{{ old('closing_date', $item->closing_date ? $item->closing_date->format('Y-m-d') : '') }}">
                                <small class="text-muted">Après cette date, statut « Passé » et « Apply now » désactivé automatiquement.</small>
                            </div>
                            <div class="col-12 mb-3">
                                <label for="excerpt" class="form-label">Résumé</label>
                                <textarea class="form-control" id="excerpt" name="excerpt" rows="2" maxlength="500">{{ old('excerpt', $item->excerpt) }}</textarea>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="image_path" class="form-label">Image principale</label>
                                <input type="file" class="form-control" id="image_path" name="image_path" accept=".jpg,.jpeg,.png,.gif,.webp">
                                @if($item->image_path)
                                    <small class="text-muted">Actuelle : {{ $item->image_path }}</small>
                                @endif
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="image_paths" class="form-label">Images supplémentaires</label>
                                <input type="file" class="form-control" id="image_paths" name="image_paths[]" accept=".jpg,.jpeg,.png,.gif,.webp" multiple>
                                @if($item->image_paths && count($item->image_paths) > 0)
                                    <small class="text-muted">{{ count($item->image_paths) }} image(s). Nouveau(s) fichier(s) remplace(nt) tout.</small>
                                @endif
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="document_path" class="form-label">Document PDF (anglais)</label>
                                <input type="file" class="form-control" id="document_path" name="document_path" accept=".pdf">
                                @if($item->document_path)
                                    <small class="text-muted">Actuel : {{ $item->document_path }} — <a href="{{ asset('assets/philanthropy/' . $item->document_path) }}" target="_blank">Télécharger</a></small>
                                @endif
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="document_path_fr" class="form-label">Document PDF (français)</label>
                                <input type="file" class="form-control" id="document_path_fr" name="document_path_fr" accept=".pdf">
                                @if($item->document_path_fr)
                                    <small class="text-muted">Actuel : {{ $item->document_path_fr }} — <a href="{{ asset('assets/philanthropy/' . $item->document_path_fr) }}" target="_blank">Télécharger</a></small>
                                @endif
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="apply_form_type" class="form-label">Formulaire « Apply »</label>
                                <select class="form-select" id="apply_form_type" name="apply_form_type">
                                    @foreach(\App\Models\PhilanthropyItem::applyFormTypeLabels() as $value => $label)
                                        <option value="{{ $value }}" {{ old('apply_form_type', $item->apply_form_type ?? '') === $value ? 'selected' : '' }}>{{ $label }}</option>
                                    @endforeach
                                </select>
                                @if($item->apply_form_type)
                                    <small class="text-muted">Page : <a href="{{ route('philanthropy.apply.form', $item->slug) }}" target="_blank">{{ route('philanthropy.apply.form', $item->slug) }}</a></small>
                                @endif
                            </div>
                            <div class="col-12 mb-3">
                                <label for="apply_intro" class="form-label">Intro page Apply</label>
                                <textarea class="form-control" id="apply_intro" name="apply_intro" rows="3">{{ old('apply_intro', $item->apply_intro) }}</textarea>
                            </div>
                            <div class="col-md-3 mb-3">
                                <label for="sort_order" class="form-label">Ordre</label>
                                <input type="number" class="form-control" id="sort_order" name="sort_order" value="{{ old('sort_order', $item->sort_order) }}" min="0">
                            </div>
                            <div class="col-md-3 mb-3 d-flex align-items-end">
                                <div class="form-check">
                                    <input type="hidden" name="active" value="0">
                                    <input type="checkbox" class="form-check-input" id="active" name="active" value="1" {{ old('active', $item->active) ? 'checked' : '' }}>
                                    <label class="form-check-label" for="active">Visible</label>
                                </div>
                            </div>
                            <div class="col-12 mb-3">
                                <label for="content" class="form-label">Contenu (HTML)</label>
                                <textarea class="form-control font-monospace" id="content" name="content" rows="18">{{ old('content', $item->content) }}</textarea>
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
