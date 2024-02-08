<x-app-layout title="Detail TYransaction">
    <div class="flex flex-col gap-y-10">
        <div>
            <a href="{{ url()->previous() }}" class="button-previous">
                <i icon-name="arrow-left" class="mr-2 w-5 h-5"></i>
                <p>Halaman sebelumnya</p>
            </a>
            <div class="flex gap-x-4 items-center mb-4">
                <h1 class="title-large">Detail Transaction</h1>
            </div>
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
                            <span>Detail Transaction</span>
                        </div>
                    </li>
                </ol>
            </nav>
        </div>
        <div class="flex flex-col gap-y-5">
            <p class="title-medium">Data Transaction</p>
            <div class="grid lg:grid-cols-2 gap-6">
                <div>
                    <p class="title-field">Nama Stock Product</p>
                    <p class="font-medium">{{ $stockTransaction->stock->product->nama }}</p>
                </div>
                <div>
                    <p class="title-field">Unit</p>
                    <p class="font-medium">{{ $stockTransaction->unit->nama }}</p>
                </div>
                <div>
                    <p class="title-field">Harga Beli Satuan</p>
                    <p class="font-medium">{{ number_format($stockTransaction->harga_beli, 0, ',', '.') }}</p>
                </div>
                <div>
                    <p class="title-field">Harga Jual Satuan</p>
                    <p class="font-medium">{{ number_format($stockTransaction->harga_jual, 0, ',', '.') }}</p>
                </div>
                <div>
                    <p class="title-field">Qty</p>
                    <p class="font-medium">{{ $stockTransaction->qty }}</p>
                </div>
                <div>
                    <p class="title-field">Tipe</p>
                    <p class="font-medium">{{ $stockTransaction->tipe }}</p>
                </div>
                <div>
                    <p class="title-field">Tanggal Berlaku</p>
                    <p class="font-medium">{{ \Carbon\Carbon::parse($stockTransaction->tanggal_berlaku)->format('d F Y') }}</p>
                </div>
            </div>
        </div>
</x-app-layout>