<!DOCTYPE html>
<html>
<head>
    <title>Tamu Undangan</title>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>
    <h1>Hai, {{ $nama }} anda di undang di acara kami!</h1>
     <div class="visible-print">
      {!! QrCode::size(100)->generate($nama); !!}
      </div>
      <div id="reader" style="width: 600px"></div>

    <!-- Tampilkan informasi tamu undangan lainnya -->
</body>
<script src="https://unpkg.com/html5-qrcode" type="text/javascript"></script>

<script>
  // Buat objek untuk menyimpan status pemindaian tamu
  let lastScanTime = 0;
  let tamuPemindaian = {};

  function onScanSuccess(decodedText, decodedResult) {

     const now = new Date().getTime();
     if (now - lastScanTime >= 3000) {
        lastScanTime = now;
    // Periksa apakah tamu telah memindai sebelumnya
    if (tamuPemindaian[decodedText]) {
  
      // Tamu telah memindai sebelumnya, tampilkan peringatan
      Swal.fire({
            title: 'Anda sudah melakukan scan QR Code',
            icon: 'warning',
            timer: 2000,
            showConfirmButton: true
        });
    } else {
      // Tamu belum memindai sebelumnya, simpan status pemindaian
      tamuPemindaian[decodedText] = true;

      // Tampilkan pesan selamat datang
      Swal.fire({
            title: 'Silahkan masuk, anda terdaftar dalam undangan',
            icon: 'success',
            timer: 2000,
            showConfirmButton: true
        });
      
      // Lanjutkan dengan pemrosesan pemindaian
      console.log(`Code matched = ${decodedText}`, decodedResult);
    }

    }

    }

    function onScanFailure(error) {
        console.warn(`Code scan error = ${error}`);
    }

    let html5QrcodeScanner = new Html5QrcodeScanner(
        "reader",
        { fps: 10, qrbox: { width: 250, height: 250 } },
        false
    );
    html5QrcodeScanner.render(onScanSuccess, onScanFailure);
    
</script>


</html>
