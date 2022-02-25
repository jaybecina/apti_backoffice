<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Repositories\CustomerRepository;
use App\Http\Resources\CustomerCollection;

class CustomerController extends Controller
{
    private $repository;

    public function __construct(CustomerRepository $repository)
    {
        $this->repository = $repository;
    }

    public function customers()
    {
        try {
            $customers = $this->repository->all();
            return CustomerCollection::make($customers);
        } catch (\Throwable $th) {
            \Log::info($th->getMessage());
            return response()->json(['error' => 'No data found']);
        }
    }

    public function customers_by_type(Request $request)
    {
        //type CORPORATE|GOVERNMENT|INDIVIDUAL

        try {
            if ($request->has('type')) {
                $customers = $this->repository->getByType($request->type);
                if (count($customers) > 0) {
                    return CustomerCollection::make($customers);
                }
                return response()->json(['error' => 'No customer found']);
            }
        } catch (\Throwable $th) {
            \Log::info($th->getMessage());
            return response()->json(['error' => 'No data found']);
        }
    }
}
