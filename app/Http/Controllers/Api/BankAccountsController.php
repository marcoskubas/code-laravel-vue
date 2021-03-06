<?php

namespace CodeLaravelVue\Http\Controllers\Api;

use Illuminate\Http\Request;

use CodeLaravelVue\Http\Controllers\Controller;
use CodeLaravelVue\Http\Requests;
use CodeLaravelVue\Http\Requests\BankAccountCreateRequest;
use CodeLaravelVue\Http\Requests\BankAccountUpdateRequest;
use CodeLaravelVue\Repositories\BankAccountRepository;
use CodeLaravelVue\Criteria\FindByNameCriteria;
use CodeLaravelVue\Criteria\FindByLikeAgencyCriteria;
// use Illuminate\Database\Eloquent\ModelNotFoundException;

/**
 * Class BankAccountsController.
 *
 * @package namespace CodeLaravelVue\Http\Controllers\Api;
 */
class BankAccountsController extends Controller
{
    /**
     * @var BankAccountRepository
     */
    protected $repository;

    /**
     * BankAccountsController constructor.
     *
     * @param BankAccountRepository $repository
     */
    public function __construct(BankAccountRepository $repository)
    {
        $this->repository = $repository;
    }

    public function lists(){
        return $this->repository->all(['id','name','account']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $this->repository->skipPresenter(true);
        // $this->repository->setPresenter(CodeLaravelVue\Presenters\MyPresenter::class);

        /*$this->repository->pushCriteria(new FindByNameCriteria('Diegoview'))
                         ->pushCriteria(new FindByLikeAgencyCriteria('2'));*/
                         
        $bankAccounts = $this->repository->paginate();
        return $bankAccounts;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  BankAccountCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     *
     */
    public function store(BankAccountCreateRequest $request)
    {
        $bankAccount = $this->repository->create($request->all());
        return response()->json($bankAccount, 201);
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
        $bankAccount = $this->repository->find($id);
        return response()->json($bankAccount);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  BankAccountUpdateRequest $request
     * @param  string            $id
     *
     * @return Response
     *
     */
    public function update(BankAccountUpdateRequest $request, $id)
    {
        $bankAccount = $this->repository->update($request->all(), $id);
        return response()->json($bankAccount, 200);
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
