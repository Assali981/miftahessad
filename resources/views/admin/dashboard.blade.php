@extends('admin.layouts.app')

@section('title', 'Dashboard')
@section('page-title', 'Dashboard')
@section('page-description', 'Welcome back! Here\'s what\'s happening with your foundation.')

@section('content')
<div class="space-y-6">
    <!-- Welcome Section -->
    <div class="admin-card">
        <div class="flex items-center justify-between">
            <div>
                <h2 class="text-2xl font-bold text-gray-900 mb-2">
                    Welcome back, {{ $admin->name }}!
                </h2>
                <p class="text-gray-600">
                    Last login: {{ $admin->last_login_at ? $admin->last_login_at->format('M j, Y \a\t g:i A') : 'First time login' }}
                </p>
            </div>
            <div class="text-right">
                <p class="text-sm text-gray-500">Role</p>
                <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium 
                    {{ $admin->role === 'super_admin' ? 'bg-purple-100 text-purple-800' : 
                       ($admin->role === 'admin' ? 'bg-blue-100 text-blue-800' : 'bg-green-100 text-green-800') }}">
                    {{ ucfirst(str_replace('_', ' ', $admin->role)) }}
                </span>
            </div>
        </div>
    </div>

    <!-- Statistics Cards -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        <!-- Projects Stats -->
        <div class="admin-card">
            <div class="flex items-center">
                <div class="p-3 bg-primary-100 rounded-lg">
                    <svg class="w-8 h-8 text-primary-600" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M7 3a1 1 0 000 2h6a1 1 0 100-2H7zM4 7a1 1 0 011-1h10a1 1 0 110 2H5a1 1 0 01-1-1zM2 11a2 2 0 012-2h12a2 2 0 012 2v4a2 2 0 01-2 2H4a2 2 0 01-2-2v-4z"></path>
                    </svg>
                </div>
                <div class="ml-4">
                    <p class="text-sm font-medium text-gray-600">Total Projects</p>
                    <p class="text-2xl font-bold text-gray-900">{{ $stats['projects'] }}</p>
                    <p class="text-sm text-green-600">{{ $stats['published_projects'] }} published</p>
                </div>
            </div>
        </div>

        <!-- News Articles Stats -->
        <div class="admin-card">
            <div class="flex items-center">
                <div class="p-3 bg-accent-100 rounded-lg">
                    <svg class="w-8 h-8 text-accent-600" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M2 5a2 2 0 012-2h8a2 2 0 012 2v10a2 2 0 002 2H4a2 2 0 01-2-2V5zm3 1h6v4H5V6zm6 6H5v2h6v-2z" clip-rule="evenodd"></path>
                    </svg>
                </div>
                <div class="ml-4">
                    <p class="text-sm font-medium text-gray-600">News Articles</p>
                    <p class="text-2xl font-bold text-gray-900">{{ $stats['news_articles'] }}</p>
                    <p class="text-sm text-green-600">{{ $stats['published_articles'] }} published</p>
                </div>
            </div>
        </div>

        <!-- Media Files Stats -->
        <div class="admin-card">
            <div class="flex items-center">
                <div class="p-3 bg-green-100 rounded-lg">
                    <svg class="w-8 h-8 text-green-600" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M4 3a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V5a2 2 0 00-2-2H4zm12 12H4l4-8 3 6 2-4 3 6z" clip-rule="evenodd"></path>
                    </svg>
                </div>
                <div class="ml-4">
                    <p class="text-sm font-medium text-gray-600">Media Files</p>
                    <p class="text-2xl font-bold text-gray-900">{{ $stats['media_files'] }}</p>
                    <p class="text-sm text-blue-600">{{ $stats['total_admins'] }} admins</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Recent Activity -->
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
        <!-- Recent Projects -->
        <div class="admin-card">
            <div class="flex items-center justify-between mb-4">
                <h3 class="text-lg font-semibold text-gray-900">Recent Projects</h3>
                <a href="{{ route('admin.projects.index') }}" class="text-primary-600 hover:text-primary-700 text-sm font-medium">
                    View all →
                </a>
            </div>
            
            @if($recent_projects->count() > 0)
                <div class="space-y-3">
                    @foreach($recent_projects as $project)
                        <div class="flex items-center justify-between p-3 bg-gray-50 rounded-lg">
                            <div class="flex-1 min-w-0">
                                <p class="text-sm font-medium text-gray-900 truncate">
                                    {{ $project->title_en }}
                                </p>
                                <p class="text-xs text-gray-500">
                                    by {{ $project->creator->name }} • {{ $project->created_at->diffForHumans() }}
                                </p>
                            </div>
                            <span class="inline-flex items-center px-2 py-1 rounded-full text-xs font-medium
                                {{ $project->status === 'published' ? 'bg-green-100 text-green-800' : 
                                   ($project->status === 'draft' ? 'bg-yellow-100 text-yellow-800' : 'bg-gray-100 text-gray-800') }}">
                                {{ ucfirst($project->status) }}
                            </span>
                        </div>
                    @endforeach
                </div>
            @else
                <div class="text-center py-8">
                    <svg class="w-12 h-12 text-gray-400 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                    </svg>
                    <p class="text-gray-500 text-sm">No projects yet</p>
                    <a href="{{ route('admin.projects.create') }}" class="text-primary-600 hover:text-primary-700 text-sm font-medium mt-2 inline-block">
                        Create your first project →
                    </a>
                </div>
            @endif
        </div>

        <!-- Recent Articles -->
        <div class="admin-card">
            <div class="flex items-center justify-between mb-4">
                <h3 class="text-lg font-semibold text-gray-900">Recent Articles</h3>
                <a href="{{ route('admin.news.index') }}" class="text-primary-600 hover:text-primary-700 text-sm font-medium">
                    View all →
                </a>
            </div>
            
            @if($recent_articles->count() > 0)
                <div class="space-y-3">
                    @foreach($recent_articles as $article)
                        <div class="flex items-center justify-between p-3 bg-gray-50 rounded-lg">
                            <div class="flex-1 min-w-0">
                                <p class="text-sm font-medium text-gray-900 truncate">
                                    {{ $article->title_en }}
                                </p>
                                <p class="text-xs text-gray-500">
                                    by {{ $article->creator->name }} • {{ $article->created_at->diffForHumans() }}
                                </p>
                            </div>
                            <span class="inline-flex items-center px-2 py-1 rounded-full text-xs font-medium
                                {{ $article->status === 'published' ? 'bg-green-100 text-green-800' : 
                                   ($article->status === 'draft' ? 'bg-yellow-100 text-yellow-800' : 'bg-gray-100 text-gray-800') }}">
                                {{ ucfirst($article->status) }}
                            </span>
                        </div>
                    @endforeach
                </div>
            @else
                <div class="text-center py-8">
                    <svg class="w-12 h-12 text-gray-400 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 011 1v1m0 0l4 4v10a2 2 0 01-2 2z"></path>
                    </svg>
                    <p class="text-gray-500 text-sm">No articles yet</p>
                    <a href="{{ route('admin.news.index') }}" class="text-primary-600 hover:text-primary-700 text-sm font-medium mt-2 inline-block">
                        Create your first article →
                    </a>
                </div>
            @endif
        </div>
    </div>

    <!-- Quick Actions -->
    <div class="admin-card">
        <h3 class="text-lg font-semibold text-gray-900 mb-4">Quick Actions</h3>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
            <a href="{{ route('admin.projects.create') }}" class="flex items-center p-4 bg-primary-50 hover:bg-primary-100 rounded-lg transition-colors group">
                <div class="p-2 bg-primary-500 rounded-lg group-hover:bg-primary-600 transition-colors">
                    <svg class="w-5 h-5 text-white" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" clip-rule="evenodd"></path>
                    </svg>
                </div>
                <div class="ml-3">
                    <p class="text-sm font-medium text-gray-900">New Project</p>
                    <p class="text-xs text-gray-500">Create a foundation project</p>
                </div>
            </a>

            <a href="{{ route('admin.news.index') }}" class="flex items-center p-4 bg-accent-50 hover:bg-accent-100 rounded-lg transition-colors group">
                <div class="p-2 bg-accent-500 rounded-lg group-hover:bg-accent-600 transition-colors">
                    <svg class="w-5 h-5 text-white" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M2 5a2 2 0 012-2h8a2 2 0 012 2v10a2 2 0 002 2H4a2 2 0 01-2-2V5zm3 1h6v4H5V6zm6 6H5v2h6v-2z" clip-rule="evenodd"></path>
                    </svg>
                </div>
                <div class="ml-3">
                    <p class="text-sm font-medium text-gray-900">New Article</p>
                    <p class="text-xs text-gray-500">Write news or updates</p>
                </div>
            </a>

            <a href="{{ route('admin.media.index') }}" class="flex items-center p-4 bg-green-50 hover:bg-green-100 rounded-lg transition-colors group">
                <div class="p-2 bg-green-500 rounded-lg group-hover:bg-green-600 transition-colors">
                    <svg class="w-5 h-5 text-white" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M4 3a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V5a2 2 0 00-2-2H4zm12 12H4l4-8 3 6 2-4 3 6z" clip-rule="evenodd"></path>
                    </svg>
                </div>
                <div class="ml-3">
                    <p class="text-sm font-medium text-gray-900">Upload Media</p>
                    <p class="text-xs text-gray-500">Manage images and files</p>
                </div>
            </a>

            <a href="{{ route('admin.settings.index') }}" class="flex items-center p-4 bg-purple-50 hover:bg-purple-100 rounded-lg transition-colors group">
                <div class="p-2 bg-purple-500 rounded-lg group-hover:bg-purple-600 transition-colors">
                    <svg class="w-5 h-5 text-white" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M11.49 3.17c-.38-1.56-2.6-1.56-2.98 0a1.532 1.532 0 01-2.286.948c-1.372-.836-2.942.734-2.106 2.106.54.886.061 2.042-.947 2.287-1.561.379-1.561 2.6 0 2.978a1.532 1.532 0 01.947 2.287c-.836 1.372.734 2.942 2.106 2.106a1.532 1.532 0 012.287.947c.379 1.561 2.6 1.561 2.978 0a1.533 1.533 0 012.287-.947c1.372.836 2.942-.734 2.106-2.106a1.533 1.533 0 01.947-2.287c1.561-.379 1.561-2.6 0-2.978a1.532 1.532 0 01-.947-2.287c.836-1.372-.734-2.942-2.106-2.106a1.532 1.532 0 01-2.287-.947zM10 13a3 3 0 100-6 3 3 0 000 6z" clip-rule="evenodd"></path>
                    </svg>
                </div>
                <div class="ml-3">
                    <p class="text-sm font-medium text-gray-900">Settings</p>
                    <p class="text-xs text-gray-500">Configure website</p>
                </div>
            </a>
        </div>
    </div>
</div>
@endsection
