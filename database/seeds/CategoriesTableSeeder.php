<?php

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
	use CodeLaravelVue\Repositories\Traits\GetClientsTrait;
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$clients = $this->getClients();

        factory(CodeLaravelVue\Models\Category::class, 30)
        	->make()
        	->each(function($category) use($clients){
        		$client = $clients->random();
        		$category->client_id = $client->id;
        		$category->save();
        	});

        $categoriesRoot = $this->getCategoriesRoot();

        foreach ($categoriesRoot as $root) {
			factory(CodeLaravelVue\Models\Category::class, 3)
        	->make()
        	->each(function($chield) use($root){

        		$chield->client_id = $root->client_id;
        		$chield->save();

        		$chield->parent()->associate($root);
        		$chield->save();

        	});        	
        }
    }

    private function getCategoriesRoot(){
        $repository    = app(\CodeLaravelVue\Repositories\CategoryRepository::class);
        $repository->skipPresenter(true);
        return         $repository->all();
    }
}
