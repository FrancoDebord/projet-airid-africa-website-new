@extends('index')

@section('title', 'AIRID -- Conflict Access')

@section('content')
    <section class="py-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <div class="card shadow-sm border-0">
                        <div class="card-body p-4">
                            <h3 class="mb-3">Accès à la déclaration de conflit d’intérêts</h3>
                            <p class="text-muted">Veuillez saisir le code d’accès fourni par AIRID.</p>

                            @if(session('error'))
                                <div class="alert alert-danger">
                                    {{ session('error') }}
                                </div>
                            @endif

                            <form method="post" action="{{ route('conflict.access.submit') }}">
                                @csrf
                                <div class="form-group">
                                    <label for="access_code">Code d’accès</label>
                                    <input type="text" class="form-control" id="access_code" name="access_code" required>
                                </div>

                                <div class="text-right mt-3">
                                    <button type="submit" class="btn btn-primary px-4">Valider</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
