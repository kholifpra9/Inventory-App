<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Edit Barang') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflowhidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray100">
                    <!-- CONTENT HERE -->
                    <form method="post" action="{{ route('barang.update', $barang->id) }}" enctype="multipart/form-data"
                        class="mt-6 space-y-6">
                        @csrf
                        @method('PATCH')
                        <div class="max-w-xl">
                            <x-input-label for="nama_barang" value="Nama barang" />
                            <x-text-input id="nama_barang" type="text" name="nama_barang" class="mt-1 block w-full"
                                value="{{ old('nama_barang', $barang->nama_barang)}}" required />
                            <x-input-error class="mt-2" :messages="$errors->get('nama_barang')" />
                        </div>
                        <div class="max-w-xl">
                            <x-text-input id="stok" type="hidden" name="stok" class="mt-1 block w-full"
                                value="{{$barang->stok}}" required />
                            <x-input-error class="mt-2" :messages="$errors->get('stok')" />
                        </div>
                        <div class="max-w-xl">
                            <x-input-label for="categorie" value="Kategori" />
                            <x-select-input id="categorie" name="kategori_id" class="mt-1 block w-full" required>
                                <option value="">Open this select menu</option>
                                @foreach($kategoris as $key => $value)
                                @if(old('kategori_id', $barang->kategori_id) == $key)
                                <option value="{{ $key }}" selected>{{$value }}</option>
                                @else
                                <option value="{{ $key }}">{{ $value}}</option>
                                @endif
                                @endforeach
                            </x-select-input>
                        </div>
                        <x-secondary-button tag="a" href="{{route('barang.index')}}">Cancel</x-secondary-button>
                        <x-primary-button name="save_and_create" value="true">Save & Create Another</x-primary-button>
                        <x-primary-button name="save" value="true">Save</x-primary-button>
                    </form>
                </div>
            </div>
        </div>
</x-app-layout>