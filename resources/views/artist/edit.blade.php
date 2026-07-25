@extends('layouts.app')

@section('content')
    
<div class="container">

        {{-- Sezione introduttiva --}}
        <section class="text-center my-5">
            <h1>Modifica artista</h1>
            <p>Compila il form sottostante per modificare le informazioni dell'artista.</p>
        </section>

        {{-- Sezione form edit --}}
        <div>
            <form action="{{ route('artist.update', $artist->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="name" class="form-label">Nome</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ $artist->name }}" required>
                </div>
                <div class="mb-3">
                    <label for="surname" class="form-label">Cognome</label>
                    <input type="text" class="form-control" id="surname" name="surname" value="{{ $artist->surname }}" required>
                </div>
                <div class="mb-3">
                    <label for="age" class="form-label">Età</label>
                    <input type="number" class="form-control" id="age" name="age" value="{{ $artist->age }}" required>
                </div>

                <div class="mb-3">
                    <label for="bio" class="form-label">Biografia</label>
                    <textarea class="form-control" id="bio" name="bio" rows="3" required>{{ $artist->bio }}</textarea>
                </div>

                <div class="mb-3">
                    <label for="nationality" class="form-label">Nazionalità</label>
                    <select class="form-control" id="nationality" name="nationality_id" required>
                        @foreach($nationalities as $nationality)
                            <option value="{{ $nationality->id }}" {{ $artist->nationality_id == $nationality->id ? 'selected' : '' }}>{{ $nationality->name }}</option>
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Salva</button>
            </form>
        </div>

    </div>
@endsection