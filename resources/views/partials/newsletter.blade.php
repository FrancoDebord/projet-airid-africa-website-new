{{-- Newsletter Section --}}
<div class="footer-newsletter py-4" style="background: #bd1a1a;">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-5 mb-3 mb-lg-0">
                <h4 class="mb-0" style="color: #fff">Subscribe to our Newsletter</h4>
                <p class="mb-0  small" style="color: #d2dae1">Stay updated with AIRID research, events and insights.</p>
            </div>
            <div class="col-lg-7">
                <form action="{{ route('subscribeNewsLetter') }}" method="POST" class="d-flex flex-wrap gap-2">
                    @csrf
                    <input type="email" name="email_newsletter" class="form-control flex-grow-1" style="max-width: 320px; background-color: #fff;" placeholder="Your email address" required>
                    <button type="submit" class="btn btn-danger">Subscribe</button>
                </form>
                @if(session('message'))
                    <p class="mt-2 mb-0 small text-{{ strpos(session('message'), 'successfully') !== false ? 'success' : 'info' }}">{{ session('message') }}</p>
                @endif
            </div>
        </div>
    </div>
</div>
