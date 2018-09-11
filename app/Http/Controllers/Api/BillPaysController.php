<?php

namespace CodeLaravelVue\Http\Controllers\Api;

use Illuminate\Http\Request;

use CodeLaravelVue\Http\Requests;
use CodeLaravelVue\Http\Requests\BillPayCreateRequest;
use CodeLaravelVue\Http\Requests\BillPayUpdateRequest;
use CodeLaravelVue\Repositories\Interfaces\BillPayRepository;
use CodeLaravelVue\Http\Controllers\Controller;

/**
 * Class BillPaysController.
 *
 * @package namespace CodeLaravelVue\Http\Controllers;
 */
class BillPaysController extends Controller
{
    /**
     * @var BillPayRepository
     */
    protected $repository;

    /**
     * BillPaysController constructor.
     *
     * @param BillPayRepository $repository
     */
    public function __construct(BillPayRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $billPays = $this->repository->paginate();
        return $billPays;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  BillPayCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function store(BillPayCreateRequest $request)
    {
        $billPay = $this->repository->create($request->all());
        return response()->json($billPay, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $billPay = $this->repository->find($id);
        return response()->json($billPay);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  BillPayUpdateRequest $request
     * @param  string            $id
     *
     * @return Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function update(BillPayUpdateRequest $request, $id)
    {
        $billPay = $this->repository->update($request->all(), $id);
        return response()->json($billPay, 200);
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->repository->delete($id);
        return response()->json([], 204);
    }
}
