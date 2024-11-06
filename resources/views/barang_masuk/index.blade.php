<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Barang Masuk') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <x-primary-button tag="a" href="{{ route('barang_masuk.create') }}">Tambah barang Masuk</x-primary-button>
                    <x-primary-button tag="a" href="{{ route('barangMasuk.print') }}">Cetak PDF</x-primary-button>
                    <br>
                    <br>
                    <x-table>
                        <x-slot name="header">
                            <tr>
                                <th>No</th>
                                <th>Barang</th>
                                <th>Jumlah</th>
                                <th>Harga Beli</th>
                                <th>Tanggal Masuk</th>
                                <th>Aksi</th>
                            </tr>
                        </x-slot>
                        @php $num=1 @endphp
                        @foreach($barangMasuks as $b)
                        <tr>
                            <td>{{$num++}}</td>
                            <td>{{$b->barang->nama_barang}}</td>
                            <td>{{$b->jml_barang_masuk}}</td>
                            <td>{{$b->total_harga_barang}}</td>
                            <td>{{$b->created_at->format('d-m-y')}}</td>
                            <td>
                                <x-primary-button tag="a" href="{{ route('barang_masuk.edit', $b->id) }}">Edit</x-primary-button>
                                <x-danger-button x-data="" x-on:click.prevent="$dispatch('open-modal',
                                    'confirm-barang-deletion')" x-on:click="$dispatch('set-action',
                                    '{{ route('barang_masuk.destroy', $b->id) }}')"> {{ __('Delete')}}
                                </x-danger-button>
                            </td>
                        </tr>
                     
                        @endforeach
                    </x-table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

<x-modal name="confirm-barang-deletion" focusable maxWidth="xl">
            <form method="post" x-bind:action="action" class="p-6">
                @csrf
                @method('delete')

                <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                    {{ __('Apakah anda yakin akan menghapus data?') }}
                </h2>

                <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                    {{ __('Setelah proses dilakukan. Data akan dihilangkan secara permanen.') }}
                </p>

                <div class="mt-6 flex justify-end">
                    <x-secondary-button x-on:click="$dispatch('close')">
                        {{ __('Cancel') }}
                    </x-secondary-button>

                    <x-danger-button class="ml-3">
                        {{ __('Delete Data') }}
                    </x-danger-button>
                </div>
            </form>
        </x-modal>
    </div>


