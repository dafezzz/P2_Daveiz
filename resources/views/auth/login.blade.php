<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Surat Lamaran Live Preview</title>

<style>
body{
    margin:0;
    font-family:Arial;
    background:#eaeaea;
}
.container{
    display:flex;
    height:100vh;
}
.left{
    width:40%;
    padding:20px;
    background:#ffffff;
    box-shadow:2px 0 8px rgba(0,0,0,0.1);
    overflow:auto;
}
.right{
    width:60%;
    background:#fafafa;
}
h3{
    margin-top:0;
    text-align:center;
}
label{
    font-size:13px;
    font-weight:bold;
}
input,textarea{
    width:100%;
    padding:10px;
    margin-bottom:12px;
    border:1px solid #ccc;
    border-radius:5px;
}
button{
    padding:10px 15px;
    border:none;
    border-radius:5px;
    cursor:pointer;
}
.btn-print{
    background:#2c7be5;
    color:white;
}
.btn-clear{
    background:#dc3545;
    color:white;
}
iframe{
    width:100%;
    height:100%;
    border:none;
}
.btn-group{
    display:flex;
    gap:10px;
}
</style>
</head>

<body>

<div class="container">

<!-- FORM -->
<div class="left">
<h3>Form Surat Lamaran</h3>

<label>Kota & Tanggal</label>
<input id="kota" placeholder="Bandung, 30 Januari 2026">

<label>Nama Penyusun</label>
<input id="name" placeholder="Nama Lengkap">

<label>Email</label>
<input id="email">

<label>No HP</label>
<input id="phone">

<label>Alamat</label>
<input id="alamat">

<label>Nama Perusahaan</label>
<input id="company">

<label>Isi Surat</label>
<textarea id="body" rows="6"></textarea>

<div class="btn-group">
    <button class="btn-print" onclick="printPdf()">Cetak PDF</button>
    <button class="btn-clear" onclick="clearForm()">Clear</button>
</div>
</div>

<!-- PREVIEW -->
<div class="right">
    <iframe id="preview" src="{{ route('preview') }}"></iframe>
</div>

</div>

<script>
const iframe = document.getElementById("preview");

function updatePreview(){
    iframe.contentWindow.postMessage({
        kota: document.getElementById("kota").value,
        name: document.getElementById("name").value,
        email: document.getElementById("email").value,
        phone: document.getElementById("phone").value,
        alamat: document.getElementById("alamat").value,
        company: document.getElementById("company").value,
        body: document.getElementById("body").value
    }, "*");
}

document.querySelectorAll("input, textarea").forEach(el=>{
    el.addEventListener("input", updatePreview);
});

function clearForm(){
    document.querySelectorAll("input, textarea").forEach(el=>el.value="");
    updatePreview();
}

function printPdf(){
    iframe.contentWindow.print();
}
</script>

</body>
</html>
