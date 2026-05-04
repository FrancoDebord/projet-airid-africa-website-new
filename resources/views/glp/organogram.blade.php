<style>
    .glp-page-hero {
        display: flex;
        flex-wrap: wrap;
        align-items: center;
        gap: 2rem;
        margin-bottom: 2.5rem;
        padding: 1.5rem 0;
    }
    .glp-page-hero-text {
        flex: 1;
        min-width: 280px;
    }
    .glp-page-hero-text .lead {
        font-size: 1.1rem;
        line-height: 1.65;
        color: #444;
    }
    .glp-page-hero-image {
        flex: 0 0 320px;
        max-width: 100%;
        border-radius: 14px;
        overflow: hidden;
        box-shadow: 0 8px 30px rgba(0, 0, 0, 0.12);
        border: 1px solid rgba(0, 0, 0, 0.06);
    }
    .glp-page-hero-image img {
        width: 100%;
        height: 240px;
        object-fit: cover;
        object-position: center;
        display: block;
    }
    @media (min-width: 992px) {
        .glp-page-hero-image { flex: 0 0 380px; }
        .glp-page-hero-image img { height: 280px; }
    }
    @media (max-width: 767px) {
        .glp-page-hero { flex-direction: column; gap: 1.5rem; }
        .glp-page-hero-image { order: -1; width: 100%; max-width: 100%; }
        .glp-page-hero-image img { height: 220px; }
    }
    .glp-page-tile {
        background: #f8f9fa;
        border-radius: 14px;
        padding: 1.5rem 1.75rem;
        margin-bottom: 1.5rem;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.06);
        border-left: 4px solid #c20102;
    }
    .glp-page-tile h3 {
        font-size: 1.25rem;
        font-weight: 700;
        color: #1a1a1a;
        margin-bottom: 1rem;
        display: flex;
        align-items: center;
        gap: 0.5rem;
    }
    .glp-page-tile h3 i { color: #c20102; }
    .glp-page-tile p {
        font-size: 1rem;
        line-height: 1.65;
        color: #444;
        margin-bottom: 0.75rem;
    }
    .glp-page-tile p:last-of-type { margin-bottom: 0; }
    .glp-page-tile .role-title {
        color: #1a1a1a;
        font-weight: 700;
        margin-bottom: 0.25rem;
    }
    .glp-page-tile .btn { margin-top: 0.5rem; }
    .glp-process-image {
        margin-top: 2rem;
        margin-bottom: 2rem;
        border-radius: 14px;
        overflow: hidden;
        box-shadow: 0 8px 30px rgba(0, 0, 0, 0.1);
        border: 3px solid #c20102;
        background: #fff;
    }
    .glp-process-image img {
        width: 100%;
        height: auto;
        display: block;
        vertical-align: top;
    }
</style>

{{-- <div class="glp-page-hero">
    <div class="glp-page-hero-text">

    </div>
     <div class="glp-page-hero-image">
        <img src="{{ asset('storage/assets_vendor/images/banner/banner2_new.png') }}" alt="AIRID – GLP Organogram" loading="lazy">
    </div>
</div> --}}
<p class=" mb-0">
    AIRID operates a fully traceable GLP system in which product testing is systematically documented from receipt of test items through study conduct to final archiving. Records for each stage are securely maintained to ensure full traceability and compliance.</p>
<div class="glp-process-image">
    <img src="{{ asset('assets/glp/GLP_process.png') }}" alt="GLP process – Pre-testing, Testing and Post-testing phases" loading="lazy">
</div>
<div class="glp-page-tile">
    <h3><i class="fas fa-project-diagram"></i>GLP organizational structure</h3>
    {{-- <p>AIRID maintains a defined GLP organisational structure to ensure compliance with OECD GLP principles, clear accountability, and independent quality oversight.</p> --}}
    <p><strong class="role-title">Facility Manager</strong><br>Overall responsibility for the GLP test facility, including resources, infrastructure, staff competency, and compliance with GLP requirements.</p>
    <p><strong class="role-title">Study Directors</strong><br>Single-point responsibility for the scientific conduct, integrity, and reporting of individual GLP studies.</p>
    <p><strong class="role-title">Quality Assurance (QA) Managers</strong><br>Independent oversight of GLP compliance through inspections, audits, and review of study documentation, with formal QA statements.</p>
    <p><strong class="role-title">Archivist</strong><br>Secure storage, indexing, retrieval, and long-term preservation of GLP records, ensuring data integrity and traceability.</p>
    <p><strong class="role-title">Operational Teams (Laboratory, Semi-Field, Field)</strong><br>Conduct experimental activities in accordance with approved study plans, SOPs, and quality requirements.</p>
</div>


