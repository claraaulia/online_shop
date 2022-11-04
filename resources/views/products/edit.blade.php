@extends('backend.layout')

@section('content')
<form method="POST" action="{{ route('products.update', ['id' => $product->id]) }}" class="mt-3"enctype="multipart/form-data">
      @csrf
      @method('PUT')
        @if ($errors->any())
            <div class="alert alert-danger">
                <div>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
            </div>
        @endif
    <div class="row mt-4">
        <div class="col-lg-6">
            <div class="mb-3">
                <label for="nama" class="form-label">nama produk</label>
                <input type="text" class="form-control" id="nama"
                name="nama" value="{{ $product->nama }}">
            </div>
        </div>
    <div class="col-lg-6">
        <div class="mb-3">
            <label for="gambar" class="form-label">Gambar</label>
            <input type="file" class="form-control" id="gambar"
             name="gambar"
        </div>
    </div>
    <div class="col-lg-6">
        <div class="mb-3">
            <label for="deskripsi" class="form-label">Deskripsi Produk</label>
            <input type="text" class="form-control" id="deskripsi"
             name="deskripsi" value="{{ $product->deskripsi }}">
        </div>
     </div>
     <div class="col-lg-6">
        <div class="mb-3">
            <label for="harga" class="form-label">Harga</label>
            <input type="number" class="form-control" id="harga"
            name="harga" value="{{ $product->harga }}">
        </div>
     </div>
    <div class="col-lg-6">
        <div class="mb-3">
        <label for="discount" class="form-label">discount</label>
        <input type="number" class="form-control" id="discount"
        name="discount" value="{{ $product->discount }}">
    </div>
</div>
<div class="col-lg-6">
    <div class="mb-3">
    <label for="discount" class="form-label">kategori</label>
    <select name="category_id" id="category_id" class="form-control">
   <option value="">pilih kategori</option>
        @foreach ($categories as $category )
        <option value="{{ $category->id }}">{{ $category-> id == $product->category_id ?
        'selected' :'' }}>{{ $category->nama }}</option>
        @endforeach
    </select>
</div>
</div>
    <div class="col-lg-12">
    <button type="submit" class="btn btn-primary">submit</button>
    </div>
</form>
@endsection

