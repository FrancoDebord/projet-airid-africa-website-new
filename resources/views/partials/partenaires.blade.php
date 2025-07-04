<section class="contents">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 mt-5 mt-lg-0">

                <h3 class="column-title">Our partners</h3>

                <div class="row all-clients">

                    @forelse ($all_partenaires as $partenaire)
                        <div class="col-sm-4 col-6 col-md-3 ">

                            <div class="row" style="height: 230px">
                                <div class="col-12">
                                    <figure class="clients-logo">
                                        <a href="{{ $partenaire->site_web }}" target="_blank">
                                            <img loading="lazy" class="img-fluid"
                                                src="{{ asset('storage/assets/logo/' . $partenaire->logo_partenaire) }}"
                                                alt="{{ $partenaire->nom_partenaire }}" /></a>
                                    </figure>
                                </div>

                                <div class="col-12">
                                    <h5 class="h5_nom_partenaire">
                                        <a href="{{ $partenaire->site_web }}"
                                            target="_blank">{{ $partenaire->nom_partenaire }}</a>
                                    </h5>
                                </div>
                            </div>

                        </div><!-- Client 1 end -->
                    @empty
                    @endforelse


                    {{-- <div class="col-sm-4 col-6 col-md-3">
                  <figure class="clients-logo">
                      <a href="#!"><img loading="lazy" class="img-fluid" src="{{ asset("storage/assets/logo/ivcc.png")}}" alt="clients-logo" /></a>
                  </figure>
                </div><!-- Client 1 end -->
  
                <div class="col-sm-4 col-6 col-md-3">
                  <figure class="clients-logo">
                      <a href="#!"><img loading="lazy" class="img-fluid" src="{{ asset("storage/assets/logo/crec_logo.png")}}" alt="clients-logo" /></a>
                  </figure>
                </div><!-- Client 2 end -->
  
                <div class="col-sm-4 col-6 col-md-3">
                  <figure class="clients-logo">
                      <a href="#!"><img loading="lazy" class="img-fluid" src="{{ asset("storage/assets/logo/DCT.png")}}" alt="clients-logo" /></a>
                  </figure>
                </div><!-- Client 3 end -->
  
                <div class="col-sm-4 col-6 col-md-3">
                  <figure class="clients-logo">
                      <a href="#!"><img loading="lazy" class="img-fluid" src="{{ asset("storage/assets/logo/BAYER.png")}}" alt="clients-logo" /></a>
                  </figure>
                </div><!-- Client 4 end -->
  
                <div class="col-sm-4 col-6 col-md-3">
                  <figure class="clients-logo">
                      <a href="#!"><img loading="lazy" class="img-fluid" src="{{ asset("storage/assets/logo/MITSUI.png")}}" alt="clients-logo" /></a>
                  </figure>
                </div><!-- Client 5 end -->
  
                <div class="col-sm-4 col-6 col-md-3">
                  <figure class="clients-logo">
                      <a href="#!"><img loading="lazy" class="img-fluid" src="{{ asset("storage/assets/logo/new_nets_logo.png")}}" alt="clients-logo" /></a>
                  </figure>
                </div><!-- Client 6 end -->
  
                <div class="col-sm-4 col-6 col-md-3">
                  <figure class="clients-logo">
                      <a href="#!"><img loading="lazy" class="img-fluid" src="{{ asset("storage/assets/logo/PAMVERC-LOGO.png")}}" alt="clients-logo" /></a>
                  </figure>
                </div><!-- Client 6 end -->
                <div class="col-sm-4 col-6 col-md-3">
                  <figure class="clients-logo">
                      <a href="#!"><img loading="lazy" class="img-fluid" src="{{ asset("storage/assets/logo/sanas4.png")}}" alt="clients-logo" /></a>
                  </figure>
                </div><!-- Client 6 end -->
                <div class="col-sm-4 col-6 col-md-3">
                  <figure class="clients-logo">
                      <a href="#!"><img loading="lazy" class="img-fluid" src="{{ asset("storage/assets/logo/SUMITO.png")}}" alt="clients-logo" /></a>
                  </figure>
                </div><!-- Client 6 end -->
                <div class="col-sm-4 col-6 col-md-3">
                  <figure class="clients-logo">
                      <a href="#!"><img loading="lazy" class="img-fluid" src="{{ asset("storage/assets/logo/SYNGENTA.png")}}" alt="clients-logo" /></a>
                  </figure>
                </div><!-- Client 6 end -->
                <div class="col-sm-4 col-6 col-md-3">
                  <figure class="clients-logo">
                      <a href="#!"><img loading="lazy" class="img-fluid" src="{{ asset("storage/assets/logo/WHO.png")}}" alt="clients-logo" /></a>
                  </figure>
                </div><!-- Client 6 end --> --}}

                </div><!-- Clients row end -->

            </div><!-- Col end -->

        </div>
        <!--/ Content row end -->
    </div>
    <!--/ Container end -->
</section><!-- Content end -->
