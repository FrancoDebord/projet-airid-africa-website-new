@extends('index')

@section('title', 'AIRID -- Changer le code d\'accès')

@section('content')
    <section class="py-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <div class="card shadow-sm border-0">
                        <div class="card-body p-4">
                            <h3 class="mb-3">Changer le code d'accès</h3>
                            <p class="text-muted">Ce code sert à accéder au formulaire de déclaration de conflit d'intérêts.</p>

                            @if(session('success'))
                                <div class="alert alert-success">
                                    {{ session('success') }}
                                </div>
                            @endif
                            @if(session('error'))
                                <div class="alert alert-danger">
                                    {{ session('error') }}
                                </div>
                            @endif
                            @if($errors->any())
                                <div class="alert alert-danger">
                                    <ul class="mb-0">
                                        @foreach($errors->all() as $err)
                                            <li>{{ $err }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            {{-- Afficher ce qui existe d'abord --}}
                            <div class="alert alert-light border mb-4">
                                <strong>Informations actuelles</strong>
                                <table class="table table-sm table-borderless mb-0 mt-2">
                                    <tr>
                                        <td class="text-muted" style="width: 140px;">Code d'accès :</td>
                                        <td><code>{{ $loginConflict->access_code }}</code></td>
                                    </tr>
                                    <tr>
                                        <td class="text-muted">Statut :</td>
                                        <td>{{ $loginConflict->active ? 'Actif' : 'Inactif' }}</td>
                                    </tr>
                                </table>
                            </div>

                            <form method="post" action="{{ route('conflict.change.access.code.update') }}">
                                @csrf
                                <div class="form-group mb-3">
                                    <label for="current_access_code">Code d'accès actuel <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="current_access_code" name="current_access_code" value="{{ old('current_access_code') }}" required placeholder="Saisir le code actuel pour confirmer">
                                </div>
                                <div class="form-group mb-3">
                                    <label for="access_code">Nouveau code d'accès <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="access_code" name="access_code" value="{{ old('access_code') }}" required placeholder="Nouveau code">
                                </div>
                                <div class="form-group mb-4">
                                    <label for="access_code_confirmation">Confirmer le nouveau code <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="access_code_confirmation" name="access_code_confirmation" required placeholder="Confirmer le nouveau code">
                                </div>
                                <div class="d-flex gap-2">
                                    <button type="submit" class="btn btn-primary px-4">Enregistrer</button>
                                    <a href="{{ route('conflictOfInterest') }}" class="btn btn-secondary">Retour au formulaire</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
