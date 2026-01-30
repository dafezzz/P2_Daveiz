<!DOCTYPE html>
<html>
<head>
<style>
body{
    font-family:"Times New Roman";
    padding:50px;
    line-height:1.7;
    background:white;
}
.top-right{
    text-align:right;
    margin-bottom:20px;
}
h2{
    text-align:center;
    letter-spacing:1px;
}
</style>
</head>
<body>

<div class="top-right">
    <span id="p_kota"></span>
</div>

<h2>JOB APPLICATION LETTER</h2>

<p>
Email: <span id="p_email"></span><br>
Phone: <span id="p_phone"></span><br>
Alamat: <span id="p_alamat"></span>
</p>

<p>
Dear HRD <b><span id="p_company"></span></b>,
</p>

<p id="p_body"></p>

<br>

<p>
Regards,<br><br>
<b id="p_name"></b>
</p>

<script>
window.addEventListener("message", function(e){
    const d = e.data || {};
    document.getElementById("p_kota").innerText = d.kota || "";
    document.getElementById("p_name").innerText = d.name || "";
    document.getElementById("p_email").innerText = d.email || "";
    document.getElementById("p_phone").innerText = d.phone || "";
    document.getElementById("p_alamat").innerText = d.alamat || "";
    document.getElementById("p_company").innerText = d.company || "";
    document.getElementById("p_body").innerText = d.body || "";
});
</script>

</body>
</html>
