@extends('layouts.admin')

@section('content');
<section class="section">
    <div class="section-header">
        <h1>Admin</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="/dashboard">Dashboard</a></div>
        </div>
    </div>

    <div class="section-body">
        <h2 class="section-title">Hi, Admin!</h2>
        <p class="section-lead">Selamat Datang</p>
        <br>
        <div class="card">
            <div class="card-body">

                @if($bukti->image)
                <img src="{{ asset('storage/' .$bukti->image) }}" alt="{{ $bukti->name }}" class="img-fluid mt-3">
                @endif
            </div>
        </div>
    </div>
</section>
@endsection