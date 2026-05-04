@extends('admin.layout')

@section('content')

    <div class="container-fluid pt-4 px-4">
        <div class="row g-4">
            <div class="col-12">
                <div class="bg-white rounded h-100 p-4">
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <h6 class="mb-0">Détails de la News / Blog</h6>
                        <a href="{{ route('admin.news.edit', $news->id) }}" class="btn btn-primary">
                            <i class="fas fa-edit me-2"></i>Modifier
                        </a>
                    </div>

                    <div class="row">
                        <!-- Photo de couverture -->
                        <div class="col-md-4 mb-4">
                            @if($news->photo_couverture)
                                @php
                                    $photoName = basename($news->photo_couverture);
                                    $photoPath = file_exists(public_path('assets/news/' . $photoName)) ? asset('assets/news/' . $photoName) : asset('storage/assets/news/' . $photoName);
                                @endphp
                                <img src="{{ $photoPath }}" alt="Photo de couverture" class="img-fluid rounded shadow" onerror="this.onerror=null; this.style.display='none'; this.nextElementSibling.style.display='flex';">
                                <div class="bg-light rounded d-flex flex-column align-items-center justify-content-center p-4" style="height: 300px; border: 2px dashed #ccc; display: none;">
                                    <i class="fas fa-image fa-5x text-muted mb-3"></i>
                                    <p class="text-muted text-center mb-2">Image non trouvée</p>
                                    <small class="text-muted text-center">Fichier: {{ $photoName }}</small>
                                </div>
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
                                    <h5 class="card-title mb-4">Informations de la News</h5>
                                    
                                    <div class="row mb-3">
                                        <div class="col-sm-4"><strong>Titre:</strong></div>
                                        <div class="col-sm-8">{{ $news->titre_news ?? 'Sans titre' }}</div>
                                    </div>

                                    @if($news->creatorNews)
                                    <div class="row mb-3">
                                        <div class="col-sm-4"><strong>Créateur:</strong></div>
                                        <div class="col-sm-8">
                                            {{ $news->creatorNews->prenom_personnel ?? '' }} {{ $news->creatorNews->nom_personnel ?? '' }}
                                        </div>
                                    </div>
                                    @endif

                                    @if($news->photo_couverture)
                                    <div class="row mb-3">
                                        <div class="col-sm-4"><strong>Photo de couverture:</strong></div>
                                        <div class="col-sm-8">
                                            <span class="badge bg-info">{{ basename($news->photo_couverture) }}</span>
                                            @php
                                                $photoName = basename($news->photo_couverture);
                                                $fileExists1 = file_exists(public_path('assets/news/' . $photoName));
                                                $fileExists2 = file_exists(public_path('storage/assets/news/' . $photoName));
                                            @endphp
                                            @if($fileExists1 || $fileExists2)
                                                <span class="badge bg-success ms-2">Fichier trouvé</span>
                                            @else
                                                <span class="badge bg-warning ms-2">Fichier non trouvé</span>
                                            @endif
                                        </div>
                                    </div>
                                    @endif

                                    @if($news->resume)
                                    <hr>
                                    <div class="mb-3">
                                        <strong>Résumé:</strong>
                                        <p class="mt-2">{{ $news->resume }}</p>
                                    </div>
                                    @endif

                                    @if($news->description_sans_html)
                                    <hr>
                                    <div class="mb-3">
                                        <strong>Description (sans HTML):</strong>
                                        <div class="mt-2 p-3 bg-light rounded" style="color: white;">
                                            {!! nl2br(e($news->description_sans_html)) !!}
                                        </div>
                                    </div>
                                    @endif

                                    @if($news->description_riche)
                                    <hr>
                                    <div class="mb-3">
                                        <strong>Description riche (avec HTML):</strong>
                                        <div class="mt-2 p-3 bg-light rounded" style="color: white;">
                                            {!! $news->description_riche !!}
                                        </div>
                                    </div>
                                    @endif

                                    <hr>

                                    <div class="row mb-3">
                                        <div class="col-sm-4"><strong>Date de création:</strong></div>
                                        <div class="col-sm-8">{{ $news->created_at ? $news->created_at->format('d/m/Y H:i') : 'N/A' }}</div>
                                    </div>

                                    <div class="row mb-3">
                                        <div class="col-sm-4"><strong>Dernière modification:</strong></div>
                                        <div class="col-sm-8">{{ $news->updated_at ? $news->updated_at->format('d/m/Y H:i') : 'N/A' }}</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="mt-4">
                        <a href="{{ route('admin.news.index') }}" class="btn btn-secondary">
                            <i class="fas fa-arrow-left me-2"></i>Retour à la liste
                        </a>
                        <a href="{{ route('admin.news.edit', $news->id) }}" class="btn btn-primary">
                            <i class="fas fa-edit me-2"></i>Modifier
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
