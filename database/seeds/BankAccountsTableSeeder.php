<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Query\Builder;

class BankAccountsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

    	/** \CodeLaravelVue\Repositories\BankRepository $repository */
		$repository    = app(\CodeLaravelVue\Repositories\BankRepository::class);
		$banks         = $repository->all();
		$max           = 15;
		$bankAccountId = rand(1, $max);

		//make() gera uma instância pro create

        factory(\CodeLaravelVue\Models\BankAccount::class, $max)
        	->make()
        	->each(function ($bankAccount) use($banks, $bankAccountId) {
        		$bank = $banks->random();
        		$bankAccount->bank_id = $bank->id;

        		$bankAccount->save();

        		if($bankAccountId == $bankAccount->id){
        			$bankAccount->default = 1;
        			$bankAccount->save();
        		}

        	});
    }
}
