<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Terima Laporan Barang') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflowhidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray100">
                    <!-- CONTENT HERE -->
                    <form method="post" action="{{ route('laporan_barang.keluarkan', $lapBarang->id) }}" enctype="multipart/form-data"
                        class="mt-6 space-y-6">
                        @csrf
                        @method('PATCH')
                        <div class="max-w-xl">
                            <x-input-label for="nama_barang" value="Nama barang" />
                            <input type="text" id="nama_barang" value="{{ $barang[$lapBarang->barang_id] }}" name="barang_id" class="mt-1 block w-full" readonly />
                            <input type="hidden" name="barang_id" value="{{ old('barang_id', $lapBarang->barang_id) }}">
                            <x-input-error class="mt-2" :messages="$errors->get('nama_barang')" />
                        </div>
                        <div class="max-w-xl">
                            <x-input-label for="stok" value="Jumlah Barang" />
                            <x-text-input id="stok" type="number" readonly name="jml_barang_keluar" class="mt-1 block w-full"
                                value="{{$lapBarang->jml_barang_terlapor}}" required />
                            <x-input-error class="mt-2" :messages="$errors->get('stok')" />
                        </div>

                        <div class="max-w-xl">
                            <x-input-label for="keterangan" value="Keterangan" />
                            <x-text-input id="keterangan" type="text" readonly name="keterangan" class="mt-1 block w-full"
                                value="{{$lapBarang->keterangan}}" required />
                            <x-input-error class="mt-2" :messages="$errors->get('keterangan')" />
                        </div>
                        
                        <div>
                            <x-input-label for="keterangan" value="Barang akan dikeluarkan sesuai jumlah Barang pada laporan apakah anda setuju?" />
                        </div>
                        <x-secondary-button tag="a" href="{{route('barang.index')}}">Cancel</x-secondary-button>
                        <x-primary-button name="save" value="true">Terima Laporan!</x-primary-button>
                    </form>
                </div>
            </div>
        </div>
</x-app-layout>