@extends('admin.layout')

@section('content')
    <div class="container-fluid pt-4 px-4">
        <div class="row g-4">
            <div class="col-12 col-lg-8">
                <div class="bg-white rounded h-100 p-4">
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <div>
                            <h6 class="mb-0">Code d'accès au formulaire COI</h6>
                            <p class="text-muted mb-0">Ce code permet d'accéder au formulaire de déclaration de conflit d'intérêts (page publique).</p>
                        </div>
                        <a href="{{ route('admin.conflicts.index') }}" class="btn btn-secondary btn-sm">
                            <i class="fa fa-list me-1"></i>Retour au registre
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
                                @foreach($errors->all() as $err)
                                    <li>{{ $err }}</li>
                                @endforeach
                            </ul>
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        </div>
                    @endif

                    {{-- Afficher ce qui existe --}}
                    <div class="mb-4">
                        <h6 class="mb-2" style="color: black">Informations actuelles</h6>
                        <div class="table-responsive">
                            <table class="table table-bordered table-sm">
                                <thead>
                                    <tr>
                                        <th style="color: black">ID</th>
                                        <th style="color: black">Code d'accès</th>
                                        <th style="color: black">Statut</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($loginConflicts as $lc)
                                        <tr>
                                            <td>{{ $lc->id }}</td>
                                            <td><code>{{ $lc->access_code }}</code></td>
                                            <td>{{ $lc->active ? 'Actif' : 'Inactif' }}</td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="3" class="text-muted text-center">Aucun enregistrement.</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>

                    @if($loginConflicts->isNotEmpty())
                    <h6 class="mb-3" style="color: black">Modifier le code d'accès</h6>
                    <form method="post" action="{{ route('admin.conflicts.access-code.update') }}">
                        @csrf
                        <input type="hidden" name="login_conflict_id" value="{{ $loginConflicts->first()->id }}">
                        <div class="mb-3">
                            <label for="access_code" class="form-label">Nouveau code d'accès <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="access_code" name="access_code" value="{{ old('access_code', $loginConflicts->first()->access_code) }}" required placeholder="Ex: Con-airid-flict@0">
                        </div>
                        <button type="submit" class="btn btn-primary">Enregistrer</button>
                    </form>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
