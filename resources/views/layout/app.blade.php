<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name', 'Raoz') }} - @yield('title')</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <script type="module" src="https://cdn.jsdelivr.net/gh/domyid/tracker@main/index.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
</head>
<body class="font-sans bg-gray-50">
    <header class="bg-white shadow-md sticky top-0 z-50">
        <div class="container mx-auto px-4 py-3">
            <div class="flex items-center justify-between">
                <div class="flex items-center">
                    <a href="{{ route('landing') }}" class="text-2xl font-bold text-orange-600">Raoz <span class="text-green-600">Kitchen</span></a>
                </div>
                
                <!-- Desktop Navigation -->
                <nav class="hidden md:flex space-x-8">
                    <a href="{{ route('landing') }}" class="text-gray-700 hover:text-orange-600 font-medium">Beranda</a>
                    <a href="{{ route('menu.index') }}" class="text-gray-700 hover:text-orange-600 font-medium">Menu</a>
                    <a href="{{ route('about') }}" class="text-gray-700 hover:text-orange-600 font-medium">Tentang Kami</a>
                </nav>
                
                <!-- Mobile Menu Button -->
                <div class="md:hidden">
                    <button id="mobile-menu-button" class="text-gray-700 focus:outline-none">
                        <i class="fas fa-bars text-2xl"></i>
                    </button>
                </div>
            </div>
            
            <!-- Mobile Navigation Menu (Hidden by default) -->
            <div id="mobile-menu" class="md:hidden hidden mt-3 border-t pt-3">
                <nav class="flex flex-col space-y-3">
                    <a href="{{ route('landing') }}" class="text-gray-700 hover:text-orange-600 font-medium py-2">Beranda</a>
                    <a href="{{ route('menu.index') }}" class="text-gray-700 hover:text-orange-600 font-medium py-2">Menu</a>
                    <a href="{{ route('about') }}" class="text-gray-700 hover:text-orange-600 font-medium py-2">Tentang Kami</a>
                </nav>
            </div>
        </div>
    </header>

    <main>
        @yield('content')
    </main>

    <!-- Kontak Section -->
    <section id="kontak" class="py-16 bg-white">
        <div class="container mx-auto px-4">
            <h2 class="text-3xl font-bold text-center mb-12 text-gray-800">Hubungi Kami</h2>
            
            <div class="flex flex-col md:flex-row">
                <div class="md:w-1/2">
                    <div class="relative w-full h-64 md:h-full rounded-lg overflow-hidden shadow-md">
                        <iframe 
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3960.7532059094638!2d107.67953187454081!3d-6.920079567730394!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e68dd7e9149e41b%3A0x27e00126496cc8d!2sRaoz%20Kitchen!5e0!3m2!1sen!2sid!4v1745654834567!5m2!1sen!2sid" 
                            class="absolute inset-0 w-full h-full"
                            style="border:0;" 
                            allowfullscreen="" 
                            loading="lazy" 
                            referrerpolicy="no-referrer-when-downgrade">
                        </iframe>
                    </div>
                </div>
                
                <div class="md:w-1/2">
                    <div class="bg-gray-50 p-8 rounded-lg shadow-md h-full">
                        <h3 class="text-xl font-semibold mb-6 text-gray-800">Informasi Kontak</h3>
                        
                        <div class="flex items-start mb-6">
                            <div class="text-orange-600 mr-4 mt-1">
                                <i class="fas fa-map-marker-alt text-2xl"></i>
                            </div>
                            <div>
                                <h4 class="font-semibold text-gray-800 mb-1">Alamat</h4>
                                <p class="text-gray-600">Jl. Permata Bumi, Kecamatan Arcamanik, Kelurahan Cisaranten Kulon, Kota Bandung, Indonesia</p>
                            </div>
                        </div>
                        
                        <div class="flex items-start mb-6">
                            <div class="text-orange-600 mr-4 mt-1">
                                <i class="fas fa-phone-alt text-2xl"></i>
                            </div>
                            <div>
                                <h4 class="font-semibold text-gray-800 mb-1">Telepon</h4>
                                <p class="text-gray-600">+62 856-9496-5298</p>
                            </div>
                        </div>

                        <div class="flex items-start mb-6">
                            <div class="text-orange-600 mr-4 mt-1">
                                <i class="fas fa-phone-alt text-2xl"></i>
                            </div>
                            <div>
                                <h4 class="font-semibold text-gray-800 mb-1">Instagram</h4>
                                <p class="text-gray-600">@raoz_kitchen</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <footer class="bg-gray-800 text-white py-8">
        <div class="container mx-auto px-4">
            <div class="flex flex-col md:flex-row justify-between items-center">
                <div class="mb-4 md:mb-0">
                    <h3 class="text-xl font-bold">Raoz <span class="text-orange-500">Kitchen</span></h3>
                    <p class="text-gray-400 mt-2">Menyajikan hidangan berkualitas untuk acara spesial Anda</p>
                </div>
                
                <div class="flex space-x-4 mb-4 md:mb-0">
                    <a href="#" class="text-gray-400 hover:text-orange-500 text-xl"><i class="fab fa-facebook"></i></a>
                    <a href="#" class="text-gray-400 hover:text-orange-500 text-xl"><i class="fab fa-instagram"></i></a>
                    <a href="#" class="text-gray-400 hover:text-orange-500 text-xl"><i class="fab fa-whatsapp"></i></a>
                </div>
                
                <div>
                    <p class="text-gray-400">&copy; 2025 Raoz Kitchen. All Rights Reserved.</p>
                </div>
            </div>
        </div>
    </footer>

    <!-- WhatsApp Float Button -->
     
    <a href="https://wa.me/6285694965298" class="fixed bottom-6 right-6 bg-green-500 text-white p-3 rounded-full shadow-lg hover:bg-green-600 transition duration-300 z-50">
        <i class="fab fa-whatsapp text-2xl"></i>
    </a>
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>