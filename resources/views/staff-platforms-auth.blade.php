@extends('index')

@section('title', 'Staff Platforms – AIRID Africa')

@section('css')
<style>
    .auth-section {
        min-height: 80vh;
        display: flex;
        align-items: center;
        background: linear-gradient(135deg, rgba(194,1,2,0.06) 0%, #f8f9fa 100%);
    }
    .auth-card {
        background: #fff;
        border-radius: 16px;
        box-shadow: 0 12px 40px rgba(0,0,0,0.10);
        border-top: 4px solid #c20102;
        padding: 2.5rem 2rem;
        max-width: 480px;
        width: 100%;
        margin: 0 auto;
    }
    .auth-icon {
        width: 70px; height: 70px;
        border-radius: 50%;
        background: linear-gradient(135deg, #c20102 0%, #8b0101 100%);
        display: flex; align-items: center; justify-content: center;
        margin: 0 auto 1.5rem;
        color: #fff; font-size: 2rem;
    }
    .auth-card h2 { font-size: 1.5rem; font-weight: 700; color: #1a1a1a; text-align: center; margin-bottom: 0.4rem; }
    .auth-card .subtitle { text-align: center; color: #666; font-size: 0.95rem; margin-bottom: 1.75rem; line-height: 1.5; }
    .auth-card .form-control {
        border-radius: 10px;
        border: 2px solid #dee2e6;
        padding: 0.75rem 1rem;
        font-size: 1rem;
        transition: border-color 0.25s, box-shadow 0.25s;
    }
    .auth-card .form-control:focus {
        border-color: #c20102;
        box-shadow: 0 0 0 3px rgba(194,1,2,0.12);
        outline: 0;
    }
    .auth-card .form-control.is-invalid { border-color: #dc3545; }
    .btn-auth {
        background: linear-gradient(135deg, #c20102 0%, #8b0101 100%);
        color: #fff; border: none;
        padding: 0.75rem 1.5rem;
        border-radius: 10px;
        font-weight: 600; font-size: 1rem;
        width: 100%;
        transition: opacity 0.25s, transform 0.25s;
    }
    .btn-auth:hover { opacity: 0.9; transform: translateY(-1px); color: #fff; }
    .auth-note { text-align: center; font-size: 0.85rem; color: #888; margin-top: 1.25rem; }
    .auth-note a { color: #c20102; text-decoration: none; }
    .auth-note a:hover { text-decoration: underline; }
</style>
@endsection

@section('content')
<section class="auth-section py-5">
    <div class="container">
        <div class="auth-card">
            <div class="auth-icon">
                <i class="fas fa-layer-group"></i>
            </div>
            <h2>Staff Platforms</h2>
            <p class="subtitle">
                Enter your email address to access the personal platforms portal.
            </p>

            @if($errors->any())
                <div class="alert alert-danger rounded-3 py-2 px-3 mb-3" style="font-size:0.92rem;">
                    <i class="fas fa-exclamation-circle me-2"></i>{{ $errors->first() }}
                </div>
            @endif

            <form action="{{ route('staffPlatforms.check') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="email" class="form-label fw-600" style="font-weight:600;">Email address</label>
                    <input
                        type="email"
                        class="form-control @error('email') is-invalid @enderror"
                        id="email"
                        name="email"
                        value="{{ old('email') }}"   
                        autofocus
                        autocomplete="email"
                        required
                    >
                </div>
                <button type="submit" class="btn-auth">
                    <i class="fas fa-arrow-right me-2"></i>Access Platforms
                </button>
            </form>

            <p class="auth-note">
                Access reserved.<br>
                <a href="{{ route('myAiridPortal') }}">← Back to My AIRID</a>
            </p>
        </div>
    </div>
</section>
@endsection
