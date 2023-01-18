<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PDF View</title>
    <style>
        * {
            box-sizing: border-box;
            font-family: 'poppins', sans-serif;
        }

        .column {
            float: left;
            width: 50%;
            padding: 10px;
            height: 600px;
        }

        .row:after {
            content: "";
            display: table;
            clear: both;
        }
    </style>
</head>

<body>
    <h2 style="text-align: center;">
        TANDA BUKTI PENDAFTARA <br>
        SMK Wikrama Bogor TP.2023-2024
    </h2>
    <div class="row">
        <div class="column">
            <h2 style="background-color:#aaa; font-size: 17px;">I. BIODATA CALON PESERTA DIDIK</h2>
            <div class="text" style="font-size: 14px; font-weight: bold;">
                <p>TANGGAL DAFTAR : {{ $data ['created_at'] }}</p>
                <p>NOMOR SELEKSI : {{ $data['id']}}</p>
                <p>NAMA LENGKAP : {{ $data['name']}}</p>
                <p>NISN : {{ $data ['nisn'] }}</p>
                <p>ASAL SEKOLAH : {{ $data['asal_sekolah']}}</p>
                <p>NO HP : {{ $data['no_hp']}}</p>
                <p>EMAIL : {{ $data['email']}}</p>
                <p>NO HP Ayah : {{ $data['no_hp_ayah']}}</p>
                <p>NO HP Ibu : {{ $data['no_hp_ibu']}}</p>
            </div>

            <h2 style="background-color:#aaa; font-size: 17px;">II. INFORMASI DAN PERSYARATAN</h2>
            <div class="">
                <p>
                    <b>A. Akun Anda</b> <br>
                    Akses <a href="/login">ppdb-smkwikrama/student</a>, login gunakan <br>
                    Email : {{ $data['email']}}<br>
                    Password : {{ $data ['nisn'] }}<br>
                    Akun ini digunakan untuk mengecek status pendaftaran pada SIM PPDB SMK Wikrama Bogor.

                </p>
            </div>

        </div>
        <div class="column">
            <div class="">
                <p>
                    <b>B. Foto/Scan Dokumen yang Harus Dipersiapkan</b> <br>
                    1. Persyaratan satu <br>
                    2. Persyaratan dua <br>
                    3. Persyaratan tiga <br>
                    <b>C. Biaya Seleksi</b> <br>
                    Pembayaran uang seleksi sebesar Rp. 200.000 melalui transfer bank: <br>
                    Bank BNI: 1234567890 A.N SMK Wikrama Sekolah.
                </p>
            </div>
        </div>
    </div>
</body>

</html>