<x-index-layout title="Patient Management">
    <div class="mb-10 flex flex-col md:flex-row md:items-end justify-between gap-6">
        <div>
            <h1 class="text-3xl font-black text-clinical-900 tracking-tight">Enterprise Health Records</h1>
            <p class="text-clinical-500 font-medium mt-1">Manage centralized patient data with secure clinical access.</p>
        </div>
        <div class="flex items-center gap-3">
            <div class="relative group">
                <input type="text" placeholder="Search Identity (Name or ID)..." class="pl-10 pr-4 py-2.5 bg-white border border-clinical-200 rounded-clinical text-sm focus:outline-none focus:ring-2 focus:ring-clinical-500 w-64 transition-all">
                <svg class="w-4 h-4 text-clinical-400 absolute left-3.5 top-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
            </div>
            <button class="px-5 py-2.5 bg-clinical-600 rounded-clinical text-sm font-bold text-white hover:bg-clinical-700 transition-all shadow-lg shadow-clinical-200">
                + Register Patient
            </button>
        </div>
    </div>

    <!-- Patients List -->
    <div class="bg-white rounded-3xl border border-clinical-100 shadow-sm overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-clinical-50/50">
                        <th class="px-8 py-4 text-[10px] font-black text-clinical-400 uppercase tracking-[0.2em] border-b border-clinical-100">Patient Data</th>
                        <th class="px-8 py-4 text-[10px] font-black text-clinical-400 uppercase tracking-[0.2em] border-b border-clinical-100">DOB / Age</th>
                        <th class="px-8 py-4 text-[10px] font-black text-clinical-400 uppercase tracking-[0.2em] border-b border-clinical-100">Last Admission</th>
                        <th class="px-8 py-4 text-[10px] font-black text-clinical-400 uppercase tracking-[0.2em] border-b border-clinical-100">Care Status</th>
                        <th class="px-8 py-4 text-[10px] font-black text-clinical-400 uppercase tracking-[0.2em] border-b border-clinical-100 text-right">Records</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-clinical-50">
                    @php
                        $patients = [
                            ['name' => 'Robert Fox', 'initials' => 'RF', 'dob' => '12 May 1985', 'age' => 38, 'last' => '14 Feb 2026', 'status' => 'Outpatient', 'color' => 'emerald'],
                            ['name' => 'Jane Cooper', 'initials' => 'JC', 'dob' => '30 Oct 1992', 'age' => 31, 'last' => '22 Jan 2026', 'status' => 'In-care', 'color' => 'blue'],
                            ['name' => 'Wade Warren', 'initials' => 'WW', 'dob' => '04 Jul 1978', 'age' => 45, 'last' => '05 Mar 2026', 'status' => 'Critical', 'color' => 'red'],
                            ['name' => 'Esther Howard', 'initials' => 'EH', 'dob' => '18 Dec 1965', 'age' => 58, 'last' => '10 Dec 2025', 'status' => 'Recovery', 'color' => 'amber'],
                            ['name' => 'Cameron Williamson', 'initials' => 'CW', 'dob' => '24 Sep 1990', 'age' => 33, 'last' => '28 Feb 2026', 'status' => 'Outpatient', 'color' => 'emerald'],
                        ];
                    @endphp

                    @foreach($patients as $patient)
                    <tr class="group hover:bg-clinical-50/30 transition-colors cursor-pointer">
                        <td class="px-8 py-6">
                            <div class="flex items-center gap-4">
                                <div class="w-10 h-10 rounded-xl bg-clinical-50 group-hover:bg-white transition-colors flex items-center justify-center text-xs font-black text-clinical-600 border border-clinical-100 shadow-sm">
                                    {{ $patient['initials'] }}
                                </div>
                                <div>
                                    <span class="font-bold text-clinical-900 block">{{ $patient['name'] }}</span>
                                    <span class="text-[10px] font-black uppercase text-clinical-400 tracking-widest">ID: HOS-{{ 1000 + $loop->index }}</span>
                                </div>
                            </div>
                        </td>
                        <td class="px-8 py-6">
                            <span class="text-sm text-clinical-600 font-medium block">{{ $patient['dob'] }}</span>
                            <span class="text-xs text-clinical-400 italic">{{ $patient['age'] }} years</span>
                        </td>
                        <td class="px-8 py-6 text-sm text-clinical-500 font-bold">{{ $patient['last'] }}</td>
                        <td class="px-8 py-6">
                            <span class="inline-flex items-center px-3 py-1 bg-{{ $patient['color'] }}-50 text-{{ $patient['color'] }}-700 rounded-lg text-[10px] font-black uppercase tracking-widest border border-{{ $patient['color'] }}-100">
                                {{ $patient['status'] }}
                            </span>
                        </td>
                        <td class="px-8 py-6 text-right">
                            <button class="text-clinical-400 hover:text-clinical-900 transition-colors p-2 rounded-lg hover:bg-white">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                            </button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="p-8 bg-clinical-50/50 border-t border-clinical-100 flex items-center justify-between">
            <p class="text-xs font-bold text-clinical-400">Displaying 1-5 of 1,284 patients</p>
            <div class="flex gap-2">
                <button class="px-3 py-1 rounded-lg border border-clinical-200 text-xs font-bold text-clinical-400 hover:bg-white transition-all">Prev</button>
                <button class="px-3 py-1 rounded-lg border border-clinical-200 text-xs font-bold text-clinical-900 bg-white shadow-sm">1</button>
                <button class="px-3 py-1 rounded-lg border border-clinical-200 text-xs font-bold text-clinical-400 hover:bg-white transition-all">2</button>
                <button class="px-3 py-1 rounded-lg border border-clinical-200 text-xs font-bold text-clinical-400 hover:bg-white transition-all">Next</button>
            </div>
        </div>
    </div>
</x-index-layout>
