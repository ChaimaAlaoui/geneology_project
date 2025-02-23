@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Liste des personnes</h1>
    <a href="{{ route('people.create') }}" class="btn btn-primary mb-3">Créer une nouvelle personne</a>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="card shadow-lg p-3"> 
        <div class="card-body">
            <table class="table table-bordered small"> 
                <thead class="table-light">
                    <tr>
                        <th>ID</th>
                        <th>Prénom</th>
                        <th>Nom</th>
                        <th>Créé par</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($people as $person)
                        <tr>
                            <td>{{ $person->id }}</td>
                            <td>{{ $person->first_name }}</td>
                            <td>{{ $person->last_name }}</td>
                            <td>{{ $person->user->name }}</td>
                            <td>
                                <a href="{{ route('people.show', $person->id) }}" class="btn btn-info btn-sm">Voir</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <div class="d-flex justify-content-between align-items-center">
                <div>
                    Showing {{ $people->firstItem() }} to {{ $people->lastItem() }} of {{ $people->total() }} results
                </div>

                <nav>
                    <ul class="pagination">
                        @if ($people->onFirstPage())
                            <li class="page-item disabled">
                                <span class="page-link">Previous</span>
                            </li>
                        @else
                            <li class="page-item">
                                <a class="page-link" href="{{ $people->previousPageUrl() }}">Previous</a>
                            </li>
                        @endif

                        @if ($people->hasMorePages())
                            <li class="page-item">
                                <a class="page-link" href="{{ $people->nextPageUrl() }}">Next</a>
                            </li>
                        @else
                            <li class="page-item disabled">
                                <span class="page-link">Next</span>
                            </li>
                        @endif
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</div>
@endsection
