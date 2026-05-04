@extends('admin.layout')

@section('content')
    <div class="container-fluid pt-4 px-4">
        <div class="row g-4">
            <div class="col-12">
                <div class="bg-white rounded h-100 p-4">
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <h6 class="mb-0">Pages Philanthropy (contenu /philanthropy)</h6>
                        <a href="{{ route('admin.philanthropy.create') }}" class="btn btn-primary">Ajouter une page</a>
                    </div>
                    @if(session('success'))
                        <div class="alert alert-success alert-dismissible fade show">{{ session('success') }}<button type="button" class="btn-close" data-bs-dismiss="alert"></button></div>
                    @endif
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>Slug</th>
                                    <th>Titre</th>
                                    <th>Statut</th>
                                    <th>Ordre</th>
                                    <th>Date de clôture</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($items as $item)
                                    <tr>
                                        <td><code>{{ $item->slug }}</code></td>
                                        <td>{{ Str::limit($item->title, 50) }}</td>
                                        <td>@if(($item->status ?? 'ongoing') === 'past')<span class="badge bg-secondary">Passé</span>@else<span class="badge bg-success">En cours</span>@endif</td>
                                        <td>{{ $item->sort_order }}</td>
                                        <td>{{ $item->closing_date ? $item->closing_date->format('d/m/Y') : '—' }}</td>
                                        <td>
                                            <a href="{{ route('philanthropyDetail', $item->slug) }}" class="btn btn-sm btn-outline-secondary" target="_blank" title="Voir sur le site"><i class="fas fa-external-link-alt"></i></a>
                                            <a href="{{ route('admin.philanthropy.show', $item->id) }}" class="btn btn-sm btn-info"><i class="fas fa-eye"></i></a>
                                            <a href="{{ route('admin.philanthropy.edit', $item->id) }}" class="btn btn-sm btn-warning"><i class="fas fa-edit"></i></a>
                                            <form action="{{ route('admin.philanthropy.destroy', $item->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Supprimer cette page ?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr><td colspan="6" class="text-center py-4 text-muted">Aucune page. <a href="{{ route('admin.philanthropy.create') }}">Ajouter une page</a> ou exécuter le seeder.</td></tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    {{ $items->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection
