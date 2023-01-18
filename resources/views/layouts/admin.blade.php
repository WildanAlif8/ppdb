@extends('layouts.admin')

@section('content')


<section class="section">
    <div class="section-header">
        <h1>Verifikasi Pembayaran</h1>
        <div class="section-header-breadcrumb">

            <div class="breadcrumb-item">Verifikasi pembayaran</div>
        </div>
    </div>
    <div class="section-body">
        <table id="data-admin" class="table table-striped table-bordered table-md" style="width: 100%; margin-top:5%; padding:2%;" cellspacing="1">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nomor Registrasi</th>
                    <th>Nama</th>
                    <th>Bukti Pembayaran</th>
                    <th>Detail Pembayaran</th>
                    <th>Action</th>

                </tr>
            </thead>
            <tbody>
                <?php $i = 1; ?>
                @foreach($pendaftaran as $show)
                <tr>
                    <td>{{$i++}}</td>
                    <td>{{ $show['id']}}</td>
                    <td>{{ $show['name']}}</td>
                    <td><a href="/bukti-pembayaran/{{$show ['id'] }}">Lihat</a></td>
                    <td>
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#data-{{$show['id']}}">
                            Detail
                        </button>
                    </td>
                    <td class="d-flex">
                        @if ($show->pembayaran == null)
                        Belum melakukan Pembayaran
                        @elseif ($show->pembayaran->status == 'Pending')
                        <form action="/admin-success/{{$show['id']}}" method="POST" class="mr-2">
                            @csrf
                            @method('PATCH')
                            <button type="submit" class="btn btn-success">validasi</button>
                        </form>
                        <form action="/admin-failed/{{$show['id']}}" method="POST">
                            @csrf
                            @method('PATCH')
                            <button type="submit" class="btn btn-danger">Tolak</button>
                        </form>
                        @elseif ($show->pembayaran->status == 'Success')
                        Success
                        @elseif ($show->pembayaran->status == 'Failed')
                        Failed

                        @endif
                    </td>

                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</section>

@foreach ($pendaftaran as $detail)
<div class="modal fade" id="data-{{$detail['id']}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Detail</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>
                    NISN: {{ $detail['nisn']}}<br>
                    Nama Siswa: {{ $detail['name']}}<br>
                    Jenis Kelamin: {{ $detail['jenis_kelamin']}}<br>
                    Asal Sekolah: {{ $detail['asal_sekolah']}}<br>
                    Email: {{ $detail['email']}}<br>
                    No Hp: {{ $detail['no_hp']}}<br>
                    No Hp Ayah: {{ $detail['no_hp_ayah']}}<br>
                    No Hp Ibu: {{ $detail['no_hp_ibu']}}<br>
                </p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
@endforeach

<script src="../../assets/admin/dataTables/js/jquery.dataTables.min.js"></script>
<script src="../../assets/admin/dataTables/js/dataTables.bootstrap4.min.js"></script>
<script>
    $(document).ready(function() {
        $('#data-admin').DataTable({
            "iDisplayLength": 25
        });
    });
</script>


@endsection