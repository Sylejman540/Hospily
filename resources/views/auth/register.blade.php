<x-layouts.auth title="Register">
    <div class="space-y-6">
        <div>
            <h3 class="text-xl font-bold text-clinical-900">Provision your facility</h3>
            <p class="text-sm text-clinical-500 mt-1">Join the network of modern medical institutions.</p>
        </div>

        <form action="/register" method="POST" class="space-y-5">
            @csrf
            <div>
                <label for="name" class="block text-xs font-bold text-clinical-500 uppercase tracking-widest mb-2">Director Name</label>
                <input type="text" name="name" id="name" required 
                    class="block w-full px-4 py-3 rounded-clinical bg-clinical-50 border border-clinical-200 text-clinical-900 placeholder-clinical-400 focus:outline-none focus:ring-2 focus:ring-clinical-500 focus:border-transparent transition-all"
                    placeholder="Dr. Sarah Jenkins">
                @error('name')
                    <p class="mt-2 text-xs text-red-600 font-medium">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="email" class="block text-xs font-bold text-clinical-500 uppercase tracking-widest mb-2">Work Email</label>
                <input type="email" name="email" id="email" required 
                    class="block w-full px-4 py-3 rounded-clinical bg-clinical-50 border border-clinical-200 text-clinical-900 placeholder-clinical-400 focus:outline-none focus:ring-2 focus:ring-clinical-500 focus:border-transparent transition-all"
                    placeholder="director@facility.io">
                @error('email')
                    <p class="mt-2 text-xs text-red-600 font-medium">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="facility_name" class="block text-xs font-bold text-clinical-500 uppercase tracking-widest mb-2">Facility Name</label>
                <input type="text" name="facility_name" id="facility_name" required 
                    class="block w-full px-4 py-3 rounded-clinical bg-clinical-50 border border-clinical-200 text-clinical-900 placeholder-clinical-400 focus:outline-none focus:ring-2 focus:ring-clinical-500 focus:border-transparent transition-all"
                    placeholder="St. Mary's General Hospital">
                @error('facility_name')
                    <p class="mt-2 text-xs text-red-600 font-medium">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="password" class="block text-xs font-bold text-clinical-500 uppercase tracking-widest mb-2">Secure Password</label>
                <input type="password" name="password" id="password" required 
                    class="block w-full px-4 py-3 rounded-clinical bg-clinical-50 border border-clinical-200 text-clinical-900 placeholder-clinical-400 focus:outline-none focus:ring-2 focus:ring-clinical-500 focus:border-transparent transition-all"
                    placeholder="Min. 8 chars, numbers & symbols">
                @error('password')
                    <p class="mt-2 text-xs text-red-600 font-medium">{{ $message }}</p>
                @enderror
            </div>

            <button type="submit" class="w-full flex justify-center py-4 px-4 border border-transparent rounded-clinical shadow-lg text-sm font-bold text-white bg-clinical-600 hover:bg-clinical-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-clinical-500 transition-all font-bold">
                Deploy Facility Node
            </button>
        </form>

        <div class="pt-6 border-t border-clinical-100 mt-6 text-center">
            <p class="text-sm text-clinical-500 font-medium">
                Already have an account? 
                <a href="/login" class="text-clinical-600 font-bold hover:text-clinical-500">Sign in to facility</a>
            </p>
        </div>
    </div>
</x-layouts.auth>