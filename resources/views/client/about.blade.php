@extends('layout.app')
@section('title', 'Tentang Kami')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="max-w-4xl mx-auto">
        <div class="text-center mb-10">
            <h1 class="text-3xl md:text-4xl font-bold mb-2">Tentang <span class="text-orange-600">Raoz</span> <span class="text-green-600">Kitchen</span></h1>
            <p class="text-gray-600 text-lg">Sajian Rumahan dengan Cita Rasa Istimewa</p>
        </div>
        
        <div class="mb-10">
            <h2 class="text-2xl font-bold text-gray-800 mb-4">Perjalanan Kami</h2>
            <p class="text-gray-700 mb-4">Raoz Kitchen berawal dari dapur kecil di sudut rumah pada tahun 2018. Bermula dari hobi memasak dan kecintaan pada masakan rumahan Indonesia yang autentik, kami memulai usaha ini dengan semangat berbagi kehangatan masakan rumah kepada banyak orang.</p>
            <p class="text-gray-700">Dari mulut ke mulut, pesanan pun mulai berdatangan. Resep-resep turun temurun keluarga menjadi andalan kami, yang selalu kami sajikan dengan penuh cinta dan perhatian pada detail, bahan berkualitas, dan tentu saja rasa yang konsisten.</p>
        </div>
        
        <div class="grid md:grid-cols-2 gap-8 mb-10">
            <div>
                <h2 class="text-2xl font-bold text-gray-800 mb-4">Visi Kami</h2>
                <p class="text-gray-700">Menjadi pilihan utama katering rumahan yang menyajikan makanan sehat, lezat, dan mengingatkan pada kehangatan masakan rumah, dengan pelayanan yang ramah dan terpercaya.</p>
            </div>
            <div>
                <h2 class="text-2xl font-bold text-gray-800 mb-4">Misi Kami</h2>
                <ul class="text-gray-700 space-y-2">
                    <li class="flex items-start">
                        <span class="text-orange-600 mr-2">•</span>
                        <span>Menghadirkan cita rasa masakan rumahan yang autentik dan konsisten</span>
                    </li>
                    <li class="flex items-start">
                        <span class="text-orange-600 mr-2">•</span>
                        <span>Menggunakan bahan-bahan segar dan berkualitas untuk setiap hidangan</span>
                    </li>
                    <li class="flex items-start">
                        <span class="text-orange-600 mr-2">•</span>
                        <span>Memberikan pelayanan yang penuh perhatian dan tepat waktu</span>
                    </li>
                    <li class="flex items-start">
                        <span class="text-orange-600 mr-2">•</span>
                        <span>Membangun komunitas yang harmonis dengan pelanggan dan pemasok lokal</span>
                    </li>
                </ul>
            </div>
        </div>
        
        <div class="mb-10">
            <h2 class="text-2xl font-bold text-gray-800 mb-6">Keunggulan Kami</h2>
            <div class="grid md:grid-cols-3 gap-6">
                <div class="text-center p-4 border border-gray-200 rounded-lg shadow-sm hover:shadow-md transition duration-300">
                    <div class="text-orange-600 text-4xl mb-3">
                        <i class="fas fa-award"></i>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-800 mb-2">Resep Autentik</h3>
                    <p class="text-gray-600">Resep keluarga turun-temurun yang telah disempurnakan selama bertahun-tahun</p>
                </div>
                <div class="text-center p-4 border border-gray-200 rounded-lg shadow-sm hover:shadow-md transition duration-300">
                    <div class="text-green-600 text-4xl mb-3">
                        <i class="fas fa-carrot"></i>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-800 mb-2">Bahan Berkualitas</h3>
                    <p class="text-gray-600">Hanya menggunakan bahan segar dan berkualitas dari pemasok lokal terpercaya</p>
                </div>
                <div class="text-center p-4 border border-gray-200 rounded-lg shadow-sm hover:shadow-md transition duration-300">
                    <div class="text-orange-600 text-4xl mb-3">
                        <i class="fas fa-heart"></i>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-800 mb-2">Dibuat dengan Cinta</h3>
                    <p class="text-gray-600">Setiap hidangan disiapkan dengan perhatian penuh seperti memasak untuk keluarga sendiri</p>
                </div>
            </div>
        </div>
        
        <div class="mb-10">
            <h2 class="text-2xl font-bold text-gray-800 mb-6">Layanan Kami</h2>
            <div class="grid md:grid-cols-2 gap-6">
                <div class="bg-white rounded-lg shadow p-6 border-l-4 border-orange-600">
                    <h3 class="text-xl font-semibold text-gray-800 mb-2">Katering Harian</h3>
                    <p class="text-gray-600">Langganan makanan harian untuk keluarga atau perorangan dengan menu bervariasi setiap minggunya.</p>
                </div>
                <div class="bg-white rounded-lg shadow p-6 border-l-4 border-green-600">
                    <h3 class="text-xl font-semibold text-gray-800 mb-2">Katering Acara</h3>
                    <p class="text-gray-600">Layanan katering untuk berbagai acara seperti arisan, rapat kantor, atau perayaan keluarga.</p>
                </div>
                <div class="bg-white rounded-lg shadow p-6 border-l-4 border-orange-600">
                    <h3 class="text-xl font-semibold text-gray-800 mb-2">Nasi Kotak</h3>
                    <p class="text-gray-600">Pilihan praktis untuk acara dengan menu yang dapat disesuaikan dengan kebutuhan dan anggaran.</p>
                </div>
                <div class="bg-white rounded-lg shadow p-6 border-l-4 border-green-600">
                    <h3 class="text-xl font-semibold text-gray-800 mb-2">Kue dan Snack</h3>
                    <p class="text-gray-600">Aneka kue tradisional dan snack untuk melengkapi hidangan utama atau untuk camilan.</p>
                </div>
            </div>
        </div>
        
        <div class="mb-10">
            <h2 class="text-2xl font-bold text-gray-800 mb-6">Testimoni Pelanggan</h2>
            <div class="grid md:grid-cols-2 gap-6">
                <div class="bg-gray-50 rounded-lg p-6 relative">
                    <div class="text-orange-600 text-4xl absolute top-4 left-4 opacity-10">
                        <i class="fas fa-quote-left"></i>
                    </div>
                    <p class="text-gray-700 italic relative z-10 mb-4">Rasanya benar-benar seperti masakan rumah. Saya sudah berlangganan lebih dari setahun dan tidak pernah kecewa!</p>
                    <p class="text-right font-semibold text-gray-800">- Ibu Dewi, Pelanggan Tetap</p>
                </div>
                <div class="bg-gray-50 rounded-lg p-6 relative">
                    <div class="text-orange-600 text-4xl absolute top-4 left-4 opacity-10">
                        <i class="fas fa-quote-left"></i>
                    </div>
                    <p class="text-gray-700 italic relative z-10 mb-4">Pesanan selalu datang tepat waktu dan makanannya lezat. Sangat cocok untuk keluarga sibuk seperti kami.</p>
                    <p class="text-right font-semibold text-gray-800">- Keluarga Santoso</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection