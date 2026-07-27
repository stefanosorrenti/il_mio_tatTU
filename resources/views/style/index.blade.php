@extends('layouts.app')

@section('content')
    <div class="container">

            @include('partials.introSection', ['introTitle' => $introTitle, 'introText' => $introText])


        {{-- Sezione stili --}}
        <section>
            <button class="btn btn-success mb-3">
                <a href="{{ route('style.create') }}" class="text-decoration-none text-white">
                    <i class="bi bi-plus-circle"></i> Aggiungi un nuovo stile
                </a>
            </button>
            <div class="overflow-auto">


                <table class="table table-striped">
                    <thead class="table-dark">
                        <tr class="text-center">
                            <th scope="col">Nome</th>
                            <th scope="col">Azioni</th>
                        </tr>
                    </thead>

                    <tbody class="text-center">
                        @foreach ($styles as $style)
                            <tr>
                                <td>{{ $style->name }}</td>
                                <td>
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
        </section>
    </div>
@endsection
