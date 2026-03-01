<section class="min-h-screen flex items-center justify-center bg-slate-50 py-12 px-6">
    <div class="max-w-5xl w-full bg-white rounded-3xl shadow-2xl overflow-hidden flex flex-col md:flex-row border border-slate-100">
        
        <div class="w-full md:w-1/2 p-8 md:p-16">
            <div class="flex items-center gap-2 mb-10">
                <div class="w-8 h-8 bg-blue-600 rounded-lg flex items-center justify-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                    </svg>
                </div>
                <span class="text-xl font-bold tracking-tight text-slate-900">Hospily</span>
            </div>

            <h2 class="text-3xl font-bold text-slate-900 mb-2">Welcome Back</h2>
            <p class="text-slate-500 mb-8">Please enter your credentials to access the clinical dashboard.</p>

            <form action="{{ route('login') }}" method="POST" class="space-y-6">
                @csrf
                <div class="space-y-2">
                    <label for="email" class="text-sm font-semibold text-slate-700 ml-1">Work Email</label>
                    <div class="relative">
                        <span class="absolute inset-y-0 left-0 flex items-center pl-3 text-slate-400">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.206"></path></svg>
                        </span>
                        <input type="email" id="email" name="email" required autofocus
                            class="w-full pl-10 pr-4 py-3 rounded-xl border border-slate-200 focus:border-blue-500 focus:ring-4 focus:ring-blue-50/50 outline-none transition-all placeholder:text-slate-300"
                            placeholder="name@hospital.org">
                    </div>
                    @error('email') <span class="text-red-500 text-xs mt-1">{{ $message }}</span> @enderror
                </div>

                <div class="space-y-2">
                    <div class="flex justify-between items-center px-1">
                        <label for="password" class="text-sm font-semibold text-slate-700">Password</label>
                        <a href="#" class="text-xs font-bold text-blue-600 hover:text-blue-700">Forgot?</a>
                    </div>
                    <div class="relative">
                        <span class="absolute inset-y-0 left-0 flex items-center pl-3 text-slate-400">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path></svg>
                        </span>
                        <input type="password" id="password" name="password" required
                            class="w-full pl-10 pr-4 py-3 rounded-xl border border-slate-200 focus:border-blue-500 focus:ring-4 focus:ring-blue-50/50 outline-none transition-all placeholder:text-slate-300"
                            placeholder="••••••••">
                    </div>
                </div>

                <div class="flex items-center gap-2 px-1">
                    <input type="checkbox" id="remember" name="remember" class="w-4 h-4 text-blue-600 border-slate-300 rounded focus:ring-blue-500">
                    <label for="remember" class="text-sm text-slate-500 cursor-pointer">Keep me logged in</label>
                </div>

                <button type="submit" 
                    class="w-full bg-blue-600 hover:bg-blue-700 text-white font-bold py-4 rounded-xl shadow-lg shadow-blue-100 transition-all transform hover:-translate-y-0.5 active:scale-[0.98]">
                    Sign In
                </button>

                <p class="text-center text-sm text-slate-500 mt-8">
                    Don't have a facility account? <a href="{{ route('register') }}" class="text-blue-600 font-bold hover:underline">Register Hospital</a>
                </p>
            </form>
        </div>

        <div class="hidden md:flex md:w-1/2 bg-slate-900 p-16 flex-col justify-between relative overflow-hidden">
            <div class="absolute top-0 right-0 w-64 h-64 bg-blue-500/10 rounded-full -mr-32 -mt-32 blur-3xl"></div>
            <div class="absolute bottom-0 left-0 w-64 h-64 bg-blue-600/10 rounded-full -ml-32 -mb-32 blur-3xl"></div>

            <div class="relative z-10">
                <div class="inline-block px-4 py-1 rounded-full bg-blue-500/20 text-blue-300 text-xs font-bold uppercase tracking-widest mb-6">
                    Hospily Cloud v3.0
                </div>
                <h3 class="text-4xl font-bold text-white leading-tight mb-6">Securing the world's most critical data.</h3>
                <p class="text-slate-400 text-lg">"Hospily has reduced our patient intake time by 60% since implementation."</p>
                <div class="mt-4 flex items-center gap-3">
                    <div class="w-10 h-10 rounded-full bg-slate-700 border border-slate-600"></div>
                    <div>
                        <p class="text-white text-sm font-bold">Dr. Sarah Jenkins</p>
                        <p class="text-slate-500 text-xs">Chief of Staff, Global Health NYC</p>
                    </div>
                </div>
            </div>

            <div class="relative z-10 flex gap-6 mt-12">
                <div class="bg-slate-800/50 backdrop-blur-sm p-4 rounded-2xl border border-white/5 flex-1">
                    <p class="text-2xl font-bold text-white">99.9%</p>
                    <p class="text-xs text-slate-500 uppercase font-bold tracking-tighter">System Uptime</p>
                </div>
                <div class="bg-slate-800/50 backdrop-blur-sm p-4 rounded-2xl border border-white/5 flex-1">
                    <p class="text-2xl font-bold text-white">256-bit</p>
                    <p class="text-xs text-slate-500 uppercase font-bold tracking-tighter">Encryption</p>
                </div>
            </div>
        </div>
    </div>
</section>