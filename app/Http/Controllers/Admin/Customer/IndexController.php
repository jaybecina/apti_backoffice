<?php

namespace App\Http\Controllers\Admin\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Repositories\CustomerRepository;

class IndexController extends Controller
{
    private $repository;

    public function __construct(CustomerRepository $repository)
    {
        $this->repository = $repository;
    }
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $paginate = 10;

        $customers = $this->repository
            ->filterList($request->keyword, $paginate);

        return view('admin.customer.index', compact('customers'));
    }
}
