<?php

namespace App\Http\Controllers\Admin\About;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Http\Requests\UpdateAboutRequest;

use App\Repositories\AboutRepository;
use App\Services\AboutService;

use Illuminate\Contracts\Cache\Factory;

class UpdateController extends Controller
{
    private $repository;
    private $service;

    public function __construct(AboutRepository $repository, AboutService $service)
    {
        $this->repository = $repository;
        $this->service = $service;
    }
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(UpdateAboutRequest $request, Factory $cache)
    {
        // return $request->keys();
        $request = $request->only('header_title', 'description', 'vision', 'mission');
        try {
            foreach ($request as $key => $value) {
                $item = $this->repository->findNameValue($key);
                if ($item != null) {
                   $item = $this->service->updateValue($item, $value);
                }
            }
            $cache->forget('settings');
            return redirect()->back()->with('success', 'Successfully update!');
        } catch (\Throwable $th) {
            \Log::debug($th->getMessage());
            return redirect()->back()->with('error', 'Ops! Something went wrong. Error Message: ' . $th->getMessage());
        }
    }
}
