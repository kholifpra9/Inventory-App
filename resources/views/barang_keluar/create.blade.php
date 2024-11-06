<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Tambah Barang Keluar') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflowhidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray100">
                    <!-- CONTENT HERE -->
                    <form method="post" action="{{ route('barang_keluar.store') }}" enctype="multipart/form-data"
                        class="mt-6 space-y-6">
                        @csrf
                        <div class="max-w-xl">
                        <x-input-label for="barang" value="Barang" />
                            <x-select-input id="barang" name="barang_id" class="mt-1 block w-full" required>
                                <option value="">Open this select menu</option>
                                @foreach($barangs as $key => $value)
                                @if(old('id') == $key)
                                <option value="{{ $key }}" selected>{{$value }}</option>
                                @else
                                <option value="{{ $key }}">{{ $value}}</option>
                                @endif
                                @endforeach
                            </x-select-input>
                        </div>
                        <div class="max-w-xl">
                            <x-input-label for="jml_barang_keluar" value="Jumlah Barang Keluar" />
                            <x-text-input id="jml_barang_keluar" type="number" name="jml_barang_keluar" class="mt-1 block w-full"
                                value="{{ old('jml_barang_keluar')}}" required />
                            <x-input-error class="mt-2" :messages="$errors->get('jml_barang_keluar')" />
                        </div>

                        <div class="max-w-xl">
                            <x-text-input id="user_id" type="hidden" name="user_id" class="mt-1 block w-full"
                                value="{{ Auth::user()->id }}" required />
                            <x-input-error class="mt-2" :messages="$errors->get('user_id')" />
                        </div>

                        <div class="max-w-xl">
                        <x-input-label for="keterangan" value="Keterangan" />
                            <x-select-input id="keterangan" name="keterangan" class="mt-1 block w-full" required>
                                <option value="">Open this select menu</option>
                                <option value="rusak">Rusak</option>
                                <option value="habis">Habis</option>
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