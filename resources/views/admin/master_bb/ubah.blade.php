@extends('admin.main')
@section('content')

<!-- Pageheader -->
<div class="row">
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
        <div class="page-header">
            <h2 class="pageheader-title">Ubah Bahan Baku</h2>
            <p class="pageheader-text"></p>
            <div class="page-breadcrumb">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a class="breadcrumb-link">Master</a></li>
                        <li class="breadcrumb-item"><a href="{{route('master_bb.index') }}" class="breadcrumb-link">Master Bahan Baku</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Ubah Bahan Baku</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>
<!-- end pageheader -->

<div class="row">
    <!-- ============================================================== -->
    <!-- basic form -->
    <!-- ============================================================== -->
    <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
        <div class="card">
            <h5 class="card-header">Form Ubah Product</h5>
            <div class="card-body">

                <form action="/master_bb/update/{{$bb->id_bb}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="nama">Jenis Bahan Baku</label>
                        <select name="jenis" class="form-control @error('jenis') is-invalid @enderror" wire:model="jenis" required autocomplete="jenis" >
                            <option value="{{$bb->jenis_bahan_id}}">{{ $bb->nama_jenis }} </option>
                            @foreach($bahan as $bahan)
                            @if($bahan->nama_jenis==$bb->nama_jenis)

                            @else
                            <option value="{{$bahan->id_jenis}}">{{ $bahan->nama_jenis }} </option>
                            @endif
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="nama">Nama Bahan Baku</label>
                        <input type="text" class="form-control" name="nama" placeholder="Nama bahan baku" value="{{ $bb->nama_bb}}" required>
                    </div>
                   
                    <div class="col-sm-12 pl-0">
                        <p class="text-right">
                        <button type="submit" class="btn btn-primary"> Ubah</button>
                        <a type="button" class="btn btn-danger " href="{{route('master_bb.index')}}">Batal</a>
                        </p>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


@endsection