<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100">
    <div class="flex items-center justify-center h-screen">
        <div class="w-full max-w-md p-8 space-y-3 rounded-xl bg-white shadow-lg">
            <h1 class="text-2xl font-bold text-center">Register</h1>
            
            <form action="{{ route('register') }}" method="post" class="space-y-6">
                @csrf
                <div>
                    <label for="name" class="text-sm font-medium">Name</label>
                    <input type="text" id="name" name="name" required class="w-full p-2 border rounded-md focus:outline-none focus:ring-1 focus:ring-blue-500">
                </div>

                <div>
                    <label for="email" class="text-sm font-medium">Email</label>
                    <input type="email" id="email" name="email" required class="w-full p-2 border rounded-md focus:outline-none focus:ring-1 focus:ring-blue-500">
                </div>

                <div>
                    <label for="password" class="text-sm font-medium">Password</label>
                    <input type="password" id="password" name="password" required class="w-full p-2 border rounded-md focus:outline-none focus:ring-1 focus:ring-blue-500">
                </div>

                <div>
                    <label for="password_confirmation" class="text-sm font-medium">Confirm Password</label>
                    <input type="password" id="password_confirmation" name="password_confirmation" required class="w-full p-2 border rounded-md focus:outline-none focus:ring-1 focus:ring-blue-500">
                </div>

                <button type="submit" class="w-full p-2 text-white bg-blue-500 rounded-md hover:bg-blue-600">Register</button>
            </form>

            <div class="text-center">
                <p class="text-sm">Already have an account? <a href="{{ route('login') }}" class="text-blue-500 hover:underline">Login</a></p>
            </div>
        </div>
    </div>
</body>
</html>
