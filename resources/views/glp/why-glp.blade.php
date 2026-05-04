<style>
    .why-glp-hero {
        display: flex;
        flex-wrap: wrap;
        align-items: center;
        gap: 2rem;
        margin-bottom: 2.5rem;
        padding: 1.5rem 0;
    }
    .why-glp-hero-text {
        flex: 1;
        min-width: 280px;
    }
    .why-glp-hero-text .lead {
        font-size: 1.1rem;
        line-height: 1.65;
        color: #444;
    }
    .why-glp-hero-image {
        flex: 0 0 320px;
        max-width: 100%;
        border-radius: 14px;
        overflow: hidden;
        box-shadow: 0 8px 30px rgba(0, 0, 0, 0.12);
        border: 1px solid rgba(0, 0, 0, 0.06);
    }
    .why-glp-hero-image img {
        width: 100%;
        height: 240px;
        object-fit: cover;
        object-position: center;
        display: block;
    }
    @media (min-width: 992px) {
        .why-glp-hero-image {
            flex: 0 0 380px;
        }
        .why-glp-hero-image img {
            height: 280px;
        }
    }
    @media (max-width: 767px) {
        .why-glp-hero {
            flex-direction: column;
            gap: 1.5rem;
        }
        .why-glp-hero-image {
            order: -1;
            width: 100%;
            max-width: 100%;
        }
        .why-glp-hero-image img {
            height: 220px;
        }
    }
    .why-glp-tile {
        background: #f8f9fa;
        border-radius: 14px;
        padding: 1.5rem 1.75rem;
        margin-bottom: 1.5rem;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.06);
        border-left: 4px solid #c20102;
    }
    .why-glp-tile h3 {
        font-size: 1.25rem;
        font-weight: 700;
        color: #1a1a1a;
        margin-bottom: 1rem;
        display: flex;
        align-items: center;
        gap: 0.5rem;
    }
    .why-glp-tile h3 i {
        color: #c20102;
    }
    .why-glp-tile p {
        font-size: 1rem;
        line-height: 1.65;
        color: #444;
        margin-bottom: 0.75rem;
    }
    .why-glp-tile p:last-of-type {
        margin-bottom: 0;
    }
    .why-glp-tile ul {
        list-style: none;
        padding: 0;
        margin: 0.75rem 0 1rem 0;
    }
    .why-glp-tile ul li {
        padding: 0.35rem 0 0.35rem 1.6rem;
        position: relative;
        font-size: 1rem;
        line-height: 1.55;
        color: #444;
    }
    .why-glp-tile ul li::before {
        content: '✓';
        position: absolute;
        left: 0;
        color: #c20102;
        font-weight: 700;
        font-size: 1.1rem;
    }
</style>

<div class="why-glp-hero">
    <div class="why-glp-hero-text">
        <p class="lead mb-0">
            OECD Good Laboratory Practice (GLP) is a regulatory quality system required for studies that support the World Health Organization (WHO) prequalification of vector control products, including insecticide-treated nets (ITNs), indoor residual spraying (IRS) products, spatial repellents, and other vector control tools.
        </p>
    </div>
    <div class="why-glp-hero-image">
        <div style="position: relative; padding-bottom: 56.25%; height: 0; overflow: hidden; border-radius: 13px; box-shadow: 0 8px 30px rgba(0,0,0,0.12);">
            <iframe
                src="https://www.youtube.com/embed/dfZ5DqJHjQg?rel=0&modestbranding=1&iv_load_policy=3&showinfo=0"
                title="Good Laboratory Practice – Explanatory Video"
                frameborder="0"
                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                allowfullscreen
                style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; border-radius: 13px;">
            </iframe>
        </div>
    </div>
</div>

<div class="why-glp-tile">
    <h3><i class="fas fa-certificate"></i> Why GLP </h3>
    {{-- <p>This page explains why Good Laboratory Practice (GLP) matters at AIRID, the scope of our GLP activities, and how it benefits sponsors and regulators.</p> --}}
    <p>GLP ensures that:</p>
    <ul>
        <li>Studies are planned, conducted, monitored, recorded, reported, and archived in a standardised and transparent manner</li>
        <li>Data integrity, traceability, and reproducibility are assured</li>
        <li>Study results are acceptable to WHO review bodies, national regulatory authorities, and international procurement agencies</li>
    </ul>
    <p class="mb-0">By conducting studies under GLP, AIRID enables partners to generate regulatory-grade evidence suitable for WHO prequalification, regulatory review, and policy decision-making.</p>
</div>
