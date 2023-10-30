<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>My App</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
</head>

<body>
    <div id="app">
        <div class="main-wrapper">
            <div class="main-content">
                <div class="container">
                    <div class="card mt-5">
                        <div class="card-header">
                            <h3>List Product</h3>
                        </div>
                        <div class="card-body">
                            @if (session('success'))
                                <div class="alert alert-success">{{ session('success') }}</div>
                            @endif

                            @if (session('error'))
                                <div class="alert alert-danger">{{ session('error') }}</div>
                            @endif
                            <p>
                                <a class="btn btn-primary" href="{{ route('products.create') }}">New Product</a>
                            </p>
                            <table class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>Category</th>
                                        <th>Date</th>
                                        <th>SO Code</th>
                                        <th>Hours</th>
                                        <th>Capacity</th>
                                        <th>Man Hour Code</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($products as $product)
                                        <tr>
                                            <td>
                                                @if ($product->kategori->dryresin)
                                                    {{ $product->kategori->dryresin->nama_product }}
                                                @elseif ($product->kategori->repair)
                                                    {{ $product->kategori->repair->nama_product }}
                                                @elseif ($product->kategori->ct)
                                                    {{ $product->kategori->ct->nama_product }}
                                                @elseif ($product->kategori->custom)
                                                    {{ $product->kategori->custom->nama_product }}
                                                @elseif ($product->kategori->standard)
                                                    {{ $product->kategori->standard->nama_product }}
                                                @elseif ($product->kategori->vt)
                                                    {{ $product->kategori->vt->nama_product }}
                                                @elseif ($product->kategori->drynonresin)
                                                    {{ $product->kategori->drynonresin->nama_product }}
                                                @endif
                                            </td>
                                            <td>
                                                @if ($product->kategori->dryresin)
                                                    {{ $product->kategori->dryresin->created_at }}
                                                @elseif ($product->kategori->repair)
                                                    {{ $product->kategori->repair->created_at }}
                                                @elseif ($product->kategori->ct)
                                                    {{ $product->kategori->ct->created_at }}
                                                @elseif ($product->kategori->vt)
                                                    {{ $product->kategori->vt->created_at }}
                                                @elseif ($product->kategori->drynonresin)
                                                    {{ $product->kategori->drynonresin->created_at }}
                                                @elseif ($product->kategori->standard)
                                                    {{ $product->kategori->standard->created_at }}
                                                @elseif ($product->kategori->custom)
                                                    {{ $product->kategori->custom->created_at }}
                                                @endif
                                            </td>
                                            <td>
                                                @if ($product->kategori->dryresin)
                                                    {{ $product->kategori->dryresin->nomor_so }}
                                                @elseif ($product->kategori->repair)
                                                    {{ $product->kategori->repair->nomor_so }}
                                                @elseif ($product->kategori->ct)
                                                    {{ $product->kategori->ct->nomor_so }}
                                                @elseif ($product->kategori->vt)
                                                    {{ $product->kategori->vt->nomor_so }}
                                                @elseif ($product->kategori->drynonresin)
                                                    {{ $product->kategori->drynonresin->nomor_so }}
                                                @elseif ($product->kategori->standard)
                                                    {{ $product->kategori->standard->nomor_so }}
                                                @elseif ($product->kategori->custom)
                                                    {{ $product->kategori->custom->nomor_so }}
                                                @endif
                                            </td>
                                            <td>
                                                @if ($product->kategori->dryresin)
                                                    {{ $product->kategori->dryresin->total_hour }}
                                                @elseif ($product->kategori->repair)
                                                    {{ $product->kategori->repair->total_hour }}
                                                @elseif ($product->kategori->ct)
                                                    {{ $product->kategori->ct->total_hour }}
                                                @elseif ($product->kategori->vt)
                                                    {{ $product->kategori->vt->total_hour }}
                                                @elseif ($product->kategori->drynonresin)
                                                    {{ $product->kategori->drynonresin->total_hour }}
                                                @elseif ($product->kategori->standard)
                                                    {{ $product->kategori->standard->total_hour }}
                                                @elseif ($product->kategori->custom)
                                                    {{ $product->kategori->custom->total_hour }}
                                                @endif
                                            </td>
                                            <td>
                                                @if ($product->kategori->dryresin)
                                                    {{ $product->kategori->dryresin->kapasitas->kapasitas }}
                                                @elseif ($product->kategori->repair)
                                                    {{ $product->kategori->repair->kapasitas->kapasitas }}
                                                @elseif ($product->kategori->vt)
                                                    {{ $product->kategori->vt->kapasitas->kapasitas }}
                                                @elseif ($product->kategori->drynonresin)
                                                    {{ $product->kategori->drynonresin->kapasitas->kapasitas }}
                                                @elseif ($product->kategori->standard)
                                                    {{ $product->kategori->standard->kapasitas->kapasitas }}
                                                @elseif ($product->kategori->custom)
                                                    {{ $product->kategori->custom->kapasitas->kapasitas }}
                                                @elseif ($product->kategori->ct)
                                                    {{ $product->kategori->ct->kapasitas->kapasitas }}
                                                @endif
                                            </td>
                                            <td>
                                                @if ($product->kategori->dryresin)
                                                    {{ $product->kategori->dryresin->kd_manhour }}
                                                @elseif ($product->kategori->repair)
                                                    {{ $product->kategori->repair->kd_manhour }}
                                                @elseif ($product->kategori->ct)
                                                    {{ $product->kategori->ct->kd_manhour }}
                                                @elseif ($product->kategori->vt)
                                                    {{ $product->kategori->vt->kd_manhour }}
                                                @elseif ($product->kategori->drynonresin)
                                                    {{ $product->kategori->drynonresin->kd_manhour }}
                                                @elseif ($product->kategori->standard)
                                                    {{ $product->kategori->standard->kd_manhour }}
                                                @elseif ($product->kategori->custom)
                                                    {{ $product->kategori->custom->kd_manhour }}
                                                @endif
                                            </td>

                                            {{-- <td>{{ $product->categories->nama }}</td>
                        <td>{{ $product->categories->kapasitas->kapasitas }}</td> --}}
                                            {{-- <td>{{ $product->dryresin->kategori }}</td>
                        <td>{{ $product->dryresin->nomor_so }}</td> --}}
                                            {{-- <td>{{ ($product->brand != null) ? $product->brand->name : '' }}</td> --}}
                                            {{-- <td>{{ implode(', ', $product->categories->pluck('name')->toArray()) }}</td> --}}
                                            {{-- <td>{{ $product->dryresin->total_hours }}</td> --}}
                                            <td>
                                                <a href="{{ route('products.edit', ['id' => $product->id]) }}"
                                                    class="btn btn-secondary btn-sm">edit</a>
                                                <a href="#" class="btn btn-sm btn-danger"
                                                    onclick="
                                                        event.preventDefault();
                                                        if (confirm('Do you want to remove this?')) {
                                                        document.getElementById('delete-row-{{ $product->id }}').submit();
                                                        }">
                                                    delete
                                                </a>
                                                <form id="delete-row-{{ $product->id }}"
                                                    action="{{ route('products.destroy', ['id' => $product->id]) }}"
                                                    method="POST">
                                                    <input type="hidden" name="_method" value="DELETE">
                                                    @csrf
                                                </form>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="8">
                                                No record found!
                                            </td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
