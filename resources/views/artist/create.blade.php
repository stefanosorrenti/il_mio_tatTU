@extends('layouts.app')

@section('content')

    <div class="container">

        {{-- Sezione introduttiva --}}
        <section class="text-center my-5">
            <h1>Crea un nuovo artista</h1>
            <p>Compila il form sottostante per aggiungere un nuovo artista al database.</p>
        </section>

        {{-- Sezione form --}}
        <section>
            <form action="{{ route('artist.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label">Nome</label>
                    <input type="text" class="form-control" id="name" name="name" required>
                </div>
                <div class="mb-3">
                    <label for="surname" class="form-label">Cognome</label>
                    <input type="text" class="form-control" id="surname" name="surname" required>
                </div>
                <div class="mb-3">
                    <label for="age" class="form-label">Età</label>
                    <input type="number" class="form-control" id="age" name="age" required>
                </div>

                <div class="mb-3">
                    <label for="bio" class="form-label">Biografia</label>
                    <textarea class="form-control" id="bio" name="bio" rows="3" required></textarea>
                </div>

                <div class="mb-3">
                    <label for="nationality" class="form-label">Nazionalità</label>
                    <select class="form-control" id="nationality" name="nationality_id" required>
                        @foreach($nationalities as $nationality)
                            <option value="{{ $nationality->id }}">{{ $nationality->name }}</option>
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Salva</button>
            </form>
        </section>

    </div>
@endsection