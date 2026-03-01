<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title }}</title>
    <script src="https://cdn.tailwindcss.com"></script>
        <style>
        body { font-family: 'Inter', sans-serif; }
        .nav-blur { backdrop-filter: blur(8px); background-color: rgba(255, 255, 255, 0.8); }
        .hero-gradient { background: linear-gradient(rgba(0,0,0,0.4), rgba(0,0,0,0.4)), url('https://images.unsplash.com/photo-1519494026892-80bbd2d6fd0d?auto=format&fit=crop&q=80&w=2000'); background-size: cover; background-position: center; }
        .nav-link::after { content: ''; position: absolute; width: 0; height: 2px; bottom: -4px; left: 0; background-color: white; transition: width 0.3s ease; }
        .nav-link:hover::after { width: 100%; }
        .problem-card:hover { background-color: #2563eb; color: white; transition: all 0.3s ease; }
    </style>
</head>
<body>
    <header>
    <nav id="navbar" class="fixed w-full z-50 transition-all duration-300 py-4 px-6 md:px-8 flex items-center justify-between text-white">
        <div class="flex items-center gap-2 z-50">
            <div class="w-10 h-10 bg-blue-600 rounded-lg flex items-center justify-center shadow-lg">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                </svg>
            </div>
            <span class="text-2xl font-bold tracking-tight">Hospily</span>
        </div>

        <div class="hidden md:flex gap-8 font-medium">
            <a href="#" class="relative nav-link">Home</a>
            <a href="#features" class="relative nav-link">Features</a>
            <a href="#solutions" class="relative nav-link">Solutions</a>
            <a href="#pricing" class="relative nav-link">Pricing</a>
            <a href="#contact" class="relative nav-link">Contact</a>
        </div>

        <div class="hidden md:flex items-center gap-4">
            @guest
            <a href="/login">
                <button class="hover:text-blue-200 transition">Login</button>
            </a>
            <a href="/register">
                <button class="bg-white text-blue-600 px-5 py-2 rounded-full font-semibold hover:bg-blue-50 transition">Register</button>
            </a>
            @endguest
            @auth
            <a href="/logout">
                <button class="hover:text-blue-200 transition">Logout</button>
            </a>
            @endauth
        </div>

        <label for="menu-toggle" class="cursor-pointer md:hidden block z-50">
            <input type="checkbox" id="menu-toggle" class="hidden peer">
            <svg class="h-8 w-8 text-current peer-checked:hidden" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7" />
            </svg>
            <svg class="h-8 w-8 text-current hidden peer-checked:block" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
            </svg>

            <div class="fixed inset-0 bg-slate-900 translate-x-full peer-checked:translate-x-0 transition-transform duration-300 ease-in-out md:hidden flex flex-col items-center justify-center gap-8 text-xl font-semibold z-40">
                <a href="#" class="hover:text-blue-400">Home</a>
                <a href="#features" class="hover:text-blue-400">Features</a>
                <a href="#solutions" class="hover:text-blue-400">Solutions</a>
                <a href="#pricing" class="hover:text-blue-400">Pricing</a>
                <a href="#contact" class="hover:text-blue-400">Contact</a>
                <hr class="w-1/2 border-white/10">
                @guest
                <a href="/login">
                <button class="w-2/3 py-3 border border-white/20 rounded-xl">Login</button>
                </a>
                <a href="/register">
                <button class="w-2/3 py-3 bg-blue-600 rounded-xl">Register</button>
                </a>
                @endguest
                @auth
                <a href="/logout">
                <button class="w-2/3 py-3 border border-white/20 rounded-xl">Logout</button>
                </a>
                @endauth
            </div>
        </label>
    </nav>
    </header>

    <main>
        {{ $slot }}
    </main>
    
    <footer id="contact" class="bg-slate-900 text-slate-400 py-20 px-8 border-t border-slate-800">
        <div class="max-w-7xl mx-auto grid md:grid-cols-4 gap-12">
            <div class="col-span-2">
                <div class="flex items-center gap-2 text-white mb-6">
                    <div class="w-8 h-8 bg-blue-600 rounded-md flex items-center justify-center">
                        <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" /></svg>
                    </div>
                    <span class="text-xl font-bold">Hospily</span>
                </div>
                <p class="max-w-xs mb-8">World-class hospital management for the modern era. Scalable, secure, and patient-first.</p>
                <div class="flex gap-4">
                    <div class="w-8 h-8 rounded-full bg-slate-800 hover:bg-blue-600 transition cursor-pointer"></div>
                    <div class="w-8 h-8 rounded-full bg-slate-800 hover:bg-blue-600 transition cursor-pointer"></div>
                    <div class="w-8 h-8 rounded-full bg-slate-800 hover:bg-blue-600 transition cursor-pointer"></div>
                </div>
            </div>
            <div>
                <h4 class="text-white font-bold mb-6 uppercase tracking-widest text-sm">Quick Links</h4>
                <ul class="space-y-4">
                    <li><a href="#" class="hover:text-white transition">About Us</a></li>
                    <li><a href="#" class="hover:text-white transition">Careers</a></li>
                    <li><a href="#" class="hover:text-white transition">Case Studies</a></li>
                    <li><a href="#" class="hover:text-white transition">API Docs</a></li>
                </ul>
            </div>
            <div>
                <h4 class="text-white font-bold mb-6 uppercase tracking-widest text-sm">Contact</h4>
                <ul class="space-y-4">
                    <li>support@hospily.io</li>
                    <li>+1 (800) HOSPILY</li>
                    <li>San Francisco, CA</li>
                </ul>
            </div>
        </div>
        <div class="max-w-7xl mx-auto border-t border-slate-800 mt-20 pt-8 text-xs text-center">
            &copy; 2024 Hospily International Inc. All rights reserved.
        </div>
    </footer>

        <script>
        window.addEventListener('scroll', function() {
            const nav = document.getElementById('navbar');
            if (window.scrollY > 50) {
                nav.classList.add('nav-blur', 'text-slate-900', 'shadow-md');
                nav.classList.remove('text-white');
            } else {
                nav.classList.remove('nav-blur', 'text-slate-900', 'shadow-md');
                nav.classList.add('text-white');
            }
        });
    </script>
</body>
</html>