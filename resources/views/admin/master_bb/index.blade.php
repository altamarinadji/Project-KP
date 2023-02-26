@extends('admin.main')
@section('content')


<div class="row">
    <div class="col-md-12">
        @if(session()->has('message'))
        @if( session('message')== 'Data Telah Dihapus')
        <div class="alert alert-danger">
            {{session('message')}}
        </div>
        @else
        <div class="alert alert-success">
            {{session('message')}}
        </div>
        @endif
        @endif
    </div>
</div>

<div class="row">
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
        <div class="page-header">
            <h2 class="pageheader-title">Master Bahan Baku</h2>
            <p class="pageheader-text"></p>
            <div class="page-breadcrumb">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a class="breadcrumb-link">Master</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Master Bahan Baku</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <!-- ============================================================== -->
    <!-- basic table  -->
    <!-- ============================================================== -->
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
        <div class="card">
            <div class="container">
                <div class="row">
                    <h3 class="card-header m-4 text-left">Daftar Bahan Baku</h3>
                    <div class="col text-right m-4">
                        <a href="{{route('master_bb.create') }}" class="btn btn-primary mb-1">Tambah Bahan Baku</a>
                    </div>
                </div>
            </div>




            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered first">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Id</th>
                                <th scope="col">Nama Bahan Baku</th>
                                <th scope="col">Jenis</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php $no=1 ?>
                            @foreach ($bb as $bb)
                            <tr>
                                <td><?php echo $no; ?></td>
                                <td>{{ $bb->id_bb}}</td>
                                <td>{{ $bb->nama_bb}}</td>
                                <td>{{$bb->nama_jenis}}</td>
                                
                                <td>
                                    <a href="master_bb/edit/{{ $bb->id_bb }}" class="badge badge-pill badge-warning">Ubah</a>
                                    <a href="master_bb/destroy/{{ $bb->id_bb }}" class="badge badge-pill badge-danger">Hapus</a>
                                </td>
                            </tr>
                            <?php $no = $no + 1; ?>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>



@endsection