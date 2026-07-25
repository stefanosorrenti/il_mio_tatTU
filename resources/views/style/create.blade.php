@extends('layouts.app')

@section('content')
    <div class="container">

        {{-- Sezione introduttiva --}}
        <section class="text-center my-5">
            <h1>Crea un nuovo stile</h1>
            <p>Compila il form sottostante per aggiungere un nuovo stile al database.</p>
        </section>

        {{-- Sezione form --}}
        <div>
            <form action="{{ route('style.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label">Nome</label>
                    <input type="text" class="form-control" id="name" name="name" required>
                </div>
                <button type="submit" class="btn btn-primary">Salva</button>
            </form>
            </section>

        </div>
    @endsection
        