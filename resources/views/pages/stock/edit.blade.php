<x-app-layout title="Edit Stock">
    <div class="flex flex-col gap-y-10">
        <div>
            <a href="{{ url()->previous() }}" class="button-previous">
                <i icon-name="arrow-left" class="mr-2 w-5 h-5"></i>
                <p>Halaman sebelumnya</p>
            </a>
            <h1 class="title-large mb-4">Edit Stock</h1>
            <nav class="flex" aria-label="Breadcrumb">
                <ol class="inline-flex items-center gap-x-2.5">
                    <li>
                        <a href="{{ route('stock.index') }}" class="breadcrumb-link">
                         Stock
                        </a>
                    </li>
                    <li aria-current="page">
                        <div class="breadcrumb-current">
                            <i icon-name="chevron-right" class="mr-2 w-5 h-5"></i>
                            <span>Edit Stock</span>
                        </div>
                    </li>
                </ol>
            </nav>
        </div>
        <div class="flex flex-col gap-y-5 max-w-[600px] max-sm:w-full">
            <div class="flex flex-col gap-y-1">
                <p class="title-medium">Edit Stock</p>
                {{-- @if ($product->updatedBy)
                <p class="text-grey-secondary">Terakhir diperbarui : {{ $product->updated_at->isoFormat('dddd, D MMMM Y')
                    }}</p>
                <p class="text-grey-secondary mb-1">Oleh : {{ $product->updatedBy->nama }}</p>
                @endif --}}
            </div>
            <form autocomplete="off" class="flex flex-col gap-y-6" action="{{ route('stock.update', $stock->id) }}"
                method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="flex flex-col bg-white rounded-xl">
                    <p class="font-medium py-3.5 px-5">
                        Form Edit Stock
                    </p>
                    <hr />
                    <div class="flex flex-col p-5 gap-5">
                        <div>
                            <label for="product_id" class="block mb-2">Nama Barang<span class="text-red">*</span></label>
                            <select name="product_id" id="product_id" class="input-field">
                                <option value="">Pilih Barang</option>
                                @foreach ($products as $product)
                                    <option value="{{ $product->id }}" {{ old('product_id', $stock->product_id) == $product->id ? 'selected' : '' }}>
                                        {{ $product->nama }} - ({{ $product->productType->nama ?? 'No Type' }})
                                    </option>
                                @endforeach
                            </select>
                            @error('product_id')
                                <div class="error-message mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div>
                            <label for="harga_beli" class="block mb-2">Harga Beli Satuan<span class="text-red">*</span></label>
                            <input name="harga_beli" type="text" id="harga_beli" class="input-field" placeholder="Masukan harga beli" value="{{ old('harga_beli', $stock->harga_beli) }}">
                            @error('harga_beli')
                                <div class="error-message mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div>
                            <label for="harga_jual" class="block mb-2">Harga Jual Satuan<span class="text-red">*</span></label>
                            <input name="harga_jual" type="text" id="harga_jual" class="input-field" placeholder="Masukan harga jual" value="{{ old('harga_jual', $stock->harga_jual) }}">
                            @error('harga_jual')
                                <div class="error-message mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div>
                            <label for="qty" class="block mb-2">qty<span class="text-red">*</span></label>
                            <input name="qty" type="text" id="qty" class="input-field" placeholder="Masukan harga jual" value="{{ old('qty', $stock->qty) }}">
                            @error('qty')
                                <div class="error-message mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div>
                            <label for="tanggal_berlaku" class="block mb-2">Tanggal Berlaku<span class="text-red">*</span></label>
                            <input name="tanggal_berlaku" type="date" id="tanggal_berlaku" class="input-field" value="{{ old('tanggal_berlaku', $stock->tanggal_berlaku) }}">
                            @error('tanggal_berlaku')
                                <div class="error-message mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="flex justify-end gap-x-4 mt-2 max-sm:flex-col-reverse gap-y-3">
                    <a href="{{ route('stock.index') }}" class="button-danger py-3 px-10">
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