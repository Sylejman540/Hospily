<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Hospily' }} | Professional Hospital Management</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        clinical: {
                            50: '#F8FAFC',
                            100: '#F1F5F9',
                            200: '#E2E8F0',
                            300: '#CBD5E1',
                            400: '#94A3B8',
                            500: '#64748B',
                            600: '#3B82F6', // Medical Blue
                            700: '#2563EB',
                            800: '#1E40AF',
                            900: '#1E293B',
                        }
                    },
                    borderRadius: {
                        'clinical': '0.75rem',
                    }
                }
            }
        }
    </script>
</head>
<body class="font-sans antialiased text-clinical-900 bg-white">
    <!-- Navigation -->
    <nav class="fixed top-0 w-full z-50 bg-white/80 backdrop-blur-md border-b border-clinical-100 transition-all duration-300">
        <div class="max-w-7xl mx-auto px-6 lg:px-8">
            <div class="flex justify-between h-20 items-center">
                <div class="flex items-center gap-3">
                    <div class="w-10 h-10 bg-clinical-600 rounded-clinical flex items-center justify-center shadow-sm">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" /></svg>
                    </div>
                    <span class="text-2xl font-bold tracking-tight text-clinical-900">Hospily</span>
                </div>
                
                <div class="hidden md:flex items-center gap-10">
                    <a href="#features" class="text-sm font-medium text-clinical-600 hover:text-clinical-900 transition">Features</a>
                    <a href="#solutions" class="text-sm font-medium text-clinical-600 hover:text-clinical-900 transition">Solutions</a>
                    <a href="#security" class="text-sm font-medium text-clinical-600 hover:text-clinical-900 transition">Security</a>
                    <a href="#pricing" class="text-sm font-medium text-clinical-600 hover:text-clinical-900 transition">Pricing</a>
                </div>

                <div class="flex items-center gap-4">
                    @guest
                        <a href="/login" class="text-sm font-semibold text-clinical-900 px-4 py-2 hover:bg-clinical-50 rounded-clinical transition">Log in</a>
                        <a href="/register" class="bg-clinical-600 text-white px-5 py-2.5 rounded-clinical text-sm font-semibold hover:bg-clinical-700 shadow-sm shadow-clinical-200 transition">Start Free Trial</a>
                    @else
                        <a href="/dashboard" class="bg-clinical-600 text-white px-5 py-2.5 rounded-clinical text-sm font-semibold hover:bg-clinical-700 transition">Go to Dashboard</a>
                    @endguest
                </div>
            </div>
        </div>
    </nav>

    <main class="pt-20">
        {{ $slot }}
    </main>

    <!-- Footer -->
    <footer class="bg-clinical-900 text-clinical-100 py-24">
        <div class="max-w-7xl mx-auto px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-16">
                <div class="col-span-1 md:col-span-2">
                    <div class="flex items-center gap-3 mb-8 text-white">
                        <div class="w-8 h-8 bg-clinical-600 rounded-md flex items-center justify-center">
                            <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" /></svg>
                        </div>
                        <span class="text-xl font-bold tracking-tight">Hospily</span>
                    </div>
                    <p class="text-clinical-300 max-w-sm text-lg leading-relaxed mb-10">
                        The future of clinic management. Secure, compliant, and designed for clinical excellence.
                    </p>
                    <div class="flex gap-4">
                        <a href="#" class="w-10 h-10 rounded-clinical bg-clinical-800 flex items-center justify-center hover:bg-clinical-700 transition"><svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M24 4.557c-.883.392-1.832.656-2.828.775 1.017-.609 1.798-1.574 2.165-2.724-.951.564-2.005.974-3.127 1.195-.897-.957-2.178-1.555-3.594-1.555-3.179 0-5.515 2.966-4.797 6.045-4.091-.205-7.719-2.165-10.148-5.144-1.29 2.213-.669 5.108 1.523 6.574-.806-.026-1.566-.247-2.229-.616-.054 2.281 1.581 4.415 3.949 4.89-.693.188-1.452.232-2.224.084.626 1.956 2.444 3.379 4.6 3.419-2.07 1.623-4.678 2.348-7.29 2.04 2.179 1.397 4.768 2.212 7.548 2.212 9.142 0 14.307-7.721 13.995-14.646.962-.695 1.797-1.562 2.457-2.549z"/></svg></a>
                        <a href="#" class="w-10 h-10 rounded-clinical bg-clinical-800 flex items-center justify-center hover:bg-clinical-700 transition"><svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 1.17.054 1.805.249 2.227.412.56.216.96.474 1.38.894.42.42.678.82.894 1.38.163.422.358 1.057.412 2.227.058 1.266.07 1.646.07 4.85s-.012 3.584-.07 4.85c-.054 1.17-.249 1.805-.412 2.227-.216.56-.474.96-.894 1.38-.42.42-.82.678-1.38.894-.422.163-1.057.358-2.227.412-1.266.058-1.646.07-4.85.07s-3.584-.012-4.85-.07c-1.17-.054-1.805-.249-2.227-.412-.56-.216-.96-.474-1.38-.894-.42-.42-.678-.82-.894-1.38-.163-.422-.358-1.057-.412-2.227-.058-1.266-.07-1.646-.07-4.85s.012-3.584.07-4.85c.054-1.17.249-1.805.412-2.227.216-.56.474-.96.894-1.38.42-.42.82-.678 1.38-.894.422-.163 1.057-.358 2.227-.412 1.266-.058 1.646-.07 4.85-.07m0-2.163c-3.259 0-3.667.014-4.947.072-1.277.057-2.15.26-2.914.557-.79.307-1.459.717-2.126 1.384-.667.667-1.077 1.336-1.384 2.126-.297.763-.5 1.637-.557 2.914-.058 1.28-.072 1.688-.072 4.947s.014 3.667.072 4.947c.057 1.277.26 2.15.557 2.914.307.79.717 1.459 1.384 2.126.667.667 1.336 1.077 2.126 1.384.763.297 1.637.5 2.914.557 1.28.058 1.688.072 4.947.072s3.667-.014 4.947-.072c1.277-.057 2.15-.26 2.914-.557.79-.307 1.459-.717 2.126-1.384.667-.667 1.077-1.336 1.384-2.126.297-.763.5-1.637.557-2.914.058-1.28.072-1.688.072-4.947s-.014-3.667-.072-4.947c-.057-1.277-.26-2.15-.557-2.914-.307-.79-.717-1.459-1.384-2.126-.667-.667-1.336-1.077-2.126-1.384-.763-.297-1.637-.5-2.914-.557-1.28-.058-1.688-.072-4.947-.072z"/><path d="M12 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.162 6.162 6.162 6.162-2.759 6.162-6.162-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.791-4-4s1.791-4 4-4 4 1.791 4 4-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/></svg></a>
                    </div>
                </div>
                <div>
                    <h4 class="text-white font-bold mb-6 text-sm uppercase tracking-widest">Platform</h4>
                    <ul class="space-y-4 text-clinical-400">
                        <li><a href="#" class="hover:text-white transition">Shared EHR</a></li>
                        <li><a href="#" class="hover:text-white transition">Patient Portal</a></li>
                        <li><a href="#" class="hover:text-white transition">Clinical Analytics</a></li>
                        <li><a href="#" class="hover:text-white transition">Pharmacy API</a></li>
                    </ul>
                </div>
                <div>
                    <h4 class="text-white font-bold mb-6 text-sm uppercase tracking-widest">Company</h4>
                    <ul class="space-y-4 text-clinical-400">
                        <li><a href="#" class="hover:text-white transition">Terms of Service</a></li>
                        <li><a href="#" class="hover:text-white transition">Privacy Policy</a></li>
                        <li><a href="#" class="hover:text-white transition">Security Compliance</a></li>
                        <li><a href="#" class="hover:text-white transition">Contact Us</a></li>
                    </ul>
                </div>
            </div>
            <div class="mt-20 pt-8 border-t border-clinical-800 flex flex-col md:flex-row justify-between items-center gap-6">
                <p class="text-sm text-clinical-500">&copy; 2026 Hospily International Inc. All rights reserved.</p>
                <div class="flex items-center gap-6 text-sm text-clinical-500">
                    <span class="flex items-center gap-2"><div class="w-2 h-2 rounded-full bg-emerald-500"></div> All Systems Operational</span>
                </div>
            </div>
        </div>
    </footer>
</body>
</html>
