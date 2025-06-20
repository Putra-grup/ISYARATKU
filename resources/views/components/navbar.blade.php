<nav class="bg-[#0B3B2E] flex items-center justify-between px-6 py-4">
    <div class="flex items-center space-x-4">
        <a class="text-white font-extrabold text-lg select-none">
            IsyaratKu
        </a>
    </div>
    <div class="flex items-center space-x-6">
        <a class="text-white text-sm select-none" href="{{ route('user/homepage_user') }}">Beranda</a>
        <a class="text-white text-sm select-none" href="{{ route('user.kuis.index') }}">Kuis</a>
        <a class="text-white text-sm select-none" href="{{ route('user.materi.index') }}">Materi</a>

    </div>
  
        <div class="hidden md:flex gap-2 mr-8">
    @isset($user)
        <span class="mt-3.5 text-white font-medium text-sm">
            {{ $user->nama_lengkap }}
        </span>
        <a href="{{ route('user/profile') }}">
            <img src="{{ asset('storage/foto/' . $user->foto) }}" alt="Foto Profil"
                 class="w-12 h-12 rounded-full object-cover shadow">
        </a>
    @else
        <span class="mt-3.5 text-white font-medium text-sm">
            Guest
        </span>
        <img src="https://ui-avatars.com/api/?name=Guest" class="w-12 h-12 rounded-full object-cover shadow" alt="Guest">
    @endisset
</div>
</nav>



