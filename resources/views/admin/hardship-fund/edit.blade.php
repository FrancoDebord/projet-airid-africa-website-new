@extends('admin.layout')

@section('content')
    <div class="container-fluid pt-4 px-4">
        <div class="row g-4">
            <div class="col-12">
                <div class="bg-white rounded h-100 p-4">
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <h6 class="mb-0">Modifier la candidature – {{ $application->full_name }}</h6>
                        <a href="{{ route('admin.hardship-fund.show', $application->id) }}" class="btn btn-secondary btn-sm">Voir</a>
                    </div>

                    @if(session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif
                    @if($errors->any())
                        <div class="alert alert-danger">
                            <ul class="mb-0">@foreach($errors->all() as $e)<li>{{ $e }}</li>@endforeach</ul>
                        </div>
                    @endif

                    <form action="{{ route('admin.hardship-fund.update', $application->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label for="status" class="form-label">Statut</label>
                            <select name="status" id="status" class="form-select" required>
                                @foreach(\App\Models\HardshipFundApplication::statusLabels() as $value => $label)
                                    <option value="{{ $value }}" {{ old('status', $application->status) === $value ? 'selected' : '' }}>{{ $label }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="admin_notes" class="form-label">Notes (admin)</label>
                            <textarea name="admin_notes" id="admin_notes" class="form-control" rows="4">{{ old('admin_notes', $application->admin_notes) }}</textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Enregistrer</button>
                        <a href="{{ route('admin.hardship-fund.index') }}" class="btn btn-outline-secondary">Annuler</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
