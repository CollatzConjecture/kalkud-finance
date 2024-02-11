<x-app-layout title="Tambah Transaksi">
    <div class="flex flex-col gap-y-10">
        <div>
            <a href="{{ url()->previous() }}" class="button-previous">
                <i icon-name="arrow-left" class="mr-2 w-5 h-5"></i>
                <p>Halaman sebelumnya</p>
            </a>
            <h1 class="title-large mb-4">Tambah Transaction</h1>
            <nav class="flex" aria-label="Breadcrumb">
                <ol class="inline-flex items-center gap-x-2.5">
                    <li>
                        <a href="{{ route('stock-transaction.index') }}" class="breadcrumb-link">
                            Transaction
                        </a>
                    </li>
                    <li aria-current="page">
                        <div class="breadcrumb-current">
                            <i icon-name="chevron-right" class="mr-2 w-5 h-5"></i>
                            <span>Tambah Transaction</span>
                        </div>
                    </li>
                </ol>
            </nav>
        </div>
        <div class="flex flex-col gap-y-5 max-w-[600px] max-sm:w-full">
            <p class="title-medium">Tambah Transaction</p>
            <form autocomplete="off" class="flex flex-col gap-y-6" action="{{ route('stock-transaction.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="flex flex-col bg-white rounded-xl">
                    <p class="font-medium py-3.5 px-5">
                        Form Tambah Transaction
                    </p>
                    <hr/>
                    <div class="flex flex-col p-5 gap-5">
                        <div>
                            <label for="stock_id" class="block mb-2">Nama Barang<span class="text-red">*</span></label>
                            <select name="stock_id" id="stock_id" class="input-field">
                                <option value="">Pilih Barang</option>
                                @foreach ($stocks as $stock)
                                    <option value="{{ $stock->id }}" {{ old('stock_id') == $stock->id ? 'selected' : '' }}>
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
                                @foreach ($stockTransactions as $transaction)
                                    <option value="{{ $transaction->unit_id }}" {{ old('unit_id') == $transaction->unit_id ? 'selected' : '' }}>
                                        {{ $transaction->unit->nama}} - ({{ $transaction->unit->jenis }})
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
                            <input name="harga_beli" type="text" id="harga_beli" class="input-field" placeholder="Masukan harga beli" value="{{ old('harga_beli') }}">
                            @error('harga_beli')
                                <div class="error-message mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div>
                            <label for="harga_jual" class="block mb-2">Harga Jual<span class="text-red">*</span></label>
                            <input name="harga_jual" type="text" id="harga_jual" class="input-field" placeholder="Masukan harga jual" value="{{ old('harga_jual') }}">
                            @error('harga_jual')
                                <div class="error-message mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div>
                            <label for="qty" class="block mb-2">qty<span class="text-red">*</span></label>
                            <input name="qty" type="text" id="qty" class="input-field" placeholder="Masukan harga jual" value="{{ old('qty') }}">
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
                                <option value="Barang Masuk" {{ old('tipe') == 'Barang Masuk' ? 'selected' : '' }}>Barang Masuk</option>
                                <option value="Barang Keluar" {{ old('tipe') == 'Barang Keluar' ? 'selected' : '' }}>Barang Keluar</option>
                            </select>
                            @error('tipe')
                                <div class="error-message mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>                     
                        <div>
                            <label for="tanggal_berlaku" class="block mb-2">Tanggal Berlaku<span class="text-red">*</span></label>
                            <input name="tanggal_berlaku" type="date" id="tanggal_berlaku" class="input-field" value="{{ old('tanggal_berlaku') }}">
                            @error('tanggal_berlaku')
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
                        Simpan
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
