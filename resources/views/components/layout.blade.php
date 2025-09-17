<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Simple Home Page</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 font-sans">

    <header class="bg-white shadow">
        <nav class="container mx-auto px-6 py-4">
            <div class="flex items-center justify-between">
                <div>
                    <a href="#" class="text-xl font-bold text-gray-800">MyWebsite</a>
                </div>
                <div class="flex space-x-4">
                    <a href="#" class="px-3 py-2 text-gray-600 hover:text-gray-900 hover:bg-gray-200 rounded-md">Home</a>
                    <a href="#" class="px-3 py-2 text-gray-600 hover:text-gray-900 hover:bg-gray-200 rounded-md">About</a>
                    <a href="#" class="px-3 py-2 text-gray-600 hover:text-gray-900 hover:bg-gray-200 rounded-md">Contact</a>
                </div>
            </div>
        </nav>
    </header>

    <main class="container mx-auto px-6 py-12">
        <div class="text-center">
            <h1 class="text-4xl font-bold text-gray-800 mb-4">
                {{ $heading }}
            </h1>
        </div>

            {{ $slot }}

    </main>



</body>
</html>