<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Login | TravelKu</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">

<style>
:root{
    --primary:#0F172A;
    --secondary:#3B82F6;
}

*{
    margin:0;
    padding:0;
    box-sizing:border-box;
    font-family:'Poppins',sans-serif;
}

body{
    height:100vh;
    display:flex;
    align-items:center;
    justify-content:center;
    flex-direction:column;
    background:
        linear-gradient(rgba(0,0,0,0.7),rgba(0,0,0,0.85)),
        url("/images/kabah.jpg") center/cover no-repeat;
}

/* HEADER ATAS */
.header{
    text-align:center;
    color:#fff;
    margin-bottom:20px;
}

.header h1{
    font-size:26px;
    margin-bottom:5px;
}

.header p{
    font-size:13px;
    opacity:.8;
}

/* CARD */
.card{
    width:360px;
    max-width:90%;
    background:#fff;
    padding:30px;
    border-radius:14px;
    box-shadow:0 15px 40px rgba(0,0,0,0.4);
    animation:fade .5s ease;
}

@keyframes fade{
    from{opacity:0;transform:translateY(20px)}
    to{opacity:1}
}

h2{
    margin-bottom:15px;
    font-size:20px;
    text-align:center;
}

/* INPUT */
.input{
    width:100%;
    padding:11px;
    margin-bottom:12px;
    border-radius:8px;
    border:1px solid #ddd;
    font-size:13px;
}

.input:focus{
    border-color:var(--secondary);
    outline:none;
}

/* BUTTON */
.btn{
    width:100%;
    padding:12px;
    border:none;
    border-radius:8px;
    background:var(--secondary);
    color:#fff;
    font-weight:600;
    cursor:pointer;
}

.btn:hover{
    background:#2563eb;
}

/* ERROR */
.error{
    background:#ffe5e5;
    padding:8px;
    border-radius:6px;
    margin-bottom:10px;
    font-size:13px;
}

/* LINK */
.link{
    text-align:center;
    margin-top:15px;
    font-size:13px;
}

.link a{
    color:var(--secondary);
    text-decoration:none;
}
</style>
</head>

<body>

<!-- HEADER -->
<div class="header">
    <h1>Selamat Datang</h1>
    <p>Masuk untuk melanjutkan perjalanan ibadah Anda</p>
</div>

<!-- CARD LOGIN -->
<div class="card">

    <h2>Login</h2>

    @if($errors->any())
        <div class="error">{{ $errors->first() }}</div>
    @endif

    <form method="POST" action="/login">
        @csrf

        <input class="input" name="login" placeholder="Email / Username" required>

        <input class="input" type="password" id="pass" name="password" placeholder="Password" required>

        <label style="font-size:13px;">
            <input type="checkbox" onclick="toggle()"> Tampilkan password
        </label>

        <br><br>

        <button class="btn">Login</button>
    </form>

    <div class="link">
        Belum punya akun? <a href="/register">Daftar</a>
    </div>

</div>

<script>
function toggle(){
    let x = document.getElementById("pass");
    x.type = x.type === "password" ? "text" : "password";
}
</script>

</body>
</html>