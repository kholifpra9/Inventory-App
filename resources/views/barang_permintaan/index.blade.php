<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Pengelolaan Permintaan Barang') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                <x-primary-button tag="a" href="{{ route('barang_permintaan.print') }}">Cetak PDF</x-primary-button>
                    <!-- Tabs -->
                    <ul class="grid grid-flow-col text-center text-gray-500 bg-gray-100 rounded-lg p-1">
                        <li>
                            <a href="#" class="tab-link flex justify-center py-4 {{ $activeTab == 'belum-diterima' ? 'bg-white rounded-lg shadow text-indigo-900' : '' }}" data-target="belum-diterima">Belum Diterima</a>
                        </li>
                        <li>
                            <a href="#" class="tab-link flex justify-center py-4 {{ $activeTab == 'sudah-diterima' ? 'bg-white rounded-lg shadow text-indigo-900' : '' }}" data-target="sudah-diterima">Sudah Diterima</a>
                        </li>
                    </ul>
                    
                    <br>
                    <br>
                    
                    <!-- Tabel Belum Diterima -->
                    <div id="belum-diterima" class="tab-content {{ $activeTab == 'belum-diterima' ? '' : 'hidden' }}">
                        <x-table>
                            <x-slot name="header">
                                <tr>
                                    <th>No</th>
                                    <th>Barang</th>
                                    <th>Jumlah Barang</th>
                                    <th>Keterangan</th>
                                    <th>Status</th>
                                    <th>Pemohon</th>
                                    <th>Tanggal</th>
                                    <th>Aksi</th>
                                </tr>
                            </x-slot>
                            @php $num=1 @endphp
                            @foreach($belumDiterima as $b)
                            <tr>
                                <td>{{$num++}}</td>
                                <td>{{$b->barang->nama_barang}}</td>
                                <td>{{$b->jml_barang_permintaan}}</td>
                                <td>{{$b->keterangan}}</td>
                                <td>{{$b->status}}</td>
                                <td>{{$b->user->name}}</td>
                                <td>{{$b->created_at->format('d-m-y')}}</td>
                                <td>
                                    <x-primary-button tag="a" href="{{ route('permintaan_barang.permintaan', $b->id) }}">Terima Permintaan</x-primary-button>
                                </td>
                            </tr>
                            @endforeach
                        </x-table>
                    </div>
                    
                    <!-- Tabel Sudah Diterima -->
                    <div id="sudah-diterima" class="tab-content {{ $activeTab == 'sudah-diterima' ? '' : 'hidden' }}">
                        <x-table>
                            <x-slot name="header">
                                <tr>
                                    <th>No</th>
                                    <th>Barang</th>
                                    <th>Jumlah Barang</th>
                                    <th>Keterangan</th>
                                    <th>Status</th>
                                    <th>Pemohon</th>
                                    <th>Tanggal</th>
                                    <!-- <th>Aksi</th> -->
                                </tr>
                            </x-slot>
                            @php $num=1 @endphp
                            @foreach($sudahDiterima as $b)
                            <tr>
                                <td>{{$num++}}</td>
                                <td>{{$b->barang->nama_barang}}</td>
                                <td>{{$b->jml_barang_permintaan}}</td>
                                <td>{{$b->keterangan}}</td>
                                <td>{{$b->status}}</td>
                                <td>{{$b->user->name}}</td>
                                <td>{{$b->created_at->format('d-m-y')}}</td>
                                <!-- <td>
                                    <x-primary-button tag="a" href="{{ route('barang.edit', $b->id) }}">Terima </x-primary-button>
                                </td> -->
                            </tr>
                            @endforeach
                        </x-table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

<script>
        document.addEventListener('DOMContentLoaded', function() {
        const tabLinks = document.querySelectorAll('.tab-link');
        const tabContents = document.querySelectorAll('.tab-content');

        tabLinks.forEach(link => {
            link.addEventListener('click', function(event) {
                event.preventDefault();
                
                // Ambil target dari data attribute
                const target = this.getAttribute('data-target');

                // Sembunyikan semua tab konten
                tabContents.forEach(content => {
                    content.classList.add('hidden');
                });

                // Tampilkan konten tab yang sesuai
                document.getElementById(target).classList.remove('hidden');

                // Hapus kelas aktif dari semua tab link
                tabLinks.forEach(link => {
                    link.classList.remove('bg-white', 'text-indigo-900');
                });

                // Tambahkan kelas aktif pada tab link yang dipilih
                this.classList.add('bg-white', 'text-indigo-900');
            });
        });
    });

</script>
