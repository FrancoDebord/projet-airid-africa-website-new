@extends('admin.layout')

@section('content')

    <div class="container-fluid pt-4 px-4">
        <div class="row g-4">
            <div class="col-12">
                <div class="bg-white rounded h-100 p-4">
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <h6 class="mb-0">Détails de la publication</h6>
                        <a href="{{ route('admin.publications.edit', $publication->id) }}" class="btn btn-primary">
                            <i class="fas fa-edit me-2"></i>Modifier
                        </a>
                    </div>

                    <div class="row">
                        <!-- Photo de couverture -->
                        <div class="col-md-4 mb-4">
                            @if($publication->photo_couverture)
                                @php
                                    $photoName = basename($publication->photo_couverture);
                                    $photoPath = null;
                                    
                                    if (file_exists(public_path('assets/publications/couverture/' . $photoName))) {
                                        $photoPath = asset('assets/publications/couverture/' . $photoName);
                                    } elseif (file_exists(public_path('storage/assets/publications/couverture/' . $photoName))) {
                                        $photoPath = asset('storage/assets/publications/couverture/' . $photoName);
                                    } else {
                                        $photoPath = asset('storage/assets/publications/couverture/' . $photoName);
                                    }
                                @endphp
                                <img src="{{ $photoPath }}" alt="Photo de couverture" class="img-fluid rounded shadow" onerror="this.onerror=null; this.src='{{ asset('img/default-image.png') }}';">
                            @else
                                <div class="bg-light rounded d-flex align-items-center justify-content-center" style="height: 300px;">
                                    <i class="fas fa-image fa-5x text-muted"></i>
                                </div>
                            @endif
                        </div>

                        <!-- Informations -->
                        <div class="col-md-8">
                            <div class="card border-0 shadow-sm">
                                <div class="card-body">
                                    <h5 class="card-title mb-4">Informations de la publication</h5>
                                    
                                    <div class="row mb-3">
                                        <div class="col-sm-4"><strong>Titre:</strong></div>
                                        <div class="col-sm-8">{{ $publication->titre_publication }}</div>
                                    </div>

                                    <div class="row mb-3">
                                        <div class="col-sm-4"><strong>Auteurs:</strong></div>
                                        <div class="col-sm-8">{{ $publication->auteurs }}</div>
                                    </div>

                                    <div class="row mb-3">
                                        <div class="col-sm-4"><strong>Année de publication:</strong></div>
                                        <div class="col-sm-8">
                                            <span class="badge bg-primary">{{ $publication->annee_publication }}</span>
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <div class="col-sm-4"><strong>URL:</strong></div>
                                        <div class="col-sm-8">
                                            @if($publication->url_publication)
                                                <a href="{{ $publication->url_publication }}" target="_blank" class="btn btn-sm btn-outline-primary">
                                                    <i class="fas fa-external-link-alt me-1"></i>Ouvrir le lien
                                                </a>
                                            @else
                                                <span class="text-muted">Non défini</span>
                                            @endif
                                        </div>
                                    </div>

                                    @if($publication->resume_publication)
                                    <hr>
                                    <div class="mb-3">
                                        <strong>Résumé:</strong>
                                        <p class="mt-2">{{ $publication->resume_publication }}</p>
                                    </div>
                                    @endif

                                    @if($publication->fichier_publication)
                                    <hr>
                                    <div class="mb-3">
                                        <strong>Fichier PDF:</strong>
                                        <div class="mt-2">
                                            @php
                                                $fileName = basename($publication->fichier_publication);
                                                $filePath = null;
                                                
                                                if (file_exists(public_path('assets/publications/pdf/' . $fileName))) {
                                                    $filePath = asset('assets/publications/pdf/' . $fileName);
                                                } elseif (file_exists(public_path('storage/assets/publications/pdf/' . $fileName))) {
                                                    $filePath = asset('storage/assets/publications/pdf/' . $fileName);
                                                } else {
                                                    $filePath = asset('storage/assets/publications/pdf/' . $fileName);
                                                }
                                            @endphp
                                            <a href="{{ $filePath }}" target="_blank" class="btn btn-primary">
                                                <i class="fas fa-file-pdf me-2"></i>Télécharger le PDF
                                            </a>
                                        </div>
                                    </div>
                                    @endif

                                    <hr>

                                    <div class="row mb-3">
                                        <div class="col-sm-4"><strong>Date de création:</strong></div>
                                        <div class="col-sm-8">{{ $publication->created_at ? $publication->created_at->format('d/m/Y H:i') : 'N/A' }}</div>
                                    </div>

                                    <div class="row mb-3">
                                        <div class="col-sm-4"><strong>Dernière modification:</strong></div>
                                        <div class="col-sm-8">{{ $publication->updated_at ? $publication->updated_at->format('d/m/Y H:i') : 'N/A' }}</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="mt-4">
                        <a href="{{ route('admin.publications.index') }}" class="btn btn-secondary">
                            <i class="fas fa-arrow-left me-2"></i>Retour à la liste
                        </a>
                        <a href="{{ route('admin.publications.edit', $publication->id) }}" class="btn btn-primary">
                            <i class="fas fa-edit me-2"></i>Modifier
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

