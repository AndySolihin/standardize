@extends('layouts.main')
@section('content')
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
                                                {{ $product->created_at->format('d-m-Y');}}
                                            @elseif ($product->repair)
                                                {{ $product->created_at->format('d-m-Y');}}
                                            @elseif ($product->ct)
                                                {{ $product->created_at->format('d-m-Y');}}
                                            @elseif ($product->vt)
                                                {{ $product->created_at->format('d-m-Y');}}
                                            @elseif ($product->drynonresin)
                                                {{ $product->created_at->format('d-m-Y');}}
                                            @elseif ($product->standard)
                                                {{ $product->created_at->format('d-m-Y');}}
                                            @elseif ($product->custom)
                                                {{ $product->created_at->format('d-m-Y');}}
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
                                        <td>
                                            @if ($product->dryresin)
                                                {{ $product->dryresin->ukuran_kapasitas}}
                                            @elseif ($product->repair)
                                                {{ $product->repair->ukuran_kapasitas}}
                                            @elseif ($product->vt)
                                                {{ $product->vt->ukuran_kapasitas}}
                                            @elseif ($product->drynonresin)
                                                {{ $product->drynonresin->ukuran_kapasitas}}
                                            @elseif ($product->standard)
                                                {{ $product->standard->ukuran_kapasitas}}
                                            @elseif ($product->custom)
                                                {{ $product->custom->ukuran_kapasitas}}
                                            @elseif ($product->ct)
                                                {{ $product->ct->ukuran_kapasitas}}
                                            @endif
                                        </td>
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
@endsection
