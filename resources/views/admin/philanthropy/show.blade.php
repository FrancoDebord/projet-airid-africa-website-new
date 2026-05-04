@extends('admin.layout')

@section('content')
    <div class="container-fluid pt-4 px-4">
        <div class="row g-4">
            <div class="col-12">
                <div class="bg-white rounded h-100 p-4">
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <h6 class="mb-0">{{ $item->title }}</h6>
                        <div>
                            <a href="{{ route('philanthropyDetail', $item->slug) }}" class="btn btn-outline-primary btn-sm" target="_blank">Voir sur le site</a>
                            <a href="{{ route('admin.philanthropy.edit', $item->id) }}" class="btn btn-primary btn-sm">Modifier</a>
                            <a href="{{ route('admin.philanthropy.index') }}" class="btn btn-secondary btn-sm">Liste</a>
                        </div>
                    </div>
                    <p><strong>Slug:</strong> <code>{{ $item->slug }}</code> &nbsp; <strong>URL:</strong> /philanthropy/{{ $item->slug }}
                    &nbsp; <strong>Statut:</strong> @if($item->effective_status === 'past')<span class="badge bg-secondary">Passé</span>@else<span class="badge bg-success">En cours</span>@endif
                    @if($item->closing_date)<span class="ms-2 text-muted">Clôture : {{ $item->closing_date->format('d/m/Y') }}</span>@endif
                    </p>
                    @if($item->document_path)
                        <p><strong>Document PDF (EN):</strong> <a href="/assets/philanthropy/{{ $item->document_path }}" target="_blank" class="btn btn-sm btn-outline-primary">Télécharger</a></p>
                    @endif
                    @if($item->document_path_fr)
                        <p><strong>Document PDF (FR):</strong> <a href="/assets/philanthropy/{{ $item->document_path_fr }}" target="_blank" class="btn btn-sm btn-outline-primary">Télécharger</a></p>
                    @endif
                    @if($item->excerpt)
                        <p><strong>Résumé:</strong> {{ $item->excerpt }}</p>
                    @endif
                    @if($item->image_path)
                        <p><strong>Image principale:</strong> <img src="{{ asset('assets/philanthropy/' . $item->image_path) }}" alt="" class="img-thumbnail" style="max-height:120px"></p>
                    @endif
                    @if($item->image_paths && count($item->image_paths) > 0)
                        <p><strong>Images supplémentaires:</strong></p>
                        <div class="d-flex flex-wrap gap-2 mb-3">
                            @foreach($item->image_paths as $path)
                                <img src="{{ asset('assets/philanthropy/' . $path) }}" alt="" class="img-thumbnail" style="max-height:80px">
                            @endforeach
                        </div>
                    @endif
                    <div class="border rounded p-3">
                        <strong>Contenu:</strong>
                        <div class="mt-2">{!! $item->content !!}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
