<x-app-layout title="Edit Unit Sekolah">
    <div class="flex flex-col gap-y-10">
        <div>
            <a href="{{ url()->previous() }}" class="button-previous">
                <i icon-name="arrow-left" class="mr-2 w-5 h-5"></i>
                <p>Halaman sebelumnya</p>
            </a>
            <h1 class="title-large mb-4">Edit Unit Sekolah</h1>
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
                            <span>Edit Unit</span>
                        </div>
                    </li>
                </ol>
            </nav>
        </div>
        <div class="flex flex-col gap-y-5 max-w-[600px] max-sm:w-full">
            <div class="flex flex-col gap-y-1">
                <p class="title-medium">Edit Unit Sekolah</p>
                @if ($unit->updatedBy)
                <p class="text-grey-secondary">Terakhir diperbarui : {{ $unit->updated_at->isoFormat('dddd, D MMMM Y')
                    }}</p>
                <p class="text-grey-secondary mb-1">Oleh : {{ $unit->updatedBy->nama_lengkap }}</p>
                @endif
            </div>
            <form autocomplete="off" class="flex flex-col gap-y-6" action="{{ route('unit.update', $unit->id) }}"
                method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="flex flex-col bg-white rounded-xl">
                    <p class="font-medium py-3.5 px-5">
                        Form Edit Unit Sekolah
                    </p>
                    <hr />
                    <div class="flex flex-col p-5 gap-5">
                        <div>
                            <label for="nama" class="block mb-2">Nama Sekolah <span class="text-red">*</span></label>
                            <input name="nama" type="text" id="nama" class="input-field"
                                placeholder="Masukkan nama sekolah" value="{{ $unit->nama }}">
                            @error('nama')
                            <div class="error-message mt-2">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div>
                            <label for="jenis" class="block mb-2">Jenis Sekolah <span class="text-red">*</span></label>
                            <input name="jenis" type="text" id="jenis" class="input-field"
                                placeholder="Masukkan jenis sekolah" value="{{ $unit->jenis }}">
                            @error('jenis')
                            <div class="error-message mt-2">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="flex justify-end gap-x-4 mt-2 max-sm:flex-col-reverse gap-y-3">
                    <a href="{{ route('unit.index') }}" class="button-danger py-3 px-10">
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