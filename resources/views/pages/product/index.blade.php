<x-app-layout title="Product Type">
    <div class="flex flex-col gap-y-10">
        <h1 class="font-semibold text-[32px] text-navy">Kelola Tipe Barang</h1>
        <div class="flex flex-col gap-y-5">
            <div class="flex justify-between gap-3 max-sm:flex-col sm:items-center">
                <p class="font-medium text-navy text-xl">Daftar Tipe Barang</p>
                <div class="flex gap-x-5">
                    <a href="{{ route('product-type.create') }}" class="w-full flex justify-center button-primary px-5 py-3">
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
                            <th>Nama Tipe Barang</th>
                            <th class="!text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($typeList as $index => $type)
                            <tr>
                                <td class="bg-white">{{ $index+1 }}</td>
                                <td>{{ $type->nama }}</td>
                                <td>
                                <div class="flex gap-x-3 justify-center">
                                    <a href="{{ route('product-type.show', $type->id) }}" class="button-primary px-5 py-2">
                                        Detail
                                    </a>
                                    <a href="{{ route('product-type.edit', $type->id) }}" class="button-secondary px-5 py-2">
                                        Edit
                                    </a>
                                    <form method="POST" action="{{ route('product-type.destroy', $type->id) }}">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="button-delete">
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