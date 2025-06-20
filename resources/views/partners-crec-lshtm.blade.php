<div class="row mt-5">
    <div class="col-12">
        <h4 class="title-section">List of partners of CREC/LSHTM</h4>
    </div>

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
                        <a href="{{ $partenaire->site_web }}" target="_blank">{{ $partenaire->nom_partenaire }}</a>
                    </h5>
                </div>
            </div>

        </div><!-- Client 1 end -->
    @empty
    @endforelse

</div>
