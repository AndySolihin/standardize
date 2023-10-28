<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>My App</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
  </head>
  <body>
    <div id="app">
      <div class="main-wrapper">
        <div class="main-content">
          <div class="container">
            <form method="post" action="{{ route('products.store') }}">
              @csrf
              <div class="card mt-5">
                <div class="card-header">
                  <h3>New Product</h3>
                </div>
                <div class="card-body">
                    @if ($errors->any())
                      <div class="alert alert-danger">
                        <div class="alert-title"><h4>Whoops!</h4></div>
                          There are some problems with your input.
                          <ul>
                            @foreach ($errors->all() as $error)
                              <li>{{ $error }}</li>
                            @endforeach
                          </ul>
                      </div>
                    @endif

                    @if (session('success'))
                      <div class="alert alert-success">{{ session('success') }}</div>
                    @endif

                    @if (session('error'))
                      <div class="alert alert-danger">{{ session('error') }}</div>
                    @endif
                    <div class="mb-3">
                      <label class="form-label">NOMOR SO</label>
                      <input type="text" class="form-control" name="nomor_so" value="{{ old('nomor_so') }}" placeholder="masukan nomor so">
                    </div>
                    <div class="mb-3">
                      <label class="form-label">kategori</label>
                      <input type="text" class="form-control" name="kategori" value="{{ old('kategori') }}"  placeholder="Name">
                    </div>
                    {{-- <div class="mb-3">
                      <label class="form-label">Proses</label>
                      <select name="proses_id" class="form-control">
                        <option value="">-- Proses --</option>
                        @foreach ($proses as $prosesID => $name)
                          <option value="{{ $prosesID }}" @selected(old('proses_id') == $prosesID)>
                            {{ $name }}
                          </option>
                        @endforeach
                      </select>
                    </div> --}}
                    {{-- <div class="mb-3">
                      <label class="form-label">Category</label>
                      @foreach ($categories as $categoryID => $categoryName)
                        <div class="form-check">
                          <input class="form-check-input" type="checkbox" name="category_ids[]" value="{{ $categoryID }}">
                          <label class="form-check-label">
                            {{ $categoryName }}
                          </label>
                        </div>
                      @endforeach
                    </div> --}}
                    <div class="mb-3">
                      <label class="form-label">Total Hours</label>
                      <input type="text" class="form-control" name="total_hours" value="{{ old('total_hours') }}"  placeholder="Price">
                    </div>
                </div>
                <div class="card-footer">
                  <button class="btn btn-primary" type="submit">Create</button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>
