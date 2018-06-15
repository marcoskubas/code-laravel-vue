<?php

namespace CodeLaravelVue\Http\Controllers\Api;

use CodeLaravelVue\Repositories\BankRepository;
use CodeLaravelVue\Http\Controllers\Controller;

/**
 * Class BanksController.
 *
 * @package namespace CodeLaravelVue\Http\Controllers\Api;
 */
class BanksController extends Controller
{
    /**
     * @var BankRepository
     */
    private $repository;

    /**
     * BanksController constructor
     */
    public function __construct(BankRepository $repository)
    {
        $this->repository = $repository;
    }

    public function index(){
        return $this->repository->all();
    }
}