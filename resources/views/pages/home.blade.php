@extends('layouts.app')

@section('title', 'LAVA ESPORTS - Dominate the Game')

@section('content')
    
    @include('pages.home.hero')

    @include('pages.home.games')

    @include('pages.home.achievements')

    @include('pages.home.roster')

    @include('pages.home.cta')

@endsection
