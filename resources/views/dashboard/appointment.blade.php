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
            <button onclick="document.getElementById('createAppointmentModal').showModal()" class="px-5 py-2.5 bg-clinical-600 rounded-clinical text-sm font-bold text-white hover:bg-clinical-700 transition-all shadow-lg shadow-clinical-200">
                + Schedule Consultation
            </button>
        </div>
    </div>

    {{-- Success/Error Messages --}}
    @if(session('success'))
        <div class="mb-6 p-4 bg-emerald-50 border border-emerald-200 rounded-lg text-emerald-800 font-medium flex items-start gap-3">
            <svg class="w-5 h-5 flex-shrink-0 mt-0.5" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path></svg>
            <span>{{ session('success') }}</span>
        </div>
    @endif

    @if(session('error'))
        <div class="mb-6 p-4 bg-red-50 border border-red-200 rounded-lg text-red-800 font-medium flex items-start gap-3">
            <svg class="w-5 h-5 flex-shrink-0 mt-0.5" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"></path></svg>
            <span>{{ session('error') }}</span>
        </div>
    @endif

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
                        <th class="px-8 py-4 text-[10px] font-black text-clinical-400 uppercase tracking-[0.2em] border-b border-clinical-100 text-right">Status</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-clinical-50">
                    @forelse($appointments as $appointment)
                    <tr class="group hover:bg-clinical-50/30 transition-colors">
                        <td class="px-8 py-6">
                            <span class="font-bold text-clinical-900 block">{{ $appointment->patient->full_name }}</span>
                            <span class="text-[10px] font-black uppercase text-clinical-400 tracking-widest">{{ $appointment->patient->care_status === 'critical' ? 'Priority Care' : 'Standard Care' }}</span>
                        </td>
                        <td class="px-8 py-6">
                            <div class="flex items-center gap-3">
                                <div class="w-6 h-6 rounded-full bg-clinical-900 flex items-center justify-center">
                                    <svg class="w-3 h-3 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"/></svg>
                                </div>
                                <span class="text-sm text-clinical-600 font-medium">{{ $appointment->clinician->name }}</span>
                            </div>
                        </td>
                        <td class="px-8 py-6">
                            <span class="text-sm text-clinical-900 font-black">{{ \Carbon\Carbon::parse($appointment->scheduled_at)->format('h:i A') }}</span>
                            <span class="text-[10px] font-bold text-clinical-400 block uppercase">{{ \Carbon\Carbon::parse($appointment->scheduled_at)->format('M d, Y') }}</span>
                        </td>
                        <td class="px-8 py-6">
                            <span class="text-xs font-bold text-clinical-500 italic">{{ $appointment->procedure_type }}</span>
                        </td>
                        <td class="px-8 py-6 text-right">
                            @php
                                $statusColors = [
                                    'confirmed' => 'emerald',
                                    'urgent' => 'red',
                                    'pending' => 'amber',
                                    'cancelled' => 'clinical',
                                    'completed' => 'blue',
                                ];
                                $color = $statusColors[$appointment->status] ?? 'clinical';
                            @endphp
                            <span class="inline-flex items-center px-3 py-1 bg-{{ $color }}-50 text-{{ $color }}-700 rounded-lg text-[10px] font-black uppercase tracking-widest border border-{{ $color }}-100">
                                {{ ucfirst($appointment->status) }}
                            </span>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="px-8 py-12 text-center text-clinical-500 font-medium">
                            No appointments scheduled. <a href="#" onclick="document.getElementById('createAppointmentModal').showModal()" class="text-clinical-600 font-bold hover:underline">Schedule one now</a>.
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    {{-- Create Appointment Modal --}}
    <dialog id="createAppointmentModal" class="backdrop:bg-black/50 rounded-3xl shadow-2xl max-w-md w-full p-8">
        <form method="POST" action="{{ route('appointments.store') }}" class="space-y-5">
            @csrf
            
            <div>
                <h2 class="text-2xl font-black text-clinical-900 mb-1">Schedule Consultation</h2>
                <p class="text-sm text-clinical-500">Create a new appointment for a patient</p>
            </div>

            <div class="space-y-2">
                <label class="text-xs font-black uppercase tracking-widest text-clinical-600">Patient *</label>
                <select name="patient_id" required class="w-full px-4 py-2.5 border border-clinical-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-clinical-500 @error('patient_id') border-red-500 @enderror">
                    <option value="">Select Patient...</option>
                    @foreach(\App\Models\Patient::all() as $patient)
                        <option value="{{ $patient->id }}" {{ old('patient_id') == $patient->id ? 'selected' : '' }}>{{ $patient->full_name }} (MRN: {{ $patient->mrn }})</option>
                    @endforeach
                </select>
                @error('patient_id') <span class="text-xs text-red-600">{{ $message }}</span> @enderror
            </div>

            <div class="space-y-2">
                <label class="text-xs font-black uppercase tracking-widest text-clinical-600">Clinician *</label>
                <select name="clinician_id" required class="w-full px-4 py-2.5 border border-clinical-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-clinical-500 @error('clinician_id') border-red-500 @enderror">
                    <option value="">Select Clinician...</option>
                    @foreach(\App\Models\User::where('role', 'clinician')->orWhere('role', 'admin')->get() as $clinician)
                        <option value="{{ $clinician->id }}" {{ old('clinician_id') == $clinician->id ? 'selected' : '' }}>{{ $clinician->name }}</option>
                    @endforeach
                </select>
                @error('clinician_id') <span class="text-xs text-red-600">{{ $message }}</span> @enderror
            </div>

            <div class="space-y-2">
                <label class="text-xs font-black uppercase tracking-widest text-clinical-600">Department *</label>
                <select name="department_id" required class="w-full px-4 py-2.5 border border-clinical-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-clinical-500 @error('department_id') border-red-500 @enderror">
                    <option value="">Select Department...</option>
                    @foreach(\App\Models\Department::all() as $dept)
                        <option value="{{ $dept->id }}" {{ old('department_id') == $dept->id ? 'selected' : '' }}>{{ $dept->name }}</option>
                    @endforeach
                </select>
                @error('department_id') <span class="text-xs text-red-600">{{ $message }}</span> @enderror
            </div>

            <div class="space-y-2">
                <label class="text-xs font-black uppercase tracking-widest text-clinical-600">Scheduled Date & Time *</label>
                <input type="datetime-local" name="scheduled_at" required value="{{ old('scheduled_at') }}" class="w-full px-4 py-2.5 border border-clinical-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-clinical-500 @error('scheduled_at') border-red-500 @enderror">
                @error('scheduled_at') <span class="text-xs text-red-600">{{ $message }}</span> @enderror
            </div>

            <div class="space-y-2">
                <label class="text-xs font-black uppercase tracking-widest text-clinical-600">Procedure Type *</label>
                <input type="text" name="procedure_type" required value="{{ old('procedure_type') }}" class="w-full px-4 py-2.5 border border-clinical-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-clinical-500 @error('procedure_type') border-red-500 @enderror" placeholder="e.g., Surgery, Consultation, Follow-up">
                @error('procedure_type') <span class="text-xs text-red-600">{{ $message }}</span> @enderror
            </div>

            <div class="space-y-2">
                <label class="text-xs font-black uppercase tracking-widest text-clinical-600">Status *</label>
                <select name="status" required class="w-full px-4 py-2.5 border border-clinical-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-clinical-500 @error('status') border-red-500 @enderror">
                    <option value="">Select Status...</option>
                    <option value="confirmed" {{ old('status') === 'confirmed' ? 'selected' : '' }}>Confirmed</option>
                    <option value="urgent" {{ old('status') === 'urgent' ? 'selected' : '' }}>Urgent</option>
                    <option value="pending" {{ old('status') === 'pending' ? 'selected' : '' }}>Pending</option>
                    <option value="cancelled" {{ old('status') === 'cancelled' ? 'selected' : '' }}>Cancelled</option>
                    <option value="completed" {{ old('status') === 'completed' ? 'selected' : '' }}>Completed</option>
                </select>
                @error('status') <span class="text-xs text-red-600">{{ $message }}</span> @enderror
            </div>

            <div class="space-y-2">
                <label class="text-xs font-black uppercase tracking-widest text-clinical-600">Notes</label>
                <textarea name="notes" rows="3" class="w-full px-4 py-2.5 border border-clinical-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-clinical-500 @error('notes') border-red-500 @enderror" placeholder="Additional notes...">{{ old('notes') }}</textarea>
                @error('notes') <span class="text-xs text-red-600">{{ $message }}</span> @enderror
            </div>

            <div class="flex gap-3 pt-4">
                <button type="button" onclick="document.getElementById('createAppointmentModal').close()" class="flex-1 px-4 py-2.5 bg-clinical-100 text-clinical-600 rounded-lg font-bold hover:bg-clinical-200 transition-all">Cancel</button>
                <button type="submit" class="flex-1 px-4 py-2.5 bg-clinical-600 text-white rounded-lg font-bold hover:bg-clinical-700 transition-all">Schedule</button>
            </div>
        </form>
    </dialog>
</x-index-layout>