<x-index-layout title="Appointment Registry">
    <div class="mb-10 flex flex-col md:flex-row md:items-end justify-between gap-6">
        <div>
            <h1 class="text-3xl font-black text-clinical-900 tracking-tight">Clinical Registry</h1>
            <p class="text-clinical-500 font-medium mt-1">Operational view of scheduled consultations and procedures.</p>
        </div>
        <div class="flex items-center gap-3">
            <button class="px-5 py-2.5 bg-white border border-clinical-200 rounded-clinical text-sm font-bold text-clinical-600 hover:bg-clinical-50 transition-all shadow-sm">
                Operational Forecast
            </button>
            <button class="px-5 py-2.5 bg-clinical-600 rounded-clinical text-sm font-bold text-white hover:bg-clinical-700 transition-all shadow-lg shadow-clinical-200">
                + Schedule Consultation
            </button>
        </div>
    </div>

    <!-- Calendar View Toggle -->
    <div class="flex items-center gap-1 p-1 bg-clinical-100/50 rounded-xl w-fit mb-8 border border-clinical-100">
        <button class="px-6 py-2 bg-white rounded-lg text-xs font-black uppercase tracking-widest text-clinical-900 shadow-sm border border-clinical-100">List View</button>
        <button class="px-6 py-2 text-xs font-black uppercase tracking-widest text-clinical-500 hover:text-clinical-900 transition-colors">Calendar</button>
        <button class="px-6 py-2 text-xs font-black uppercase tracking-widest text-clinical-500 hover:text-clinical-900 transition-colors">By Clinician</button>
    </div>

    <!-- Appointments Table -->
    <div class="bg-white rounded-3xl border border-clinical-100 shadow-sm overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-clinical-50/50">
                        <th class="px-8 py-4 text-[10px] font-black text-clinical-400 uppercase tracking-[0.2em] border-b border-clinical-100">Identity</th>
                        <th class="px-8 py-4 text-[10px] font-black text-clinical-400 uppercase tracking-[0.2em] border-b border-clinical-100">Consultant</th>
                        <th class="px-8 py-4 text-[10px] font-black text-clinical-400 uppercase tracking-[0.2em] border-b border-clinical-100">Scheduled Time</th>
                        <th class="px-8 py-4 text-[10px] font-black text-clinical-400 uppercase tracking-[0.2em] border-b border-clinical-100">Procedure</th>
                        <th class="px-8 py-4 text-[10px] font-black text-clinical-400 uppercase tracking-[0.2em] border-b border-clinical-100 text-right">Action</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-clinical-50">
                    @php
                        $appointments = [
                            ['patient' => 'Robert Fox', 'clinician' => 'Dr. Arlene McCoy', 'time' => '09:30 AM', 'procedure' => 'Cardiology Follow-up', 'status' => 'Confirmed', 'color' => 'emerald'],
                            ['patient' => 'Jane Cooper', 'initials' => 'JC', 'clinician' => 'Dr. Bessie Cooper', 'time' => '10:15 AM', 'procedure' => 'Post-op Review', 'status' => 'Urgent', 'color' => 'red'],
                            ['patient' => 'Wade Warren', 'clinician' => 'Dr. Arlene McCoy', 'time' => '11:00 AM', 'procedure' => 'General Consult', 'status' => 'Pending', 'color' => 'amber'],
                            ['patient' => 'Brooklyn Simmons', 'clinician' => 'Dr. Jacob Jones', 'time' => '01:30 PM', 'procedure' => 'Imaging Report', 'status' => 'Confirmed', 'color' => 'blue'],
                            ['patient' => 'Guy Hawkins', 'clinician' => 'Dr. Robert Fox', 'time' => '02:45 PM', 'procedure' => 'Lab Results', 'status' => 'Confirmed', 'color' => 'emerald'],
                        ];
                    @endphp

                    @foreach($appointments as $appt)
                    <tr class="group hover:bg-clinical-50/30 transition-colors">
                        <td class="px-8 py-6">
                            <span class="font-bold text-clinical-900 block">{{ $appt['patient'] }}</span>
                            <span class="text-[10px] font-black uppercase text-clinical-400 tracking-widest">Priority Care</span>
                        </td>
                        <td class="px-8 py-6">
                            <div class="flex items-center gap-3">
                                <div class="w-6 h-6 rounded-full bg-clinical-900 flex items-center justify-center">
                                    <svg class="w-3 h-3 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"/></svg>
                                </div>
                                <span class="text-sm text-clinical-600 font-medium">{{ $appt['clinician'] }}</span>
                            </div>
                        </td>
                        <td class="px-8 py-6">
                            <span class="text-sm text-clinical-900 font-black">{{ $appt['time'] }}</span>
                            <span class="text-[10px] font-bold text-clinical-400 block uppercase">Today</span>
                        </td>
                        <td class="px-8 py-6">
                            <span class="text-xs font-bold text-clinical-500 italic">{{ $appt['procedure'] }}</span>
                        </td>
                        <td class="px-8 py-6 text-right">
                            <span class="inline-flex items-center px-3 py-1 bg-{{ $appt['color'] }}-50 text-{{ $appt['color'] }}-700 rounded-lg text-[10px] font-black uppercase tracking-widest border border-{{ $appt['color'] }}-100">
                                {{ $appt['status'] }}
                            </span>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-index-layout>