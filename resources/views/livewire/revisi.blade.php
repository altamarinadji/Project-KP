<div class="container">
    <div class="row mt-4">
        <div class="col-md-9">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{route('keranjang')}}">Keranjang</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Revisi</li>
                </ol>
            </nav>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            @if(session()->has('message'))
            <div class="alert alert-success">
                {{session('message')}}
            </div>
            @endif
        </div>
    </div>

    <div class="row">
        <div class="col">
            <a href="{{route('keranjang')}}" class="btn btn-sm btn-dark"><i class="fas fa-arrow-left"></i> Kembali</a>
        </div>
    </div>

    <div class="row mt-4">
        
        <div class="col-md-6" style="margin: auto;">
            <h4>Detail Revisi</h4>
            <hr>
            <form wire:submit.prevent="revisi">
                
                    <input type="text" wire:model="idpesdet" name="idpesdet" hidden>
                <div class="form-group">
                    <label for="">Deskripsi Revisi:</label>
                    <textarea wire:model="revisi" name="revisi" class="form-control "></textarea>

                    
                </div>
                <div class="form-group">
                    <label for="">Deskripsi Revisi:</label>
                    <input type="file" name="contoh_model" wire:model="contoh_model" class="form-control">

                  
                </div>
                <button type="submit" class="btn btn-success btn-block">Simpan</button>
            </form>
        </div>
    </div>
</div>