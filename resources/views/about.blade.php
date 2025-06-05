@extends('layouts.app')
@section('title', 'من نحن')
@section('content')
    <section class="py-16 bg-secondary mt-16 mb-16">
        <div class="container mx-auto px-6">
            <h1 class="text-5xl font-bold text-600 mb-6 text-center">من نحن</h1>
            <p class="text-xl text-text-light-gray mb-6 text-center">تعرف على رحلتنا ورسالتنا</p>
            <!-- History -->
            <div class="card mb-6">
                <h2 class="text-3xl font-bold text-600 mb-4">تاريخنا</h2>
                <p class="text-lg text-text-light-gray">تأسست مؤسسة مفتاح السعادة للحفاظ على التراث الثقافي غير المادي للمغرب، وتعزيز الفنون التقليدية والمشاركة المجتمعية.</p>
            </div>
            <!-- Values -->
            <div class="card">
                <h2 class="text-3xl font-bold text-600 mb-4">قيمنا</h2>
                <ul class="list-disc list-inside text-lg text-text-light-gray">
                    <li>التعاطف</li>
                    <li>الشمولية</li>
                    <li>التأثير</li>
                </ul>
            </div>
        </div>
    </section>
@endsection