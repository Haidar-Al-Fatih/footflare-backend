<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Produk - FootFlare</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-4">
        <div class="container">
            <a class="navbar-brand" href="{{ route('admin.products.index') }}">FOOTFLARE <span class="text-warning">ADMIN</span></a>
        </div>
    </nav>

    <div class="container mb-5" style="max-width: 750px;">
        <div class="card border-0 shadow-sm p-4" style="border-radius: 12px;">
            <h4 class="mb-4 fw-bold text-dark">Form Tambah Produk Sepatu</h4>

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="m-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                
                <div class="mb-3">
                    <label class="form-label fw-semibold">Nama Produk Sepatu</label>
                    <input type="text" name="name" class="form-control" placeholder="Contoh: Swift Glide Sprinter Soles" value="{{ old('name') }}" required>
                </div>

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-semibold">Brand / Merk</label>
                        <select name="brand_id" class="form-select" required>
                            <option value="">-- Pilih Brand --</option>
                            @foreach($brands as $brand)
                                <option value="{{ $brand->id }}" {{ old('brand_id') == $brand->id ? 'selected' : '' }}>
                                    {{ $brand->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-semibold">Kategori</label>
                        <select name="category_id" class="form-select" required>
                            <option value="">-- Pilih Kategori --</option>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                                    {{ $category->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-semibold">Harga Sepatu (USD / Rupiah)</label>
                        <input type="number" name="price" class="form-control" placeholder="Contoh: 199" value="{{ old('price') }}" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-semibold">Diskon (%) - *Opsional</label>
                        <input type="number" name="discount_percentage" class="form-control" placeholder="Contoh: 30" min="0" max="100" value="{{ old('discount_percentage') }}">
                    </div>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold">Deskripsi Produk</label>
                    <textarea name="description" class="form-control" rows="4" placeholder="Tuliskan spesifikasi produk sepatu disini..." required>{{ old('description') }}</textarea>
                </div>

                <div class="mb-4">
                    <label class="form-label fw-semibold">Unggah File Gambar (Thumbnail)</label>
                    <input type="file" name="thumbnail" class="form-control" accept="image/*" required>
                    <div class="form-text">Gambar ini akan menjadi representasi utama produk di halaman depan Flutter.</div>
                </div>

                <div class="d-flex justify-content-end gap-2">
                    <a href="{{ route('admin.products.index') }}" class="btn btn-light px-4" style="border-radius: 8px;">Batal</a>
                    <button type="submit" class="btn btn-dark px-4" style="border-radius: 8px;">Simpan Data Produk</button>
                </div>
            </form>
        </div>
    </div>

</body>
</html>