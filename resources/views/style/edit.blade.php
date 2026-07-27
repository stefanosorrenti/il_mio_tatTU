@extends('layouts.app')

@section('content')

    <div class="container">

        @include('partials.introSection', ['introTitle' => $introTitle, 'introText' => $introText])

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