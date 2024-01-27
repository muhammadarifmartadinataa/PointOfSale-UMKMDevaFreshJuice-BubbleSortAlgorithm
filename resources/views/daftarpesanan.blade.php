@extends('layout.admin')
@push('css')

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" integrity="sha512-3pIirOrwegjM6erE5gPSwkUzO+3cTjpnV9lexlNZqvupR64iZBnOOTiiLPb9M36zpMScbmUNIcHUqKD47M719g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    
@endpush
@section('content')
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Daftar Pesanan</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="/home">Home</a></li>
            <li class="breadcrumb-item active">Daftar Pesanan</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <div class="container">
    <div class="row g-3 align-items-center">
      <div class="col-auto">
        <label for="inputPassword6" class="col-form-label">Searching</label>
      </div>
      <div class="col-auto">
        <form action="/daftarpesanan" method="GET">
          <input type="search" id="inputPassword6" name="search" class="form-control" aria-describedby="passwordHelpInline">
        </form>
      </div>
      <div class="col-auto">
        <a href="exportexcel"class="btn btn-info">Export Excel</a>
      </div>
      <div class="col-auto">
        <a href="/tambahpesanan"  class="btn btn-success ">Tambah Pesanan</a>
      </div>
    </div>
  <div class="row">
  
    
    <table class="table table-dark table-bordered mt-2" >
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Nama Pemesan</th>
          <th scope="col">Nama Jus</th>
          <th scope="col">Harga</th>
          <th scope="col">Dibuat</th>
          <th scope="col">Qty</th>
          <th scope="col">Total Harga</th>
          <th scope="col">Aksi</th>
        </tr>
      </thead>
      <tbody>
        @php
            $no = 1;
        @endphp
        @foreach ($data as $index => $row)
        <tr>
          <th scope="row">{{$index + $data->firstItem() }}</th>
          <td>{{$row->nama}}</td>
          <td>{{$row->namajus}}</td>
          <td>{{$row->harga}}</td>
          <td>{{$row->created_at->format('D M Y')}}</td>
          <td>{{$row->qty}}</td>
          <td>{{$row->totalharga}}</td>
          <td>
            <a href="/tampildata/{{$row->id}}"  class="btn btn-info">Edit</a>
            <a href="/delete/{id}"class="btn btn-danger delete" data-id="{{$row->id}}"data-nama="{{$row->nama}}">Delete</a>
          </td>
        </tr>
        @endforeach
        
      </tbody>
    </table>
    {{ $data->links() }}
  
    </div>
  </div>
</div>
@endsection
@push('scripts')
<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>

<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

</body>
<script>
$('.delete').click(function(){
  var id =$(this).attr('data-id');
  var nama =$(this).attr('data-nama');

    swal({
      title: "Yakin?",
      text: "Kamu Akan Menghapus Data Pesanan"+nama+" ",
      i
      con: "warning",
      buttons: true,
      dangerMode: true,
    })
    .then((willDelete) => {
      if (willDelete) {
        window.location = "/delete/"+id+" ",
       swal("Data Berhasil Di Hapus", {
         icon: "success",
      });
      } else {
        swal("Data Tidak Jadi DiHapus");
      }
    });
});
</script>
<script>
@if (Session::has('success'))
  toastr.success("{{Session::get('success') }}")
@endif
</script>
    
@endpush