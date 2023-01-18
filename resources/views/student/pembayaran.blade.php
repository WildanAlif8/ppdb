@extends('layouts.master')

@section('content');
<section class="section">
    <div class="section-header">
        <h1>Pembayaran</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="/dashboard">Dashboard</a></div>
        </div>
    </div>

    <div class="section-body">
        <h2 class="section-title">Pembayaran</h2>
        <p class="section-lead"></p>
        <br>
        @if ($payment == null)
        <form method="POST" action="{{route('create.pembayaran')}}" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col">
                    <div class="card">
                        <div class="card-header">
                            <h4>Form Pembayaran</h4>
                        </div>
                        <div class="card-body">
                            <div class="row align-items-start">
                                <div class="col-sm-4">
                                    <label>Nama Bank</label>
                                    <select name="nama_bank" id="NamaBank" class="form-control">
                                        <option selected hidden disabled>--Pilih Bank--</option>
                                        <option value="PT BANK MANDIRI">PT BANK MANDIRI</option>
                                        <option value="PT BANK NEGARA INDONESIA">PT BANK NEGARA INDONESIA</option>
                                        <option value="other">Lainnya...</option>
                                    </select>
                                </div>

                                <div class="col-sm-4">
                                    <label>Nama Pemilik Rekening</label>
                                    <input type="text" class="form-control" name="name">
                                </div>

                                <div class="col-sm-4">
                                    <label>Nominal</label>
                                    <input type="text" id="nominal" name="nominal" class="form-control">
                                </div>
                            </div>
                            <div class="row align-items-start" id="other" style="display:none;">
                                <div class="col-sm-12">
                                    <label>Nama Bank atau Dompet Digital</label>
                                    <input name="bank_lainnya" class="form-control" type="text" placeholder="Masukan Nama Bank atau Dompet Digital" />
                                </div>
                            </div>
                            <div class="row align-items-start">
                                <div class="col-sm-12">
                                    <div class="mb-3">
                                        <label></label>
                                        <input class="form-control" type="file" id="image" name="image">
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="row align-items-start">

                                <div class="col-sm-8"></div>
                                <div class="col-sm-4">
                                    <input type="submit" value="Upload Bukti Pembayaran" class="btn btn-block btn-primary">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
        @elseif ($payment->status == 'Pending')
        <div class="alert alert-warning">
            <p>Pembayaran sedang diverifikasi, harap tunggu informasi selanjutnya.</p>
        </div>
        @elseif ($payment->status == 'Success')
        <div class="alert alert-primary">
            <p>Pembayaran di verifikasi, silahkan untuk melakukan proses selanjutnya.</p>
        </div>
        @elseif ($payment->status == 'Failed')
        <form method="POST" action="{{route('update')}}" enctype="multipart/form-data">
            @csrf
            @method('PATCH')
            <div class="row">
                <div class="col">
                    <div class="card">
                        <div class="card-header">
                            <h4>Form Pembayaran</h4>
                        </div>
                        <div class="card-body">
                            <div class="row align-items-start">
                                <div class="col-sm-4">
                                    <label>Nama Bank</label>
                                    <select name="nama_bank" id="NamaBank" class="form-control">
                                        <option selected hidden disabled>--Pilih Bank--</option>
                                        <option value="PT BANK MANDIRI">PT BANK MANDIRI</option>
                                        <option value="PT BANK NEGARA INDONESIA">PT BANK NEGARA INDONESIA</option>
                                        <option value="other">Lainnya...</option>
                                    </select>
                                </div>

                                <div class="col-sm-4">
                                    <label>Nama Pemilik Rekening</label>
                                    <input type="text" class="form-control" name="name" value="{{$payment['name']}}">
                                </div>

                                <div class="col-sm-4">
                                    <label>Nominal</label>
                                    <input type="text" id="nominal" name="nominal" class="form-control" value="{{$payment['nominal']}}">
                                </div>
                            </div>
                            <div class="row align-items-start" id="other" style="display:none;">
                                <div class="col-sm-12">
                                    <label>Nama Bank atau Dompet Digital</label>
                                    <input name="bank_lainnya" class="form-control" type="text" placeholder="Masukan Nama Bank atau Dompet Digital" />
                                </div>
                            </div>
                            <div class="row align-items-start">
                                <div class="col-sm-12">
                                    <div class="mb-3">
                                        <label></label>
                                        <input class="form-control" type="file" id="image" name="image">
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="row align-items-start">

                                <div class="col-sm-8"></div>
                                <div class="col-sm-4">
                                    <input type="submit" value="Upload Bukti Pembayaran" class="btn btn-block btn-primary">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
        @endif
    </div>
</section>

<script>
    $('#NamaBank').on('change', function() {
        if ($(this).val() === "other") {
            $("#other").show()
        } else {
            $("#other").hide()
        }
    });

    var nominal = document.getElementById("nominal");
    nominal.addEventListener("keyup", function(e) {
        nominal.value = convertRupiah(this.value, "Rp. ");
    });
    nominal.addEventListener('keydown', function(event) {
        return isNumberKey(event);
    });

    function convertRupiah(angka, prefix) {
        var number_string = angka.replace(/[^,\d]/g, "").toString(),
            split = number_string.split(","),
            sisa = split[0].length % 3,
            rupiah = split[0].substr(0, sisa),
            ribuan = split[0].substr(sisa).match(/\d{3}/gi);

        if (ribuan) {
            separator = sisa ? "." : "";
            rupiah += separator + ribuan.join(".");
        }

        rupiah = split[1] != undefined ? rupiah + "," + split[1] : rupiah;
        return prefix == undefined ? rupiah : rupiah ? prefix + rupiah : "";
    }

    function isNumberKey(evt) {
        key = evt.which || evt.keyCode;
        if (key != 188 // Comma
            &&
            key != 8 // Backspace
            &&
            key != 17 && key != 86 & key != 67 // Ctrl c, ctrl v
            &&
            (key < 48 || key > 57) // Non digit
        ) {
            evt.preventDefault();
            return;
        }
    }
</script>
@endsection