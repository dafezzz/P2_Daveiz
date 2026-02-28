<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Register | TravelKu</title>
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
    min-height:100vh;
    display:flex;
    align-items:center;
    justify-content:center;
    flex-direction:column;
    background:
        linear-gradient(rgba(0,0,0,0.7),rgba(0,0,0,0.85)),
        url("/images/kabah.jpg") center/cover no-repeat;
}

/* HEADER */
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
    width:380px;
    max-width:92%;
    background:#fff;
    padding:28px;
    border-radius:14px;
    box-shadow:0 15px 40px rgba(0,0,0,0.4);
    animation:fade .5s ease;
}

@keyframes fade{
    from{opacity:0;transform:translateY(20px)}
    to{opacity:1}
}

h2{
    text-align:center;
    margin-bottom:15px;
    font-size:20px;
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
    <h1>Buat Akun</h1>
    <p>Mulai perjalanan ibadah Anda bersama TravelKu</p>
</div>

<!-- CARD -->
<div class="card">

    <h2>Register</h2>

    @if($errors->any())
        <div class="error">{{ $errors->first() }}</div>
    @endif

    <form method="POST" action="/register">
    @csrf

    <input class="input" name="name" placeholder="Nama lengkap" required>
    <input class="input" name="username" placeholder="Username" required>
    <input class="input" name="email" type="email" placeholder="Email" required>
    <input class="input" type="password" id="pass" name="password" placeholder="Password" required>
    <input type="hidden" name="role" value="user">

    <label style="font-size:13px;">
        <input type="checkbox" onclick="toggle()"> Tampilkan password
    </label>

    <br><br>

    <button class="btn">Daftar Sekarang</button>
</form>

    <div class="link">
        Sudah punya akun? <a href="/login">Login</a>
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