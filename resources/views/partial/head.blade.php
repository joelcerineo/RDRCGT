<!-- resources/views/partial/head.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Documentary Requirements for Common Government Transactions">
    <meta name="author" content="RDRCGT System">
    
    <title>COMMISSION ON AUDIT</title>

    <!-- Favicon -->
    <link rel="icon" href="{{ asset('image/coa.png') }}" type="image/png">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- Tailwind CSS (via CDN, fallback if Vite not loaded) -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Alpine.js -->
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>

    <!-- Font Awesome for icons (optional but recommended) -->
    <script src="https://kit.fontawesome.com/a2b3c12345.js" crossorigin="anonymous"></script>

    <!-- Vite assets (if configured in Laravel) -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        body {
            font-family: 'Inter', sans-serif;
        }

        /* Optional: Make scrollbars minimal and match design */
        ::-webkit-scrollbar {
            width: 8px;
        }

        ::-webkit-scrollbar-thumb {
            background-color: rgba(0,0,0,0.3);
            border-radius: 6px;
        }

        ::-webkit-scrollbar-thumb:hover {
            background-color: rgba(0,0,0,0.5);
        }
    </style>
</head>
