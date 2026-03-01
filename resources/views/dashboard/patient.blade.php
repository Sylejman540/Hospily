<x-index-layout>
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
</div>
</x-index-layout>