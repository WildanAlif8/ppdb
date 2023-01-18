@extends('layout')

@section('content')
<div style="background: rgb(2,0,36); background: linear-gradient(204deg, rgba(2,0,36,1) 0%, rgba(9,9,121,1) 46%, rgba(0,212,255,1) 100%); height: 100vh;">
    <div class="d-flex justify-content-center">
        <div class="card border-dark mb-3" style="max-width: 30rem; margin-top: 40px;">
            <div class="card-body text-dark">
                <h5 class="card-title mb-3" style="text-align: center;">Form Pendaftaran PPDB </h5>
                <h5 class="card-title mb-4" style="text-align: center; color: grey;">SMK Wikrama Bogor TP. 2023-2024</h5>
                <form action="{{route('create.account')}}" method="POST">
                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                    @if (session('done'))
                    <div class="alert alert-success">
                        {{ session('done') }}
                    </div>
                    <script>
                        window.open("{{route('download', Session::get('id'))}}");
                    </script>
                    @endif
                    @csrf
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label>NISN</label>
                            <input name="nisn" type="number" class="form-control" placeholder="Masukan NISN">
                        </div>
                        <div class="form-group col-md-6">
                            <label>Jenis Kelamin</label>
                            <select name="jenis_kelamin" id="inputState" class="form-control">
                                <option selected hidden disabled>--Jenis Kelamin--</option>
                                <option>Perempuan</option>
                                <option>Laki-Laki</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Nama</label>
                        <input name="name" type="text" class="form-control" id="inputAddress" placeholder="Masukan Nama Lengkap">

                    </div>
                    <div class="form-group">
                        <label>Asal Sekolah</label>
                        <select name="asal_sekolah" id="AsalSekolah" class="form-control">
                            <option selected hidden disabled>--Pilih Asal Sekolah--</option>
                            <option value="SMPN 1 Cigombong">SMPN 1 Cigombong</option>
                            <option value="SMPN 1 Caringin">SMPN 1 Caringin</option>
                            <option value="lainnya">Lainnya...</option>
                        </select>
                    </div>
                    <div class="form-group" id="other" style="display:none;">
                        <label>Asal Sekolah</label>
                        <input name="SekolahLainnya" class="form-control" type="text" placeholder="Pilih asal Sekolah" />
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input name="email" type="email" class="form-control" id="inputAddress" placeholder="Masukan email aktif">

                    </div>
                    <div class="form-group">
                        <label>No Handphone</label>
                        <input name="no_hp" type="number" class="form-control" id="inputAddress" placeholder="Contoh: 08------">

                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label>No HP Ayah</label>
                            <input name="no_hp_ayah" type="number" class="form-control" id="inputAddress" placeholder="Contoh: 08------">

                        </div>
                        <div class="form-group col-md-6">
                            <label>No HP Ibu</label>
                            <input name="no_hp_ibu" type="number" class="form-control" id="inputAddress" placeholder="Contoh: 08------">

                        </div>
                    </div>
                    <button type="submit" class="btn btn-warning mr-1">Registrasi</button>
                    <a href="/login" class="btn btn-warning" style="margin-left: 35vh;">Login</a>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    $('#AsalSekolah').on('change', function() {
        if ($(this).val() === "lainnya") {
            $("#other").show()
        } else {
            $("#other").hide()
        }
    });
</script>

@endsection