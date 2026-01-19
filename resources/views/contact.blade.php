@extends('index')

@section('title', 'AIRID --Contact')

@section('css')
    <style>
        /* ============================================
           ANIMATIONS AU SCROLL
           ============================================ */
        .fade-in-up {
            opacity: 0;
            transform: translateY(30px);
            transition: opacity 0.8s ease-out, transform 0.8s ease-out;
        }

        .fade-in-up.visible {
            opacity: 1;
            transform: translateY(0);
        }

        /* ============================================
           CARTES D'INFORMATIONS DE CONTACT
           ============================================ */
        .contact-info-card {
            background: #fff;
            border-radius: 20px;
            padding: 2.5rem;
            box-shadow: 0 5px 25px rgba(0,0,0,0.08);
            transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
            height: 100%;
            text-align: center;
            border-top: 4px solid #c20102;
        }

        .contact-info-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 40px rgba(0,0,0,0.15);
        }

        .contact-icon {
            width: 80px;
            height: 80px;
            border-radius: 50%;
            background: linear-gradient(135deg, #c20102 0%, #8b0101 100%);
            display: flex;
            align-items: center;
            justify-content: center;
            color: #fff;
            font-size: 2rem;
            margin: 0 auto 1.5rem;
            transition: transform 0.3s ease;
        }

        .contact-info-card:hover .contact-icon {
            transform: scale(1.1) rotate(5deg);
        }

        .contact-info-card h4 {
            color: #2c3e50;
            font-size: 1.3rem;
            font-weight: 700;
            margin-bottom: 1rem;
        }

        .contact-info-card p {
            color: #7f8c8d;
            margin-bottom: 0;
            line-height: 1.6;
        }

        .contact-info-card a {
            color: #c20102;
            text-decoration: none;
            font-weight: 600;
            transition: color 0.3s ease;
        }

        .contact-info-card a:hover {
            color: #8b0101;
        }

        /* ============================================
           FORMULAIRE MODERNE
           ============================================ */
        .contact-form-card {
            background: #fff;
            border-radius: 20px;
            padding: 2.5rem;
            box-shadow: 0 5px 25px rgba(0,0,0,0.08);
        }

        .form-group {
            margin-bottom: 1.5rem;
        }

        .form-group label {
            color: #2c3e50;
            font-weight: 600;
            margin-bottom: 0.5rem;
            display: block;
        }

        .form-control {
            border-radius: 10px;
            border: 2px solid #e0e0e0;
            padding: 0.75rem 1rem;
            transition: all 0.3s ease;
            font-size: 1rem;
        }

        .form-control:focus {
            border-color: #c20102;
            box-shadow: 0 0 0 0.2rem rgba(194, 1, 2, 0.1);
            outline: none;
        }

        .form-control.is-valid {
            border-color: #27ae60;
            background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 8 8'%3e%3cpath fill='%2327ae60' d='M2.3 6.73L.6 4.53c-.4-1.04.46-1.4 1.1-.8l1.1 1.4 3.4-3.8c.6-.63 1.6-.27 1.2.7l-4 4.6c-.43.5-.8.4-1.1.1z'/%3e%3c/svg%3e");
            background-repeat: no-repeat;
            background-position: right calc(0.375em + 0.1875rem) center;
            background-size: calc(0.75em + 0.375rem) calc(0.75em + 0.375rem);
            padding-right: calc(1.5em + 0.75rem);
        }

        .form-control.is-invalid {
            border-color: #e74c3c;
            background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 12 12' width='12' height='12' fill='none' stroke='%23e74c3c'%3e%3ccircle cx='6' cy='6' r='4.5'/%3e%3cpath d='m5.8 3.6 .4.4.4-.4m0 4.8-.4-.4-.4.4'/%3e%3c/svg%3e");
            background-repeat: no-repeat;
            background-position: right calc(0.375em + 0.1875rem) center;
            background-size: calc(0.75em + 0.375rem) calc(0.75em + 0.375rem);
            padding-right: calc(1.5em + 0.75rem);
        }

        .invalid-feedback {
            display: block;
            color: #e74c3c;
            font-size: 0.875rem;
            margin-top: 0.25rem;
        }

        .valid-feedback {
            display: block;
            color: #27ae60;
            font-size: 0.875rem;
            margin-top: 0.25rem;
        }

        textarea.form-control {
            resize: vertical;
            min-height: 150px;
        }

        .btn-submit {
            background: linear-gradient(135deg, #c20102 0%, #8b0101 100%);
            border: none;
            border-radius: 50px;
            padding: 0.75rem 2.5rem;
            font-weight: 600;
            color: #fff;
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }

        .btn-submit::before {
            content: '';
            position: absolute;
            top: 50%;
            left: 50%;
            width: 0;
            height: 0;
            border-radius: 50%;
            background: rgba(255,255,255,0.3);
            transform: translate(-50%, -50%);
            transition: width 0.6s, height 0.6s;
        }

        .btn-submit:hover::before {
            width: 300px;
            height: 300px;
        }

        .btn-submit:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 25px rgba(194, 1, 2, 0.4);
        }

        .btn-submit:disabled {
            opacity: 0.6;
            cursor: not-allowed;
        }

        /* ============================================
           CARTE GOOGLE MAPS
           ============================================ */
        .map-container {
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 5px 25px rgba(0,0,0,0.08);
            height: 100%;
            min-height: 500px;
        }

        .map-container iframe {
            width: 100%;
            height: 100%;
            border: 0;
        }

        /* ============================================
           MESSAGE DE SUCCÈS
           ============================================ */
        .alert-success-modern {
            background: linear-gradient(135deg, #27ae60 0%, #229954 100%);
            color: #fff;
            border: none;
            border-radius: 15px;
            padding: 1.5rem;
            box-shadow: 0 5px 20px rgba(39, 174, 96, 0.3);
            animation: slideDown 0.5s ease-out;
        }

        @keyframes slideDown {
            from {
                opacity: 0;
                transform: translateY(-20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* ============================================
           RESPONSIVE
           ============================================ */
        @media (max-width: 768px) {
            .contact-form-card {
                padding: 1.5rem;
            }

            .contact-info-card {
                padding: 2rem;
                margin-bottom: 1.5rem;
            }

            .map-container {
                min-height: 400px;
                margin-top: 2rem;
            }
        }
    </style>
@endsection

@section('content')
    <!-- Hero Section -->
    <div id="banner-area" class="banner-area"
        style="background-image:url({{ asset('storage/assets_vendor/images/banner/banner2_new.png') }})">
        <div class="banner-text">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="banner-heading">
                            <h1 class="banner-title top_title fade-in-up">Contact Us</h1>
                            <p class="text-white mt-3 fade-in-up" style="font-size: 1.2rem;">
                                Get in touch with our team
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Section Informations de Contact -->
    <section class="py-5">
        <div class="container">
            <div class="row text-center mb-5 fade-in-up">
                <div class="col-12">
                    <h2 class="section-title" style="font-size: 2.5rem; font-weight: 700; color: #2c3e50;">Reaching Our Office</h2>
                    <h3 class="section-sub-title" style="font-size: 1.3rem; color: #7f8c8d; font-weight: 500;">Find Our Location</h3>
                    <div class="title-divider mx-auto mt-3 mb-4" style="width: 100px; height: 4px; background: linear-gradient(135deg, #c20102 0%, #8b0101 100%); border-radius: 2px;"></div>
                </div>
            </div>

            <div class="row g-4">
                <div class="col-lg-4 col-md-6 fade-in-up">
                    <div class="contact-info-card">
                        <div class="contact-icon">
                            <i class="fas fa-map-marker-alt"></i>
                        </div>
                        <h4>Visit Our Office</h4>
                        <p>
                            Secrétariat AIRID, Maison 115, Rue 1543 Donaten, AKPAKPA<br>
                            (Rue SOBEPEC, 4e Von à gauche, dernier immeuble à gauche)<br>
                            Cotonou, Benin Republic
                        </p>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 fade-in-up" style="transition-delay: 0.1s">
                    <div class="contact-info-card">
                        <div class="contact-icon">
                            <i class="fas fa-envelope"></i>
                        </div>
                        <h4>Email Us</h4>
                        <p>
                            <a href="mailto:admin@airid-africa.com">
                                <i class="fas fa-envelope me-2"></i>
                                admin@airid-africa.com
                            </a>
                        </p>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 fade-in-up" style="transition-delay: 0.2s">
                    <div class="contact-info-card">
                        <div class="contact-icon">
                            <i class="fas fa-phone"></i>
                        </div>
                        <h4>Call Us</h4>
                        <p>
                            <a href="tel:+2290167164499">
                                <i class="fas fa-phone me-2"></i>
                                (+229) 01 67 16 44 99
                            </a><br>
                            <a href="tel:+2290195033333">
                                <i class="fas fa-phone me-2"></i>
                                01 95 03 33 33
                            </a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Section Formulaire et Carte -->
    <section class="py-5" style="background: #f8f9fa;">
        <div class="container">
            <div class="row g-4 align-items-stretch">
                <!-- Formulaire -->
                <div class="col-lg-6 col-md-12 fade-in-up">
                    <div class="contact-form-card">
                        <h3 class="mb-4" style="font-size: 2rem; font-weight: 700; color: #2c3e50;">
                            <i class="fas fa-paper-plane me-2" style="color: #c20102;"></i>
                            Get in Touch
                        </h3>

                        @session('message')
                            <div class="alert alert-success-modern mb-4" role="alert">
                                <i class="fas fa-check-circle me-2"></i>
                                <strong>{{ session()->get('message') }}</strong>
                            </div>
                        @endsession

                        <form id="contact-form" action="{{ route('postContactMessage') }}" method="post" role="form">
                            @csrf

                            <!-- Champ invisible anti-robot -->
                            <input type="text" name="robot_trap" style="display:none" tabindex="-1" autocomplete="off">

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="name">
                                            <i class="fas fa-user me-2" style="color: #c20102;"></i>
                                            Full Name <span class="text-danger">*</span>
                                        </label>
                                        <input 
                                            class="form-control @error('full_name') is-invalid @enderror"
                                            name="full_name" 
                                            id="name" 
                                            type="text" 
                                            placeholder="Enter your full name"
                                            value="{{ old('full_name') }}"
                                            required
                                        >
                                        @error('full_name')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                        <div class="valid-feedback">Looks good!</div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="email">
                                            <i class="fas fa-envelope me-2" style="color: #c20102;"></i>
                                            Email Address <span class="text-danger">*</span>
                                        </label>
                                        <input 
                                            class="form-control @error('adresse_mail') is-invalid @enderror"
                                            name="adresse_mail" 
                                            id="email" 
                                            type="email" 
                                            placeholder="your.email@example.com"
                                            value="{{ old('adresse_mail') }}"
                                            required
                                        >
                                        @error('adresse_mail')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                        <div class="valid-feedback">Valid email!</div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="subject">
                                            <i class="fas fa-tag me-2" style="color: #c20102;"></i>
                                            Subject <span class="text-danger">*</span>
                                        </label>
                                        <input 
                                            class="form-control @error('subject') is-invalid @enderror"
                                            name="subject" 
                                            id="subject" 
                                            placeholder="What is this regarding?"
                                            value="{{ old('subject') }}"
                                            required
                                        >
                                        @error('subject')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                        <div class="valid-feedback">Looks good!</div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="message">
                                    <i class="fas fa-comment-alt me-2" style="color: #c20102;"></i>
                                    Message <span class="text-danger">*</span>
                                </label>
                                <textarea 
                                    class="form-control @error('detailed_message') is-invalid @enderror"
                                    name="detailed_message" 
                                    id="message" 
                                    rows="6" 
                                    placeholder="Please provide details about your inquiry..."
                                    required
                                >{{ old('detailed_message') }}</textarea>
                                @error('detailed_message')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                                <div class="valid-feedback">Looks good!</div>
                                <small class="form-text text-muted mt-1">
                                    <span id="char-count">0</span> / 1000 characters
                                </small>
                            </div>

                            <!-- Anti-bot measure: Dynamic math question -->
                            <div class="form-group">
                                <label for="math_answer">
                                    <i class="fas fa-shield-alt me-2" style="color: #c20102;"></i>
                                    Security Verification <span class="text-danger">*</span>
                                </label>
                                <div class="d-flex align-items-center gap-2 mb-2">
                                    <span class="badge bg-light text-dark p-2" style="font-size: 1rem;">
                                        What is {{ $math_question ?? '5 + 3' }} = ?
                                    </span>
                                </div>
                                <input 
                                    class="form-control @error('math_answer') is-invalid @enderror"
                                    name="math_answer" 
                                    id="math_answer" 
                                    type="number" 
                                    placeholder="Enter the answer"
                                    min="0" 
                                    step="1"
                                    required
                                >
                                @error('math_answer')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                                <div class="valid-feedback">Correct!</div>
                            </div>

                            <div class="text-end">
                                <button class="btn btn-submit" type="submit" id="submit-btn">
                                    <i class="fas fa-paper-plane me-2"></i>
                                    Send Message
                                </button>
                            </div>
                        </form>
                    </div>
                </div>

                <!-- Carte Google Maps -->
                <div class="col-lg-6 col-md-12 fade-in-up" style="transition-delay: 0.3s">
                    <div class="map-container">
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m17!1m12!1m3!1d3965.2521939531684!2d2.466331!3d6.361396999999999!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m2!1m1!2zNsKwMjEnNDEuMCJOIDLCsDI3JzU4LjgiRQ!5e0!3m2!1sfr!2sbj!4v1749480672092!5m2!1sfr!2sbj"
                            allowfullscreen="" 
                            loading="lazy"
                            referrerpolicy="no-referrer-when-downgrade">
                        </iframe>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('js')
    <script>
        // ============================================
        // ANIMATIONS AU SCROLL
        // ============================================
        document.addEventListener('DOMContentLoaded', function() {
            const observerOptions = {
                threshold: 0.1,
                rootMargin: '0px 0px -50px 0px'
            };

            const observer = new IntersectionObserver(function(entries) {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('visible');
                        observer.unobserve(entry.target);
                    }
                });
            }, observerOptions);

            const animatedElements = document.querySelectorAll('.fade-in-up');
            animatedElements.forEach(el => {
                observer.observe(el);
            });
        });

        // ============================================
        // VALIDATION EN TEMPS RÉEL
        // ============================================
        document.addEventListener('DOMContentLoaded', function() {
            const form = document.getElementById('contact-form');
            const nameInput = document.getElementById('name');
            const emailInput = document.getElementById('email');
            const subjectInput = document.getElementById('subject');
            const messageInput = document.getElementById('message');
            const mathInput = document.getElementById('math_answer');
            const submitBtn = document.getElementById('submit-btn');
            const charCount = document.getElementById('char-count');

            // Validation du nom
            if (nameInput) {
                nameInput.addEventListener('blur', function() {
                    const value = this.value.trim();
                    if (value.length < 2) {
                        this.classList.remove('is-valid');
                        this.classList.add('is-invalid');
                    } else {
                        this.classList.remove('is-invalid');
                        this.classList.add('is-valid');
                    }
                });
            }

            // Validation de l'email
            if (emailInput) {
                emailInput.addEventListener('input', function() {
                    const email = this.value.trim();
                    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                    
                    if (email && !emailRegex.test(email)) {
                        this.classList.remove('is-valid');
                        this.classList.add('is-invalid');
                    } else if (email && emailRegex.test(email)) {
                        this.classList.remove('is-invalid');
                        this.classList.add('is-valid');
                    } else {
                        this.classList.remove('is-invalid', 'is-valid');
                    }
                });
            }

            // Validation du sujet
            if (subjectInput) {
                subjectInput.addEventListener('blur', function() {
                    const value = this.value.trim();
                    if (value.length < 3) {
                        this.classList.remove('is-valid');
                        this.classList.add('is-invalid');
                    } else {
                        this.classList.remove('is-invalid');
                        this.classList.add('is-valid');
                    }
                });
            }

            // Compteur de caractères pour le message
            if (messageInput && charCount) {
                messageInput.addEventListener('input', function() {
                    const length = this.value.length;
                    charCount.textContent = length;
                    
                    if (length < 10) {
                        this.classList.remove('is-valid');
                        this.classList.add('is-invalid');
                    } else {
                        this.classList.remove('is-invalid');
                        this.classList.add('is-valid');
                    }
                });
            }

            // Validation de la réponse mathématique
            if (mathInput) {
                // Extraire la réponse attendue depuis le label
                const mathLabel = document.querySelector('label[for="math_answer"]');
                let expectedAnswer = 8; // Valeur par défaut
                
                if (mathLabel) {
                    const mathText = mathLabel.textContent;
                    const match = mathText.match(/(\d+)\s*\+\s*(\d+)/);
                    if (match) {
                        expectedAnswer = parseInt(match[1]) + parseInt(match[2]);
                    }
                }
                
                mathInput.addEventListener('blur', function() {
                    const answer = parseInt(this.value);
                    
                    if (answer === expectedAnswer) {
                        this.classList.remove('is-invalid');
                        this.classList.add('is-valid');
                    } else if (this.value) {
                        this.classList.remove('is-valid');
                        this.classList.add('is-invalid');
                    }
                });
            }

            // Prévention des doubles soumissions
            if (form && submitBtn) {
                form.addEventListener('submit', function() {
                    submitBtn.disabled = true;
                    submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin me-2"></i>Sending...';
                });
            }
        });
    </script>
@endsection
