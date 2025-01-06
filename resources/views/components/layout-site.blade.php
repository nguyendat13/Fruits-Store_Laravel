<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="./output.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.0/css/all.min.css"
        integrity="sha512-9xKTRVabjVeZmc+GUW8GgSmcREDunMM+Dt/GrzchfN8tkwHizc5RP4Ok/MXFFy5rIjJjzhndFScTceq5e6GvVQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    @vite('resources/css/app.css')
    <title>{{$title ?? 'Shop'}}</title>
    {{$header ?? ""}}
</head>
<body>
   
    <header class="sticky top-0 z-50 bg-white lg-shadow">
        <x-header/>
    </header>
  

    <main>
        {{-- Hiển thị thông báo nếu có --}}
        @if (session('warning'))
        <div class="bg-yellow-100 text-yellow-700 p-4 mb-4 rounded">
            {{ session('warning') }}
        </div>
        @elseif (session('error'))
        <div class="bg-red-100 text-red-700 p-4 mb-4 rounded">
            {{ session('error') }}
        </div>
        @endif
    
        {{-- Hiển thị nội dung chính --}}
        {{$slot}}
    </main>
    <header>

        <x-footer/>
    </header>
    {{$footer ?? ""}}
</body>
</html>