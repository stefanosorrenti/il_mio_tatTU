@extends('layouts.app')


@section('content')
    <div class="container">

        {{-- Sezione introduttiva --}}
        <section class="text-center my-5">
            <h1>Tutti gli artisti</h1>
            <p>Clicca sulle relative icone per visualizzare/modificare/eliminare l'artista.</p>
        </section>


        {{-- Sezione artisti --}}
         <section>
            <button class="btn btn-success mb-3">
                <a href="" class="text-decoration-none text-white">
                    <i class="bi bi-plus-circle"></i> Aggiungi un nuovo artista
                </a>
            </button>
            <div class="overflow-auto">


                <table class="table table-striped">
                    <thead class="table-dark">
                        <tr class="text-center">
                            <th scope="col">Nome</th>
                            <th scope="col">Cognome</th>
                            <th scope="col">Eta</th>
                            <th scope="col">Azioni</th>
                        </tr>
                    </thead>

                    <tbody class="text-center">
                        @foreach ($artists as $artist)
                            <tr>
                                <td>{{ $artist->name }}</td>
                                <td>{{ $artist->surname }}</td>
                                <td>{{ $artist->age }}</td>
                                <td>
                                    <a href="{{ route('artist.show', $artist->id) }}" class="btn btn-primary">
                                        <i class="bi bi-eye-fill"></i>
                                    </a>
                                    <a href="{{ route('artist.edit', $artist->id) }}" class="btn btn-warning">
                                        <i class="bi bi-pen-fill"></i>
                                    </a>
                                    <form action="{{ route('artist.destroy', $artist->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger" onclick="return confirm('Sei sicuro di voler eliminare questo artista?')">
                                            <i class="bi bi-trash-fill"></i>
                                        </button>
                                    </form>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </section>
    </div>
@endsection
