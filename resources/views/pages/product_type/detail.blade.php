<x-app-layout title="Detail Tipe Barang">
    <div class="flex flex-col gap-y-10">
        <div>
            <a href="{{ url()->previous() }}" class="button-previous">
                <i icon-name="arrow-left" class="mr-2 w-5 h-5"></i>
                <p>Halaman sebelumnya</p>
            </a>
            <div class="flex gap-x-4 items-center mb-4">
                <h1 class="title-large">Detail Tipe Barang</h1>
            </div>
            <nav class="flex" aria-label="Breadcrumb">
                <ol class="inline-flex items-center gap-x-2.5">
                    <li>
                        <a href="{{ route('product-type.index') }}" class="breadcrumb-link">
                            Tipe Barang
                        </a>
                    </li>
                    <li aria-current="page">
                        <div class="breadcrumb-current">
                            <i icon-name="chevron-right" class="mr-2 w-5 h-5"></i>
                            <span>Detail Tipe</span>
                        </div>
                    </li>
                </ol>
            </nav>
        </div>
        <div class="flex flex-col gap-y-5">
            <p class="title-medium">Data Tipe Barang</p>
            <div class="grid lg:grid-cols-2 gap-6">
                <div>
                    <p class="title-field">Tipe Barang</p>
                    <p class="font-medium">{{ $productType->nama }}</p>
                </div>
            </div>
        </div>
</x-app-layout>