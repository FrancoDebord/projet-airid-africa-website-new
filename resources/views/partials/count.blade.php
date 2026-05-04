<style>
    /* Facts section - responsive (mobile-first) */
    #facts.facts-area { padding: 1rem 0 !important; }
    #facts .facts-wrapper .row { --bs-gutter-y: 0.5rem; --bs-gutter-x: 0.5rem; }
    #facts .ts-facts { padding: 0.5rem 0.25rem; min-height: 0; }
    #facts .ts-facts-img { margin-bottom: 0.35rem !important; }
    #facts .ts-facts-img img,
    #facts .fact-icon { max-width: 40px; max-height: 40px; width: auto; height: auto; object-fit: contain; }
    #facts .ts-facts-num { font-size: 1rem; font-weight: 700; margin: 0 0 0.1rem 0; line-height: 1.2; }
    #facts .ts-facts-title { font-size: 0.7rem; font-weight: 600; margin: 0; line-height: 1.25; }
    @media (max-width: 379px) {
        #facts .container { padding-left: 0.5rem; padding-right: 0.5rem; }
        #facts .ts-facts-num { font-size: 0.9rem; }
        #facts .ts-facts-title { font-size: 0.65rem; }
        #facts .fact-icon { max-width: 32px; max-height: 32px; }
    }
    @media (min-width: 576px) {
        #facts .facts-wrapper .row { --bs-gutter-y: 0.75rem; --bs-gutter-x: 0.75rem; }
        #facts .ts-facts-num { font-size: 1.15rem; }
        #facts .ts-facts-title { font-size: 0.75rem; }
        #facts .fact-icon { max-width: 42px; max-height: 42px; }
    }
    @media (min-width: 768px) {
        #facts.facts-area { padding: 1.25rem 0 !important; }
        #facts .facts-wrapper .row { --bs-gutter-y: 1rem; }
        #facts .ts-facts-img { margin-bottom: 0.5rem !important; }
        #facts .ts-facts-num { font-size: 1.35rem; }
        #facts .ts-facts-title { font-size: 0.85rem; }
    }
    @media (min-width: 992px) {
        #facts .ts-facts-num { font-size: 1.5rem; }
        #facts .ts-facts-title { font-size: 0.9rem; }
        #facts .fact-icon { max-width: 48px; max-height: 48px; }
    }
</style>
<section id="facts" class="facts-area dark-bg facts-compact">
    <div class="container">
        <div class="facts-wrapper">
            <div class="row text-center g-2 g-sm-3 g-md-4 justify-content-center">
                <div class="col-6 col-md-3 ts-facts">
                    <div class="ts-facts-img mb-3">
                        <img loading="lazy" src="{{ asset('storage/assets_vendor/images/icon-image/service-icon1.png') }}" alt="facts-img" class="img-fluid fact-icon">
                    </div>
                    <div class="ts-facts-content">
                        <h2 class="ts-facts-num"><span class="counterUp" data-count="20">0</span>+</h2>
                        <h3 class="ts-facts-title">Total Projects</h3>
                    </div>
                </div>

                <div class="col-6 col-md-3 ts-facts">
                    <div class="ts-facts-img mb-3">
                        <img loading="lazy" src="{{ asset('storage/assets_vendor/images/icon-image/fact2.png') }}" alt="facts-img" class="img-fluid fact-icon">
                    </div>
                    <div class="ts-facts-content">
                        <h2 class="ts-facts-num"><span class="counterUp" data-count="61">0</span>+</h2>
                        <h3 class="ts-facts-title">Staff Members</h3>
                    </div>
                </div>

                <div class="col-6 col-md-3 ts-facts">
                    <div class="ts-facts-img mb-3">
                        <img loading="lazy" src="{{ asset('storage/assets_vendor/images/icon-image/service-icon4.png') }}" alt="facts-img" class="img-fluid fact-icon">
                    </div>
                    <div class="ts-facts-content">
                        <h2 class="ts-facts-num"><span class="counterUp" data-count="{{ $all_partenaires->count() ?? 0 }}">0</span>+</h2>
                        <h3 class="ts-facts-title">Partners</h3>
                    </div>
                </div>

                <div class="col-6 col-md-3 ts-facts">
                    <div class="ts-facts-img mb-3">
                        <img loading="lazy" src="{{ asset('storage/assets_vendor/images/icon-image/fact1.png') }}" alt="facts-img" class="img-fluid fact-icon">
                    </div>
                    <div class="ts-facts-content">
                        <h2 class="ts-facts-num"><span class="counterUp" data-count="84">0</span>+</h2>
                        <h3 class="ts-facts-title">Experimental Huts</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>



<script>
        document.addEventListener('DOMContentLoaded', function() {
            function isElementInViewport(el) {
                var rect = el.getBoundingClientRect();
                var vh = window.innerHeight || document.documentElement.clientHeight;
                var threshold = Math.min(120, vh * 0.25);
                return rect.top < vh - threshold && rect.bottom > 0;
            }
            function animateCounter(counterElement) {
                var target = parseInt(counterElement.getAttribute('data-count'), 10) || 0;
                var duration = 2000;
                var step = target / (duration / 16);
                var current = 0;
                var timer = setInterval(function() {
                    current += step;
                    if (current >= target) {
                        current = target;
                        clearInterval(timer);
                    }
                    counterElement.textContent = Math.floor(current);
                    counterElement.classList.add('counting');
                    setTimeout(function() { counterElement.classList.remove('counting'); }, 500);
                }, 16);
            }
            var counters = document.querySelectorAll('#facts .counterUp');
            var animated = false;
            function checkCounters() {
                if (animated) return;
                for (var i = 0; i < counters.length; i++) {
                    if (isElementInViewport(counters[i])) {
                        animated = true;
                        for (var j = 0; j < counters.length; j++) { animateCounter(counters[j]); }
                        break;
                    }
                }
            }
            checkCounters();
            window.addEventListener('scroll', checkCounters, { passive: true });
            window.addEventListener('resize', checkCounters);
        });
    </script>
