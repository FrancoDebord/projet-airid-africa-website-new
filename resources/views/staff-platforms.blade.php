@extends('index')

@section('title', 'Staff Platforms – AIRID Africa')

@section('css')
<style>
    .platforms-hero {
        background: linear-gradient(135deg, rgba(194,1,2,0.10) 0%, rgba(139,1,1,0.05) 50%, #f8f9fa 100%);
        padding: 2rem 0;
        border-bottom: 4px solid #c20102;
        text-align: center;
    }
    .platforms-hero h1 { font-size: 1.9rem; font-weight: 700; color: #1a1a1a; margin-bottom: 0.4rem; }
    .platforms-hero p { color: #555; font-size: 1rem; margin: 0; }
    .welcome-bar {
        background: #fff8f8;
        border: 1px solid rgba(194,1,2,0.15);
        border-radius: 10px;
        padding: 0.65rem 1.25rem;
        display: flex; align-items: center; justify-content: space-between;
        flex-wrap: wrap; gap: 0.5rem;
        margin: 1.5rem 0;
        font-size: 0.95rem; color: #555;
    }
    .welcome-bar strong { color: #c20102; }
    .btn-logout {
        background: none; border: 1px solid #c20102;
        color: #c20102; border-radius: 8px;
        padding: 0.3rem 0.9rem; font-size: 0.85rem; font-weight: 600;
        cursor: pointer; transition: all 0.2s;
    }
    .btn-logout:hover { background: #c20102; color: #fff; }
    .platforms-grid {
        display: grid;
        gap: 1.5rem;
        grid-template-columns: 1fr;
        padding: 1.5rem 0 3rem;
    }
    @media (min-width: 576px) { .platforms-grid { grid-template-columns: repeat(2, 1fr); } }
    @media (min-width: 992px) { .platforms-grid { grid-template-columns: repeat(3, 1fr); gap: 2rem; } }
    .pf-card {
        display: block;
        background: #fff;
        border-radius: 14px;
        overflow: hidden;
        box-shadow: 0 8px 28px rgba(0,0,0,0.08), 0 0 0 1px rgba(0,0,0,0.04);
        text-decoration: none; color: inherit;
        transition: box-shadow 0.35s ease, transform 0.35s ease;
        border-top: 4px solid #c20102;
    }
    .pf-card:hover {
        box-shadow: 0 16px 44px rgba(0,0,0,0.12), 0 0 0 2px rgba(194,1,2,0.2);
        transform: translateY(-4px);
        color: inherit; text-decoration: none;
    }
    .pf-card-icon {
        width: 60px; height: 60px; border-radius: 12px;
        background: linear-gradient(135deg, #c20102 0%, #8b0101 100%);
        display: flex; align-items: center; justify-content: center;
        color: #fff; font-size: 1.6rem; margin-bottom: 1rem;
    }
    .pf-card:hover .pf-card-icon { background: linear-gradient(135deg, #8b0101 0%, #5a0101 100%); }
    .pf-card h3 { font-size: 1.1rem; font-weight: 700; color: #1a1a1a; margin-bottom: 0.4rem; }
    .pf-card p { font-size: 0.9rem; color: #555; line-height: 1.5; margin: 0; }
    .pf-card-body { padding: 1.5rem; }
    .pf-card-cta {
        display: inline-flex; align-items: center; gap: 0.4rem;
        font-size: 0.88rem; font-weight: 600; color: #c20102; margin-top: 0.9rem;
    }
    .pf-card:hover .pf-card-cta { color: #8b0101; }
    .pf-card-cta i { font-size: 0.78rem; transition: transform 0.3s; }
    .pf-card:hover .pf-card-cta i { transform: translateX(4px); }
</style>
@endsection

@section('content')
<div class="platforms-hero">
    <div class="container">
        <h1><i class="fas fa-layer-group me-2" style="color:#c20102;"></i>Staff Platforms</h1>
        <p>Personal platforms and tools reserved for AIRID staff</p>
    </div>
</div>

<div class="container">
    <div class="welcome-bar">
        <span><i class="fas fa-user-check me-2" style="color:#c20102;"></i>
            Welcome, <strong>{{ session('staff_platforms_name') }}</strong>
            &nbsp;·&nbsp; {{ session('staff_platforms_email') }}
        </span>
        <form action="{{ route('staffPlatforms.logout') }}" method="POST" style="margin:0;">
            @csrf
            <button type="submit" class="btn-logout">
                <i class="fas fa-sign-out-alt me-1"></i>Logout
            </button>
        </form>
    </div>

    <div class="platforms-grid">

        {{-- Appraisals --}}
        <a href="https://appraisals.airid-africa.com" class="pf-card" target="_blank" rel="noopener noreferrer">
            <div class="pf-card-body">
                <div class="pf-card-icon"><i class="fas fa-tasks"></i></div>
                <h3>Appraisals</h3>
                <p>Staff appraisals and performance evaluation.</p>
                <span class="pf-card-cta">Open <i class="fas fa-external-link-alt"></i></span>
            </div>
        </a>
        {{-- Appraisals --}}
        <a href="https://www.airid-africa.com/public/admin/login" class="pf-card" target="_blank" rel="noopener noreferrer">
            <div class="pf-card-body">
                <div class="pf-card-icon"><i class="fas fa-tasks"></i></div>
                <h3>AIRID admin site</h3>
                <p>Airid site dashboard.</p>
                <span class="pf-card-cta">Open <i class="fas fa-external-link-alt"></i></span>
            </div>
        </a>

        {{-- Dashboard Projects --}}
        <a href="https://dashboard-projects.airid-africa.com" class="pf-card" target="_blank" rel="noopener noreferrer">
            <div class="pf-card-body">
                <div class="pf-card-icon"><i class="fas fa-chart-line"></i></div>
                <h3>Dashboard Projects</h3>
                <p>Project dashboard: monitoring and reporting.</p>
                <span class="pf-card-cta">Open <i class="fas fa-external-link-alt"></i></span>
            </div>
        </a>

        {{-- Equipments --}}
        <a href="https://equipments.airid-africa.com" class="pf-card" target="_blank" rel="noopener noreferrer">
            <div class="pf-card-body">
                <div class="pf-card-icon"><i class="fas fa-toolbox"></i></div>
                <h3>Equipments</h3>
                <p>Equipment management and inventory.</p>
                <span class="pf-card-cta">Open <i class="fas fa-external-link-alt"></i></span>
            </div>
        </a>

        {{-- Online Training --}}
        <a href="https://onlinetraining.airid-africa.com" class="pf-card" target="_blank" rel="noopener noreferrer">
            <div class="pf-card-body">
                <div class="pf-card-icon"><i class="fas fa-graduation-cap"></i></div>
                <h3>Online Training</h3>
                <p>E-learning and online training platform.</p>
                <span class="pf-card-cta">Open <i class="fas fa-external-link-alt"></i></span>
            </div>
        </a>

        {{-- SOP Management --}}
        <a href="https://sop.airid-africa.com/" class="pf-card" target="_blank" rel="noopener noreferrer">
            <div class="pf-card-body">
                <div class="pf-card-icon"><i class="fas fa-file-alt"></i></div>
                <h3>SOP Management</h3>
                <p>Standard Operating Procedures: management and access.</p>
                <span class="pf-card-cta">Open <i class="fas fa-external-link-alt"></i></span>
            </div>
        </a>

      <a href="https://project-tracking-sheet.airid-africa.com/" class="pf-card" target="_blank" rel="noopener noreferrer">
    <div class="pf-card-body">
        <div class="pf-card-icon"><i class="fas fa-tasks"></i></div>
        <h3>Project Tracking Sheet</h3>
        <p>Suivi et gestion de l’avancement des projets.</p>
        <span class="pf-card-cta">Open <i class="fas fa-external-link-alt"></i></span>
    </div>
</a>

<a href="https://huts-management.airid-africa.com/" class="pf-card" target="_blank" rel="noopener noreferrer">
    <div class="pf-card-body">
        <div class="pf-card-icon"><i class="fas fa-flask"></i></div>
        <h3>Cases Expérimentales</h3>
        <p>Gestion et suivi des installations expérimentales et des activités associées.</p>
        <span class="pf-card-cta">Open <i class="fas fa-external-link-alt"></i></span>
    </div>
</a>

        {{-- Animalerie --}}
        <a href="https://invoices.airid-africa.com/" class="pf-card" target="_blank" rel="noopener noreferrer">
            <div class="pf-card-body">
                <div class="pf-card-icon"><i class="fas fa-paw"></i></div>
                <h3>Guinea Pig Identification Records</h3>
                <p>Animal house records and tracking system.</p>
                <span class="pf-card-cta">Open <i class="fas fa-external-link-alt"></i></span>
            </div>
        </a>


        {{-- Test Item --}}
        <a href="https://test-item.airid-africa.com/" class="pf-card" target="_blank" rel="noopener noreferrer">
            <div class="pf-card-body">
                <div class="pf-card-icon"><i class="fas fa-vials"></i></div>
                <h3>Test Item</h3>
                <p>Test item management and tracking.</p>
                <span class="pf-card-cta">Open <i class="fas fa-external-link-alt"></i></span>
            </div>
        </a>

        {{-- Data Processing --}}
        {{-- <a href="{{ config('portal.external.data_processing', '#') }}" class="pf-card" target="_blank" rel="noopener noreferrer">
            <div class="pf-card-body">
                <div class="pf-card-icon"><i class="fas fa-chart-bar"></i></div>
                <h3>Data Processing</h3>
                <p>Data processing software for analysis and reporting.</p>
                <span class="pf-card-cta">Open <i class="fas fa-external-link-alt"></i></span>
            </div>
        </a> --}}

        {{-- API Constant --}}
        {{-- <a href="https://api-constant.airid-africa.com" class="pf-card" target="_blank" rel="noopener noreferrer">
            <div class="pf-card-body">
                <div class="pf-card-icon"><i class="fas fa-cogs"></i></div>
                <h3>API Constant</h3>
                <p>API constants and configuration.</p>
                <span class="pf-card-cta">Open <i class="fas fa-external-link-alt"></i></span>
            </div>
        </a> --}}

        {{-- REDCap --}}
        <a href="https://redcap.airid-africa.com" class="pf-card" target="_blank" rel="noopener noreferrer">
            <div class="pf-card-body">
                <div class="pf-card-icon"><i class="fas fa-database"></i></div>
                <h3>REDCap</h3>
                <p>Research data capture: surveys and data collection.</p>
                <span class="pf-card-cta">Open <i class="fas fa-external-link-alt"></i></span>
            </div>
        </a>



        {{-- Field Site Management --}}
        <a href="https://fuel-consumption.airid-africa.com/" class="pf-card" target="_blank" rel="noopener noreferrer">
            <div class="pf-card-body">
                <div class="pf-card-icon"><i class="fas fa-map-marked-alt"></i></div>
              <h3>Fuel Consumption Management</h3>
<p>Management, monitoring, and optimization of fuel consumption across various sites.</p>
                <span class="pf-card-cta">Open <i class="fas fa-external-link-alt"></i></span>
            </div>
        </a>

        {{-- Inventory Management --}}
        {{-- <a href="#" class="pf-card" target="_blank" rel="noopener noreferrer">
            <div class="pf-card-body">
                <div class="pf-card-icon"><i class="fas fa-boxes"></i></div>
                <h3>Inventory Management</h3>
                <p>Stock and supplies inventory tracking across all AIRID facilities.</p>
                <span class="pf-card-cta">Open <i class="fas fa-external-link-alt"></i></span>
            </div>
        </a> --}}

    </div>
</div>
@endsection
