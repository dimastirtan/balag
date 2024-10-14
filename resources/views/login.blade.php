<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="<?php echo url('/'); ?>/css/login.css">
    <title>TIRTA RAHARJA | PDAM</title>
</head>

<body>

    <div class="container" id="container">
        <div class="form-container sign-up">
            <form action="/register" method="post">
                @csrf
                <h1>Buat Akun</h1>
                <div class="social-icons">
                    <!-- Social Icons -->
                </div>
                <span>or use your username for registration</span>
                <input type="text" name="nama_lengkap" placeholder="Nama Lengkap">
                <input type="text" name="username" placeholder="Username" id="username">
                <input type="password" name="password" placeholder="Password" id="password">
                <input type="number" name="nip" placeholder="Nomor Induk Pegawai">
                <input type="number" name="nomor_telepon" placeholder="Nomor Telepon">
                <button type="submit">Register</button>
            </form>
        </div>
        <div class="form-container sign-in">
            <form action="/login" method="post" class="login">
                @csrf
                <h1>Login</h1>
                <div class="social-icons">
                    <!-- Social Icons -->
                </div>
                <span>or use your username and password</span>
                <input type="text" name="username" placeholder="Username" required>
                <input type="password" name="password" placeholder="Password" required>
                <button type="submit">Login</button>
            </form>
        </div>
        <div class="toggle-container">
            <div class="toggle">
                <div class="toggle-panel toggle-left">
                    <h1>Selamat Datang!</h1>
                    <p>Isi setiap data untuk membuat akun.</p>
                    <button class="hidden" id="login">Sign In</button>
                </div>
                <div class="toggle-panel toggle-right">
                    <h1>Belum punya akun?</h1>
                    <p>Daftarkan dan buat akun anda disini.</p>
                    <button class="hidden" id="register">Buat</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        const container = document.getElementById('container');
        const registerBtn = document.getElementById('register');
        const loginBtn = document.getElementById('login');

        registerBtn.addEventListener('click', () => {
            container.classList.add("active");
        });

        loginBtn.addEventListener('click', () => {
            container.classList.remove("active");
        });
    </script>
</body>

</html>
