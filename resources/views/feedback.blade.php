@extends('layouts.app')

@section('title', 'Atsiliepimai')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">

                    {{-- Success Message --}}
                    @if (Session::has('feedback'))
                        <div class="alert alert-success text-center">
                            {{ Session::get('feedback') }}
                        </div>
                    @endif

                    <div class="card-header text-white card_header">{{ __('Palikite atsiliepimą') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ url('/atsiliepimai') }}">
                            @csrf

                            <div class="row mb-3">
                                <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Vardas') }}</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" autocomplete="name" autofocus>

                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>


                            <div class="row mb-3">
                                <label for="title" class="col-md-4 col-form-label text-md-end">{{ __('Tema') }}</label>

                                <div class="col-md-6">
                                    <input id="title" type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ old('title') }}">

                                    @error('title')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="message" class="col-md-4 col-form-label text-md-end">{{ __('Jūsų Žinutė') }}</label>

                                <div class="col-md-6">
                                   <textarea class="form-control @error('message') is-invalid @enderror" name="message" id="message" rows="10"></textarea>

                                   @error('message')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                   @enderror
                                </div>
                            </div>

                            <div class="row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Patvirtinti') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <h1 class="mt-3 border-bottom border-dark">Atsiliepimai</h1>

        <div>
            {{-- Feedbacks --}}
            @if ($feedbacks->count() === 0)
                <h3 class="text-center p-5">Nėra atsiliepimų. Būk pirmas ir išsakyk savo nuomonę.</h3>
                @endif
            @foreach ($feedbacks as $feedback)
                <div class="my-5 border-bottom border-danger">
                    <h2>{{ $feedback->name }}</h2>
                    <span class="text-primary">Data:</span><h6>{{ $feedback->created_at }}</h6>
                    <span class="text-primary">Tema:</span><p class="feedback-title">{{ $feedback->title }}</p>
                    <span class="text-primary">Atsiliepimas:</span><p class="feedback-text">{{ $feedback->message }}</p>
                    <span class="feedback-icons">
                    <a class="text-success p-2" href="/atsiliepimai/redaguoti/{{ $feedback->id }}"><i class="bi bi-pencil-fill"></i></a>
                    <span>|</span>
                    <a class="text-danger p-2" href="/atsiliepimai/istrinti/{{ $feedback->id }}"><i class="bi bi-trash3-fill"></i></a>
                    </span>
                </div>
            @endforeach
        </div>
            {{-- Pagination --}}
            {!! $feedbacks->links() !!}
    </div>
@endsection