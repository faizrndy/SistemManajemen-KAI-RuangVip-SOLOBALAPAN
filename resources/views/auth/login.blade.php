<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Login Admin VIP</title>
    @vite(['resources/css/app.css'])
</head>

<body class="bg-[#F5F7FA] min-h-screen flex items-center justify-center">

<div class="w-full max-w-md bg-white rounded-xl shadow-lg overflow-hidden">

    <!-- HEADER -->
    <div class="bg-[#2C3E7D] px-6 py-5 text-center text-white">
        <img src="{{ asset('logo-kai.png') }}" class="h-12 mx-auto mb-2">
        <h1 class="text-lg font-semibold tracking-wide">
            ADMIN RUANG VIP JOGLO SOLOBALAPAN
        </h1>
        <p class="text-sm text-white/80">
            PT Kereta Api Indonesia (Persero)
        </p>
    </div>

    <!-- FORM -->
    <form method="POST" action="{{ route('login.process') }}" class="px-6 py-6 space-y-4">
        @csrf

        <div>
            <label class="text-sm font-semibold">Email</label>
            <input type="email" name="email"
                   class="w-full mt-1 px-4 py-2 border rounded-lg"
                   required autofocus>
        </div>

        <div>
            <label class="text-sm font-semibold">Password</label>
            <input type="password" name="password"
                   class="w-full mt-1 px-4 py-2 border rounded-lg"
                   required>
        </div>

        @error('email')
            <div class="text-sm text-red-600">{{ $message }}</div>
        @enderror

        <button type="submit"
                class="w-full bg-[#2C3E7D] text-white py-2 rounded-lg font-semibold hover:bg-[#24336A]">
            Masuk
        </button>
    </form>
</div>

</body>
</html>
