@extends('index')

@section('title', 'PAMVERC-BENIN | AIRID Africa')

@section('css')
    @include('partials.modern-css')
    <style>
        .pamverc-contact-box {
            background: linear-gradient(135deg, rgba(194, 1, 2, 0.08) 0%, rgba(194, 1, 2, 0.03) 100%);
            border: 2px solid #c20102;
            border-radius: 12px;
            padding: 1.25rem 1.5rem;
            margin: 1rem 0;
        }
        .pamverc-contact-box a { color: #c20102; font-weight: 600; text-decoration: none; }
        .pamverc-contact-box a:hover { text-decoration: underline; }
    </style>
@endsection

@section('content')
    <div id="banner-area" class="banner-area"
        style="background-image:url({{ asset('storage/assets_vendor/images/banner/banner2_new.png') }})">
        <div class="banner-text">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="banner-heading">
                            <h1 class="banner-title top_title fade-in-up">About PAMVERC-BENIN</h1>
                            <p class="text-white mt-3 fade-in-up" style="font-size: 1.15rem;">
                                Timely evaluation of vector control products for industry and research
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
                <h2 class="section-title"><i class="fas fa-info-circle"></i> About PAMVERC-BENIN</h2>
                <div class="section-content">
                    <p>
                        PAMVERC-BENIN is a specialised entity established within the African Institute for Research in Infectious Diseases (AIRID) to manage and deliver commercial product evaluations efficiently, with strong scientific rigour and adherence to agreed timelines. It serves as AIRID’s dedicated platform for industry-facing work, ensuring that commercially sponsored studies are conducted under robust quality systems and in compliance with relevant regulatory and Good Laboratory Practice (GLP) standards.                    </p>
                    <p>
                        Through PAMVERC-BENIN, commercial projects designed to generate high-quality, decision-ready efficacy data for industry partners are planned, implemented, and reported in a timely manner, supporting product development, regulatory submissions, and policy engagement.                    </p>
                </div>
            </div>

            {{-- <div class="content-section fade-in-up">
                <h3 class="section-subtitle"><i class="fas fa-spray-can text-danger me-2"></i> New IRS Project</h3>
                <div class="section-content">
                    <p>
                        WHO recommends the rotation of insecticides for IRS for managing insecticide resistance in malaria vectors. New IRS insecticides with novel modes of action to which vectors are largely susceptible are needed for improved control of resistant vector populations and for effective IRS rotations for insecticide resistance management. One such newly developed insecticide for vector control demonstrated potential to control pyrethroid-resistant malaria vectors in laboratory and semi-field experimental hut studies.
                    </p>
                    <p>
                        CREC/LSHTM is evaluating this new IRS product in a community trial in Southern Benin in terms of its efficacy and residual activity against pyrethroid-resistant malaria vectors in comparison to Fludora® Fusion. The evaluation includes: (i) assessment of the impact of community IRS application on vector density, vector longevity, vector infectivity and Entomological Inoculation Rate (EIR); (ii) assessment of the residual activity of the new IRS product applied for IRS on home walls; and (iii) assessment of its operational feasibility and community acceptance in Benin.
                    </p>
                    <p>
                        The trial started in 2020 and ran until 2022. The IRS products were applied in about 9,000 households organised in 16 clusters. CREC/LSHTM worked in collaboration with major local and national partners such as CREC, NMCP, Vectorlink and the University of Abomey-Calavi.
                    </p>
                </div>
            </div> --}}

            {{-- <div class="content-section fade-in-up">
                <h3 class="section-subtitle"><i class="fas fa-route text-danger me-2"></i> How to Work with PAMVERC-BENIN</h3>
                <div class="section-content">
                    <p>To work with us, the following steps can be taken:</p>
                    <ol>
                        <li>Contact us at <a href="mailto:pamverc.benin@crec-lshtm.org">pamverc.benin@crec-lshtm.org</a>, <a href="mailto:pamverc.benin@gmail.com">pamverc.benin@gmail.com</a> or <a href="mailto:corine.ngufor@lshtm.ac.uk">corine.ngufor@lshtm.ac.uk</a></li>
                        <li>Provide information about the service that you would like PAMVERC-BENIN to render to your company</li>
                        <li>A quotation will be issued and submitted for your approval</li>
                        <li>Once you approve the quotation, a protocol will be developed and discussed with you</li>
                        <li>After agreement on the protocol, a contract will be issued</li>
                        <li>Once the contract is signed by both parties, the study starts</li>
                        <li>Feedback is provided at all steps of the process, and our staff will be available at all times for any concerns you may have</li>
                        <li>A final report along with all study data will be provided at the end of the study</li>
                        <li>PAMVERC-BENIN remains available to respond to any queries regarding the final report and data generated during product registration</li>
                    </ol>

                </div>
            </div> --}}

            <div class="row g-4 fade-in-up">
                <div class="col-lg-6">
                    <div class="content-section h-100">
                        <h4 class="section-subtitle"><i class="fas fa-tasks text-danger me-2"></i> What Do We Do PAMVERC-BENIN?</h4>
                        <div class="section-content">
                            <ul class="mb-0">
                                <li><strong>Phase 1</strong> — Laboratory testing of vector control products for chemical companies (ITNs, IRS, repellents, etc.)</li>
                                <li><strong>Phase 2</strong> — Semi-field testing of vector control products for chemical companies (ITNs, IRS, repellents, etc.)</li>
                                <li><strong>Phase 3</strong> — Community evaluation of vector control products for chemical companies (ITNs, IRS, repellents, etc.)</li>
                                <li><strong>Consultancy</strong> — Vector control product testing and registration at WHO/PQ and for regional and national registration bodies</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="content-section h-100">
                        <h3 class="section-subtitle"><i class="fas fa-star text-danger me-2"></i> Why Work with PAMVERC-BENIN?</h3>
                        <div class="section-content">
                            <p>
                                To maximise capacity to fight malaria and other vector-borne diseases, it is important to increase the speed with which vector control products are developed. This includes the timely generation of efficacy data used for product registration.
                            </p>
                            <p>
                                To this end, PAMVERC-BENIN aims to deliver timely results by reducing administrative processes involved in product testing while maintaining a high standard of quality. PAMVERC-BENIN has developed strong experience in product testing by evaluating more than 16 products for up to 7 leading commercial companies over the last three years.
                            </p>
                            <p class="mb-0">
                                Phase 1 and Phase 2 evaluations can be conducted following the principles of OECD Good Laboratory Practice (GLP), depending on the needs of the client.
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="text-center mt-4">
                <a href="{{ route('contactPage') }}" class="btn btn-danger btn-lg">
                    <i class="fas fa-envelope me-2"></i> Contact AIRID
                </a>
                <a href="{{ route('allProjectsPage') }}" class="btn btn-outline-danger btn-lg ms-2">
                    <i class="fas fa-project-diagram me-2"></i> Our projects
                </a>
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
