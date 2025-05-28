@extends('layout.app')
@section('title', 'Home')

@section('content')
    <section class="bg-gradient-to-r from-orange-100 to-yellow-50 py-16">
        <div class="container mx-auto px-4 flex flex-col md:flex-row items-center">
            <div class="md:w-1/2 mb-10 md:mb-0">
                <h1 class="text-4xl md:text-5xl font-bold text-gray-800 mb-4">Katering Lezat untuk Acara Spesial Anda</h1>
                <p class="text-gray-600 text-lg mb-8">Jadikan acara Anda lebih berkesan dengan sajian kuliner tradisional dan modern yang lezat, sehat, dan berkualitas.</p>
                <div class="flex space-x-4">
                    <a href="{{ route('menu') }}" class="bg-orange-600 text-white px-8 py-3 rounded-full font-medium hover:bg-orange-700 transition duration-300">Pesan Sekarang</a>
                    <a href="#kontak" class="border border-orange-600 text-orange-600 px-8 py-3 rounded-full font-medium hover:bg-orange-100 transition duration-300">Hubungi Kami</a>
                </div>
            </div>
            <div class="md:w-1/2">
                <img src="/api/placeholder/600/400" alt="Hidangan Katering" class="rounded-lg shadow-xl">
            </div>
        </div>
    </section>

    <!-- Keunggulan Section -->
    <section class="py-16 bg-white">
        <div class="container mx-auto px-4">
            <h2 class="text-3xl font-bold text-center mb-12 text-gray-800">Mengapa Memilih Kami?</h2>
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                <div class="bg-gray-50 p-6 rounded-lg shadow-md hover:shadow-lg transition duration-300">
                    <div class="text-orange-600 text-4xl mb-4">
                        <i class="fas fa-utensils"></i>
                    </div>
                    <h3 class="text-xl font-semibold mb-2 text-gray-800">Bahan Berkualitas</h3>
                    <p class="text-gray-600">Kami hanya menggunakan bahan-bahan segar dan berkualitas terbaik untuk setiap hidangan kami.</p>
                </div>
                <div class="bg-gray-50 p-6 rounded-lg shadow-md hover:shadow-lg transition duration-300">
                    <div class="text-orange-600 text-4xl mb-4">
                        <i class="fas fa-hand-holding-heart"></i>
                    </div>
                    <h3 class="text-xl font-semibold mb-2 text-gray-800">Dibuat dengan Cinta</h3>
                    <p class="text-gray-600">Setiap hidangan kami dibuat dengan penuh dedikasi, cinta, dan perhatian pada detail.</p>
                </div>
                <div class="bg-gray-50 p-6 rounded-lg shadow-md hover:shadow-lg transition duration-300">
                    <div class="text-orange-600 text-4xl mb-4">
                        <i class="fas fa-truck"></i>
                    </div>
                    <h3 class="text-xl font-semibold mb-2 text-gray-800">Pengiriman Tepat Waktu</h3>
                    <p class="text-gray-600">Kami berkomitmen untuk mengirimkan pesanan Anda tepat waktu dan dalam kondisi sempurna.</p>
                </div>
                <div class="bg-gray-50 p-6 rounded-lg shadow-md hover:shadow-lg transition duration-300">
                    <div class="text-orange-600 text-4xl mb-4">
                        <i class="fas fa-thumbs-up"></i>
                    </div>
                    <h3 class="text-xl font-semibold mb-2 text-gray-800">Kepuasan Pelanggan</h3>
                    <p class="text-gray-600">Kami mengutamakan kepuasan pelanggan dan berusaha memberikan layanan terbaik.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section id="pesan" class="py-32 bg-orange-600 text-white">
        <div class="container mx-auto px-4 text-center">
            <h2 class="text-3xl font-bold mb-4">Siap Memesan Katering untuk Acara Anda?</h2>
            <p class="text-lg mb-8 max-w-2xl mx-auto">Hubungi kami sekarang untuk mendapatkan penawaran terbaik dan konsultasi menu yang sesuai dengan acara Anda.</p>
            <div class="flex flex-col md:flex-row justify-center gap-4">
                <a href="#kontak" class="bg-white text-orange-600 px-8 py-3 rounded-full font-medium hover:bg-gray-100 transition duration-300">Hubungi Kami</a>
                <a href="{{ route('menu') }}" class="border-2 border-white text-white px-8 py-3 rounded-full font-medium hover:bg-orange-700 transition duration-300">Lihat Menu</a>
            </div>
        </div>
    </section>

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
@endsection