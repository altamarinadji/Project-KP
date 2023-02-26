<div class="container">
    <!-- BANNER -->
    
    <div class="row">
        <div class="col-md-12">
            @if(session()->has('message'))
            <div class="alert alert-success">
                {{session('message')}}
            </div>
            @endif
        </div>
    </div>
    
    <div class="banner">
        <img src="{{url('assets/slider/slider1.png')}}" alt="">
    </div>

    <!-- Best Product -->
    <section class="best-product mt-4">
        <h3>
            <strong>Pilih Jenis Furniture</strong>
            
        </h3>
        <div class="row mt-4">
            @foreach($products as $product)
            <div class="col-md-3 mb-2">
                <div class="card shadow">
                    <div class="card-body text-center">
                        <div class="row mt-2">
                            <div class="col-md-12">
                                <h5><strong>{{$product->nama_pro}}</strong></h5>
                            </div>
                        </div>
                        <img src="imageup/{{$product->gambar_pro}}" class="img-fluid" alt="" style='width:320px; height:200px;'>
                        <p class="mt-2" style="text-align: left;"><strong>*Gambar hanya contoh</strong> </p>

                        <div class="row mt-2">
                            <div class="col-md-12">
                            <a href="{{route('pesan',$product->id_pro)}}" class="btn btn-success btn-block"><i class="fas fa-shopping-cart"></i> Pesan</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <div class="row">
            <div class="col mt-2">
                {{$products->links()}}
            </div>
        </div>
    </section>
    </section>
</div>