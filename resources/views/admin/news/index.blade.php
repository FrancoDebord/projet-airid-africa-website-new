@extends('admin.layout')

@section('content')
    <div class="container-fluid pt-4 px-4">
        <div class="row g-4">
            <div class="col-12">
                <div class="bg-white rounded h-100 p-4">
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <h6 class="mb-0">Gestion des News & Blog</h6>
                        <a href="{{ route('admin.news.create') }}" class="btn btn-primary">
                            <i class="fas fa-plus me-2"></i>Ajouter News
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
                                    <th scope="col">Résumé</th>
                                    <th scope="col">Photo</th>
                                    <th scope="col">Date de création</th>
                                    <th scope="col" width="150">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($news as $item)
                                    <tr>
                                        <td>{{ \Illuminate\Support\Str::limit($item->titre_news ?? 'Sans titre', 50) }}</td>
                                        <td>{{ \Illuminate\Support\Str::limit(strip_tags($item->resume ?? ''), 60) }}</td>
                                        <td>
                                            @if($item->photo_couverture)
                                                @php
                                                    $photoName = basename($item->photo_couverture);
                                                    $photoPath = file_exists(public_path('assets/news/' . $photoName)) ? asset('assets/news/' . $photoName) : asset('storage/assets/news/' . $photoName);
                                                @endphp
                                                <img src="{{ $photoPath }}" alt="Photo" style="width: 60px; height: 60px; object-fit: cover; border-radius: 5px;" onerror="this.onerror=null; this.style.display='none'; this.nextElementSibling.style.display='inline';">
                                                <span class="text-muted" style="display: none;">Image non trouvée</span>
                                            @else
                                                <span class="text-muted">Aucune photo</span>
                                            @endif
                                        </td>
                                        <td>
                                            <span class="badge bg-info">{{ $item->created_at ? $item->created_at->format('d/m/Y') : 'N/A' }}</span>
                                        </td>
                                        <td>
                                            <div class="btn-group btn-group-sm" role="group">
                                                <a href="{{ route('admin.news.show', $item->id) }}" class="btn btn-info" title="Voir détails">
                                                    <i class="fas fa-eye"></i>
                                                </a>
                                                <a href="{{ route('admin.news.edit', $item->id) }}" class="btn btn-warning" title="Modifier">
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                                <form action="{{ route('admin.news.destroy', $item->id) }}" method="POST" style="display: inline;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cette news ?')" title="Supprimer">
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
                                            <p class="text-muted">Aucune news trouvée.</p>
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    <!-- Pagination -->
                    @if($news->hasPages())
                    <div class="d-flex justify-content-between align-items-center mt-4">
                        <div class="text-muted">
                            Affichage de <strong>{{ $news->firstItem() ?? 0 }}</strong> à <strong>{{ $news->lastItem() ?? 0 }}</strong> sur <strong>{{ $news->total() }}</strong> news
                        </div>
                        
                        <nav aria-label="Navigation des pages">
                            <ul class="pagination pagination-sm mb-0">
                                <!-- Premier -->
                                <li class="page-item {{ $news->onFirstPage() ? 'disabled' : '' }}">
                                    <a class="page-link" href="{{ $news->url(1) }}" aria-label="Premier">
                                        <i class="fas fa-angle-double-left"></i>
                                    </a>
                                </li>
                                
                                <!-- Précédent -->
                                <li class="page-item {{ $news->onFirstPage() ? 'disabled' : '' }}">
                                    <a class="page-link" href="{{ $news->previousPageUrl() }}" aria-label="Précédent">
                                        <i class="fas fa-angle-left"></i>
                                    </a>
                                </li>

                                <!-- Pages numérotées -->
                                @php
                                    $current = $news->currentPage();
                                    $last = $news->lastPage();
                                    $start = max(1, $current - 2);
                                    $end = min($last, $current + 2);
                                @endphp

                                @if($start > 1)
                                    <li class="page-item disabled"><span class="page-link">...</span></li>
                                @endif

                                @for($i = $start; $i <= $end; $i++)
                                    <li class="page-item {{ $i == $current ? 'active' : '' }}">
                                        <a class="page-link" href="{{ $news->url($i) }}">{{ $i }}</a>
                                    </li>
                                @endfor

                                @if($end < $last)
                                    <li class="page-item disabled"><span class="page-link">...</span></li>
                                @endif

                                <!-- Suivant -->
                                <li class="page-item {{ $news->hasMorePages() ? '' : 'disabled' }}">
                                    <a class="page-link" href="{{ $news->nextPageUrl() }}" aria-label="Suivant">
                                        <i class="fas fa-angle-right"></i>
                                    </a>
                                </li>
                                
                                <!-- Dernier -->
                                <li class="page-item {{ $news->hasMorePages() ? '' : 'disabled' }}">
                                    <a class="page-link" href="{{ $news->url($last) }}" aria-label="Dernier">
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
