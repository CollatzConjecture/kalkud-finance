<x-app-layout title="Edit Barang">
    <div class="flex flex-col gap-y-10">
        <div>
            <a href="{{ url()->previous() }}" class="button-previous">
                <i icon-name="arrow-left" class="mr-2 w-5 h-5"></i>
                <p>Halaman sebelumnya</p>
            </a>
            <h1 class="title-large mb-4">Edit Barang</h1>
            <nav class="flex" aria-label="Breadcrumb">
                <ol class="inline-flex items-center gap-x-2.5">
                    <li>
                        <a href="{{ route('product.index') }}" class="breadcrumb-link">
                         Barang
                        </a>
                    </li>
                    <li aria-current="page">
                        <div class="breadcrumb-current">
                            <i icon-name="chevron-right" class="mr-2 w-5 h-5"></i>
                            <span>Edit Tipe</span>
                        </div>
                    </li>
                </ol>
            </nav>
        </div>
        <div class="flex flex-col gap-y-5 max-w-[600px] max-sm:w-full">
            <div class="flex flex-col gap-y-1">
                <p class="title-medium">Edit Barang</p>
                {{-- @if ($product->updatedBy)
                <p class="text-grey-secondary">Terakhir diperbarui : {{ $product->updated_at->isoFormat('dddd, D MMMM Y')
                    }}</p>
                <p class="text-grey-secondary mb-1">Oleh : {{ $product->updatedBy->nama }}</p>
                @endif --}}
            </div>
            <form autocomplete="off" class="flex flex-col gap-y-6" action="{{ route('product.update', $product->id) }}"
                method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="flex flex-col bg-white rounded-xl">
                    <p class="font-medium py-3.5 px-5">
                        Form Edit Barang
                    </p>
                    <hr />
                    <div class="flex flex-col p-5 gap-5">
                        <div>
                            <label for="nama" class="block mb-2">Nama Barang <span class="text-red">*</span></label>
                            <input name="nama" type="text" id="nama" class="input-field"
                                placeholder="Masukkan nama barang" value="{{ $product->nama }}">
                            @error('nama')
                            <div class="error-message mt-2">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div>
                            <label for="product_type_id" class="block mb-2">Tipe Barang<span class="text-red">*</span></label>
                            <select name="product_type_id" id="product_type_id" class="input-field">
                                <option value="">Pilih tipe barang</option>
                                @foreach ($productType as $type)
                                    <option value="{{ $type->id }}" {{ (old('product_type_id', $product->product_type_id) == $type->id) ? 'selected' : '' }}>
                                        {{ $type->nama }}
                                    </option>
                                @endforeach
                            </select>
                            @error('product_type_id')
                                <div class="error-message mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div>
                            <label for="harga_beli_satuan" class="block mb-2">Harga Beli Satuan<span class="text-red">*</span></label>
                            <input name="harga_beli_satuan" type="text" id="harga_beli_satuan" class="input-field" placeholder="Masukan harga beli" value="{{ old('harga_beli_satuan', $product->harga_beli_satuan) }}">
                            @error('harga_beli_satuan')
                                <div class="error-message mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div>
                            <label for="harga_jual_satuan" class="block mb-2">Harga Jual Satuan<span class="text-red">*</span></label>
                            <input name="harga_jual_satuan" type="text" id="harga_jual_satuan" class="input-field" placeholder="Masukan harga jual" value="{{ old('harga_jual_satuan', $product->harga_jual_satuan) }}">
                            @error('harga_jual_satuan')
                                <div class="error-message mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div>
                            <label for="tanggal_berlaku" class="block mb-2">Tanggal Berlaku<span class="text-red">*</span></label>
                            <input name="tanggal_berlaku" type="date" id="tanggal_berlaku" class="input-field" value="{{ old('tanggal_berlaku', $product->tanggal_berlaku) }}">
                            @error('tanggal_berlaku')
                                <div class="error-message mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="flex justify-end gap-x-4 mt-2 max-sm:flex-col-reverse gap-y-3">
                    <a href="{{ route('product.index') }}" class="button-danger py-3 px-10">
                        Batal
                    </a>
                    <button type="submit" class="button-primary py-3 px-10">
                        Perbarui
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>