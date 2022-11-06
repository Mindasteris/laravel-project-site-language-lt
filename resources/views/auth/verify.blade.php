@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Patvirtinkite savo El.paštą') }}</div>

                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('Aktyvacijos nuoroda išsiųsta į jūsų el.paštą.') }}
                        </div>
                    @endif

                    {{ __('Prieš tęsiant, prašome patikrinti savo pašto dėžutę paskyros aktyvacijai.') }}
                    {{ __('Jeigu negavote laiško') }},
                    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                        @csrf
                        <button type="submit" class="btn btn-link p-0 m-0 align-baseline">{{ __('spausti čia, kad gauti naują aktyvacijos nuorodą') }}</button>.
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
