@extends('admin.layout')

@section('content')
    <div class="container-fluid pt-4 px-4">
        <div class="row g-4">
            <div class="col-12">
                <div class="bg-white rounded h-100 p-4">
                    <!-- En-tête avec titre et bouton -->
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <div>
                            <h6 class="mb-0">Gestion des Partenaires</h6>
                            <p class="text-muted mb-0">Gérez les partenaires de votre organisation</p>
                        </div>
                        <a href="{{ route('admin.partners.create') }}" class="btn btn-primary">
                            <i class="fas fa-handshake me-2"></i>Ajouter Partenaire
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
                                    <th scope="col" width="100">Logo</th>
                                    <th scope="col">Nom</th>
                                    <th scope="col">Type</th>
                                    <th scope="col">Site Web</th>
                                    <th scope="col" width="150">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($partners as $partner)
                                    <tr>
                                        <td class="text-center">
                                            @if($partner->logo_partenaire)
                                                <img src="{{ asset('storage/assets/logo/' . $partner->logo_partenaire) }}"
                                                     alt="Logo {{ $partner->nom_partenaire }}"
                                                     width="60" 
                                                     height="60" 
                                                     class="rounded object-fit-cover border"
                                                     onerror="this.onerror=null; this.style.display='none'; this.nextElementSibling.style.display='flex';">
                                            @else
                                                <div class="bg-light rounded d-inline-flex align-items-center justify-content-center" 
                                                     style="width: 60px; height: 60px;">
                                                    <i class="fas fa-building text-muted"></i>
                                                </div>
                                            @endif
                                        </td>
                                        <td>
                                            <strong>{{ $partner->nom_partenaire }}</strong>
                                            @if($partner->nom_long_partenaire)
                                                <br><small class="text-muted">{{ Str::limit($partner->nom_long_partenaire, 50) }}</small>
                                            @endif
                                        </td>
                                        <td>
                                            @php
                                                $typeMapping = [
                                                    'accreditation_partner' => ['label' => 'Accreditation Body', 'class' => 'badge-accreditation'],
                                                    'Work partner' => ['label' => 'Research Partners', 'class' => 'bg-warning text-dark'],
                                                    'funding_partner' => ['label' => 'Funding Partners', 'class' => 'bg-success'],
                                                    'industry_partner' => ['label' => 'Industry Partners', 'class' => 'bg-info text-dark'],
                                                ];
                                                $typeInfo = $typeMapping[$partner->type_partenaire ?? 'industry_partner'] ?? ['label' => 'Autre', 'class' => 'bg-secondary'];
                                            @endphp
                                            <span class="badge {{ $typeInfo['class'] }}">
                                                {{ $typeInfo['label'] }}
                                            </span>
                                        </td>
                                        <td>
                                            @if($partner->site_web)
                                                <a href="{{ $partner->site_web }}" target="_blank" rel="noopener noreferrer" class="text-primary">
                                                    <i class="fas fa-globe me-1"></i>Visiter
                                                </a>
                                            @else
                                                <span class="text-muted">-</span>
                                            @endif
                                        </td>
                                        <td>
                                            <div class="btn-group btn-group-sm" role="group">
                                                <a href="{{ route('admin.partners.edit', $partner->id) }}" 
                                                   class="btn btn-warning" 
                                                   title="Modifier"
                                                   data-bs-toggle="tooltip">
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                                <form action="{{ route('admin.partners.destroy', $partner->id) }}" 
                                                      method="POST" 
                                                      class="d-inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" 
                                                            class="btn btn-danger" 
                                                            onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce partenaire ?')"
                                                            title="Supprimer"
                                                            data-bs-toggle="tooltip">
                                                        <i class="fas fa-trash"></i>
                                                    </button>
                                                </form>
                                                <a href="{{ route('admin.partners.show', $partner->id) }}" 
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
                                        <td colspan="5" class="text-center py-5">
                                            <div class="empty-state">
                                                <i class="fas fa-handshake fa-3x text-muted mb-3"></i>
                                                <h5 class="text-muted">Aucun partenaire trouvé</h5>
                                                <p class="text-muted mb-3">Commencez par ajouter un nouveau partenaire</p>
                                                <a href="{{ route('admin.partners.create') }}" class="btn btn-primary">
                                                    <i class="fas fa-handshake me-2"></i>Ajouter le premier partenaire
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    <!-- Pagination -->
                    @if($partners->hasPages())
                    <div class="d-flex justify-content-between align-items-center mt-4 flex-wrap">
                        <div class="text-muted mb-2 mb-md-0">
                            Affichage de <strong>{{ $partners->firstItem() ?? 0 }}</strong> à <strong>{{ $partners->lastItem() ?? 0 }}</strong> 
                            sur <strong>{{ $partners->total() }}</strong> partenaire(s)
                        </div>
                        
                        <nav aria-label="Navigation des partenaires">
                            <ul class="pagination pagination-sm mb-0">
                                <li class="page-item {{ $partners->onFirstPage() ? 'disabled' : '' }}">
                                    <a class="page-link" href="{{ $partners->url(1) }}" aria-label="Première page">
                                        <i class="fas fa-angle-double-left"></i>
                                    </a>
                                </li>
                                
                                <li class="page-item {{ $partners->onFirstPage() ? 'disabled' : '' }}">
                                    <a class="page-link" href="{{ $partners->previousPageUrl() }}" aria-label="Page précédente">
                                        <i class="fas fa-angle-left"></i>
                                    </a>
                                </li>

                                @php
                                    $current = $partners->currentPage();
                                    $last = $partners->lastPage();
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
                                        <a class="page-link" href="{{ $partners->url($i) }}">{{ $i }}</a>
                                    </li>
                                @endfor

                                @if($end < $last)
                                    <li class="page-item disabled">
                                        <span class="page-link">...</span>
                                    </li>
                                @endif

                                <li class="page-item {{ $partners->hasMorePages() ? '' : 'disabled' }}">
                                    <a class="page-link" href="{{ $partners->nextPageUrl() }}" aria-label="Page suivante">
                                        <i class="fas fa-angle-right"></i>
                                    </a>
                                </li>
                                
                                <li class="page-item {{ $partners->hasMorePages() ? '' : 'disabled' }}">
                                    <a class="page-link" href="{{ $partners->url($last) }}" aria-label="Dernière page">
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

.badge-accreditation {
    background-color: #e7d5ff !important;
    color: #6f42c1 !important;
    font-weight: 600;
    border: 1px solid #9b59b6;
}
</style>
@endpush

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
    var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
        return new bootstrap.Tooltip(tooltipTriggerEl)
    });
});
</script>
@endpush
