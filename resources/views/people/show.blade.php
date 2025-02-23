@extends('layouts.app')

@section('content')
<div class="container py-4 d-flex justify-content-center">
    <div class="col-md-8">
        <div class="card shadow-sm border-0">
            <div class="card-header bg-primary text-white text-center">
                <h5 class="mb-0"><i class="bi bi-person-badge-fill me-2"></i>Détails de la personne</h5>
            </div>
            <div class="card-body">
                <h4 class="text-primary text-center">
                    <i class="bi bi-person-fill me-2"></i>{{ $person->first_name }} {{ $person->last_name }}
                </h4>

                <div class="mb-3">
                    <p class="mb-1"><strong><i class="bi bi-card-text me-2"></i>Nom de naissance :</strong> {{ $person->birth_name ?? 'Non renseigné' }}</p>
                    <p class="mb-1"><strong><i class="bi bi-person-lines-fill me-2"></i>Autres prénoms :</strong> {{ $person->middle_names ?? 'Non renseigné' }}</p>
                    <p class="mb-1"><strong><i class="bi bi-calendar-event me-2"></i>Date de naissance :</strong> {{ $person->date_of_birth ?? 'Non renseignée' }}</p>
                    <p class="mb-3"><strong><i class="bi bi-person-circle me-2"></i>Créé par :</strong> {{ $person->user->name }}</p>
                </div>

                <div class="mb-3">
                    <h5 class="text-secondary"><i class="bi bi-people-fill me-2"></i>Enfants :</h5>
                    @if ($person->children->isEmpty())
                        <p class="text-muted">Aucun enfant enregistré.</p>
                    @else
                        <ul class="list-group list-group-flush">
                            @foreach ($person->children as $child)
                                <li class="list-group-item"><i class="bi bi-person me-2"></i>{{ $child->first_name }} {{ $child->last_name }}</li>
                            @endforeach
                        </ul>
                    @endif
                </div>

                <div class="mb-3">
                    <h5 class="text-secondary"><i class="bi bi-people-fill me-2"></i>Parents :</h5>
                    @if ($person->parents->isEmpty())
                        <p class="text-muted">Aucun parent enregistré.</p>
                    @else
                        <ul class="list-group list-group-flush">
                            @foreach ($person->parents as $parent)
                                <li class="list-group-item"><i class="bi bi-person me-2"></i>{{ $parent->first_name }} {{ $parent->last_name }}</li>
                            @endforeach
                        </ul>
                    @endif
                </div>

                <div class="text-center mt-3">
                    <a href="{{ route('people.index') }}" class="btn btn-secondary">
                        <i class="bi bi-arrow-left-circle me-2"></i>Retour
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
