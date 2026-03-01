<x-index-layout>
        
        <header class="flex justify-between items-center mb-10">
            <div class="flex items-center gap-6">
                <div>
                    <h1 class="text-2xl font-bold text-slate-900">Schedule</h1>
                    <p class="text-slate-500">Monday, March 2, 2026</p>
                </div>
                <div class="flex bg-white border border-slate-200 rounded-xl p-1 shadow-sm">
                    <button class="px-4 py-1.5 text-sm font-bold bg-slate-100 text-slate-900 rounded-lg">Day</button>
                    <button class="px-4 py-1.5 text-sm font-semibold text-slate-500 hover:text-slate-900 transition">Week</button>
                    <button class="px-4 py-1.5 text-sm font-semibold text-slate-500 hover:text-slate-900 transition">Month</button>
                </div>
            </div>
            
            <div class="flex items-center gap-4">
                <div class="flex -space-x-2">
                    <div class="w-8 h-8 rounded-full border-2 border-white bg-blue-100 text-[10px] flex items-center justify-center font-bold">SJ</div>
                    <div class="w-8 h-8 rounded-full border-2 border-white bg-green-100 text-[10px] flex items-center justify-center font-bold">AM</div>
                    <div class="w-8 h-8 rounded-full border-2 border-white bg-amber-100 text-[10px] flex items-center justify-center font-bold">BC</div>
                </div>
                <button class="bg-blue-600 px-6 py-2.5 rounded-xl text-white font-bold text-sm shadow-lg shadow-blue-100 hover:bg-blue-700 transition">+ New Booking</button>
            </div>
        </header>

        <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
            
            <div class="space-y-4">
                <div class="flex justify-between items-center px-2">
                    <h3 class="font-bold text-slate-400 text-xs uppercase tracking-widest">Waiting (4)</h3>
                    <span class="w-5 h-5 bg-slate-200 text-slate-600 rounded-full text-[10px] flex items-center justify-center font-bold">4</span>
                </div>
                
                <div class="bg-white p-4 rounded-2xl border-l-4 border-amber-400 shadow-sm hover:shadow-md transition cursor-pointer">
                    <p class="text-[10px] font-bold text-amber-600 uppercase mb-1">General Checkup</p>
                    <h4 class="font-bold text-slate-900 text-sm">Theresa Webb</h4>
                    <p class="text-xs text-slate-500 mt-1">Arrival: 08:45 AM</p>
                    <div class="mt-3 pt-3 border-t border-slate-50 flex items-center gap-2">
                        <div class="w-5 h-5 rounded-full bg-slate-100 flex items-center justify-center text-[8px] font-bold">DR</div>
                        <p class="text-[10px] text-slate-400 font-medium">Dr. Sarah Jenkins</p>
                    </div>
                </div>

                <div class="bg-white p-4 rounded-2xl border-l-4 border-amber-400 shadow-sm opacity-80">
                    <p class="text-[10px] font-bold text-amber-600 uppercase mb-1">Lab Results</p>
                    <h4 class="font-bold text-slate-900 text-sm">Cody Fisher</h4>
                    <p class="text-xs text-slate-500 mt-1">Arrival: 09:10 AM</p>
                </div>
            </div>

            <div class="space-y-4">
                <div class="flex justify-between items-center px-2">
                    <h3 class="font-bold text-blue-600 text-xs uppercase tracking-widest">In Progress (2)</h3>
                </div>
                
                <div class="bg-blue-600 p-4 rounded-2xl shadow-xl shadow-blue-100 ring-4 ring-blue-50">
                    <p class="text-[10px] font-bold text-blue-100 uppercase mb-1">Emergency Surgery</p>
                    <h4 class="font-bold text-white text-sm">Marvin McKinney</h4>
                    <div class="flex items-center gap-2 mt-2">
                        <span class="w-2 h-2 rounded-full bg-red-400 animate-ping"></span>
                        <p class="text-xs text-blue-100 font-medium">Theater 04 • 45m elapsed</p>
                    </div>
                </div>

                <div class="bg-white p-4 rounded-2xl border-l-4 border-blue-500 shadow-sm">
                    <p class="text-[10px] font-bold text-blue-600 uppercase mb-1">Follow-up</p>
                    <h4 class="font-bold text-slate-900 text-sm">Eleanor Pena</h4>
                    <p class="text-xs text-slate-500 mt-1">Room 202 • Dr. McCoy</p>
                </div>
            </div>

            <div class="space-y-4">
                <div class="flex justify-between items-center px-2 text-slate-400">
                    <h3 class="font-bold text-xs uppercase tracking-widest">Completed</h3>
                </div>
                
                <div class="bg-white p-4 rounded-2xl border border-slate-100 shadow-sm opacity-60">
                    <h4 class="font-bold text-slate-900 text-sm line-through">Guy Hawkins</h4>
                    <p class="text-xs text-green-600 font-bold mt-1">✓ Prescribed</p>
                </div>
            </div>

            <div class="space-y-4">
                <div class="flex justify-between items-center px-2 text-slate-400">
                    <h3 class="font-bold text-xs uppercase tracking-widest">Cancelled</h3>
                </div>
                
                <div class="bg-slate-100 p-4 rounded-2xl border border-dashed border-slate-300">
                    <h4 class="font-bold text-slate-400 text-sm italic">Kathryn Murphy</h4>
                    <p class="text-xs text-slate-400 mt-1">Cancelled via SMS</p>
                </div>
            </div>

        </div>

        <div class="mt-12 bg-white rounded-3xl p-8 border border-slate-100 shadow-sm">
            <h4 class="font-bold text-slate-900 mb-6">Staff Availability Today</h4>
            <div class="flex items-center gap-8 overflow-x-auto pb-4">
                <div class="flex flex-col items-center gap-2 min-w-[100px]">
                    <div class="w-12 h-12 rounded-xl bg-slate-100 flex items-center justify-center font-bold text-blue-600">SJ</div>
                    <p class="text-xs font-bold">Dr. Jenkins</p>
                    <span class="px-2 py-0.5 bg-red-100 text-red-600 text-[10px] font-bold rounded">Busy</span>
                </div>
                <div class="flex flex-col items-center gap-2 min-w-[100px]">
                    <div class="w-12 h-12 rounded-xl bg-slate-100 flex items-center justify-center font-bold text-blue-600">AM</div>
                    <p class="text-xs font-bold">Dr. McCoy</p>
                    <span class="px-2 py-0.5 bg-green-100 text-green-600 text-[10px] font-bold rounded">Available</span>
                </div>
                </div>
        </div>
    </main>
</div>
</x-index-layout>