{{-- Styles communs aux pages Research Centres (Vector Biology, Data Science) --}}
<style>
.centre-banner { background-size: cover; background-position: center; }
.centre-intro {
    background: linear-gradient(135deg, rgba(194, 1, 2, 0.06) 0%, rgba(139, 1, 1, 0.06) 100%);
    padding: 2rem 1.75rem;
    border-radius: 20px;
    margin: 2rem 0;
    border-left: 5px solid #c20102;
}
.centre-intro .section-lead { font-size: var(--airid-text-size); line-height: var(--airid-text-line-height); color: var(--airid-text-color); margin-bottom: 0.75rem; }
.centre-intro .section-lead:last-child { margin-bottom: 0; }
.centre-section {
    background: #fff;
    border-radius: 16px;
    padding: 1.75rem 2rem;
    box-shadow: 0 5px 25px rgba(0,0,0,0.08);
    margin-bottom: 1.75rem;
    border-left: 5px solid #c20102;
}
.centre-section h2 {
    font-size: var(--airid-h2-size);
    font-weight: 700;
    color: var(--airid-title-color);
    margin-bottom: 1rem;
    padding-bottom: 0.5rem;
    border-bottom: 2px solid rgba(194, 1, 2, 0.2);
    display: flex;
    align-items: center;
    gap: 0.5rem;
}
.centre-section h2 i { color: #c20102; }
.centre-section p { font-size: var(--airid-text-size); line-height: var(--airid-text-line-height); color: var(--airid-text-color); margin-bottom: 0.75rem; }
.centre-section p.mb-0 { margin-bottom: 0; }
.centre-list { list-style: none; padding: 0; margin: 0 0 0.75rem 0; }
.centre-list li { padding: 0.3rem 0 0.3rem 1.5rem; position: relative; font-size: var(--airid-text-size); color: var(--airid-text-color); }
.centre-list li::before { content: '✓'; position: absolute; left: 0; color: #c20102; font-weight: 700; }
.centre-unit-card {
    background: #f8f9fa;
    border-radius: 14px;
    padding: 1.5rem;
    margin-bottom: 1.25rem;
    border-left: 4px solid #c20102;
}
.centre-unit-card:last-child { margin-bottom: 0; }
.centre-unit-card h3 { font-size: var(--airid-h3-size); font-weight: 700; color: var(--airid-title-color); margin: 0 0 0.5rem 0; display: flex; align-items: center; gap: 0.5rem; }
.centre-unit-card h3 i { color: #c20102; }
.centre-unit-card .unit-tagline { font-size: var(--airid-tagline-size); color: #c20102; font-weight: 600; margin-bottom: 0.5rem; }
.centre-unit-card p { margin-bottom: 0.5rem; font-size: 0.95em; }
.centre-unit-card .centre-list { margin-bottom: 0.5rem; }
.centre-mini-card {
    background: #fff;
    border-radius: 14px;
    padding: 1.5rem 1.75rem;
    box-shadow: 0 4px 20px rgba(0,0,0,0.08);
    border-left: 4px solid #c20102;
    height: 100%;
}
.centre-mini-card h3 { font-size: var(--airid-h3-size); font-weight: 700; color: var(--airid-title-color); margin-bottom: 0.75rem; display: flex; align-items: center; gap: 0.5rem; }
.centre-mini-card h3 i { color: #c20102; }
.centre-mini-card p { font-size: var(--airid-text-size); line-height: 1.6; color: var(--airid-text-color); margin-bottom: 0; }
.centre-nav {
    background: linear-gradient(145deg, #fff 0%, #f8f9fa 100%);
    border-radius: 16px;
    padding: 1.25rem 1.5rem;
    margin-bottom: 2rem;
    box-shadow: 0 4px 24px rgba(0,0,0,0.06);
    border: 1px solid rgba(194, 1, 2, 0.12);
}
.centre-nav .nav-label { font-weight: 700; color: var(--airid-title-color); margin-bottom: 0.75rem; display: flex; align-items: center; gap: 0.5rem; }
.centre-nav .nav-label i { color: #c20102; }
.centre-nav .nav-grid { display: grid; grid-template-columns: repeat(2, 1fr); gap: 0.5rem; }
@media (min-width: 768px) { .centre-nav .nav-grid { grid-template-columns: repeat(4, 1fr); } }
.centre-nav .nav-link-item {
    display: flex; align-items: center; gap: 0.5rem;
    padding: 0.5rem 0.75rem; font-size: 0.85rem; color: #2c3e50; text-decoration: none;
    background: #fff; border-radius: 10px; border: 1px solid #e9ecef; transition: all 0.2s ease;
}
.centre-nav .nav-link-item:hover { background: #c20102; color: #fff; border-color: #c20102; text-decoration: none; transform: translateY(-1px); box-shadow: 0 4px 12px rgba(194, 1, 2, 0.25); }
.centre-nav .nav-link-item i { color: #c20102; }
.centre-nav .nav-link-item:hover i { color: #fff; }
.fade-in-up { opacity: 0; transform: translateY(24px); transition: opacity 0.6s ease, transform 0.6s ease; }
.fade-in-up.visible { opacity: 1; transform: translateY(0); }
@media (max-width: 991px) { .row.g-4 > .col-lg-6:first-child .centre-mini-card { margin-bottom: 1rem; } }
</style>
