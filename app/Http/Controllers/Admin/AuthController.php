<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    /**
     * Show admin login form
     * Purpose: Display the login page with our brand design
     */
    public function showLogin()
    {
        return view('admin.auth.login');
    }

    /**
     * Handle admin login
     * Purpose: Authenticate admin users with security tracking
     */
    public function login(Request $request)
    {
        try {
            $request->validate([
                'email' => 'required|email',
                'password' => 'required|min:6',
            ]);

            // Find admin by email
            $admin = Admin::where('email', $request->email)->first();

            // Check if admin exists and password is correct
            if (!$admin || !Hash::check($request->password, $admin->password)) {
                return back()->withErrors([
                    'email' => 'The provided credentials are incorrect.',
                ])->withInput($request->only('email'));
            }

            // Check if admin is active
            if (!$admin->is_active) {
                return back()->withErrors([
                    'email' => 'Your account has been deactivated. Please contact the administrator.',
                ])->withInput($request->only('email'));
            }

            // Log the admin in
            Auth::guard('admin')->login($admin, $request->boolean('remember'));

            // Update last login information for security tracking
            $admin->update([
                'last_login_at' => now(),
                'last_login_ip' => $request->ip(),
            ]);

            // Regenerate session for security
            $request->session()->regenerate();

            return redirect()->intended(route('admin.dashboard'))
                            ->with('success', 'Welcome back, ' . $admin->name . '!');

        } catch (\Exception $e) {
            \Log::error('Admin login error: ' . $e->getMessage());
            return back()->withErrors([
                'email' => 'An error occurred during login. Please try again.',
            ])->withInput($request->only('email'));
        }
    }

    /**
     * Handle admin logout
     * Purpose: Securely log out admin users
     */
    public function logout(Request $request)
    {
        Auth::guard('admin')->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('admin.login')
                        ->with('success', 'You have been logged out successfully.');
    }

    /**
     * Show admin dashboard
     * Purpose: Display main dashboard with statistics and quick actions
     */
    public function dashboard()
    {
        $admin = Auth::guard('admin')->user();

        // Get dashboard statistics
        $stats = [
            'projects' => \App\Models\Project::count(),
            'published_projects' => \App\Models\Project::where('status', 'published')->count(),
            'news_articles' => \App\Models\NewsArticle::count(),
            'published_articles' => \App\Models\NewsArticle::where('status', 'published')->count(),
            'media_files' => \App\Models\MediaFile::count(),
            'total_admins' => Admin::where('is_active', true)->count(),
        ];

        // Get recent activities
        $recent_projects = \App\Models\Project::with('creator')
                                            ->latest()
                                            ->take(5)
                                            ->get();

        $recent_articles = \App\Models\NewsArticle::with('creator')
                                                 ->latest()
                                                 ->take(5)
                                                 ->get();

        return view('admin.dashboard', compact('admin', 'stats', 'recent_projects', 'recent_articles'));
    }
}
