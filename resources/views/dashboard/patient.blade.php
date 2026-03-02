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
            <button onclick="document.getElementById('createPatientModal').showModal()" class="px-5 py-2.5 bg-clinical-600 rounded-clinical text-sm font-bold text-white hover:bg-clinical-700 transition-all shadow-lg shadow-clinical-200">
                + Register Patient
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
                        <th class="px-8 py-4 text-[10px] font-black text-clinical-400 uppercase tracking-[0.2em] border-b border-clinical-100 text-right">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-clinical-50">
                    @forelse($patients as $patient)
                    <tr class="group hover:bg-clinical-50/30 transition-colors cursor-pointer">
                        <td class="px-8 py-6">
                            <div class="flex items-center gap-4">
                                <div class="w-10 h-10 rounded-xl bg-clinical-50 group-hover:bg-white transition-colors flex items-center justify-center text-xs font-black text-clinical-600 border border-clinical-100 shadow-sm">
                                    {{ strtoupper(substr($patient->first_name, 0, 1) . substr($patient->last_name, 0, 1)) }}
                                </div>
                                <div>
                                    <span class="font-bold text-clinical-900 block">{{ $patient->full_name }}</span>
                                    <span class="text-[10px] font-black uppercase text-clinical-400 tracking-widest">MRN: {{ $patient->mrn }}</span>
                                </div>
                            </div>
                        </td>
                        <td class="px-8 py-6">
                            <span class="text-sm text-clinical-600 font-medium block">{{ \Carbon\Carbon::parse($patient->dob)->format('d M Y') }}</span>
                            <span class="text-xs text-clinical-400 italic">{{ \Carbon\Carbon::parse($patient->dob)->age }} years</span>
                        </td>
                        <td class="px-8 py-6 text-sm text-clinical-500 font-bold">
                            @if($patient->admitted_at)
                                {{ \Carbon\Carbon::parse($patient->admitted_at)->format('d M Y') }}
                            @else
                                N/A
                            @endif
                        </td>
                        <td class="px-8 py-6">
                            @php
                                $statusColors = [
                                    'in-care' => 'blue',
                                    'critical' => 'red',
                                    'recovery' => 'amber',
                                    'outpatient' => 'emerald',
                                ];
                                $color = $statusColors[$patient->care_status] ?? 'clinical';
                            @endphp
                            <span class="inline-flex items-center px-3 py-1 bg-{{ $color }}-50 text-{{ $color }}-700 rounded-lg text-[10px] font-black uppercase tracking-widest border border-{{ $color }}-100">
                                {{ ucfirst(str_replace('-', ' ', $patient->care_status)) }}
                            </span>
                        </td>
                        <td class="px-8 py-6 text-right">
                            <div class="flex items-center justify-end gap-2">
                                @if($patient->care_status !== 'outpatient')
                                <form method="POST" action="{{ route('patients.discharge', $patient) }}" class="inline">
                                    @csrf
                                    <button type="submit" class="text-amber-500 hover:text-amber-700 transition-colors p-2 rounded-lg hover:bg-amber-50 text-xs font-bold" title="Discharge Patient">Discharge</button>
                                </form>
                                @endif
                                <form method="POST" action="{{ route('patients.destroy', $patient) }}" class="inline" onsubmit="return confirm('Are you sure?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-500 hover:text-red-700 transition-colors p-2 rounded-lg hover:bg-red-50 text-xs font-bold">Delete</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="px-8 py-12 text-center text-clinical-500 font-medium">
                            No patients registered yet. <a href="#" onclick="document.getElementById('createPatientModal').showModal()" class="text-clinical-600 font-bold hover:underline">Create one now</a>.
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="p-8 bg-clinical-50/50 border-t border-clinical-100 flex items-center justify-between">
            <p class="text-xs font-bold text-clinical-400">Displaying {{ $patients->count() }} of {{ $patients->total() }} patients</p>
            <div class="flex gap-2">
                @if($patients->onFirstPage())
                    <button disabled class="px-3 py-1 rounded-lg border border-clinical-200 text-xs font-bold text-clinical-300 bg-gray-50">Prev</button>
                @else
                    <a href="{{ $patients->previousPageUrl() }}" class="px-3 py-1 rounded-lg border border-clinical-200 text-xs font-bold text-clinical-400 hover:bg-white transition-all">Prev</a>
                @endif
                
                <span class="px-3 py-1 rounded-lg border border-clinical-200 text-xs font-bold text-clinical-900 bg-white shadow-sm">{{ $patients->currentPage() }}</span>
                
                @if($patients->hasMorePages())
                    <a href="{{ $patients->nextPageUrl() }}" class="px-3 py-1 rounded-lg border border-clinical-200 text-xs font-bold text-clinical-400 hover:bg-white transition-all">Next</a>
                @else
                    <button disabled class="px-3 py-1 rounded-lg border border-clinical-200 text-xs font-bold text-clinical-300 bg-gray-50">Next</button>
                @endif
            </div>
        </div>
    </div>

    {{-- Create Patient Modal --}}
    <dialog id="createPatientModal" class="backdrop:bg-black/50 rounded-3xl shadow-2xl max-w-md w-full p-8">
        <form method="POST" action="{{ route('patients.store') }}" class="space-y-5">
            @csrf
            
            <div>
                <h2 class="text-2xl font-black text-clinical-900 mb-1">Register New Patient</h2>
                <p class="text-sm text-clinical-500">Enter patient details to add to the system</p>
            </div>

            <div class="space-y-2">
                <label class="text-xs font-black uppercase tracking-widest text-clinical-600">First Name *</label>
                <input type="text" name="first_name" required value="{{ old('first_name') }}" class="w-full px-4 py-2.5 border border-clinical-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-clinical-500 @error('first_name') border-red-500 @enderror" placeholder="John">
                @error('first_name') <span class="text-xs text-red-600">{{ $message }}</span> @enderror
            </div>

            <div class="space-y-2">
                <label class="text-xs font-black uppercase tracking-widest text-clinical-600">Last Name *</label>
                <input type="text" name="last_name" required value="{{ old('last_name') }}" class="w-full px-4 py-2.5 border border-clinical-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-clinical-500 @error('last_name') border-red-500 @enderror" placeholder="Doe">
                @error('last_name') <span class="text-xs text-red-600">{{ $message }}</span> @enderror
            </div>

            <div class="grid grid-cols-2 gap-4">
                <div class="space-y-2">
                    <label class="text-xs font-black uppercase tracking-widest text-clinical-600">Date of Birth *</label>
                    <input type="date" name="dob" required value="{{ old('dob') }}" class="w-full px-4 py-2.5 border border-clinical-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-clinical-500 @error('dob') border-red-500 @enderror">
                    @error('dob') <span class="text-xs text-red-600">{{ $message }}</span> @enderror
                </div>
                <div class="space-y-2">
                    <label class="text-xs font-black uppercase tracking-widest text-clinical-600">Gender *</label>
                    <select name="gender" required class="w-full px-4 py-2.5 border border-clinical-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-clinical-500 @error('gender') border-red-500 @enderror">
                        <option value="">Select...</option>
                        <option value="male" {{ old('gender') === 'male' ? 'selected' : '' }}>Male</option>
                        <option value="female" {{ old('gender') === 'female' ? 'selected' : '' }}>Female</option>
                        <option value="other" {{ old('gender') === 'other' ? 'selected' : '' }}>Other</option>
                    </select>
                    @error('gender') <span class="text-xs text-red-600">{{ $message }}</span> @enderror
                </div>
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
                <label class="text-xs font-black uppercase tracking-widest text-clinical-600">Care Status *</label>
                <select name="care_status" required class="w-full px-4 py-2.5 border border-clinical-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-clinical-500 @error('care_status') border-red-500 @enderror">
                    <option value="">Select Status...</option>
                    <option value="in-care" {{ old('care_status') === 'in-care' ? 'selected' : '' }}>In-Care</option>
                    <option value="critical" {{ old('care_status') === 'critical' ? 'selected' : '' }}>Critical</option>
                    <option value="recovery" {{ old('care_status') === 'recovery' ? 'selected' : '' }}>Recovery</option>
                    <option value="outpatient" {{ old('care_status') === 'outpatient' ? 'selected' : '' }}>Outpatient</option>
                </select>
                @error('care_status') <span class="text-xs text-red-600">{{ $message }}</span> @enderror
            </div>

            <div class="space-y-2">
                <label class="text-xs font-black uppercase tracking-widest text-clinical-600">Admitted At</label>
                <input type="datetime-local" name="admitted_at" value="{{ old('admitted_at') }}" class="w-full px-4 py-2.5 border border-clinical-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-clinical-500 @error('admitted_at') border-red-500 @enderror">
                @error('admitted_at') <span class="text-xs text-red-600">{{ $message }}</span> @enderror
            </div>

            <div class="flex gap-3 pt-4">
                <button type="button" onclick="document.getElementById('createPatientModal').close()" class="flex-1 px-4 py-2.5 bg-clinical-100 text-clinical-600 rounded-lg font-bold hover:bg-clinical-200 transition-all">Cancel</button>
                <button type="submit" class="flex-1 px-4 py-2.5 bg-clinical-600 text-white rounded-lg font-bold hover:bg-clinical-700 transition-all">Register Patient</button>
            </div>
        </form>
    </dialog>
</x-index-layout>
