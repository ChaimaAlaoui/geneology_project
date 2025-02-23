@extends('layouts.app')

@section('content')
<div class="container vh-100 d-flex align-items-center justify-content-center">
    <div class="col-md-6">
        <div class="card shadow-sm border-0">
            <div class="card-header bg-primary text-white text-center">
                <h5 class="mb-0"><i class="bi bi-person-plus-fill me-2"></i>Créer une nouvelle personne</h5>
            </div>
            <div class="card-body">
                <form action="{{ route('people.store') }}" method="POST">
                    @csrf

                    <div class="mb-2">
                        <label for="first_name" class="form-label">Prénom</label>
                        <input type="text" name="first_name" id="first_name" class="form-control form-control-sm" required placeholder="Entrez le prénom">
                    </div>

                    <div class="mb-2">
                        <label for="last_name" class="form-label">Nom</label>
                        <input type="text" name="last_name" id="last_name" class="form-control form-control-sm" required placeholder="Entrez le nom">
                    </div>

                    <div class="mb-2">
                        <label for="birth_name" class="form-label">Nom de naissance</label>
                        <input type="text" name="birth_name" id="birth_name" class="form-control form-control-sm" placeholder="Entrez le nom de naissance">
                    </div>

                    <div class="mb-2">
                        <label for="middle_names" class="form-label">Autres prénoms</label>
                        <input type="text" name="middle_names" id="middle_names" class="form-control form-control-sm" placeholder="Entrez les autres prénoms">
                    </div>

                    <div class="mb-2">
                        <label for="date_of_birth" class="form-label">Date de naissance</label>
                        <input type="date" name="date_of_birth" id="date_of_birth" class="form-control form-control-sm">
                    </div>

                    <div class="d-flex justify-content-between">
                        <a href="{{ route('people.index') }}" class="btn btn-secondary btn-sm">
                            <i class="bi bi-arrow-left-circle me-1"></i> Retour
                        </a>
                        <button type="submit" class="btn btn-primary btn-sm">
                            <i class="bi bi-check-circle-fill me-1"></i> Créer
                        </button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>
@endsection
