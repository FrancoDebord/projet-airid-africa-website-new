@extends('admin.layout')

@section('content')
    <div class="container-fluid pt-4 px-4">
        <div class="row g-4">
            <div class="col-12">
                <div class="bg-white rounded h-100 p-4">
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <h6 class="mb-0">Détails du partenaire</h6>
                        <div>
                            <a href="{{ route('admin.partners.edit', $partner->id) }}" class="btn btn-warning">
                                <i class="fas fa-edit me-2"></i>Modifier
                            </a>
                            <a href="{{ route('admin.partners.index') }}" class="btn btn-secondary">
                                <i class="fas fa-arrow-left me-2"></i>Retour
                            </a>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-4 text-center mb-4">
                            @if($partner->logo_partenaire)
                                <img src="{{ asset('storage/assets/logo/' . $partner->logo_partenaire) }}" 
                                     alt="Logo {{ $partner->nom_partenaire }}" 
                                     class="img-fluid rounded border p-2" 
                                     style="max-width: 300px; max-height: 200px;">
                            @else
                                <div class="bg-light rounded d-flex align-items-center justify-content-center border p-5" 
                                     style="max-width: 300px; margin: 0 auto;">
                                    <i class="fas fa-building fa-3x text-muted"></i>
                                </div>
                            @endif
                        </div>
                        <div class="col-md-8">
                            <h4 class="mb-3">{{ $partner->nom_partenaire }}</h4>
                            
                            @if($partner->nom_long_partenaire)
                                <p class="text-muted mb-3"><strong>Nom complet:</strong> {{ $partner->nom_long_partenaire }}</p>
                            @endif

                            <div class="mb-3">
                                <strong>Type:</strong>
                                @php
                                    $typeMapping = [
                                        'accreditation_partner' => ['label' => 'Accreditation Body', 'class' => 'bg-purple'],
                                        'Work partner' => ['label' => 'Research Partners', 'class' => 'bg-warning text-dark'],
                                        'funding_partner' => ['label' => 'Funding Partners', 'class' => 'bg-success'],
                                        'industry_partner' => ['label' => 'Industry Partners', 'class' => 'bg-info text-dark'],
                                    ];
                                    $typeInfo = $typeMapping[$partner->type_partenaire ?? 'industry_partner'] ?? ['label' => 'Autre', 'class' => 'bg-secondary'];
                                @endphp
                                <span class="badge {{ $typeInfo['class'] }} ms-2">
                                    {{ $typeInfo['label'] }}
                                </span>
                            </div>

                            @if($partner->site_web)
                                <div class="mb-3">
                                    <strong>Site Web:</strong>
                                    <a href="{{ $partner->site_web }}" target="_blank" rel="noopener noreferrer" class="ms-2">
                                        <i class="fas fa-globe me-1"></i>{{ $partner->site_web }}
                                    </a>
                                </div>
                            @endif

                            @if($partner->linkedin)
                                <div class="mb-3">
                                    <strong>LinkedIn:</strong>
                                    <a href="{{ $partner->linkedin }}" target="_blank" rel="noopener noreferrer" class="ms-2">
                                        <i class="fab fa-linkedin me-1"></i>{{ $partner->linkedin }}
                                    </a>
                                </div>
                            @endif

                            @if($partner->description)
                                <div class="mb-3">
                                    <strong>Description:</strong>
                                    <p class="mt-2">{{ $partner->description }}</p>
                                </div>
                            @endif

                            <div class="mt-4">
                                <small class="text-muted">
                                    <i class="fas fa-calendar me-1"></i>Créé le: {{ $partner->created_at->format('d/m/Y à H:i') }}
                                    @if($partner->updated_at != $partner->created_at)
                                        <br><i class="fas fa-edit me-1"></i>Modifié le: {{ $partner->updated_at->format('d/m/Y à H:i') }}
                                    @endif
                                </small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('styles')
<style>
.bg-purple {
    background-color: #9b59b6 !important;
    color: white !important;
}
</style>
@endpush
