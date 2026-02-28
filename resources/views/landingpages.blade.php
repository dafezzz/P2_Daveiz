<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Travel Haji & Umrah</title>

<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">

<style>
:root{
    --primary:#0F172A;
    --secondary:#3B82F6;
    --accent:#6366F1;
    --light:#F8FAFC;
}

*{
    margin:0;
    padding:0;
    box-sizing:border-box;
    font-family:'Poppins',sans-serif;
}

html{
    scroll-behavior:smooth;
}

body{
    background:var(--light);
    color:#333;
}

/* NAVBAR */
.navbar{
    position:fixed;
    width:100%;
    top:0;
    background:rgba(15,23,42,0.85);
    backdrop-filter:blur(10px);
    color:#fff;
    display:flex;
    justify-content:space-between;
    padding:15px 50px;
    z-index:1000;
}

.navbar a{
    color:#fff;
    text-decoration:none;
    margin-left:20px;
}

.navbar a:hover{
    color:var(--secondary);
}

/* HERO */
.hero{
    height:100vh;
    background:
        linear-gradient(rgba(0,0,0,0.6),rgba(0,0,0,0.85)),
        url("/images/kabah.jpg") center/cover;
    display:flex;
    align-items:center;
    justify-content:center;
    text-align:center;
    color:#fff;
    padding:20px;
}

.hero h1{
    font-size:50px;
    margin-bottom:20px;
}

.hero p{
    margin-bottom:30px;
}

.btn{
    padding:12px 25px;
    border-radius:30px;
    background:var(--secondary);
    color:#fff;
    text-decoration:none;
    margin:5px;
    display:inline-block;
    transition:.3s;
}

.btn:hover{
    transform:scale(1.05);
}

/* SECTION */
.section{
    padding:90px 50px;
    text-align:center;
}

.section h2{
    margin-bottom:40px;
    font-size:32px;
}

/* CARDS */
.grid{
    display:grid;
    grid-template-columns:repeat(auto-fit,minmax(250px,1fr));
    gap:25px;
}

.card{
    background:#fff;
    padding:25px;
    border-radius:12px;
    box-shadow:0 10px 25px rgba(0,0,0,0.08);
    transition:.3s;
}

.card:hover{
    transform:translateY(-8px);
}

/* PACKAGES */
.price{
    color:var(--secondary);
    font-size:22px;
    margin:10px 0;
}

/* GALLERY */
.gallery img{
    width:100%;
    border-radius:10px;
    height:200px;
    object-fit:cover;
}

/* STEPS */
.steps{
    display:grid;
    grid-template-columns:repeat(auto-fit,minmax(200px,1fr));
    gap:20px;
}

.step{
    background:#fff;
    padding:20px;
    border-radius:10px;
}

/* FAQ */
.faq{
    text-align:left;
    max-width:800px;
    margin:auto;
}

.faq-item{
    margin-bottom:15px;
}

/* CTA */
.cta{
    background:var(--primary);
    color:#fff;
    padding:70px;
}

/* FOOTER */
.footer{
    background:#020617;
    color:#aaa;
    padding:50px;
    display:grid;
    grid-template-columns:repeat(auto-fit,minmax(200px,1fr));
    gap:30px;
}

.footer h4{
    color:#fff;
    margin-bottom:10px;
}

.copy{
    text-align:center;
    background:#020617;
    color:#777;
    padding:15px;
}
</style>
</head>

<body>

<!-- NAVBAR -->
<div class="navbar">
    <h3>Travelku</h3>
    <div>
        <a href="#">Home</a>
        <a href="#paket">Paket</a>
        <a href="#galeri">Galeri</a>
        <a href="#faq">FAQ</a>
        <a href="/login">Login</a>
    </div>
</div>

<!-- HERO -->
<div class="hero">
    <div>
        <h1>Ibadah Lebih Tenang & Nyaman</h1>
        <p>Travel Umrah & Haji terpercaya dengan layanan profesional</p>
        <a href="#paket" class="btn">Lihat Paket</a>
        <a href="#" class="btn">Daftar Sekarang</a>
    </div>
</div>

<!-- KEUNGGULAN -->
<div class="section">
    <h2>Kenapa Pilih Kami?</h2>
    <div class="grid">
        <div class="card">✔ Legal Resmi Kemenag</div>
        <div class="card">✔ Hotel Dekat Masjid</div>
        <div class="card">✔ Tim Profesional</div>
        <div class="card">✔ Harga Transparan</div>
    </div>
</div>

<!-- PAKET -->
<div class="section" id="paket">
    <h2>Paket Umrah</h2>
    <div class="grid">
        <div class="card">
            <h3>Umrah Reguler</h3>
            <p class="price">Rp 25jt</p>
            <p>9 Hari</p>
        </div>
        <div class="card">
            <h3>Umrah VIP</h3>
            <p class="price">Rp 35jt</p>
            <p>Hotel Bintang 5</p>
        </div>
        <div class="card">
            <h3>Haji Khusus</h3>
            <p class="price">Rp 150jt</p>
            <p>Fasilitas Premium</p>
        </div>
    </div>
</div>

<!-- GALERI -->
<div class="section" id="galeri">
    <h2>Galeri Perjalanan</h2>
    <div class="grid gallery">
        <img src="/images/kabah.jpg">
        <img src="/images/kabah.jpg">
        <img src="/images/kabah.jpg">
    </div>
</div>

<!-- STEPS -->
<div class="section">
    <h2>Alur Pendaftaran</h2>
    <div class="steps">
        <div class="step">1. Daftar Online</div>
        <div class="step">2. Pilih Paket</div>
        <div class="step">3. Pembayaran</div>
        <div class="step">4. Berangkat</div>
    </div>
</div>

<!-- TESTIMONI -->
<div class="section">
    <h2>Testimoni</h2>
    <div class="grid">
        <div class="card">"Pelayanan terbaik!"</div>
        <div class="card">"Sangat nyaman & aman"</div>
        <div class="card">"Highly recommended"</div>
    </div>
</div>

<!-- FAQ -->
<div class="section" id="faq">
    <h2>FAQ</h2>
    <div class="faq">
        <div class="faq-item">
            <strong>Apakah travel ini resmi?</strong><br>
            Ya, terdaftar di Kemenag.
        </div>
        <div class="faq-item">
            <strong>Berapa DP?</strong><br>
            Mulai dari 5 juta.
        </div>
    </div>
</div>

<!-- CTA -->
<div class="cta">
    <h2>Siap Berangkat ke Tanah Suci?</h2>
    <p>Daftar sekarang dan amankan slot Anda</p>
    <br>
    <a href="#" class="btn">Daftar Sekarang</a>
</div>

<!-- FOOTER -->
<div class="footer">
    <div>
        <h4>TravelKu</h4>
        <p>Travel Umrah & Haji terpercaya</p>
    </div>
    <div>
        <h4>Kontak</h4>
        <p>Jakarta</p>
        <p>08123456789</p>
    </div>
    <div>
        <h4>Menu</h4>
        <p>Home</p>
        <p>Paket</p>
        <p>Login</p>
    </div>
</div>

<div class="copy">
    © 2026 TravelKu
</div>

</body>
</html>