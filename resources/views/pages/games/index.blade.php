@extends('layouts.app')

@section('title', 'Games - LAVA ESPORTS')

@section('content')
    <!-- Hero Section -->
    <x-games.index-hero />

    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pb-12">
        <!-- Games Grid -->
        <div id="games-container">
            @include('pages.games._games_grid')
        </div>
    </div>
@endsection
