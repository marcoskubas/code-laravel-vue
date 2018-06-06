<?php

namespace CodeLaravelVue\Events;

use CodeLaravelVue\Models\Bank;

class BankCreatedEvent
{
    private $bank;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(Bank $bank)
    {
        $this->bank = $bank;
    }

    /**
    * @return $bank
    */
    public function getBank(){
        return $this->bank;
    }
}
