<?php
namespace CodeLaravelVue\Repositories\Traits;
use CodeLaravelVue\Repositories\ClientRepository;
trait GetClientsTrait
{
    protected function getClients()
    {
        /** @var ClientRepository $repository */
        $repository = app(ClientRepository::class);
        $repository->skipPresenter(true);
        return $repository->all();
    }
}