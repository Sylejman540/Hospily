<x-layouts.auth title="Login">
    <div class="space-y-6">
        <div>
            <h3 class="text-xl font-bold text-clinical-900">Sign in to your facility</h3>
            <p class="text-sm text-clinical-500 mt-1">Enter your credentials to access the clinical dashboard.</p>
        </div>

        <form action="/login" method="POST" class="space-y-5">
            @csrf
            <div>
                <label for="email" class="block text-xs font-bold text-clinical-500 uppercase tracking-widest mb-2">Work Email</label>
                <input type="email" name="email" id="email" required 
                    class="block w-full px-4 py-3 rounded-clinical bg-clinical-50 border border-clinical-200 text-clinical-900 placeholder-clinical-400 focus:outline-none focus:ring-2 focus:ring-clinical-500 focus:border-transparent transition-all"
                    placeholder="name@hospital.io">
                @error('email')
                    <p class="mt-2 text-xs text-red-600 font-medium">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <div class="flex justify-between items-center mb-2">
                    <label for="password" class="block text-xs font-bold text-clinical-500 uppercase tracking-widest">Password</label>
                    <a href="#" class="text-xs font-bold text-clinical-600 hover:text-clinical-500">Forgot?</a>
                </div>
                <input type="password" name="password" id="password" required 
                    class="block w-full px-4 py-3 rounded-clinical bg-clinical-50 border border-clinical-200 text-clinical-900 placeholder-clinical-400 focus:outline-none focus:ring-2 focus:ring-clinical-500 focus:border-transparent transition-all"
                    placeholder="••••••••">
                @error('password')
                    <p class="mt-2 text-xs text-red-600 font-medium">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex items-center">
                <input id="remember-me" name="remember-me" type="checkbox" class="h-4 w-4 text-clinical-600 focus:ring-clinical-500 border-clinical-300 rounded-clinical">
                <label for="remember-me" class="ml-2 block text-sm text-clinical-600 font-medium cursor-pointer">
                    Remember this session
                </label>
            </div>

            <button type="submit" class="w-full flex justify-center py-4 px-4 border border-transparent rounded-clinical shadow-lg text-sm font-bold text-white bg-clinical-600 hover:bg-clinical-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-clinical-500 transition-all font-bold">
                Authorize Access
            </button>
        </form>

        <div class="pt-6 border-t border-clinical-100 mt-6 text-center">
            <p class="text-sm text-clinical-500 font-medium">
                Not registered yet? 
                <a href="/register" class="text-clinical-600 font-bold hover:text-clinical-500">Create global account</a>
            </p>
        </div>
    </div>
</x-layouts.auth>