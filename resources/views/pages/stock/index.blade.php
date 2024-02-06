<x-app-layout title="Stock">
    <div class="flex flex-col gap-y-10">
        <h1 class="font-semibold text-[32px] text-navy">Kelola Stock</h1>
        <div class="flex flex-col gap-y-5">
            <div class="flex justify-between gap-3 max-sm:flex-col sm:items-center">
                <p class="font-medium text-navy text-xl">Daftar Stock</p>
                <div class="flex gap-x-5">
                    <a href="{{ route('stock.create') }}" class="w-full flex justify-center button-primary px-5 py-3">
                        <div class="flex gap-x-2">
                            <i icon-name="plus"></i>
                            <p>Tambah</p>
                        </div>
                    </a>
                </div>
            </div>
            <div class="table-wrapper">
                <div class="overflow-x-auto relative rounded-lg py-1">
                    <table id="table_datatables" class="display" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                            <th>ID.</th>
                            <th>Nama Barang</th>
                            <th>Harga Beli</th>
                            <th>Harga Jual</th>
                            <th>Qty</th>
                            <th>Tanggal Berlaku</th>
                            <th class="!text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($stockList as $index => $stock)
                            <tr>
                                <td class="bg-white">{{ $index+1 }}</td>
                                <td>{{ optional($stock->product)->nama ?? 'Null' }}</td>
                                <td>{{ number_format($stock->harga_beli, 0, ',', '.') }}</td>
                                <td>{{ number_format($stock->harga_jual, 0, ',', '.') }}</td>
                                <td>{{ $stock->qty }}</td>
                                <td>{{ \Carbon\Carbon::parse($stock->tanggal_berlaku)->format('d F Y') }}</td>
                                <td>
                                <div class="flex gap-x-3 justify-center">
                                    <a href="{{ route('stock.show', $stock->id) }}" class="button-primary px-5 py-2">
                                        Detail
                                    </a>
                                    <a href="{{ route('stock.edit', $stock->id) }}" class="button-secondary px-5 py-2">
                                        Edit
                                    </a>
                                    <form method="POST" action="{{ route('stock.destroy', $stock->id) }}" id="delete-form-{{ $stock->id }}">
                                        @csrf
                                        @method('delete')
                                        <button type="button" onclick="confirmDelete('{{ $stock->id }}')" class="button-delete">
                                            <i icon-name="trash-2"></i>
                                        </button>
                                    </form>                                  
                                </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>