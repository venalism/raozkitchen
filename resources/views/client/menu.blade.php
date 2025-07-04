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
        
        <!-- Menu Harian Section -->
        <section>
            <!-- Tabs Filter Hari -->
            <div class="mb-6 border-b border-gray-200 flex flex-wrap">
                <a href="{{ route('menu.index') }}"
                class="px-4 py-2 font-medium {{ request('hari') ? 'text-gray-700 hover:text-orange-600' : 'text-orange-600 border-b-2 border-orange-600' }}">
                    Semua
                </a>
                @foreach ($haris as $hari)
                    <a href="{{ route('menu.index', ['hari' => $hari->nama_hari]) }}"
                    class="px-4 py-2 font-medium {{ request('hari') === $hari->nama_hari ? 'text-orange-600 border-b-2 border-orange-600' : 'text-gray-700 hover:text-orange-600' }}">
                        {{ $hari->nama_hari }}
                    </a>
                @endforeach
            </div>
        
            <!-- Grid Menu -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 mb-10">
                @forelse ($menus as $menu)
                    <div class="bg-white rounded-lg shadow-md hover:shadow-lg transition overflow-hidden">
                        <div class="h-48 bg-gray-200">
                            {{-- Ganti dengan validasi image jika tersedia --}}
                            <img src="{{ $menu->foto ? asset('storage/' . $menu->foto) : asset('/img/placeholder.jpg') }}"
                                alt="{{ $menu->nama_menu ?? 'Menu' }}" class="w-full h-full object-cover">
                        </div>
                        <div class="p-4">
                            <div class="flex justify-between items-start mb-2">
                                <h3 class="font-bold text-gray-800">{{ $menu->nama_menu ?? '-' }}</h3>
                                <span class="bg-green-100 text-green-600 text-xs px-2 py-1 rounded-full">
                                    {{ $menu->hari->nama_hari ?? 'Tanpa Hari' }}
                                </span>
                            </div>
                            <p class="text-gray-600 text-sm mb-4">
                                {{-- Gunakan fallback jika kolom deskripsi tidak ada --}}
                                {{ $menu->deskripsi ?? 'Tidak ada deskripsi' }}
                            </p>
                            <div class="flex items-center justify-between">
                                <p class="font-bold text-orange-600">
                                    Rp {{ number_format($menu->harga ?? 0, 0, ',', '.') }}
                                </p>
                                <span class="text-sm text-gray-500">{{ $menu->satuan ?? '' }}</span>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-span-3 text-center text-gray-600">Belum ada menu tersedia.</div>
                @endforelse
            </div>

            <!-- Pagination -->
            <div class="flex justify-center">
                {{ $menus->withQueryString()->links() }}
            </div>
        </section>        
        
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