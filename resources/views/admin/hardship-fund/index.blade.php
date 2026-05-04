@extends('admin.layout')

@section('content')
    <div class="container-fluid pt-4 px-4">
        <div class="row g-4">
            <div class="col-12">
                <div class="bg-white rounded h-100 p-4">
                    <div class="d-flex justify-content-between align-items-center mb-4 flex-wrap gap-2">
                        <h6 class="mb-0">Hardship Fund – Candidatures (AIRID AFRICA–WISE Fund : African Women in Science Empowerment Fund)</h6>
                        <div class="d-flex gap-2">
                            <a href="{{ route('admin.hardship-fund.export.excel') }}" class="btn btn-success btn-sm">
                                <i class="fas fa-file-excel me-1"></i>Exporter Excel
                            </a>
                            <a href="{{ route('admin.hardship-fund.export.pdf') }}" class="btn btn-danger btn-sm">
                                <i class="fas fa-file-pdf me-1"></i>Exporter PDF
                            </a>
                        </div>
                    </div>

                    @if(session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <i class="fas fa-check-circle me-2"></i>{{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        </div>
                    @endif

                    <div class="table-responsive">
                        <table class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>University</th>
                                    <th>Level</th>
                                    <th>Status</th>
                                    <th>Date</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($applications as $app)
                                    <tr>
                                        <td>{{ $app->full_name }}</td>
                                        <td>{{ $app->email }}</td>
                                        <td>{{ Str::limit($app->university, 25) }}</td>
                                        <td>{{ ucfirst($app->level) }}</td>
                                        <td>
                                            @php $badges = ['pending' => 'warning', 'under_review' => 'info', 'approved' => 'success', 'rejected' => 'danger']; @endphp
                                            <span class="badge bg-{{ $badges[$app->status] ?? 'secondary' }}">{{ \App\Models\HardshipFundApplication::statusLabels()[$app->status] ?? $app->status }}</span>
                                        </td>
                                        <td>{{ $app->created_at->format('d/m/Y') }}</td>
                                        <td>
                                            <div class="btn-group btn-group-sm">
                                                <a href="{{ route('admin.hardship-fund.show', $app->id) }}" class="btn btn-info" title="Voir"><i class="fas fa-eye"></i></a>
                                                <a href="{{ route('admin.hardship-fund.edit', $app->id) }}" class="btn btn-warning" title="Modifier"><i class="fas fa-edit"></i></a>
                                                <form action="{{ route('admin.hardship-fund.destroy', $app->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Supprimer cette candidature ?');">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger" title="Supprimer"><i class="fas fa-trash"></i></button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="7" class="text-center py-4 text-muted">Aucune candidature.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    <div class="d-flex justify-content-center mt-3">
                        {{ $applications->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
