<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Repositories\AboutRepository;

class AboutController extends Controller
{
    private $repository;

    public function __construct(AboutRepository $repository)
    {
        $this->repository = $repository;
    }

    public function about()
    {
        try {
            $about = $this->repository->pluck();
            return response()->json(['data' => $about], 200);;
        } catch (\Throwable $th) {
            return response()->json(['error' => 'No data found']);
        }
    }
}
