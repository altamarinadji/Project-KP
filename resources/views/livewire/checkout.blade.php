<div class="container">
    <div class="row mt-4">
        <div class="col-md-9">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{route('keranjang')}}">Keranjang</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Checkout</li>
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
        <div class="col">
            <h4>Informasi Pembayaran</h4>
            <hr>
            <p>Untuk pembayaran dapat ditransfer ke rekening dibawah ini sebesar: <br><strong>Rp. {{number_format($total_harga)}}</strong></p>
            <div class="media">
                <img class="mr-3" src="{{url('assets/mandiri.png')}}" alt="Bank BRI" width="70">
                <div class="media-body">
                    <h5 class="mt-0">BANK MANDIRI</h5>
                    No. Rekening <strong>140-001-935-8986</strong> atas nama : <br>
                    <strong>Deny Indra Prasetyo</strong>
                </div>
            </div>
        </div>
        <div class="col">
            <h4>Lengkapi Data Berikut</h4>
            <hr>
            <form wire:submit.prevent="checkout">
                <div class="form-group">
                    <label for="">No. HP</label>
                    <input id="nohp" type="text" class="form-control @error('nohp') is-invalid @enderror" wire:model="nohp" value="{{ old('nohp') }}" autocomplete="nohp" autofocus>

                    @error('nohp')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="">Alamat</label>
                    <textarea wire:model="alamat" class="form-control @error('alamat') is-invalid @enderror"></textarea>

                    @error('')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <button type="submit" class="btn btn-success btn-block"><i class="fas fa-arrow-right"></i> Checkout</button>
            </form>
        </div>
    </div>
</div>