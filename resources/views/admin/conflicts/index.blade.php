@extends('admin.layout')

@section('content')
    <style>
        .form-select,
        .form-control {
            background-color: #fff !important;
            color: #000 !important;
        }

        @media print {
            body * {
                visibility: hidden !important;
            }
            .print-area, .print-area * {
                visibility: visible !important;
            }
            .print-area {
                position: absolute;
                left: 0;
                top: 0;
                width: 100%;
            }
            @page {
                size: A4 landscape;
                margin: 10mm;
            }
            .form-select,
            .form-control,
            .btn,
            .btn-group,
            .no-print {
                display: none !important;
            }
            .print-value {
                display: block !important;
                white-space: pre-line;
            }
            .table-responsive {
                overflow: visible !important;
            }
            table {
                width: 100% !important;
                page-break-inside: auto;
                font-size: 10px;
            }
            th, td {
                padding: 4px !important;
                vertical-align: top !important;
            }
            tr {
                page-break-inside: avoid;
                page-break-after: auto;
            }
        }
    </style>

    <div class="container-fluid pt-4 px-4">
        <div class="row g-4">
            <div class="col-12">
                <div class="bg-white rounded h-100 p-4">
                    <div class="d-flex justify-content-between align-items-center mb-4 no-print flex-wrap gap-2">
                        <div>
                            <h6 class="mb-0">Conflict of Interest Register</h6>
                            <p class="text-muted mb-0">Gestion des déclarations de conflit d'intérêts</p>
                        </div>
                        <div class="d-flex gap-2">
                            <a href="{{ route('admin.conflicts.access-code.form') }}" class="btn btn-outline-secondary btn-sm">
                                <i class="fa fa-key me-2"></i>Code d'accès formulaire
                            </a>
                            <a href="{{ route('admin.conflicts.export.pdf') }}" class="btn btn-danger btn-sm">
                                <i class="fas fa-file-pdf me-2"></i>Exporter PDF
                            </a>
                            <button type="button" class="btn btn-primary btn-sm" onclick="window.print()">
                                <i class="fas fa-print me-2"></i>Imprimer
                            </button>
                        </div>
                    </div>
                    <script>
                        document.addEventListener('DOMContentLoaded', function () {
                            const originalTitle = document.title;
                            window.addEventListener('beforeprint', function () {
                                document.title = 'Airid Conflict Of Interest Register';
                            });
                            window.addEventListener('afterprint', function () {
                                document.title = originalTitle;
                            });
                        });
                    </script>

                    @if(session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <i class="fas fa-check-circle me-2"></i>{{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        </div>
                    @endif

                    @if(session('error'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <i class="fas fa-exclamation-circle me-2"></i>{{ session('error') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        </div>
                    @endif

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

                    <div class="print-area">
                        <div class="print-value mb-2" style="display:none; font-weight: 700;">
                            SECTION B: CONFLICT OF INTEREST REGISTER TABLE
                        </div>
                        <div class="table-responsive">
                        <table class="table table-striped table-hover table-bordered align-middle">
                            <thead class="table-dark">
                                <tr>
                                    <th>Ref No.</th>
                                    <th>Name</th>
                                    <th>Role / Position</th>
                                    <th>Type of Engagement</th>
                                    <th>Nature of Conflict</th>
                                    <th>Category</th>
                                    <th>Description of Conflict</th>
                                    <th>Date Declared</th>
                                    <th>Objective of Declaration</th>
                                    <th>Meeting Date</th>
                                    <th>Management Action Agreed</th>
                                    <th>Responsible Officer</th>
                                    <th>Review Date</th>
                                    <th>Status</th>
                                    <th width="120" class="no-print">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($conflicts as $conflict)
                                    <tr>
                                        @php
                                            $isLocked = $conflict->status === 'Closed';
                                            $objectiveLabel = $conflict->objective_of_declaration;
                                            if ($objectiveLabel === 'Others' && $conflict->objective_other_text) {
                                                $objectiveLabel .= ': ' . $conflict->objective_other_text;
                                            }
                                        @endphp
                                        <td><strong>{{ $conflict->ref_no }}</strong></td>
                                        <td>{{ $conflict->full_name }}</td>
                                        <td>{{ $conflict->position_role ?? '-' }}</td>
                                        <td>{{ $conflict->engagement_type ?? '-' }}</td>
                                        <td>{{ $conflict->nature_of_conflict ?? '-' }}</td>
                                        <td>
                                            <form action="{{ route('admin.conflicts.update', $conflict->id) }}" method="POST">
                                                @csrf
                                                @method('PATCH')
                                                <select name="conflict_category" class="form-select form-select-sm mb-2" @disabled($isLocked)>
                                                    <option value="">--</option>
                                                    <option value="Actual" @selected($conflict->conflict_category === 'Actual')>Actual</option>
                                                    <option value="Potential" @selected($conflict->conflict_category === 'Potential')>Potential</option>
                                                    <option value="Perceived" @selected($conflict->conflict_category === 'Perceived')>Perceived</option>
                                                </select>
                                                <span class="print-value" style="display:none;">{{ $conflict->conflict_category ?? '-' }}</span>
                                        </td>
                                        <td style="min-width: 240px;">
                                            <div class="small text-muted" style="white-space: pre-line;">
                                                {{ $conflict->conflict_description ?? '-' }}
                                            </div>
                                        </td>
                                        <td>{{ optional($conflict->date_declared)->format('Y-m-d') ?? '-' }}</td>
                                        <td>{{ $objectiveLabel ?? '-' }}</td>
                                        <td>{{ optional($conflict->objective_meeting_date)->format('Y-m-d') ?? '-' }}</td>
                                        <td style="min-width: 220px;">
                                                <select name="management_action_agreed" class="form-select form-select-sm mb-2" @disabled($isLocked)>
                                                    <option value="">--</option>
                                                    <option value="Disclosure only" @selected($conflict->management_action_agreed === 'Disclosure only')>Disclosure only</option>
                                                    <option value="Recusal" @selected($conflict->management_action_agreed === 'Recusal')>Recusal</option>
                                                    <option value="Restricted access" @selected($conflict->management_action_agreed === 'Restricted access')>Restricted access</option>
                                                    <option value="Reassignment" @selected($conflict->management_action_agreed === 'Reassignment')>Reassignment</option>
                                                    <option value="Independent oversight" @selected($conflict->management_action_agreed === 'Independent oversight')>Independent oversight</option>
                                                    <option value="Termination of activity" @selected($conflict->management_action_agreed === 'Termination of activity')>Termination of activity</option>
                                                </select>
                                                <span class="print-value" style="display:none;">{{ $conflict->management_action_agreed ?? '-' }}</span>
                                        </td>
                                        <td style="min-width: 180px;">
                                                <input type="text" name="responsible_officer" value="{{ $conflict->responsible_officer ?? 'AKOTON Romaric' }}" class="form-control form-control-sm mb-2" @disabled($isLocked)>
                                                <span class="print-value" style="display:none;">{{ $conflict->responsible_officer ?? 'AKOTON Romaric' }}</span>
                                        </td>
                                        <td>
                                                <input type="date" name="review_date" value="{{ optional($conflict->review_date)->format('Y-m-d') }}" class="form-control form-control-sm mb-2" @disabled($isLocked)>
                                                <span class="print-value" style="display:none;">{{ optional($conflict->review_date)->format('Y-m-d') ?? '-' }}</span>
                                        </td>
                                        <td>
                                                <select name="status" class="form-select form-select-sm mb-2" @disabled($isLocked)>
                                                    <option value="Open" @selected($conflict->status === 'Open')>Open</option>
                                                    <option value="Managed" @selected($conflict->status === 'Managed')>Managed</option>
                                                    <option value="Closed" @selected($conflict->status === 'Closed')>Closed</option>
                                                </select>
                                                <span class="print-value" style="display:none;">{{ $conflict->status }}</span>
                                        </td>
                                        <td class="no-print">
                                            <div class="btn-group btn-group-sm" role="group">
                                                <a href="{{ route('admin.conflicts.show', $conflict->id) }}" class="btn btn-info" title="View details">
                                                    <i class="fas fa-eye"></i>
                                                </a>
                                                <button type="submit" class="btn btn-primary" title="Save" @disabled($isLocked)>
                                                    <i class="fas fa-save"></i>
                                                </button>
                                                @if($isLocked)
                                                    <button type="button" class="btn btn-secondary" disabled title="Locked">
                                                        <i class="fas fa-lock"></i>
                                                    </button>
                                                @endif
                                            </div>
                                        </td>
                                        </form>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="15" class="text-center py-5">
                                            <div class="empty-state">
                                                <i class="fas fa-clipboard-list fa-3x text-muted mb-3"></i>
                                                <h5 class="text-muted">Aucune déclaration trouvée</h5>
                                                <p class="text-muted mb-0">Les nouvelles déclarations apparaîtront ici.</p>
                                            </div>
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                        </div>

                    <div class="mt-4">
                        <h6 class="mb-2">SECTION C: FIELD DEFINITIONS (GUIDANCE)</h6>
                        <ul class="mb-0">
                            <li>Ref No.: Unique identifier for each declared conflict (e.g. COI-001)</li>
                            <li>Type of Engagement: Board member, staff, researcher, consultant, volunteer</li>
                            <li>Nature of Conflict: Financial, professional/institutional, personal relationship, research-related, other</li>
                            <li>Category: Actual (current), Potential (future), or Perceived (appearance of conflict)</li>
                            <li>Description of Conflict: Summary of the declared interest and context</li>
                            <li>Objective of Declaration: Meeting, Recruitment, Board Meeting, Contract Awarding, Partnerships and Collaborations, Others</li>
                            <li>Meeting Date: Required for Meeting or Others</li>
                            <li>Management Action Agreed: Disclosure only, recusal, restricted access, reassignment, independent oversight, termination of activity</li>
                            <li>Responsible Officer: Individual accountable for implementing management actions</li>
                            <li>Status:
                                Open (Declared, management pending),
                                Managed (Management actions in place),
                                Closed (Conflict resolved or no longer applicable)
                            </li>
                        </ul>
                    </div>
                    </div>

                    @if($conflicts->hasPages())
                        <div class="d-flex justify-content-between align-items-center mt-4 flex-wrap">
                            <div class="text-muted mb-2 mb-md-0">
                                Affichage de <strong>{{ $conflicts->firstItem() ?? 0 }}</strong> à <strong>{{ $conflicts->lastItem() ?? 0 }}</strong>
                                sur <strong>{{ $conflicts->total() }}</strong> déclaration(s)
                            </div>
                            <div>
                                {{ $conflicts->links() }}
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
