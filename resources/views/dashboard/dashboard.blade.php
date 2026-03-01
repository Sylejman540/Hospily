<x-layouts.app title="Clinical Overview">
    <div class="mb-10 flex flex-col md:flex-row md:items-end justify-between gap-6">
        <div>
            <h1 class="text-3xl font-black text-clinical-900 tracking-tight">System Statistics</h1>
            <p class="text-clinical-500 font-medium mt-1">Real-time performance metrics for {{ auth()->user()->facility_name ?? "Medical Center" }}</p>
        </div>
        <div class="flex items-center gap-3">
            <button class="px-5 py-2.5 bg-white border border-clinical-200 rounded-clinical text-sm font-bold text-clinical-600 hover:bg-clinical-50 transition-all shadow-sm">
                Export Audit Log
            </button>
            <button class="px-5 py-2.5 bg-clinical-600 rounded-clinical text-sm font-bold text-white hover:bg-clinical-700 transition-all shadow-lg shadow-clinical-200">
                + New Entry
            </button>
        </div>
    </div>

    <!-- Stats Grid -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-12">
        <div class="bg-white p-8 rounded-3xl border border-clinical-100 shadow-sm hover:shadow-md transition-shadow">
            <div class="flex items-start justify-between mb-4">
                <div class="w-12 h-12 bg-clinical-50 rounded-2xl flex items-center justify-center text-clinical-600">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/></svg>
                </div>
                <span class="text-emerald-600 text-xs font-black bg-emerald-50 px-2 py-1 rounded-lg">+12.5%</span>
            </div>
            <p class="text-xs font-black text-clinical-400 uppercase tracking-widest mb-1">Active Patients</p>
            <h3 class="text-3xl font-black text-clinical-900 tracking-tight">1,284</h3>
        </div>

        <div class="bg-white p-8 rounded-3xl border border-clinical-100 shadow-sm hover:shadow-md transition-shadow">
            <div class="flex items-start justify-between mb-4">
                <div class="w-12 h-12 bg-blue-50 rounded-2xl flex items-center justify-center text-blue-600">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                </div>
                <span class="text-clinical-400 text-xs font-black bg-clinical-50 px-2 py-1 rounded-lg">Capacity: 84%</span>
            </div>
            <p class="text-xs font-black text-clinical-400 uppercase tracking-widest mb-1">Available Beds</p>
            <h3 class="text-3xl font-black text-clinical-900 tracking-tight">42</h3>
        </div>

        <div class="bg-white p-8 rounded-3xl border border-clinical-100 shadow-sm hover:shadow-md transition-shadow">
            <div class="flex items-start justify-between mb-4">
                <div class="w-12 h-12 bg-amber-50 rounded-2xl flex items-center justify-center text-amber-600">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"/></svg>
                </div>
                <span class="text-amber-600 text-xs font-black bg-amber-50 px-2 py-1 rounded-lg">8 Today</span>
            </div>
            <p class="text-xs font-black text-clinical-400 uppercase tracking-widest mb-1">Clinic Surgeries</p>
            <h3 class="text-3xl font-black text-clinical-900 tracking-tight">18</h3>
        </div>

        <div class="bg-white p-8 rounded-3xl border border-clinical-100 shadow-sm hover:shadow-md transition-shadow">
            <div class="flex items-start justify-between mb-4">
                <div class="w-12 h-12 bg-emerald-50 rounded-2xl flex items-center justify-center text-emerald-600">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                </div>
                <span class="text-emerald-600 text-xs font-black bg-emerald-50 px-2 py-1 rounded-lg">+5.4% ↑</span>
            </div>
            <p class="text-xs font-black text-clinical-400 uppercase tracking-widest mb-1">Monthly Revenue</p>
            <h3 class="text-3xl font-black text-clinical-900 tracking-tight">$48.2k</h3>
        </div>
    </div>

    <!-- Main Content Area -->
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        <!-- Appointments Table -->
        <div class="lg:col-span-2 bg-white rounded-3xl border border-clinical-100 shadow-sm overflow-hidden flex flex-col">
            <div class="p-8 border-b border-clinical-50 flex items-center justify-between">
                <div>
                    <h4 class="text-xl font-black text-clinical-900">Upcoming Clinical Queue</h4>
                    <p class="text-sm text-clinical-500 font-medium mt-0.5">Managing next 24 hours of activity</p>
                </div>
                <a href="/appointments" class="text-sm font-bold text-clinical-600 hover:text-clinical-700 underline decoration-clinical-100 underline-offset-4">View Operational Queue</a>
            </div>
            
            <div class="overflow-x-auto flex-1">
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr class="bg-clinical-50/50">
                            <th class="px-8 py-4 text-[10px] font-black text-clinical-400 uppercase tracking-[0.2em] border-b border-clinical-100">Patient Identity</th>
                            <th class="px-8 py-4 text-[10px] font-black text-clinical-400 uppercase tracking-[0.2em] border-b border-clinical-100">Assigned Clinician</th>
                            <th class="px-8 py-4 text-[10px] font-black text-clinical-400 uppercase tracking-[0.2em] border-b border-clinical-100">Check-in</th>
                            <th class="px-8 py-4 text-[10px] font-black text-clinical-400 uppercase tracking-[0.2em] border-b border-clinical-100 text-right">Status</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-clinical-50">
                        <tr class="group hover:bg-clinical-50/30 transition-colors">
                            <td class="px-8 py-5">
                                <div class="flex items-center gap-3">
                                    <div class="w-8 h-8 rounded-full bg-clinical-100 flex items-center justify-center text-xs font-bold text-clinical-600">RF</div>
                                    <span class="font-bold text-clinical-900">Robert Fox</span>
                                </div>
                            </td>
                            <td class="px-8 py-5 text-sm text-clinical-600 font-medium">Dr. Arlene McCoy</td>
                            <td class="px-8 py-5 text-sm text-clinical-500 font-bold">09:30 AM</td>
                            <td class="px-8 py-5 text-right">
                                <span class="inline-flex items-center px-3 py-1 bg-emerald-50 text-emerald-700 rounded-lg text-[10px] font-black uppercase tracking-widest border border-emerald-100">Confirmed</span>
                            </td>
                        </tr>
                        <tr class="group hover:bg-clinical-50/30 transition-colors">
                            <td class="px-8 py-5">
                                <div class="flex items-center gap-3">
                                    <div class="w-8 h-8 rounded-full bg-clinical-100 flex items-center justify-center text-xs font-bold text-clinical-600">JC</div>
                                    <span class="font-bold text-clinical-900">Jane Cooper</span>
                                </div>
                            </td>
                            <td class="px-8 py-5 text-sm text-clinical-600 font-medium">Dr. Bessie Cooper</td>
                            <td class="px-8 py-5 text-sm text-clinical-500 font-bold">10:15 AM</td>
                            <td class="px-8 py-5 text-right">
                                <span class="inline-flex items-center px-3 py-1 bg-clinical-50 text-clinical-700 rounded-lg text-[10px] font-black uppercase tracking-widest border border-clinical-100">On Deck</span>
                            </td>
                        </tr>
                        <tr class="group hover:bg-clinical-50/30 transition-colors">
                            <td class="px-8 py-5">
                                <div class="flex items-center gap-3">
                                    <div class="w-8 h-8 rounded-full bg-clinical-100 flex items-center justify-center text-xs font-bold text-clinical-600">WW</div>
                                    <span class="font-bold text-clinical-900">Wade Warren</span>
                                </div>
                            </td>
                            <td class="px-8 py-5 text-sm text-clinical-600 font-medium">Dr. Arlene McCoy</td>
                            <td class="px-8 py-5 text-sm text-clinical-500 font-bold">11:00 AM</td>
                            <td class="px-8 py-5 text-right">
                                <span class="inline-flex items-center px-3 py-1 bg-amber-50 text-amber-700 rounded-lg text-[10px] font-black uppercase tracking-widest border border-amber-100">Pending</span>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <div class="p-6 bg-clinical-50/50 border-t border-clinical-100 text-center">
                <p class="text-xs font-bold text-clinical-400">Showing top 3 prioritized clinical events</p>
            </div>
        </div>

        <!-- Utility Sidebar -->
        <div class="space-y-8">
            <div class="bg-clinical-900 p-8 rounded-3xl text-white relative overflow-hidden shadow-2xl shadow-clinical-900/40">
                <div class="absolute top-0 right-0 p-4 opacity-10">
                    <svg class="w-24 h-24" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2L3 7v6c0 5.55 3.84 10.74 9 12 5.16-1.26 9-6.45 9-12V7l-9-5z"/></svg>
                </div>
                <h4 class="text-xl font-black mb-6 relative z-10">Department Capacity</h4>
                <div class="space-y-6 relative z-10">
                    <div>
                        <div class="flex justify-between text-xs font-bold uppercase tracking-widest mb-3 text-clinical-400">
                            <span>Emergency Unit</span>
                            <span class="text-white">92%</span>
                        </div>
                        <div class="h-2 bg-clinical-800 rounded-full overflow-hidden">
                            <div class="h-full bg-red-500 rounded-full" style="width: 92%"></div>
                        </div>
                    </div>
                    <div>
                        <div class="flex justify-between text-xs font-bold uppercase tracking-widest mb-3 text-clinical-400">
                            <span>Pediatrics</span>
                            <span class="text-white">45%</span>
                        </div>
                        <div class="h-2 bg-clinical-800 rounded-full overflow-hidden">
                            <div class="h-full bg-clinical-500 rounded-full" style="width: 45%"></div>
                        </div>
                    </div>
                    <div>
                        <div class="flex justify-between text-xs font-bold uppercase tracking-widest mb-3 text-clinical-400">
                            <span>Cardiology</span>
                            <span class="text-white">68%</span>
                        </div>
                        <div class="h-2 bg-clinical-800 rounded-full overflow-hidden">
                            <div class="h-full bg-emerald-500 rounded-full" style="width: 68%"></div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="bg-white p-8 rounded-3xl border border-clinical-100 shadow-sm">
                <div class="flex items-center gap-3 mb-6">
                    <div class="w-10 h-10 bg-clinical-50 rounded-xl flex items-center justify-center text-clinical-600">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"/></svg>
                    </div>
                    <h4 class="font-black text-clinical-900">Critical Handover</h4>
                </div>
                <div class="p-4 bg-amber-50 rounded-2xl border border-amber-100">
                    <p class="text-amber-800 text-xs font-black uppercase tracking-widest mb-2">Shift Alert</p>
                    <p class="text-amber-700 text-sm font-medium leading-relaxed">Shift handover starting in 15 mins for ICU unit 4. All leads report to central station.</p>
                </div>
                <button class="w-full mt-6 py-3 text-sm font-bold text-clinical-600 border border-clinical-200 rounded-xl hover:bg-clinical-50 transition-all">Acknowledge Alert</button>
            </div>
        </div>
    </div>
</x-layouts.app>