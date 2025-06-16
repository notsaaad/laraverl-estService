<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class DashboardMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
   // لو المستخدم غير مسجل دخول
    if (!auth()->check()) {
        return redirect()->route('login');
    }

    $user = auth()->user();

    // تحديد المسار المتوقع للداشبورد حسب نوع المستخدم
    $dashboardRoutes = [
        'admin' => 'account',
        'tech' => 'tech/account',
        'customer' => 'account',
    ];

    $role = $user->role;
    $expectedDashboard = $dashboardRoutes[$role] ?? null;

    // لو مفيش داشبورد معرف للنوع ده، امنعه
    if (!$expectedDashboard) {
        abort(403, 'Unauthorized role.');
    }

    // لو هو بالفعل على الداشبورد الخاصة بيه، سيبه يكمل
    if ($request->is($expectedDashboard) || $request->is($expectedDashboard . '/*')) {
        return $next($request);
    }

    // لو مش على الداشبورد بتاعته، redirect لها
    return redirect($expectedDashboard);
    }
}
