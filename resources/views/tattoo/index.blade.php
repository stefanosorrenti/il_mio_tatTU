@extends('layouts.app')

@section('content')
    <div class="container">

        @include('partials.introSection', ['introTitle' => $introTitle, 'introText' => $introText])


        {{-- Sezione tatuaggi --}}
        <section class="my-5">
            <button class="btn btn-success mb-3">
                <a href="{{ route('tattoo.create') }}" class="text-decoration-none text-white">
                    <i class="bi bi-plus-circle"></i> Aggiungi un nuovo tatuaggio
                </a>
            </button>

            <div class="overflow-auto rounded-3 ">
                
                    <div class="table-responsive">

                        <table class="table table-striped table-dark rounded-3 mb-0">
                            <thead class="border-bottom border-warning border-opacity-50 text-uppercase small tracking-wider">
                                <tr class="text-center">
                                    <th scope="col" class="py-3 px-4 text-warning">Immagine</th>
                                    <th scope="col" class="py-3 px-4 text-warning">Nome</th>
                                    <th scope="col" class="py-3 px-4 text-warning">Prezzo</th>
                                    <th scope="col" class="py-3 px-4 text-warning">Artista</th>
                                    <th scope="col" class="py-3 px-4 text-warning text-end">Azioni</th>
                                </tr>
                            </thead>

                            <tbody class="text-center border-top-0">
                                @foreach ($tattoos as $tattoo)
                                    <tr>
                                        <td class="py-3 px-4">
                                                <img class="rounded-2 border border-secondary border-opacity-50 object-fit-cover table-img"  src="{{ asset('storage/' . $tattoo->image_path) }}" alt="{{ 'IMMAGINE' }}">
                                        </td>
                                        <td class="py-3 px-4 fw-semibold text-white">{{ $tattoo->title }}</td>
                                        <td class="py-3 px-4 text-white fw-semibold">{{ $tattoo->price }} €</td>
                                        <td class="py-3 px-4 text-white fw-semibold">{{ $tattoo->artist->name ?? 'N/A' }}</td>
                                        <td class="py-3 px-4 text-end">
                                            <a href="{{ route('tattoo.show', $tattoo->id) }}" class="btn btn-primary">
                                                <i class="bi bi-eye-fill"></i>
                                            </a>
                                            <a href="{{ route('tattoo.edit', $tattoo->id) }}" class="btn btn-warning">
                                                <i class="bi bi-pen-fill"></i>
                                            </a>
                                            <form action="{{ route('tattoo.destroy', $tattoo->id) }}" method="POST"
                                                class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger"
                                                    onclick="return confirm('Sei sicuro di voler eliminare questo tatuaggio?')">
                                                    <i class="bi bi-trash-fill"></i>
                                                </button>
                                            </form>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                
            </div>
        </section>
    </div>
@endsection
