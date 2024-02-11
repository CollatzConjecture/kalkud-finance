<x-app-layout title="Edit Stock Transaction">
    <div class="flex flex-col gap-y-10">
        <div>
            <a href="{{ url()->previous() }}" class="button-previous">
                <i icon-name="arrow-left" class="mr-2 w-5 h-5"></i>
                <p>Halaman sebelumnya</p>
            </a>
            <h1 class="title-large mb-4">Edit Stock Transaction</h1>
            <nav class="flex" aria-label="Breadcrumb">
                <ol class="inline-flex items-center gap-x-2.5">
                    <li>
                        <a href="{{ route('stock-transaction.index') }}" class="breadcrumb-link">
                            Stock
                        </a>
                    </li>
                    <li aria-current="page">
                        <div class="breadcrumb-current">
                            <i icon-name="chevron-right" class="mr-2 w-5 h-5"></i>
                            <span>Edit Stock Transaction</span>
                        </div>
                    </li>
                </ol>
            </nav>
        </div>
        <div class="flex flex-col gap-y-5 max-w-[600px] max-sm:w-full">
            <div class="flex flex-col gap-y-1">
                <p class="title-medium">Edit Stock</p>
                {{-- @if ($product->updatedBy)
                <p class="text-grey-secondary">Terakhir diperbarui : {{ $product->updated_at->isoFormat('dddd, D MMMM
                    Y')
                    }}</p>
                <p class="text-grey-secondary mb-1">Oleh : {{ $product->updatedBy->nama }}</p>
                @endif --}}
            </div>
            <form autocomplete="off" class="flex flex-col gap-y-6"
                action="{{ route('stock-transaction.update', $stockTransaction->id) }}" method="POST"
                enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="flex flex-col bg-white rounded-xl">
                    <p class="font-medium py-3.5 px-5">
                        Form Edit Stock Transaction
                    </p>
                    <hr />
                    <div class="flex flex-col p-5 gap-5">
                        <div>
                            <label for="stock_id" class="block mb-2">Nama Barang<span class="text-red">*</span></label>
                            <select name="stock_id" id="stock_id" class="input-field">
                                <option value="">Pilih Barang</option>
                                @foreach ($stocks as $stock)
                                <option value="{{ $stock->id }}" {{ old('stock_id', $stockTransaction->stock_id) ==
                                    $stock->id ? 'selected' : '' }}>
                                    {{ $stock->product->nama }} - ({{ $stock->product->productType->nama }})
                                </option>
                                @endforeach
                            </select>
                            @error('stock_id')
                            <div class="error-message mt-2">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div>
                            <label for="unit" class="block mb-2">Unit<span class="text-red">*</span></label>
                            <select name="unit_id" id="unit_id" class="input-field">
                                <option value="">Pilih Unit</option>
                                @foreach ($units as $unit)
                                <option value="{{ $unit->id }}" {{ old('unit_id', $stockTransaction->unit_id) ==
                                    $unit->id ? 'selected' : '' }}>
                                    {{ $unit->nama }} - ({{ $unit->jenis }})
                                </option>
                                @endforeach
                            </select>
                            @error('unit_id')
                            <div class="error-message mt-2">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div>
                            <label for="harga_beli" class="block mb-2">Harga Beli<span class="text-red">*</span></label>
                            <input name="harga_beli" type="text" id="harga_beli" class="input-field"
                                placeholder="Masukan harga beli"
                                value="{{ old('harga_beli', $stockTransaction->harga_beli) }}">
                            @error('harga_beli')
                            <div class="error-message mt-2">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div>
                            <label for="harga_jual" class="block mb-2">Harga Jual<span class="text-red">*</span></label>
                            <input name="harga_jual" type="text" id="harga_jual" class="input-field"
                                placeholder="Masukan harga jual" 
                                value="{{ old('harga_jual', $stockTransaction->harga_jual) }}">
                            @error('harga_jual')
                            <div class="error-message mt-2">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div>
                            <label for="qty" class="block mb-2">qty<span class="text-red">*</span></label>
                            <input name="qty" type="text" id="qty" class="input-field" placeholder="Masukan qty"
                                value="{{ old('qty', $stockTransaction->qty) }}">
                            @error('qty')
                            <div class="error-message mt-2">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div>
                            <label for="tipe" class="block mb-2">Tipe<span class="text-red">*</span></label>
                            <select name="tipe" id="tipe" class="input-field">
                                <option value="">Pilih Tipe</option>
                                <option value="Barang Masuk" {{ old('tipe', $stockTransaction->tipe) == 'Barang Masuk' ? 'selected' : '' }}>Barang Masuk</option>
                                <option value="Barang Keluar" {{ old('tipe', $stockTransaction->tipe) == 'Barang Keluar' ? 'selected' : '' }}>Barang Keluar</option>
                            </select>
                            @error('tipe')
                            <div class="error-message mt-2">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>                        
                    </div>
                </div>
                <div class="flex justify-end gap-x-4 mt-2 max-sm:flex-col-reverse gap-y-3">
                    <a href="{{ route('stock-transaction.index') }}" class="button-danger py-3 px-10">
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