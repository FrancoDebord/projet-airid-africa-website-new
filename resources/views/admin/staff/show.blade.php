@extends('admin.layout')

@section('content')

    <div class="container-fluid pt-4 px-4">
        <div class="row g-4">
            <div class="col-12">
                <div class="bg-white rounded h-100 p-4">
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <h6 class="mb-0">Détails du membre du staff</h6>
                        <a href="{{ route('admin.staff.edit', $staff->id) }}" class="btn btn-primary">
                            <i class="fas fa-edit me-2"></i>Modifier
                        </a>
                    </div>

                    <div class="row">
                        <!-- Photo -->
                        <div class="col-md-4 mb-4">
                            @if($staff->photo_personnel)
                                @php
                                    $photoName = basename($staff->photo_personnel);
                                    $photoPath = null;
                                    
                                    if (file_exists(public_path('assets/staff/' . $photoName))) {
                                        $photoPath = asset('assets/staff/' . $photoName);
                                    } elseif (file_exists(public_path('storage/assets/staff/' . $photoName))) {
                                        $photoPath = asset('storage/assets/staff/' . $photoName);
                                    } else {
                                        $photoPath = asset('storage/assets/staff/' . $photoName);
                                    }
                                @endphp
                                <img src="{{ $photoPath }}" alt="Photo" class="img-fluid rounded shadow" onerror="this.onerror=null; this.src='{{ asset('img/default-avatar.png') }}';">
                            @else
                                <div class="bg-light rounded d-flex align-items-center justify-content-center" style="height: 300px;">
                                    <i class="fas fa-user fa-5x text-muted"></i>
                                </div>
                            @endif
                        </div>

                        <!-- Informations -->
                        <div class="col-md-8">
                            <div class="card border-0 shadow-sm">
                                <div class="card-body">
                                    <h5 class="card-title mb-4">Informations personnelles</h5>
                                    
                                    <div class="row mb-3">
                                        <div class="col-sm-4"><strong>Titre:</strong></div>
                                        <div class="col-sm-8">{{ $staff->titre ?? 'N/A' }}</div>
                                    </div>

                                    <div class="row mb-3">
                                        <div class="col-sm-4"><strong>Prénom:</strong></div>
                                        <div class="col-sm-8">{{ $staff->prenom_personnel }}</div>
                                    </div>

                                    <div class="row mb-3">
                                        <div class="col-sm-4"><strong>Nom:</strong></div>
                                        <div class="col-sm-8">{{ $staff->nom_personnel }}</div>
                                    </div>

                                    <div class="row mb-3">
                                        <div class="col-sm-4"><strong>Email:</strong></div>
                                        <div class="col-sm-8">
                                            @if($staff->email_personnel)
                                                <a href="mailto:{{ $staff->email_personnel }}">{{ $staff->email_personnel }}</a>
                                            @else
                                                <span class="text-muted">Non défini</span>
                                            @endif
                                        </div>
                                    </div>

                                    <hr>

                                    <h5 class="card-title mb-4 mt-4">Informations professionnelles</h5>

                                    <div class="row mb-3">
                                        <div class="col-sm-4"><strong>Département:</strong></div>
                                        <div class="col-sm-8">
                                            {{ $staff->departement->nom_departement ?? 'N/A' }}
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <div class="col-sm-4"><strong>Poste:</strong></div>
                                        <div class="col-sm-8">
                                            {{ $staff->posteOccupe->intitule_poste ?? 'N/A' }}
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <div class="col-sm-4"><strong>Niveau Poste:</strong></div>
                                        <div class="col-sm-8">{{ $staff->niveau_poste }}</div>
                                    </div>

                                    <div class="row mb-3">
                                        <div class="col-sm-4"><strong>Poids Personnel:</strong></div>
                                        <div class="col-sm-8">{{ $staff->poids_personnel }}</div>
                                    </div>

                                    <hr>

                                    <h5 class="card-title mb-4 mt-4">Informations de connexion</h5>

                                    <div class="row mb-3">
                                        <div class="col-sm-4"><strong>Mot de passe:</strong></div>
                                        <div class="col-sm-8">
                                            <div class="input-group">
                                                <input type="text" class="form-control" id="password-display" value="{{ $password }}" readonly>
                                                <button class="btn btn-outline-secondary" type="button" onclick="copyPassword()" title="Copier le mot de passe">
                                                    <i class="fas fa-copy"></i>
                                                </button>
                                            </div>
                                            <small class="text-muted">Format: Airid{prenom}{année}</small>
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <div class="col-sm-4"><strong>Date de création:</strong></div>
                                        <div class="col-sm-8">{{ $staff->created_at ? $staff->created_at->format('d/m/Y H:i') : 'N/A' }}</div>
                                    </div>

                                    <div class="row mb-3">
                                        <div class="col-sm-4"><strong>Dernière modification:</strong></div>
                                        <div class="col-sm-8">{{ $staff->updated_at ? $staff->updated_at->format('d/m/Y H:i') : 'N/A' }}</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="mt-4">
                        <a href="{{ route('admin.staff.index') }}" class="btn btn-secondary">
                            <i class="fas fa-arrow-left me-2"></i>Retour à la liste
                        </a>
                        <a href="{{ route('admin.staff.edit', $staff->id) }}" class="btn btn-primary">
                            <i class="fas fa-edit me-2"></i>Modifier
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function copyPassword() {
            const passwordInput = document.getElementById('password-display');
            passwordInput.select();
            passwordInput.setSelectionRange(0, 99999); // Pour les appareils mobiles
            document.execCommand('copy');
            
            // Afficher une notification
            const btn = event.target.closest('button');
            const originalHTML = btn.innerHTML;
            btn.innerHTML = '<i class="fas fa-check"></i>';
            btn.classList.add('btn-success');
            btn.classList.remove('btn-outline-secondary');
            
            setTimeout(() => {
                btn.innerHTML = originalHTML;
                btn.classList.remove('btn-success');
                btn.classList.add('btn-outline-secondary');
            }, 2000);
        }
    </script>

@endsection

