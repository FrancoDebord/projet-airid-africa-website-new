@php
    $lang = request()->get('lang', 'en');
    $isEn = $lang === 'en';
@endphp
<div class="wise-form-wrapper">
    {{-- Language switcher --}}
    <div class="wise-lang-switch d-flex justify-content-end align-items-center mb-3 flex-wrap gap-2">
        <span class="wise-label me-2" data-i18n-en="Language:" data-i18n-fr="Langue :">Language:</span>
        <div class="btn-group btn-group-sm" role="group">
            <a href="{{ request()->fullUrlWithQuery(['lang' => 'en']) }}" class="btn btn-outline-danger {{ $lang === 'en' ? 'active' : '' }}" data-lang-btn="en">English</a>
            <a href="{{ request()->fullUrlWithQuery(['lang' => 'fr']) }}" class="btn btn-outline-danger {{ $lang === 'fr' ? 'active' : '' }}" data-lang-btn="fr">Français</a>
        </div>
    </div>

    {{-- Stepper: 4 étapes bien visibles, trait qui progresse --}}
    <div class="wise-stepper mb-4">
        <div class="wise-stepper-track">
            <div class="wise-stepper-track-fill" id="wise-track-fill"></div>
        </div>
        <div class="wise-stepper-inner d-flex justify-content-between">
            <div class="wise-stepper-item active" data-step="1">
                <div class="wise-stepper-num">1</div>
                <span class="wise-stepper-label" data-i18n-en="Applicant & Academic" data-i18n-fr="Candidat & Académique">Applicant & Academic</span>
            </div>
            <div class="wise-stepper-item" data-step="2">
                <div class="wise-stepper-num">2</div>
                <span class="wise-stepper-label" data-i18n-en="STEM & Statement" data-i18n-fr="STEM & Motivation">STEM & Statement</span>
            </div>
            <div class="wise-stepper-item" data-step="3">
                <div class="wise-stepper-num">3</div>
                <span class="wise-stepper-label" data-i18n-en="Finance & Documents" data-i18n-fr="Finance & Documents">Finance & Documents</span>
            </div>
            <div class="wise-stepper-item" data-step="4">
                <div class="wise-stepper-num">4</div>
                <span class="wise-stepper-label" data-i18n-en="Endorsement & Signature" data-i18n-fr="Parrain & Signature">Endorsement & Signature</span>
            </div>
        </div>
    </div>

    <p class="wise-deadline text-muted small mb-4">
        <span data-i18n-en="Late or incomplete submissions will not be considered." data-i18n-fr="Les dossiers incomplets ou envoyés en retard ne seront pas pris en compte.">Late or incomplete submissions will not be considered.</span>
    </p>

    <form id="wise-apply-form" action="{{ route('philanthropy.apply.store', $item->slug) }}" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="lang" id="form_lang" value="{{ $lang }}">
        <input type="hidden" name="signature_data" id="signature_data">
        <div id="wise-step-error" class="alert alert-danger d-none mb-3" role="alert"></div>

        {{-- STEP 1: Section 1 (Applicant Information) + Section 2 (Academic Information) --}}
        <div class="wise-step-panel" data-panel="1">
            <div class="wise-section">
                <h5 class="wise-section-title" data-i18n-en="SECTION 1: Applicant Information" data-i18n-fr="SECTION 1 : Informations du candidat">SECTION 1: Applicant Information</h5>
                <div class="title-divider mb-3"></div>
                <p class="wise-subtitle mb-3" data-i18n-en="1.1 Personal Details" data-i18n-fr="1.1 Coordonnées personnelles">1.1 Personal Details</p>
                <div class="row g-3 mb-4">
                    <div class="col-12 col-md-6">
                        <label for="first_name" class="wise-label"><span data-i18n-en="Full Name (as on official ID)" data-i18n-fr="Nom complet (tel que sur la pièce d'identité)">Full Name (as on official ID)</span> <span class="wise-required">*</span></label>
                        <input type="text" class="form-control wise-input" id="first_name" name="first_name" value="{{ old('first_name') }}" placeholder="{{ $isEn ? 'First name' : 'Prénom' }}" required>
                    </div>
                    <div class="col-12 col-md-6">
                        <label for="last_name" class="wise-label d-none d-md-block">&nbsp;</label>
                        <input type="text" class="form-control wise-input" id="last_name" name="last_name" value="{{ old('last_name') }}" placeholder="{{ $isEn ? 'Last name' : 'Nom' }}" required>
                    </div>
                    <div class="col-6 col-md-3">
                        <label for="date_of_birth" class="wise-label"><span data-i18n-en="Date of Birth" data-i18n-fr="Date de naissance">Date of Birth</span> <span class="wise-required">*</span></label>
                        <input type="date" class="form-control wise-input" id="date_of_birth" name="date_of_birth" value="{{ old('date_of_birth') }}" required>
                    </div>
                    <div class="col-6 col-md-2">
                        <label for="age" class="wise-label" data-i18n-en="Age" data-i18n-fr="Âge">Age</label>
                        <input type="number" class="form-control wise-input" id="age" name="age" value="{{ old('age') }}" min="16" max="99" readonly>
                    </div>
                    <div class="col-12 col-md-4">
                        <label for="nationality" class="wise-label"><span data-i18n-en="Nationality" data-i18n-fr="Nationalité">Nationality</span> <span class="wise-required">*</span></label>
                        <input type="text" class="form-control wise-input" id="nationality" name="nationality" value="{{ old('nationality') }}" required>
                    </div>
                    <div class="col-12 col-md-3">
                        <label class="wise-label"><span data-i18n-en="Permanent Resident (if not Beninese)" data-i18n-fr="Résident permanent (si non béninois)">Permanent Resident</span> <span class="wise-required">*</span></label>
                        <div class="wise-radio-group d-flex gap-3 align-items-center mt-1">
                            <label class="wise-radio"><input type="radio" name="is_permanent_resident" value="1" {{ old('is_permanent_resident') === '1' ? 'checked' : '' }}> <span data-i18n-en="Yes" data-i18n-fr="Oui">Yes</span></label>
                            <label class="wise-radio"><input type="radio" name="is_permanent_resident" value="0" {{ old('is_permanent_resident') === '0' || !old('is_permanent_resident') ? 'checked' : '' }}> <span data-i18n-en="No" data-i18n-fr="Non">No</span></label>
                        </div>
                    </div>
                    <div class="col-12">
                        <label for="id_number" class="wise-label" data-i18n-en="National ID / Passport / Residence Permit Number" data-i18n-fr="N° pièce d'identité / passeport / permis de séjour">National ID / Passport / Residence Permit Number</label>
                        <input type="text" class="form-control wise-input" id="id_number" name="id_number" value="{{ old('id_number') }}">
                    </div>
                </div>
                <p class="wise-subtitle mb-3" data-i18n-en="1.2 Contact Information" data-i18n-fr="1.2 Coordonnées">1.2 Contact Information</p>
                <div class="row g-3 mb-4">
                    <div class="col-12 col-md-6">
                        <label for="email" class="wise-label"><span data-i18n-en="Email Address" data-i18n-fr="Adresse e-mail">Email Address</span> <span class="wise-required">*</span></label>
                        <input type="email" class="form-control wise-input" id="email" name="email" value="{{ old('email') }}" required>
                    </div>
                    <div class="col-12 col-md-6">
                        <label for="phone" class="wise-label" data-i18n-en="Telephone (with country code)" data-i18n-fr="Téléphone (avec indicatif)">Telephone (with country code)</label>
                        <input type="text" class="form-control wise-input" id="phone" name="phone" value="{{ old('phone') }}" placeholder="+229 00 00 00 00">
                    </div>
                    <div class="col-12">
                        <label for="residential_address" class="wise-label" data-i18n-en="Residential Address" data-i18n-fr="Adresse résidentielle">Residential Address</label>
                        <input type="text" class="form-control wise-input" id="residential_address" name="residential_address" value="{{ old('residential_address') }}">
                    </div>
                </div>
            </div>

            <div class="wise-section">
                <h5 class="wise-section-title" data-i18n-en="SECTION 2: Academic Information" data-i18n-fr="SECTION 2 : Informations académiques">SECTION 2: Academic Information</h5>
                <div class="title-divider mb-3"></div>
                <p class="wise-subtitle mb-3" data-i18n-en="2.1 University Details" data-i18n-fr="2.1 Détails université">2.1 University Details</p>
                <div class="row g-3 mb-4">
                    <div class="col-12">
                        <label for="university" class="wise-label"><span data-i18n-en="Name of Public University" data-i18n-fr="Nom de l'université publique">Name of Public University</span> <span class="wise-required">*</span></label>
                        <select class="form-select wise-input" id="university" name="university" required>
                            <option value="" data-i18n-en="— Select —" data-i18n-fr="— Choisir —">— Select —</option>
                            <option value="Université d'Abomey-Calavi (UAC)" {{ old('university') === "Université d'Abomey-Calavi (UAC)" ? 'selected' : '' }}>Université d'Abomey-Calavi (UAC)</option>
                            <option value="Université de Parakou (UP)" {{ old('university') === 'Université de Parakou (UP)' ? 'selected' : '' }}>Université de Parakou (UP)</option>
                            <option value="Université de Kétou" {{ old('university') === 'Université de Kétou' ? 'selected' : '' }}>Université de Kétou</option>
                            <option value="Université Nationale d'Agriculture (UNA)" {{ old('university') === "Université Nationale d'Agriculture (UNA)" ? 'selected' : '' }}>Université Nationale d'Agriculture (UNA)</option>
                            <option value="Université Nationale des Sciences, Technologies, Ingénierie et Mathématiques (UNSTIM)" {{ old('university') === 'Université Nationale des Sciences, Technologies, Ingénierie et Mathématiques (UNSTIM)' ? 'selected' : '' }}>Université Nationale des Sciences, Technologies, Ingénierie et Mathématiques (UNSTIM)</option>
                            <option value="École Normale Supérieure de Natitingou (ENS Natitingou)" {{ old('university') === 'École Normale Supérieure de Natitingou (ENS Natitingou)' ? 'selected' : '' }}>École Normale Supérieure de Natitingou (ENS Natitingou)</option>
                            <option value="Institut National Supérieur de Technologie Industrielle (INSTI – Lokossa)" {{ old('university') === 'Institut National Supérieur de Technologie Industrielle (INSTI – Lokossa)' ? 'selected' : '' }}>Institut National Supérieur de Technologie Industrielle (INSTI – Lokossa)</option>
                            <option value="other" {{ old('university') === 'other' ? 'selected' : '' }} data-i18n-en="Other" data-i18n-fr="Autre">Other</option>
                        </select>
                        <div id="university_other_wrap" class="mt-2 {{ old('university') === 'other' ? '' : 'd-none' }}">
                            <label for="university_other" class="wise-label small"><span data-i18n-en="Specify university name" data-i18n-fr="Précisez le nom de l'université">Specify university name</span> <span class="wise-required">*</span></label>
                            <input type="text" class="form-control wise-input" id="university_other" name="university_other" value="{{ old('university_other') }}" placeholder="{{ $isEn ? 'Enter university name' : 'Saisir le nom de l\'université' }}">
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <label for="faculty_school" class="wise-label" data-i18n-en="Faculty/School" data-i18n-fr="Faculté / École">Faculty/School</label>
                        <input type="text" class="form-control wise-input" id="faculty_school" name="faculty_school" value="{{ old('faculty_school') }}">
                    </div>
                    <div class="col-12 col-md-6">
                        <label for="department" class="wise-label" data-i18n-en="Department" data-i18n-fr="Département">Department</label>
                        <input type="text" class="form-control wise-input" id="department" name="department" value="{{ old('department') }}">
                    </div>
                </div>
                <p class="wise-subtitle mb-3" data-i18n-en="2.2 Programme Information" data-i18n-fr="2.2 Formation">2.2 Programme Information</p>
                <div class="row g-3 mb-4">
                    <div class="col-12 col-md-6">
                        <label class="wise-label"><span data-i18n-en="Degree Level" data-i18n-fr="Niveau">Degree Level</span> <span class="wise-required">*</span></label>
                        <div class="wise-radio-group d-flex flex-wrap gap-3 align-items-center mt-1">
                            <label class="wise-radio"><input type="radio" name="level" value="undergraduate" {{ old('level') === 'undergraduate' ? 'checked' : '' }} class="form-check-input" required> <span data-i18n-en="Undergraduate" data-i18n-fr="Licence">Undergraduate</span></label>
                            <label class="wise-radio"><input type="radio" name="level" value="masters" {{ old('level') === 'masters' ? 'checked' : '' }}> <span data-i18n-en="Master's (Postgraduate)" data-i18n-fr="Master">Master's (Postgraduate)</span></label>
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <label for="programme" class="wise-label"><span data-i18n-en="Programme Title" data-i18n-fr="Intitulé du programme">Programme Title</span> <span class="wise-required">*</span></label>
                        <input type="text" class="form-control wise-input" id="programme" name="programme" value="{{ old('programme') }}" required>
                    </div>
                    <div class="col-12 col-md-4">
                        <label for="year_of_study" class="wise-label" data-i18n-en="Year of Study" data-i18n-fr="Année d'études">Year of Study</label>
                        <input type="text" class="form-control wise-input" id="year_of_study" name="year_of_study" value="{{ old('year_of_study') }}" placeholder="e.g. 2, 3">
                    </div>
                    <div class="col-12 col-md-4">
                        <label for="expected_graduation_date" class="wise-label" data-i18n-en="Expected Graduation (Month/Year)" data-i18n-fr="Fin prévue (Mois/Année)">Expected Graduation (Month/Year)</label>
                        <input type="text" class="form-control wise-input" id="expected_graduation_date" name="expected_graduation_date" value="{{ old('expected_graduation_date') }}" placeholder="e.g. 06/2027">
                    </div>
                    <div class="col-12 col-md-4">
                        <label for="current_gpa" class="wise-label" data-i18n-en="Current GPA / Average" data-i18n-fr="Moyenne actuelle">Current GPA / Average</label>
                        <input type="text" class="form-control wise-input" id="current_gpa" name="current_gpa" value="{{ old('current_gpa') }}">
                    </div>
                </div>
            </div>
            <div class="wise-actions">
                <button type="button" class="btn btn-danger wise-next" data-next="2" data-i18n-en="Next: Step 2" data-i18n-fr="Suivant : Étape 2">Next: Step 2</button>
            </div>
        </div>

        {{-- STEP 2: Section 3 (STEM Field) + Section 4 (Personal Statement) --}}
        <div class="wise-step-panel d-none" data-panel="2">
            <div class="wise-section">
                <h5 class="wise-section-title" data-i18n-en="SECTION 3: STEM Field" data-i18n-fr="SECTION 3 : Domaine STEM">SECTION 3: STEM Field</h5>
                <div class="title-divider mb-3"></div>
                <p class="wise-subtitle mb-3" data-i18n-en="Please indicate your primary field:" data-i18n-fr="Indiquez votre domaine principal :">Please indicate your primary field:</p>
                @php
                    $stemOptions = ['Biology', 'Chemistry', 'Physics', 'Mathematics', 'Computer Science', 'Engineering', 'Environmental Science', 'Agricultural Science', 'Health Sciences'];
                @endphp
                <div class="row g-2 mb-4">
                    @foreach($stemOptions as $opt)
                        <div class="col-12 col-sm-6 col-lg-4">
                            <label class="wise-radio d-flex align-items-center py-1">
                                <input type="radio" name="stem_field" value="{{ strtolower(str_replace(' ', '_', $opt)) }}" class="me-2" {{ old('stem_field') === strtolower(str_replace(' ', '_', $opt)) ? 'checked' : '' }}>
                                <span data-i18n-en="{{ $opt }}" data-i18n-fr="{{ $opt }}">{{ $opt }}</span>
                            </label>
                        </div>
                    @endforeach
                    <div class="col-12 d-flex flex-wrap align-items-center gap-2">
                        <label class="wise-radio d-flex align-items-center">
                            <input type="radio" name="stem_field" value="other" class="me-2" id="stem_other_radio" {{ old('stem_field') === 'other' ? 'checked' : '' }}>
                            <span data-i18n-en="Other (specify):" data-i18n-fr="Autre (préciser) :">Other (specify):</span>
                        </label>
                        <div id="wise-stem-other-wrap" class="d-none">
                            <input type="text" class="form-control wise-input d-inline-block" style="max-width: 220px;" id="stem_other" name="stem_other" value="{{ old('stem_other') }}" placeholder="{{ $isEn ? 'Specify' : 'Préciser' }}">
                        </div>
                    </div>
                </div>
            </div>

            <div class="wise-section">
                <h5 class="wise-section-title" data-i18n-en="SECTION 4: Personal Statement (Upload Required)" data-i18n-fr="SECTION 4 : Lettre de motivation (pièce jointe requise)">SECTION 4: Personal Statement (Upload Required)</h5>
                <div class="title-divider mb-3"></div>
                <p class="wise-hint small text-muted mb-3" data-i18n-en="Maximum 500 words. Address: (1) Motivation for your STEM field, (2) Academic and career goals, (3) How the award will support your progression, (4) Intended contribution to science and development in Benin/Africa." data-i18n-fr="Maximum 500 mots. À traiter : (1) Motivation pour votre domaine STEM, (2) Objectifs académiques et professionnels, (3) Comment l'aide soutiendra votre progression, (4) Contribution envisagée à la science et au développement au Bénin/Afrique.">Maximum 500 words. Address: (1) Motivation for your STEM field, (2) Academic and career goals, (3) How the award will support your progression, (4) Intended contribution to science and development in Benin/Africa.</p>
                <div class="row g-3 mb-4">
                    <div class="col-12">
                        <label for="personal_statement_file" class="wise-label"><span data-i18n-en="Upload Personal Statement (PDF required)" data-i18n-fr="Téléverser la lettre de motivation (PDF)">Upload Personal Statement (PDF required)</span> <span class="wise-required">*</span></label>
                        <input type="file" class="form-control wise-input" id="personal_statement_file" name="personal_statement_file" accept=".pdf">
                    </div>
                </div>
            </div>
            <div class="wise-actions d-flex justify-content-between">
                <button type="button" class="btn btn-outline-secondary wise-prev" data-prev="1" data-i18n-en="Previous" data-i18n-fr="Précédent">Previous</button>
                <button type="button" class="btn btn-danger wise-next" data-next="3" data-i18n-en="Next: Step 3" data-i18n-fr="Suivant : Étape 3">Next: Step 3</button>
            </div>
        </div>

        {{-- STEP 3: Section 5 (Financial Context) + Section 6 (Required Documents) --}}
        <div class="wise-step-panel d-none" data-panel="3">
            <div class="wise-section">
                <h5 class="wise-section-title" data-i18n-en="SECTION 5: Financial Context (Optional)" data-i18n-fr="SECTION 5 : Contexte financier (optionnel)">SECTION 5: Financial Context (Optional)</h5>
                <div class="title-divider mb-3"></div>
                <div class="row g-3 mb-4">
                    <div class="col-12">
                        <label class="wise-label" data-i18n-en="Do you currently receive financial aid or scholarship support?" data-i18n-fr="Bénéficiez-vous actuellement d'une aide financière ou bourse ?">Do you currently receive financial aid or scholarship support?</label>
                        <div class="wise-radio-group d-flex gap-3 align-items-center mt-1">
                            <label class="wise-radio"><input type="radio" name="financial_aid" value="1" id="financial_aid_yes" {{ old('financial_aid') === '1' ? 'checked' : '' }}> <span data-i18n-en="Yes" data-i18n-fr="Oui">Yes</span></label>
                            <label class="wise-radio"><input type="radio" name="financial_aid" value="0" {{ old('financial_aid') === '0' || !old('financial_aid') ? 'checked' : '' }}> <span data-i18n-en="No" data-i18n-fr="Non">No</span></label>
                        </div>
                    </div>
                    <div id="wise-financial-aid-fields-wrap" class="col-12 d-none">
                        <div class="col-12 mb-3">
                            <label for="financial_aid_specify" class="wise-label" data-i18n-en="If yes, please specify:" data-i18n-fr="Si oui, préciser :">If yes, please specify:</label>
                            <textarea class="form-control wise-input" id="financial_aid_specify" name="financial_aid_specify" rows="2">{{ old('financial_aid_specify') }}</textarea>
                        </div>
                        <div class="col-12">
                            <label for="financial_explanation" class="wise-label" data-i18n-en="Brief explanation of how this award would support your studies (optional):" data-i18n-fr="Courte explication de l'apport de cette aide à vos études (optionnel) :">Brief explanation of how this award would support your studies (optional):</label>
                            <textarea class="form-control wise-input" id="financial_explanation" name="financial_explanation" rows="3">{{ old('financial_explanation') }}</textarea>
                        </div>
                    </div>
                </div>
            </div>

            <div class="wise-section">
                <h5 class="wise-section-title" data-i18n-en="SECTION 6: Required Supporting Documents (Uploads)" data-i18n-fr="SECTION 6 : Documents requis (téléversement)">SECTION 6: Required Supporting Documents (Uploads)</h5>
                <div class="title-divider mb-3"></div>
                <p class="wise-hint small text-muted mb-3" data-i18n-en="Accepted format: PDF only. Max 10 MB each. Incomplete applications will not be reviewed." data-i18n-fr="Format accepté : PDF uniquement. Max 10 Mo par fichier. Les dossiers incomplets ne seront pas examinés.">Accepted format: PDF only. Max 10 MB each. Incomplete applications will not be reviewed.</p>
                <div class="row g-3 mb-4">
                    <div class="col-12 col-md-6">
                        <label for="proof_enrolment" class="wise-label"><span data-i18n-en="Proof of current enrolment (Mandatory)" data-i18n-fr="Preuve d'inscription (obligatoire)">Proof of current enrolment (Mandatory)</span> <span class="wise-required">*</span></label>
                        <input type="file" class="form-control wise-input" id="proof_enrolment" name="proof_enrolment" accept=".pdf" required>
                    </div>
                    <div class="col-12 col-md-6">
                        <label for="transcript" class="wise-label"><span data-i18n-en="Recent academic transcript" data-i18n-fr="Relevé de notes récent">Recent academic transcript</span> <span class="wise-required">*</span></label>
                        <input type="file" class="form-control wise-input" id="transcript" name="transcript" accept=".pdf" required>
                    </div>
                    <div class="col-12 col-md-6">
                        <label for="support_letter" class="wise-label"><span data-i18n-en="Faculty support letter (Mandatory)" data-i18n-fr="Lettre de soutien d'un enseignant (obligatoire)">Faculty support letter (Mandatory)</span> <span class="wise-required">*</span></label>
                        <input type="file" class="form-control wise-input" id="support_letter" name="support_letter" accept=".pdf" required>
                    </div>
                    <div class="col-12 col-md-6">
                        <label for="id_document" class="wise-label"><span data-i18n-en="National ID / Passport / Residence Permit" data-i18n-fr="Pièce d'identité / Passeport / Titre de séjour">National ID / Passport / Residence Permit</span> <span class="wise-required">*</span></label>
                        <input type="file" class="form-control wise-input" id="id_document" name="id_document" accept=".pdf,.jpg,.jpeg,.png" required>
                    </div>
                </div>
            </div>
            <div class="wise-actions d-flex justify-content-between">
                <button type="button" class="btn btn-outline-secondary wise-prev" data-prev="2" data-i18n-en="Previous" data-i18n-fr="Précédent">Previous</button>
                <button type="button" class="btn btn-danger wise-next" data-next="4" data-i18n-en="Next: Step 4" data-i18n-fr="Suivant : Étape 4">Next: Step 4</button>
            </div>
        </div>

        {{-- STEP 4: Section 7 (Faculty Endorsement) + Section 8 (Declaration + Signature) --}}
        <div class="wise-step-panel d-none" data-panel="4">
            <div class="wise-section">
                <h5 class="wise-section-title" data-i18n-en="SECTION 7: Faculty Endorsement" data-i18n-fr="SECTION 7 : Parrainage facultaire">SECTION 7: Faculty Endorsement</h5>
                <div class="title-divider mb-3"></div>
                <p class="wise-hint small text-muted mb-3" data-i18n-en="Faculty support letter must: be on official university letterhead, include academic evaluation and endorsement, be signed and dated." data-i18n-fr="La lettre de soutien doit : être sur en-tête officiel, inclure une évaluation et un parrainage académiques, être signée et datée.">Faculty support letter must: be on official university letterhead, include academic evaluation and endorsement, be signed and dated.</p>
                <div class="row g-3 mb-4">
                    <div class="col-12 col-md-4">
                        <label for="faculty_member_name" class="wise-label" data-i18n-en="Faculty Member Name" data-i18n-fr="Nom du parrain">Faculty Member Name</label>
                        <input type="text" class="form-control wise-input" id="faculty_member_name" name="faculty_member_name" value="{{ old('faculty_member_name') }}">
                    </div>
                    <div class="col-12 col-md-4">
                        <label for="faculty_position" class="wise-label" data-i18n-en="Faculty Position" data-i18n-fr="Fonction">Faculty Position</label>
                        <input type="text" class="form-control wise-input" id="faculty_position" name="faculty_position" value="{{ old('faculty_position') }}">
                    </div>
                    <div class="col-12 col-md-4">
                        <label for="faculty_university" class="wise-label" data-i18n-en="University" data-i18n-fr="Université">University</label>
                        <input type="text" class="form-control wise-input" id="faculty_university" name="faculty_university" value="{{ old('faculty_university') }}">
                    </div>
                </div>
            </div>

            <div class="wise-section">
                <h5 class="wise-section-title" data-i18n-en="SECTION 8: Declaration" data-i18n-fr="SECTION 8 : Déclaration">SECTION 8: Declaration</h5>
                <div class="title-divider mb-3"></div>
                <ul class="wise-declaration-list mb-4">
                    <li data-i18n-en="All information provided is accurate and complete." data-i18n-fr="Toutes les informations fournies sont exactes et complètes.">All information provided is accurate and complete.</li>
                    <li data-i18n-en="I meet the eligibility criteria for the AIRID AFRICA–WISE Fund." data-i18n-fr="Je remplis les critères d'éligibilité du Fonds AFRICA–WISE d'AIRID.">I meet the eligibility criteria for the AIRID AFRICA–WISE Fund.</li>
                    <li data-i18n-en="All required documents have been uploaded." data-i18n-fr="Tous les documents requis ont été téléversés.">All required documents have been uploaded.</li>
                    <li data-i18n-en="I understand that incomplete or false information may result in disqualification." data-i18n-fr="Je comprends que des informations incomplètes ou fausses peuvent entraîner une disqualification.">I understand that incomplete or false information may result in disqualification.</li>
                </ul>
                <div class="row g-3 align-items-end mb-4">
                    <div class="col-12 col-md-4">
                        <label class="wise-label" data-i18n-en="Applicant Name" data-i18n-fr="Nom du candidat">Applicant Name</label>
                        <input type="text" class="form-control wise-input wise-input-readonly" id="declaration_applicant_name" readonly placeholder="{{ $isEn ? 'From Section 1' : 'Section 1' }}">
                    </div>
                    <div class="col-12 col-md-4">
                        <label class="wise-label" data-i18n-en="Date" data-i18n-fr="Date">Date</label>
                        <input type="text" class="form-control wise-input wise-input-readonly" id="declaration_date" readonly>
                    </div>
                    <div class="col-12">
                        <label class="wise-label"><span data-i18n-en="Signature (draw below)" data-i18n-fr="Signature (dessinez ci-dessous)">Signature (draw below)</span> <span class="wise-required">*</span></label>
                        <div class="wise-signature-box">
                            <canvas id="signature_canvas" width="400" height="120"></canvas>
                            <button type="button" class="btn btn-sm btn-outline-secondary wise-signature-clear" id="signature_clear" data-i18n-en="Clear" data-i18n-fr="Effacer">Clear</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="wise-actions d-flex justify-content-between">
                <button type="button" class="btn btn-outline-secondary wise-prev" data-prev="3" data-i18n-en="Previous" data-i18n-fr="Précédent">Previous</button>
                <button type="submit" class="btn btn-danger btn-lg px-4">
                    <i class="fas fa-paper-plane me-2"></i>
                    <span data-i18n-en="Submit application" data-i18n-fr="Soumettre la candidature">Submit application</span>
                </button>
            </div>
        </div>
    </form>

    <div class="mt-3">
        <a href="{{ route('philanthropyDetail', $item->slug) }}" class="btn btn-outline-secondary btn-sm" data-i18n-en="Cancel" data-i18n-fr="Annuler">Cancel</a>
    </div>
</div>

<style>
/* ========== AIRID WISE Form – Style aligné sur le site ========== */
.wise-form-wrapper {
    font-family: var(--airid-font-family, "Open Sans", sans-serif);
    font-size: var(--airid-text-size, 0.875rem);
    color: var(--airid-text-color, #444);
}

/* Stepper : 4 étapes, complétées restent en rouge + trait qui progresse */
.wise-stepper {
    position: relative;
    padding: 0 0 1.5rem;
}
.wise-stepper-track {
    position: absolute;
    top: 20px;
    left: 12%;
    right: 12%;
    height: 3px;
    background: #e0e0e0;
    border-radius: 2px;
    z-index: 0;
}
.wise-stepper-track-fill {
    height: 100%;
    border-radius: 2px;
    background: linear-gradient(90deg, #c20102, #8b0101);
    transition: width 0.3s ease;
    width: 0%;
}
.wise-stepper-inner {
    position: relative;
    z-index: 1;
}
.wise-stepper-item {
    display: flex;
    flex-direction: column;
    align-items: center;
    flex: 1;
    max-width: 25%;
}
.wise-stepper-num {
    width: 40px;
    height: 40px;
    border-radius: 50%;
    background: #e9ecef;
    color: #6c757d;
    font-weight: 700;
    font-size: var(--airid-h4-size, 1rem);
    display: flex;
    align-items: center;
    justify-content: center;
    margin-bottom: 0.5rem;
    border: 2px solid #dee2e6;
    transition: all 0.25s ease;
}
.wise-stepper-item.active .wise-stepper-num,
.wise-stepper-item.completed .wise-stepper-num {
    background: linear-gradient(135deg, #c20102 0%, #8b0101 100%);
    color: #fff;
    border-color: #c20102;
}
.wise-stepper-label {
    font-size: 0.75rem;
    font-weight: 600;
    color: #6c757d;
    text-align: center;
    line-height: 1.2;
}
.wise-stepper-item.active .wise-stepper-label,
.wise-stepper-item.completed .wise-stepper-label {
    color: #c20102;
}
@media (max-width: 768px) {
    .wise-stepper-track { left: 8%; right: 8%; }
    .wise-stepper-num { width: 32px; height: 32px; font-size: 0.875rem; }
    .wise-stepper-label { font-size: 0.65rem; }
}

/* Langue */
.wise-lang-switch .wise-label { font-size: var(--airid-text-size); color: var(--airid-tagline-color); }
.wise-deadline { font-size: var(--airid-tagline-size, 0.8rem); color: var(--airid-tagline-color, #555); }

/* Sections */
.wise-section { margin-bottom: 2rem; }
.wise-section-title {
    font-size: var(--airid-h3-size, 1.05rem);
    font-weight: 700;
    color: #c20102;
    margin-bottom: 0;
}
.wise-subtitle { font-size: var(--airid-text-size); font-weight: 600; color: var(--airid-title-color); }
.wise-hint { font-size: var(--airid-text-size); line-height: 1.5; }

/* Labels & champs (logique AIRID comme contact) */
.wise-label {
    display: block;
    font-size: var(--airid-text-size);
    font-weight: 600;
    color: var(--airid-title-color, #1a1a1a);
    margin-bottom: 0.35rem;
}
.wise-required { color: #c20102; font-weight: 700; }
.wise-input,
.wise-form-wrapper .form-control.wise-input {
    border-radius: 10px;
    border: 2px solid #e0e0e0;
    padding: 0.6rem 0.9rem;
    font-size: var(--airid-text-size);
    transition: border-color 0.2s ease, box-shadow 0.2s ease;
}
.wise-input:focus,
.wise-form-wrapper .form-control.wise-input:focus {
    border-color: #c20102;
    box-shadow: 0 0 0 0.2rem rgba(194, 1, 2, 0.15);
    outline: none;
}
.wise-input-readonly { background: #f8f9fa; cursor: default; }

/* Radio (alignement propre) */
.wise-radio { font-weight: 500; cursor: pointer; margin: 0; }
.wise-radio input { margin-right: 0.35rem; vertical-align: middle; }
.wise-radio-group { gap: 1rem; }

/* Liste déclaration */
.wise-declaration-list {
    list-style: none;
    padding-left: 0;
    margin-bottom: 0;
}
.wise-declaration-list li {
    position: relative;
    padding-left: 1.25rem;
    margin-bottom: 0.5rem;
    font-size: var(--airid-text-size);
    line-height: 1.5;
}
.wise-declaration-list li::before {
    content: "";
    position: absolute;
    left: 0;
    top: 0.5em;
    width: 5px;
    height: 5px;
    background: #c20102;
    border-radius: 50%;
}

/* Signature */
.wise-signature-box {
    border: 2px solid #e0e0e0;
    border-radius: 10px;
    background: #fff;
    position: relative;
    max-width: 100%;
    width: 400px;
}
.wise-signature-box canvas {
    display: block;
    touch-action: none;
    cursor: crosshair;
    width: 100%;
    height: auto;
    border-radius: 8px;
}
.wise-signature-clear {
    position: absolute;
    top: 6px;
    right: 6px;
    border-radius: 6px;
}

/* Boutons d’étape */
.wise-actions { margin-top: 1.5rem; padding-top: 1rem; border-top: 1px solid #eee; }
.wise-form-wrapper .btn-danger { background: linear-gradient(135deg, #c20102 0%, #8b0101 100%); border: none; }
.wise-form-wrapper .btn-danger:hover { background: linear-gradient(135deg, #a00102 0%, #6b0101 100%); }
.wise-form-wrapper .btn-outline-secondary { border-radius: 10px; }

.wise-form-wrapper [data-panel] { min-height: 180px; }

/* Validation : champs invalides */
.wise-input.is-invalid { border-color: #c20102 !important; box-shadow: 0 0 0 0.2rem rgba(194, 1, 2, 0.2); }
.wise-validation-msg { font-size: 0.8rem; color: #c20102; margin-top: 0.5rem; }
</style>

<script>
(function() {
    var currentStep = 1;
    var currentLang = '{{ $lang }}';
    var langParam = new URLSearchParams(window.location.search).get('lang');
    if (langParam === 'fr' || langParam === 'en') currentLang = langParam;

    var messages = {
        en: {
            fillRequired: 'Please fill in all required fields before continuing.',
            stemRequired: 'Please select your STEM field.',
            fileRequired: 'Please upload the required file(s).',
            stemOtherRequired: 'Please specify when selecting "Other".'
        },
        fr: {
            fillRequired: 'Veuillez remplir tous les champs obligatoires avant de continuer.',
            stemRequired: 'Veuillez indiquer votre domaine STEM.',
            fileRequired: 'Veuillez téléverser le(s) fichier(s) requis.',
            stemOtherRequired: 'Veuillez préciser lorsque vous choisissez "Autre".'
        }
    };

    function msg(key) { return (currentLang === 'fr' ? messages.fr : messages.en)[key] || key; }

    function clearStepErrors() {
        document.querySelectorAll('.wise-step-panel .wise-input.is-invalid').forEach(function(el) { el.classList.remove('is-invalid'); });
        var errBox = document.getElementById('wise-step-error');
        if (errBox) { errBox.classList.add('d-none'); errBox.textContent = ''; }
    }

    function markInvalid(el) {
        if (el) el.classList.add('is-invalid');
    }

    function validateStep(step) {
        clearStepErrors();
        var invalid = [];
        var firstInvalid = null;

        if (step === 1) {
            var f = document.getElementById('first_name'); if (!f || !f.value.trim()) { invalid.push('First name'); if (!firstInvalid) firstInvalid = f; }
            var l = document.getElementById('last_name'); if (!l || !l.value.trim()) { invalid.push('Last name'); if (!firstInvalid) firstInvalid = l; }
            var d = document.getElementById('date_of_birth'); if (!d || !d.value) { invalid.push('Date of birth'); if (!firstInvalid) firstInvalid = d; }
            var n = document.getElementById('nationality'); if (!n || !n.value.trim()) { invalid.push('Nationality'); if (!firstInvalid) firstInvalid = n; }
            var radioRes = document.querySelector('input[name="is_permanent_resident"]:checked'); if (!radioRes) { invalid.push('Permanent Resident'); if (!firstInvalid) firstInvalid = document.querySelector('input[name="is_permanent_resident"]'); }
            var e = document.getElementById('email'); if (!e || !e.value.trim()) { invalid.push('Email'); if (!firstInvalid) firstInvalid = e; }
            var u = document.getElementById('university'); if (!u || !u.value.trim()) { invalid.push('University'); if (!firstInvalid) firstInvalid = u; }
            if (u && u.value === 'other') { var uOther = document.getElementById('university_other'); if (!uOther || !uOther.value.trim()) { invalid.push(currentLang === 'fr' ? 'Précisez le nom de l\'université' : 'Specify university name'); if (!firstInvalid) firstInvalid = uOther; } }
            var radioLevel = document.querySelector('input[name="level"]:checked'); if (!radioLevel) { invalid.push('Degree level'); if (!firstInvalid) firstInvalid = document.querySelector('input[name="level"]'); }
            var p = document.getElementById('programme'); if (!p || !p.value.trim()) { invalid.push('Programme title'); if (!firstInvalid) firstInvalid = p; }
        } else if (step === 2) {
            var stem = document.querySelector('input[name="stem_field"]:checked'); if (!stem) { invalid.push(msg('stemRequired')); firstInvalid = document.querySelector('input[name="stem_field"]'); } else if (stem.value === 'other') {
                var other = document.getElementById('stem_other'); if (!other || !other.value.trim()) { invalid.push(msg('stemOtherRequired')); if (!firstInvalid) firstInvalid = other; }
            }
            var psFile = document.getElementById('personal_statement_file'); if (!psFile || !psFile.files || psFile.files.length === 0) { invalid.push('Personal statement (PDF)'); if (!firstInvalid) firstInvalid = psFile; }
        } else if (step === 3) {
            var proof = document.getElementById('proof_enrolment'); if (!proof || !proof.files || proof.files.length === 0) { invalid.push('Proof of enrolment'); if (!firstInvalid) firstInvalid = proof; }
            var trans = document.getElementById('transcript'); if (!trans || !trans.files || trans.files.length === 0) { invalid.push('Academic transcript'); if (!firstInvalid) firstInvalid = trans; }
            var supp = document.getElementById('support_letter'); if (!supp || !supp.files || supp.files.length === 0) { invalid.push('Faculty support letter'); if (!firstInvalid) firstInvalid = supp; }
            var idDoc = document.getElementById('id_document'); if (!idDoc || !idDoc.files || idDoc.files.length === 0) { invalid.push('ID / Passport'); if (!firstInvalid) firstInvalid = idDoc; }
        }

        if (invalid.length > 0) {
            if (firstInvalid) { firstInvalid.classList.add('is-invalid'); firstInvalid.focus && firstInvalid.focus(); }
            var errBox = document.getElementById('wise-step-error');
            if (errBox) {
                errBox.textContent = msg('fillRequired') + ' ' + (invalid.length <= 3 ? invalid.join(', ') : invalid.slice(0, 2).join(', ') + '…');
                errBox.classList.remove('d-none');
            }
            return false;
        }
        return true;
    }

    function applyI18n() {
        document.querySelectorAll('[data-i18n-en][data-i18n-fr]').forEach(function(el) {
            var en = el.getAttribute('data-i18n-en');
            var fr = el.getAttribute('data-i18n-fr');
            if (en && fr) el.textContent = currentLang === 'fr' ? fr : en;
        });
    }

    function setProgress(step) {
        currentStep = step;
        clearStepErrors();
        var trackFill = document.getElementById('wise-track-fill');
        if (trackFill) trackFill.style.width = (step >= 2 ? ((step - 1) / 3 * 100) : 0) + '%';
        document.querySelectorAll('.wise-stepper-item').forEach(function(s) {
            var n = parseInt(s.getAttribute('data-step'), 10);
            s.classList.toggle('active', n === step);
            s.classList.toggle('completed', n < step);
            if (n > step) { s.classList.remove('active', 'completed'); }
        });
        document.querySelectorAll('.wise-step-panel').forEach(function(p) {
            p.classList.toggle('d-none', parseInt(p.getAttribute('data-panel'), 10) !== step);
        });
        if (step === 4) {
            var first = (document.getElementById('first_name') && document.getElementById('first_name').value) || '';
            var last = (document.getElementById('last_name') && document.getElementById('last_name').value) || '';
            document.getElementById('declaration_applicant_name').value = (first + ' ' + last).trim() || '—';
            var d = new Date();
            document.getElementById('declaration_date').value = d.getDate().toString().padStart(2,'0') + '/' + (d.getMonth()+1).toString().padStart(2,'0') + '/' + d.getFullYear();
            var univ = document.getElementById('university');
            var facultyUniv = document.getElementById('faculty_university');
            if (univ && facultyUniv) {
                var univVal = univ.value === 'other' ? (document.getElementById('university_other') && document.getElementById('university_other').value.trim()) : univ.value.trim();
                if (univVal) facultyUniv.value = univVal;
            }
        }
    }

    document.querySelectorAll('.wise-next').forEach(function(btn) {
        btn.addEventListener('click', function() {
            var next = parseInt(this.getAttribute('data-next'), 10);
            if (!validateStep(currentStep)) return;
            setProgress(next);
        });
    });
    document.querySelectorAll('.wise-prev').forEach(function(btn) {
        btn.addEventListener('click', function() {
            var prev = parseInt(this.getAttribute('data-prev'), 10);
            setProgress(prev);
        });
    });

    document.querySelectorAll('[data-lang-btn]').forEach(function(btn) {
        btn.addEventListener('click', function(e) {
            e.preventDefault();
            currentLang = this.getAttribute('data-lang-btn');
            var url = new URL(window.location.href);
            url.searchParams.set('lang', currentLang);
            window.history.replaceState({}, '', url);
            document.querySelectorAll('[data-lang-btn]').forEach(function(b) { b.classList.remove('active'); if (b.getAttribute('data-lang-btn') === currentLang) b.classList.add('active'); });
            var fl = document.getElementById('form_lang');
            if (fl) fl.value = currentLang;
            applyI18n();
        });
    });

    applyI18n();
    setProgress(1);

    // University: show "Specify university name" only when "Other" is selected
    function toggleUniversityOtherField() {
        var wrap = document.getElementById('university_other_wrap');
        var sel = document.getElementById('university');
        if (wrap && sel) {
            if (sel.value === 'other') {
                wrap.classList.remove('d-none');
                document.getElementById('university_other').required = true;
            } else {
                wrap.classList.add('d-none');
                var inp = document.getElementById('university_other');
                if (inp) { inp.value = ''; inp.required = false; }
            }
        }
    }
    var universitySelect = document.getElementById('university');
    if (universitySelect) {
        universitySelect.addEventListener('change', toggleUniversityOtherField);
    }
    toggleUniversityOtherField();

    // SECTION 3: afficher le champ "Other (specify)" seulement si "Other" est sélectionné
    function toggleStemOtherField() {
        var wrap = document.getElementById('wise-stem-other-wrap');
        var otherRadio = document.getElementById('stem_other_radio');
        if (wrap && otherRadio) {
            if (otherRadio.checked) {
                wrap.classList.remove('d-none');
            } else {
                wrap.classList.add('d-none');
                var inp = document.getElementById('stem_other');
                if (inp) inp.value = '';
            }
        }
    }
    document.querySelectorAll('input[name="stem_field"]').forEach(function(radio) {
        radio.addEventListener('change', toggleStemOtherField);
    });
    toggleStemOtherField();

    // SECTION 5: afficher "If yes, please specify" et "Brief explanation" seulement si "Yes" (financial aid)
    function toggleFinancialAidFields() {
        var wrap = document.getElementById('wise-financial-aid-fields-wrap');
        var yesRadio = document.getElementById('financial_aid_yes');
        if (wrap && yesRadio) {
            if (yesRadio.checked) {
                wrap.classList.remove('d-none');
            } else {
                wrap.classList.add('d-none');
                var spec = document.getElementById('financial_aid_specify');
                var expl = document.getElementById('financial_explanation');
                if (spec) spec.value = '';
                if (expl) expl.value = '';
            }
        }
    }
    document.querySelectorAll('input[name="financial_aid"]').forEach(function(radio) {
        radio.addEventListener('change', toggleFinancialAidFields);
    });
    toggleFinancialAidFields();

    // Retirer is-invalid quand l'utilisateur corrige
    document.getElementById('wise-apply-form').addEventListener('input', function(e) {
        if (e.target.classList) e.target.classList.remove('is-invalid');
    });
    document.getElementById('wise-apply-form').addEventListener('change', function(e) {
        if (e.target.classList) e.target.classList.remove('is-invalid');
        if (e.target.type === 'radio' || e.target.type === 'file') {
            var errBox = document.getElementById('wise-step-error');
            if (errBox) errBox.classList.add('d-none');
        }
    });

    // Age from DOB
    var dob = document.getElementById('date_of_birth');
    var ageIn = document.getElementById('age');
    if (dob && ageIn) {
        function updateAge() {
            var val = dob.value;
            if (!val) return;
            var birth = new Date(val);
            var today = new Date();
            var a = today.getFullYear() - birth.getFullYear();
            var m = today.getMonth() - birth.getMonth();
            if (m < 0 || (m === 0 && today.getDate() < birth.getDate())) a--;
            ageIn.value = a >= 0 ? a : '';
        }
        dob.addEventListener('change', updateAge);
        if (dob.value) updateAge();
    }

    // Signature pad
    var canvas = document.getElementById('signature_canvas');
    if (canvas) {
        var ctx = canvas.getContext('2d');
        var drawing = false;
        var lastX = 0, lastY = 0;

        function getPos(e) {
            var rect = canvas.getBoundingClientRect();
            var clientX = e.touches ? e.touches[0].clientX : e.clientX;
            var clientY = e.touches ? e.touches[0].clientY : e.clientY;
            return { x: (clientX - rect.left) * (canvas.width / rect.width), y: (clientY - rect.top) * (canvas.height / rect.height) };
        }
        function draw(e) {
            if (!drawing) return;
            e.preventDefault();
            var p = getPos(e);
            ctx.beginPath();
            ctx.moveTo(lastX, lastY);
            ctx.lineTo(p.x, p.y);
            ctx.strokeStyle = '#000';
            ctx.lineWidth = 2;
            ctx.lineCap = 'round';
            ctx.stroke();
            lastX = p.x; lastY = p.y;
        }
        canvas.addEventListener('mousedown', function(e) { drawing = true; var p = getPos(e); lastX = p.x; lastY = p.y; });
        canvas.addEventListener('mousemove', draw);
        canvas.addEventListener('mouseup', function() { drawing = false; });
        canvas.addEventListener('mouseleave', function() { drawing = false; });
        canvas.addEventListener('touchstart', function(e) { e.preventDefault(); drawing = true; var p = getPos(e); lastX = p.x; lastY = p.y; }, { passive: false });
        canvas.addEventListener('touchmove', function(e) { e.preventDefault(); draw(e); }, { passive: false });
        canvas.addEventListener('touchend', function() { drawing = false; });

        document.getElementById('signature_clear').addEventListener('click', function() {
            ctx.clearRect(0, 0, canvas.width, canvas.height);
        });

        document.getElementById('wise-apply-form').addEventListener('submit', function(e) {
            var hasStroke = ctx.getImageData(0, 0, canvas.width, canvas.height).data.some(function(v, i) { return i % 4 === 3 && v > 0; });
            if (!hasStroke) {
                e.preventDefault();
                alert(currentLang === 'fr' ? 'Veuillez signer dans le cadre prévu.' : 'Please sign in the signature box.');
                return;
            }
            document.getElementById('signature_data').value = canvas.toDataURL('image/png');
        });
    }
})();
</script>
