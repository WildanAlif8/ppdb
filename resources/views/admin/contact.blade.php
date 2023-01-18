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
                    <th>Nama</th>
                    <th>No Telepon</th>
                    <th>Pesan</th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 1; ?>
                @foreach($contact as $feedback)
                <tr>
                    <td>{{$i++}}</td>
                    <td>{{ $feedback['name']}}</td>
                    <td><a href="https://api.whatsapp.com/send?phone={{ $feedback['no_tlpn']}}">0{{ $feedback['no_tlpn']}}</a></td>
                    <td>{{ $feedback['message']}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</section>

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