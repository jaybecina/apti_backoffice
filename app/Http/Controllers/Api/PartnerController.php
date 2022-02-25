<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Repositories\PartnerRepository;

use App\Http\Resources\PartnerCollection;

class PartnerController extends Controller
{
    private $repository;

    public function __construct(PartnerRepository $repository)
    {
        $this->repository = $repository;
    }

    public function partners()
    {
        try {
            $partners = $this->repository->all();
            return PartnerCollection::make($partners);
        } catch (\Throwable $th) {
            \Log::info($th->getMessage());
            return response()->json(['error' => 'No data found']);
        }
    }
}
