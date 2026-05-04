@extends('admin.layout')

@section('content')
    <div class="container-fluid pt-4 px-4">
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <div class="row g-4">
            <div class="col-12">
                <div class="bg-white rounded d-flex align-items-center justify-content-between p-4">
                    <div class="d-flex align-items-center">
                        <i class="fa fa-clipboard-list fa-3x text-primary me-4"></i>
                        <div>
                            <p class="mb-1 text-muted">Déclarations de conflit d'intérêts (COI)</p>
                            <h4 class="mb-0" style="color: black">{{ $conflictCount }}</h4>
                            <small class="text-muted">Total enregistré(s)</small>
                        </div>
                    </div>
                    <a href="{{ route('admin.conflicts.index') }}" class="btn btn-primary">
                        <i class="fa fa-list me-2"></i>Voir le registre COI
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid pt-4 px-4">
        <div class="bg-white rounded p-4">
            <div class="d-flex align-items-center justify-content-between mb-4">
                <h6 class="mb-0" style="color: black">Déclarations récentes</h6>
                <a href="{{ route('admin.conflicts.index') }}">Voir tout</a>
            </div>
            <div class="table-responsive">
                <table class="table text-start align-middle table-bordered table-hover mb-0">
                    <thead>
                        <tr>
                            <th scope="col" style="color: black">Réf.</th>
                            <th scope="col" style="color: black">Nom</th>
                            <th scope="col" style="color: black">Date déclaration</th>
                            <th scope="col" style="color: black">Statut</th>
                            <th scope="col" style="color: black">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($recentConflicts as $conflict)
                            <tr>
                                <td style="color: black">{{ $conflict->ref_no ?? '—' }}</td>
                                <td style="color: black">{{ $conflict->full_name ?? '—' }}</td>
                                <td style="color: black">{{ $conflict->date_declared ? $conflict->date_declared->format('d/m/Y') : ($conflict->created_at ? $conflict->created_at->format('d/m/Y') : '—') }}</td>
                                <td>
                                    @if(($conflict->status ?? '') === 'Open')
                                        <span class="badge bg-warning text-dark">Open</span>
                                    @elseif(($conflict->status ?? '') === 'Closed')
                                        <span class="badge bg-secondary">Closed</span>
                                    @else
                                        <span class="badge bg-light text-dark">{{ $conflict->status ?? '—' }}</span>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ route('admin.conflicts.show', $conflict) }}" class="btn btn-sm btn-info" title="Voir">Voir</a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center text-muted py-4">Aucune déclaration pour le moment.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
