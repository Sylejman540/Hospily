<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Dashboard' }} | Hospily</title>
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
                            600: '#3B82F6',
                            700: '#2563EB',
                            800: '#1E40AF',
                            900: '#0F172A',
                        }
                    },
                    borderRadius: {
                        'clinical': '0.75rem',
                    }
                }
            }
        }
    </script>
    <style>
        .sidebar-transition { transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1); }
        #sidebar.closed { transform: translateX(-100%); }
        #main-content.sidebar-closed { margin-left: 0; }
        @media (max-width: 1024px) {
            #main-content { margin-left: 0 !important; }
            #sidebar.open { transform: translateX(0); }
        }
    </style>
</head>
<body class="bg-clinical-50 font-sans text-clinical-900">
    <div class="min-h-screen flex">

    <!-- Sidebar -->
    <aside id="sidebar" class="sidebar-transition w-64 bg-clinical-900 text-slate-300 flex flex-col fixed h-full z-50">
        <div class="p-6 border-b border-slate-800 flex items-center justify-between">
            <a href='/' class="flex items-center gap-3 group">
                <div class="w-8 h-8 bg-clinical-600 rounded-clinical flex items-center justify-center shadow-lg group-hover:bg-clinical-500 transition-all">
                    <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" /></svg>
                </div>
                <span class="text-xl font-bold text-white tracking-tight group-hover:text-clinical-400 transition-colors">Hospily</span>
            </a>
            <!-- Mobile Close Button -->
            <button id="close-sidebar" class="lg:hidden p-2 text-slate-500 hover:text-white transition-colors">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" /></svg>
            </button>
        </div>

        <nav class="flex-1 p-4 space-y-1.5 pt-8">
            <p class="text-[10px] font-bold text-slate-500 uppercase tracking-widest px-4 mb-4">Navigation</p>
            <a href="/dashboard" class="flex items-center gap-3 px-4 py-3 rounded-clinical transition-all {{ request()->is('dashboard') ? 'bg-clinical-600 text-white shadow-lg' : 'hover:bg-slate-800 hover:text-white' }}">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/></svg>
                <span class="text-sm font-medium">Dashboard Overview</span>
            </a>
            <a href="/patients" class="flex items-center gap-3 px-4 py-3 rounded-clinical transition-all {{ request()->is('patients') ? 'bg-clinical-600 text-white shadow-lg' : 'hover:bg-slate-800 hover:text-white' }}">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/></svg>
                <span class="text-sm font-medium">Patient Records</span>
            </a>
            <a href="/appointments" class="flex items-center gap-3 px-4 py-3 rounded-clinical transition-all {{ request()->is('appointments') ? 'bg-clinical-600 text-white shadow-lg' : 'hover:bg-slate-800 hover:text-white' }}">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                <span class="text-sm font-medium">Appointment Registry</span>
            </a>
        </nav>

        <div class="p-4 border-t border-slate-800">
            <div class="flex items-center gap-3 p-3 bg-slate-800/50 rounded-clinical border border-slate-700/50">
                <div class="w-10 h-10 rounded-lg bg-clinical-500 flex items-center justify-center font-bold text-white shadow-inner">DR</div>
                <div class="overflow-hidden">
                    <p class="text-sm font-bold text-white truncate">{{ auth()->user()->name ?? 'Dr. Jenkins' }}</p>
                    <p class="text-[10px] text-slate-500 font-bold uppercase tracking-tight">System Admin</p>
                </div>
            </div>
            <form action="/logout" method="POST" class="mt-4">
                @csrf
                @method('DELETE')
                <button class="w-full flex items-center justify-center gap-2 px-4 py-2 rounded-clinical text-xs font-bold text-slate-500 hover:text-red-400 hover:bg-red-400/10 transition-all">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/></svg>
                    End Session
                </button>
            </form>
        </div>
    </aside>

    <!-- Main Content wrapper -->
    <div id="main-content" class="sidebar-transition flex-1 ml-64 min-w-0">
        <!-- Top Navigation / Toggle -->
        <header class="h-20 bg-white border-b border-clinical-100 flex items-center justify-between px-8 sticky top-0 z-40 bg-white/80 backdrop-blur-md">
            <div class="flex items-center gap-4">
                <button id="toggle-sidebar" class="p-2.5 bg-clinical-50 text-clinical-600 hover:bg-clinical-100 rounded-clinical transition-all border border-clinical-100 shadow-sm flex items-center gap-2 group">
                    <svg class="w-5 h-5 group-hover:scale-110 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h7"/></svg>
                    <span class="text-xs font-bold uppercase tracking-widest hidden sm:block">Menu</span>
                </button>
                <div class="h-6 w-px bg-clinical-100 hidden md:block"></div>
                <h2 class="text-sm font-bold text-clinical-900 hidden md:block uppercase tracking-widest">{{ $title ?? 'Clinical Gateway' }}</h2>
            </div>
            
            <div class="flex items-center gap-6">
                <div class="hidden lg:flex items-center gap-2 px-3 py-1 bg-emerald-50 rounded-full border border-emerald-100">
                    <div class="w-1.5 h-1.5 rounded-full bg-emerald-500 animate-pulse"></div>
                    <span class="text-[10px] font-black text-emerald-700 uppercase tracking-tight">Encrypted Session</span>
                </div>
                <div class="flex items-center gap-3 border-l border-clinical-100 pl-6">
                    <div class="text-right hidden sm:block">
                        <p class="text-xs font-bold text-clinical-900">{{ auth()->user()->name ?? 'Dr. Jenkins' }}</p>
                        <p class="text-[10px] font-medium text-clinical-500">{{ auth()->user()->facility_name ?? "St. Mary's General" }}</p>
                    </div>
                    <div class="w-10 h-10 rounded-full bg-clinical-100 border border-clinical-200 flex items-center justify-center overflow-hidden">
                        <img src="https://ui-avatars.com/api/?name={{ urlencode(auth()->user()->name ?? 'User') }}&background=0F172A&color=fff" alt="Profile">
                    </div>
                </div>
            </div>
        </header>

        <main class="p-8 lg:p-12">
            {{ $slot }}
        </main>
    </div>

    </div>

    <!-- Toggle Logic -->
    <script>
        const sidebar = document.getElementById('sidebar');
        const mainContent = document.getElementById('main-content');
        const toggleBtn = document.getElementById('toggle-sidebar');
        const closeBtn = document.getElementById('close-sidebar');

        function toggleSidebar() {
            if (window.innerWidth >= 1024) {
                sidebar.classList.toggle('closed');
                mainContent.classList.toggle('sidebar-closed');
            } else {
                sidebar.classList.toggle('open');
            }
        }

        toggleBtn.addEventListener('click', toggleSidebar);
        closeBtn.addEventListener('click', () => sidebar.classList.remove('open'));

        // Handle window resize
        window.addEventListener('resize', () => {
            if (window.innerWidth >= 1024) {
                sidebar.classList.remove('open');
                if (sidebar.classList.contains('closed')) {
                    mainContent.classList.add('sidebar-closed');
                }
            } else {
                mainContent.classList.remove('sidebar-closed');
                sidebar.classList.remove('closed');
            }
        });
    </script>
</body>
</html>
