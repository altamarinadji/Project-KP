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
            <h2 class="pageheader-title">Master Pelanggan</h2>
            <p class="pageheader-text"></p>
            <div class="page-breadcrumb">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a class="breadcrumb-link">Master</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Master Pelanggan</li>
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
                    <h3 class="card-header m-4 text-left">Daftar Pelanggan</h3>

                </div>
            </div>




            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered first">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Id</th>
                                <th scope="col">Nama</th>
                                <th scope="col">Email</th>
                                <th scope="col">Alamat</th>
                                <th scope="col">No. Hp</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($pelanggan as $pelanggan)
                            <tr>
                            <?php $no=1; ?>
                                <td><?php echo $no; ?></td>
                                <td>{{ $pelanggan->id}}</td>
                                <td>{{ $pelanggan->name}}</td>
                                <td>{{ $pelanggan->email}}</td>
                                <td>{{ $pelanggan->alamat}}</td>
                                <td>{{ $pelanggan->nohp}}</td>
                                <td>
                                    <a href="master_pelanggan/edit/{{ $pelanggan->id }}" class="badge badge-pill badge-warning">Ubah</a>
                                    <a href="master_pelanggan/destroy/{{ $pelanggan->id }}" class="badge badge-pill badge-danger">Hapus</a>
                                </td>
                            </tr>
                            <?php $no=$no+1; ?>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>



@endsection