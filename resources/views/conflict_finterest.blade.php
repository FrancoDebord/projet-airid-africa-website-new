@extends('index')

@section('title', 'AIRID -- Conflict of Interest Declaration')

@section('css')
    <style>
        .coi-hero {
            background: linear-gradient(135deg,  #767474 0%, #ebb9b9 100%);
            color: #fff;
            padding: 60px 0;
        }
        .coi-card {
            border-radius: 16px;
            box-shadow: 0 8px 30px rgba(0, 0, 0, 0.08);
            border: 0;
        }
        .coi-section-title {
            font-weight: 700;
            color: #2c3e50;
            margin-bottom: 0.75rem;
        }
        .coi-section-subtitle {
            color: #7f8c8d;
            margin-bottom: 1.25rem;
        }
        .coi-badge {
            display: inline-block;
            background: rgba(255, 255, 255, 0.15);
            padding: 0.35rem 0.85rem;
            border-radius: 30px;
            font-weight: 600;
            letter-spacing: 0.5px;
        }
        .coi-divider {
            height: 4px;
            width: 90px;
            background: linear-gradient(135deg, #c20102 0%, #8b0101 100%);
            border-radius: 2px;
            margin: 0.75rem 0 1.5rem;
        }
        .coi-note {
            background: #f8f9fa;
            border-left: 4px solid #c20102;
            padding: 1rem 1.25rem;
            border-radius: 10px;
        }
        .coi-details {
            display: none;
        }
    </style>
@endsection

@section('content')
    <section class="coi-hero">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-9">
                    <h1 class="mb-2" style="font-weight: 800;">Conflict of Interest (COI) Declaration Form</h1>
                    <p class="mb-0">African Institute for Research in Infectious Diseases (AIRID)</p>
                </div>
                <div class="col-lg-3 text-lg-right mt-3 mt-lg-0">
                    <span class="coi-badge">CONFIDENTIAL</span>
                </div>
            </div>
        </div>
    </section>

    <section class="py-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <div class="card coi-card">
                        <div class="card-body p-4 p-lg-5">
                            <p class="coi-section-subtitle">
                                This form is to be completed by all Board members, committee members, management, staff,
                                researchers, consultants, and other individuals acting on behalf of AIRID. The purpose
                                is to ensure transparency and the effective management of actual, potential, or
                                perceived conflicts of interest.
                            </p>

                            <p class="text-muted small mb-2">
                                <a href="{{ route('conflict.change.access.code') }}">Changer le code d'accès</a> (accès au formulaire)
                            </p>
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
                                    <strong>Please correct the following errors:</strong>
                                    <ul class="mb-0 mt-2">
                                        @foreach($errors->all() as $err)
                                            <li>{{ $err }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            <form method="post" action="{{ route('conflict.store') }}">
                                @csrf

                                <div class="mb-4">
                                    <h3 class="coi-section-title">Section 1: Personal Details</h3>
                                    <div class="coi-divider"></div>

                                    <div class="form-group">
                                        <label for="full_name">Full Name</label>
                                        <input type="text" class="form-control" id="full_name" name="full_name" value="{{ old('full_name') }}" required>
                                        @error('full_name')<small class="text-danger">{{ $message }}</small>@enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="position_role">Position / Role</label>
                                        <input type="text" class="form-control" id="position_role" name="position_role" value="{{ old('position_role') }}">
                                    </div>

                                    <div class="form-group">
                                        <label for="department_unit">Department / Unit (if applicable)</label>
                                        <input type="text" class="form-control" id="department_unit" name="department_unit" value="{{ old('department_unit') }}">
                                    </div>

                                    <div class="form-group">
                                        <label class="d-block">Type of Engagement</label>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="engagement_type" id="engagement_board" value="Board/Committee Member">
                                            <label class="form-check-label" for="engagement_board">Board/Committee Member</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="engagement_type" id="engagement_staff" value="Staff">
                                            <label class="form-check-label" for="engagement_staff">Staff</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="engagement_type" id="engagement_researcher" value="Researcher/Fellow">
                                            <label class="form-check-label" for="engagement_researcher">Researcher/Fellow</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="engagement_type" id="engagement_consultant" value="Consultant/Contractor">
                                            <label class="form-check-label" for="engagement_consultant">Consultant/Contractor</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="engagement_type" id="engagement_volunteer" value="Volunteer/Intern">
                                            <label class="form-check-label" for="engagement_volunteer">Volunteer/Intern</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="engagement_type" id="engagement_other" value="Other">
                                            <label class="form-check-label" for="engagement_other">Other (please specify)</label>
                                        </div>
                                        <input type="text" class="form-control mt-2" id="engagement_other_text" name="engagement_other_text" placeholder="Please specify" disabled>
                                    </div>

                                    <div class="form-group">
                                        <label for="email_address">Email Address</label>
                                        <input type="email" class="form-control" id="email_address" name="email_address" value="{{ old('email_address') }}" required placeholder="Your email to receive a confirmation copy">
                                        @error('email_address')<small class="text-danger d-block">{{ $message }}</small>@enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="declaration_date_personal">Date of Declaration</label>
                                        <input type="date" class="form-control" id="declaration_date_personal" name="declaration_date_personal" value="{{ old('declaration_date_personal') }}">
                                    </div>

                                    <div class="form-group">
                                        <label for="objective_of_declaration">Objectives of Declaration</label>
                                        <select class="form-control" id="objective_of_declaration" name="objective_of_declaration">
                                            <option value="">-- Select --</option>
                                            <option value="Meeting" {{ old('objective_of_declaration') == 'Meeting' ? 'selected' : '' }}>Board Meeting</option>
                                            <option value="Recruitment" {{ old('objective_of_declaration') == 'Recruitment' ? 'selected' : '' }}>Recruitment</option>
                                            <option value="Contract Awarding" {{ old('objective_of_declaration') == 'Contract Awarding' ? 'selected' : '' }}>Contract Awarding</option>
                                            <option value="Partnerships and Collaborations" {{ old('objective_of_declaration') == 'Partnerships and Collaborations' ? 'selected' : '' }}>Partnerships and Collaborations</option>
                                            <option value="Others" {{ old('objective_of_declaration') == 'Others' ? 'selected' : '' }}>Others</option>
                                        </select>
                                    </div>
                                    <div class="form-group" id="objective_other_group" style="display: none;">
                                        <label for="objective_other_text">Please specify</label>
                                        <input type="text" class="form-control" id="objective_other_text" name="objective_other_text" disabled>
                                    </div>

                                    <div class="form-group" id="objective_meeting_date_group" style="display: none;">
                                        <label for="objective_meeting_date">Meeting Date</label>
                                        <input type="date" class="form-control" id="objective_meeting_date" name="objective_meeting_date" disabled>
                                    </div>
                                </div>

                                <div class="mb-4">
                                    <h3 class="coi-section-title">Section 2: Declaration of Interests</h3>
                                    <div class="coi-divider"></div>
                                    <p class="coi-section-subtitle">
                                        Please declare all actual, potential, or perceived conflicts of interest that
                                        could reasonably be considered to influence your duties or decisions on behalf of AIRID.
                                    </p>
                                    <div class="form-group">
                                        <label class="d-block">2.1 Financial Interests</label>
                                        <p class="mb-2">Do you have any financial interests that may constitute a conflict of interest?</p>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input coi-toggle" type="radio" name="financial_interest" id="financial_yes" value="Yes" data-target="#financial_details">
                                            <label class="form-check-label" for="financial_yes">Yes</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input coi-toggle" type="radio" name="financial_interest" id="financial_no" value="No" data-target="#financial_details">
                                            <label class="form-check-label" for="financial_no">No</label>
                                        </div>
                                        <textarea class="form-control mt-2 coi-details" id="financial_details" name="financial_details" rows="3"
                                            placeholder="If Yes, please provide details (e.g. shareholding, consultancy fees, honoraria, gifts, benefits)"></textarea>
                                    </div>

                                    <div class="form-group">
                                        <label class="d-block">2.2 Professional or Institutional Interests</label>
                                        <p class="mb-2">Do you hold any external positions, appointments, affiliations, or advisory roles that may constitute a conflict of interest?</p>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input coi-toggle" type="radio" name="professional_interest" id="professional_yes" value="Yes" data-target="#professional_details">
                                            <label class="form-check-label" for="professional_yes">Yes</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input coi-toggle" type="radio" name="professional_interest" id="professional_no" value="No" data-target="#professional_details">
                                            <label class="form-check-label" for="professional_no">No</label>
                                        </div>
                                        <textarea class="form-control mt-2 coi-details" id="professional_details" name="professional_details" rows="3"
                                            placeholder="If Yes, please provide details"></textarea>
                                    </div>

                                    <div class="form-group">
                                        <label class="d-block">2.3 Personal Relationships</label>
                                        <p class="mb-2">
                                            Do you have any family or close personal relationships that may constitute a conflict of interest
                                            (e.g. involvement in recruitment, procurement, supervision, or partnership decisions)?
                                        </p>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input coi-toggle" type="radio" name="personal_interest" id="personal_yes" value="Yes" data-target="#personal_details">
                                            <label class="form-check-label" for="personal_yes">Yes</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input coi-toggle" type="radio" name="personal_interest" id="personal_no" value="No" data-target="#personal_details">
                                            <label class="form-check-label" for="personal_no">No</label>
                                        </div>
                                        <textarea class="form-control mt-2 coi-details" id="personal_details" name="personal_details" rows="3"
                                            placeholder="If Yes, please provide details"></textarea>
                                    </div>

                                    <div class="form-group">
                                        <label class="d-block">2.4 Research-Related Interests (if applicable)</label>
                                        <p class="mb-2">
                                            Do you have any research-related interests that may constitute a conflict
                                            (e.g. industry funding, intellectual property, patents, royalties, competing research roles)?
                                        </p>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input coi-toggle" type="radio" name="research_interest" id="research_yes" value="Yes" data-target="#research_details">
                                            <label class="form-check-label" for="research_yes">Yes</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input coi-toggle" type="radio" name="research_interest" id="research_no" value="No" data-target="#research_details">
                                            <label class="form-check-label" for="research_no">No</label>
                                        </div>
                                        <textarea class="form-control mt-2 coi-details" id="research_details" name="research_details" rows="3"
                                            placeholder="If Yes, please provide details"></textarea>
                                    </div>
                                </div>

                                <div class="mb-4">
                                    <h3 class="coi-section-title">Section 3: Other Relevant Information</h3>
                                    <div class="coi-divider"></div>
                                    <div class="form-group">
                                        <label for="other_information">Please disclose any other information that could reasonably be perceived as a conflict of interest</label>
                                        <textarea class="form-control" id="other_information" name="other_information" rows="4"></textarea>
                                    </div>
                                </div>

                                <div class="mb-4">
                                    <h3 class="coi-section-title">Section 4: Declaration and Undertaking</h3>
                                    <div class="coi-divider"></div>
                                    <div class="coi-note mb-3">
                                        I hereby declare that the information provided in this form is complete, accurate, and truthful to the best of my knowledge.
                                        I have read and understood AIRID's Conflict of Interest Policy. I agree to promptly disclose any changes to the information
                                        provided above and to comply with any management measures put in place by AIRID to address declared conflicts of interest.
                                    </div>

                                    <div class="form-check mb-3">
                                        <input class="form-check-input" type="checkbox" id="declaration_agree" name="declaration_agree" value="1" {{ old('declaration_agree') ? 'checked' : '' }} required>
                                        <label class="form-check-label" for="declaration_agree">I confirm this declaration and undertaking.</label>
                                        @error('declaration_agree')<small class="text-danger d-block">{{ $message }}</small>@enderror
                                    </div>

                                    <div class="form-row">
                                        <div class="form-group col-md-4">
                                            <label for="declaration_name">Name full </label>
                                            <input type="text" class="form-control" id="declaration_name" name="declaration_name" value="{{ old('declaration_name') }}">
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="declaration_signature">Signature</label>
                                            <div class="border rounded bg-white" style="height: 140px; position: relative;">
                                                <canvas id="signature_pad" width="320" height="140" style="width: 100%; height: 100%;"></canvas>
                                                <input type="hidden" id="declaration_signature" name="declaration_signature" required>
                                            </div>
                                            <button type="button" class="btn btn-sm btn-outline-secondary mt-2" id="clear_signature">
                                                Clear
                                            </button>
                                            <small class="text-muted d-block mt-1">Sign with mouse or touch.</small>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="declaration_date_sign">Date</label>
                                            <input type="date" class="form-control" id="declaration_date_sign" name="declaration_date_sign" value="{{ old('declaration_date_sign') }}">
                                        </div>
                                    </div>
                                </div>

                                <div class="text-right">
                                    <button type="submit" class="btn btn-primary px-4">Submit Declaration</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('js')
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const toggles = document.querySelectorAll('.coi-toggle');
            const otherRadio = document.getElementById('engagement_other');
            const otherText = document.getElementById('engagement_other_text');
            const objectiveSelect = document.getElementById('objective_of_declaration');
            const objectiveOtherGroup = document.getElementById('objective_other_group');
            const objectiveOtherInput = document.getElementById('objective_other_text');
            const objectiveMeetingGroup = document.getElementById('objective_meeting_date_group');
            const objectiveMeetingInput = document.getElementById('objective_meeting_date');
            const canvas = document.getElementById('signature_pad');
            const signatureInput = document.getElementById('declaration_signature');
            const clearBtn = document.getElementById('clear_signature');

            function updateDetails(targetId, isYes) {
                const target = document.querySelector(targetId);
                if (!target) return;
                target.style.display = isYes ? 'block' : 'none';
            }

            toggles.forEach(function (toggle) {
                toggle.addEventListener('change', function () {
                    const targetId = toggle.getAttribute('data-target');
                    const isYes = toggle.value === 'Yes';
                    updateDetails(targetId, isYes);
                });
            });

            if (otherRadio && otherText) {
                document.querySelectorAll('input[name="engagement_type"]').forEach(function (el) {
                    el.addEventListener('change', function () {
                        otherText.disabled = !otherRadio.checked;
                        if (!otherRadio.checked) {
                            otherText.value = '';
                        }
                    });
                });
            }

            function updateObjectiveFields() {
                if (!objectiveSelect) return;
                const value = objectiveSelect.value;
                const isOthers = value === 'Others';
                const needsDate = value !== '';

                if (objectiveOtherGroup && objectiveOtherInput) {
                    objectiveOtherGroup.style.display = isOthers ? 'block' : 'none';
                    objectiveOtherInput.disabled = !isOthers;
                    if (!isOthers) {
                        objectiveOtherInput.value = '';
                    }
                }

                if (objectiveMeetingGroup && objectiveMeetingInput) {
                    objectiveMeetingGroup.style.display = needsDate ? 'block' : 'none';
                    objectiveMeetingInput.disabled = !needsDate;
                    if (!needsDate) {
                        objectiveMeetingInput.value = '';
                    }
                }
            }

            if (objectiveSelect) {
                objectiveSelect.addEventListener('change', updateObjectiveFields);
                updateObjectiveFields();
            }

            if (canvas && signatureInput) {
                const ctx = canvas.getContext('2d');
                let drawing = false;

                function getPoint(e) {
                    const rect = canvas.getBoundingClientRect();
                    const scaleX = canvas.width / rect.width;
                    const scaleY = canvas.height / rect.height;
                    const clientX = e.touches ? e.touches[0].clientX : e.clientX;
                    const clientY = e.touches ? e.touches[0].clientY : e.clientY;
                    return {
                        x: (clientX - rect.left) * scaleX,
                        y: (clientY - rect.top) * scaleY,
                    };
                }

                function startDraw(e) {
                    drawing = true;
                    ctx.beginPath();
                    const p = getPoint(e);
                    ctx.moveTo(p.x, p.y);
                    e.preventDefault();
                }

                function draw(e) {
                    if (!drawing) return;
                    const p = getPoint(e);
                    ctx.lineTo(p.x, p.y);
                    ctx.strokeStyle = '#2c3e50';
                    ctx.lineWidth = 2;
                    ctx.lineCap = 'round';
                    ctx.lineJoin = 'round';
                    ctx.stroke();
                    e.preventDefault();
                }

                function endDraw(e) {
                    if (!drawing) return;
                    drawing = false;
                    const outputCanvas = document.createElement('canvas');
                    outputCanvas.width = canvas.width;
                    outputCanvas.height = canvas.height;
                    const outputCtx = outputCanvas.getContext('2d');
                    outputCtx.fillStyle = '#ffffff';
                    outputCtx.fillRect(0, 0, outputCanvas.width, outputCanvas.height);
                    outputCtx.drawImage(canvas, 0, 0);
                    signatureInput.value = outputCanvas.toDataURL('image/jpeg', 0.7);
                    e.preventDefault();
                }

                canvas.addEventListener('mousedown', startDraw);
                canvas.addEventListener('mousemove', draw);
                canvas.addEventListener('mouseup', endDraw);
                canvas.addEventListener('mouseleave', endDraw);
                canvas.addEventListener('touchstart', startDraw, { passive: false });
                canvas.addEventListener('touchmove', draw, { passive: false });
                canvas.addEventListener('touchend', endDraw, { passive: false });

                if (clearBtn) {
                    clearBtn.addEventListener('click', function () {
                        ctx.clearRect(0, 0, canvas.width, canvas.height);
                        signatureInput.value = '';
                    });
                }
            }
        });
    </script>
@endsection
