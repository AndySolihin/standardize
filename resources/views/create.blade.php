@extends('layouts.main')
@section('content')

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
                                    <input type="text" class="form-control" name="nomor_so" value="{{ old('nomor_so') }}"
                                        placeholder="masukan nomor so">

                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Kategori</label>
                                    <input type="text" class="form-control" name="nama_product" value="Dry Cast Resin"
                                        readonly>
                                </div>
                                <div class="mb-3">
                                    <input type="hidden" class="form-control" name="kategori" id="kategori"
                                        value="5">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Kapasitas</label>
                                    <select name="ukuran_kapasitas" id="ukuran_kapasitas" class=" form-select input">
                                        @php
                                            $selectedValue = old('ukuran_kapasitas');
                                            $manhourData = $manhour->where('kategori_id', '5')->unique('ukuran_kapasitas');
                                        @endphp
                                        <option value="">Pilih</option>
                                        @foreach ($manhourData as $data)
                                            <option value="{{ $data->ukuran_kapasitas }}"
                                                {{ $selectedValue == $data->ukuran_kapasitas ? 'selected' : '' }}>
                                                {{ $data->ukuran_kapasitas }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label class="form-label">coil Lv</label>
                                    <select name="coil_lv" id="coil_lv" class="form-select input">
                                    </select>
                                    <p id="selectedInfo_coil_lv"></p>
                                </div>
                                <div class="form-group">
                                    <label class="form-label">coil HV</label>
                                    <select name="coil_hv" id="coil_hv" class="form-select input">
                                    </select>
                                    <p id="selectedInfo_coil_hv"></p>
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Potong Leadwire</label>
                                    <select name="potong_leadwire" id="potong_leadwire" class="form-select input">
                                    </select>
                                    <p id="selectedInfo_potong_leadwire"></p>
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Potong Isolasi</label>
                                    <select name="potong_isolasi[]" id="potong_isolasi" class="form-select input" multiple>
                                    </select>
                                  
                                    <p id="selectedInfo_potong_isolasi"></p>
                                </div>
                                <div id="totalJam">
                                    Total Jam COIL MAKING: <span id="totalJam_value"></span>
                                </div>
                                <div class="form-group">
                                    <label class="form-label">HV Moulding</label>
                                    <select name="hv_moulding" id="hv_moulding" class="form-select input">
                                    </select>
                                    <p id="selectedInfo_hv_moulding"></p>
                                </div>
                                <div class="form-group">
                                    <label class="form-label">HV Casting</label>
                                    <select name="hv_casting" id="hv_casting" class="form-select input">
                                    </select>
                                    <p id="selectedInfo_hv_casting"></p>
                                </div>
                                <div class="form-group">
                                    <label class="form-label">HV Demoulding</label>
                                    <select name="hv_demoulding" id="hv_demoulding" class="form-select input">
                                    </select>
                                    <p id="selectedInfo_hv_demoulding"></p>
                                </div>
                                <div class="form-group">
                                    <label class="form-label">LV Bobbin</label>
                                    <select name="lv_bobbin[]" id="lv_bobbin" class="form-select input" multiple>
                                    </select>

                                    <p id="selectedInfo_lv_bobbin"></p>
                                </div>
                                <div class="form-group">
                                    <label class="form-label">LV Moulding</label>
                                    <select name="lv_moulding[]" id="lv_moulding" class="form-select input" multiple>
                                    </select>

                                    <p id="selectedInfo_lv_moulding"></p>
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Touch Up</label>
                                    <select name="touch_up[]" id="touch_up" class="form-select input" multiple>
                                    </select>

                                    <p id="selectedInfo_touch_up"></p>
                                </div>
                                <div id="totalMouldCasting">
                                    Total Jam MOULD & CASTING: <span id="totalMouldCasting_value">0</span>
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Type Susun Core</label>
                                    <select name="type_susun_core" id="type_susun_core" class="form-select input">
                                    </select>
                                    <p id="selectedInfo_type_susun_core"></p>
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Wiring</label>
                                    <select name="wiring" id="wiring" class="form-select input">
                                    </select>
                                    <p id="selectedInfo_wiring"></p>
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Instal Housing</label>
                                    <select name="instal_housing" id="instal_housing" class="form-select input">
                                    </select>
                                    <p id="selectedInfo_instal_housing"></p>
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Bongkar Housing</label>
                                    <select name="bongkar_housing" id="bongkar_housing" class="form-select input">
                                    </select>
                                    <p id="selectedInfo_bongkar_housing"></p>
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Pembuatan CU Link</label>
                                    <select name="pembuatan_cu_link" id="pembuatan_cu_link" class="form-select input">
                                    </select>
                                    <p id="selectedInfo_pembuatan_cu_link"></p>
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Other</label>
                                    <select name="others[]" id="others" class="form-select input" multiple>
                                    </select>

                                    <p id="selectedInfo_others"></p>
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Accesories</label>
                                    <select name="accesories[]" id="accesories" class="form-select input" multiple>
                                    </select>

                                    <p id="selectedInfo_accesories"></p>
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Potong Isolasi FIber</label>
                                    <select name="potong_isolasi_fiber[]" id="potong_isolasi_fiber"
                                        class="form-select input" multiple> </select>

                                    <p id="selectedInfo_potong_isolasi_fiber"></p>
                                </div>
                                <div id="totalCoreCoilAssembly">
                                    Total Jam CORE COIL ASSEMBLY: <span id="totalCoreCoilAssembly_value">0</span>
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Routine Test</label>
                                    <select name="routine_test[]" id="routine_test" class="form-select input" multiple>
                                    </select>

                                    <p id="selectedInfo_routine_test"></p>
                                </div>
                                <div id="totalQCTest">
                                    Total Jam QC TEST: <span id="totalQCTest_value">0</span>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Total Hour</label>
                                    <input type="text" class="form-control" id="total_hour" name="total_hour"
                                        value="{{ old('total_hour') }}">
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
@endsection
