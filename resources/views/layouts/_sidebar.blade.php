<aside class="sidebar offcanvas max-lg:offcanvas-start max-lg:invisible min-lg:visible fixed h-screen flex flex-col overflow-y-auto justify-between bg-white w-[285px]" tabindex="-1" id="nav-sidebar">
    <div class="flex items-center gap-x-4 pt-7 pb-6 px-8">
        <img src="{{ asset('assets/images/kalkudLogo.png') }}" alt="Kalkud Logo" class="w-12 h-12"/>
        <div>
            <h6 class="text-md font-semibold text-navy">Finance Tracker</h6>
            <p class="text-sm text-grey-primary">Kalam Kudus</p>
        </div>
    </div>
    <div class="flex flex-col gap-y-10 my-5 grow">
        <div class="section-menu">
            <p class="text-sm font-semibold pl-8">MENU</p>
            <a href="{{ route('home') }}" class="item-menu {{ request()->routeIs('home') ? 'active' : '' }}">
                <i icon-name="layout-grid"></i>
                <p class="text-grey-primary">Beranda</p>
            </a>
            <a href="" class="item-menu {{ request()->routeIs('lowongan-kerja*') ? 'active' : '' }}">
                <i icon-name="briefcase"></i>
                <p class="text-grey-primary">Lowongan Kerja</p>
            </a>
            <a href="" class="item-menu {{ request()->routeIs('pelamar-pekerjaan*') ? 'active' : '' }}">
                <i icon-name="clipboard-list"></i>
                <p class="text-grey-primary">Pelamar Pekerjaan</p>
            </a>
            <a href="" class="item-menu {{ request()->routeIs('potensial*') ? 'active' : '' }}">
                <i icon-name="clipboard-check"></i>
                <p class="text-grey-primary">Pelamar Potensial</p>
            </a>
            <a href="" class="item-menu {{ request()->routeIs('departemen*') ? 'active' : '' }}">
                <i icon-name="book"></i>
                <p class="text-grey-primary">Master Sekolah</p>
            </a>
            <a href="" class="item-menu {{ request()->routeIs('tipe-pekerjaan*') ? 'active' : '' }}">
                <i icon-name="file-spreadsheet"></i>
                <p class="text-grey-primary">Tipe Pekerjaan</p>
            </a>
            <a href="" class="item-menu {{ request()->routeIs('kutipan*') ? 'active' : '' }}">
                <i icon-name="quote"></i>
                <p class="text-grey-primary">Kutipan Kompas</p>
            </a>
            <a href="" class="item-menu {{ request()->routeIs('pengguna*') ? 'active' : '' }}">
                <i icon-name="users"></i>
                <p class="text-grey-primary">Kelola Pengguna</p>
            </a>
        </div>
    </div>
    <div class="p-10">
        <p class="text-center text-grey-secondary">©2024 Kalam Kudus</p>
    </div>
</aside>
