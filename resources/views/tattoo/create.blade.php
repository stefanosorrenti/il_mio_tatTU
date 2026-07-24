@extends('layouts.app')

@section('content')
    <div class="container">

        {{-- Sezione introduttiva --}}
        <section class="text-center my-5">
            <h1>Crea un Nuovo Tatuaggio</h1>
            <p>Compila il form sottostante per aggiungere un nuovo tatuaggio al database.</p>
        </section>

        <form action="{{ route('tattoo.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="mb-3">
                <label for="title" class="form-label">Nome</label>
                <input type="text" class="form-control" id="title" name="title" required>
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Descrizione</label>
                <textarea class="form-control" id="description" name="description" rows="3" required></textarea>
            </div>

            <div class="mb-3">
                <label for="image" class="form-label">Immagine</label>
                <input type="file" class="form-control" id="image" name="image" accept="image/*" required>
            </div>

            <div class="mb-3">
                <label for="price" class="form-label">Prezzo</label>
                <input type="number" class="form-control" id="price" name="price" step="0.01" required>
            </div>
            <div class="mb-3">
                <label for="time" class="form-label">Durata (minuti)</label>
                <input type="number" class="form-control" id="time" name="time" step="1" min="30"
                    required>
            </div>

            <div class="mb-3">
                <label for="artist_id" class="form-label">Artista</label>
                <select class="form-select" id="artist_id" name="artist_id" required>
                    @foreach ($artists as $artist)
                        <option value="{{ $artist->id }}">{{ $artist->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                
                @foreach ($styles as $style)
                    <div class="form-check d-inline-block me-3">
                        <input class="form-check-input" type="checkbox" name="styles[]" value="{{ $style->id }}"
                            id="style-{{ $style->id }}">
                        <label class="form-check-label" for="style-{{ $style->id }}">
                            {{ $style->name }}
                        </label>
                    </div>
                @endforeach
            </div>

            <button type="submit" class="btn btn-primary">Crea Tatuaggio</button>
        </form>
    </div>
@endsection
