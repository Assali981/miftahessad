@extends('layouts.app')
@section('title', __('messages.contact'))
@section('content')
    <!-- Contact Hero Section -->
    <section class="py-20 bg-gradient-to-br from-primary-50 via-white to-secondary-50">
        <div class="container mx-auto px-4 lg:px-6 xl:px-8">
            <div class="text-center max-w-4xl mx-auto">
                <h1 class="text-4xl md:text-5xl font-bold text-primary-700 mb-6">
                    {{ __('messages.contact_title') }}
                </h1>
                <p class="text-xl text-text-secondary leading-relaxed mb-12">
                    {{ __('messages.contact_text') }}
                </p>
            </div>
        </div>
    </section>

    <!-- Contact Form Section -->
    <section class="py-20 bg-secondary">
        <div class="container mx-auto px-4 lg:px-6 xl:px-8">
            <div class="max-w-4xl mx-auto">
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-12">
                    <!-- Contact Form -->
                    <div class="card-feature">
                        <h2 class="text-2xl font-bold text-primary-700 mb-6">
                            {{ app()->getLocale() == 'ar' ? 'أرسل لنا رسالة' : (app()->getLocale() == 'fr' ? 'Envoyez-nous un message' : 'Send us a message') }}
                        </h2>
                        
                        <form action="#" method="POST" class="space-y-6">
                            @csrf
                            <div>
                                <label for="name" class="block text-sm font-medium text-text-primary mb-2">
                                    {{ __('messages.contact_name') }}
                                </label>
                                <input type="text" id="name" name="name" required
                                       class="w-full px-4 py-3 border border-secondary-300 rounded-xl focus:ring-2 focus:ring-primary-500 focus:border-primary-500 transition-colors">
                            </div>
                            
                            <div>
                                <label for="email" class="block text-sm font-medium text-text-primary mb-2">
                                    {{ __('messages.contact_email') }}
                                </label>
                                <input type="email" id="email" name="email" required
                                       class="w-full px-4 py-3 border border-secondary-300 rounded-xl focus:ring-2 focus:ring-primary-500 focus:border-primary-500 transition-colors">
                            </div>
                            
                            <div>
                                <label for="message" class="block text-sm font-medium text-text-primary mb-2">
                                    {{ __('messages.contact_message') }}
                                </label>
                                <textarea id="message" name="message" rows="6" required
                                          class="w-full px-4 py-3 border border-secondary-300 rounded-xl focus:ring-2 focus:ring-primary-500 focus:border-primary-500 transition-colors resize-none"></textarea>
                            </div>
                            
                            <button type="submit" class="btn w-full">
                                {{ __('messages.contact_submit') }}
                            </button>
                        </form>
                    </div>
                    
                    <!-- Contact Information -->
                    <div class="space-y-8">
                        <div class="card">
                            <h3 class="text-xl font-bold text-primary-700 mb-4">
                                {{ app()->getLocale() == 'ar' ? 'معلومات الاتصال' : (app()->getLocale() == 'fr' ? 'Informations de contact' : 'Contact Information') }}
                            </h3>
                            <div class="space-y-4">
                                <div class="flex items-center space-x-3">
                                    <div class="w-10 h-10 bg-primary-100 rounded-full flex items-center justify-center">
                                        <svg class="w-5 h-5 text-primary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 4.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                                        </svg>
                                    </div>
                                    <div>
                                        <p class="font-medium text-text-primary">Email</p>
                                        <p class="text-text-secondary">contact@miftahessaad.org</p>
                                    </div>
                                </div>
                                
                                <div class="flex items-center space-x-3">
                                    <div class="w-10 h-10 bg-accent-100 rounded-full flex items-center justify-center">
                                        <svg class="w-5 h-5 text-accent-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                                        </svg>
                                    </div>
                                    <div>
                                        <p class="font-medium text-text-primary">
                                            {{ app()->getLocale() == 'ar' ? 'الهاتف' : (app()->getLocale() == 'fr' ? 'Téléphone' : 'Phone') }}
                                        </p>
                                        <p class="text-text-secondary">+212 XXX XXX XXX</p>
                                    </div>
                                </div>
                                
                                <div class="flex items-center space-x-3">
                                    <div class="w-10 h-10 bg-success-100 rounded-full flex items-center justify-center">
                                        <svg class="w-5 h-5 text-success-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                        </svg>
                                    </div>
                                    <div>
                                        <p class="font-medium text-text-primary">
                                            {{ app()->getLocale() == 'ar' ? 'العنوان' : (app()->getLocale() == 'fr' ? 'Adresse' : 'Address') }}
                                        </p>
                                        <p class="text-text-secondary">
                                            {{ app()->getLocale() == 'ar' ? 'المغرب، الرباط' : (app()->getLocale() == 'fr' ? 'Rabat, Maroc' : 'Rabat, Morocco') }}
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="card">
                            <h3 class="text-xl font-bold text-primary-700 mb-4">
                                {{ app()->getLocale() == 'ar' ? 'ساعات العمل' : (app()->getLocale() == 'fr' ? 'Heures d\'ouverture' : 'Office Hours') }}
                            </h3>
                            <div class="space-y-2">
                                <div class="flex justify-between">
                                    <span class="text-text-primary">
                                        {{ app()->getLocale() == 'ar' ? 'الاثنين - الجمعة' : (app()->getLocale() == 'fr' ? 'Lundi - Vendredi' : 'Monday - Friday') }}
                                    </span>
                                    <span class="text-text-secondary">9:00 - 17:00</span>
                                </div>
                                <div class="flex justify-between">
                                    <span class="text-text-primary">
                                        {{ app()->getLocale() == 'ar' ? 'السبت' : (app()->getLocale() == 'fr' ? 'Samedi' : 'Saturday') }}
                                    </span>
                                    <span class="text-text-secondary">9:00 - 13:00</span>
                                </div>
                                <div class="flex justify-between">
                                    <span class="text-text-primary">
                                        {{ app()->getLocale() == 'ar' ? 'الأحد' : (app()->getLocale() == 'fr' ? 'Dimanche' : 'Sunday') }}
                                    </span>
                                    <span class="text-text-secondary">
                                        {{ app()->getLocale() == 'ar' ? 'مغلق' : (app()->getLocale() == 'fr' ? 'Fermé' : 'Closed') }}
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
