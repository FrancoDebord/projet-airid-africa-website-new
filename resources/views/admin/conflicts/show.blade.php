@extends('admin.layout')

@section('content')
    <div class="container-fluid pt-4 px-4">
        <div class="row g-4">
            <div class="col-12">
                <div class="bg-white rounded h-100 p-4">
                    <style>
                        @media print {
                            .no-print {
                                display: none !important;
                            }
                            .print-container {
                                box-shadow: none !important;
                            }
                        }
                    </style>

                    <div class="d-flex justify-content-between align-items-center mb-4 no-print">
                        <div>
                            <h6 class="mb-0">Conflict of Interest - Details</h6>
                            <p class="text-muted mb-0">Ref: {{ $conflict->ref_no }}</p>
                        </div>
                        <div class="btn-group btn-group-sm" role="group">
                            <button type="button" class="btn btn-primary" onclick="window.print()">
                                <i class="fas fa-print me-1"></i>Print / PDF
                            </button>
                            <a href="{{ route('admin.conflicts.index') }}" class="btn btn-secondary">
                                <i class="fas fa-arrow-left me-1"></i>Back to Register
                            </a>
                        </div>
                    </div>

                    <div class="table-responsive print-container">
                        <table class="table table-bordered">
                            <tbody>
                                <tr>
                                    <th width="260">Ref No.</th>
                                    <td>{{ $conflict->ref_no }}</td>
                                </tr>
                                <tr>
                                    <th>Name</th>
                                    <td>{{ $conflict->full_name }}</td>
                                </tr>
                                <tr>
                                    <th>Role / Position</th>
                                    <td>{{ $conflict->position_role ?? '-' }}</td>
                                </tr>
                                <tr>
                                    <th>Department / Unit</th>
                                    <td>{{ $conflict->department_unit ?? '-' }}</td>
                                </tr>
                                <tr>
                                    <th>Type of Engagement</th>
                                    <td>{{ $conflict->engagement_type ?? '-' }}</td>
                                </tr>
                                <tr>
                                    <th>Email Address</th>
                                    <td>{{ $conflict->email_address ?? '-' }}</td>
                                </tr>
                                <tr>
                                    <th>Date of Declaration</th>
                                    <td>{{ optional($conflict->declaration_date_personal)->format('Y-m-d') ?? '-' }}</td>
                                </tr>
                                <tr>
                                    <th>Objective of Declaration</th>
                                    <td>{{ $conflict->objective_of_declaration ?? '-' }}</td>
                                </tr>
                                <tr>
                                    <th>Objective (Other)</th>
                                    <td>{{ $conflict->objective_other_text ?? '-' }}</td>
                                </tr>
                                <tr>
                                    <th>Meeting Date</th>
                                    <td>{{ optional($conflict->objective_meeting_date)->format('Y-m-d') ?? '-' }}</td>
                                </tr>
                                <tr>
                                    <th>Financial Interest</th>
                                    <td>{{ $conflict->financial_interest ? 'Yes' : 'No' }}</td>
                                </tr>
                                <tr>
                                    <th>Financial Details</th>
                                    <td style="white-space: pre-line;">{{ $conflict->financial_details ?? '-' }}</td>
                                </tr>
                                <tr>
                                    <th>Professional/Institutional Interest</th>
                                    <td>{{ $conflict->professional_interest ? 'Yes' : 'No' }}</td>
                                </tr>
                                <tr>
                                    <th>Professional Details</th>
                                    <td style="white-space: pre-line;">{{ $conflict->professional_details ?? '-' }}</td>
                                </tr>
                                <tr>
                                    <th>Personal Relationship Interest</th>
                                    <td>{{ $conflict->personal_interest ? 'Yes' : 'No' }}</td>
                                </tr>
                                <tr>
                                    <th>Personal Details</th>
                                    <td style="white-space: pre-line;">{{ $conflict->personal_details ?? '-' }}</td>
                                </tr>
                                <tr>
                                    <th>Research-Related Interest</th>
                                    <td>{{ $conflict->research_interest ? 'Yes' : 'No' }}</td>
                                </tr>
                                <tr>
                                    <th>Research Details</th>
                                    <td style="white-space: pre-line;">{{ $conflict->research_details ?? '-' }}</td>
                                </tr>
                                <tr>
                                    <th>Other Information</th>
                                    <td style="white-space: pre-line;">{{ $conflict->other_information ?? '-' }}</td>
                                </tr>
                                <tr>
                                    <th>Nature of Conflict</th>
                                    <td>{{ $conflict->nature_of_conflict ?? '-' }}</td>
                                </tr>
                                <tr>
                                    <th>Category</th>
                                    <td>{{ $conflict->conflict_category ?? '-' }}</td>
                                </tr>
                                <tr>
                                    <th>Description of Conflict</th>
                                    <td style="white-space: pre-line;">{{ $conflict->conflict_description ?? '-' }}</td>
                                </tr>
                                <tr>
                                    <th>Date Declared (Register)</th>
                                    <td>{{ optional($conflict->date_declared)->format('Y-m-d') ?? '-' }}</td>
                                </tr>
                                <tr>
                                    <th>Management Action Agreed</th>
                                    <td style="white-space: pre-line;">{{ $conflict->management_action_agreed ?? '-' }}</td>
                                </tr>
                                <tr>
                                    <th>Responsible Officer</th>
                                    <td>{{ $conflict->responsible_officer ?? '-' }}</td>
                                </tr>
                                <tr>
                                    <th>Review Date</th>
                                    <td>{{ optional($conflict->review_date)->format('Y-m-d') ?? '-' }}</td>
                                </tr>
                                <tr>
                                    <th>Status</th>
                                    <td>{{ $conflict->status }}</td>
                                </tr>

                                <tr>
                                    <th>Declaration Name</th>
                                    <td>{{ $conflict->declaration_name ?? '-' }}</td>
                                </tr>
                                <tr>
                                    <th>Signature</th>
                                    <td>
                                        @if(!empty($conflict->declaration_signature))
                                            <img src="{{ $conflict->declaration_signature }}" alt="Signature" style="max-height: 120px; border: 1px solid #dee2e6; padding: 6px;">
                                        @else
                                            -
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <th>Finalized</th>
                                    <td>
                                        @if($conflict->is_finalized)
                                            Yes ({{ optional($conflict->finalized_at)->format('Y-m-d H:i') }})
                                        @else
                                            No
                                        @endif
                                    </td>
                                </tr>
                                {{-- <tr>
                                    <th>Signature Date</th>
                                    <td>{{ optional($conflict->declaration_date_sign)->format('Y-m-d') ?? '-' }}</td>
                                </tr> --}}
                            </tbody>
                        </table>
                    </div>

                    <div class="mt-4">
                        <h6 class="mb-2">SECTION: FIELD DEFINITIONS (GUIDANCE)</h6>
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
            </div>
        </div>
    </div>
@endsection
