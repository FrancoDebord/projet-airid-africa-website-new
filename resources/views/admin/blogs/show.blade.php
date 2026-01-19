@extends('admin.layout')

@section('content')

    <div class="container-fluid pt-4 px-4">
        <div class="row g-4">
            <div class="col-12">
                <div class="bg-white rounded h-100 p-4">
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <h6 class="mb-0">Détails du Blog</h6>
                        <a href="{{ route('admin.blogs.edit', $blog->id) }}" class="btn btn-primary">
                            <i class="fas fa-edit me-2"></i>Modifier
                        </a>
                    </div>

                    <div class="row">
                        <!-- Photo de couverture -->
                        <div class="col-md-4 mb-4">
                            @if($blog->photo_couverture_blog)
                                @php
                                    $photoName = basename($blog->photo_couverture_blog);
                                    $photoPath = null;
                                    
                                    // Vérifier dans assets/blogs/ (nouveau système)
                                    if (file_exists(public_path('assets/blogs/' . $photoName))) {
                                        $photoPath = asset('assets/blogs/' . $photoName);
                                    } 
                                    // Vérifier dans storage/assets/blogs/ (ancien système)
                                    elseif (file_exists(public_path('storage/assets/blogs/' . $photoName))) {
                                        $photoPath = asset('storage/assets/blogs/' . $photoName);
                                    } 
                                    // Par défaut, essayer assets/blogs/
                                    else {
                                        $photoPath = asset('assets/blogs/' . $photoName);
                                    }
                                @endphp
                                <img src="{{ $photoPath }}" alt="Photo de couverture" class="img-fluid rounded shadow" onerror="this.onerror=null; this.style.display='none'; this.nextElementSibling.style.display='flex';">
                                <div class="bg-light rounded d-flex flex-column align-items-center justify-content-center p-4" style="height: 300px; border: 2px dashed #ccc; display: none;">
                                    <i class="fas fa-image fa-5x text-muted mb-3"></i>
                                    <p class="text-muted text-center mb-2">Image non trouvée</p>
                                    <small class="text-muted text-center">Fichier: {{ $photoName }}</small>
                                </div>
                            @else
                                <div class="bg-light rounded d-flex align-items-center justify-content-center" style="height: 300px;">
                                    <i class="fas fa-image fa-5x text-muted"></i>
                                </div>
                            @endif
                        </div>

                        <!-- Informations -->
                        <div class="col-md-8">
                            <div class="card border-0 shadow-sm">
                                <div class="card-body">
                                    <h5 class="card-title mb-4">Informations du Blog</h5>
                                    
                                    <div class="row mb-3">
                                        <div class="col-sm-4"><strong>Titre:</strong></div>
                                        <div class="col-sm-8">{{ $blog->titre_blog ?? 'Sans titre' }}</div>
                                    </div>

                                    @if($blog->creatorBlog)
                                    <div class="row mb-3">
                                        <div class="col-sm-4"><strong>Créateur:</strong></div>
                                        <div class="col-sm-8">
                                            {{ $blog->creatorBlog->prenom_personnel ?? '' }} {{ $blog->creatorBlog->nom_personnel ?? '' }}
                                        </div>
                                    </div>
                                    @endif

                                    @if($blog->photo_couverture_blog)
                                    <div class="row mb-3">
                                        <div class="col-sm-4"><strong>Photo de couverture:</strong></div>
                                        <div class="col-sm-8">
                                            <span class="badge bg-info">{{ basename($blog->photo_couverture_blog) }}</span>
                                            @php
                                                $photoName = basename($blog->photo_couverture_blog);
                                                $fileExists1 = file_exists(public_path('assets/blogs/' . $photoName));
                                                $fileExists2 = file_exists(public_path('storage/assets/blogs/' . $photoName));
                                            @endphp
                                            @if($fileExists1 || $fileExists2)
                                                <span class="badge bg-success ms-2">Fichier trouvé</span>
                                            @else
                                                <span class="badge bg-warning ms-2">Fichier non trouvé</span>
                                            @endif
                                        </div>
                                    </div>
                                    @endif

                                    @if($blog->date_blog)
                                    <div class="row mb-3">
                                        <div class="col-sm-4"><strong>Date de publication:</strong></div>
                                        <div class="col-sm-8">
                                            <span class="badge bg-primary">{{ date('d/m/Y', strtotime($blog->date_blog)) }}</span>
                                        </div>
                                    </div>
                                    @endif

                                    @if($blog->resume)
                                    <hr>
                                    <div class="mb-3">
                                        <strong>Résumé:</strong>
                                        <p class="mt-2">{{ $blog->resume }}</p>
                                    </div>
                                    @endif

                                    @if($blog->description_sans_html)
                                    <hr>
                                    <div class="mb-3">
                                        <strong>Description (sans HTML):</strong>
                                        <div class="mt-2 p-3 bg-light rounded" style="color: white;">
                                            {!! nl2br(e($blog->description_sans_html)) !!}
                                        </div>
                                    </div>
                                    @endif

                                    @if($blog->description_riche)
                                    <hr>
                                    <div class="mb-3">
                                        <strong>Description riche (avec HTML):</strong>
                                        <div class="mt-2 p-3 bg-light rounded" style="color: white;">
                                            {!! $blog->description_riche !!}
                                        </div>
                                    </div>
                                    @endif

                                    <hr>

                                    <div class="row mb-3">
                                        <div class="col-sm-4"><strong>Date de création:</strong></div>
                                        <div class="col-sm-8">{{ $blog->created_at ? $blog->created_at->format('d/m/Y H:i') : 'N/A' }}</div>
                                    </div>

                                    <div class="row mb-3">
                                        <div class="col-sm-4"><strong>Dernière modification:</strong></div>
                                        <div class="col-sm-8">{{ $blog->updated_at ? $blog->updated_at->format('d/m/Y H:i') : 'N/A' }}</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="mt-4">
                        <a href="{{ route('admin.blogs.index') }}" class="btn btn-secondary">
                            <i class="fas fa-arrow-left me-2"></i>Retour à la liste
                        </a>
                        <a href="{{ route('admin.blogs.edit', $blog->id) }}" class="btn btn-primary">
                            <i class="fas fa-edit me-2"></i>Modifier
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
