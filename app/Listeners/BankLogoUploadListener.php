<?php

namespace CodeLaravelVue\Listeners;

use CodeLaravelVue\Events\BankStoredEvent;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use CodeLaravelVue\Models\Bank;
use CodeLaravelVue\Repositories\BankRepository;

class BankLogoUploadListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct(BankRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Handle the event.
     *
     * @param  BankStoredEvent  $event
     * @return void
     */
    public function handle(BankStoredEvent $event)
    {
        $bank = $event->getBank();
        $logo = $event->getLogo();

        if($logo){

            //fazer ajuste para pegar nova extensão do arquivo no case de update
            $name     = $bank->created_at != $bank->updated_at ? $bank->logo : md5(uniqid(rand(), true)) . '.' . $logo->guessExtension();
            $destFile = Bank::logosDir();

            \Storage::disk('public')->putFileAs($destFile, $logo, $name);

            if($bank->created_at == $bank->updated_at)
                $this->repository->update(['logo' => $name], $bank->id);
        }
    }
}
