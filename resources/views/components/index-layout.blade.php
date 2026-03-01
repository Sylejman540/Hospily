<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard | Hospily</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
    <div class="min-h-screen bg-slate-50 flex">

    <aside class="w-64 bg-slate-900 text-slate-300 flex flex-col fixed h-full z-50">
        <div class="p-6 flex items-center gap-3 border-b border-slate-800">
            <div class="w-8 h-8 bg-blue-600 rounded flex items-center justify-center shadow-lg">
                <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" /></svg>
            </div>
            <a href='/' class="text-xl font-bold text-white tracking-tight">Hospily</a>
        </div>

        <nav class="flex-1 p-4 space-y-2">
            <a href="/dashboard" class="flex items-center gap-3 px-4 py-3 rounded-lg bg-blue-600 text-white font-medium">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"></path></svg>
                Dashboard
            </a>
            <a href="/patients" class="flex items-center gap-3 px-4 py-3 rounded-lg hover:bg-slate-800 transition-colors">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                Patients
            </a>
            <a href="/appointments" class="flex items-center gap-3 px-4 py-3 rounded-lg hover:bg-slate-800 transition-colors">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                Appointments
            </a>
        </nav>

        <div class="p-4 border-t border-slate-800">
            <div class="flex items-center gap-3 p-2 bg-slate-800 rounded-xl">
                <div class="w-10 h-10 rounded-lg bg-blue-500 flex items-center justify-center font-bold text-white">DR</div>
                <div class="overflow-hidden">
                    <p class="text-sm font-bold text-white truncate">Dr. Sarah Jenkins</p>
                    <p class="text-xs text-slate-500 truncate">Administrator</p>
                </div>
            </div>
        </div>
    </aside>

    <main class="flex-1 ml-64 p-8">
        {{ $slot}}
    </main>
</div>
</div>
</body>
</html>