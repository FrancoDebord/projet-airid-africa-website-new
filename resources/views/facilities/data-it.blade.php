<style>
    .fac-data-intro { background: linear-gradient(135deg, rgba(194, 1, 2, 0.06) 0%, rgba(139, 1, 1, 0.06) 100%); padding: 1.25rem 1.5rem; border-radius: 12px; margin-bottom: 1.5rem; border-left: 4px solid #c20102; }
    .fac-data-intro p { margin-bottom: 0.75rem; font-size: 1rem; line-height: 1.6; }
    .fac-data-intro p:last-child { margin-bottom: 0; }
    .fac-data-h2 { font-size: 1.25rem; font-weight: 700; color: #1a1a1a; margin: 1.75rem 0 0.75rem; display: flex; align-items: center; gap: 0.5rem; }
    .fac-data-h2 i { color: #c20102; }
    .fac-data-tile { background: #fafafa; border-radius: 12px; padding: 1.25rem 1.5rem; margin-bottom: 1.25rem; border-left: 4px solid #c20102; }
    .fac-data-tile p { margin-bottom: 0.6rem; font-size: 1rem; line-height: 1.6; }
    .fac-data-tile p:last-child { margin-bottom: 0; }
    .fac-data-tile ul { list-style: none; padding: 0; margin: 0.5rem 0 0.75rem 0; }
    .fac-data-tile ul li { padding: 0.2rem 0 0.2rem 1.35rem; position: relative; font-size: 1rem; line-height: 1.55; }
    .fac-data-tile ul li::before { content: '✓'; position: absolute; left: 0; color: #c20102; font-weight: 700; }
    .fac-data-row { margin-bottom: 2rem; }
    .fac-data-row .fac-data-tile { margin-bottom: 0; }
    .fac-data-image { border-radius: 14px; overflow: hidden; margin-bottom: 1.25rem; border: 3px solid #c20102; box-shadow: 0 4px 20px rgba(0,0,0,0.08); background: #f0f0f0; height: 100%; min-height: 240px; display: block; }
    .fac-data-row .fac-data-image { margin-bottom: 0; }
    .fac-data-image img { width: 100%; height: 100%; min-height: 240px; object-fit: cover; object-position: center; display: block; }
    @media (min-width: 992px) { .fac-data-row .fac-data-image { min-height: 280px; } .fac-data-row .fac-data-image img { min-height: 280px; } }
</style>

<p class="fac-data-intro">
    <strong>Secure, traceable data to support research and decision-making</strong><br>
    AIRID's Data Management & IT Platforms underpin the full research lifecycle—from laboratory assays and semi-field trials to field studies and surveillance. Robust data systems ensure that findings from vector control evaluations, insecticide testing, and public health studies are captured, validated, and available for analysis and reporting in line with GLP and international standards.
</p>

<div class="row align-items-stretch g-4 fac-data-row">
    <div class="col-lg-6 order-2 order-lg-1">
        <div class="fac-data-tile h-100">
            <p><strong>Role within AIRID</strong></p>
            <p>Data management at AIRID supports study directors, quality assurance, and operational teams by providing secure storage, version control, and audit trails for study data. This infrastructure is essential for regulatory submissions, WHO prequalification dossiers, and publication-ready evidence.</p>
        </div>
    </div>
    <div class="col-lg-6 order-1 order-lg-2">
        <div class="fac-data-image h-100">
            <img src="{{ asset('storage/assets_vendor/images/banner/IMG_3179.jpg') }}" alt="Data Management & IT Platforms" loading="lazy">
        </div>
    </div>
</div>

<h2 class="fac-data-h2"><i class="fas fa-database"></i> Data & IT Capabilities</h2>
<div class="row align-items-stretch g-4 fac-data-row">
    <div class="col-lg-6 order-2 order-lg-1">
        <div class="fac-data-image h-100">
            <img src="{{ asset('storage/assets_vendor/images/banner/IMG_3160.jpg') }}" alt="Data and IT Capabilities" loading="lazy">
        </div>
    </div>
    <div class="col-lg-6 order-1 order-lg-2">
        <div class="fac-data-tile h-100">
            <p>Planned and existing capabilities include:</p>
            <ul>
                <li>Electronic data capture (EDC) for laboratory, semi-field, and field studies</li>
                <li>Secure, backed-up storage with access control and audit logging</li>
                <li>Integration with laboratory instruments and quality control systems</li>
                <li>Data validation, cleaning, and export for statistical analysis</li>
                <li>Support for GLP-compliant documentation and long-term archiving</li>
            </ul>
        </div>
    </div>
</div>

<h2 class="fac-data-h2"><i class="fas fa-link"></i> Integration with AIRID Research</h2>
<div class="row align-items-stretch g-4 fac-data-row">
    <div class="col-lg-6 order-2 order-lg-1">
        <div class="fac-data-tile h-100">
            <p>Data Management & IT Platforms connect across AIRID's facilities:</p>
            <ul>
                <li><strong>Bioassay and testing laboratories</strong> — assay results, batch tracking, and QC data</li>
                <li><strong>Experimental huts and semi-field platforms</strong> — entomological and behavioural data</li>
                <li><strong>Field and community studies</strong> — surveillance, trial, and monitoring data</li>
                <li><strong>Chemistry and molecular labs</strong> — analytical and genomic data</li>
            </ul>
            <p>This integrated approach ensures that data from each stage of the evaluation pathway can be combined for robust, policy-relevant conclusions.</p>
        </div>
    </div>
    <div class="col-lg-6 order-1 order-lg-2">
        <div class="fac-data-image h-100">
            <img src="{{ asset('storage/assets_vendor/images/banner/IMG_1458.jpg') }}" alt="Integration with AIRID Research" loading="lazy">
        </div>
    </div>
</div>

<p class="fac-data-intro mt-3">
    Further details on specific platforms, tools, and data access procedures will be published as the IT and data management systems are fully deployed.
</p>
