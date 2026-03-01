<x-layout title="Register | Hospily">
    <section id="contact-form" class="py-24 bg-white px-6">
    <div class="max-w-4xl mx-auto">
        <div class="text-center mb-12">
            <h2 class="text-3xl md:text-4xl font-bold text-slate-900 mb-4">Start Your Digital Transformation</h2>
            <p class="text-slate-500 max-w-xl mx-auto">Join 500+ international hospitals using Hospily to provide world-class patient care. Fill out the form below and our team will reach out within 24 hours.</p>
        </div>

        <div class="bg-white rounded-3xl shadow-2xl border border-slate-100 p-8 md:p-12">
            <form action="#" method="POST" class="grid grid-cols-1 md:grid-cols-2 gap-6">
                
                <div class="flex flex-col gap-2">
                    <label for="name" class="text-sm font-semibold text-slate-700 ml-1">Full Name</label>
                    <input type="text" id="name" name="name" placeholder="Dr. Julian Reed" required
                        class="px-4 py-3 rounded-xl border border-slate-200 focus:border-blue-500 focus:ring-2 focus:ring-blue-200 outline-none transition-all placeholder:text-slate-300">
                </div>

                <div class="flex flex-col gap-2">
                    <label for="email" class="text-sm font-semibold text-slate-700 ml-1">Work Email</label>
                    <input type="email" id="email" name="email" placeholder="julian@hospital-city.org" required
                        class="px-4 py-3 rounded-xl border border-slate-200 focus:border-blue-500 focus:ring-2 focus:ring-blue-200 outline-none transition-all placeholder:text-slate-300">
                </div>

                <div class="flex flex-col gap-2">
                    <label for="password" class="text-sm font-semibold text-slate-700 ml-1">Password</label>
                    <input type="password" id="password" name="password" placeholder="Password"
                        class="px-4 py-3 rounded-xl border border-slate-200 focus:border-blue-500 focus:ring-2 focus:ring-blue-200 outline-none transition-all placeholder:text-slate-300">
                </div>

                <div class="flex flex-col gap-2">
                    <label for="hospital" class="text-sm font-semibold text-slate-700 ml-1">Medical Facility Name</label>
                    <input type="text" id="hospital" name="hospital" placeholder="St. Mary's General"
                        class="px-4 py-3 rounded-xl border border-slate-200 focus:border-blue-500 focus:ring-2 focus:ring-blue-200 outline-none transition-all placeholder:text-slate-300">
                </div>

                <div class="md:col-span-2 flex items-start gap-3 py-2">
                    <input type="checkbox" id="terms" name="terms" required
                        class="mt-1 w-4 h-4 text-blue-600 border-slate-300 rounded focus:ring-blue-500 cursor-pointer">
                    <label for="terms" class="text-xs text-slate-500 leading-relaxed">
                        By submitting this form, you agree to Hospily's <a href="#" class="text-blue-600 underline">Privacy Policy</a> and <a href="#" class="text-blue-600 underline">Terms of Service</a>. We will only use your data to manage your request and provide system updates.
                    </label>
                </div>

                <div class="md:col-span-2 mt-4">
                    <button type="submit" 
                        class="w-full bg-blue-600 hover:bg-blue-700 text-white font-bold py-4 rounded-xl shadow-lg shadow-blue-200 transition-all transform hover:-translate-y-1 active:scale-[0.98]">
                        Confirm Demo Request
                    </button>
                </div>
            </form>
        </div>
    </div>
</section>
</x-layout>