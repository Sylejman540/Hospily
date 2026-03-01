<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Dashboard' }} | Hospily</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        clinical: {
                            50: '#F8FAFC',
                            100: '#F1F5F9',
                            200: '#E2E8F0',
                            300: '#CBD5E1',
                            400: '#94A3B8',
                            500: '#64748B',
                            600: '#3B82F6', // Medical Blue
                            700: '#2563EB',
                            800: '#1E40AF',
                            900: '#1E293B',
                        }
                    },
                    borderRadius: {
                        'clinical': '0.75rem',
                    }
                }
            }
        }
    </script>
</head>
<body class="font-sans antialiased text-clinical-900 bg-clinical-50">
    <div class="flex h-screen overflow-hidden">
        <!-- Sidebar -->
        <aside class="w-72 bg-clinical-900 text-white flex flex-col shrink-0">
            <div class="h-20 flex items-center px-8 border-b border-clinical-800">
                <div class="flex items-center gap-3">
                    <div class="w-8 h-8 bg-clinical-600 rounded-md flex items-center justify-center">
                        <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" /></svg>
                    </div>
                    <span class="text-xl font-bold tracking-tight">Hospily</span>
                </div>
            </div>

            <nav class="flex-1 overflow-y-auto p-6 space-y-1.5">
                <p class="text-[10px] font-bold text-clinical-500 uppercase tracking-widest px-4 mb-4">Core Management</p>
                <a href="/dashboard" class="flex items-center gap-3 px-4 py-3 rounded-clinical text-sm font-medium transition-all {{ request()->is('dashboard') ? 'bg-clinical-600 text-white shadow-lg shadow-clinical-900/50' : 'text-clinical-400 hover:text-white hover:bg-clinical-800' }}">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/></svg>
                    Overview
                </a>
                <a href="/patients" class="flex items-center gap-3 px-4 py-3 rounded-clinical text-sm font-medium transition-all {{ request()->is('patients') ? 'bg-clinical-600 text-white shadow-lg shadow-clinical-900/50' : 'text-clinical-400 hover:text-white hover:bg-clinical-800' }}">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/></svg>
                    Patients
                </a>
                <a href="/appointments" class="flex items-center gap-3 px-4 py-3 rounded-clinical text-sm font-medium transition-all {{ request()->is('appointments') ? 'bg-clinical-600 text-white shadow-lg shadow-clinical-900/50' : 'text-clinical-400 hover:text-white hover:bg-clinical-800' }}">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                    Appointments
                </a>
                
                <div class="pt-8">
                    <p class="text-[10px] font-bold text-clinical-500 uppercase tracking-widest px-4 mb-4">Operations</p>
                    <a href="#" class="flex items-center gap-3 px-4 py-3 rounded-clinical text-sm font-medium text-clinical-400 hover:text-white hover:bg-clinical-800 transition-all">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>
                        Medical Billing
                    </a>
                    <a href="#" class="flex items-center gap-3 px-4 py-3 rounded-clinical text-sm font-medium text-clinical-400 hover:text-white hover:bg-clinical-800 transition-all">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.183.394l-1.154.908a2 2 0 00-.747 2.357l.584 1.46a2 2 0 001.996 1.228h13.102a2 2 0 001.996-1.228l.584-1.46a2 2 0 00-.747-2.357l-1.154-.908z"/></svg>
                        Pharmacy
                    </a>
                </div>
            </nav>

            <div class="p-6 border-t border-clinical-800">
                <div class="flex items-center gap-4 p-3 bg-clinical-800/50 rounded-clinical border border-clinical-700/50">
                    <div class="w-10 h-10 rounded-lg bg-clinical-600 flex items-center justify-center font-bold text-white shadow-inner">
                        {{ strtoupper(substr(auth()->user()->name ?? 'DR', 0, 2)) }}
                    </div>
                    <div class="flex-1 min-w-0">
                        <p class="text-sm font-bold text-white truncate">{{ auth()->user()->name ?? 'Dr. Staff' }}</p>
                        <p class="text-[10px] text-clinical-400 font-bold uppercase tracking-tight">System Admin</p>
                    </div>
                </div>
                <form action="/logout" method="POST" class="mt-4">
                    @csrf
                    @method('DELETE')
                    <button class="w-full flex items-center justify-center gap-2 px-4 py-2.5 rounded-clinical text-xs font-bold text-clinical-400 hover:text-red-400 hover:bg-red-400/10 transition-all border border-transparent hover:border-red-400/20">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/></svg>
                        End Session
                    </button>
                </form>
            </div>
        </aside>

        <!-- Main Content -->
        <div class="flex-1 flex flex-col min-w-0 overflow-hidden">
            <!-- Top Header -->
            <header class="h-20 bg-white border-b border-clinical-100 px-8 flex items-center justify-between shrink-0">
                <div class="flex items-center gap-4">
                    <h2 class="text-lg font-bold text-clinical-900">{{ $title ?? 'Dashboard' }}</h2>
                    <div class="h-4 w-px bg-clinical-200"></div>
                    <p class="text-sm text-clinical-500 font-medium">{{ now()->format('l, j F Y') }}</p>
                </div>
                
                <div class="flex items-center gap-6">
                    <div class="hidden md:flex items-center gap-2 px-4 py-2 bg-clinical-50 rounded-full border border-clinical-100">
                        <div class="w-2 h-2 rounded-full bg-emerald-500 animate-pulse"></div>
                        <span class="text-xs font-bold text-clinical-600 uppercase tracking-tight">Cloud Secure</span>
                    </div>
                    
                    <button class="relative p-2 text-clinical-400 hover:text-clinical-600 transition-colors">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"/></svg>
                        <span class="absolute top-1 right-1 w-2 h-2 bg-red-500 rounded-full border-2 border-white"></span>
                    </button>
                    
                    <div class="w-10 h-10 rounded-full bg-clinical-100 flex items-center justify-center border border-clinical-200 overflow-hidden cursor-pointer hover:border-clinical-400 transition-all">
                        <img src="https://ui-avatars.com/api/?name={{ urlencode(auth()->user()->name ?? 'User') }}&background=0F172A&color=fff" alt="Profile">
                    </div>
                </div>
            </header>

            <!-- Page Content -->
            <main class="flex-1 overflow-y-auto p-8 lg:p-12">
                {{ $slot }}
            </main>
        </div>
    </div>
</body>
</html>
