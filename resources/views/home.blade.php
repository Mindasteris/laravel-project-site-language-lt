@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card forgot-password-page">
                <div class="card-header card_header text-light">{{ __('Sveiki atvykę!') }} &nbsp; {{ Auth::user()->name }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <h3>{{ __('Esate prisijungęs!') }}</h3>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
