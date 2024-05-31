<x-app-layout title="Beranda">
    <div class="flex flex-col items-center gap-y-10">
        <h1 class="title-large text-center">Export Data</h1>
        <div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4 w-full max-w-lg">
            <form action="{{ route('export.data') }}" method="GET" class="flex flex-col gap-y-5">
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="type">
                        Select Data Type
                    </label>
                    <select id="type" name="type" required class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                        <option value="stocks">Stocks</option>
                        <option value="products">Products</option>
                        <option value="product_types">Product Types</option>
                        <option value="stock_transactions">Stock Transactions</option>
                    </select>
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="start_date">
                        Start Date
                    </label>
                    <input type="date" id="start_date" name="start_date" required class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="end_date">
                        End Date
                    </label>
                    <input type="date" id="end_date" name="end_date" required class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                </div>
                <div class="flex items-center justify-center">
                    <button type="submit" class="font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline custom-button">
                        Export to Excel
                    </button>
                </div>
            </form>
        </div>
    </div>
    <style>
        .custom-button {
            background-color: #002F6C;
            color: white;
        }
        .custom-button:hover {
            background-color: #004080;
        }
    </style>
</x-app-layout>
