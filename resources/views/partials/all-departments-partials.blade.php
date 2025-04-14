<section id="main-container" class="main-container pb-2">
    <div class="container">
        <h3 class="pb-2 " style="border-bottom : 1px solid #ccc;">All our departments</h3>

        <div class="row">

            @forelse ($all_departements as $departement)
                <div class="col-lg-4 col-md-6 mb-5  ">
                    <div class="ts-service-box ">
                        <div class="ts-service-image-wrapper">
                            <a
                                href="{{ route('detailDepartementPage', ['id' => $departement->id, 'slug' => \Str::slug($departement->nom_departement)]) }}"><img
                                    loading="lazy" alt="img" class="img-fluid"
                                    src="{{ asset('storage/assets/departements/' . $departement->photo) }}"></a>

                        </div>
                        <div class="d-flex">
                           
                            <div class="ts-service-info">
                                <h3 class="service-box-title">
                                    <a
                                        href="{{ route('detailDepartementPage', ['id' => $departement->id, 'slug' => \Str::slug($departement->nom_departement)]) }}">{{ $departement->nom_departement }}</a>
                                </h3>
                                <p>
                                <p> {!! $departement->description_accueil !!}</p>
                                </p>
                                <a class="learn-more d-inline-block"
                                    href="{{ route('detailDepartementPage', ['id' => $departement->id, 'slug' => \Str::slug($departement->nom_departement)]) }}"
                                    aria-label="service-details"><i class="fa fa-caret-right"></i> Learn more</a>
                            </div>
                        </div>
                    </div><!-- Service1 end -->
                </div><!-- Col 1 end -->
            @empty
            <div class="col-12">
                <p class="alert alert-info text-center p-3">
                    <i class="fa fa-exclamation-circle">&nbsp;</i> No departments yet registered.
                </p>
            </div>
            @endforelse


        </div>
    </div>
</section>