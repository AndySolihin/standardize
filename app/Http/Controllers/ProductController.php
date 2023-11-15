<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Dryresin;
use App\Models\TypeProses;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Kapasitas;
use App\Models\ManHour;
use App\Models\Proses;
use App\Models\Standardize;
use App\Models\Tipeproses;
use App\Models\work;
use App\Models\WorkCenter;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): Response
    {
        $products = Standardize::all();
        // $products = Standardize::with(['Dryresin.ManHour.Kapasitas'])->find();

        return response(view('index', ['products' => $products]));
    }

    /**
     * Show the form for creating a new resource.
     */
    // public function create(): Response
    // {
    //     $manhour = ManHour::orderBy('id')->get();

    //     return response(view('create', [ 'manhour'=>$manhour]));
    // }
    public function create(): Response
    {
        // $manhour = ManHour::orderBy('id')->get();

        return response(view('create', ['manhour' => ManHour::all()]));
    }

    public function createManhour($id)
    {
        $manhour = ManHour::where('ukuran_kapasitas', $id)->get();

        return response()->json($manhour);
    }



    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProductRequest $request): RedirectResponse
    {
        $params = $request->validated();

        $checkboxFields = ['potong_isolasi', 'lv_bobbin', 'lv_moulding', 'touch_up', 'others', 'accesories', 'potong_isolasi_fiber'];

        foreach ($checkboxFields as $field) {
            $checkbox = $request->input($field);
            $params[$field] = implode(',', $checkbox);
        }

        Dryresin::create($params);

        return redirect(route('products.index'))->with('success', 'Added!');
    }



    /**
     * Display the specified resource.
     */
    public function show(string $id): Response
    {
        dd('show');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id): Response
    {
        $product = Dryresin::findOrFail($id);
        // $manhour = ManHour::orderBy('id')->get();
        $manhour = ManHour::orderBy('id')->get();



        return response(view('edit', ['product' => $product, 'manhour' => $manhour]));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProductRequest $request, string $id): RedirectResponse
    {
        $product = Dryresin::findOrFail($id);
        $params = $request->validated();

        if ($product->update($params)) {
            // $product->categories()->sync($params['category_ids']);

            return redirect(route('products.index'))->with('success', 'Updated!');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    // public function destroy(string $id): RedirectResponse
    // {
    //     $product = Dryresin::findOrFail($id);
    //     $product->categories()->detach();

    //     if ($product->delete()) {
    //         return redirect(route('products.index'))->with('success', 'Deleted!');
    //     }

    //     return redirect(route('products.index'))->with('error', 'Sorry, unable to delete this!');
    // }
    public function destroy(string $id): RedirectResponse
    {
        // Cari "Dryresin" berdasarkan ID
        $dryresin = Dryresin::findOrFail($id);

        // Cari entri "Standardize" yang memiliki "dryresin_id" yang sesuai
        $standardize = Standardize::where('dryresin_id', $id)->first();

        // Hapus "Standardize" terlebih dahulu jika ditemukan
        if ($standardize) {
            $standardize->delete();
        }

        // Kemudian hapus "Dryresin" itu sendiri
        if ($dryresin->delete()) {
            return redirect(route('products.index'))->with('success', 'Deleted!');
        }

        return redirect(route('products.index'))->with('error', 'Sorry, unable to delete this!');
    }
}
