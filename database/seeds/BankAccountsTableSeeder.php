<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Query\Builder;

class BankAccountsTableSeeder extends Seeder
{
    use CodeLaravelVue\Repositories\Traits\GetClientsTrait;
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $banks   = $this->getBanks();
        $clients = $this->getClients();
		$max           = 15;
		$bankAccountId = rand(1, $max);

		//make() gera uma instância pro create

        factory(\CodeLaravelVue\Models\BankAccount::class, $max)
        	->make()
        	->each(function ($bankAccount) use($banks, $bankAccountId, $clients) {
                
                $bank   = $banks->random();
                $client = $clients->random();

                $bankAccount->bank_id   = $bank->id;
                $bankAccount->client_id = $client->id;

        		$bankAccount->save();

        		if($bankAccountId == $bankAccount->id){
        			$bankAccount->default = 1;
        			$bankAccount->save();
        		}

        	});
    }

    private function getBanks(){
        $repository    = app(\CodeLaravelVue\Repositories\BankRepository::class);
        $repository->skipPresenter(true);
        $banks         = $repository->all();
        return $banks;
    }
}
