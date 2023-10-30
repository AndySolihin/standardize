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
use App\Models\Categories;
use App\Models\Kapasitas;
use App\Models\Kategori;
use App\Models\ManHour;
use App\Models\Proses;
use App\Models\Standardize;
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

        return response(view('index', ['products' => $products]));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): Response
    {
        // $proses = Dryresin::orderBy('id')->get()->pluck( 'id');
        // $work = WorkCenter::orderBy('id')->get()->pluck('id');
        // $kapasitas = Kapasitas::orderBy('id')->get()->pluck('id');

        // return response(view('create', [  'kapasitas' => $kapasitas]));
        // return response(view('create', ['proses' => $brands, 'categories' => $categories]));
        $work_centers = WorkCenter::orderBy('id')->get();
        $proses = Proses::orderBy('id')->get();
        $manhour = ManHour::orderBy('id')->get();

        return response(view('create', ['work_centers' => $work_centers,'proses' => $proses , 'manhour'=>$manhour ]));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProductRequest $request): RedirectResponse
    {
        $params = $request->validated();

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
        // $brands = Brand::orderBy('name', 'asc')->get()->pluck('name', 'id');
        // $categories = TypeProses::orderBy('name', 'asc')->get()->pluck('name', 'id');


        return response(view('edit', ['product' => $product]));
        // return response(view('edit', ['product' => $product, 'brands' => $brands, 'categories' => $categories]));
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
