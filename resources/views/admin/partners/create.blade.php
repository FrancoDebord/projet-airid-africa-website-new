@extends('admin.layout')

@section('content')
    <div class="container-fluid pt-4 px-4">
        <div class="row g-4">
            <div class="col-12">
                <div class="bg-white rounded h-100 p-4">
                    <h6 class="mb-4">Ajouter un partenaire</h6>

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

                    <form action="{{ route('admin.partners.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="nom_partenaire" class="form-label">Nom du partenaire <span class="text-danger">*</span></label>
                                <input type="text" class="form-control @error('nom_partenaire') is-invalid @enderror" 
                                       id="nom_partenaire" name="nom_partenaire" value="{{ old('nom_partenaire') }}" required>
                                @error('nom_partenaire')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="nom_long_partenaire" class="form-label">Nom complet (optionnel)</label>
                                <input type="text" class="form-control @error('nom_long_partenaire') is-invalid @enderror" 
                                       id="nom_long_partenaire" name="nom_long_partenaire" value="{{ old('nom_long_partenaire') }}">
                                @error('nom_long_partenaire')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="type_partenaire" class="form-label">Type de partenaire <span class="text-danger">*</span></label>
                                <select class="form-control @error('type_partenaire') is-invalid @enderror" 
                                        id="type_partenaire" name="type_partenaire" required>
                                    <option value="">Sélectionner un type</option>
                                    <option value="funding_partner" {{ old('type_partenaire') == 'funding_partner' ? 'selected' : '' }}>Funding Partners</option>
                                    <option value="industry_partner" {{ old('type_partenaire') == 'industry_partner' ? 'selected' : '' }}>Industry Partners</option>
                                    <option value="accreditation_partner" {{ old('type_partenaire') == 'accreditation_partner' ? 'selected' : '' }}>Accreditation Body</option>
                                    <option value="Work partner" {{ old('type_partenaire') == 'Work partner' ? 'selected' : '' }}>Research Partners</option>
                                </select>
                                @error('type_partenaire')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="logo_partenaire" class="form-label">Logo <span class="text-danger">*</span></label>
                                <input type="file" class="form-control @error('logo_partenaire') is-invalid @enderror" 
                                       id="logo_partenaire" name="logo_partenaire" accept="image/*" required>
                                <small class="form-text text-muted">Formats acceptés: JPEG, PNG, JPG, GIF, SVG. Taille max: 2MB</small>
                                @error('logo_partenaire')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                                <div id="logo-preview" class="mt-2" style="display: none;">
                                    <img id="logo-preview-img" src="" alt="Aperçu" style="max-width: 200px; max-height: 100px; border: 1px solid #ddd; border-radius: 4px; padding: 5px;">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="site_web" class="form-label">Site Web</label>
                                <input type="url" class="form-control @error('site_web') is-invalid @enderror" 
                                       id="site_web" name="site_web" value="{{ old('site_web') }}" 
                                       placeholder="https://example.com">
                                @error('site_web')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="linkedin" class="form-label">LinkedIn</label>
                                <input type="url" class="form-control @error('linkedin') is-invalid @enderror" 
                                       id="linkedin" name="linkedin" value="{{ old('linkedin') }}" 
                                       placeholder="https://linkedin.com/company/example">
                                @error('linkedin')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="description" class="form-label">Description</label>
                            <textarea class="form-control @error('description') is-invalid @enderror" 
                                      id="description" name="description" rows="4" 
                                      placeholder="Description du partenaire...">{{ old('description') }}</textarea>
                            @error('description')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="d-flex justify-content-between">
                            <a href="{{ route('admin.partners.index') }}" class="btn btn-secondary">
                                <i class="fas fa-arrow-left me-2"></i>Retour
                            </a>
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-save me-2"></i>Enregistrer
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    const logoInput = document.getElementById('logo_partenaire');
    const logoPreview = document.getElementById('logo-preview');
    const logoPreviewImg = document.getElementById('logo-preview-img');

    logoInput.addEventListener('change', function(e) {
        const file = e.target.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                logoPreviewImg.src = e.target.result;
                logoPreview.style.display = 'block';
            };
            reader.readAsDataURL(file);
        } else {
            logoPreview.style.display = 'none';
        }
    });
});
</script>
@endpush
