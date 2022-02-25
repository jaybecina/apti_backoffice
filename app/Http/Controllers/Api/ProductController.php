<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Repositories\ProductRepository;
use App\Services\ProductService;

use App\Repositories\ProductTypeRepository;

use App\Http\Resources\ProductResource;
use App\Http\Resources\ProductCollection;
use App\Http\Resources\ProductTypeResource;
use App\Http\Resources\ProductTypeCollection;

use App\Models\Product;

use App;

class ProductController extends Controller
{
    private $repository;

    public function __construct(ProductRepository $repository)
    {
        $this->repository = $repository;
    }

    public function featuredProducts()
    {
        try {
            $products = $this->repository->featuredProducts();
            return ProductCollection::make($products);
        } catch (\Throwable $th) {
            \Log::info($th->getMessage());
            return response()->json(['error' => 'No data found']);
        }
    }

    public function products()
    {
        try {
            $products = $this->repository->allSortLatest();
            return ProductCollection::make($products);
        } catch (\Throwable $th) {
            \Log::info($th->getMessage());
            return response()->json(['error' => 'No data found']);
        }
    }

    public function products_types()
    {
        try {
            $types = App::make(ProductTypeRepository::class)->all();
            return ProductTypeCollection::make($types);
        } catch (\Throwable $th) {
            \Log::info($th->getMessage());
            return response()->json(['error' => 'No data found']);
        }
    }

    public function getProductPerId($id)
    {
        try {
            $product = $this->repository->getById($id);
            return new ProductResource($product);
        } catch (\Throwable $th) {
            \Log::info($th->getMessage());
            return response()->json(['error' => 'No data found']);
        }
    }

    public function products_per_product_type($id)
    {
        try {
            $products = App::make(ProductTypeRepository::class)->getProductsPerProductType($id);
            return new ProductTypeResource($products);
        } catch (\Throwable $th) {
            \Log::info($th->getMessage());
            return response()->json(['error' => 'No data found']);
        }
    }

    public function product_filter(Request $request)
    {
        //keyword
        //product-type
        //price-range
        // itemPerPage | int | optional

        try {
            $products = new Product;

            if ($request->has('keyword')) {
                $products = $products->where('name', 'like', '%'.$request->keyword.'%');
            }

            if ($request->has('product_type')) {
                $products = $products->where('type_id', $request->product_type);
            }

            if ($request->has('price_range')) {
                $price_array = explode('|', $request->price_range);
                $min_price = $price_array[0];
                $max_price = $price_array[1];

                $products = $products->whereBetween('price', [$min_price, $max_price]);
            }

            $page = $request->has('itemPerPage') ? $request->itemPerPage : 10;

            $products = $products->paginate($page);

            if (count($products) > 0) {
                return ProductCollection::make($products);
            }
            return response()->json(['error' => 'No product found.']);
        } catch (\Throwable $th) {
            \Log::info($th->getMessage());
            return response()->json(['error' => 'No data found']);
        }
    }


}
