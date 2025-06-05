@extends('layouts.app')
@section('title', 'المشاريع')
@section('content')
    <!-- Projects Hero Section -->
    <section class="py-20 bg-gradient-to-br from-primary-50 via-white to-secondary-50">
        <div class="container mx-auto px-4 lg:px-6 xl:px-8">
            <div class="text-center max-w-4xl mx-auto">
                <h1 class="text-4xl md:text-5xl font-bold text-primary-700 mb-6">
                    {{ app()->getLocale() == 'ar' ? 'مشاريعنا' : 'Our Projects' }}
                </h1>
                <p class="text-xl text-text-secondary leading-relaxed mb-12">
                    {{ app()->getLocale() == 'ar' ? 'نعمل على مشاريع متنوعة لخدمة المجتمع وتحقيق رسالتنا في نشر السعادة والرفاهية' : 'We work on diverse projects to serve the community and achieve our mission of spreading happiness and well-being' }}
                </p>
            </div>
        </div>
    </section>

    <!-- Projects Grid Section -->
    <section class="py-20 bg-secondary">
        <div class="container mx-auto px-4 lg:px-6 xl:px-8">
            <!-- Projects Grid with Enhanced Spacing -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 lg:gap-10 xl:gap-12">
                <!-- Project Card 1 -->
                <div class="card-feature group">
                    <div class="mb-6">
                        <div class="w-16 h-16 bg-primary-100 rounded-full flex items-center justify-center mb-4 group-hover:bg-primary-200 transition-colors duration-300">
                            <svg class="w-8 h-8 text-primary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19V6l12-3v13M9 19c0 1.105-1.343 2-3 2s-3-.895-3-2 1.343-2 3-2 3 .895 3 2zm12-3c0 1.105-1.343 2-3 2s-3-.895-3-2 1.343-2 3-2 3 .895 3 2zM9 10l12-3"></path>
                            </svg>
                        </div>
                        <h2 class="text-2xl font-bold text-primary-700 mb-4">
                            {{ app()->getLocale() == 'ar' ? 'الحفاظ على الموسيقى المغربية' : 'Preserving Moroccan Music' }}
                        </h2>
                        <p class="text-text-secondary leading-relaxed">
                            {{ app()->getLocale() == 'ar' ? 'توثيق وتعليم الموسيقى المغربية التقليدية للشباب والحفاظ على التراث الثقافي الغني لبلادنا.' : 'Documenting and teaching traditional Moroccan music to youth while preserving our rich cultural heritage.' }}
                        </p>
                    </div>
                    <div class="mt-6 pt-6 border-t border-secondary-200">
                        <span class="inline-flex items-center text-sm font-medium text-accent-600">
                            {{ app()->getLocale() == 'ar' ? 'مشروع نشط' : 'Active Project' }}
                            <svg class="ml-2 w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"></path>
                            </svg>
                        </span>
                    </div>
                </div>

                <!-- Project Card 2 -->
                <div class="card-feature group">
                    <div class="mb-6">
                        <div class="w-16 h-16 bg-accent-100 rounded-full flex items-center justify-center mb-4 group-hover:bg-accent-200 transition-colors duration-300">
                            <svg class="w-8 h-8 text-accent-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z"></path>
                            </svg>
                        </div>
                        <h2 class="text-2xl font-bold text-primary-700 mb-4">
                            {{ app()->getLocale() == 'ar' ? 'تعزيز الحرف التقليدية' : 'Promoting Traditional Crafts' }}
                        </h2>
                        <p class="text-text-secondary leading-relaxed">
                            {{ app()->getLocale() == 'ar' ? 'دعم الحرفيين المحليين للحفاظ على الحرف المغربية التقليدية وتطوير مهاراتهم وتسويق منتجاتهم.' : 'Supporting local artisans to preserve traditional Moroccan crafts while developing their skills and marketing their products.' }}
                        </p>
                    </div>
                    <div class="mt-6 pt-6 border-t border-secondary-200">
                        <span class="inline-flex items-center text-sm font-medium text-success-600">
                            {{ app()->getLocale() == 'ar' ? 'مشروع مكتمل' : 'Completed Project' }}
                            <svg class="ml-2 w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                            </svg>
                        </span>
                    </div>
                </div>

                <!-- Project Card 3 -->
                <div class="card-feature group">
                    <div class="mb-6">
                        <div class="w-16 h-16 bg-success-100 rounded-full flex items-center justify-center mb-4 group-hover:bg-success-200 transition-colors duration-300">
                            <svg class="w-8 h-8 text-success-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                            </svg>
                        </div>
                        <h2 class="text-2xl font-bold text-primary-700 mb-4">
                            {{ app()->getLocale() == 'ar' ? 'برامج التعليم المجتمعي' : 'Community Education Programs' }}
                        </h2>
                        <p class="text-text-secondary leading-relaxed">
                            {{ app()->getLocale() == 'ar' ? 'تنظيم برامج تعليمية مجانية للأطفال والشباب في المناطق المحرومة لتعزيز فرص التعلم والنمو.' : 'Organizing free educational programs for children and youth in underserved areas to enhance learning and growth opportunities.' }}
                        </p>
                    </div>
                    <div class="mt-6 pt-6 border-t border-secondary-200">
                        <span class="inline-flex items-center text-sm font-medium text-primary-600">
                            {{ app()->getLocale() == 'ar' ? 'مشروع قادم' : 'Upcoming Project' }}
                            <svg class="ml-2 w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </span>
                    </div>
                </div>
            </div>

            <!-- Call to Action Section -->
            <div class="mt-16 text-center">
                <div class="card-feature max-w-3xl mx-auto">
                    <h3 class="text-3xl font-bold text-primary-700 mb-6">
                        {{ app()->getLocale() == 'ar' ? 'انضم إلى مشاريعنا' : 'Join Our Projects' }}
                    </h3>
                    <p class="text-lg text-text-secondary mb-8 leading-relaxed">
                        {{ app()->getLocale() == 'ar' ? 'نرحب بالمتطوعين والشركاء الذين يشاركوننا رؤيتنا في خدمة المجتمع وتحقيق التنمية المستدامة' : 'We welcome volunteers and partners who share our vision of serving the community and achieving sustainable development' }}
                    </p>
                    <div class="flex flex-col sm:flex-row gap-4 justify-center">
                        <a href="{{ url('/contact') }}" class="btn">
                            {{ app()->getLocale() == 'ar' ? 'تواصل معنا' : 'Contact Us' }}
                        </a>
                        <a href="{{ url('/about') }}" class="btn-secondary">
                            {{ app()->getLocale() == 'ar' ? 'تعرف علينا أكثر' : 'Learn More About Us' }}
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection