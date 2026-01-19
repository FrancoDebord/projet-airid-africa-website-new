@extends('admin.layout')

@section('content')

    <div class="container-fluid pt-4 px-4">
        <div class="row g-4">
            <div class="col-12">
                <div class="bg-white rounded h-100 p-4">
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <h6 class="mb-0">Détails de l'offre d'emploi</h6>
                        <a href="{{ route('admin.vacancies.edit', $vacancy->id) }}" class="btn btn-primary">
                            <i class="fas fa-edit me-2"></i>Modifier
                        </a>
                    </div>

                    <div class="card border-0 shadow-sm">
                        <div class="card-body">
                            <h5 class="card-title mb-4">Informations générales</h5>
                            
                            @if($vacancy->job_title)
                            <div class="row mb-3">
                                <div class="col-sm-3"><strong>Job Title:</strong></div>
                                <div class="col-sm-9"><strong class="text-primary">{{ $vacancy->job_title }}</strong></div>
                            </div>
                            @endif

                            @if($vacancy->intitule_recrutement)
                            <div class="row mb-3">
                                <div class="col-sm-3"><strong>Intitulé Recrutement:</strong></div>
                                <div class="col-sm-9">{{ $vacancy->intitule_recrutement }}</div>
                            </div>
                            @endif

                            @if($vacancy->contract_type)
                            <div class="row mb-3">
                                <div class="col-sm-3"><strong>Type de contrat:</strong></div>
                                <div class="col-sm-9">
                                    <span class="badge bg-info">{{ $vacancy->contract_type }}</span>
                                    @if($vacancy->type_contrat_propose)
                                        <span class="badge bg-secondary ms-2">{{ $vacancy->type_contrat_propose }}</span>
                                    @endif
                                </div>
                            </div>
                            @endif

                            @if($vacancy->location)
                            <div class="row mb-3">
                                <div class="col-sm-3"><strong>Localisation:</strong></div>
                                <div class="col-sm-9">{{ $vacancy->location }}</div>
                            </div>
                            @endif

                            <div class="row mb-3">
                                <div class="col-sm-3"><strong>Statut:</strong></div>
                                <div class="col-sm-9">
                                    @if($vacancy->active)
                                        <span class="badge bg-success">Active</span>
                                    @else
                                        <span class="badge bg-secondary">Inactive</span>
                                    @endif
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-sm-3"><strong>Date limite de candidature:</strong></div>
                                <div class="col-sm-9">
                                    @if($vacancy->application_deadline)
                                        {{ \Carbon\Carbon::parse($vacancy->application_deadline)->format('d/m/Y') }}
                                    @else
                                        <span class="text-muted">N/A</span>
                                    @endif
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-sm-3"><strong>Date fin candidature:</strong></div>
                                <div class="col-sm-9">
                                    @if($vacancy->date_fin_candidature)
                                        {{ \Carbon\Carbon::parse($vacancy->date_fin_candidature)->format('d/m/Y') }}
                                    @else
                                        <span class="text-muted">N/A</span>
                                    @endif
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-sm-3"><strong>URL Page:</strong></div>
                                <div class="col-sm-9">
                                    @if($vacancy->url_page)
                                        @php
                                            $url = $vacancy->url_page;
                                            // Si l'URL ne commence pas par http, ajouter le domaine
                                            if (!str_starts_with($url, 'http://') && !str_starts_with($url, 'https://')) {
                                                $url = url($url);
                                            }
                                        @endphp
                                        <a href="{{ $url }}" target="_blank" class="btn btn-sm btn-outline-primary">
                                            <i class="fas fa-external-link-alt me-1"></i>Ouvrir le lien
                                        </a>
                                        <small class="text-muted ms-2">{{ $vacancy->url_page }}</small>
                                    @else
                                        <span class="text-muted">N/A</span>
                                    @endif
                                </div>
                            </div>

                            @if($vacancy->email_apply)
                            <div class="row mb-3">
                                <div class="col-sm-3"><strong>Email pour candidater:</strong></div>
                                <div class="col-sm-9">
                                    <a href="mailto:{{ $vacancy->email_apply }}">{{ $vacancy->email_apply }}</a>
                                </div>
                            </div>
                            @endif

                            @if($vacancy->subject)
                            <div class="row mb-3">
                                <div class="col-sm-3"><strong>Subject:</strong></div>
                                <div class="col-sm-9">{{ $vacancy->subject }}</div>
                            </div>
                            @endif

                            <hr>

                            @if($vacancy->a_propos_airid || $vacancy->resume_poste || $vacancy->responsabilites_principales || $vacancy->qualifications || $vacancy->offre || $vacancy->comment_postuler || $vacancy->plus_info || $vacancy->note_info)
                            <hr>
                            <h5 class="card-title mb-4 mt-4">Contenu détaillé</h5>

                            @if($vacancy->a_propos_airid)
                            <div class="mb-4">
                                <strong class="text-primary">À propos d'AIRID:</strong>
                                <div class="mt-2 p-3  ">{{ nl2br(e($vacancy->a_propos_airid)) }}</div>
                            </div>
                            @endif

                            @if($vacancy->resume_poste)
                            <div class="mb-4">
                                <strong class="text-primary">Résumé du poste:</strong>
                                <div class="mt-2 p-3 ">{{ nl2br(e($vacancy->resume_poste)) }}</div>
                            </div>
                            @endif

                            @if($vacancy->responsabilites_principales)
                            <div class="mb-4">
                                <strong class="text-primary">Responsabilités principales:</strong>
                                <div class="mt-2 p-3 ">{{ nl2br(e($vacancy->responsabilites_principales)) }}</div>
                            </div>
                            @endif

                            @if($vacancy->qualifications)
                            <div class="mb-4">
                                <strong class="text-primary">Qualifications:</strong>
                                <div class="mt-2 p-3 ">{{ nl2br(e($vacancy->qualifications)) }}</div>
                            </div>
                            @endif

                            @if($vacancy->offre)
                            <div class="mb-4">
                                <strong class="text-primary">Offre:</strong>
                                <div class="mt-2 p-3 ">{{ nl2br(e($vacancy->offre)) }}</div>
                            </div>
                            @endif

                            @if($vacancy->comment_postuler)
                            <div class="mb-4">
                                <strong class="text-primary">Comment postuler:</strong>
                                <div class="mt-2 p-3 ">{{ nl2br(e($vacancy->comment_postuler)) }}</div>
                            </div>
                            @endif

                            @if($vacancy->plus_info)
                            <div class="mb-4">
                                <strong class="text-primary">Plus d'informations:</strong>
                                <div class="mt-2 p-3 ">{{ nl2br(e($vacancy->plus_info)) }}</div>
                            </div>
                            @endif

                            @if($vacancy->note_info)
                            <div class="mb-4">
                                <strong class="text-primary">Note info:</strong>
                                <div class="mt-2 p-3 ">{{ nl2br(e($vacancy->note_info)) }}</div>
                            </div>
                            @endif
                            @endif

                            <hr>

                            <h5 class="card-title mb-4 mt-4">Fichiers de candidature</h5>

                            @if($vacancy->application_file_fr)
                            <div class="mb-3">
                                <strong>Fichier de candidature (FR):</strong>
                                <div class="mt-2">
                                    @php
                                        $fileName = basename($vacancy->application_file_fr);
                                        $filePath = null;
                                        
                                        if (file_exists(public_path('assets/vacancies/' . $fileName))) {
                                            $filePath = asset('assets/vacancies/' . $fileName);
                                        } elseif (file_exists(public_path('storage/assets/vacancies/' . $fileName))) {
                                            $filePath = asset('storage/assets/vacancies/' . $fileName);
                                        } elseif (file_exists(storage_path('app/public/documents_recrutement/' . $fileName))) {
                                            $filePath = asset('storage/documents_recrutement/' . $fileName);
                                        } else {
                                            $filePath = asset('assets/vacancies/' . $fileName);
                                        }
                                    @endphp
                                    <a href="{{ $filePath }}" target="_blank" class="btn btn-primary">
                                        <i class="fas fa-file-pdf me-2"></i>Télécharger le PDF (FR)
                                    </a>
                                </div>
                            </div>
                            @endif

                            @if($vacancy->application_file_en)
                            <div class="mb-3">
                                <strong>Fichier de candidature (EN):</strong>
                                <div class="mt-2">
                                    @php
                                        $fileName = basename($vacancy->application_file_en);
                                        $filePath = null;
                                        
                                        if (file_exists(public_path('assets/vacancies/' . $fileName))) {
                                            $filePath = asset('assets/vacancies/' . $fileName);
                                        } elseif (file_exists(public_path('storage/assets/vacancies/' . $fileName))) {
                                            $filePath = asset('storage/assets/vacancies/' . $fileName);
                                        } elseif (file_exists(storage_path('app/public/documents_recrutement/' . $fileName))) {
                                            $filePath = asset('storage/documents_recrutement/' . $fileName);
                                        } else {
                                            $filePath = asset('assets/vacancies/' . $fileName);
                                        }
                                    @endphp
                                    <a href="{{ $filePath }}" target="_blank" class="btn btn-primary">
                                        <i class="fas fa-file-pdf me-2"></i>Télécharger le PDF (EN)
                                    </a>
                                </div>
                            </div>
                            @endif

                            @if($vacancy->application_lunch_date)
                            <div class="row mb-3">
                                <div class="col-sm-3"><strong>Date de lancement:</strong></div>
                                <div class="col-sm-9">
                                    {{ \Carbon\Carbon::parse($vacancy->application_lunch_date)->format('d/m/Y') }}
                                </div>
                            </div>
                            @endif

                            <hr>

                            <div class="row mb-3">
                                <div class="col-sm-3"><strong>Date de création:</strong></div>
                                <div class="col-sm-9">{{ $vacancy->created_at ? $vacancy->created_at->format('d/m/Y H:i') : 'N/A' }}</div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-sm-3"><strong>Dernière modification:</strong></div>
                                <div class="col-sm-9">{{ $vacancy->updated_at ? $vacancy->updated_at->format('d/m/Y H:i') : 'N/A' }}</div>
                            </div>
                        </div>
                    </div>

                    <div class="mt-4">
                        <a href="{{ route('admin.vacancies.index') }}" class="btn btn-secondary">
                            <i class="fas fa-arrow-left me-2"></i>Retour à la liste
                        </a>
                        <a href="{{ route('admin.vacancies.edit', $vacancy->id) }}" class="btn btn-primary">
                            <i class="fas fa-edit me-2"></i>Modifier
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

