<div class="bg-blue-800 h-screen p-4">
    <div class="flex items-center space-x-2 mb-6">
        <img src="{{ asset('kalkudLogo.jpg') }}" alt="Kalam Kudus Logo" class="h-12">
        <span class="text-white text-xl font-bold">Kalam Kudus</span>
    </div>

    <nav>
        <ul class="text-white">
            <li class="mb-2">
                <a href="{{ route('home') }}" class="flex items-center space-x-2 p-2 hover:bg-blue-700 rounded transition duration-150">
                    <span>Home</span>
                </a>
            </li>
            {{-- <li class="mb-2">
                <a href="{{ route('ledger') }}" class="flex items-center space-x-2 p-2 hover:bg-blue-700 rounded transition duration-150">
                    <span>Financial Ledger</span>
                </a>
            </li> --}}
            <!-- Add other sidebar links here -->
        </ul>
    </nav>
</div>