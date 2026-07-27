@extends('layouts.app')

@section('content')
    

    <div class="container">
        
          @include('partials.introSection', ['introTitle' => $introTitle, 'introText' => $introText])


        {{-- Sezione tatuaggi --}}
        <section>
            <button class="btn btn-success mb-3">
                <a href="{{ route('tattoo.create') }}" class="text-decoration-none text-white">
                    <i class="bi bi-plus-circle"></i> Aggiungi un nuovo tatuaggio
                </a>
            </button>
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
                                        <img src="{{ asset('storage/' . $tattoo->image_path) }}" alt="{{ 'IMMAGINE' }}">
                                    </span>
                                </td>
                                <td>{{ $tattoo->title }}</td>
                                <td>{{ $tattoo->price }} €</td>
                                <td>{{ $tattoo->artist->name ?? 'N/A' }}</td>
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
