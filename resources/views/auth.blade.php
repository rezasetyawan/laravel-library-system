<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @vite('resources/css/app.css')
    <title>Auth</title>
</head>

<body>
    <main>
        <div class="flex justify-center items-center h-screen">
            <div class="w-[448px]">
                <!-- login form -->
                <div class="p-4 card rounded-md shadow-sm w-full">
                    <form action="/register" method="post" class="w-full">
                        @csrf
                        <label for="name" class="block font-semibold mt-2 mb-2">Name</label>
                        <input type="text" id="name" name="name" class="block border p-1 rounded-md w-full">
                        <label for="email" class="block font-semibold mt-2 mb-2">Email</label>
                        <input type="email" id="email" name="email" class="block border p-1 rounded-md w-full">
                        <label for="password" class="block font-semibold mt-2 mb-2">Password</label>
                        <input type="password" id="password" name="password" class="block border p-1 rounded-md w-full">
                        <div class="mt-4">
                            <button type="submit" class="w-full bg-blue-600 rounded-md p-2 text-white">Register</button>
                        </div>
                    </form>
                </div>

                <!-- signup form -->
                {{-- <div class="signup-box">
                <form action="/register" method="post" novalidate enctype="multipart/form-data">
                    @csrf
                    <span class="pb-3">Masukkan data dibawah ini untuk mendaftar</span>
                    <p>Nama</p>
                    <input type="text" name="name" placeholder="Masukan Nama Anda"
                        class="nama ele">
                    <p>Email</p>
                    <input type="email" name="email" placeholder="Masukan Email Anda"
                        class="email ele">
                    <p>Password</p>
                    <input type="password" name="password" placeholder="Masukan Password Anda !"
                        class="password ele">
                    <p>Photo</p>
                    <input type="file" name="photo">
                    <div style="text-align: center; margin-top: 16px;">
                        <button type=" submit" id="buttonauth" class="btn">Register</button>
                    </div>
                </form>
            </div> --}}
            </div>
        </div>
    </main>
</body>

</html>
