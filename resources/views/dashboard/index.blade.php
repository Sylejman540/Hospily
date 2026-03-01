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
        
        <header class="flex justify-between items-center mb-8">
            <div>
                <h1 class="text-2xl font-bold text-slate-900">Hospital Overview</h1>
                <p class="text-slate-500">St. Mary's General • March 2026</p>
            </div>
            <div class="flex gap-4">
                <button class="bg-white border border-slate-200 px-4 py-2 rounded-xl text-sm font-semibold text-slate-700 hover:bg-slate-50">Download Report</button>
                <button class="bg-blue-600 px-4 py-2 rounded-xl text-sm font-semibold text-white hover:bg-blue-700 shadow-lg shadow-blue-100">+ New Appointment</button>
            </div>
        </header>

        <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-8">
            <div class="bg-white p-6 rounded-2xl border border-slate-100 shadow-sm">
                <p class="text-sm font-bold text-slate-400 uppercase tracking-wider mb-1">Total Patients</p>
                <div class="flex items-end justify-between">
                    <h3 class="text-3xl font-bold text-slate-900">1,284</h3>
                    <span class="text-green-500 text-sm font-bold">+12% ↑</span>
                </div>
            </div>
            <div class="bg-white p-6 rounded-2xl border border-slate-100 shadow-sm">
                <p class="text-sm font-bold text-slate-400 uppercase tracking-wider mb-1">Available Beds</p>
                <div class="flex items-end justify-between">
                    <h3 class="text-3xl font-bold text-slate-900">42</h3>
                    <span class="text-slate-400 text-sm font-bold">of 250</span>
                </div>
            </div>
            <div class="bg-white p-6 rounded-2xl border border-slate-100 shadow-sm">
                <p class="text-sm font-bold text-slate-400 uppercase tracking-wider mb-1">Surgeries Today</p>
                <div class="flex items-end justify-between">
                    <h3 class="text-3xl font-bold text-slate-900">18</h3>
                    <span class="text-blue-500 text-sm font-bold">Scheduled</span>
                </div>
            </div>
            <div class="bg-white p-6 rounded-2xl border border-slate-100 shadow-sm">
                <p class="text-sm font-bold text-slate-400 uppercase tracking-wider mb-1">Revenue (MoM)</p>
                <div class="flex items-end justify-between">
                    <h3 class="text-3xl font-bold text-slate-900">$48.2k</h3>
                    <span class="text-green-500 text-sm font-bold">+5.4% ↑</span>
                </div>
            </div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            
            <div class="lg:col-span-2 bg-white rounded-2xl border border-slate-100 shadow-sm overflow-hidden">
                <div class="p-6 border-b border-slate-50 flex justify-between items-center">
                    <h4 class="font-bold text-slate-900">Upcoming Appointments</h4>
                    <a href="#" class="text-sm text-blue-600 font-bold hover:underline">View All</a>
                </div>
                <table class="w-full text-left">
                    <thead class="bg-slate-50 text-slate-400 text-xs uppercase font-bold">
                        <tr>
                            <th class="px-6 py-4">Patient</th>
                            <th class="px-6 py-4">Doctor</th>
                            <th class="px-6 py-4">Check-in</th>
                            <th class="px-6 py-4">Status</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-50 text-sm">
                        <tr class="hover:bg-slate-50 transition-colors">
                            <td class="px-6 py-4 font-semibold">Robert Fox</td>
                            <td class="px-6 py-4 text-slate-500">Dr. Arlene McCoy</td>
                            <td class="px-6 py-4 text-slate-500">09:30 AM</td>
                            <td class="px-6 py-4"><span class="px-3 py-1 bg-green-100 text-green-700 rounded-full text-xs font-bold">Confirmed</span></td>
                        </tr>
                        <tr class="hover:bg-slate-50 transition-colors">
                            <td class="px-6 py-4 font-semibold">Jane Cooper</td>
                            <td class="px-6 py-4 text-slate-500">Dr. Bessie Cooper</td>
                            <td class="px-6 py-4 text-slate-500">10:15 AM</td>
                            <td class="px-6 py-4"><span class="px-3 py-1 bg-blue-100 text-blue-700 rounded-full text-xs font-bold">On Deck</span></td>
                        </tr>
                        <tr class="hover:bg-slate-50 transition-colors">
                            <td class="px-6 py-4 font-semibold">Wade Warren</td>
                            <td class="px-6 py-4 text-slate-500">Dr. Arlene McCoy</td>
                            <td class="px-6 py-4 text-slate-500">11:00 AM</td>
                            <td class="px-6 py-4"><span class="px-3 py-1 bg-amber-100 text-amber-700 rounded-full text-xs font-bold">Pending</span></td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <div class="bg-white p-6 rounded-2xl border border-slate-100 shadow-sm">
                <h4 class="font-bold text-slate-900 mb-6">Department Load</h4>
                <div class="space-y-6">
                    <div>
                        <div class="flex justify-between text-sm mb-2">
                            <span class="font-medium text-slate-600">Emergency</span>
                            <span class="font-bold text-slate-900">92%</span>
                        </div>
                        <div class="w-full bg-slate-100 h-2 rounded-full overflow-hidden">
                            <div class="bg-red-500 h-full w-[92%]"></div>
                        </div>
                    </div>
                    <div>
                        <div class="flex justify-between text-sm mb-2">
                            <span class="font-medium text-slate-600">Pediatrics</span>
                            <span class="font-bold text-slate-900">45%</span>
                        </div>
                        <div class="w-full bg-slate-100 h-2 rounded-full overflow-hidden">
                            <div class="bg-blue-500 h-full w-[45%]"></div>
                        </div>
                    </div>
                    <div>
                        <div class="flex justify-between text-sm mb-2">
                            <span class="font-medium text-slate-600">Cardiology</span>
                            <span class="font-bold text-slate-900">68%</span>
                        </div>
                        <div class="w-full bg-slate-100 h-2 rounded-full overflow-hidden">
                            <div class="bg-green-500 h-full w-[68%]"></div>
                        </div>
                    </div>
                </div>

                <div class="mt-8 p-4 bg-blue-50 rounded-xl border border-blue-100">
                    <p class="text-blue-800 text-xs font-bold uppercase mb-1">System Alert</p>
                    <p class="text-blue-600 text-sm">Shift handover starting in 15 mins for ICU unit.</p>
                </div>
            </div>
        </div>
    </main>
</div>
</div>
</body>
</html>