$('#bank_select').on('change', function(e) {
    let value = e.target.value;
    if (value === "others") {
        document.getElementById('other_bank_text').style.display = 'block';
    } else {
        document.getElementById('other_bank_text').style.display = 'none';
    }
});

$('#bukti').on('change',function(e){
    //get the file name
    var fileName = e.target.files[0].name;
    console.log(fileName);
    //replace the "Choose a file" label
    $(this).next('.custom-file-label').html(fileName);
});

var rupiah = document.getElementById("nominal");
rupiah.addEventListener("keyup", function(e) {
    // tambahkan 'Rp.' pada saat form di ketik
    // gunakan fungsi formatRupiah() untuk mengubah angka yang di ketik menjadi format angka
    rupiah.value = formatRupiah(this.value, "Rp. ");
});

/* Fungsi formatRupiah */
function formatRupiah(angka, prefix) {
    var number_string = angka.replace(/[^,\d]/g, "").toString(),
    split = number_string.split(","),
    sisa = split[0].length % 3,
    rupiah = split[0].substr(0, sisa),
    ribuan = split[0].substr(sisa).match(/\d{3}/gi);

    // tambahkan titik jika yang di input sudah menjadi angka ribuan
    if (ribuan) {
        separator = sisa ? "." : "";
        rupiah += separator + ribuan.join(".");
    }

    rupiah = split[1] != undefined ? rupiah + "," + split[1] : rupiah;
    return prefix == undefined ? rupiah : rupiah ? "Rp. " + rupiah : "";
}