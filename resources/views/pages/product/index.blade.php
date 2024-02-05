<x-app-layout title="Product">
    <div class="flex flex-col gap-y-10">
        <h1 class="font-semibold text-[32px] text-navy">Kelola Barang</h1>
        <div class="flex flex-col gap-y-5">
            <div class="flex justify-between gap-3 max-sm:flex-col sm:items-center">
                <p class="font-medium text-navy text-xl">Daftar Barang</p>
                <div class="flex gap-x-5">
                    <a href="{{ route('product.create') }}" class="w-full flex justify-center button-primary px-5 py-3">
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
                            <th>Tipe Barang</th>
                            <th>Nama Barang</th>
                            <th>Harga Beli</th>
                            <th>Harga Jual</th>
                            <th>Tanggal Berlaku</th>
                            <th class="!text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($productList as $index => $product)
                            <tr>
                                <td class="bg-white">{{ $index+1 }}</td>
                                <td>{{ optional($product->productType)->nama ?? 'Null' }}</td>
                                <td>{{ $product->nama }}</td>
                                <td>{{ number_format($product->harga_beli_satuan, 0, ',', '.') }}</td>
                                <td>{{ number_format($product->harga_jual_satuan, 0, ',', '.') }}</td>
                                <td>{{ \Carbon\Carbon::parse($product->tanggal_berlaku)->format('d F Y') }}</td>
                                <td>
                                <div class="flex gap-x-3 justify-center">
                                    <a href="{{ route('product.show', $product->id) }}" class="button-primary px-5 py-2">
                                        Detail
                                    </a>
                                    <a href="{{ route('product.edit', $product->id) }}" class="button-secondary px-5 py-2">
                                        Edit
                                    </a>
                                    <form method="POST" action="{{ route('product.destroy', $product->id) }}" id="delete-form-{{ $product->id }}">
                                        @csrf
                                        @method('delete')
                                        <button type="button" onclick="confirmDelete('{{ $product->id }}')" class="button-delete">
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