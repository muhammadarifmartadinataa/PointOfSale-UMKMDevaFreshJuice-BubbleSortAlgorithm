@extends('layout.admin')
@section('content')
      <body>
    <h1 class="text-center mb-4">Edit Daftar Pesanan</h1>
    
    <div class="container">

      <div class="row justify-content-center">
        <div class="col-8">
          <div class="card">
            <div class="card-body">
              <form action="/updatedata/{{$data->id}} "method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                  <label for="exampleInputEmail1" class="form-label">Nama Pelanggan</label>
                  <input type="text" name="nama" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{$data->nama}}">
                </div>
                <div class="mb-3">
                  <label for="exampleInputEmail1" class="form-label">Nama Jus</label>
                  <select class="form-select" name="namajus" aria-label="Default select example">
                    <option selected>{{$data->namajus}}</option>
                    <option value="Apel Mix Tomat"></option>
                    <option value="Apel Mix Strawberry">Apel Mix Strawberry</option>
                    <option value="Wortel Mix Tomat">Wortel Mix Tomat</option>
                    <option value="Sirsak Mix Tomat">Sirsak Mix Tomat</option>
                    <option value="Timun Mix Jeruk">Timun Mix Jeruk</option>
                    <option value="Mangga">Mangga</option>
                    <option value="Apel">Apel</option>
                    <option value="Alpukat">Alpukat</option>
                    <option value="Jambu">Jambu</option>
                    <option value="Buah Naga">Buah Naga</option>
                    <option value="Strawberry">Strawberry</option>
                    <option value="Sirsak">Sirsak</option>
                    <option value="Lemon">Lemon</option>
                    <option value="Anggur">Anggur</option>
                    <option value="Jeruk">Jeruk</option>
                    <option value="Semangka">Semangka</option>
                  </select>
                  
                </div>
                <div class="mb-3">
                  <label for="exampleInputEmail1" class="form-label">Harga</label>
                   <select class="form-select" name="harga" aria-label="Default select example">
                    <option selected>{{$data->harga}}</option>
                    <option value="5000">Rp.5000</option>
                    <option value="8000">Rp.8000</option>
                   </select>
                </div>
                <div class="mb-3">
                  <label for="exampleInputEmail1" class="form-label">Qty</label>
                  <input type="number" name="qty" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"value="{{$data->qty}}">
                </div>
                <div class="mb-3">
                  <label for="exampleInputEmail1" class="form-label">Total Hrga</label>
                  <input type="number" name="totalharga" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"value="{{$data->totalharga}}">
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
              </form>  
              
            </div>
  
          </div>
        </div>
        
      </div>
    </div>

    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <!-- Sebelum menutup </body> tag -->


  </body>
@endsection