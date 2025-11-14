@extends('admin.layout')

@section('content')
    <div class="container-fluid pt-4 px-4">
        <div class="row g-4">
            <div class="col-12">
                <div class="bg-white rounded h-100 p-4">
                    <h6 class="mb-4">Ajouter une vacancy</h6>

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

                    <form action="{{ route('admin.vacancies.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="job_title" class="form-label">Job Title</label>
                                <input type="text" class="form-control" id="job_title" name="job_title" required>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="contract_type" class="form-label">Contract Type</label>
                                <input type="text" class="form-control" id="contract_type" name="contract_type" required>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="location" class="form-label">Location</label>
                                <input type="text" class="form-control" id="location" name="location" required>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="application_deadline" class="form-label">Application Deadline</label>
                                <input type="date" class="form-control" id="application_deadline" name="application_deadline" required>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="url_page" class="form-label">URL Page</label>
                                <input type="url" class="form-control" id="url_page" name="url_page">
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="email_apply" class="form-label">Email Apply</label>
                                <input type="email" class="form-control" id="email_apply" name="email_apply">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="subject" class="form-label">Subject</label>
                                <input type="text" class="form-control" id="subject" name="subject">
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="active" class="form-label">Active</label>
                                <select class="form-control" id="active" name="active">
                                    <option value="1">Yes</option>
                                    <option value="0">No</option>
                                </select>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="application_file_fr" class="form-label">Application File FR</label>
                                <input type="file" class="form-control" id="application_file_fr" name="application_file_fr" accept=".pdf">
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="application_file_en" class="form-label">Application File EN</label>
                                <input type="file" class="form-control" id="application_file_en" name="application_file_en" accept=".pdf">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="intitule_recrutement" class="form-label">Intitulé Recrutement</label>
                                <input type="text" class="form-control" id="intitule_recrutement" name="intitule_recrutement" required>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="type_contrat_propose" class="form-label">Type Contrat Proposé</label>
                                <input type="text" class="form-control" id="type_contrat_propose" name="type_contrat_propose" required>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="a_propos_airid" class="form-label">À propos d'AIRID</label>
                            <textarea class="form-control" id="a_propos_airid" name="a_propos_airid" rows="3"></textarea>
                        </div>

                        <div class="mb-3">
                            <label for="resume_poste" class="form-label">Résumé Poste</label>
                            <textarea class="form-control" id="resume_poste" name="resume_poste" rows="3"></textarea>
                        </div>

                        <div class="mb-3">
                            <label for="responsabilites_principales" class="form-label">Responsabilités Principales</label>
                            <textarea class="form-control" id="responsabilites_principales" name="responsabilites_principales" rows="3"></textarea>
                        </div>

                        <div class="mb-3">
                            <label for="qualifications" class="form-label">Qualifications</label>
                            <textarea class="form-control" id="qualifications" name="qualifications" rows="3"></textarea>
                        </div>

                        <div class="mb-3">
                            <label for="offre" class="form-label">Offre</label>
                            <textarea class="form-control" id="offre" name="offre" rows="3"></textarea>
                        </div>

                        <div class="mb-3">
                            <label for="comment_postuler" class="form-label">Comment Postuler</label>
                            <textarea class="form-control" id="comment_postuler" name="comment_postuler" rows="3"></textarea>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="date_fin_candidature" class="form-label">Date Fin Candidature</label>
                                <input type="date" class="form-control" id="date_fin_candidature" name="date_fin_candidature" required>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="application_lunch_date" class="form-label">Application Lunch Date</label>
                                <input type="date" class="form-control" id="application_lunch_date" name="application_lunch_date">
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="plus_info" class="form-label">Plus Info</label>
                            <textarea class="form-control" id="plus_info" name="plus_info" rows="3"></textarea>
                        </div>

                        <div class="mb-3">
                            <label for="note_info" class="form-label">Note Info</label>
                            <textarea class="form-control" id="note_info" name="note_info" rows="3"></textarea>
                        </div>

                        <button type="submit" class="btn btn-primary">Ajouter</button>
                        <a href="{{ route('admin.vacancies.index') }}" class="btn btn-secondary">Annuler</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
