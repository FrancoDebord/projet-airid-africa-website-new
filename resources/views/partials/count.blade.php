<section id="facts" class="facts-area dark-bg py-5">
    <div class="container">
        <div class="facts-wrapper">
            <div class="row text-center gy-4">
                <div class="col-lg-3 col-md-3 col-sm-6 col-6 ts-facts">
                    <div class="ts-facts-img mb-3">
                        <img loading="lazy" src="{{ asset('storage/assets_vendor/images/icon-image/service-icon1.png') }}" alt="facts-img" class="img-fluid fact-icon">
                    </div>
                    <div class="ts-facts-content">
                        <h2 class="ts-facts-num"><span class="counterUp" data-count="20">0</span>+</h2>
                        <h3 class="ts-facts-title">Total Projects</h3>
                    </div>
                </div>

                <div class="col-lg-3 col-md-3 col-sm-6 col-6 ts-facts">
                    <div class="ts-facts-img mb-3">
                        <img loading="lazy" src="{{ asset('storage/assets_vendor/images/icon-image/fact2.png') }}" alt="facts-img" class="img-fluid fact-icon">
                    </div>
                    <div class="ts-facts-content">
                        <h2 class="ts-facts-num"><span class="counterUp" data-count="75">0</span>+</h2>
                        <h3 class="ts-facts-title">Staff Members</h3>
                    </div>
                </div>
<br>
                <div class="col-lg-3 col-md-3 col-sm-6 col-6 ts-facts">
                    <div class="ts-facts-img mb-3">
                        <img loading="lazy" src="{{ asset('storage/assets_vendor/images/icon-image/service-icon4.png') }}" alt="facts-img" class="img-fluid fact-icon">
                    </div>
                    <div class="ts-facts-content">
                        <h2 class="ts-facts-num"><span class="counterUp" data-count="20">0</span>+</h2>
                        <h3 class="ts-facts-title">Partners</h3>
                    </div>
                </div>

                <div class="col-lg-3 col-md-3 col-sm-6 col-6 ts-facts">
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
                const rect = el.getBoundingClientRect();
                return (
                    rect.top >= 0 &&
                    rect.left >= 0 &&
                    rect.bottom <= (window.innerHeight || document.documentElement.clientHeight) &&
                    rect.right <= (window.innerWidth || document.documentElement.clientWidth)
                );
            }
            function animateCounter(counterElement) {
                const target = parseInt(counterElement.getAttribute('data-count'));
                const duration = 2000; 
                const step = target / (duration / 16); 
                let current = 0;   
                const timer = setInterval(function() {
                    current += step;
                    if (current >= target) {
                        current = target;
                        clearInterval(timer);
                    }
                    counterElement.textContent = Math.floor(current);
                    counterElement.classList.add('counting');
                    setTimeout(() => {
                        counterElement.classList.remove('counting');
                    }, 500);
                }, 16);
            }
            const counters = document.querySelectorAll('.counterUp');
            let animated = false;
            function checkCounters() {
                if (!animated) {
                    counters.forEach(counter => {
                        if (isElementInViewport(counter)) {
                            animated = true;
                            animateCounter(counter);
                        }
                    });
                }
            }
            checkCounters();
            window.addEventListener('scroll', checkCounters);
        });
    </script>