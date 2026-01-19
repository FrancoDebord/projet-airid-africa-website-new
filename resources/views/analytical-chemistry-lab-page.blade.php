@extends('index')

@section('title', 'AIRID --Analytical and Chemistry Labs')

@section('css')
    @include('partials.modern-css')
@endsection

@section('content')
    <div id="banner-area" class="banner-area"
        style="background-image:url({{ asset('storage/assets_vendor/images/banner/banner2_new.png') }})">
        <div class="banner-text">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="banner-heading">
                            <h1 class="banner-title top_title fade-in-up">Our Analytical and Chemistry Lab</h1>
                            <p class="text-white mt-3 fade-in-up" style="font-size: 1.2rem;">
                                Establishing local capacity for chemical analysis <span style="font-style: italic">(Under Development)</span>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <section class="py-5">
        <div class="container">
            <div class="content-section fade-in-up">
                <h2 class="section-title">
                    <i class="fas fa-vial"></i>Chemistry Laboratory <span style="font-style: italic; font-size: 1rem;">(Under Development)</span>
                </h2>
                <div class="section-content">
                    <p>
                        AIRID is currently developing a state-of-the-art Chemistry Laboratory 
                        dedicated to analytical testing and quality control of public health insecticide
                        products. Once operational, this laboratory will play a critical role in supporting 
                        national and regional decision-making on the use of insecticide-treated nets (ITNs), 
                        indoor residual sprays (IRS), and other vector control
                        tools by ensuring they meet international standards for content, stability, and performance.
                    </p>
                    <p>
                        The facility is being designed in alignment with Good Laboratory Practice (GLP)
                        principles and WHO prequalification guidelines, positioning it as 
                        a future hub for regulatory-quality product evaluation in West Africa.
                    </p>
                </div>
            </div>

            <div class="content-section fade-in-up">
                <h3 class="section-subtitle">Planned Capabilities</h3>
                <div class="section-content">
                    <ul>
                        <li>High-Performance Liquid Chromatography (HPLC): Accurate measurement of active ingredients in treated materials</li>
                        <li>Gas Chromatography (GC): Detection of volatile compounds in formulations and environmental samples</li>
                        <li>Stability and degradation testing: Assessment of product durability under different temperature and humidity conditions</li>
                        <li>Residue analysis: Evaluation of insecticide levels in field samples, such as wall surfaces and used nets</li>
                        <li>Product specification verification: Ensuring compliance with international standards for insecticide-treated products</li>
                    </ul>
                </div>
            </div>

            <div class="content-section fade-in-up">
                <h3 class="section-subtitle">Infrastructure (In Progress)</h3>
                <div class="section-content">
                    <p>The lab will be equipped with:</p>
                    <ul>
                        <li>HPLC and GC systems</li>
                        <li>Fume hoods and chemical-resistant benches</li>
                        <li>Precision balances, pipettes, and sample prep equipment</li>
                        <li>Cold storage and desiccation chambers</li>
                        <li>Calibration tools and quality control systems</li>
                        <li>Dedicated areas for reagent handling and contamination prevention</li>
                    </ul>
                </div>
            </div>

            <div class="content-section fade-in-up">
                <h3 class="section-subtitle">Why It Matters</h3>
                <div class="section-content">
                    <p>
                        As countries scale up next-generation vector control tools, 
                        reliable chemical analysis becomes critical for product evaluation,
                        procurement assurance, and program monitoring. 
                        Once operational, AIRID's Chemistry Laboratory will:
                    </p>
                    <ul>
                        <li>Enhance national quality assurance capacity</li>
                        <li>Contribute to WHO prequalification dossiers</li>
                        <li>Support field trials and durability monitoring</li>
                        <li>Build local expertise in regulatory science</li>
                    </ul>
                    <p>
                        By strengthening regional infrastructure, AIRID aims 
                        to ensure that only safe, effective, and high-quality products
                        reach the communities most at risk—helping to 
                        improve public health outcomes and sustain progress in malaria control.
                    </p>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('js')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const observerOptions = {
                threshold: 0.1,
                rootMargin: '0px 0px -50px 0px'
            };

            const observer = new IntersectionObserver(function(entries) {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('visible');
                        observer.unobserve(entry.target);
                    }
                });
            }, observerOptions);

            const animatedElements = document.querySelectorAll('.fade-in-up');
            animatedElements.forEach(el => {
                observer.observe(el);
            });
        });
    </script>
@endsection
