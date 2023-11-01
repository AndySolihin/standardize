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
                                                @if ($product->dryresin)
                                                    {{ $product->dryresin->nama_product }}
                                                @elseif ($product->repair)
                                                    {{ $product->repair->nama_product }}
                                                @elseif ($product->ct)
                                                    {{ $product->ct->nama_product }}
                                                @elseif ($product->custom)
                                                    {{ $product->custom->nama_product }}
                                                @elseif ($product->standard)
                                                    {{ $product->standard->nama_product }}
                                                @elseif ($product->vt)
                                                    {{ $product->vt->nama_product }}
                                                @elseif ($product->drynonresin)
                                                    {{ $product->drynonresin->nama_product }}
                                                @endif
                                            </td>
                                            <td>
                                                @if ($product->dryresin)
                                                    {{ $product->created_at}}
                                                @elseif ($product->repair)
                                                    {{ $product->created_at}}
                                                @elseif ($product->ct)
                                                    {{ $product->created_at}}
                                                @elseif ($product->vt)
                                                    {{ $product->created_at}}
                                                @elseif ($product->drynonresin)
                                                    {{ $product->created_at}}
                                                @elseif ($product->standard)
                                                    {{ $product->created_at}}
                                                @elseif ($product->custom)
                                                    {{ $product->created_at}}
                                                @endif
                                            </td>
                                            <td>
                                                @if ($product->dryresin)
                                                    {{ $product->dryresin->nomor_so }}
                                                @elseif ($product->repair)
                                                    {{ $product->repair->nomor_so }}
                                                @elseif ($product->ct)
                                                    {{ $product->ct->nomor_so }}
                                                @elseif ($product->vt)
                                                    {{ $product->vt->nomor_so }}
                                                @elseif ($product->drynonresin)
                                                    {{ $product->drynonresin->nomor_so }}
                                                @elseif ($product->standard)
                                                    {{ $product->standard->nomor_so }}
                                                @elseif ($product->custom)
                                                    {{ $product->custom->nomor_so }}
                                                @endif
                                            </td>
                                            <td>
                                                @if ($product->dryresin)
                                                    {{ $product->dryresin->total_hour }}
                                                @elseif ($product->repair)
                                                    {{ $product->repair->total_hour }}
                                                @elseif ($product->ct)
                                                    {{ $product->ct->total_hour }}
                                                @elseif ($product->vt)
                                                    {{ $product->vt->total_hour }}
                                                @elseif ($product->drynonresin)
                                                    {{ $product->drynonresin->total_hour }}
                                                @elseif ($product->standard)
                                                    {{ $product->standard->total_hour }}
                                                @elseif ($product->custom)
                                                    {{ $product->custom->total_hour }}
                                                @endif
                                            </td>
                                            {{-- <td>
                                                @if ($product->dryresin)
                                                    {{ $product->dryresin->manhours->kapasitas->id}}
                                                @elseif ($product->repair)
                                                    {{ $product->repair->manhours->kapasitas->id}}
                                                @elseif ($product->vt)
                                                    {{ $product->vt->manhours->kapasitas->id}}
                                                @elseif ($product->drynonresin)
                                                    {{ $product->drynonresin->manhours->kapasitas->id}}
                                                @elseif ($product->standard)
                                                    {{ $product->standard->manhours->kapasitas->id}}
                                                @elseif ($product->custom)
                                                    {{ $product->custom->manhours->kapasitas->id}}
                                                @elseif ($product->ct)
                                                    {{ $product->ct->manhours->kapasitas->id}}
                                                @endif
                                            </td> --}}
                                            <td>
                                                @if ($product->dryresin)
                                                    {{ $product->dryresin->kd_manhour }}
                                                @elseif ($product->repair)
                                                    {{ $product->repair->kd_manhour }}
                                                @elseif ($product->ct)
                                                    {{ $product->ct->kd_manhour }}
                                                @elseif ($product->vt)
                                                    {{ $product->vt->kd_manhour }}
                                                @elseif ($product->drynonresin)
                                                    {{ $product->drynonresin->kd_manhour }}
                                                @elseif ($product->standard)
                                                    {{ $product->standard->kd_manhour }}
                                                @elseif ($product->custom)
                                                    {{ $product->custom->kd_manhour }}
                                                @endif
                                            </td>

                                            {{-- <td>{{ $product->categories->nama }}</td>
                        <td>{{ $product->categories->kapasitas->kapasitas }}</td> --}}
                                            {{-- <td>{{ $product->dryresin- }}</td>
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
