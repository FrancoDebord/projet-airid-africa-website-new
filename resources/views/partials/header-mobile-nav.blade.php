{{-- Menu mobile aligné sur le header desktop --}}
<ul class="mobile-nav-list">
    <li class="mobile-nav-item"><a href="{{ route('index') }}" class="mobile-nav-link">Home</a></li>

    {{-- 2. About --}}
    <li class="mobile-nav-item mobile-nav-dropdown">
        <a href="#" class="mobile-nav-link mobile-nav-toggle">About <i class="fa fa-angle-down"></i></a>
        <ul class="mobile-nav-submenu">
            <li><a href="{{ route('aboutPage') }}">Our Vision</a></li>
            <li><a href="{{ route('pageAbout', 'history') }}">Our History</a></li>
            <li><a href="{{ route('pageAbout', 'strategy') }}">Our Strategy</a></li>
            <li><a href="{{ route('staffAirid') }}">Our Team</a></li>
            <li><a href="{{ route('motDirecteur') }}">Executive Director's Message</a></li>
            <li><a href="{{ route('motBoardOfDirectors') }}" class="no-capitalize">Board of Directors</a></li>
            <li><a href="{{ route('pageAbout', 'code-of-conduct') }}" class="no-capitalize">Code of Conduct</a></li>
        </ul>
    </li>

    {{-- 3. Research --}}
    <li class="mobile-nav-item mobile-nav-dropdown">
        <a href="#" class="mobile-nav-link mobile-nav-toggle">Research <i class="fa fa-angle-down"></i></a>
        <ul class="mobile-nav-submenu">
            <li><a href="{{ route('researchPolicyPracticePage') }}">Research Centres</a></li>
            <li><a href="{{ route('researchActivitiesPage') }}">Research activities</a></li>
            <li><a href="{{ route('allProjectsPage') }}">Research Projects</a></li>
            <li><a href="{{ route('pamvercBeninPage') }}">PAMVERC-Benin</a></li>
            {{-- <li><a href="{{ route('projetVesterguaardITNPage') }}">Vector Control Product Evaluations</a></li> --}}
            <li><a href="{{ route('allPublicationsPage') }}">Publications</a></li>
        </ul>
    </li>

    {{-- 4. Facilities (aligné sur header.blade.php : sous-menu + 4 entrées principales) --}}
    <li class="mobile-nav-item mobile-nav-dropdown">
        <a href="#" class="mobile-nav-link mobile-nav-toggle">Facilities <i class="fa fa-angle-down"></i></a>
        <ul class="mobile-nav-submenu">
            {{-- Insecticide Testing Facilities (groupe comme sur desktop) --}}
            <li><a href="{{ route('facilitiesLanding') }}">Insecticide Testing Facilities</a></li>
            <li><a href="{{ route('bioAssayLab') }}">Bioassay Laboratory</a></li>
            <li><a href="{{ route('insectaryPage') }}">Insectary</a></li>
            <li><a href="{{ route('animalHousePage') }}">Animal House</a></li>
            <li><a href="{{ route('pageFacility', 'flight-rooms') }}">Flight Rooms</a></li>
            {{-- <li><a href="{{ route('pageFacility', 'chemical-storage') }}">Chemical Storage</a></li> --}}
            <li><a href="{{ route('mosquitoPlasmodiumLaboratoryPage') }}">Mosquito Infection Lab</a></li>

            {{-- Entrées de même niveau que sur desktop --}}
            <li><a href="{{ route('fieldStationPage') }}">Field Research Platforms</a></li>
            <li><a href="{{ route('molecularLabPage') }}">Molecular Laboratory</a></li>
            <li><a href="{{ route('analyticalCheminstryLabPage') }}">Analytical Chemistry Laboratory</a></li>
            <li><a href="{{ route('pageFacility', 'data-it') }}">Data Management &amp; IT Platforms</a></li>
        </ul>
    </li>

    {{-- 5. GLP Testing --}}
    <li class="mobile-nav-item mobile-nav-dropdown">
        <a href="#" class="mobile-nav-link mobile-nav-toggle">GLP Testing <i class="fa fa-angle-down"></i></a>
        <ul class="mobile-nav-submenu">
            <li><a href="{{ route('glpPage', 'why-glp') }}">Why GLP</a></li>
            <li><a href="{{ route('glpPage', 'services') }}">GLP Services</a></li>
            <li><a href="{{ route('glpPage', 'quality-assurance') }}">Quality Assurance</a></li>
            <li><a href="{{ route('glpPage', 'certification-sanas') }}">GLP Certification</a></li>
            <li><a href="{{ route('glpPage', 'organogram') }}">GLP Testing Plan</a></li>
            <li><a href="{{ route('glpPage', 'who-pq-products-tested-at-our-facility') }}">WHO PQ Products Tested at our Facility</a></li>
            <li><a href="{{ route('glpPage', 'faq') }}"> GLP FAQ</a></li>

        </ul>
    </li>

    {{-- 6. Training --}}
    <li class="mobile-nav-item mobile-nav-dropdown">
        <a href="#" class="mobile-nav-link mobile-nav-toggle">Training <i class="fa fa-angle-down"></i></a>
        <ul class="mobile-nav-submenu">
            <li><a href="{{ route('educationTrainingPage') }}">Training &amp; Capacity Strengthening</a></li>
        </ul>
    </li>

    {{-- 7. GET INVOLVED --}}
    <li class="mobile-nav-item mobile-nav-dropdown">
        <a href="#" class="mobile-nav-link mobile-nav-toggle">Get Involved <i class="fa fa-angle-down"></i></a>
        <ul class="mobile-nav-submenu">
            <li><a href="{{ route('partnersPage') }}">Partnerships</a></li>
            <li><a href="{{ route('vacanciesPage') }}">Vacancies &amp; Studentships</a></li>
            <li><a href="{{ route('philanthropyPage') }}">Philanthropy</a></li>
            <li><a href="{{ route('pageTraining', 'procurements-tenders') }}">Procurements &amp; Tenders</a></li>
        </ul>
    </li>

    {{-- 8. News --}}
    <li class="mobile-nav-item mobile-nav-dropdown">
        <a href="#" class="mobile-nav-link mobile-nav-toggle">News <i class="fa fa-angle-down"></i></a>
        <ul class="mobile-nav-submenu">
            <li><a href="{{ url('/news#resources') }}">News &amp; Announcements</a></li>
            <li><a href="{{ route('newsletterPage') }}">Newsletters</a></li>
            <li><a href="{{ route('photosPage') }}">Our Gallery</a></li>
            <li><a href="{{ route('videoPage') }}">Our Videos</a></li>
        </ul>
    </li>

    {{-- 9. Contact --}}
    <li class="mobile-nav-item"><a href="{{ route('contactPage') }}" class="mobile-nav-link">Contact</a></li>

    {{-- Utilitaires --}}
    <li class="mobile-nav-item"><a href="{{ route('getInvolvedPage') }}" class="mobile-nav-link get-involved-mobile">Make a Donation</a></li>
    <li class="mobile-nav-item"><a href="{{ route('myAiridPortal') }}" class="mobile-nav-link">My AIRID</a></li>
</ul>
