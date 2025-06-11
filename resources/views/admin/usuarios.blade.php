@extends('layouts.app')
@section('content')
<div class="container mx-auto py-8">
    <h2 class="text-2xl font-bold text-blue-900 mb-6">Gestión de Usuarios</h2>
    <div class="mb-6">
        @livewire('user-create-form')
    </div>
    <div class="mb-6">
        @livewire('user-edit-form')
    </div>
    <div>
        @livewire('user-table')
    </div>
</div>
@endsection
