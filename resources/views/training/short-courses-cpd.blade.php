<style>
    .trl-tile-sc {
        background: #fff;
        border-radius: 14px;
        padding: 1.5rem 1.75rem;
        margin-bottom: 1.5rem;
        box-shadow: 0 4px 20px rgba(0,0,0,0.08);
        border-left: 4px solid #c20102;
    }
    .trl-tile-sc h3 { font-size: 1.2rem; font-weight: 700; color: #1a1a1a; margin-bottom: 0.75rem; }
    .trl-tile-sc h4 { font-size: 1.05rem; font-weight: 700; color: #1a1a1a; margin: 1rem 0 0.5rem; }
    .trl-tile-sc p { font-size: 1rem; line-height: 1.65; color: #444; margin-bottom: 0.6rem; }
    .trl-tile-sc p:last-of-type { margin-bottom: 0; }
    .trl-tile-sc ul { list-style: none; padding: 0; margin: 0.5rem 0 0.75rem 0; }
    .trl-tile-sc ul li { padding: 0.25rem 0 0.25rem 1.4rem; position: relative; font-size: 1rem; line-height: 1.55; color: #444; }
    .trl-tile-sc ul li::before { content: '✓'; position: absolute; left: 0; color: #c20102; font-weight: 700; }
    .section-title-sc { font-size: 1.25rem; font-weight: 700; color: #1a1a1a; margin-bottom: 1rem; display: flex; align-items: center; gap: 0.5rem; }
    .section-title-sc i { color: #c20102; }
    .cpd-direction-card {
        display: block;
        background: #fff;
        border-radius: 14px;
        overflow: hidden;
        box-shadow: 0 4px 20px rgba(0,0,0,0.08);
        border: 2px solid #c20102;
        text-decoration: none;
        color: inherit;
        transition: all 0.3s ease;
        margin-bottom: 1.5rem;
    }
    .cpd-direction-card:hover { box-shadow: 0 12px 32px rgba(194, 1, 2, 0.2); text-decoration: none; color: inherit; transform: translateY(-3px); }
    .cpd-direction-card .card-body { padding: 1.25rem 1.5rem; position: relative; padding-right: 3.5rem; }
    .cpd-direction-card .card-title { font-size: 1.15rem; font-weight: 700; color: #1a1a1a; margin-bottom: 0.4rem; }
    .cpd-direction-card:hover .card-title { color: #c20102; }
    .cpd-direction-card .card-desc { font-size: 0.95rem; line-height: 1.55; color: #555; margin-bottom: 0; }
    .cpd-direction-card .card-arrow {
        position: absolute;
        right: 1.25rem;
        top: 50%;
        transform: translateY(-50%);
        width: 42px;
        height: 42px;
        border-radius: 50%;
        background: rgba(194, 1, 2, 0.12);
        color: #c20102;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.1rem;
        transition: all 0.3s ease;
    }
    .cpd-direction-card:hover .card-arrow { background: #c20102; color: #fff; transform: translateY(-50%) translateX(4px); }
    .cpd-catalogue-card {
        display: flex;
        flex-wrap: wrap;
        background: #fff;
        border-radius: 14px;
        overflow: hidden;
        box-shadow: 0 4px 24px rgba(0,0,0,0.1);
        border: 2px solid #c20102;
        margin-bottom: 1.5rem;
        text-decoration: none;
        color: inherit;
        transition: all 0.3s ease;
        max-width: 100%;
    }
    .cpd-catalogue-card:hover { text-decoration: none; color: inherit; box-shadow: 0 8px 32px rgba(194, 1, 2, 0.18); }
    .cpd-catalogue-card .cpd-catalogue-img {
        flex: 0 0 380px;
        min-height: 280px;
        background: #1a1a1a;
        background-size: cover;
        background-position: center;
    }
    .cpd-catalogue-card .cpd-catalogue-body {
        flex: 1;
        min-width: 280px;
        padding: 1.5rem 1.75rem;
        display: flex;
        flex-direction: column;
        justify-content: center;
    }
    .cpd-catalogue-card .cpd-catalogue-title {
        font-size: 1.25rem;
        font-weight: 700;
        color: #c20102;
        margin-bottom: 0.5rem;
    }
    .cpd-catalogue-card .cpd-catalogue-desc {
        font-size: 1rem;
        line-height: 1.6;
        color: #444;
        margin-bottom: 0;
    }
    .cpd-catalogue-card .cpd-catalogue-cta {
        margin-top: 0.75rem;
        font-weight: 600;
        color: #c20102;
        font-size: 0.95rem;
    }
    .cpd-catalogue-card:hover .cpd-catalogue-cta { text-decoration: underline; }
    /* Tablette : image un peu réduite pour éviter débordement */
    @media (max-width: 991px) {
        .cpd-catalogue-card .cpd-catalogue-img { flex: 0 0 100%; min-height: 220px; }
        .cpd-catalogue-card .cpd-catalogue-body { min-width: 0; }
    }
    /* Mobile : empilage vertical, image et texte bien lisibles */
    @media (max-width: 767px) {
        .cpd-catalogue-card {
            border-radius: 12px;
            margin-left: 0;
            margin-right: 0;
        }
        .cpd-catalogue-card .cpd-catalogue-img {
            flex: 0 0 100%;
            width: 100%;
            min-height: 200px;
            max-height: 220px;
        }
        .cpd-catalogue-card .cpd-catalogue-body {
            min-width: 0;
            padding: 1.25rem 1rem;
            flex: 1 1 100%;
        }
        .cpd-catalogue-card .cpd-catalogue-title {
            font-size: 1.1rem;
            line-height: 1.35;
        }
        .cpd-catalogue-card .cpd-catalogue-desc {
            font-size: 0.95rem;
            line-height: 1.55;
        }
        .cpd-catalogue-card .cpd-catalogue-cta {
            font-size: 0.9rem;
        }
    }
    /* Très petit écran */
    @media (max-width: 375px) {
        .cpd-catalogue-card .cpd-catalogue-img { min-height: 180px; max-height: 200px; }
        .cpd-catalogue-card .cpd-catalogue-body { padding: 1rem 0.85rem; }
        .cpd-catalogue-card .cpd-catalogue-title { font-size: 1rem; }
        .cpd-catalogue-card .cpd-catalogue-desc { font-size: 0.9rem; }
    }
</style>

{{-- Cadre catalogue : image + texte, lien vers le catalogue (short-courses) --}}
<a href="{{ route('pageTraining', 'short-courses') }}" class="cpd-catalogue-card">
    <div class="cpd-catalogue-img" style="background-image: url('{{ asset('storage/assets_vendor/images/banner/IMG_7460.jpg') }}');"></div>
    <div class="cpd-catalogue-body">
        <h3 class="cpd-catalogue-title">View full course catalogue &amp; fees</h3>
        <p class="cpd-catalogue-desc">Download the short courses brochure, see duration and fees (USD), and find contact details to apply or request customised training.</p>
        <span class="cpd-catalogue-cta">View catalogue and fees <i class="fas fa-arrow-right ms-1"></i></span>
    </div>
</a>

<div class="trl-tile-sc">
    <h3>SHORT COURSES &amp; CONTINUING PROFESSIONAL DEVELOPMENT</h3>
    <p><strong>Targeted, Applied Training for Infectious Disease Control and Public Health Practice</strong></p>
    <p>AIRID's Short Courses and Continuing Professional Development (CPD) programmes provide focused, competency-based training designed to strengthen practical skills in infectious disease research, surveillance, diagnostics, vector control, and programme implementation.</p>
    <p>These courses are designed for professionals working in public health programmes, laboratories, research institutions, NGOs, and government agencies, and are delivered through AIRID's research platforms, laboratories, and field sites.</p>
    <p class="mb-0">Short courses form a core pillar of AIRID's education and capacity-strengthening mission, complementing its MSc and Professional Diploma programmes.</p>
</div>

<div class="row g-4">
    <div class="col-lg-6">
        <div class="trl-tile-sc h-100">
            <h3>Purpose of AIRID Short Courses</h3>
            <p>AIRID's short courses are designed to:</p>
            <ul>
                <li>Address urgent skills gaps in infectious disease control and surveillance</li>
                <li>Provide hands-on, applied training linked to real research and programme settings</li>
                <li>Support continuing professional development for public health practitioners</li>
                <li>Strengthen institutional and workforce capacity at national and regional levels</li>
            </ul>
            <p class="mb-0">Courses are modular and flexible, allowing participants and institutions to select training aligned with their operational needs.</p>
        </div>
    </div>
    <div class="col-lg-6">
        <div class="trl-tile-sc h-100">
            <h3>Who the Courses Are For</h3>
            <p>AIRID short courses are suitable for:</p>
            <ul>
                <li>Public health programme officers and managers</li>
                <li>Laboratory scientists and technicians</li>
                <li>Entomologists and vector control specialists</li>
                <li>Epidemiologists and surveillance officers</li>
                <li>Researchers and data analysts</li>
                <li>Regulatory, ethics, and quality assurance personnel</li>
            </ul>
            <p class="mb-0">Entry requirements are defined per course and are based on relevant academic or professional background.</p>
        </div>
    </div>
</div>

<div class="trl-tile-sc">
    <h3>Delivery Approach</h3>
    <p>Short courses are delivered using a blend of:</p>
    <ul>
        <li>Interactive lectures and seminars</li>
        <li>Laboratory-based practical sessions</li>
        <li>Field and semi-field exercises</li>
        <li>Case studies and problem-based learning</li>
        <li>Group work and applied assignments</li>
    </ul>
    <p>Training is delivered by AIRID scientists and technical staff, with contributions from national and international experts where appropriate.</p>
    <p><strong>Courses may be delivered:</strong></p>
    <ul>
        <li>On-site at AIRID facilities</li>
        <li>As customised training for institutions and programmes</li>
        <li>Through blended or modular formats, depending on course design</li>
    </ul>
</div>

<div class="trl-tile-sc">
    <h3>Portfolio of Short Courses</h3>
    <p>AIRID offers a structured portfolio of short courses covering key thematic areas in infectious disease research and control.</p>
    <p class="mt-2"><a href="{{ route('pageTraining', 'short-courses') }}" class="btn btn-danger">Download Short Courses Brochure / View Catalogue <i class="fas fa-arrow-right ms-1"></i></a></p>
</div>

<div class="row g-4">
    <div class="col-lg-4">
        <div class="trl-tile-sc h-100">
            <h3>Certification and Recognition</h3>
            <p>Participants who successfully complete AIRID short courses receive:</p>
            <ul>
                <li>Certificates of completion issued by AIRID</li>
                <li>Recognition aligned with continuing professional development principles</li>
            </ul>
            <p class="mb-0">Where applicable, courses may contribute to professional or institutional CPD requirements, subject to partner and regulatory arrangements.</p>
        </div>
    </div>
    <div class="col-lg-4">
        <div class="trl-tile-sc h-100">
            <h3>Customised and Institutional Training</h3>
            <p>In addition to scheduled courses, AIRID offers customised short courses tailored to the needs of:</p>
            <ul>
                <li>National disease control programmes</li>
                <li>Laboratories and research institutions</li>
                <li>NGOs and implementing partners</li>
                <li>Government agencies</li>
            </ul>
            <p class="mb-0">Customised courses can be adapted in content, duration, and delivery format to meet specific institutional objectives.</p>
        </div>
    </div>
    <div class="col-lg-4">
        <div class="trl-tile-sc h-100">
            <h3>Governance and Quality Assurance</h3>
            <p>AIRID short courses operate under the Institute's education and training governance framework, with:</p>
            <ul>
                <li>Designated course coordinators</li>
                <li>Defined curricula and learning objectives</li>
                <li>Participant feedback and periodic review</li>
            </ul>
            <p class="mb-0">This ensures quality, relevance, and continuous improvement across the short-course portfolio.</p>
        </div>
    </div>
</div>

<div class="trl-tile-sc">
    <h3>Strategic Value</h3>
    <p>AIRID's short courses:</p>
    <ul>
        <li>Strengthen applied skills critical for infectious disease control</li>
        <li>Support workforce development and institutional capacity</li>
        <li>Complement AIRID's research and academic training programmes</li>
        <li>Contribute to sustainable, African-led public health expertise</li>
    </ul>
</div>

<p class="mt-2"><a href="{{ route('educationTrainingPage') }}#training-pathways" class="btn btn-outline-danger">Back to Training &amp; Capacity Strengthening <i class="fas fa-arrow-right ms-1"></i></a></p>
