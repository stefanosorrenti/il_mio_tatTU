@extends('layouts.app')

@section('content')

    {{-- SEZIONE INTRODUTTIVA --}}
    <div class="container">
        <section class="text-center my-5">
            <h2>Modifica tatuaggio</h2>
            <p>Modifica i dettagli del tatuaggio.</p>
        </section>

        {{-- SEZIONE FORM EDIT --}}
        <section>
            <form action="{{ route('tattoo.update', $tattoo->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label for="title" class="form-label">Nome</label>
                    <input type="text" class="form-control" id="title" name="title" value="{{ $tattoo->title }}"
                        required>
                </div>

                <div class="mb-3">
                    <label for="description" class="form-label">Descrizione</label>
                    <textarea class="form-control" id="description" name="description" rows="3" required>{{ $tattoo->description }}</textarea>
                </div>

                <div class="mb-3">
                    <label for="price" class="form-label">Prezzo (€)</label>
                    <input type="number" step="0.01" class="form-control" id="price" name="price"
                        value="{{ $tattoo->price }}" required>
                </div>

                <div class="mb-3">
                    <label for="time" class="form-label">Durata (minuti)</label>
                    <input type="number" class="form-control" id="time" name="time" value="{{ $tattoo->time }}"
                        required min="30">
                </div>

                <div class="mb-3">
                    <label for="image" class="form-label">Immagine</label>
                    <input type="file" class="form-control" id="image" name="image">
                    @if ($tattoo->image)
                        <img src="{{ $tattoo->image }}" alt="{{ 'IMMAGINE' }}"
                            style="max-width: 200px; margin-top: 10px;">
                    @endif
                </div>

                <button type="submit" class="btn btn-primary">Aggiorna</button>
            </form>
        </section>
    </div>
@endsection
