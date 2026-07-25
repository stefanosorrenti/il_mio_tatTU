@extends('layouts.app')

@section('content')

    <div class="container">

        {{-- Sezione introduttiva --}}
        <section class="text-center my-5">
            <h1>Modifica stile</h1>
            <p>Compila il form sottostante per modificare le informazioni dello stile.</p>
        </section>

        {{-- Sezione form edit --}}
        <div>
            <form action="{{ route('style.update', $style->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="name" class="form-label">Nome</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ $style->name }}" required>
                </div>
                <button type="submit" class="btn btn-primary">Salva</button>
            </form>
        </div>

    </div>
@endsection