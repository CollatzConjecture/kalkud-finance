<x-app-layout title="Detail Unit Sekolah">
    <div class="flex flex-col gap-y-10">
        <div>
            <a href="{{ url()->previous() }}" class="button-previous">
                <i icon-name="arrow-left" class="mr-2 w-5 h-5"></i>
                <p>Halaman sebelumnya</p>
            </a>
            <div class="flex gap-x-4 items-center mb-4">
                <h1 class="title-large">Detail Unit Sekolah</h1>
            </div>
            <nav class="flex" aria-label="Breadcrumb">
                <ol class="inline-flex items-center gap-x-2.5">
                    <li>
                        <a href="{{ route('unit.index') }}" class="breadcrumb-link">
                            Unit Sekolah
                        </a>
                    </li>
                    <li aria-current="page">
                        <div class="breadcrumb-current">
                            <i icon-name="chevron-right" class="mr-2 w-5 h-5"></i>
                            <span>Detail unit</span>
                        </div>
                    </li>
                </ol>
            </nav>
        </div>
        <div class="flex flex-col gap-y-5">
            <p class="title-medium">Data Unit Sekolah</p>
            <div class="grid lg:grid-cols-2 gap-6">
                <div>
                    <p class="title-field">Nama Unit</p>
                    <p class="font-medium">{{ $unit->nama }}</p>
                </div>
                <div>
                    <p class="title-field">Jenis Unit</p>
                    <p class="font-medium">{{ $unit->jenis }}</p>
                </div>
            </div>
        </div>
</x-app-layout>