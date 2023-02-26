<div class="container">
    <div class="row mt-4">
        <div class="col-md-9">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Pesan Product</li>
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
        <div class="col-md-6">
            <div class="card ">
                <div class="card-body">
                    <H3>Cara Pemesanan</H3>
                    <ol>
                        <li>Masukkan ukuran {{$product->nama_pro}} yang ingin dipesan (Panjang, Lebar, dan Tinggi)</li>
                        <li>Pilih bahan yang akan digunakan</li>
                        <li>Masukkan contoh model produk (Opsional)</li>
                        <li>Setelah itu masukkan pesanan dalam keranjang</li>
                        <li>Admin akan membuat contoh model dari detail pesanan produk dan estimasi biaya</li>
                        <li>Pelanggan dapat melihat contoh model yang di buat pada keranjang dan melihat estimasi biaya</li>
                        <li>Pelanggan dapat melakukan revisi model apabila belum sesuai</li>
                        <li>Apabila model sudah sesuai pelanggan dapat melakukan checkout dan melakukan pembayaran</li>
                        <li>Status pembayaran akan diperbarui paling lambat 1x24 jam dan dapat dilihat pada menu history</li>
                        <li>Apabila ada pertanyaan lebih lanjut silahkan pilih menu <strong>Hubungi Kami</strong> untuk bertanya via WhatsApp </li>
                    </ol>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <h2>
                <strong>{{$product->nama_pro}}</strong>

            </h2>
            <hr>
            <div class="row">
                <div class="col-md-12">
                    <form wire:submit.prevent="masukkankeranjang">
                        <table class="table" style="border-top: hidden;">
                            <tr>
                                <td>Jumlah</td>
                                <td>: </td>
                                <td>
                                    <input id="jumlah_pesanan" type="number" class="form-control @error('jumlah_pesanan') is-invalid @enderror" wire:model="jumlah_pesanan" value="{{ old('jumlah_pesanan') }}" required autocomplete="jumlah_pesanan" autofocus>

                                    @error('jumlah_pesanan')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </td>
                            </tr>
                            <tr>
                                <td>Panjang</td>
                                <td>: </td>
                                <td>
                                    <input id="panjang" type="number" class="form-control @error('panjang') is-invalid @enderror" wire:model="panjang" value="{{ old('panjang') }}" required autocomplete="panjang" autofocus>

                                    @error('panjang')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror

                                </td>
                                <td>Cm</td>
                            </tr>
                            <tr>
                                <td>Lebar</td>
                                <td>: </td>
                                <td>
                                    <input id="lebar" type="number" class="form-control @error('lebar') is-invalid @enderror" wire:model="lebar" value="{{ old('lebar') }}" required autocomplete="lebar" autofocus>

                                    @error('lebar')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror

                                </td>
                                <td>Cm</td>
                            </tr>
                            <tr>
                                <td>Tinggi</td>
                                <td>: </td>
                                <td>
                                    <input id="tinggi" type="number" class="form-control @error('tinggi') is-invalid @enderror" wire:model="tinggi" value="{{ old('tinggi') }}" required autocomplete="tinggi" autofocus>

                                    @error('tinggi')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror

                                </td>
                                <td>Cm</td>
                            </tr>

                            <tr>
                                <td>Warna Aluminium</td>
                                <td>: </td>
                                <td colspan="2">
                                    <select name="warna" class="form-control @error('warna') is-invalid @enderror" wire:model="warna" required autocomplete="warna">
                                        <option value="">-</option>
                                        <option value="Coklat">Coklat</option>
                                        <option value="Putih">Putih</option>
                                        <option value="Abu-abu">Abu-abu</option>
                                        <option value="Hitam">Hitam</option>
                                    </select>
                                    @error('warna')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror

                                </td>

                            </tr>
                            <tr>
                                <td colspan="4">
                                    <h3><strong>Pilih Bahan</strong></h3>
                                </td>
                            </tr>
                            <tr>
                                <td>Aluminium</td>
                                <td>: </td>
                                <td colspan="2">
                                    <select name="aluminium" class="form-control @error('aluminium') is-invalid @enderror" wire:model="aluminium" required autocomplete="aluminium">
                                        <option value="">-</option>
                                        @foreach($aluminiums as $aluminium)
                                        <option value="{{$aluminium->nama_bb}}">{{ $aluminium->nama_bb }} </option>
                                        @endforeach
                                    </select>
                                    @error('aluminium')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror

                                </td>

                            </tr>
                            @if($product->Kaca=="")
                            @else
                            <tr>
                                <td>Kaca (Optional)</td>
                                <td>: </td>
                                <td colspan="2">
                                    <select name="kaca" class="form-control @error('kaca') is-invalid @enderror" wire:model="kaca">
                                        <option value="">Tidak Pakai</option>
                                        @foreach($kacas as $kaca)
                                        <option value="{{ $kaca->nama_bb}}">{{ $kaca->nama_bb }} </option>
                                        @endforeach
                                    </select>
                                    @error('kaca')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </td>
                            </tr>
                            @endif
                            @if($product->Triplek=="")
                            @else
                            <tr>
                                <td>triplek (Optional)</td>
                                <td>: </td>
                                <td colspan="2">
                                    <select name="triplek" class="form-control @error('triplek') is-invalid @enderror" wire:model="triplek">
                                        <option value="">Tidak Pakai</option>
                                        @foreach($tripleks as $triplek)
                                        <option value="{{ $triplek->nama_bb}}">{{ $triplek->nama_bb }} </option>
                                        @endforeach
                                    </select>
                                    @error('triplek')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror

                                </td>
                            </tr>
                            @endif
                            <tr>
                                <td>Deskripsi Pesanan (Opsional)</td>
                                <td>: </td>
                                <td colspan="2">
                                    <textarea wire:model="deskripsi" class="form-control @error('deskripsi') is-invalid @enderror"></textarea>

                                    @error('')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </td>
                            </tr>
                            <tr>
                                <td>Contoh Model (Opsional)</td>
                                <td>: </td>
                                <td colspan="2">
                                <input type="file" name="contoh_model" wire:model="contoh_model">
                                </td>
                            </tr>

                            <tr>
                                <td colspan="4">
                                    <button type="submit" class="btn btn-dark btn-block"><i class="fas fa-shopping-cart"></i> Masukkan Keranjang</button>
                                </td>
                            </tr>
                        </table>
                    </form>

                </div>
            </div>
        </div>
    </div>