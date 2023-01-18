@extends('layouts.master')

@section('content');
<section class="section">
    <div class="section-header">
        <h1>Student</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
        </div>
    </div>

    <div class="section-body">
        @foreach($data as $dt)
        <h2 class="section-title">Hi, {{ $dt['name']}}!</h2>
        @endforeach
        <p class="section-lead">Selamat Datang</p>
        <br>
        @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
        @endif
        @if (session('waiting'))
        <div class="alert alert-warning">
            {{ session('waiting') }}
        </div>
        @endif
    </div>
</section>
@endsection