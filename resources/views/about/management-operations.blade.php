<div class="about-team-content">
    <h2 class="section-title mb-4">
        <i class="fas fa-users-cog"></i> Management &amp; Operations
    </h2>

    <p class="section-lead mb-4">
        AIRID’s management and operations team ensures the smooth running of the institute, from finance and administration to communications and programme support.
    </p>

    <div class="team-block">
        <h3 class="team-block-title">
            <i class="fas fa-building"></i> Leadership &amp; Administration
        </h3>
        <p class="section-content mb-3">
            The Executive Director and senior management lead AIRID’s strategic direction and oversee day-to-day operations. Administrative and support functions include human resources, finance, grants management, communications, and IT.
        </p>
        <p class="section-content mb-0">
            Meet the people who keep AIRID running and aligned with our mission.
        </p>
    </div>

    <h3 class="team-block-title mt-4 mb-3">
        <i class="fas fa-user-friends"></i> Staff profiles
    </h3>
    @if(isset($staff) && $staff->isNotEmpty())
        <div class="staff-profiles-grid">
            @foreach($staff as $member)
                @php
                    $detailUrl = route('detail-staff', ['id' => $member->id, 'slug' => \Str::slug($member->prenom_personnel . '-' . $member->nom_personnel)]);
                @endphp
                <div class="staff-profile-card">
                    <a href="{{ $detailUrl }}" class="staff-profile-main">
                        @if($member->photo_url)
                            <img src="{{ $member->photo_url }}" alt="{{ $member->prenom_personnel }} {{ $member->nom_personnel }}" class="staff-profile-photo" loading="lazy">
                        @else
                            <div class="staff-profile-photo staff-profile-photo-placeholder"><i class="fas fa-user"></i></div>
                        @endif
                        <div class="staff-profile-info">
                            <strong class="staff-profile-name">{{ $member->titre }} {{ $member->prenom_personnel }} {{ $member->nom_personnel }}</strong>
                            @if($member->posteOccupe)
                                <span class="staff-profile-role">{{ $member->posteOccupe->intitule_poste }}</span>
                            @endif
                        </div>
                    </a>
                    <a href="{{ $detailUrl }}" class="staff-profile-direction social-link social-link-profile" title="Voir le profil">
                        <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
            @endforeach
        </div>
    @else
        <p class="section-content mb-3">No staff profiles in this category yet. They will appear here once assigned to Management &amp; Operations.</p>
    @endif

    <a href="{{ route('staffAirid', ['category' => 'management_operations']) }}" class="team-link mt-3">
        <i class="fas fa-user-friends"></i> View full team directory
    </a>
</div>

<style>
    .about-team-content { font-size: var(--airid-text-size); line-height: var(--airid-text-line-height); color: var(--airid-text-color); }
    .about-team-content .section-title { font-size: var(--airid-h2-size); font-weight: 700; color: var(--airid-title-color); margin-bottom: 0.5rem; padding-bottom: 0.5rem; border-bottom: 3px solid #c20102; display: flex; align-items: center; gap: 0.5rem; }
    .about-team-content .section-title i { color: #c20102; }
    .about-team-content .section-lead { font-size: var(--airid-text-size); color: var(--airid-text-color); line-height: var(--airid-text-line-height); }
    .about-team-content .section-content { font-size: var(--airid-text-size); line-height: var(--airid-text-line-height); color: var(--airid-text-color); margin-bottom: 0.75rem; text-align: justify; }
    .team-block { background: #f8f9fa; border-radius: 12px; padding: 1.5rem 1.75rem; margin-bottom: 1.5rem; border-left: 4px solid #c20102; box-shadow: 0 2px 12px rgba(0,0,0,0.04); }
    .team-block-title { font-size: var(--airid-h3-size); font-weight: 700; color: var(--airid-title-color); margin-bottom: 1rem; display: flex; align-items: center; gap: 0.5rem; }
    .team-block-title i { color: #c20102; font-size: var(--airid-h4-size); }
    .team-link { display: inline-flex; align-items: center; gap: 0.5rem; font-size: var(--airid-text-size); font-weight: 600; color: #c20102; text-decoration: none; padding: 0.5rem 1rem; border: 2px solid #c20102; border-radius: 8px; transition: all 0.25s ease; }
    .team-link:hover { background: #c20102; color: #fff; text-decoration: none; transform: translateX(4px); }
    .team-link i { font-size: 0.8rem; transition: transform 0.25s ease; }
    .team-link:hover i { transform: translateX(3px); }
    .staff-profiles-grid { display: grid; grid-template-columns: repeat(auto-fill, minmax(240px, 1fr)); gap: 1rem; margin-bottom: 1rem; }
    .staff-profile-card { display: flex; align-items: center; gap: 0.75rem; padding: 0.75rem 1rem; background: #fff; border-radius: 10px; border: 1px solid #eee; transition: all 0.25s ease; }
    .staff-profile-card:hover { border-color: #c20102; box-shadow: 0 4px 12px rgba(194,1,2,0.1); }
    .staff-profile-main { display: flex; align-items: center; gap: 1rem; flex: 1; min-width: 0; text-decoration: none; color: inherit; }
    .staff-profile-main:hover { color: inherit; text-decoration: none; }
    .staff-profile-photo { width: 56px; height: 56px; border-radius: 50%; object-fit: cover; flex-shrink: 0; }
    .staff-profile-photo-placeholder { background: #f0f0f0; display: flex; align-items: center; justify-content: center; color: #999; font-size: 1.25rem; }
    .staff-profile-info { display: flex; flex-direction: column; gap: 0.2rem; min-width: 0; }
    .staff-profile-name { font-size: var(--airid-text-size); font-weight: 700; color: var(--airid-title-color); line-height: 1.3; }
    .staff-profile-role { font-size: var(--airid-tagline-size); color: var(--airid-text-color); }
    .staff-profile-direction { display: flex; align-items: center; justify-content: center; width: 36px; height: 36px; min-width: 36px; border-radius: 50%; background: #e74c3c; color: #fff; text-decoration: none; transition: all 0.25s ease; font-size: 0.9rem; }
    .staff-profile-direction:hover { background: #9e9e9e; color: #fff; transform: translateY(-2px); text-decoration: none; }
    @media (max-width: 768px) { .team-block { padding: 1.25rem; } .staff-profiles-grid { grid-template-columns: 1fr; } }
</style>
