@extends('admin.layout')

@section('content')
    <div class="container-fluid pt-4 px-4">
        <div class="row g-4">
            <div class="col-12">
                <div class="bg-white rounded h-100 p-4">
                    <!-- En-tête avec titre et bouton -->
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <div>
                            <h6 class="mb-0">Gestion du Staff</h6>
                            <p class="text-muted mb-0">Gérez les membres de votre équipe</p>
                        </div>
                        <a href="{{ route('admin.staff.create') }}" class="btn btn-primary">
                            <i class="fas fa-user-plus me-2"></i>Ajouter Staff
                        </a>
                    </div>

                    <!-- Alertes -->
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

                    <!-- Tableau -->
                    <div class="table-responsive">
                        <table class="table table-striped table-hover table-bordered">
                            <thead class="table-dark">
                                <tr>
                                    <th scope="col">Nom</th>
                                    <th scope="col">Prénom</th>
                                    <th scope="col">Poste</th>
                                    <th scope="col">Département</th>
                                    <th scope="col" width="80">Photo</th>
                                    <th scope="col" width="150">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($staff as $member)
                                    <tr>
                                        
                                        <td>
                                            <strong>{{ $member->nom_personnel }}</strong>
                                        </td>
                                        <td>{{ $member->prenom_personnel }}</td>
                                        <td>
                                            @if($member->posteOccupe)
                                                <span class="badge bg-info text-dark">
                                                    {{ $member->posteOccupe->intitule_poste }}
                                                </span>
                                            @else
                                                <span class="badge bg-secondary">N/A</span>
                                            @endif
                                        </td>
                                        <td>
                                            @if($member->departement)
                                                <span class="badge bg-light text-dark border">
                                                    {{ $member->departement->nom_departement }}
                                                </span>
                                            @else
                                                <span class="badge bg-secondary">N/A</span>
                                            @endif
                                        </td>
                                        <td class="text-center">
                                            @if($member->photo_personnel)
                                                @php
                                                    // Normaliser le nom du fichier (extraire juste le nom si c'est un chemin)
                                                    $photoName = basename($member->photo_personnel);
                                                    
                                                    // Vérifier plusieurs emplacements possibles dans l'ordre de priorité
                                                    $photoPath = null;
                                                    
                                                    // 1. Nouveau système : public/assets/staff/
                                                    if (file_exists(public_path('assets/staff/' . $photoName))) {
                                                        $photoPath = asset('assets/staff/' . $photoName);
                                                    }
                                                    // 2. Ancien système via symlink : public/storage/assets/staff/
                                                    elseif (file_exists(public_path('storage/assets/staff/' . $photoName))) {
                                                        $photoPath = asset('storage/assets/staff/' . $photoName);
                                                    }
                                                    // 3. Par défaut, essayer avec storage/assets/staff (compatibilité ancien système)
                                                    else {
                                                        $photoPath = asset('storage/assets/staff/' . $photoName);
                                                    }
                                                @endphp
                                                <img src="{{ $photoPath }}"
                                                     alt="Photo de {{ $member->nom_personnel ?? 'membre' }}"
                                                     width="45" 
                                                     height="45" 
                                                     class="rounded-circle object-fit-cover border"
                                                     onerror="this.onerror=null; this.style.display='none'; this.nextElementSibling.style.display='flex';">
                                                
                                            @else
                                                <div class="bg-light rounded-circle d-inline-flex align-items-center justify-content-center" 
                                                     style="width: 45px; height: 45px;">
                                                    <i class="fas fa-user text-muted"></i>
                                                </div>
                                            @endif
                                        </td>
                                        <td>
                                            <div class="btn-group btn-group-sm" role="group">
                                                <a href="{{ route('admin.staff.edit', $member->id) }}" 
                                                   class="btn btn-warning" 
                                                   title="Modifier"
                                                   data-bs-toggle="tooltip">
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                                <form action="{{ route('admin.staff.destroy', $member->id) }}" 
                                                      method="POST" 
                                                      class="d-inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" 
                                                            class="btn btn-danger" 
                                                            onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce membre ?')"
                                                            title="Supprimer"
                                                            data-bs-toggle="tooltip">
                                                        <i class="fas fa-trash"></i>
                                                    </button>
                                                </form>
                                                <a href="{{ route('admin.staff.show', $member->id) }}" 
                                                   class="btn btn-info" 
                                                   title="Voir détails"
                                                   data-bs-toggle="tooltip">
                                                    <i class="fas fa-eye"></i>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="7" class="text-center py-5">
                                            <div class="empty-state">
                                                <i class="fas fa-users fa-3x text-muted mb-3"></i>
                                                <h5 class="text-muted">Aucun membre du staff trouvé</h5>
                                                <p class="text-muted mb-3">Commencez par ajouter un nouveau membre à votre équipe</p>
                                                <a href="{{ route('admin.staff.create') }}" class="btn btn-primary">
                                                    <i class="fas fa-user-plus me-2"></i>Ajouter le premier membre
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    <!-- Pagination améliorée -->
                    @if($staff->hasPages())
                    <div class="d-flex justify-content-between align-items-center mt-4 flex-wrap">
                        <!-- Informations sur les résultats -->
                        <div class="text-muted mb-2 mb-md-0">
                            Affichage de <strong>{{ $staff->firstItem() ?? 0 }}</strong> à <strong>{{ $staff->lastItem() ?? 0 }}</strong> 
                            sur <strong>{{ $staff->total() }}</strong> membre(s)
                        </div>
                        
                        <!-- Navigation des pages -->
                        <nav aria-label="Navigation du staff">
                            <ul class="pagination pagination-sm mb-0">
                                <!-- Premier page -->
                                <li class="page-item {{ $staff->onFirstPage() ? 'disabled' : '' }}">
                                    <a class="page-link" href="{{ $staff->url(1) }}" aria-label="Première page">
                                        <i class="fas fa-angle-double-left"></i>
                                    </a>
                                </li>
                                
                                <!-- Page précédente -->
                                <li class="page-item {{ $staff->onFirstPage() ? 'disabled' : '' }}">
                                    <a class="page-link" href="{{ $staff->previousPageUrl() }}" aria-label="Page précédente">
                                        <i class="fas fa-angle-left"></i>
                                    </a>
                                </li>

                                <!-- Pages numérotées avec ellipsis -->
                                @php
                                    $current = $staff->currentPage();
                                    $last = $staff->lastPage();
                                    $start = max(1, $current - 2);
                                    $end = min($last, $current + 2);
                                @endphp

                                @if($start > 1)
                                    <li class="page-item disabled">
                                        <span class="page-link">...</span>
                                    </li>
                                @endif

                                @for($i = $start; $i <= $end; $i++)
                                    <li class="page-item {{ $i == $current ? 'active' : '' }}">
                                        <a class="page-link" href="{{ $staff->url($i) }}">{{ $i }}</a>
                                    </li>
                                @endfor

                                @if($end < $last)
                                    <li class="page-item disabled">
                                        <span class="page-link">...</span>
                                    </li>
                                @endif

                                <!-- Page suivante -->
                                <li class="page-item {{ $staff->hasMorePages() ? '' : 'disabled' }}">
                                    <a class="page-link" href="{{ $staff->nextPageUrl() }}" aria-label="Page suivante">
                                        <i class="fas fa-angle-right"></i>
                                    </a>
                                </li>
                                
                                <!-- Dernière page -->
                                <li class="page-item {{ $staff->hasMorePages() ? '' : 'disabled' }}">
                                    <a class="page-link" href="{{ $staff->url($last) }}" aria-label="Dernière page">
                                        <i class="fas fa-angle-double-right"></i>
                                    </a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                    @endif

                    <!-- Sélecteur d'éléments par page (Optionnel) -->
                    @if($staff->total() > 10)
                    <div class="row mt-3">
                        <div class="col-md-6">
                            <form method="GET" class="d-flex align-items-center">
                                <label for="perPage" class="form-label me-2 mb-0 text-muted">Afficher :</label>
                                <select name="perPage" id="perPage" class="form-select form-select-sm" style="width: auto;" onchange="this.form.submit()">
                                    <option value="5" {{ request('perPage', 10) == 5 ? 'selected' : '' }}>5</option>
                                    <option value="10" {{ request('perPage', 10) == 10 ? 'selected' : '' }}>10</option>
                                    <option value="25" {{ request('perPage', 10) == 25 ? 'selected' : '' }}>25</option>
                                    <option value="50" {{ request('perPage', 10) == 50 ? 'selected' : '' }}>50</option>
                                </select>
                                <span class="ms-2 text-muted">membres par page</span>
                            </form>
                        </div>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection

@push('styles')
<style>
.empty-state {
    padding: 2rem 0;
}

.table > :not(caption) > * > * {
    padding: 0.75rem 0.5rem;
}

.pagination .page-item.active .page-link {
    background-color: #0d6efd;
    border-color: #0d6efd;
    color: white;
}

.pagination .page-link {
    color: #6c757d;
    border: 1px solid #dee2e6;
    margin: 0 2px;
    border-radius: 4px;
}

.pagination .page-link:hover {
    color: #0d6efd;
    background-color: #e9ecef;
    border-color: #dee2e6;
}

.object-fit-cover {
    object-fit: cover;
}

.badge {
    font-size: 0.75em;
}

.btn-group .btn {
    border-radius: 4px !important;
    margin: 0 1px;
}
</style>
@endpush

@push('scripts')
<script>
// Activation des tooltips Bootstrap
document.addEventListener('DOMContentLoaded', function() {
    var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
    var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
        return new bootstrap.Tooltip(tooltipTriggerEl)
    });
});
</script>
@endpush