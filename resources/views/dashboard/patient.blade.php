<div class="min-h-screen bg-slate-50 flex">

    <aside class="w-64 bg-slate-900 text-slate-300 flex flex-col fixed h-full z-50">
        <div class="p-6 flex items-center gap-3 border-b border-slate-800">
            <div class="w-8 h-8 bg-blue-600 rounded flex items-center justify-center shadow-lg text-white">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" /></svg>
            </div>
            <span class="text-xl font-bold text-white tracking-tight">Hospily</span>
        </div>
        <nav class="flex-1 p-4 space-y-2 text-sm">
            <a href="#" class="flex items-center gap-3 px-4 py-3 rounded-lg hover:bg-slate-800 transition-colors">
                 <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"></path></svg> Dashboard
            </a>
            <a href="#" class="flex items-center gap-3 px-4 py-3 rounded-lg bg-blue-600 text-white font-medium">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg> Patients
            </a>
            <a href="#" class="flex items-center gap-3 px-4 py-3 rounded-lg hover:bg-slate-800 transition-colors">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg> Appointments
            </a>
        </nav>
    </aside>

    <main class="flex-1 ml-64 p-8">
        
        <header class="flex flex-col md:flex-row justify-between items-start md:items-center gap-4 mb-8">
            <div>
                <h1 class="text-2xl font-bold text-slate-900">Patient Directory</h1>
                <p class="text-slate-500">Manage records, medical history, and admissions.</p>
            </div>
            <div class="flex items-center gap-3 w-full md:w-auto">
                <div class="relative w-full md:w-80">
                    <span class="absolute inset-y-0 left-0 flex items-center pl-3 text-slate-400">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                    </span>
                    <input type="text" placeholder="Search by name, ID, or insurance..." 
                        class="w-full pl-10 pr-4 py-2.5 rounded-xl border border-slate-200 focus:ring-4 focus:ring-blue-50 focus:border-blue-500 outline-none transition-all text-sm">
                </div>
                <button class="bg-blue-600 px-6 py-2.5 rounded-xl text-white font-bold text-sm shadow-lg shadow-blue-100 hover:bg-blue-700 transition">+ Register Patient</button>
            </div>
        </header>

        <div class="flex flex-wrap gap-4 mb-6">
            <button class="px-4 py-2 bg-white border border-slate-200 rounded-lg text-sm font-semibold text-slate-700 hover:border-blue-500 transition">All Patients</button>
            <button class="px-4 py-2 bg-white border border-slate-200 rounded-lg text-sm font-semibold text-slate-500 hover:border-blue-500 transition">In-Patient</button>
            <button class="px-4 py-2 bg-white border border-slate-200 rounded-lg text-sm font-semibold text-slate-500 hover:border-blue-500 transition">Out-Patient</button>
            <button class="px-4 py-2 bg-white border border-slate-200 rounded-lg text-sm font-semibold text-slate-500 hover:border-blue-500 transition">Critical Care</button>
        </div>

        <div class="bg-white rounded-2xl border border-slate-100 shadow-sm overflow-hidden">
            <table class="w-full text-left border-collapse">
                <thead class="bg-slate-50 border-b border-slate-100 text-slate-400 text-xs uppercase font-bold">
                    <tr>
                        <th class="px-6 py-4">Patient Name & ID</th>
                        <th class="px-6 py-4">Status</th>
                        <th class="px-6 py-4">Gender / Age</th>
                        <th class="px-6 py-4">Blood Type</th>
                        <th class="px-6 py-4">Last Visit</th>
                        <th class="px-6 py-4 text-right">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-50 text-sm">
                    <tr class="hover:bg-blue-50/30 transition-colors group">
                        <td class="px-6 py-4">
                            <div class="flex items-center gap-3">
                                <div class="w-10 h-10 rounded-full bg-slate-100 flex items-center justify-center font-bold text-blue-600">CC</div>
                                <div>
                                    <p class="font-bold text-slate-900">Courtney Cook</p>
                                    <p class="text-xs text-slate-400">#HS-9021</p>
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-4">
                            <span class="px-3 py-1 bg-green-100 text-green-700 rounded-full text-xs font-bold">Recovered</span>
                        </td>
                        <td class="px-6 py-4 text-slate-600">Female, 28y</td>
                        <td class="px-6 py-4">
                            <span class="px-2 py-0.5 border border-red-200 text-red-600 rounded bg-red-50 text-xs font-bold">O+</span>
                        </td>
                        <td class="px-6 py-4 text-slate-500">Yesterday, 04:20 PM</td>
                        <td class="px-6 py-4 text-right">
                            <button class="text-slate-400 hover:text-blue-600 font-bold px-2">Edit</button>
                            <button class="text-blue-600 hover:text-blue-800 font-bold px-2">View EHR</button>
                        </td>
                    </tr>
                    <tr class="hover:bg-blue-50/30 transition-colors group">
                        <td class="px-6 py-4">
                            <div class="flex items-center gap-3">
                                <div class="w-10 h-10 rounded-full bg-slate-100 flex items-center justify-center font-bold text-blue-600">JM</div>
                                <div>
                                    <p class="font-bold text-slate-900">Jerome Bell</p>
                                    <p class="text-xs text-slate-400">#HS-8842</p>
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-4">
                            <span class="px-3 py-1 bg-red-100 text-red-700 rounded-full text-xs font-bold animate-pulse">Critical</span>
                        </td>
                        <td class="px-6 py-4 text-slate-600">Male, 54y</td>
                        <td class="px-6 py-4">
                            <span class="px-2 py-0.5 border border-red-200 text-red-600 rounded bg-red-50 text-xs font-bold">A-</span>
                        </td>
                        <td class="px-6 py-4 text-slate-500">Today, 09:12 AM</td>
                        <td class="px-6 py-4 text-right">
                            <button class="text-slate-400 hover:text-blue-600 font-bold px-2">Edit</button>
                            <button class="text-blue-600 hover:text-blue-800 font-bold px-2">View EHR</button>
                        </td>
                    </tr>
                    <tr class="hover:bg-blue-50/30 transition-colors group">
                        <td class="px-6 py-4">
                            <div class="flex items-center gap-3">
                                <div class="w-10 h-10 rounded-full bg-slate-100 flex items-center justify-center font-bold text-blue-600">AW</div>
                                <div>
                                    <p class="font-bold text-slate-900">Arlene Webb</p>
                                    <p class="text-xs text-slate-400">#HS-7721</p>
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-4">
                            <span class="px-3 py-1 bg-amber-100 text-amber-700 rounded-full text-xs font-bold">Observation</span>
                        </td>
                        <td class="px-6 py-4 text-slate-600">Female, 41y</td>
                        <td class="px-6 py-4">
                            <span class="px-2 py-0.5 border border-red-200 text-red-600 rounded bg-red-50 text-xs font-bold">B+</span>
                        </td>
                        <td class="px-6 py-4 text-slate-500">24 Feb 2026</td>
                        <td class="px-6 py-4 text-right">
                            <button class="text-slate-400 hover:text-blue-600 font-bold px-2">Edit</button>
                            <button class="text-blue-600 hover:text-blue-800 font-bold px-2">View EHR</button>
                        </td>
                    </tr>
                </tbody>
            </table>

            <div class="p-6 bg-slate-50/50 flex justify-between items-center text-sm text-slate-500">
                <span>Showing 1 to 10 of 1,284 patients</span>
                <div class="flex gap-2">
                    <button class="px-4 py-2 border border-slate-200 rounded-lg hover:bg-white transition">Previous</button>
                    <button class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition">Next</button>
                </div>
            </div>
        </div>
    </main>
</div>