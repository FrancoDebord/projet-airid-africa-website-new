@extends('admin.layout')

@section('content')
    <div class="container-fluid pt-4 px-4">
        <div class="row g-4">
            <div class="col-12">
                <div class="bg-white rounded h-100 p-4">
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <h6 class="mb-0">Gestion des Projets</h6>
                        <a href="{{ route('admin.projects.create') }}" class="btn btn-primary">
                            <i class="fas fa-plus me-2"></i>Ajouter Projet
                        </a>
                    </div>

                    @if(session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <i class="fas fa-check-circle me-2"></i>{{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        </div>
                    @endif

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

                    <div class="table-responsive">
                        <table class="table table-striped table-hover table-bordered">
                            <thead class="table-dark">
                                <tr>
                                    <th scope="col">Titre Court</th>
                                    <th scope="col">Catégorie</th>
                                    <th scope="col">Date Début</th>
                                    <th scope="col">État</th>
                                    <th scope="col" width="150">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($projects as $project)
                                    <tr>
                                        <td>{{ \Illuminate\Support\Str::limit($project->short_title_project, 50) }}</td>
                                        <td>
                                            @if($project->category)
                                                <span class="badge bg-info">{{ $project->category->nom_categorie ?? 'N/A' }}</span>
                                            @else
                                                <span class="text-muted">N/A</span>
                                            @endif
                                        </td>
                                        <td>
                                            @if($project->date_debut_project)
                                                {{ date('d/m/Y', strtotime($project->date_debut_project)) }}
                                            @else
                                                <span class="text-muted">N/A</span>
                                            @endif
                                        </td>
                                        <td>
                                            @if($project->etat_projet == 'ongoing')
                                                <span class="badge bg-success">En cours</span>
                                            @elseif($project->etat_projet == 'ended')
                                                <span class="badge bg-primary">Terminé</span>
                                            @else
                                                <span class="badge bg-danger">Abandonné</span>
                                            @endif
                                        </td>
                                        <td>
                                            <div class="btn-group btn-group-sm" role="group">
                                                <a href="{{ route('admin.projects.show', $project->id) }}" class="btn btn-info" title="Voir détails">
                                                    <i class="fas fa-eye"></i>
                                                </a>
                                                <a href="{{ route('admin.projects.edit', $project->id) }}" class="btn btn-warning" title="Modifier">
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                                <form action="{{ route('admin.projects.destroy', $project->id) }}" method="POST" style="display: inline;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce projet ?')" title="Supprimer">
                                                        <i class="fas fa-trash"></i>
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5" class="text-center py-4">
                                            <i class="fas fa-inbox fa-2x text-muted mb-3"></i>
                                            <p class="text-muted">Aucun projet trouvé.</p>
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    <!-- Pagination améliorée -->
                    @if($projects->hasPages())
                    <div class="d-flex justify-content-between align-items-center mt-4">
                        <div class="text-muted">
                            Affichage de <strong>{{ $projects->firstItem() ?? 0 }}</strong> à <strong>{{ $projects->lastItem() ?? 0 }}</strong> sur <strong>{{ $projects->total() }}</strong> projets
                        </div>
                        
                        <nav aria-label="Navigation des pages">
                            <ul class="pagination pagination-sm mb-0">
                                <!-- Premier -->
                                <li class="page-item {{ $projects->onFirstPage() ? 'disabled' : '' }}">
                                    <a class="page-link" href="{{ $projects->url(1) }}" aria-label="Premier">
                                        <i class="fas fa-angle-double-left"></i>
                                    </a>
                                </li>
                                
                                <!-- Précédent -->
                                <li class="page-item {{ $projects->onFirstPage() ? 'disabled' : '' }}">
                                    <a class="page-link" href="{{ $projects->previousPageUrl() }}" aria-label="Précédent">
                                        <i class="fas fa-angle-left"></i>
                                    </a>
                                </li>

                                <!-- Pages numérotées -->
                                @php
                                    $current = $projects->currentPage();
                                    $last = $projects->lastPage();
                                    $start = max(1, $current - 2);
                                    $end = min($last, $current + 2);
                                @endphp

                                @if($start > 1)
                                    <li class="page-item disabled"><span class="page-link">...</span></li>
                                @endif

                                @for($i = $start; $i <= $end; $i++)
                                    <li class="page-item {{ $i == $current ? 'active' : '' }}">
                                        <a class="page-link" href="{{ $projects->url($i) }}">{{ $i }}</a>
                                    </li>
                                @endfor

                                @if($end < $last)
                                    <li class="page-item disabled"><span class="page-link">...</span></li>
                                @endif

                                <!-- Suivant -->
                                <li class="page-item {{ $projects->hasMorePages() ? '' : 'disabled' }}">
                                    <a class="page-link" href="{{ $projects->nextPageUrl() }}" aria-label="Suivant">
                                        <i class="fas fa-angle-right"></i>
                                    </a>
                                </li>
                                
                                <!-- Dernier -->
                                <li class="page-item {{ $projects->hasMorePages() ? '' : 'disabled' }}">
                                    <a class="page-link" href="{{ $projects->url($last) }}" aria-label="Dernier">
                                        <i class="fas fa-angle-double-right"></i>
                                    </a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
