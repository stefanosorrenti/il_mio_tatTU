@extends('layouts.app')

@section('content')

    <div class="container">

        @include('partials.introSection', ['introTitle' => $introTitle, 'introText' => $introText])

        {{-- Sezione form edit --}}
        <div class="card bg-dark text-light my-5">
            <div class="card-body p-4">
                <form action="{{ route('nationality.update', $nationality->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="name" class="form-label text-warning fw-semibold">Nome</label>
                        <input type="text" class="form-control bg-dark text-light border-secondary" id="name"
                            name="name" value="{{ $nationality->name }}" required>
                    </div>
                    <button type="submit" class="btn btn-warning fw-semibold">
                        <i class="bi bi-check-circle"></i> Salva
                    </button>
                </form>
            </div>
        </div>

    </div>
@endsection