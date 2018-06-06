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
        //
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

        $name     = md5(time()) . '.' . $logo->guessExtension();
        $destFile = Bank::logosDir();

        \Storage::disk('public')->putFileAs($destFile, $logo, $name);

        $this->repository->update(['logo' => $name], $bank->id);
    }
}
