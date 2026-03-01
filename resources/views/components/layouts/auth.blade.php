<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Hospily' }} | Authentication</title>
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
<body class="font-sans antialiased text-clinical-900 bg-clinical-50">
    <div class="min-h-screen flex flex-col justify-center py-12 sm:px-6 lg:px-8">
        <div class="sm:mx-auto sm:w-full sm:max-w-md">
            <div class="flex justify-center flex-col items-center gap-4">
                <a href="/" class="w-12 h-12 bg-clinical-600 rounded-clinical flex items-center justify-center shadow-lg transform hover:scale-105 transition-all">
                    <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" /></svg>
                </a>
                <h2 class="text-center text-3xl font-extrabold text-clinical-900 tracking-tight">
                    Hospily
                </h2>
            </div>
        </div>

        <div class="mt-8 sm:mx-auto sm:w-full sm:max-w-md">
            <div class="bg-white py-10 px-6 shadow-xl shadow-clinical-200/50 sm:rounded-clinical sm:px-12 border border-clinical-100">
                {{ $slot }}
            </div>

            <p class="mt-8 text-center text-sm text-clinical-500">
                Secure 256-bit encrypted session. 
                <a href="#" class="font-medium text-clinical-600 hover:text-clinical-500 underline decoration-clinical-200 underline-offset-4">
                    Security Policy
                </a>
            </p>
        </div>
    </div>
</body>
</html>
