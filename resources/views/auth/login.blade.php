<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100">
    <div class="flex items-center justify-center h-screen">
        <div class="w-full max-w-md p-8 space-y-3 rounded-xl bg-white shadow-lg">
            <h1 class="text-2xl font-bold text-center">Login</h1>
            
            <form action="{{ route('login') }}" id="loginForm" method="post" class="space-y-6">
                <div>
                    <label for="email" class="text-sm font-medium">Email</label>
                    <input type="email" id="email" name="email" required class="w-full p-2 border rounded-md focus:outline-none focus:ring-1 focus:ring-blue-500">
                </div>

                <div>
                    <label for="password" class="text-sm font-medium">Password</label>
                    <input type="password" id="password" name="password" required class="w-full p-2 border rounded-md focus:outline-none focus:ring-1 focus:ring-blue-500">
                </div>

                <button type="submit" id="loginButton" class="w-full p-2 text-white bg-blue-500 rounded-md hover:bg-blue-600">Log In</button>
            </form>

            <div class="text-center">
                <p class="text-sm">Don't have an account? <a href="{{ route('register') }}" class="text-blue-500 hover:underline">Register</a></p>
            </div>
        </div>
    </div>
</body>
</html>
