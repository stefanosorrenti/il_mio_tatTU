@extends('layouts.app')

@section('content')
    {{-- Sezione introduttiva --}}
    <div class="container">
        <section class="text-center my-5">
            <h2>Tutti i tatuaggi</h2>
            <p>Clicca sulle relative icone per visualizzare/modificare/eliminare il tatuaggio.</p>
        </section>


        {{-- Sezione tatuaggi --}}
        <section>
            <div class="overflow-auto">


                <table class="table table-striped">
                    <thead class="table-dark">
                        <tr class="text-center">
                            <th scope="col">Immagine</th>
                            <th scope="col">Nome</th>
                            <th scope="col">Prezzo</th>
                            <th scope="col">Artista</th>
                            <th scope="col">Azioni</th>
                        </tr>
                    </thead>

                    <tbody class="text-center">
                        @foreach ($tattoos as $tattoo)
                            <tr>
                                <td>
                                    <span class="ratio ratio-1x1">
                                        <img src="{{ asset('storage/' . $tattoo->image_path) }}" alt="{{ 'IMMAGINE' }}"></td>
                                    </span>
                                <td>{{ $tattoo->title }}</td>
                                <td>{{ $tattoo->price }} €</td>
                                <td>{{ 'prova' }}</td>
                                <td>
                                    <a href="{{ route('tattoo.show', $tattoo->id) }}" class="btn btn-primary">
                                        <i class="bi bi-eye-fill"></i>
                                    </a>
                                    <a href="{{ route('tattoo.edit', $tattoo->id) }}" class="btn btn-warning">
                                        <i class="bi bi-pen-fill"></i>
                                    </a>
                                    <form action="{{ route('tattoo.destroy', $tattoo->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger" onclick="return confirm('Sei sicuro di voler eliminare questo tatuaggio?')">
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
