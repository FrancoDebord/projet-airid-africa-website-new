<style>
    .qa-hero {
        display: flex;
        flex-wrap: wrap;
        align-items: center;
        gap: 2rem;
        margin-bottom: 2.5rem;
        padding: 1.5rem 0;
    }
    .qa-hero-text {
        flex: 1;
        min-width: 280px;
    }
    .qa-hero-text .lead {
        font-size: 1.1rem;
        line-height: 1.65;
        color: #444;
    }
    .qa-hero-image {
        flex: 0 0 320px;
        max-width: 100%;
        border-radius: 14px;
        overflow: hidden;
        box-shadow: 0 8px 30px rgba(0, 0, 0, 0.12);
        border: 1px solid rgba(0, 0, 0, 0.06);
    }
    .qa-hero-image img {
        width: 100%;
        height: 240px;
        object-fit: cover;
        object-position: center;
        display: block;
    }
    @media (min-width: 992px) {
        .qa-hero-image {
            flex: 0 0 380px;
        }
        .qa-hero-image img {
            height: 280px;
        }
    }
    @media (max-width: 767px) {
        .qa-hero {
            flex-direction: column;
            gap: 1.5rem;
        }
        .qa-hero-image {
            order: -1;
            width: 100%;
            max-width: 100%;
        }
        .qa-hero-image img {
            height: 220px;
        }
    }
    .qa-tile {
        background: #f8f9fa;
        border-radius: 14px;
        padding: 1.5rem 1.75rem;
        margin-bottom: 1.5rem;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.06);
        border-left: 4px solid #c20102;
    }
    .qa-tile h3 {
        font-size: 1.25rem;
        font-weight: 700;
        color: #1a1a1a;
        margin-bottom: 1rem;
        display: flex;
        align-items: center;
        gap: 0.5rem;
    }
    .qa-tile h3 i {
        color: #c20102;
    }
    .qa-tile p {
        font-size: 1rem;
        line-height: 1.65;
        color: #444;
        margin-bottom: 0.75rem;
    }
    .qa-tile p:last-of-type {
        margin-bottom: 0;
    }
    .qa-tile ul {
        list-style: none;
        padding: 0;
        margin: 0.75rem 0 1rem 0;
    }
    .qa-tile ul li {
        padding: 0.35rem 0 0.35rem 1.6rem;
        position: relative;
        font-size: 1rem;
        line-height: 1.55;
        color: #444;
    }
    .qa-tile ul li::before {
        content: '✓';
        position: absolute;
        left: 0;
        color: #c20102;
        font-weight: 700;
        font-size: 1.1rem;
    }
</style>

<div class="qa-hero">
    <div class="qa-hero-text">
        <p class="lead mb-0">
            AIRID operates an independent Quality Assurance (QA) system embedded across the full GLP lifecycle, ensuring continuous compliance and inspection readiness. This page describes our QA system, audit processes, and documentation standards.
        </p>
    </div>
    <div class="qa-hero-image">
        <img src="{{ asset('storage/assets_vendor/images/banner/49_54PM.jpg') }}" alt="AIRID – Quality Assurance System" loading="lazy">
    </div>
</div>

<div class="qa-tile">
    <h3><i class="fas fa-check-circle"></i> Quality Assurance</h3>
    <p>AIRID’s QA function ensures that studies are conducted in accordance with OECD GLP principles. Key elements include:</p>
    <ul>
        <li>Controlled document management (SOPs, templates, version control)</li>
        <li>Staff training and competency documentation</li>
        <li>Equipment calibration, maintenance, and validation</li>
        <li>Facility, process, and study-based inspections</li>
        <li>Deviation management and corrective/preventive actions (CAPAs)</li>
        <li>Secure data handling, controlled access, and long-term archiving</li>
    </ul>
    <p class="mb-0">The QA function operates independently of study conduct, in accordance with OECD GLP principles.</p>
</div>
