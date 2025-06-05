@extends('layouts.app')
@section('title', 'الرئيسية')
@section('content')
    <!-- Hero Section -->
    <section class="hero-gradient text-white section-padding">
        <div class="section-container text-center">
            <h1 class="hero-heading mb-6">
                {{ __('messages.welcome') }}
            </h1>
            <p class="text-xl text-primary-100 mb-8 max-w-3xl mx-auto">
                {{ __('messages.welcome_subtitle') }}
            </p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <a href="{{ url('/contact') }}" class="btn">
                    {{ __('messages.join_us') }}
                </a>
                <a href="{{ url('/about') }}" class="btn-outline bg-white/10 border-white text-white hover:bg-white hover:text-primary-700">
                    {{ __('messages.learn_more') }}
                </a>
            </div>
        </div>
    </section>

    <!-- Mission Section -->
    <section class="section-padding">
        <div class="section-container">
            <div class="max-w-4xl mx-auto text-center">
                <h2 class="heading-secondary mb-6">
                    {{ __('messages.mission') }}
                </h2>
                <p class="text-body mb-12">
                    {{ __('messages.mission_text') }}
                </p>

                <!-- Key Values -->
                <div class="projects-grid mt-12">
                    <!-- Education Value -->
                    <div class="value-card animate-fade-in-up hover-lift">
                        <div class="value-icon bg-primary-100 shadow-colored-primary hover-glow">
                            <svg class="w-8 h-8 text-primary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                            </svg>
                        </div>
                        <h3 class="text-xl font-semibold text-gradient-primary mb-2">
                            {{ __('messages.education') }}
                        </h3>
                        <p class="text-text-secondary">
                            {{ __('messages.education_text') }}
                        </p>
                    </div>

                    <!-- Health Value -->
                    <div class="value-card animate-fade-in-up hover-lift" style="animation-delay: 0.2s;">
                        <div class="value-icon bg-accent-100 shadow-colored-accent hover-glow">
                            <svg class="w-8 h-8 text-accent-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path>
                            </svg>
                        </div>
                        <h3 class="text-xl font-semibold text-gradient-primary mb-2">
                            {{ __('messages.health') }}
                        </h3>
                        <p class="text-text-secondary">
                            {{ __('messages.health_text') }}
                        </p>
                    </div>

                    <!-- Community Value -->
                    <div class="value-card animate-fade-in-up hover-lift" style="animation-delay: 0.4s;">
                        <div class="value-icon bg-success-100 shadow-soft hover-glow">
                            <svg class="w-8 h-8 text-success-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 515.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                            </svg>
                        </div>
                        <h3 class="text-xl font-semibold text-gradient-primary mb-2">
                            {{ __('messages.community') }}
                        </h3>
                        <p class="text-text-secondary">
                            {{ __('messages.community_text') }}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Featured Projects Section -->
    <section class="bg-secondary section-padding">
        <div class="section-container">
            <div class="text-center mb-12">
                <h2 class="heading-secondary mb-4">
                    {{ __('messages.featured_projects') }}
                </h2>
                <p class="text-body">
                    {{ __('messages.projects_text') }}
                </p>
            </div>

            <div class="projects-grid">
                <!-- Education Project -->
                <div class="card-feature project-card animate-scale-in hover-lift">
                    <div class="value-icon bg-primary-100 mb-4 shadow-colored-primary animate-float">
                        <svg class="w-8 h-8 text-primary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-gradient-primary mb-2">
                        {{ __('messages.education_program') }}
                    </h3>
                    <p class="text-text-secondary">
                        {{ __('messages.education_program_text') }}
                    </p>
                </div>

                <!-- Health Project -->
                <div class="card project-card">
                    <div class="value-icon bg-accent-100 mb-4">
                        <svg class="w-8 h-8 text-accent-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-primary-700 mb-2">
                        {{ __('messages.khettara_title') }}
                    </h3>
                    <p class="text-text-secondary">
                        {{ __('messages.khettara_text') }}
                    </p>
                </div>

                <!-- Community Project -->
                <div class="card project-card">
                    <div class="value-icon bg-success-100 mb-4">
                        <svg class="w-8 h-8 text-success-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 515.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-primary-700 mb-2">
                        {{ __('messages.cultural_title') }}
                    </h3>
                    <p class="text-text-secondary">
                        {{ __('messages.cultural_text') }}
                    </p>
                </div>
            </div>

            <!-- Call to Action -->
            <div class="text-center mt-12">
                <a href="{{ url('/projects') }}" class="btn animate-bounce-in hover-scale" style="animation-delay: 0.8s;">
                    {{ __('messages.discover_all_projects') }}
                </a>
            </div>
        </div>
    </section>
@endsection