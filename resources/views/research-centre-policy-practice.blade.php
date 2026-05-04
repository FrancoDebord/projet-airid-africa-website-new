@extends('index')

@section('title', 'Centre for Policy, Systems and Implementation Research | AIRID Africa')

@section('css')
    <style>
        .policy-centre-banner { background-size: cover; background-position: center; }
        .policy-centre-intro {
            background: linear-gradient(135deg, rgba(194, 1, 2, 0.06) 0%, rgba(139, 1, 1, 0.06) 100%);
            padding: 2.5rem 2rem;
            border-radius: 20px;
            margin: 2rem 0;
            border-left: 5px solid #c20102;
        }
        .policy-centre-intro .section-lead { font-size: var(--airid-text-size); line-height: var(--airid-text-line-height); color: var(--airid-text-color); margin-bottom: 1rem; }
        .policy-centre-intro .section-lead:last-child { margin-bottom: 0; }
        .policy-section {
            background: #fff;
            border-radius: 16px;
            padding: 2rem 2.25rem;
            box-shadow: 0 5px 25px rgba(0,0,0,0.08);
            margin-bottom: 2rem;
            border-left: 5px solid #c20102;
        }
        .policy-section h2 {
            font-size: var(--airid-h2-size);
            font-weight: 700;
            color: var(--airid-title-color);
            margin-bottom: 1.25rem;
            padding-bottom: 0.75rem;
            border-bottom: 2px solid rgba(194, 1, 2, 0.2);
            display: flex;
            align-items: center;
            gap: 0.75rem;
        }
        .policy-section h2 i { color: #c20102; flex-shrink: 0; }
        .policy-section h3 {
            font-size: var(--airid-h3-size);
            font-weight: 700;
            color: var(--airid-title-color);
            margin-top: 1.5rem;
            margin-bottom: 0.75rem;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }
        .policy-section h3 i { color: #c20102; }
        .policy-section p { font-size: var(--airid-text-size); line-height: var(--airid-text-line-height); color: var(--airid-text-color); margin-bottom: 1rem; }
        .policy-section p:last-of-type { margin-bottom: 0; }
        .policy-list { list-style: none; padding: 0; margin: 0 0 1rem 0; }
        .policy-list li {
            padding: 0.4rem 0 0.4rem 1.75rem;
            position: relative;
            font-size: var(--airid-text-size);
            line-height: 1.6;
            color: var(--airid-text-color);
        }
        .policy-list li::before {
            content: '✓';
            position: absolute;
            left: 0;
            color: #c20102;
            font-weight: 700;
        }
        .policy-unit-card {
            background: #f8f9fa;
            border-radius: 14px;
            padding: 1.75rem;
            margin-bottom: 1.5rem;
            border: 1px solid #eee;
            border-left: 4px solid #c20102;
        }
        .policy-unit-card:last-child { margin-bottom: 0; }
        .policy-unit-card h3 { margin-top: 0; }
        .policy-unit-card .unit-tagline { font-size: var(--airid-tagline-size); color: #c20102; font-weight: 600; margin-bottom: 0.75rem; }
        .fade-in-up { opacity: 0; transform: translateY(24px); transition: opacity 0.6s ease, transform 0.6s ease; }
        .fade-in-up.visible { opacity: 1; transform: translateY(0); }
        .policy-nav-inpage {
            background: linear-gradient(145deg, #fff 0%, #f8f9fa 100%);
            border-radius: 16px;
            padding: 1.5rem 1.75rem;
            margin-bottom: 2.5rem;
            box-shadow: 0 4px 24px rgba(0,0,0,0.06);
            border: 1px solid rgba(194, 1, 2, 0.12);
        }
        .policy-nav-inpage .nav-label {
            font-weight: 700;
            color: var(--airid-title-color);
            margin-bottom: 1rem;
            font-size: 1rem;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }
        .policy-nav-inpage .nav-label i { color: #c20102; }
        .policy-nav-inpage .nav-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 0.6rem;
        }
        @media (min-width: 576px) { .policy-nav-inpage .nav-grid { grid-template-columns: repeat(2, 1fr); } }
        @media (min-width: 768px) { .policy-nav-inpage .nav-grid { grid-template-columns: repeat(4, 1fr); } }
        .policy-nav-inpage .nav-link-item {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            padding: 0.6rem 0.9rem;
            font-size: 0.875rem;
            color: #2c3e50;
            text-decoration: none;
            background: #fff;
            border-radius: 10px;
            border: 1px solid #e9ecef;
            transition: all 0.2s ease;
        }
        .policy-nav-inpage .nav-link-item:hover {
            background: #c20102;
            color: #fff;
            border-color: #c20102;
            text-decoration: none;
            transform: translateY(-1px);
            box-shadow: 0 4px 12px rgba(194, 1, 2, 0.25);
        }
        .policy-nav-inpage .nav-link-item i {
            font-size: 0.75rem;
            color: #c20102;
            flex-shrink: 0;
        }
        .policy-nav-inpage .nav-link-item:hover i { color: #fff; }

        .policy-quick-link-card {
            display: flex;
            align-items: center;
            gap: 1rem;
            padding: 1rem 1.25rem;
            background: #fff;
            border: 1px solid #eee;
            border-radius: 10px;
            text-decoration: none;
            color: var(--airid-text-color);
            transition: all 0.3s ease;
            box-shadow: 0 2px 8px rgba(0,0,0,0.06);
        }
        .policy-quick-link-card:hover {
            border-color: #c20102;
            color: #c20102;
            box-shadow: 0 4px 12px rgba(194, 1, 2, 0.15);
            transform: translateY(-2px);
            text-decoration: none;
        }
        .policy-quick-link-icon {
            width: 48px;
            height: 48px;
            border-radius: 10px;
            background: rgba(194, 1, 2, 0.1);
            color: #c20102;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.25rem;
            flex-shrink: 0;
        }
        .policy-quick-link-card:hover .policy-quick-link-icon {
            background: #c20102;
            color: #fff;
        }
        .policy-quick-link-label { font-weight: 600; font-size: var(--airid-text-size); flex: 1; }
        .policy-quick-link-arrow { color: #adb5bd; font-size: 0.9rem; transition: transform 0.3s ease; }
        .policy-quick-link-card:hover .policy-quick-link-arrow { color: #c20102; transform: translateX(4px); }

        .policy-mini-card {
            background: #fff;
            border-radius: 14px;
            padding: 1.5rem 1.75rem;
            box-shadow: 0 4px 20px rgba(0,0,0,0.08);
            border-left: 4px solid #c20102;
            height: 100%;
            transition: box-shadow 0.25s ease;
        }
        .policy-mini-card:hover { box-shadow: 0 8px 28px rgba(0,0,0,0.12); }
        .policy-mini-card h3 {
            font-size: var(--airid-h3-size);
            font-weight: 700;
            color: var(--airid-title-color);
            margin-bottom: 0.75rem;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }
        .policy-mini-card h3 i { color: #c20102; }
        .policy-mini-card p { font-size: var(--airid-text-size); line-height: var(--airid-text-line-height); color: var(--airid-text-color); margin-bottom: 0.75rem; }
        .policy-mini-card p.mb-0 { margin-bottom: 0; }
        .policy-mini-card .policy-list-mini { margin-bottom: 0.75rem; }
        .policy-mini-card .policy-list-mini li { padding: 0.3rem 0 0.3rem 1.5rem; font-size: 0.95em; }
        @media (max-width: 991px) { .policy-mini-card { margin-bottom: 0; } .row.g-4 > .col-lg-6:first-child .policy-mini-card { margin-bottom: 1rem; } }
        .policy-cards-second-row { margin-top: 1.5rem; }
        @media (min-width: 992px) { .policy-cards-second-row { margin-top: 2rem; } }
    </style>
@endsection

@section('content')
    <div id="banner-area" class="banner-area policy-centre-banner"
        style="background-image:url({{ asset('storage/assets_vendor/images/banner/banner2_new.png') }})">
        <div class="banner-text">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="banner-heading">
                            <h1 class="banner-title top_title fade-in-up">Centre for Policy, Systems and Implementation Research</h1>
                            <p class="text-white mt-3 fade-in-up tagline mb-0" style="font-size: 1.4rem;">
                                Translating Evidence into Policy, Practice, and Sustainable Impact
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <section class="py-5">
        <div class="container">
            <div class="policy-centre-intro fade-in-up">
                <p class="section-lead">
                    The Centre for Policy, Systems and Implementation Research focuses on understanding how public health interventions perform within real-world health systems and how scientific evidence can be translated into effective policy and programme decisions.
                </p>
                <p class="section-lead">
                    The Centre plays a critical role in bridging the gap between evidence generation and implementation, ensuring that research findings inform decision-making, improve programme delivery, and support sustainable health systems across Africa.
                </p>
            </div>

            <nav class="policy-nav-inpage fade-in-up" aria-label="Page sections">
                <div class="nav-label"><i class="fas fa-th-list"></i> On this page</div>
                <div class="nav-grid">
                    <a href="#mandate" class="nav-link-item"><i class="fas fa-gavel"></i> Mandate</a>
                    <a href="#scope" class="nav-link-item"><i class="fas fa-compass"></i> Scope of Work</a>
                    <a href="#units" class="nav-link-item"><i class="fas fa-sitemap"></i> Research Units</a>
                    <a href="#methods" class="nav-link-item"><i class="fas fa-flask"></i> Research Methods</a>
                    <a href="#contribution" class="nav-link-item"><i class="fas fa-handshake"></i> Contribution to Policy</a>
                    <a href="#themes" class="nav-link-item"><i class="fas fa-layer-group"></i> Cross-Cutting Themes</a>
                    <a href="#ethics" class="nav-link-item"><i class="fas fa-shield-alt"></i> Ethics & Governance</a>
                    <a href="#leadership" class="nav-link-item"><i class="fas fa-users-cog"></i> Leadership</a>
                </div>
            </nav>

            <div class="policy-section fade-in-up" id="mandate">
                <h2><i class="fas fa-gavel"></i> Mandate</h2>
                <p>
                    The mandate of the Centre for Policy, Systems and Implementation Research is to generate policy-relevant knowledge that strengthens health systems, improves intervention delivery, and supports evidence-informed decision-making.
                </p>
                <p class="mb-0">
                    The Centre evaluates not only whether interventions work, but how, why, and under what conditions they achieve impact when implemented at scale.
                </p>
            </div>

            <div class="policy-section fade-in-up" id="scope">
                <h2><i class="fas fa-compass"></i> Scope of Work</h2>
                <p>
                    The Centre undertakes applied and implementation-focused research to support national programmes, policymakers, and partners in optimising public health interventions.
                </p>
                <p><strong>Core areas of work include:</strong></p>
                <ul class="policy-list">
                    <li>Health policy and systems research</li>
                    <li>Economic evaluation and financing analysis</li>
                    <li>Implementation research and programme evaluation</li>
                    <li>Evidence translation and stakeholder engagement</li>
                </ul>
                <p class="mb-0">
                    Research activities are designed to inform practical decisions on intervention selection, delivery strategies, resource allocation, and scale-up.
                </p>
            </div>

            <div class="policy-section fade-in-up" id="units">
                <h2><i class="fas fa-sitemap"></i> Research Units within the Centre</h2>
                <div class="policy-unit-card">
                    <h3><i class="fas fa-landmark"></i> Health Policy & Economics Unit</h3>
                    <p class="unit-tagline">Supporting Evidence-Informed Decision-Making</p>
                    <p>
                        The Health Policy & Economics Unit provides analytical and economic evidence to support strategic decision-making in public health.
                    </p>
                    <p><strong>Key functions include:</strong></p>
                    <ul class="policy-list">
                        <li>Health policy and systems research</li>
                        <li>Cost-effectiveness and cost-utility analyses</li>
                        <li>Budget impact and affordability assessments</li>
                        <li>Health financing and sustainability analyses</li>
                        <li>Development of policy briefs, technical notes, and decision tools</li>
                        <li>Engagement with policymakers, programme managers, and partners</li>
                    </ul>
                    <p class="mb-0">
                        The Unit supports prioritisation of interventions and efficient use of limited resources by linking scientific evidence to economic and policy considerations.
                    </p>
                </div>
                <div class="policy-unit-card">
                    <h3><i class="fas fa-tasks"></i> Implementation & Evaluation Unit</h3>
                    <p class="unit-tagline">Understanding How Interventions Perform at Scale</p>
                    <p>
                        The Implementation & Evaluation Unit focuses on assessing the design, delivery, effectiveness, and scalability of complex health interventions in real-world settings.
                    </p>
                    <p><strong>Key functions include:</strong></p>
                    <ul class="policy-list">
                        <li>Implementation research and hybrid effectiveness–implementation studies</li>
                        <li>Process, outcome, and impact evaluations</li>
                        <li>Mixed-methods research integrating quantitative and qualitative approaches</li>
                        <li>Development of monitoring and evaluation frameworks</li>
                        <li>Learning, adaptation, and scale-up support</li>
                    </ul>
                    <p class="mb-0">
                        The Unit generates practical insights to improve programme design, delivery, and sustainability across diverse contexts.
                    </p>
                </div>
            </div>

            <div class="policy-section fade-in-up" id="methods">
                <h2><i class="fas fa-flask"></i> Research Methods and Approaches</h2>
                <p>
                    The Centre applies a range of methodological approaches to capture the complexity of health systems and intervention delivery, including:
                </p>
                <ul class="policy-list">
                    <li>Qualitative and quantitative research methods</li>
                    <li>Mixed-methods and participatory approaches</li>
                    <li>Policy analysis and stakeholder mapping</li>
                    <li>Economic modelling and financial analysis</li>
                    <li>Embedded research within programmes</li>
                </ul>
                <p class="mb-0">
                    These approaches ensure that findings are context-specific, actionable, and relevant to decision-makers.
                </p>
            </div>

            <div class="row g-4 fade-in-up">
                <div class="col-lg-6" id="contribution">
                    <div class="policy-mini-card">
                        <h3><i class="fas fa-handshake"></i> Contribution to Policy and Practice</h3>
                        <p>
                            The Centre for Policy, Systems and Implementation Research actively supports evidence-to-action pathways by:
                        </p>
                        <ul class="policy-list policy-list-mini">
                            <li>Working closely with national disease control programmes</li>
                            <li>Engaging policymakers throughout the research process</li>
                            <li>Translating findings into policy-relevant products</li>
                            <li>Supporting adaptation and scale-up of effective interventions</li>
                        </ul>
                        <p class="mb-0">
                            By embedding research within programmes and policy processes, the Centre ensures that evidence contributes directly to improved public health outcomes.
                        </p>
                    </div>
                </div>
                <div class="col-lg-6" id="themes">
                    <div class="policy-mini-card">
                        <h3><i class="fas fa-layer-group"></i> Cross-Cutting Themes</h3>
                        <p>
                            The Centre integrates AIRID’s cross-cutting themes across all its activities, including:
                        </p>
                        <ul class="policy-list policy-list-mini">
                            <li>Equity, gender, and social inclusion</li>
                            <li>Ethics, safeguarding, and community engagement</li>
                            <li>Capacity strengthening and institutional learning</li>
                            <li>Knowledge translation and policy engagement</li>
                        </ul>
                        <p class="mb-0">
                            These themes ensure that research is inclusive, ethical, and aligned with broader health system goals.
                        </p>
                    </div>
                </div>
            </div>

            <div class="row g-4 fade-in-up policy-cards-second-row" id="ethics">
                <div class="col-lg-6">
                    <div class="policy-mini-card">
                        <h3><i class="fas fa-shield-alt"></i> Ethics, Quality, and Governance</h3>
                        <p class="mb-0">
                            All research conducted by the Centre adheres to approved protocols and complies with national and international ethical and regulatory standards. Strong governance, quality assurance, and reporting systems ensure accountability, scientific integrity, and alignment with AIRID’s institutional objectives.
                        </p>
                    </div>
                </div>
                <div class="col-lg-6" id="leadership">
                    <div class="policy-mini-card">
                        <h3><i class="fas fa-users-cog"></i> Leadership and Collaboration</h3>
                        <p class="mb-0">
                            The Centre is led by a Centre Director and supported by Unit Heads, working closely with other AIRID Research Centres to promote multidisciplinary collaboration. This integrated structure allows policy, systems, and implementation research to be closely linked with biological, clinical, and analytical evidence across the Institute.
                        </p>
                    </div>
                </div>
            </div>

            <div class="row mt-4 g-3 justify-content-center">
                <div class="col-md-6 col-lg-5">
                    <a href="{{ route('researchPolicyPracticePage') }}" class="policy-quick-link-card">
                        <span class="policy-quick-link-icon"><i class="fas fa-th-large"></i></span>
                        <span class="policy-quick-link-label">Research Centres overview</span>
                        <span class="policy-quick-link-arrow"><i class="fas fa-arrow-right"></i></span>
                    </a>
                </div>
                <div class="col-md-6 col-lg-5">
                    <a href="{{ route('researchCentreVectorBiologyPage') }}" class="policy-quick-link-card">
                        <span class="policy-quick-link-icon"><i class="fas fa-bug"></i></span>
                        <span class="policy-quick-link-label">Centre for Vector Biology and Intervention Research</span>
                        <span class="policy-quick-link-arrow"><i class="fas fa-arrow-right"></i></span>
                    </a>
                </div>
                <div class="col-md-6 col-lg-5">
                    <a href="{{ route('researchCentreDataSciencePage') }}" class="policy-quick-link-card">
                        <span class="policy-quick-link-icon"><i class="fas fa-chart-line"></i></span>
                        <span class="policy-quick-link-label">Centre for Data Science, Analytics and Modelling</span>
                        <span class="policy-quick-link-arrow"><i class="fas fa-arrow-right"></i></span>
                    </a>
                </div>
            </div>
            <div class="row mt-4">
                <div class="col-12 text-center">
                    <a href="{{ route('researchActivitiesPage') }}" class="btn btn-danger btn-lg">
                        <i class="fas fa-flask me-2"></i>Our research activities
                    </a>
                    <a href="{{ route('allProjectsPage') }}" class="btn btn-outline-danger btn-lg ms-2">
                        <i class="fas fa-project-diagram me-2"></i>Research projects
                    </a>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('js')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var observer = new IntersectionObserver(function(entries) {
                entries.forEach(function(entry) {
                    if (entry.isIntersecting) { entry.target.classList.add('visible'); observer.unobserve(entry.target); }
                });
            }, { threshold: 0.1, rootMargin: '0px 0px -30px 0px' });
            document.querySelectorAll('.fade-in-up').forEach(function(el) { observer.observe(el); });
        });
    </script>
@endsection
