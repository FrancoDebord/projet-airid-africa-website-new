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
        border: 3px solid #c20102;
    }
    .glp-page-hero-image img {
        width: 100%;
        height: 240px;
        object-fit: cover;
        object-position: center;
        display: block;
    }
    .glp-certificats-image {
        margin-top: 2rem;
        margin-bottom: 2rem;
        border-radius: 14px;
        overflow: hidden;
        box-shadow: 0 8px 30px rgba(0, 0, 0, 0.1);
        border: 3px solid #c20102;
        background: #fff;
    }
    .glp-certificats-image img {
        width: 100%;
        height: auto;
        display: block;
        vertical-align: top;
        user-select: none;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
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
    .glp-page-tile .btn { margin-top: 0.5rem; }
</style>

{{-- <div class="glp-page-hero">
    <div class="glp-page-hero-text">
        <p class="lead mb-0">
        </p>
    </div>
     <div class="glp-page-hero-image">
        <img src="/assets/glp/Certificats.png" alt="AIRID – GLP Certification & SANAS" loading="lazy">
    </div> -
</div> --}}

<div class="glp-page-tile">
    <h3><i class="fas fa-award"></i> GLP Certification</h3>
    <p>AIRID’s GLP programme is aligned with OECD GLP principles and supports external oversight through recognised accreditation systems. This page provides information on GLP certification status, the role of SANAS, and recognition by regulators and sponsors.</p>
    <p class="mb-0">Information on GLP accreditation and inspection frameworks is available via SANAS (South African National Accreditation System).</p>



<div class="glp-certificats-image" oncontextmenu="return false;">
    <img src="{{ route('glp.certificate.image') }}" alt="GLP Certification – Certificats AIRID" loading="lazy" oncontextmenu="return false;" ondragstart="return false;">
</div>

{{-- <p class="mb-0"><strong>NB:</strong> The certificate shown is currently in the name of CREC/LSHTM. It will shortly be reissued in the name of AIRID; we will update this page with the new certificate once it is available.</p>
<p class="mt-2 mb-0">
<a href="https://www.sanas.co.za/" target="_blank" rel="noopener" class="btn btn-outline-danger">
    SANAS – Good Laboratory Practice (GLP) Accreditation <i class="fas fa-external-link-alt ms-1"></i>
</a>
</p> --}}
</div>

<script>
(function() {
    document.addEventListener('contextmenu', function(e) { e.preventDefault(); });
})();
</script>
