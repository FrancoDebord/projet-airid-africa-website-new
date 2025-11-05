<section class="contents py-5 bg-light">
    <div class="container">
        <h3 class="column-title text-center mb-4">Nos partenaires</h3>

        <div class="partners-carousel d-flex align-items-center overflow-hidden">
            <div class="partners-track d-flex align-items-center">
                @foreach ($all_partenaires as $partenaire)
                    <div class="partner-card mx-3 text-center">
                        <a href="{{ $partenaire->site_web }}" target="_blank">
                            <img loading="lazy"
                                 src="{{ asset('storage/assets/logo/' . $partenaire->logo_partenaire) }}"
                                 alt="{{ $partenaire->nom_partenaire }}"
                                 class="partner-logo">
                        </a>
                        <h6 class="mt-2 fw-semibold">
                            <a href="{{ $partenaire->site_web }}" 
                               target="_blank" 
                               class="text-dark text-decoration-none">
                                {{ $partenaire->nom_partenaire }}
                            </a>
                        </h6>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</section>

<style>
/* Conteneur principal */
.partners-carousel {
    position: relative;
    width: 100%;
    overflow: hidden;
    padding: 10px 0;
}

/* Bande défilante */
.partners-track {
    display: flex;
    align-items: center;
    animation: scroll-left 120s linear infinite; /* ✅ vitesse ralentie */
}

/* Carte partenaire (sans cadre ni fond blanc) */
.partner-card {
    flex: 0 0 auto;
    background: transparent !important;
    border: none !important;
    box-shadow: none !important;
    text-align: center;
}

/* Image du logo — taille réelle */
.partner-logo {
    display: inline-block;
    height: auto;
    width: auto;
    max-height: 120px;  /* limite pour l’harmonie */
    max-width: 250px;
    object-fit: contain;
    transition: transform 0.3s ease;
}

/* Zoom au survol */
.partner-logo:hover {
    transform: scale(1.1);
}

/* Titre sous chaque logo */
.partner-card h6 {
    margin-top: 8px;
    font-size: 16px;
    font-weight: 600;
    color: #222;
}

/* Animation du défilement */
@keyframes scroll-left {
    0% {
        transform: translateX(0);
    }
    100% {
        transform: translateX(-50%);
    }
}

/* Responsive */
@media (max-width: 768px) {
    .partner-logo {
        max-height: 80px;
        max-width: 150px;
    }
    .partner-card h6 {
        font-size: 14px;
    }
}
</style>

<script>
document.addEventListener("DOMContentLoaded", function () {
    const track = document.querySelector(".partners-track");
    const clone = track.innerHTML;
    track.innerHTML += clone; 
});
</script>
