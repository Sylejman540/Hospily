<x-index-layout>
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
</x-index-layout>