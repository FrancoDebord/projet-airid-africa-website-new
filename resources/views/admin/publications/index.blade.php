@extends('admin.layout')

@section('content')
    <div class="container-fluid pt-4 px-4">
        <div class="row g-4">
            <div class="col-12">
                <div class="bg-white rounded h-100 p-4">
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <h6 class="mb-0">Gestion des Publications</h6>
                        <a href="{{ route('admin.publications.create') }}" class="btn btn-primary">
                            <i class="fas fa-plus me-2"></i>Ajouter Publication
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
                                    <th scope="col">Titre</th>
                                    <th scope="col">Auteurs</th>
                                    <th scope="col">Année</th>
                                    <th scope="col">URL</th>
                                    <th scope="col" width="150">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($publications as $publication)
                                    <tr>
                                        <td>{{ \Illuminate\Support\Str::limit($publication->titre_publication, 50) }}</td>
                                        <td>{{ \Illuminate\Support\Str::limit($publication->auteurs, 30) }}</td>
                                        <td>
                                            <span class="badge bg-primary">{{ $publication->annee_publication }}</span>
                                        </td>
                                        <td>
                                            @if($publication->url_publication)
                                                <a href="{{ $publication->url_publication }}" target="_blank" class="btn btn-sm btn-outline-primary">
                                                    <i class="fas fa-external-link-alt"></i>
                                                </a>
                                            @else
                                                <span class="text-muted">N/A</span>
                                            @endif
                                        </td>
                                        <td>
                                            <div class="btn-group btn-group-sm" role="group">
                                                <a href="{{ route('admin.publications.edit', $publication->id) }}" class="btn btn-warning" title="Modifier">
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                                <form action="{{ route('admin.publications.destroy', $publication->id) }}" method="POST" style="display: inline;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cette publication ?')" title="Supprimer">
                                                        <i class="fas fa-trash"></i>
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6" class="text-center py-4">
                                            <i class="fas fa-inbox fa-2x text-muted mb-3"></i>
                                            <p class="text-muted">Aucune publication trouvée.</p>
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    <!-- Pagination améliorée -->
                    @if($publications->hasPages())
                    <div class="d-flex justify-content-between align-items-center mt-4">
                        <div class="text-muted">
                            Affichage de <strong>{{ $publications->firstItem() ?? 0 }}</strong> à <strong>{{ $publications->lastItem() ?? 0 }}</strong> sur <strong>{{ $publications->total() }}</strong> publications
                        </div>
                        
                        <nav aria-label="Navigation des pages">
                            <ul class="pagination pagination-sm mb-0">
                                <!-- Premier -->
                                <li class="page-item {{ $publications->onFirstPage() ? 'disabled' : '' }}">
                                    <a class="page-link" href="{{ $publications->url(1) }}" aria-label="Premier">
                                        <i class="fas fa-angle-double-left"></i>
                                    </a>
                                </li>
                                
                                <!-- Précédent -->
                                <li class="page-item {{ $publications->onFirstPage() ? 'disabled' : '' }}">
                                    <a class="page-link" href="{{ $publications->previousPageUrl() }}" aria-label="Précédent">
                                        <i class="fas fa-angle-left"></i>
                                    </a>
                                </li>

                                <!-- Pages numérotées -->
                                @php
                                    $current = $publications->currentPage();
                                    $last = $publications->lastPage();
                                    $start = max(1, $current - 2);
                                    $end = min($last, $current + 2);
                                @endphp

                                @if($start > 1)
                                    <li class="page-item disabled"><span class="page-link">...</span></li>
                                @endif

                                @for($i = $start; $i <= $end; $i++)
                                    <li class="page-item {{ $i == $current ? 'active' : '' }}">
                                        <a class="page-link" href="{{ $publications->url($i) }}">{{ $i }}</a>
                                    </li>
                                @endfor

                                @if($end < $last)
                                    <li class="page-item disabled"><span class="page-link">...</span></li>
                                @endif

                                <!-- Suivant -->
                                <li class="page-item {{ $publications->hasMorePages() ? '' : 'disabled' }}">
                                    <a class="page-link" href="{{ $publications->nextPageUrl() }}" aria-label="Suivant">
                                        <i class="fas fa-angle-right"></i>
                                    </a>
                                </li>
                                
                                <!-- Dernier -->
                                <li class="page-item {{ $publications->hasMorePages() ? '' : 'disabled' }}">
                                    <a class="page-link" href="{{ $publications->url($last) }}" aria-label="Dernier">
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