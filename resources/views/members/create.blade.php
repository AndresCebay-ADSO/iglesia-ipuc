@extends('layouts.app')

@section('title', 'Nuevo Miembro')

@section('content')
<div class="max-w-4xl">
    <h1 class="text-2xl sm:text-3xl font-bold text-gray-900 dark:text-white mb-4 sm:mb-6">Nuevo Miembro</h1>
    
    <form method="POST" action="{{ route('members.store') }}" class="bg-white dark:bg-gray-800 rounded-lg shadow p-4 sm:p-6">
            @csrf
            
        @include('members.partials.form')
            </form>
            </div>
            
<script src="{{ asset('js/members.ministry.js') }}"></script>
@endsection
