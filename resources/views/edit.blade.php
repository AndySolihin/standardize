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
                    <form method="post" action="{{ route('products.update', $product->id) }}">
                        @method('PUT')
                        @csrf
                        <div class="card mt-5">
                            <div class="card-header">
                                <h3>Edit Product</h3>
                            </div>
                            <div class="card-body">
                                @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <div class="alert-title">
                                            <h4>Whoops!</h4>
                                        </div>
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
                                    <input type="text" class="form-control" name="nomor_so"
                                        value="{{ old('nomor_so', $product->nomor_so) }}">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Kategori</label>
                                    <input type="text" class="form-control" name="nama_product"
                                        value="{{ old('nama_product', $product->nama_product) }}" readonly>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Kapasitas</label>
                                    <select id="ukuran_kapasitas" name="ukuran_kapasitas" class="form-control">
                                        @php
                                            $selectedValue = old('ukuran_kapasitas', $product->ukuran_kapasitas);
                                            $manhourData = $manhour->where('nama_kategoriproduk', 'DRY TYPE RESIN')->unique('ukuran_kapasitas');
                                        @endphp

                                        @if (count($manhourData) > 0)
                                            @foreach ($manhourData as $data)
                                                <option value="{{ $data->ukuran_kapasitas }}"
                                                    data-durasi="{{ $data->durasi_manhour }}"
                                                    {{ $selectedValue == $data->ukuran_kapasitas ? 'selected' : '' }}>
                                                    {{ $data->ukuran_kapasitas }}
                                                </option>
                                            @endforeach
                                        @else
                                            <option value="">Data tidak ditemukan</option>
                                        @endif
                                    </select>
                                </div>
                                <div>
                                    <label for="coil_lv">Coil LV</label>
                                    <select id="coil_lv" name="coil_lv" onchange="showSelected('coil_lv')">
                                        @php
                                            $selectedValue = old('coil_lv', $product->coil_lv);
                                            $manhourData = $manhour
                                                ->where('nama_kategoriproduk', 'DRY TYPE RESIN')
                                                ->where('nama_workcenter', 'COIL MAKING')
                                                ->where('nama_proses', 'COIL LV')
                                                ->unique('nama_tipeproses');
                                        @endphp
                                        @if (count($manhourData) > 0)
                                            @foreach ($manhourData as $data)
                                                <option value="{{ $data->nama_tipeproses }}"
                                                    data-durasi="{{ $data->durasi_manhour }}"
                                                    data-workcenter="COIL MAKING"
                                                    {{ $selectedValue == $data->nama_tipeproses ? 'selected' : '' }}>
                                                    {{ $data->nama_tipeproses }}
                                                </option>
                                            @endforeach
                                        @else
                                            <option value="">Data tidak ditemukan</option>
                                        @endif
                                    </select>
                                    <p id="selectedInfo_coil_lv"></p>
                                </div>

                                <div>
                                    <label for="coil_hv">Coil HV</label>
                                    <select id="coil_hv" name="coil_hv" onchange="showSelected('coil_hv')">
                                        @php
                                            $selectedValue = old('coil_hv', $product->coil_hv);
                                            $manhourData = $manhour
                                                ->where('nama_kategoriproduk', 'DRY TYPE RESIN')
                                                ->where('nama_workcenter', 'COIL MAKING')
                                                ->where('nama_proses', 'COIL HV')
                                                ->unique('nama_tipeproses');
                                        @endphp
                                        @if (count($manhourData) > 0)
                                            @foreach ($manhourData as $data)
                                                <option value="{{ $data->nama_tipeproses }}"
                                                    data-durasi="{{ $data->durasi_manhour }}"
                                                    data-workcenter="COIL MAKING"
                                                    {{ $selectedValue == $data->nama_tipeproses ? 'selected' : '' }}>
                                                    {{ $data->nama_tipeproses }}
                                                </option>
                                            @endforeach
                                        @else
                                            <option value="">Data tidak ditemukan</option>
                                        @endif
                                    </select>
                                    <p id="selectedInfo_coil_hv"></p>
                                </div>

                                <div>
                                    <label for="potong_leadwire">Potong Leadwire</label>
                                    <select id="potong_leadwire" name="potong_leadwire"
                                        onchange="showSelected('potong_leadwire')">
                                        @php
                                            $selectedValue = old('potong_leadwire', $product->potong_leadwire);
                                            $manhourData = $manhour
                                                ->where('nama_kategoriproduk', 'DRY TYPE RESIN')
                                                ->where('nama_workcenter', 'COIL MAKING')
                                                ->where('nama_proses', 'POTONG LEAD WIRE')
                                                ->unique('nama_tipeproses');
                                        @endphp
                                        @if (count($manhourData) > 0)
                                            @foreach ($manhourData as $data)
                                                <option value="{{ $data->nama_tipeproses }}"
                                                    data-durasi="{{ $data->durasi_manhour }}"
                                                    data-workcenter="COIL MAKING"
                                                    {{ $selectedValue == $data->nama_tipeproses ? 'selected' : '' }}>
                                                    {{ $data->nama_tipeproses }}
                                                </option>
                                            @endforeach
                                        @else
                                            <option value="">Data tidak ditemukan</option>
                                        @endif
                                    </select>
                                    <p id="selectedInfo_potong_leadwire"></p>
                                </div>

                                <div>
                                    <label for="potong_isolasi">Potong Isolasi</label>
                                    <select id="potong_isolasi" name="potong_isolasi"
                                        onchange="showSelected('potong_isolasi')">
                                        @php
                                            $selectedValue = old('potong_isolasi', $product->potong_isolasi);
                                            $manhourData = $manhour
                                                ->where('nama_kategoriproduk', 'DRY TYPE RESIN')
                                                ->where('nama_workcenter', 'COIL MAKING')
                                                ->where('nama_proses', 'POTONG ISOLASI')
                                                ->unique('nama_tipeproses');
                                        @endphp
                                        @if (count($manhourData) > 0)
                                            @foreach ($manhourData as $data)
                                                <option value="{{ $data->nama_tipeproses }}"
                                                    data-durasi="{{ $data->durasi_manhour }}"
                                                    data-workcenter="COIL MAKING"
                                                    {{ $selectedValue == $data->nama_tipeproses ? 'selected' : '' }}>

                                                    {{ $data->nama_tipeproses }}
                                                </option>
                                            @endforeach
                                        @else
                                            <option value="">Data tidak ditemukan</option>
                                        @endif
                                    </select>
                                    <p id="selectedInfo_potong_isolasi"></p>
                                </div>
                                <div id="totalJam">
                                    Total Jam COIL MAKING: <span id="totalJam_value"></span>
                                </div>
                                <div>
                                    <label for="hv_moulding">HV Moulding</label>
                                    <select id="hv_moulding" name="hv_moulding" onchange="showSelected('hv_moulding')">
                                        @php
                                            $selectedValue = old('hv_moulding', $product->hv_moulding);
                                            $manhourData = $manhour
                                                ->where('nama_kategoriproduk', 'DRY TYPE RESIN')
                                                ->where('nama_workcenter', 'MOULD & CASTING')
                                                ->where('nama_proses', 'HV MOULDING')
                                                ->unique('nama_tipeproses');

                                        @endphp
                                        @if (count($manhourData) > 0)
                                            @foreach ($manhourData as $data)
                                                <option value="{{ $data->nama_tipeproses }}"
                                                    data-durasi="{{ $data->durasi_manhour }}"
                                                    data-workcenter="MOULD & CASTING"
                                                    {{ $selectedValue == $data->nama_tipeproses ? 'selected' : '' }}>

                                                    {{ $data->nama_tipeproses }}
                                                </option>
                                            @endforeach
                                        @else
                                            <option value="">Data tidak ditemukan</option>
                                        @endif
                                    </select>
                                    <p id="selectedInfo_hv_moulding"></p>
                                </div>

                                <div>
                                    <label for="hv_casting">HV Casting</label>
                                    <select id="hv_casting" name="hv_casting" onchange="showSelected('hv_casting')">
                                        @php
                                            $selectedValue = old('hv_casting', $product->hv_casting);
                                            $manhourData = $manhour
                                                ->where('nama_kategoriproduk', 'DRY TYPE RESIN')
                                                ->where('nama_workcenter', 'MOULD & CASTING')
                                                ->where('nama_proses', 'HV CASTING')
                                                ->unique('nama_tipeproses');
                                        @endphp
                                        @if (count($manhourData) > 0)
                                            @foreach ($manhourData as $data)
                                                <option value="{{ $data->nama_tipeproses }}"
                                                    data-durasi="{{ $data->durasi_manhour }}"
                                                    data-workcenter="MOULD & CASTING"
                                                    {{ $selectedValue == $data->nama_tipeproses ? 'selected' : '' }}>

                                                    {{ $data->nama_tipeproses }}
                                                </option>
                                            @endforeach
                                        @else
                                            <option value="">Data tidak ditemukan</option>
                                        @endif
                                    </select>
                                    <p id="selectedInfo_hv_casting"></p>
                                </div>

                                <div>
                                    <label for="hv_demoulding">HV Demoulding</label>
                                    <select id="hv_demoulding" name="hv_demoulding"
                                        onchange="showSelected('hv_demoulding')">
                                        @php
                                            $selectedValue = old('hv_demoulding', $product->hv_demoulding);
                                            $manhourData = $manhour
                                                ->where('nama_kategoriproduk', 'DRY TYPE RESIN')
                                                ->where('nama_workcenter', 'MOULD & CASTING')
                                                ->where('nama_proses', 'HV DEMOULDING')
                                                ->unique('nama_tipeproses');

                                        @endphp
                                        @if (count($manhourData) > 0)
                                            @foreach ($manhourData as $data)
                                                <option value="{{ $data->nama_tipeproses }}"
                                                    data-durasi="{{ $data->durasi_manhour }}"
                                                    data-workcenter="MOULD & CASTING"
                                                    {{ $selectedValue == $data->nama_tipeproses ? 'selected' : '' }}>

                                                    {{ $data->nama_tipeproses }}
                                                </option>
                                            @endforeach
                                        @else
                                            <option value="">Data tidak ditemukan</option>
                                        @endif
                                    </select>
                                    <p id="selectedInfo_hv_demoulding"></p>
                                </div>

                                <div>
                                    <label for="lv_bobbin">LV Bobbin</label>
                                    <select id="lv_bobbin" name="lv_bobbin" onchange="showSelected('lv_bobbin')">
                                        @php
                                            $selectedValue = old('lv_bobbin', $product->lv_bobbin);

                                            $manhourData = $manhour
                                                ->where('nama_kategoriproduk', 'DRY TYPE RESIN')
                                                ->where('nama_workcenter', 'MOULD & CASTING')
                                                ->where('nama_proses', 'LV BOBBIN')
                                                ->unique('nama_tipeproses');

                                        @endphp
                                        @if (count($manhourData) > 0)
                                            @foreach ($manhourData as $data)
                                                <option value="{{ $data->nama_tipeproses }}"
                                                    data-durasi="{{ $data->durasi_manhour }}"
                                                    data-workcenter="MOULD & CASTING"
                                                    {{ $selectedValue == $data->nama_tipeproses ? 'selected' : '' }}>

                                                    {{ $data->nama_tipeproses }}
                                                </option>
                                            @endforeach
                                        @else
                                            <option value="">Data tidak ditemukan</option>
                                        @endif
                                    </select>
                                    <p id="selectedInfo_lv_bobbin"></p>
                                </div>

                                <div>
                                    <label for="lv_moulding">LV Moulding</label>
                                    <select id="lv_moulding" name="lv_moulding"
                                        onchange="showSelected('lv_moulding')">
                                        @php
                                            $selectedValue = old('lv_moulding', $product->lv_moulding);
                                            $manhourData = $manhour
                                                ->where('nama_kategoriproduk', 'DRY TYPE RESIN')
                                                ->where('nama_workcenter', 'MOULD & CASTING')
                                                ->where('nama_proses', 'LV MOULDING')
                                                ->unique('nama_tipeproses');
                                        @endphp
                                        @if (count($manhourData) > 0)
                                            @foreach ($manhourData as $data)
                                                <option value="{{ $data->nama_tipeproses }}"
                                                    data-durasi="{{ $data->durasi_manhour }}"
                                                    data-workcenter="MOULD & CASTING"
                                                    {{ $selectedValue == $data->nama_tipeproses ? 'selected' : '' }}>

                                                    {{ $data->nama_tipeproses }}
                                                </option>
                                            @endforeach
                                        @else
                                            <option value="">Data tidak ditemukan</option>
                                        @endif
                                    </select>
                                    <p id="selectedInfo_lv_moulding"></p>
                                </div>

                                <div>
                                    <label for="touch_up">Touch Up</label>
                                    <select id="touch_up" name="touch_up" onchange="showSelected('touch_up')">
                                        @php
                                            $selectedValue = old('touch_up', $product->touch_up);

                                            $manhourData = $manhour
                                                ->where('nama_kategoriproduk', 'DRY TYPE RESIN')
                                                ->where('nama_workcenter', 'MOULD & CASTING')
                                                ->where('nama_proses', 'TOUCH UP')
                                                ->unique('nama_tipeproses');
                                        @endphp
                                        @if (count($manhourData) > 0)
                                            @foreach ($manhourData as $data)
                                                <option value="{{ $data->nama_tipeproses }}"
                                                    data-durasi="{{ $data->durasi_manhour }}"
                                                    data-workcenter="MOULD & CASTING"
                                                    {{ $selectedValue == $data->nama_tipeproses ? 'selected' : '' }}>

                                                    {{ $data->nama_tipeproses }}
                                                </option>
                                            @endforeach
                                        @else
                                            <option value="">Data tidak ditemukan</option>
                                        @endif
                                    </select>
                                    <p id="selectedInfo_touch_up"></p>
                                </div>
                                <div id="totalMouldCasting">
                                    Total Jam MOULD & CASTING: <span id="totalMouldCasting_value">0</span>
                                </div>
                                <div>
                                    <label for="type_susun_core">Type Susun Core</label>
                                    <select id="type_susun_core" name="type_susun_core"
                                        onchange="showSelected('type_susun_core')">
                                        @php
                                            $selectedValue = old('type_susun_core', $product->type_susun_core);

                                            $manhourData = $manhour
                                                ->where('nama_kategoriproduk', 'DRY TYPE RESIN')
                                                ->where('nama_workcenter', 'CORE COIL ASSEMBLY')
                                                ->where('nama_proses', 'TYPE SUSUN CORE')
                                                ->unique('nama_tipeproses');

                                        @endphp
                                        @if (count($manhourData) > 0)
                                            @foreach ($manhourData as $data)
                                                <option value="{{ $data->nama_tipeproses }}"
                                                    data-durasi="{{ $data->durasi_manhour }}"
                                                    data-workcenter="CORE COIL ASSEMBLY"
                                                    {{ $selectedValue == $data->nama_tipeproses ? 'selected' : '' }}>

                                                    {{ $data->nama_tipeproses }}
                                                </option>
                                            @endforeach
                                        @else
                                            <option value="">Data tidak ditemukan</option>
                                        @endif
                                    </select>
                                    <p id="selectedInfo_type_susun_core"></p>
                                </div>

                                <div>
                                    <label for="wiring">Wiring</label>
                                    <select id="wiring" name="wiring" onchange="showSelected('wiring')">
                                        @php
                                            $selectedValue = old('wiring', $product->wiring);

                                            $manhourData = $manhour
                                                ->where('nama_kategoriproduk', 'DRY TYPE RESIN')
                                                ->where('nama_workcenter', 'CORE COIL ASSEMBLY')
                                                ->where('nama_proses', 'WIRING')
                                                ->unique('nama_tipeproses');
                                        @endphp
                                        @if (count($manhourData) > 0)
                                            @foreach ($manhourData as $data)
                                                <option value="{{ $data->nama_tipeproses }}"
                                                    data-durasi="{{ $data->durasi_manhour }}"
                                                    data-workcenter="CORE COIL ASSEMBLY"
                                                    {{ $selectedValue == $data->nama_tipeproses ? 'selected' : '' }}>

                                                    {{ $data->nama_tipeproses }}
                                                </option>
                                            @endforeach
                                        @else
                                            <option value="">Data tidak ditemukan</option>
                                        @endif
                                    </select>
                                    <p id="selectedInfo_wiring"></p>
                                </div>

                                <div>
                                    <label for="instal_housing">Instal Housing</label>
                                    <select id="instal_housing" name="instal_housing"
                                        onchange="showSelected('instal_housing')">
                                        @php
                                            $selectedValue = old('instal_housing', $product->instal_housing);

                                            $manhourData = $manhour
                                                ->where('nama_kategoriproduk', 'DRY TYPE RESIN')
                                                ->where('nama_workcenter', 'CORE COIL ASSEMBLY')
                                                ->where('nama_proses', 'INSTAL HOUSING')
                                                ->unique('nama_tipeproses');
                                        @endphp
                                        @if (count($manhourData) > 0)
                                            @foreach ($manhourData as $data)
                                                <option value="{{ $data->nama_tipeproses }}"
                                                    data-durasi="{{ $data->durasi_manhour }}"
                                                    data-workcenter="CORE COIL ASSEMBLY"
                                                    {{ $selectedValue == $data->nama_tipeproses ? 'selected' : '' }}>

                                                    {{ $data->nama_tipeproses }}
                                                </option>
                                            @endforeach
                                        @else
                                            <option value="">Data tidak ditemukan</option>
                                        @endif
                                    </select>
                                    <p id="selectedInfo_instal_housing"></p>
                                </div>

                                <div>
                                    <label for="bongkar_housing">Bongkar Housing</label>
                                    <select id="bongkar_housing" name="bongkar_housing"
                                        onchange="showSelected('bongkar_housing')">
                                        @php
                                            $selectedValue = old('bongkar_housing', $product->bongkar_housing);

                                            $manhourData = $manhour
                                                ->where('nama_kategoriproduk', 'DRY TYPE RESIN')
                                                ->where('nama_workcenter', 'CORE COIL ASSEMBLY')
                                                ->where('nama_proses', 'BONGKAR HOUSING')
                                                ->unique('nama_tipeproses');
                                        @endphp
                                        @if (count($manhourData) > 0)
                                            @foreach ($manhourData as $data)
                                                <option value="{{ $data->nama_tipeproses }}"
                                                    data-durasi="{{ $data->durasi_manhour }}"
                                                    data-workcenter="CORE COIL ASSEMBLY"
                                                    {{ $selectedValue == $data->nama_tipeproses ? 'selected' : '' }}>

                                                    {{ $data->nama_tipeproses }}
                                                </option>
                                            @endforeach
                                        @else
                                            <option value="">Data tidak ditemukan</option>
                                        @endif
                                    </select>
                                    <p id="selectedInfo_bongkar_housing"></p>
                                </div>

                                <div>
                                    <label for="pembuatan_cu_link">Pembuatan CU Link</label>
                                    <select id="pembuatan_cu_link" name="pembuatan_cu_link"
                                        onchange="showSelected('pembuatan_cu_link')">
                                        @php
                                            $selectedValue = old('pembuatan_cu_link', $product->pembuatan_cu_link);

                                            $manhourData = $manhour
                                                ->where('nama_kategoriproduk', 'DRY TYPE RESIN')
                                                ->where('nama_workcenter', 'CORE COIL ASSEMBLY')
                                                ->where('nama_proses', 'PEMBUATAN CU LINK')
                                                ->unique('nama_tipeproses');

                                        @endphp
                                        @if (count($manhourData) > 0)
                                            @foreach ($manhourData as $data)
                                                <option value="{{ $data->nama_tipeproses }}"
                                                    data-durasi="{{ $data->durasi_manhour }}"
                                                    data-workcenter="CORE COIL ASSEMBLY"
                                                    {{ $selectedValue == $data->nama_tipeproses ? 'selected' : '' }}>

                                                    {{ $data->nama_tipeproses }}
                                                </option>
                                            @endforeach
                                        @else
                                            <option value="">Data tidak ditemukan</option>
                                        @endif
                                    </select>
                                    <p id="selectedInfo_pembuatan_cu_link"></p>
                                </div>

                                <div>
                                    <label for="others">Others</label>
                                    <select id="others" name="others" onchange="showSelected('others')">
                                        @php
                                            $selectedValue = old('others', $product->others);

                                            $manhourData = $manhour
                                                ->where('nama_kategoriproduk', 'DRY TYPE RESIN')
                                                ->where('nama_workcenter', 'CORE COIL ASSEMBLY')
                                                ->where('nama_proses', 'OTHERS')
                                                ->unique('nama_tipeproses');

                                        @endphp
                                        @if (count($manhourData) > 0)
                                            @foreach ($manhourData as $data)
                                                <option value="{{ $data->nama_tipeproses }}"
                                                    data-durasi="{{ $data->durasi_manhour }}"
                                                    data-workcenter="CORE COIL ASSEMBLY"
                                                    {{ $selectedValue == $data->nama_tipeproses ? 'selected' : '' }}>

                                                    {{ $data->nama_tipeproses }}
                                                </option>
                                            @endforeach
                                        @else
                                            <option value="">Data tidak ditemukan</option>
                                        @endif
                                    </select>
                                    <p id="selectedInfo_others"></p>
                                </div>

                                <div>
                                    <label for="accessories">Accessories</label>
                                    <select id="accessories" name="accessories"
                                        onchange="showSelected('accessories')">
                                        @php
                                            $selectedValue = old('accessories', $product->accessories);

                                            $manhourData = $manhour
                                                ->where('nama_kategoriproduk', 'DRY TYPE RESIN')
                                                ->where('nama_workcenter', 'CORE COIL ASSEMBLY')
                                                ->where('nama_proses', 'ACCESORIES')
                                                ->unique('nama_tipeproses');

                                        @endphp
                                        @if (count($manhourData) > 0)
                                            @foreach ($manhourData as $data)
                                                <option value="{{ $data->nama_tipeproses }}"
                                                    data-durasi="{{ $data->durasi_manhour }}"
                                                    data-workcenter="CORE COIL ASSEMBLY"
                                                    {{ $selectedValue == $data->nama_tipeproses ? 'selected' : '' }}>

                                                    {{ $data->nama_tipeproses }}
                                                </option>
                                            @endforeach
                                        @else
                                            <option value="">Data tidak ditemukan</option>
                                        @endif
                                    </select>
                                    <p id="selectedInfo_accessories"></p>
                                </div>

                                <div>
                                    <label for="potong_isolasi_fiber">Potong Isolasi Fiber</label>
                                    <select id="potong_isolasi_fiber" name="potong_isolasi_fiber"
                                        onchange="showSelected('potong_isolasi_fiber')">
                                        @php
                                            $selectedValue = old('potong_isolasi_fiber', $product->potong_isolasi_fiber);

                                            $manhourData = $manhour
                                                ->where('nama_kategoriproduk', 'DRY TYPE RESIN')
                                                ->where('nama_workcenter', 'CORE COIL ASSEMBLY')
                                                ->where('nama_proses', 'POTONG ISOLASI FIBER')
                                                ->unique('nama_tipeproses');
                                        @endphp
                                        @if (count($manhourData) > 0)
                                            @foreach ($manhourData as $data)
                                                <option value="{{ $data->nama_tipeproses }}"
                                                    data-durasi="{{ $data->durasi_manhour }}"
                                                    data-workcenter="CORE COIL ASSEMBLY"
                                                    {{ $selectedValue == $data->nama_tipeproses ? 'selected' : '' }}>

                                                    {{ $data->nama_tipeproses }}
                                                </option>
                                            @endforeach
                                        @else
                                            <option value="">Data tidak ditemukan</option>
                                        @endif
                                    </select>
                                    <p id="selectedInfo_potong_isolasi_fiber"></p>
                                </div>
                                <div id="totalCoreCoilAssembly">
                                    Total Jam CORE COIL ASSEMBLY: <span id="totalCoreCoilAssembly_value">0</span>
                                </div>
                                <div>
                                    <label for="routine_test">Routine Test</label>
                                    <select id="routine_test" name="routine_test"
                                        onchange="showSelected('routine_test')">
                                        @php
                                            $selectedValue = old('routine_test', $product->routine_test);

                                            $manhourData = $manhour
                                                ->where('nama_kategoriproduk', 'DRY TYPE RESIN')
                                                ->where('nama_workcenter', 'QC TEST')
                                                ->where('nama_proses', 'ROUNTINE')
                                                ->unique('nama_tipeproses');
                                        @endphp

                                        @if (count($manhourData) > 0)
                                            @foreach ($manhourData as $data)
                                                <option value="{{ $data->nama_tipeproses }}"
                                                    data-durasi="{{ $data->durasi_manhour }}"
                                                    data-workcenter="QC TEST"
                                                    {{ $selectedValue == $data->nama_tipeproses ? 'selected' : '' }}>

                                                    {{ $data->nama_tipeproses }}
                                                </option>
                                            @endforeach
                                        @else
                                            <option value="">Data tidak ditemukan</option>
                                        @endif
                                    </select>
                                    <p id="selectedInfo_routine_test"></p>
                                </div>

                                <div id="totalQCTest">
                                    Total Jam QC TEST: <span id="totalQCTest_value">0</span>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Total Hour</label>
                                    <input type="text" class="form-control" id="total_hour" name="total_hour"
                                        value="{{ old('total_hour', $product->total_hour) }}" readonly>
                                </div>
                                <div class="card-footer">
                                    <button class="btn btn-primary" type="submit">Update</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript">
        function showSelected(target) {
            let select = document.getElementById(target);
            let selectedOption = select.options[select.selectedIndex];
            let selectedDurasi = selectedOption.getAttribute('data-durasi');
            let selectedInfo = document.getElementById("selectedInfo_" + target);
            selectedInfo.textContent = " - Durasi Manhour: " + selectedDurasi;

            let selectElements = document.querySelectorAll('select'); // Mengambil semua elemen select
            let totalManhour = 0;

            selectElements.forEach(function(select) {
                let selectedOption = select.options[select.selectedIndex];
                let durasi = selectedOption.getAttribute('data-durasi');
                // console.log('Durasi', durasi);
                totalManhour += parseFloat(durasi || 0); // Mengonversi ke angka
            });
            // console.log('Total Manhour:', totalManhour);

            let totalHourInput = document.getElementById('total_hour');
            totalHourInput.value = totalManhour;
        }
        // Function to calculate and display total jam per work center
        function displayTotalJamCoilMaking() {
            let selectElements = document.querySelectorAll('select');
            let totalJam = 0;

            selectElements.forEach(function(select) {
                let selectedOption = select.options[select.selectedIndex];
                let durasi = parseFloat(selectedOption.getAttribute('data-durasi')) || 0;
                let workCenterAttr = selectedOption.getAttribute('data-workcenter');

                if (workCenterAttr === 'COIL MAKING') {
                    totalJam += durasi;
                }
            });
            console.log("Work Center (COIL MAKING):", totalJam);
            // Display the total jam for COIL MAKING
            let totalJamElement = document.getElementById("totalJam_value");
            if (totalJamElement) {
                totalJamElement.textContent = totalJam;
            }
        }

        function displayTotalJamMouldCasting() {
            let selectElements = document.querySelectorAll('select');
            let totalJam = 0;

            selectElements.forEach(function(select) {
                let selectedOption = select.options[select.selectedIndex];
                let durasi = parseFloat(selectedOption.getAttribute('data-durasi')) || 0;
                let workCenterAttr = selectedOption.getAttribute('data-workcenter');

                if (workCenterAttr === 'MOULD & CASTING') {
                    totalJam += durasi;
                }
            });
            console.log("Work Center (MOULD & CASTING):", totalJam);
            // Display the total jam for MOULD & CASTING
            let totalJamElement = document.getElementById("totalMouldCasting_value");
            if (totalJamElement) {
                totalJamElement.textContent = totalJam;
            }
        }

        function displayTotalJamCoreCoilAssembly() {
            let selectElements = document.querySelectorAll('select');
            let totalJam = 0;

            selectElements.forEach(function(select) {
                let selectedOption = select.options[select.selectedIndex];
                let durasi = parseFloat(selectedOption.getAttribute('data-durasi')) || 0;
                let workCenterAttr = selectedOption.getAttribute('data-workcenter');

                if (workCenterAttr === 'CORE COIL ASSEMBLY') {
                    totalJam += durasi;
                }
            });
            console.log("assy", totalJam);
            // Display the total jam for CORE COIL ASSEMBLY
            let totalJamElement = document.getElementById("totalCoreCoilAssembly_value");
            if (totalJamElement) {
                totalJamElement.textContent = totalJam;
            }
        }

        function displayTotalJamQCTest() {
            let selectElements = document.querySelectorAll('select');
            let totalJam = 0;

            selectElements.forEach(function(select) {
                let selectedOption = select.options[select.selectedIndex];
                let durasi = parseFloat(selectedOption.getAttribute('data-durasi')) || 0;
                let workCenterAttr = selectedOption.getAttribute('data-workcenter');

                if (workCenterAttr === 'QC TEST') {
                    totalJam += durasi;
                }
            });
            console.log("QC", totalJam);
            // Display the total jam for QC TEST
            let totalJamElement = document.getElementById("totalQCTest_value");
            if (totalJamElement) {
                totalJamElement.textContent = totalJam;
            }
        }
        document.querySelectorAll('select').forEach(function(select) {
            select.addEventListener('change', function() {
                let selectedOption = select.options[select.selectedIndex];
                let workCenter = selectedOption.getAttribute('data-workcenter');

                if (workCenter === 'COIL MAKING') {
                    displayTotalJamCoilMaking();
                } else if (workCenter === 'MOULD & CASTING') {
                    displayTotalJamMouldCasting();
                } else if (workCenter === 'CORE COIL ASSEMBLY') {
                    displayTotalJamCoreCoilAssembly();
                } else if (workCenter === 'QC TEST') {
                    displayTotalJamQCTest();
                }
            });
        });
    </script>
</body>

</html>
