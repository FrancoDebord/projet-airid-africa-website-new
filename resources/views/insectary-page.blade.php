@extends('index')

@section('title', 'AIRID --Our Insectary')

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
                            <h1 class="banner-title top_title fade-in-up">Our Insectary</h1>
                            <p class="text-white mt-3 fade-in-up" style="font-size: 1.2rem;">
                                High-quality entomological facility
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
                    <i class="fas fa-bug"></i>Insectary
                </h2>
                <div class="section-content">
                    <p>
                        AIRID's research is supported by a growing network of specialized laboratories and field sites
                        designed to deliver high-quality, Africa-led scientific research. Each facility plays a critical role in
                        generating evidence for disease control, product evaluation, and innovation. Our facilities are staffed by dedicated
                        teams of supervisors, research assistants, and technicians who ensure operational excellence
                        and adherence to international standards.
                    </p>
                </div>
                    </div>

            <div class="content-section fade-in-up">
                <div class="hero-image">
                    <img src="{{ asset('storage/assets/facility/insectary/IMG_1372.jpg') }}" alt="Insectary">
                </div>
                <h3 class="section-subtitle">Overview</h3>
                <div class="section-content">
                    <p>
                        The Insectary at AIRID is a high-quality entomological facility that supports
                        the rearing, maintenance, and manipulation of mosquito colonies essential for
                        a wide range of vector biology research. It provides standardized and well-characterized
                        colonies of Anopheles, Aedes, and Culex mosquitoes used in laboratory bioassays,
                        behavioral experiments, vector competence studies, and infection trials.
                    </p>
                    <p>
                        All rearing activities are conducted under Good Laboratory Practice (GLP)-compliant
                        conditions, with rigorous quality control and environmental monitoring. The insectary
                        plays a foundational role in maintaining colony integrity and
                        ensuring reproducibility and reliability in entomological research.
                    </p>
                </div>
            </div>

            <div class="content-section fade-in-up">
                <h3 class="section-subtitle">Key Activities</h3>
                <div class="section-content">
                    <ul>
                        <li>Maintenance of insecticide-susceptible and field-derived resistant mosquito strains</li>
                        <li>Support for experimental mosquito infections with Plasmodium and other pathogens</li>
                        <li>Monitoring of life-history traits (e.g., longevity, fecundity, emergence rates)</li>
                        <li>Selection and characterization of specific mosquito lines with desired traits (e.g., resistance, species complex)</li>
                    </ul>
                </div>
            </div>

            <div class="content-section fade-in-up">
                <h3 class="section-subtitle">Infrastructure</h3>
                <div class="section-content">
                    <p>The insectary includes:</p>
                    <ul>
                        <li>Temperature- and humidity-controlled rearing rooms</li>
                        <li>Larval and pupal trays for aquatic stage development</li>
                        <li>Adult holding cages for mating and oviposition</li>
                        <li>Blood-feeding stations, including membrane feeders and animal hosts (where approved)</li>
                        <li>Dedicated preparation and waste-handling areas</li>
                        <li>Colony record systems for tracking strain lineage, performance, and health</li>
                    </ul>
                </div>
            </div>

            <div class="content-section fade-in-up">
                <h3 class="section-subtitle">Why It Matters</h3>
                <div class="section-content">
                    <p>
                        A well-maintained insectary is the backbone of high-quality vector control research.
                        It ensures the availability of consistent, healthy mosquito populations for experimental
                        use—whether for evaluating insecticide efficacy, understanding transmission dynamics, or
                        developing new tools. By maintaining both susceptible and resistant colonies, AIRID is positioned
                        to test how products perform against real-world resistance profiles, helping national
                        and global partners make informed decisions on vector control strategies.
                    </p>
                </div>
                </div>

            <div class="content-section fade-in-up">
                <h3 class="section-subtitle">Our Mosquito Strains</h3>
                <div class="section-content">
                    <table class="modern-table">
                        <thead>
                            <tr>
                                <th>Strains</th>
                                <th>Colony Name</th>
                                <th>Species</th>
                                <th>Origin</th>
                                <th>Source of Collection</th>
                                <th>Year Established</th>
                                <th>Status</th>
                                <th>Insecticide Resistance Mechanism(s)</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Anopheles gambiae kisumu</td>
                                <td>An. gambiae Kisumu</td>
                                <td>An. gambiae</td>
                                <td>Kenya</td>
                                <td>BEI Ressources</td>
                                <td>2006</td>
                                <td>Susceptible</td>
                                <td>None</td>
                            </tr>
                            <tr>
                                <td>Anopheles VKPer</td>
                                <td>An. gambiae Vkper</td>
                                <td>An. gambiae</td>
                                <td>Kou Valley (Burkina-Faso)</td>
                                <td>IRSS, Burkina Faso</td>
                                <td>2004</td>
                                <td>Resistant</td>
                                <td>Kdr (L1014F)</td>
                            </tr>
                            <tr>
                                <td>Anopheles Covè</td>
                                                        <td>An. gambiae Covè</td>
                                                        <td>An. gambiae - An. gambiae coluzzii</td>
                                <td>Benin</td>
                                <td>Covè; Benin</td>
                                <td>2014</td>
                                <td>Resistant</td>
                                <td>Kdr (L1014F); Metabolic resistance (CYP6P3)</td>
                            </tr>
                            <tr>
                                <td>Anopheles Akron</td>
                                <td>An. gambiae Akron</td>
                                                        <td>An. gambiae coluzzii</td>
                                <td>Benin</td>
                                <td>BEI Ressources</td>
                                <td>2018</td>
                                <td>Resistant</td>
                                <td>Ace-1 mutation; Kdr (L1014F)</td>
                            </tr>
                            <tr>
                                <td>Aedes ROCK</td>
                                <td>Aedes ROCK</td>
                                                        <td>Aedes aegypti</td>
                                <td>New York</td>
                                <td>BEI Ressources</td>
                                <td>2018</td>
                                <td>Susceptible</td>
                                <td>None</td>
                            </tr>
                            <tr>
                                <td>Aedes Dandji</td>
                                <td>Aedes Dandji</td>
                                <td>Aedes aegypti</td>
                                <td>Benin</td>
                                <td>Dandji; Benin</td>
                                <td>2018</td>
                                <td>Resistant</td>
                                <td>Not characterized</td>
                            </tr>
                            <tr>
                                <td>Culex Dandji</td>
                                <td>Culex Dandji</td>
                                <td>Culex quinquefasciatus</td>
                                <td>Benin</td>
                                <td>Dandji; Benin</td>
                                <td>2020</td>
                                <td>Resistant</td>
                                <td>Not characterized</td>
                            </tr>
                            <tr>
                                <td>Culex Covè</td>
                                <td>Culex Covè</td>
                                <td>Culex quinquefasciatus</td>
                                <td>Benin</td>
                                <td>Covè; Benin</td>
                                <td>2020</td>
                                <td>Resistant</td>
                                <td>Not characterized</td>
                            </tr>
                            <tr>
                                <td>FUMOZ</td>
                                <td>Anopheles FUMOZ</td>
                                <td>Anopheles funestus</td>
                                <td>Mozambique</td>
                                <td>BEI Ressources</td>
                                <td>2021</td>
                                <td>Resistant</td>
                                <td>Metabolic resistance (CYP6P9a and CYP6P9b)</td>
                            </tr>
                        </tbody>
                    </table>
                    <p style="font-style: italic; margin-top: 1rem;">
                        Our mosquito strains have important characteristics (for example, susceptibility or resistance to insecticides) 
                        that are essential for the testing of Malaria vector control products. The insectary is designed to prevent 
                        any forms of contamination between mosquito strains. We can provide you with mosquito eggs, larvae or adults.
                    </p>
                </div>
                </div>

            <div class="content-section fade-in-up">
                <h3 style="font-size: 1.3rem; font-weight: 700; color: #2c3e50; margin-bottom: 1.5rem; display: flex; align-items: center; gap: 0.5rem;">
                    <i class="fas fa-images" style="color: #c20102;"></i>Gallery
                </h3>
                <div class="image-gallery">
                    <div class="gallery-item">
                        <img src="{{ asset('storage/assets/facility/insectary/IMG_1342.jpg') }}" 
                             alt="Insectary Entrance" 
                             class="gallery-image"
                             loading="lazy">
                        <div class="gallery-caption">
                            <strong>Insectary Entrance</strong>
                        </div>
                    </div>
                    <div class="gallery-item">
                        <img src="{{ asset('storage/assets/facility/insectary/IMG_1368.jpg') }}" 
                             alt="Insectary" 
                             class="gallery-image"
                             loading="lazy">
                        <div class="gallery-caption">
                            <strong>Insectary</strong>
                        </div>
                    </div>
                    <div class="gallery-item">
                        <img src="{{ asset('storage/assets/facility/insectary/IMG_1379.jpg') }}" 
                             alt="Insectary" 
                             class="gallery-image"
                             loading="lazy">
                        <div class="gallery-caption">
                            <strong>Insectary</strong>
                        </div>
                </div>
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
