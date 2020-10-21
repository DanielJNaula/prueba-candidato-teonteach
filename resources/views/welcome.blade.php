@extends('layouts.app')

@section('title', 'Inicio')

@push('meta')
    <meta name="csrf-token" content="{{ csrf_token() }}">
@endpush

@section('content')

    <div class="container">
        <br><br><br>
        <div class="card">
            <ul class="list-group list-group-flush">
                <li class="list-group-item"> <h3>Generación de string</h3></li>
            </ul>
            <div class="card-body">
                    <a class="btn btn-lg px-5 btn-primary button-string-random"  href="#" role="button">Generar String</a>
            </div>
        </div>

    </div>
@include('includes.modal')

@endsection

@push('scripts')
    <script src="/js/create_string_random.js"></script>
@endpush
