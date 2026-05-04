@extends('index')

@section('title', 'Apply – AIRID Hardship Fund for Women in STEM | AIRID')

@section('content')
<section class="main-content py-4">
    <div class="container">
        <nav aria-label="breadcrumb" class="mb-3">
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item"><a href="{{ route('index') }}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('philanthropyPage') }}">Philanthropy</a></li>
                <li class="breadcrumb-item"><a href="{{ route('philanthropyDetail', 'hardship-fund-women-stem') }}">Hardship Fund for Women in STEM</a></li>
                <li class="breadcrumb-item active" aria-current="page">Apply</li>
            </ol>
        </nav>

        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="bg-white rounded shadow-sm p-4 p-lg-5 border-start border-danger border-4">
                    <h1 class="h3 mb-4">Apply – AIRID Hardship Fund for Women in STEM</h1>
                    <p class="text-muted mb-4" >Application deadline: 31st March 2026. Submit the form below with all required documents (PDF preferred).</p>

                    @if(session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif
                    @if($errors->any())
                        <div class="alert alert-danger">
                            <ul class="mb-0">@foreach($errors->all() as $e)<li>{{ $e }}</li>@endforeach</ul>
                        </div>
                    @endif

                    <form action="{{ route('hardshipFund.apply.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label for="first_name" class="form-label">First name <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="first_name" name="first_name" value="{{ old('first_name') }}" required>
                            </div>
                            <div class="col-md-6">
                                <label for="last_name" class="form-label">Last name <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="last_name" name="last_name" value="{{ old('last_name') }}" required>
                            </div>
                            <div class="col-md-6">
                                <label for="email" class="form-label">Email <span class="text-danger">*</span></label>
                                <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}" required>
                            </div>
                            <div class="col-md-6">
                                <label for="phone" class="form-label">Phone</label>
                                <input type="text" class="form-control" id="phone" name="phone" value="{{ old('phone') }}">
                            </div>
                            <div class="col-md-6">
                                <label for="date_of_birth" class="form-label">Date of birth <span class="text-danger">*</span></label>
                                <input type="date" class="form-control" id="date_of_birth" name="date_of_birth" value="{{ old('date_of_birth') }}" required>
                            </div>
                            <div class="col-md-6">
                                <label for="nationality" class="form-label">Nationality / Residence <span class="text-danger">*</span></label>
                                <select class="form-select" id="nationality" name="nationality" required>
                                    <option value="">-- Select --</option>
                                    <option value="Beninese national" {{ old('nationality') === 'Beninese national' ? 'selected' : '' }}>Beninese national</option>
                                    <option value="permanent resident" {{ old('nationality') === 'permanent resident' ? 'selected' : '' }}>Permanent resident</option>
                                </select>
                            </div>
                            <div class="col-12">
                                <label for="university" class="form-label">Public university in Benin <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="university" name="university" value="{{ old('university') }}" required>
                            </div>
                            <div class="col-md-6">
                                <label for="programme" class="form-label">STEM programme <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="programme" name="programme" value="{{ old('programme') }}" placeholder="e.g. Biology, Chemistry, Computer Science" required>
                            </div>
                            <div class="col-md-6">
                                <label for="level" class="form-label">Level <span class="text-danger">*</span></label>
                                <select class="form-select" id="level" name="level" required>
                                    <option value="">-- Select --</option>
                                    <option value="undergraduate" {{ old('level') === 'undergraduate' ? 'selected' : '' }}>Undergraduate</option>
                                    <option value="masters" {{ old('level') === 'masters' ? 'selected' : '' }}>Master's</option>
                                </select>
                            </div>
                            <div class="col-12">
                                <label for="personal_statement" class="form-label">Brief personal statement (academic goals)</label>
                                <textarea class="form-control" id="personal_statement" name="personal_statement" rows="4" maxlength="2000">{{ old('personal_statement') }}</textarea>
                            </div>
                            <div class="col-12"><hr class="my-2"><h6 class="mt-3">Required documents (PDF, max 10 MB each)</h6></div>
                            <div class="col-md-6">
                                <label for="proof_enrolment" class="form-label">Proof of current enrolment <span class="text-danger">*</span></label>
                                <input type="file" class="form-control" id="proof_enrolment" name="proof_enrolment" accept=".pdf" required>
                            </div>
                            <div class="col-md-6">
                                <label for="transcript" class="form-label">Recent academic transcript <span class="text-danger">*</span></label>
                                <input type="file" class="form-control" id="transcript" name="transcript" accept=".pdf" required>
                            </div>
                            <div class="col-md-6">
                                <label for="support_letter" class="form-label">Support letter from faculty member <span class="text-danger">*</span></label>
                                <input type="file" class="form-control" id="support_letter" name="support_letter" accept=".pdf" required>
                            </div>
                            <div class="col-md-6">
                                <label for="id_document" class="form-label">National ID or birth certificate <span class="text-danger">*</span></label>
                                <input type="file" class="form-control" id="id_document" name="id_document" accept=".pdf,.jpg,.jpeg,.png" required>
                            </div>
                            <div class="col-12 mt-4">
                                <button type="submit" class="btn btn-danger btn-lg px-5">
                                    <i class="fas fa-paper-plane me-2"></i> Submit application
                                </button>
                                <a href="{{ route('philanthropyDetail', 'hardship-fund-women-stem') }}" class="btn btn-outline-secondary ms-2">Cancel</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
