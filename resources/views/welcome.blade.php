<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('/css/app.css') }}">

        <style>
            body {
                font-family: 'Nunito';
            }
        </style>
    </head>
    <body class="antialiased">

        <div class="fixed bg-white shadow-md w-full">
            <div class="flex z-10 top-0 left-0 w-full max-w-6xl mx-auto justify-between">
                <img class="w-16 object-contain" src="{{ asset('/images/logo.png') }}" alt="Logo BWI" />
                @if (Route::has('login'))
                    <div class="px-4 sm:px-0 py-6 sm:block font-semibold">
                        @auth
                            <a href="{{ url('/dashboard') }}" class="text-sm text-gray-700 underline">Dashboard</a>
                        @else
                            <a href="{{ route('login') }}" class="text-sm text-gray-700 underline">Login</a>

                            @if (Route::has('register'))
                                <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 underline">Register</a>
                            @endif
                        @endauth
                    </div>
                @endif
            </div>
        </div>

        <div class="flex flex-col bg-gradient-to-b from-white to-gray-100 px-4 sm:px-0 text-center justify-center h-screen">
            <div class="max-w-4xl mx-auto">
                <h6 class="text-lg text-gray-500">
                    Selamat datang di BWI App Store
                </h6>
                <h1 class="text-5xl mt-8 font-semibold">
                    Buat aplikasi online shop Anda sendiri.
                </h1>
                <h6 class="text-lg mt-8 sm:mt-4">
                    Cocok untuk UMKM, pengusaha kecil, ataupun pengusaha besar yang ingin memperluas jaringan penjualannya.
                </h6>
            </div>
        </div>

        <div class="max-w-6xl mx-auto px-4 lg:px-0 py-12 -my-16 mb-8">
            <div class="grid grid-cols-4 grid-flow-row gap-8">
    
                <div class="col-span-4 sm:col-span-2 lg:col-span-1 bg-white shadow-xl border flex flex-col items-center rounded-lg p-5">
                    <h5 class="font-semibold text-xl">Paket Perintis</h5>
                    <p class="mt-1">Rp 500.000,-</p>
                    <p class="mt-4">12 Produk</p>
                    <p>✓ 1 Aplikasi</p>
                    <p>✓ Rilis Google Play</p>
                    <p>✓ Integrasi WhatsApp</p>
                </div>
    
                <div class="col-span-4 sm:col-span-2 lg:col-span-1 bg-white shadow-xl border flex flex-col items-center rounded-lg p-5">
                    <h5 class="font-semibold text-xl">Paket UMKM</h5>
                    <p class="mt-1">Rp 900.000,-</p>
                    <p class="mt-4">24 Produk</p>
                    <p>✓ 1 Aplikasi</p>
                    <p>✓ Rilis Google Play</p>
                    <p>✓ Integrasi WhatsApp</p>
                </div>
    
                <div class="col-span-4 sm:col-span-2 lg:col-span-1 bg-white shadow-xl border flex flex-col items-center rounded-lg p-5">
                    <h5 class="font-semibold text-xl">Paket Berkembang</h5>
                    <p class="mt-1">Rp 2.500.000,-</p>
                    <p class="mt-4">52 Produk</p>
                    <p>✓ 1 Aplikasi</p>
                    <p>✓ Blog</p>
                    <p>✓ Integrasi Pembayaran</p>
                    <p>✓ Self-manage</p>
                    <p>✓ Rilis Google Play</p>
                    <p>✓ Integrasi WhatsApp</p>
                </div>
    
                <div class="col-span-4 sm:col-span-2 lg:col-span-1 bg-white shadow-xl border flex flex-col items-center rounded-lg p-5">
                    <h5 class="font-semibold text-xl">Paket Pengusaha</h5>
                    <p class="mt-1">Rp 13.500.000,-</p>
                    <p class="mt-4">∞ Produk</p>
                    <p>✓ 1 Aplikasi</p>
                    <p>✓ Blog</p>
                    <p>✓ Integrasi Pembayaran</p>
                    <p>✓ Self-manage</p>
                    <p>✓ Rilis Google Play</p>
                    <p>✓ Integrasi WhatsApp</p>
                    <p class="mt-4 font-semibold">+4 Fitur Lainnya</p>
                </div>
                
            </div>
        </div>

        <div class="py-12 bg-gradient-to-br from-blue-400 to-blue-600 text-white">
            <div class="max-w-6xl mx-auto grid grid-cols-3">

                <div class="text-center">
                    <h3 class="text-3xl font-semibold">
                        10
                    </h3>
                    <p class="mt-2">
                        User Terdaftar
                    </p>
                </div>

                <div class="text-center">
                    <h3 class="text-3xl font-semibold">
                        4
                    </h3>
                    <p class="mt-2">
                        Toko Terdaftar
                    </p>
                </div>

                <div class="text-center">
                    <h3 class="text-3xl font-semibold">
                        47
                    </h3>
                    <p class="mt-2">
                        Produk Terdaftar
                    </p>
                </div>
                
            </div>
        </div>
    </body>
</html>
