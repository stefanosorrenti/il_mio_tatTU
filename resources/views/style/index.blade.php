@extends('layouts.app')

@section('content')
    <div class="container">

        @include('partials.introSection', ['introTitle' => $introTitle, 'introText' => $introText])


        {{-- Sezione stili --}}
        <section class="my-5">
            <button class="btn btn-success mb-3">
                <a href="{{ route('style.create') }}" class="text-decoration-none text-white">
                    <i class="bi bi-plus-circle"></i> Aggiungi un nuovo stile
                </a>
            </button>

            <div class="overflow-auto rounded-3">

                <div class="table-responsive">
                    <table class="table table-striped table-dark rounded-3 mb-0">
                        <thead class="table-dark border-bottom border-warning border-opacity-50 text-uppercase small tracking-wider">
                            <tr class="text-center">
                                <th scope="col" class="py-3 px-4 text-warning">Nome</th>
                                <th scope="col" class="py-3 px-4 text-warning text-end">Azioni</th>
                            </tr>
                        </thead>

                        <tbody class="text-center border-top-0">
                            @foreach ($styles as $style)
                                <tr>
                                    <td class="py-3 px-4 fw-semibold text-white">{{ $style->name }}</td>
                                    <td class="py-3 px-4 text-end">
                                        <a href="{{ route('style.edit', $style->id) }}" class="btn btn-warning">
                                            <i class="bi bi-pen-fill"></i>
                                        </a>
                                        <form action="{{ route('style.destroy', $style->id) }}" method="POST"
                                            class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger"
                                                onclick="return confirm('Sei sicuro di voler eliminare questo stile?')">
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
