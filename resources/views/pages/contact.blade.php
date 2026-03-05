@extends('layouts.app')

@section('title', 'Contact - LAVA ESPORTS')

@section('content')
    <x-contact.hero />

    <!-- Contact Section -->
    <section class="py-16 relative">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid lg:grid-cols-5 gap-12">
                <x-contact.info />
                <x-contact.form />
            </div>
        </div>
    </section>
@endsection
