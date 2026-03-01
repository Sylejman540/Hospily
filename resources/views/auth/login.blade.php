<x-layout title="Login | Hospily">
<section class="min-h-screen flex items-center justify-center bg-slate-50 py-12 px-6">
    <div class="max-w-6xl w-full bg-white rounded-3xl shadow-2xl overflow-hidden flex flex-col md:flex-row border border-slate-100 min-h-[700px]">
        
        <div class="w-full md:w-1/2 p-8 md:p-16 flex flex-col justify-center">
            <div class="flex items-center gap-2 mb-10">
                <div class="w-10 h-10 bg-blue-600 rounded-lg flex items-center justify-center shadow-lg">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                    </svg>
                </div>
                <span class="text-2xl font-bold tracking-tight text-slate-900">Hospily</span>
            </div>

            <div class="mb-8">
                <h2 class="text-3xl font-bold text-slate-900 mb-2">Welcome Back</h2>
                <p class="text-slate-500">Access your hospital management portal.</p>
            </div>

            <form action="/login" method="POST" class="space-y-5">
                @csrf
                
                <div class="flex flex-col gap-2">
                    <label for="email" class="text-sm font-semibold text-slate-700 ml-1">Work Email</label>
                    <input type="email" id="email" name="email" value="{{ old('email') }}" required autofocus
                        class="px-4 py-3 rounded-xl border border-slate-200 focus:border-blue-500 focus:ring-4 focus:ring-blue-50 outline-none transition-all placeholder:text-slate-300"
                        placeholder="doctor@hospily.io">
                    @error('email') <span class="text-red-500 text-xs mt-1">{{ $message }}</span> @enderror
                </div>

                <div class="flex flex-col gap-2">
                    <div class="flex justify-between items-center px-1">
                        <label for="password" class="text-sm font-semibold text-slate-700">Password</label>
                        <a href="#" class="text-xs font-bold text-blue-600 hover:text-blue-700">Forgot Password?</a>
                    </div>
                    <input type="password" id="password" name="password" required
                        class="px-4 py-3 rounded-xl border border-slate-200 focus:border-blue-500 focus:ring-4 focus:ring-blue-50 outline-none transition-all placeholder:text-slate-300"
                        placeholder="••••••••">
                </div>

                <div class="flex items-center gap-2 py-2">
                    <input type="checkbox" id="remember" name="remember" class="w-4 h-4 text-blue-600 border-slate-300 rounded focus:ring-blue-500 cursor-pointer">
                    <label for="remember" class="text-sm text-slate-500 cursor-pointer">Keep me logged in for 30 days</label>
                </div>

                <button type="submit" 
                    class="w-full bg-blue-600 hover:bg-blue-700 text-white font-bold py-4 rounded-xl shadow-lg shadow-blue-100 transition-all transform hover:-translate-y-1 active:scale-[0.98] mt-4">
                    Sign Into Dashboard
                </button>

                <p class="text-center text-sm text-slate-500 mt-8">
                    New to the platform? <a href="/register" class="text-blue-600 font-bold hover:underline">Register your facility</a>
                </p>
            </form>
        </div>

        <div class="hidden md:flex md:w-1/2 bg-slate-900 p-16 flex-col justify-between relative overflow-hidden">
            <div class="absolute top-0 right-0 w-80 h-80 bg-blue-500/10 rounded-full -mr-40 -mt-40 blur-3xl"></div>
            <div class="absolute bottom-0 left-0 w-80 h-80 bg-blue-600/10 rounded-full -ml-40 -mb-40 blur-3xl"></div>

            <div class="relative z-10">
                <div class="inline-block px-4 py-1 rounded-full bg-blue-500/20 text-blue-300 text-xs font-bold uppercase tracking-widest mb-8 border border-blue-500/30">
                    Trusted Globally
                </div>
                <h3 class="text-4xl lg:text-5xl font-bold text-white leading-tight mb-8">Streamlining Healthcare Excellence.</h3>
                
                <div class="space-y-6">
                    <div class="flex items-start gap-4">
                        <div class="w-6 h-6 rounded-full bg-blue-500/20 flex items-center justify-center mt-1">
                            <svg class="w-3 h-3 text-blue-400" fill="currentColor" viewBox="0 0 20 20"><path d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"></path></svg>
                        </div>
                        <p class="text-slate-300 text-lg">Real-time patient monitoring and analytics.</p>
                    </div>
                    <div class="flex items-start gap-4">
                        <div class="w-6 h-6 rounded-full bg-blue-500/20 flex items-center justify-center mt-1">
                            <svg class="w-3 h-3 text-blue-400" fill="currentColor" viewBox="0 0 20 20"><path d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"></path></svg>
                        </div>
                        <p class="text-slate-300 text-lg">Automated HIPAA-compliant workflows.</p>
                    </div>
                </div>
            </div>

            <div class="relative z-10 pt-12 border-t border-slate-800 flex items-center gap-8 opacity-40 grayscale hover:opacity-100 transition-opacity">
                <img src="https://upload.wikimedia.org/wikipedia/commons/5/5d/HIPAA_Logo.svg" alt="HIPAA" class="h-6 invert">
                <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/e/e0/GDPR_logo.svg/1200px-GDPR_logo.svg.png" alt="GDPR" class="h-6 invert">
            </div>
        </div>
    </div>
</section>
</x-layout>