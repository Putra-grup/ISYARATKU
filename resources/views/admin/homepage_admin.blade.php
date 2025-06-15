<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <title>IsyaratKu</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap" rel="stylesheet"/>
    <style>
        body {
            font-family: "Inter", sans-serif;
        }
    </style>
</head>
<body class="bg-[#E6F0E6] text-[#1A1A1A]">

    @include('partials.nav_admin')

    <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pt-10 pb-20">

        {{-- Hero Section --}}
        <section class="bg-[#F0F7F0] rounded-lg p-6 sm:p-10 flex flex-col sm:flex-row items-center gap-8">
            <div class="sm:w-1/2">
                <h1 class="font-semibold text-2xl sm:text-3xl leading-tight mb-4">Kuasai Bahasa Isyarat, Buka Pintu Komunikasi Baru!</h1>
                <p class="text-[#4B4B4B] mb-6 text-sm sm:text-base leading-relaxed">
                    Gabung dengan komunitas kami dan kuasai bahasa isyarat melalui kursus interaktif, mulailah perjalanan untuk kemudahan tanpa batas.
                </p>
                <button class="bg-[#FFB800] text-[#1A1A1A] font-semibold px-6 py-2 rounded shadow hover:brightness-110 transition">Mulai Belajar Sekarang!</button>
            </div>
        </section>

        {{-- Platform Section --}}
        <section class="mt-16">
            <h2 class="font-semibold text-xl sm:text-2xl mb-4">
                Platform serba-in-one<br/>
                <span class="font-bold text-[#1B3B2D] underline decoration-[#1B3B2D] decoration-4">yang memudahkan belajar bahasa isyarat.</span>
            </h2>
            <div class="flex flex-col sm:flex-row items-center gap-6">
                <ul class="sm:w-1/2 list-decimal list-inside text-[#4B4B4B] text-sm sm:text-base space-y-3">
                    <li>Metode belajar dengan ilustrasi dan video interaktif untuk memudahkan pemahaman.</li>
                    <li>Belajar kapan saja dan di mana saja tanpa batasan biaya.</li>
                    <li>Praktik langsung dan tugas mandiri untuk mengasah kemampuan.</li>
                </ul>
                <div class="sm:w-1/2 flex justify-center">
                    <img src="https://storage.googleapis.com/a1aa/image/2e6c1662-e1f2-4233-cfc3-4fe1f5abf461.jpg" alt="People learning sign language" class="rounded-lg shadow-lg" width="320" height="240" />
                </div>
            </div>
        </section>

        {{-- Program Section --}}
        <section class="mt-16 bg-[#D9E6D9] rounded-lg py-10 px-6 sm:px-12">
            <h3 class="text-center font-semibold text-lg sm:text-xl mb-10">Program IsyaratKu</h3>
            <div class="grid grid-cols-1 sm:grid-cols-3 gap-8 max-w-4xl mx-auto">
                @foreach([
                    ['title' => 'Kelas Sibi', 'img' => 'a3d00338-a0f8-4f8d-227c-b6673b27b4c4.jpg', 'bg' => 'white', 'text' => ''],
                    ['title' => 'Kelas Bisindo', 'img' => 'f05c17c3-334d-4fcb-bd2e-12aa68a46021.jpg', 'bg' => '#1B3B2D', 'text' => 'text-white'],
                    ['title' => 'Workshop', 'img' => '93de22c4-1311-4790-dc58-543026558c25.jpg', 'bg' => 'white', 'text' => '']
                ] as $program)
                <div class="bg-[{{ $program['bg'] }}] rounded-lg shadow-md p-4 flex flex-col items-center {{ $program['text'] }}">
                    <img src="https://storage.googleapis.com/a1aa/image/{{ $program['img'] }}" alt="{{ $program['title'] }}" class="rounded-lg mb-4" width="120" height="120" />
                    <h4 class="font-semibold text-center">{{ $program['title'] }}</h4>
                </div>
                @endforeach
            </div>
            <div class="flex justify-between max-w-4xl mx-auto mt-8">
                <button class="bg-[#FFB800] text-[#1A1A1A] font-semibold px-6 py-2 rounded shadow hover:brightness-110 transition">Back</button>
                <button class="bg-[#FFB800] text-[#1A1A1A] font-semibold px-6 py-2 rounded shadow hover:brightness-110 transition">Next</button>
            </div>
        </section>
    </main>
    @include('partials.footer')
</body>
</html>
