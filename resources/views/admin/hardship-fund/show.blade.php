@extends('admin.layout')

@section('content')
    <div class="container-fluid pt-4 px-4">
        <div class="row g-4">
            <div class="col-12">
                <div class="bg-white rounded h-100 p-4">
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <h6 class="mb-0">Candidature – {{ $application->full_name }}</h6>
                        <div>
                            <a href="{{ route('admin.hardship-fund.edit', $application->id) }}" class="btn btn-primary btn-sm"><i class="fas fa-edit me-1"></i>Modifier</a>
                            <a href="{{ route('admin.hardship-fund.index') }}" class="btn btn-secondary btn-sm">Liste</a>
                        </div>
                    </div>

                    <div class="card border-0 shadow-sm">
                        <div class="card-body">
                            <h6 class="text-muted mb-3">Informations personnelles</h6>
                            <div class="row mb-2"><div class="col-sm-3"><strong>Nom / Prénom</strong></div><div class="col-sm-9">{{ $application->first_name }} {{ $application->last_name }}</div></div>
                            <div class="row mb-2"><div class="col-sm-3"><strong>Email</strong></div><div class="col-sm-9">{{ $application->email }}</div></div>
                            <div class="row mb-2"><div class="col-sm-3"><strong>Téléphone</strong></div><div class="col-sm-9">{{ $application->phone ?? '–' }}</div></div>
                            <div class="row mb-2"><div class="col-sm-3"><strong>Date de naissance</strong></div><div class="col-sm-9">{{ $application->date_of_birth?->format('d/m/Y') }}</div></div>
                            @if(filled($application->age ?? null))<div class="row mb-2"><div class="col-sm-3"><strong>Âge</strong></div><div class="col-sm-9">{{ $application->age }}</div></div>@endif
                            <div class="row mb-2"><div class="col-sm-3"><strong>Nationalité</strong></div><div class="col-sm-9">{{ $application->nationality }}</div></div>
                            @if(filled($application->id_number ?? null))<div class="row mb-2"><div class="col-sm-3"><strong>N° pièce / Passeport</strong></div><div class="col-sm-9">{{ $application->id_number }}</div></div>@endif
                            @if(isset($application->is_permanent_resident))<div class="row mb-2"><div class="col-sm-3"><strong>Résident permanent</strong></div><div class="col-sm-9">{{ $application->is_permanent_resident ? 'Oui' : 'Non' }}</div></div>@endif
                            @if(filled($application->residential_address ?? null))<div class="row mb-2"><div class="col-sm-3"><strong>Adresse</strong></div><div class="col-sm-9">{{ $application->residential_address }}</div></div>@endif

                            <hr>
                            <h6 class="text-muted mb-3">Études</h6>
                            <div class="row mb-2"><div class="col-sm-3"><strong>Université</strong></div><div class="col-sm-9">{{ $application->university }}</div></div>
                            @if(filled($application->faculty_school ?? null))<div class="row mb-2"><div class="col-sm-3"><strong>Faculté / École</strong></div><div class="col-sm-9">{{ $application->faculty_school }}</div></div>@endif
                            @if(filled($application->department ?? null))<div class="row mb-2"><div class="col-sm-3"><strong>Département</strong></div><div class="col-sm-9">{{ $application->department }}</div></div>@endif
                            <div class="row mb-2"><div class="col-sm-3"><strong>Programme (STEM)</strong></div><div class="col-sm-9">{{ $application->programme }}</div></div>
                            <div class="row mb-2"><div class="col-sm-3"><strong>Niveau</strong></div><div class="col-sm-9">{{ ucfirst($application->level) }}</div></div>
                            @if(filled($application->year_of_study ?? null))<div class="row mb-2"><div class="col-sm-3"><strong>Année d'études</strong></div><div class="col-sm-9">{{ $application->year_of_study }}</div></div>@endif
                            @if(filled($application->expected_graduation_date ?? null))<div class="row mb-2"><div class="col-sm-3"><strong>Fin prévue</strong></div><div class="col-sm-9">{{ $application->expected_graduation_date }}</div></div>@endif
                            @if(filled($application->current_gpa ?? null))<div class="row mb-2"><div class="col-sm-3"><strong>Moyenne / GPA</strong></div><div class="col-sm-9">{{ $application->current_gpa }}</div></div>@endif
                            @if(filled($application->stem_field ?? null))<div class="row mb-2"><div class="col-sm-3"><strong>Domaine STEM</strong></div><div class="col-sm-9">{{ $application->stem_field === 'other' ? ($application->stem_other ?? 'Other') : str_replace('_', ' ', ucfirst($application->stem_field)) }}</div></div>@endif

                            @if(filled($application->faculty_member_name ?? null) || filled($application->faculty_position ?? null) || filled($application->faculty_university ?? null))
                            <hr>
                            <h6 class="text-muted mb-3">Parrain facultaire</h6>
                            @if(filled($application->faculty_member_name ?? null))<div class="row mb-2"><div class="col-sm-3"><strong>Nom</strong></div><div class="col-sm-9">{{ $application->faculty_member_name }}</div></div>@endif
                            @if(filled($application->faculty_position ?? null))<div class="row mb-2"><div class="col-sm-3"><strong>Fonction</strong></div><div class="col-sm-9">{{ $application->faculty_position }}</div></div>@endif
                            @if(filled($application->faculty_university ?? null))<div class="row mb-2"><div class="col-sm-3"><strong>Université</strong></div><div class="col-sm-9">{{ $application->faculty_university }}</div></div>@endif
                            @endif

                            @if(isset($application->financial_aid) || filled($application->financial_aid_specify ?? null) || filled($application->financial_explanation ?? null))
                            <hr>
                            <h6 class="text-muted mb-3">Contexte financier</h6>
                            @if(isset($application->financial_aid))<div class="row mb-2"><div class="col-sm-3"><strong>Bourse / aide actuelle</strong></div><div class="col-sm-9">{{ $application->financial_aid ? 'Oui' : 'Non' }}</div></div>@endif
                            @if(filled($application->financial_aid_specify ?? null))<div class="row mb-2"><div class="col-sm-3"><strong>Précision</strong></div><div class="col-sm-9">{{ $application->financial_aid_specify }}</div></div>@endif
                            @if(filled($application->financial_explanation ?? null))<div class="row mb-2"><div class="col-sm-3"><strong>Explication</strong></div><div class="col-sm-9">{{ $application->financial_explanation }}</div></div>@endif
                            @endif

                            <hr>
                            <h6 class="text-muted mb-3">Documents</h6>
                            @php $baseUrl = 'assets/hardship_fund'; @endphp
                            <div class="row mb-2">
                                <div class="col-sm-3"><strong>Proof of enrolment</strong></div>
                                <div class="col-sm-9">@if($application->proof_enrolment_path)<a href="{{ asset($baseUrl . '/' . $application->proof_enrolment_path) }}" target="_blank" class="btn btn-sm btn-outline-primary">Télécharger</a>@else – @endif</div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-sm-3"><strong>Transcript</strong></div>
                                <div class="col-sm-9">@if($application->transcript_path)<a href="{{ asset($baseUrl . '/' . $application->transcript_path) }}" target="_blank" class="btn btn-sm btn-outline-primary">Télécharger</a>@else – @endif</div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-sm-3"><strong>Support letter</strong></div>
                                <div class="col-sm-9">@if($application->support_letter_path)<a href="{{ asset($baseUrl . '/' . $application->support_letter_path) }}" target="_blank" class="btn btn-sm btn-outline-primary">Télécharger</a>@else – @endif</div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-sm-3"><strong>ID / Passeport</strong></div>
                                <div class="col-sm-9">@if($application->id_document_path)<a href="{{ asset($baseUrl . '/' . $application->id_document_path) }}" target="_blank" class="btn btn-sm btn-outline-primary">Télécharger</a>@else – @endif</div>
                            </div>
                            @if(filled($application->personal_statement_file_path ?? null))
                            <div class="row mb-2">
                                <div class="col-sm-3"><strong>Lettre de motivation (PDF)</strong></div>
                                <div class="col-sm-9"><a href="{{ asset($baseUrl . '/' . $application->personal_statement_file_path) }}" target="_blank" class="btn btn-sm btn-outline-primary">Télécharger</a></div>
                            </div>
                            @endif
                            @if(filled($application->signature_path ?? null))
                            <div class="row mb-2">
                                <div class="col-sm-3"><strong>Signature</strong></div>
                                <div class="col-sm-9"><img src="{{ asset($baseUrl . '/' . $application->signature_path) }}" alt="Signature" class="img-thumbnail" style="max-height: 80px; background-color: #fff;"></div>
                            </div>
                            @endif

                            <hr>
                            <h6 class="text-muted mb-3">Suivi</h6>
                            <div class="row mb-2">
                                <div class="col-sm-3"><strong>Statut</strong></div>
                                <div class="col-sm-9"><span class="badge bg-{{ ['pending'=>'warning','under_review'=>'info','approved'=>'success','rejected'=>'danger'][$application->status] ?? 'secondary' }}">{{ \App\Models\HardshipFundApplication::statusLabels()[$application->status] ?? $application->status }}</span></div>
                            </div>
                            @if($application->admin_notes)
                                <div class="row mb-2">
                                    <div class="col-sm-3"><strong>Notes admin</strong></div>
                                    <div class="col-sm-9">{{ $application->admin_notes }}</div>
                                </div>
                            @endif
                            <div class="row mb-2">
                                <div class="col-sm-3"><strong>Déposé le</strong></div>
                                <div class="col-sm-9">{{ $application->created_at->format('d/m/Y H:i') }}</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
