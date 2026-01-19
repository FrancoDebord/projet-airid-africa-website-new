@extends('admin.layout')

@section('content')

    <div class="container-fluid pt-4 px-4">
        <div class="row g-4">
            <div class="col-12">
                <div class="bg-white rounded h-100 p-4">
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <h6 class="mb-0">Détails du projet</h6>
                        <a href="{{ route('admin.projects.edit', $project->id) }}" class="btn btn-primary">
                            <i class="fas fa-edit me-2"></i>Modifier
                        </a>
                    </div>

                    <div class="row">
                        <!-- Photo de couverture -->
                        <div class="col-md-4 mb-4">
                            @if($project->photo_couverture)
                                @php
                                    $photoName = basename($project->photo_couverture);
                                    $photoPath = null;
                                    
                                    if (file_exists(public_path('storage/assets/projects/' . $photoName))) {
                                        $photoPath = asset('storage/assets/projects/' . $photoName);
                                    } else {
                                        $photoPath = asset('storage/assets/projects/' . $photoName);
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
                                    <h5 class="card-title mb-4">Informations du projet</h5>
                                    
                                    <div class="row mb-3">
                                        <div class="col-sm-4"><strong>Titre court:</strong></div>
                                        <div class="col-sm-8">{{ $project->short_title_project }}</div>
                                    </div>

                                    <div class="row mb-3">
                                        <div class="col-sm-4"><strong>Titre long:</strong></div>
                                        <div class="col-sm-8">{{ $project->long_title_project }}</div>
                                    </div>

                                    <div class="row mb-3">
                                        <div class="col-sm-4"><strong>Catégorie:</strong></div>
                                        <div class="col-sm-8">
                                            @if($project->category)
                                                <span class="badge bg-info">{{ $project->category->nom_categorie ?? 'N/A' }}</span>
                                            @else
                                                <span class="text-muted">Non définie</span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <div class="col-sm-4"><strong>État:</strong></div>
                                        <div class="col-sm-8">
                                            @if($project->etat_projet == 'ongoing')
                                                <span class="badge bg-success">En cours</span>
                                            @elseif($project->etat_projet == 'ended')
                                                <span class="badge bg-primary">Terminé</span>
                                            @else
                                                <span class="badge bg-danger">Abandonné</span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <div class="col-sm-4"><strong>Date de début:</strong></div>
                                        <div class="col-sm-8">
                                            @if($project->date_debut_project)
                                                {{ date('d/m/Y', strtotime($project->date_debut_project)) }}
                                            @else
                                                <span class="text-muted">Non définie</span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <div class="col-sm-4"><strong>Date de fin:</strong></div>
                                        <div class="col-sm-8">
                                            @if($project->date_fin_project)
                                                {{ date('d/m/Y', strtotime($project->date_fin_project)) }}
                                            @else
                                                <span class="text-muted">Non définie</span>
                                            @endif
                                        </div>
                                    </div>

                                    @if($project->sponsor)
                                    <div class="row mb-3">
                                        <div class="col-sm-4"><strong>Sponsor:</strong></div>
                                        <div class="col-sm-8">{{ $project->sponsor->nom_partenaire }}</div>
                                    </div>
                                    @endif

                                    @if($project->studyDirector)
                                    <div class="row mb-3">
                                        <div class="col-sm-4"><strong>Directeur d'étude:</strong></div>
                                        <div class="col-sm-8">{{ $project->studyDirector->prenom_personnel }} {{ $project->studyDirector->nom_personnel }}</div>
                                    </div>
                                    @endif

                                    @if($project->projectManager)
                                    <div class="row mb-3">
                                        <div class="col-sm-4"><strong>Chef de projet:</strong></div>
                                        <div class="col-sm-8">{{ $project->projectManager->prenom_personnel }} {{ $project->projectManager->nom_personnel }}</div>
                                    </div>
                                    @endif

                                    @if($project->resume)
                                    <hr>
                                    <div class="mb-3">
                                        <strong>Résumé:</strong>
                                        <p class="mt-2">{{ $project->resume }}</p>
                                    </div>
                                    @endif

                                    @if($project->description_sans_html)
                                    <hr>
                                    <div class="mb-3">
                                        <strong>Description:</strong>
                                        <p class="mt-2">{{ $project->description_sans_html }}</p>
                                    </div>
                                    @endif

                                    @if($project->description_riche)
                                    <hr>
                                    <div class="mb-3">
                                        <strong>Description riche:</strong>
                                        <div class="mt-2">{!! $project->description_riche !!}</div>
                                    </div>
                                    @endif

                                    <hr>

                                    <div class="row mb-3">
                                        <div class="col-sm-4"><strong>Date de création:</strong></div>
                                        <div class="col-sm-8">{{ $project->created_at ? $project->created_at->format('d/m/Y H:i') : 'N/A' }}</div>
                                    </div>

                                    <div class="row mb-3">
                                        <div class="col-sm-4"><strong>Dernière modification:</strong></div>
                                        <div class="col-sm-8">{{ $project->updated_at ? $project->updated_at->format('d/m/Y H:i') : 'N/A' }}</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="mt-4">
                        <a href="{{ route('admin.projects.index') }}" class="btn btn-secondary">
                            <i class="fas fa-arrow-left me-2"></i>Retour à la liste
                        </a>
                        <a href="{{ route('admin.projects.edit', $project->id) }}" class="btn btn-primary">
                            <i class="fas fa-edit me-2"></i>Modifier
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
