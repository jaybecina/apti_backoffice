<?php

namespace App\Http\Controllers\Admin\Partner;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Repositories\PartnerRepository;

class IndexController extends Controller
{
    private $repository;
    public function __construct(PartnerRepository $repository)
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

        $partners = $this->repository
            ->filterList($request->keyword, $paginate);

        return view('admin.partner.index', compact('partners'));
    }
}
