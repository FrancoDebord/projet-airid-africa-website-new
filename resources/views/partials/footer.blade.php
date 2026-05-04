<style>
    /* Force footer social icons to display (Font Awesome) */
    #footer .footer-social-list { list-style: none; padding: 0; margin: 0; display: flex; flex-wrap: wrap; gap: 0.5rem; align-items: center; }
    #footer .footer-social-link { display: inline-flex; align-items: center; justify-content: center; width: 38px; height: 38px; border-radius: 50%; background: rgba(0,0,0,0.08); color: #333; text-decoration: none; transition: background 0.3s, color 0.3s; }
    #footer .footer-social-link:hover { background: #c20102; color: #fff; }
    #footer .footer-social .social-icon { display: inline-flex; align-items: center; justify-content: center; font-size: 1.1rem; }
    </style>
@include('partials.newsletter')
<footer id="footer" class="footer bg-overlay">
    <div class="footer-main pt-3 pb-2">
        <div class="container">
            <div class="row">
                {{-- About --}}
                <div class="col-lg-4 col-md-6 footer-widget footer-about mb-3 mb-lg-0">
                    <img loading="lazy" width="180" class="footer-logo mb-1" src="{{ asset('storage/assets/logo/airid1.jpg') }}" alt="AIRID">
                    <p class="mb-0 small">The African Institute for Research in Infectious Diseases is a leading African research center dedicated to advancing scientific knowledge and innovative solutions in the fight against infectious diseases.</p>
                </div>

                {{-- Quick Links --}}
                <div class="col-lg-2 col-md-6 footer-widget mb-3 mb-lg-0">
                    <h3 class="widget-title mb-2">Quick Links</h3>
                    <ul class="list-unstyled small mb-0">
                        <li class="mb-1"><a href="{{ route('aboutPage') }}">About AIRID</a></li>
                        <li class="mb-1"><a href="{{ route('researchActivitiesPage') }}">Research</a></li>
                        <li class="mb-1"><a href="{{ route('facilitiesLanding') }}">Facilities</a></li>
                        <li class="mb-1"><a href="{{ route('glpPage', 'why-glp') }}">GLP Testing</a></li>
                        <li class="mb-1"><a href="{{ route('newsPage') }}">News</a></li>
                        <li class="mb-1"><a href="{{ route('contactPage') }}">Contact</a></li>
                        <li class="mb-1 text-muted border border-secondary rounded px-2 py-1 d-inline-block" style="border-width: 1px !important; background-color: #c20102; color:white;">{{ number_format($footerVisitorCount ?? 0, 0, ',', ' ') }} visitor(s)</li>
                    </ul>
                </div>

                {{-- Policies --}}
                <div class="col-lg-3 col-md-6 footer-widget mb-3 mb-lg-0">
                    <h3 class="widget-title mb-2">Policies</h3>
                    <ul class="list-unstyled small mb-0">
                        <li class="mb-1"><a href="{{ route('policyPage', 'data-protection') }}">Data Protection</a></li>
                        <li class="mb-1"><a href="{{ route('policyPage', 'safeguarding') }}">Safeguarding</a></li>
                        <li class="mb-1"><a href="{{ route('policyPage', 'equality-diversity') }}">Equality & Diversity</a></li>
                        <li class="mb-1"><a href="{{ route('pageAbout', 'code-of-conduct') }}">Code of Conduct</a></li>
                        <li class="mb-1"><a href="{{ route('policyPage', 'copyright') }}">Copyright</a></li>
                        <li class="mobile-nav-item"><a href="{{ route('myAiridPortal') }}" class="mobile-nav-link" style="background-color: #c20102; color:white ;">My AIRID</a></li>

                    </ul>
                </div>

                {{-- Contact --}}
                <div class="col-lg-3 col-md-6 footer-widget mb-3 mb-lg-0">
                    <h3 class="widget-title mb-2">Get in Touch</h3>
                    <ul class="list-unstyled small text-muted mb-1">
                        <li class="mb-1"><strong>Address:</strong> AIRID Secretariat, House 5507, Street 1543 Donaten, AKPAKPA, (Street SOBEPEC, 4th building on the left, last building on the left), Cotonou, Benin</li>
                        <li class="mb-1"><strong>Email:</strong> <a href="mailto:info@airid-africa.com" style="color: #a3a1a1">info@airid-africa.com</a></li>
                        <li class="mb-1"><strong>Phone:</strong> <a href="tel:+2290167164499">(+229) 01 67 16 44 99</a></li>
                    </ul>
                    <div class="footer-social">
                        <ul class="list-unstyled d-flex gap-2 flex-wrap footer-social-list mb-0">
                            <li><a href="https://www.linkedin.com/company/airid-africa" aria-label="LinkedIn" class="footer-social-link"><span class="social-icon"><i class="fab fa-linkedin-in"></i></span></a></li>
                            <li><a href="https://twitter.com/airid_africa" aria-label="X (Twitter)" class="footer-social-link"><span class="social-icon"><i class="fab fa-twitter"></i></span></a></li>
                            <li><a href="https://facebook.com/airid.africa" aria-label="Facebook" class="footer-social-link"><span class="social-icon"><i class="fab fa-facebook-f"></i></span></a></li>
                            <li><a href="https://www.youtube.com/@airid-africa" aria-label="YouTube" class="footer-social-link"><span class="social-icon"><i class="fab fa-youtube"></i></span></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="copyright py-2">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6 text-center text-md-left mb-2 mb-md-0">
                    <span class="small">Copyright &copy; <script>document.write(new Date().getFullYear());</script> AIRID. All rights reserved.</span>
                </div>
                <div class="col-md-6">
                    <div class="footer-menu text-center text-md-right">
                        <ul class="list-unstyled d-flex flex-wrap justify-content-center justify-content-md-end gap-1 mb-0 small">
                            <li><a href="{{ route('aboutPage') }}">About</a></li>
                            <li><a href="{{ route('contactPage') }}">Contact</a></li>
                            <li><a href="{{ route('policyPage', 'data-protection') }}">Privacy</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div id="back-to-top" data-spy="affix" data-offset-top="10" class="back-to-top position-fixed">
                <button class="btn btn-primary" title="Back to Top">
                    <i class="fa fa-angle-double-up"></i>
                </button>
            </div>
        </div>
    </div>
</footer>
