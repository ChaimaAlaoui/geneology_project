@extends('layouts.app')

@section('content')
<div class="container vh-100 d-flex align-items-center justify-content-center">
    <div class="col-md-8">
        <div class="card shadow-lg border-0">
            <div class="card-header bg-primary text-white text-center">
                <h5 class="mb-0"><i class="bi bi-diagram-3-fill me-2"></i> Calculer le degré de parenté</h5>
            </div>
            <div class="card-body">
                <form action="{{ route('calculate.degree') }}" method="GET">
                    @csrf
                    <div class="mb-3">
                        <label for="person1_id" class="form-label">ID de la première personne</label>
                        <input type="number" class="form-control form-control-sm" id="person1_id" name="person1_id" required placeholder="Entrez l'ID">
                    </div>

                    <div class="mb-3">
                        <label for="person2_id" class="form-label">ID de la deuxième personne</label>
                        <input type="number" class="form-control form-control-sm" id="person2_id" name="person2_id" required placeholder="Entrez l'ID">
                    </div>

                    <div class="d-flex justify-content-between">
                        <a href="{{ route('people.index') }}" class="btn btn-secondary btn-sm">
                            <i class="bi bi-arrow-left-circle me-1"></i> Retour
                        </a>
                        <button type="submit" class="btn btn-primary btn-sm">
                            <i class="bi bi-calculator me-1"></i> Calculer
                        </button>
                    </div>
                </form>
            </div>
        </div>

        @if(isset($degree))
            <div class="card mt-4 shadow-sm border-0">
                <div class="card-header bg-success text-white text-center">
                    <h5 class="mb-0"><i class="bi bi-clipboard-check me-2"></i> Résultats</h5>
                </div>
                <div class="card-body">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item"><strong>Degré de parenté :</strong> {{ $degree }}</li>
                        <li class="list-group-item"><strong>Chemin :</strong> {{ $path }}</li>
                        <li class="list-group-item"><strong>Temps d'exécution :</strong> {{ $time }} secondes</li>
                        <li class="list-group-item"><strong>Nombre de requêtes SQL :</strong> {{ $nbQueries }}</li>
                    </ul>
                </div>
            </div>
        @endif
    </div>
</div>
@endsection
