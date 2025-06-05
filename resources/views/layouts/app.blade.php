<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}" dir="{{ app()->getLocale() == 'ar' ? 'rtl' : 'ltr' }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') - Miftah Essaad</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&family=Amiri:wght@400;500;600;700&display=swap" rel="stylesheet">
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>
<body class="font-sans bg-secondary">
    <header class="bg-white shadow-lg border-b border-secondary-200 backdrop-blur-sm bg-white/95 sticky top-0 z-50">
        <nav class="section-container py-4 lg:py-5" x-data="{ open: false }">
            <div class="nav-container flex justify-between items-center">
                <!-- Foundation Logo/Name -->
                <div class="flex-shrink-0 min-w-0">
                    <a href="{{ url('/') }}" class="text-2xl lg:text-3xl font-bold text-primary-700 hover:text-primary-800 transition-all duration-300 block focus-ring rounded-lg px-2 py-1">
                        {{ app()->getLocale() == 'ar' ? 'مؤسسة مفتاح السعد' : 'Miftah Essaad Foundation' }}
                    </a>
                </div>

                <!-- Desktop Navigation & Controls -->
                <div class="flex items-center space-x-8 lg:space-x-12 xl:space-x-16">
                    <!-- Main Navigation Links -->
                    <div class="hidden md:flex items-center space-x-2 lg:space-x-4 xl:space-x-6">
                        <a href="{{ url('/') }}" class="nav-link {{ request()->is('/') ? 'active' : '' }}">
                            {{ __('messages.home') }}
                        </a>
                        <a href="{{ url('/about') }}" class="nav-link {{ request()->is('about') ? 'active' : '' }}">
                            {{ __('messages.about') }}
                        </a>
                        <a href="{{ url('/projects') }}" class="nav-link {{ request()->is('projects') ? 'active' : '' }}">
                            {{ __('messages.projects') }}
                        </a>
                        <a href="{{ url('/contact') }}" class="nav-link {{ request()->is('contact') ? 'active' : '' }}">
                            {{ __('messages.contact') }}
                        </a>
                    </div>

                    <!-- Enhanced Language Toggle Section -->
                    <div class="hidden md:flex items-center">
                        <div class="lang-container" id="langContainer">
                            <a href="{{ route('language', 'ar') }}"
                               class="lang-toggle {{ app()->getLocale() == 'ar' ? 'active' : '' }}"
                               data-lang="ar"
                               title="العربية - Arabic"
                               aria-label="Switch to Arabic">
                                <span class="lang-toggle-icon">🇸🇦</span>
                                العربية
                            </a>
                            <span class="lang-separator">•</span>
                            <a href="{{ route('language', 'en') }}"
                               class="lang-toggle {{ app()->getLocale() == 'en' ? 'active' : '' }}"
                               data-lang="en"
                               title="English"
                               aria-label="Switch to English">
                                <span class="lang-toggle-icon">🇺🇸</span>
                                English
                            </a>
                            <span class="lang-separator">•</span>
                            <a href="{{ route('language', 'fr') }}"
                               class="lang-toggle {{ app()->getLocale() == 'fr' ? 'active' : '' }}"
                               data-lang="fr"
                               title="Français - French"
                               aria-label="Switch to French">
                                <span class="lang-toggle-icon">🇫🇷</span>
                                Français
                            </a>
                        </div>
                    </div>

                    <!-- Mobile Menu Button -->
                    <div class="md:hidden">
                        <button class="p-3 rounded-xl hover:bg-primary-50 transition-all duration-300 focus:outline-none focus:ring-4 focus:ring-primary-200" @click="open = !open">
                            <svg class="w-6 h-6 text-text-secondary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"></path>
                            </svg>
                        </button>
                    </div>
                </div>
            </div>
            <!-- Enhanced Mobile Navigation Menu -->
            <div x-show="open"
                 x-transition:enter="transition ease-out duration-300"
                 x-transition:enter-start="opacity-0 transform -translate-y-2"
                 x-transition:enter-end="opacity-100 transform translate-y-0"
                 x-transition:leave="transition ease-in duration-200"
                 x-transition:leave-start="opacity-100 transform translate-y-0"
                 x-transition:leave-end="opacity-0 transform -translate-y-2"
                 class="md:hidden mt-8 space-y-6 border-t border-secondary-200 pt-8 bg-secondary-50 rounded-2xl p-6 mx-4">

                <!-- Mobile Navigation Links -->
                <div class="space-y-2">
                    <a href="{{ url('/') }}" class="mobile-nav-link {{ request()->is('/') ? 'active' : '' }}">
                        {{ __('messages.home') }}
                    </a>
                    <a href="{{ url('/about') }}" class="mobile-nav-link {{ request()->is('about') ? 'active' : '' }}">
                        {{ __('messages.about') }}
                    </a>
                    <a href="{{ url('/projects') }}" class="mobile-nav-link {{ request()->is('projects') ? 'active' : '' }}">
                        {{ __('messages.projects') }}
                    </a>
                    <a href="{{ url('/contact') }}" class="mobile-nav-link {{ request()->is('contact') ? 'active' : '' }}">
                        {{ __('messages.contact') }}
                    </a>
                </div>

                <!-- Enhanced Mobile Language Toggle -->
                <div class="pt-6 border-t border-secondary-200">
                    <p class="text-sm font-semibold text-gradient-primary mb-4 text-center">
                        {{ __('messages.language') }}
                    </p>
                    <div class="lang-container" id="mobileLangContainer">
                        <a href="{{ route('language', 'ar') }}"
                           class="lang-toggle {{ app()->getLocale() == 'ar' ? 'active' : '' }}"
                           data-lang="ar"
                           title="العربية - Arabic"
                           aria-label="Switch to Arabic">
                            <span class="lang-toggle-icon">🇸🇦</span>
                            العربية
                        </a>
                        <span class="lang-separator">•</span>
                        <a href="{{ route('language', 'en') }}"
                           class="lang-toggle {{ app()->getLocale() == 'en' ? 'active' : '' }}"
                           data-lang="en"
                           title="English"
                           aria-label="Switch to English">
                            <span class="lang-toggle-icon">🇺🇸</span>
                            English
                        </a>
                        <span class="lang-separator">•</span>
                        <a href="{{ route('language', 'fr') }}"
                           class="lang-toggle {{ app()->getLocale() == 'fr' ? 'active' : '' }}"
                           data-lang="fr"
                           title="Français - French"
                           aria-label="Switch to French">
                            <span class="lang-toggle-icon">🇫🇷</span>
                            Français
                        </a>
                    </div>
                </div>
            </div>
        </nav>
    </header>
    <main class="min-h-screen">
        <!-- Language Change Success Notification -->
        @if(session('language_changed'))
        <div id="languageNotification" class="fixed top-4 right-4 bg-gradient-to-r from-accent-500 to-accent-600 text-white px-6 py-3 rounded-2xl shadow-xl z-50 transform translate-x-full transition-transform duration-500 ease-out">
            <div class="flex items-center space-x-2">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                </svg>
                <span class="font-medium">{{ session('language_changed') }}</span>
            </div>
        </div>
        @endif

        @if(session('language_error'))
        <div id="languageErrorNotification" class="fixed top-4 right-4 bg-gradient-to-r from-red-500 to-red-600 text-white px-6 py-3 rounded-2xl shadow-xl z-50 transform translate-x-full transition-transform duration-500 ease-out">
            <div class="flex items-center space-x-2">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                </svg>
                <span class="font-medium">{{ session('language_error') }}</span>
            </div>
        </div>
        @endif

        @yield('content')
    </main>

    <footer class="bg-gradient-to-r from-secondary-800 to-secondary-900 text-white shadow-2xl border-t border-secondary-700">
        <div class="section-container py-12">
            <div class="text-center space-y-4">
                <div class="flex items-center justify-center space-x-3 mb-6">
                    <div class="w-8 h-8 bg-primary-500 rounded-full flex items-center justify-center">
                        <svg class="w-4 h-4 text-white" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold">
                        {{ app()->getLocale() == 'ar' ? 'مؤسسة مفتاح السعد' : 'Miftah Essaad Foundation' }}
                    </h3>
                </div>

                <p class="text-secondary-300 text-lg font-medium">
                    © 2025 {{ app()->getLocale() == 'ar' ? 'مؤسسة مفتاح السعد' : 'Miftah Essaad Foundation' }}
                </p>

                <p class="text-secondary-400 text-sm max-w-2xl mx-auto leading-relaxed">
                    {{ __('messages.footer_tagline') ?? 'Building bridges to happiness and well-being through community empowerment and cultural preservation' }}
                </p>

                <div class="flex flex-wrap items-center justify-center gap-4 sm:gap-6 pt-6 border-t border-secondary-700">
                    <a href="{{ url('/about') }}" class="text-secondary-300 hover:text-primary-400 transition-colors duration-300 text-sm font-medium">
                        {{ __('messages.about') }}
                    </a>
                    <a href="{{ url('/projects') }}" class="text-secondary-300 hover:text-primary-400 transition-colors duration-300 text-sm font-medium">
                        {{ __('messages.projects') }}
                    </a>
                    <a href="{{ url('/contact') }}" class="text-secondary-300 hover:text-primary-400 transition-colors duration-300 text-sm font-medium">
                        {{ __('messages.contact') }}
                    </a>
                    <!-- Admin Access Link -->
                    <div class="flex items-center gap-2">
                        <span class="text-secondary-500 text-xs hidden sm:inline">•</span>
                        <a href="{{ route('admin.login') }}" class="admin-access-link text-secondary-400 hover:text-accent-400 transition-all duration-300 text-xs font-medium opacity-75 hover:opacity-100" title="Administrator Login">
                            <svg class="w-3 h-3 inline-block mr-1" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-6-3a2 2 0 11-4 0 2 2 0 014 0zm-2 4a5 5 0 00-4.546 2.916A5.986 5.986 0 0010 16a5.986 5.986 0 004.546-2.084A5 5 0 0010 11z" clip-rule="evenodd"></path>
                            </svg>
                            Admin
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <!-- Enhanced Language Switching JavaScript -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Enhanced Language Switching with Loading States
            const langToggles = document.querySelectorAll('.lang-toggle');

            langToggles.forEach(toggle => {
                toggle.addEventListener('click', function(e) {
                    // Ensure navigation happens - don't prevent default

                    // Add loading state to clicked toggle
                    this.classList.add('loading');

                    // Add loading state to all toggles to prevent multiple clicks
                    langToggles.forEach(t => {
                        if (t !== this) {
                            t.style.opacity = '0.5';
                            t.style.pointerEvents = 'none';
                        }
                    });

                    // Add smooth transition effect to page
                    document.body.style.transition = 'opacity 0.3s ease';

                    // Add a slight delay for visual feedback but don't block navigation
                    setTimeout(() => {
                        document.body.style.opacity = '0.95';
                    }, 50);

                    // Allow the link to navigate normally
                    return true;
                });
            });

            // Language Toggle Hover Effects Enhancement
            const langContainers = document.querySelectorAll('.lang-container');

            langContainers.forEach(container => {
                container.addEventListener('mouseenter', function() {
                    this.style.transform = 'translateY(-2px)';
                });

                container.addEventListener('mouseleave', function() {
                    this.style.transform = 'translateY(0)';
                });
            });

            // Keyboard Navigation Enhancement
            langToggles.forEach(toggle => {
                toggle.addEventListener('keydown', function(e) {
                    if (e.key === 'Enter' || e.key === ' ') {
                        e.preventDefault();
                        this.click();
                    }

                    // Arrow key navigation
                    if (e.key === 'ArrowLeft' || e.key === 'ArrowRight') {
                        e.preventDefault();
                        const toggles = Array.from(langToggles);
                        const currentIndex = toggles.indexOf(this);
                        let nextIndex;

                        if (e.key === 'ArrowLeft') {
                            nextIndex = currentIndex > 0 ? currentIndex - 1 : toggles.length - 1;
                        } else {
                            nextIndex = currentIndex < toggles.length - 1 ? currentIndex + 1 : 0;
                        }

                        toggles[nextIndex].focus();
                    }
                });
            });

            // Page Load Animation for Language Toggles
            setTimeout(() => {
                langContainers.forEach((container, index) => {
                    container.style.opacity = '0';
                    container.style.transform = 'translateY(10px)';

                    setTimeout(() => {
                        container.style.transition = 'all 0.5s ease';
                        container.style.opacity = '1';
                        container.style.transform = 'translateY(0)';
                    }, index * 100);
                });
            }, 500);

            // Enhanced Mobile Menu Language Toggle
            const mobileMenuButton = document.querySelector('[\\@click="open = !open"]');
            if (mobileMenuButton) {
                mobileMenuButton.addEventListener('click', function() {
                    setTimeout(() => {
                        const mobileLangContainer = document.getElementById('mobileLangContainer');
                        if (mobileLangContainer) {
                            mobileLangContainer.style.animation = 'fadeInUp 0.5s ease forwards';
                        }
                    }, 200);
                });
            }
        });

        // Language Switch Success Animation
        window.addEventListener('pageshow', function(e) {
            if (e.persisted) {
                // Page was loaded from cache (back/forward navigation)
                document.body.style.opacity = '1';

                // Reset any loading states
                document.querySelectorAll('.lang-toggle.loading').forEach(toggle => {
                    toggle.classList.remove('loading');
                });

                document.querySelectorAll('.lang-toggle').forEach(toggle => {
                    toggle.style.opacity = '';
                    toggle.style.pointerEvents = '';
                });
            }
        });

        // Show Language Change Notifications
        const languageNotification = document.getElementById('languageNotification');
        const languageErrorNotification = document.getElementById('languageErrorNotification');

        if (languageNotification) {
            setTimeout(() => {
                languageNotification.style.transform = 'translateX(0)';
            }, 100);

            setTimeout(() => {
                languageNotification.style.transform = 'translateX(100%)';
            }, 3000);
        }

        if (languageErrorNotification) {
            setTimeout(() => {
                languageErrorNotification.style.transform = 'translateX(0)';
            }, 100);

            setTimeout(() => {
                languageErrorNotification.style.transform = 'translateX(100%)';
            }, 4000);
        }
    </script>
</body>
</html>