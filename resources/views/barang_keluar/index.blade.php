<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Pengelolaan Barang Keluar') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <x-primary-button tag="a" href="{{ route('barang_keluar.create') }}">Tambah Barang Keluar</x-primary-button>
                    <x-primary-button tag="a" href="{{ route('barangKeluar.print') }}">Cetak PDF</x-primary-button>
                    <br>
                    <br>
                    <x-table>
                        <x-slot name="header">
                            <tr>
                                <th>No</th>
                                <th>Barang</th>
                                <th>Jumlah Barang keluar</th>
                                <th>Keterangan</th>
                                <th>Tanggal</th>
                                <!-- <th>Aksi</th> -->
                            </tr>
                        </x-slot>
                        @php $num=1 @endphp
                        @foreach($barangKeluars as $b)
                        <tr>
                            <td>{{$num++}}</td>
                            <td>{{$b->barang->nama_barang}}</td>
                            <td>{{$b->jml_barang_keluar}}</td>
                            <td>{{$b->keterangan}}</td>
                            <td>{{$b->created_at->format('d-m-y')}}</td>
                            <!-- <td>
                                <x-primary-button tag="a" href="{{ route('barang.edit', $b->id) }}">Edit</x-primary-button>
                                <form class="p-0" action="{{route('barang.destroy', $b->id)}}" method="POST">
                                    @csrf
                                    @method("DELETE")
                                    <input type="submit" class="bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-white text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800" style="cursor:pointer;" value="Delete">
                                </form>
                            </td> -->
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