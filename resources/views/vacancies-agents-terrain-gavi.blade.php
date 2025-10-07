@extends('index')

@section('title', 'AVIS DE RECRUTEMENT D’AGENTS ENQUÊTEURS')


@section('content')
    <div id="banner-area" class="banner-area"
        style="background-image:url({{ asset('storage/assets_vendor/images/banner/banner2_new.png') }})">
        <div class="banner-text">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="banner-heading">
                            <h1 class="banner-title top_title">Vacancies</h1>
                            {{-- <nav aria-label="breadcrumb">
                                <ol class="breadcrumb justify-content-center">
                                    <li class="breadcrumb-item"><a href="{{ route('index') }}">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Vacancies</li>
                                </ol>
                            </nav> --}}
                        </div>
                    </div><!-- Col end -->
                </div><!-- Row end -->
            </div><!-- Container end -->
        </div><!-- Banner text end -->
    </div><!-- Banner area end -->

    <section id="main-container" class="main-container">
        <div class="container">
            <div class="row">


                {{-- <div class="col-12">
                    <p class="text-justify p-3 text-center font-weight-bold" style="border: 1px dashed #c20102">Content of this page coming soon</p>
                </div> --}}

                <div class="col-12">
                    <h3 class="title-section">AVIS DE RECRUTEMENT D’AGENTS ENQUÊTEURS</h3>
                </div>

                <div class="col-12 mt-2">
                    <h4 class="title-section">Contexte</h4>

                    <p class="text-justify">

                        Ce projet GAVI SIRI, piloté par l’équipe CREC/LSHTM au Centre de Recherche 
                        Entomologique de Cotonou, a pour objectif principal d’évaluer la faisabilité, 
                        de mesurer l’impact sanitaire et d’analyser le rapport coût-efficacité de l’administration saisonnière 
                        renforcée du vaccin contre le paludisme dans des contextes réels (Bénin).
                    </p>

                    <p class="text-justify mt-2">

                    Dans le cadre de la mise en œuvre des activités, le projet recrute 30 enquêteurs 
                    qui seront basés dans les départements du Borgou et des collines pour 
                    participer dans la collecte de données auprès des ménages pour une durée de 5 à 6 semaines.
                    </p>

                </div>

                <div class="col-12 mt-2">
                    <strong>Nombre d’enquêteurs recherchés  : </strong> 30 <br>
                    <strong>Zones sanitaires concernées  : </strong> 15 à Tchaourou, 15 à Dassa-Glazoué <br>
                    <strong>Durée du contrat : </strong>5 à 6 semaines à compter du 27 octobre 2025 <br>
                    <strong>Date de formation : </strong> Du 27 au 29 Octobre 2025  <br>
                    <strong>Date du début des collectes : </strong> 30 Octobre 2025
                </div>


                <div class="col-12 col-md-6 mt-3">
                    <h4 class="title-section">Responsabilités</h4>

                    <p class="text-justify mt-2">
                        Dans le cadre de la mise en œuvre de l’enquête, le candidat retenu aura les responsabilités suivantes 
                    </p>
                   <ul class="list-group mt-2">
                    <li>
                        Participer activement à la formation préalable à la collecte de données prévue à partir du 27 octobre 2025 ;
                    </li>
                    <li>
                        Réaliser la collecte de données de manière rigoureuse, conformément aux outils, procédures et méthodologies définis par le projet ;
                    </li>
                    <li>
                        Utiliser correctement les supports de collecte (questionnaires papier ou tablettes numériques) selon les directives reçues ;
                    </li>
                    <li>
                        S’assurer de la qualité, de l’exactitude et de l’exhaustivité des données collectées sur le terrain ;
                    </li>
                    <li>
                        Transmettre régulièrement les données collectées selon le calendrier établi ;
                    </li>
                    <li>
                        Collaborer avec les autres membres de l’équipe (superviseurs, coordinateurs, 
                        agents de santé, etc.) pour garantir une bonne couverture de la zone et résoudre les éventuels problèmes rencontrés ;
                    </li>
                    <li>
                        Respecter les consignes de confidentialité, d’éthique et de 
                        sécurité liées à la collecte de données sensibles auprès des populations ;
                    </li>
                    <li>
                        Maintenir un comportement professionnel en toutes circonstances,
                         en particulier lors des interactions avec les communautés enquêtées ;
                    </li>
                    <li>
                        Rendre compte de l’évolution des activités de collecte et signaler
                         tout incident ou difficulté rencontrée sur le terrain.
                    </li>
                   </ul>

                </div>

                <div class="col-12 col-md-6 mt-2">

                    <div class="row">

                        

                        <div class="col-12">
                            <h4 class="title-section">Profil Recherché</h4>

                            <ul class="mt-2">
                                <li>
                                   Être de nationalité béninoise ;
                                </li>
                                <li>
                                   Être âgé d’au moins 18 ans ;
                                </li>
                                <li>
                                    Être titulaire d’une Licence (Bac+3) en sciences 
                                    (biologie, statistique, géographie, sociologie ou disciplines similaires) ;
                                </li>
                                <li>
                                    Avoir une expérience avérée en collecte de données sur papier et sur tablette ;
                                </li>
                                <li>
                                    Maîtriser le français (lu et parlé) et au moins une langue locale
                                     utilisée dans la zone sanitaire choisie.
                                </li>
                               
                            </ul>

                        </div>

                    </div>



                </div>

                <div class="col-12 col-md-6 mt-2 p-3">
                    <h4 class="title-section">Compétences personnelles</h4>

                    <ul class="mt-2 list-group p-3 text-justify">
                        <li>
                            Bonnes aptitudes relationnelles et communicationnelles ;
                        </li>
                        <li>
                            Sens des responsabilités et rigueur professionnelle ;
                        </li>
                        <li>
                            Capacité à travailler en milieu rural et parfois difficile ;
                        </li>
                        <li>
                           Aptitude au travail en équipe, mais aussi de façon autonome et sous pression ;
                        </li>
                        <li>
                            Capacité d’adaptation et sens de l’initiative face aux problèmes rencontrés ;
                        </li>
                        <li>
                            Être totalement disponible à partir du 27 Octobre 2025 pour la formation et durant toute la période de l’enquête.
                        </li>
                    </ul>

                    <h4 class="title-section">Modalités de recrutement</h4>

                    <p class="mt-2 text-justify">Le processus se déroulera en trois étapes :</p>

                    <ul class="mt-2 list-group p-3 text-justify">
                        <li>
                            Présélection sur dossier
                        </li>
                        <li>
                           Entretien
                        </li>
                        <li>
                            Test pratique après formation
                        </li>
                    </ul>

                    <p class="mt-2 text-justify">Seuls les candidats retenus à chaque étape seront contactés.</p>
                </div>

                <div class="col-12 col-md-6 mt-2 p-3">

                    <h4 class="title-section">Dossier à fournir :</h4>
                    <p class="text-justify">
                        Les dossiers doivent être envoyés au plus tard le 10 Octobre 2025 à 15h00 (heure béninoise) par courriel à l’adresse suivante : <a
                            href="mailto:recrutementgavisiri@gmail.com?subject=GAVI-SIRI_ENQUETEUR">recrutementgavisiri@gmail.com</a> avec l’objet :
                        <strong>GAVI-SIRI_ENQUETEUR</strong> . Le dossier doit comprendre :
                    </p>

                    <ol class="mt-2 list-group p-3 text-justify">
                        <li>
                            Une lettre de motivation adressée à Madame l’Investigatrice Principale du projet GAVI-SIRI, CREC Bénin ;
                        </li>
                        <li>
                            Un CV détaillé ;
                        </li>
                        <li>
                            Une copie du diplôme le plus élevé obtenu.
                        </li>

                    </ol>

                    <p class="alert alert-info mt-2">
                        <strong>Date limite de candidature : 10 Octobre 2025</strong>
                    </p>
                    <p class=" text-justify mt-2 " style="font-style: italic">

                     Les dossiers reçus après la date et l’heure limites ne seront pas pris en compte.
                    </p>

                    @if (date('Y-m-d') <= '2025-10-10')
                        <div class="mt-3">
                            <a href="mailto:mailto:recrutementgavisiri@gmail.com?subject=GAVI-SIRI_ENQUETEUR"
                                class="btn btn-outline-danger  btn-lg" style="float: right">Postuler/Apply</a>

                                <a href="{{ asset("storage/documents_recrutement/AVIS DE RECRUTEMENT DES AGENTS ENQUETEURS pour le Projet GAVI.pdf.pdf") }}" target="_blank" class="btn btn-info btn-lg">Télécharger le document</a>
                        </div>
                    @else
                        <div class="mt-3">
                            <p class="alert alert-danger text-justify">
                                Le délai de candidature pour cette offre est déjà passé. Passez plus tard pour voir si nous avons de nouvelles offres.
                            </p>
                        </div>
                    @endif

                </div>

            </div><!-- Sidebar end -->
        </div><!-- Sidebar Col end -->

        </div><!-- Main row end -->

        </div><!-- Conatiner end -->


    </section>

@endsection
