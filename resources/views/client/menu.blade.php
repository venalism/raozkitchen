@extends('layout.app')
@section('title', 'Menu Katering')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="max-w-5xl mx-auto">
        <!-- Header Section -->
        <div class="text-center mb-10">
            <h1 class="text-3xl md:text-4xl font-bold mb-2">Menu <span class="text-orange-600">Raoz</span> <span class="text-green-600">Kitchen</span></h1>
            <p class="text-gray-600 text-lg">Sajian Lezat dan Bergizi untuk Setiap Hari</p>
        </div>
        
        <!-- Menu Mingguan Section -->
        <section class="mb-12">
            <div class="flex items-center justify-between mb-6">
                <h2 class="text-2xl font-bold text-gray-800">Batch Mingguan</h2>
            </div>

            <div class="bg-orange-50 rounded-xl overflow-hidden shadow-md">
                <div class="grid md:grid-cols-2">
                    <div class="p-6 md:p-8">
                        <h3 class="text-2xl font-bold text-gray-800 mb-3">{{ $jadwal->nama_jadwal }}</h3>
                        <p class="text-gray-700 mb-2">
                            Jadwal: {{ \Carbon\Carbon::parse($jadwal->tanggal_mulai)->translatedFormat('d M') }}
                            – {{ \Carbon\Carbon::parse($jadwal->tanggal_selesai)->translatedFormat('d M Y') }}
                        </p>
                        <p class="text-gray-600 mb-4">Silakan cek menu harian di bawah untuk melihat detail lengkapnya.</p>
                    </div>
                    <div class="bg-gray-200 h-64 md:h-auto">
                        <img src="{{ asset('storage/' . $jadwal->poster_url) }}" alt="Poster Menu Mingguan" class="w-full h-full object-cover">
                    </div>
                </div>
            </div>
        </section>
     
        <!-- Menu Harian Section -->
        <section>
            <div class="flex items-center justify-between mb-6">
                <h2 class="text-2xl font-bold text-gray-800">Menu Harian</h2>
            </div>
            
            @foreach($jadwal->menuHarians as $menu)
                <h3 class="text-xl font-semibold text-gray-800 mt-8 mb-4">{{ $menu->hari }}, {{ \Carbon\Carbon::parse($menu->tanggal)->translatedFormat('d M Y') }}</h3>

                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 mb-10">
                    @foreach($menu->produkMenus as $item)
                        <div class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-lg transition duration-300">
                            <div class="h-48 bg-gray-200">
                                <img src="/api/placeholder/400/300" alt="{{ $item->produk->nama_produk }}" class="w-full h-full object-cover">
                            </div>
                            <div class="p-4">
                                <div class="flex justify-between items-start mb-2">
                                    <h3 class="font-bold text-gray-800">{{ $item->produk->nama_produk }}</h3>
                                    <span class="bg-green-100 text-green-600 text-xs px-2 py-1 rounded-full">Menu Utama</span>
                                </div>
                                <p class="text-gray-600 text-sm mb-4">
                                    {{ $item->produk->keterangan ?? '-' }}
                                </p>
                                <div class="flex items-center justify-between">
                                    <p class="font-bold text-orange-600">Rp {{ number_format($item->harga_menu, 0, ',', '.') }}</p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endforeach
                    
        <!-- How to Order Section -->
        <section class="mt-16 bg-gray-50 rounded-xl p-8">
            <h2 class="text-2xl font-bold text-gray-800 mb-6 text-center">Cara Pemesanan</h2>
            <div class="grid md:grid-cols-3 gap-8">
                <div class="text-center">
                    <div class="w-16 h-16 bg-orange-100 text-orange-600 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-utensils text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-800 mb-2">1. Pilih Menu</h3>
                    <p class="text-gray-600">Pilih menu favorit Anda atau paket mingguan yang sesuai dengan kebutuhan.</p>
                </div>
                <div class="text-center">
                    <div class="w-16 h-16 bg-green-100 text-green-600 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-phone-alt text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-800 mb-2">2. Hubungi Kami</h3>
                    <p class="text-gray-600">Pesan melalui WhatsApp atau telepon untuk konfirmasi ketersediaan dan pengiriman.</p>
                </div>
                <div class="text-center">
                    <div class="w-16 h-16 bg-orange-100 text-orange-600 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-truck text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-800 mb-2">3. Terima Pesanan</h3>
                    <p class="text-gray-600">Kami akan mengantar pesanan Anda tepat waktu sesuai jadwal yang disepakati.</p>
                </div>
            </div>
            <div class="text-center mt-8">
                <a href="#pesan" class="bg-orange-600 text-white px-8 py-3 rounded-full font-medium hover:bg-orange-700 transition duration-300 inline-flex items-center">
                    <i class="fab fa-whatsapp mr-2"></i> Pesan via WhatsApp
                </a>
            </div>
        </section>
    </div>
</div>
@endsection