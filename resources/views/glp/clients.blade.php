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
    .glp-page-tile ul {
        list-style: none;
        padding: 0;
        margin: 0.75rem 0 1rem 0;
    }
    .glp-page-tile ul li {
        padding: 0.35rem 0 0.35rem 1.6rem;
        position: relative;
        font-size: 1rem;
        line-height: 1.55;
        color: #444;
    }
    .glp-page-tile ul li::before {
        content: '✓';
        position: absolute;
        left: 0;
        color: #c20102;
        font-weight: 700;
        font-size: 1.1rem;
    }
</style>

<div class="glp-page-hero">
    <div class="glp-page-hero-text">
        <p class="lead mb-0">
            AIRID provides GLP testing services to vector control product manufacturers, research consortia, national programmes, and global health organisations. This page presents typical GLP clients and partners, and examples of collaborations.
        </p>
    </div>
    <div class="glp-page-hero-image">
        <img src="{{ asset('storage/assets_vendor/images/banner/banner2_new.png') }}" alt="AIRID – GLP Clients" loading="lazy">
    </div>
</div>

<div class="glp-page-tile">
    <h3><i class="fas fa-handshake"></i> GLP Clients</h3>
    <p>AIRID provides GLP testing services to:</p>
    <ul>
        <li>Vector control product manufacturers and developers</li>
        <li>Research consortia and academic partners</li>
        <li>National malaria control programmes and implementing agencies</li>
        <li>Donors and global health organisations</li>
    </ul>
    <p class="mb-0">Client engagement is subject to confidentiality and data protection requirements.</p>
</div>
