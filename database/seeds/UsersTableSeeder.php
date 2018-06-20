<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $repository = app(\CodeLaravelVue\Repositories\ClientRepository::class);
        $clients    = $repository->all();

        factory(CodeLaravelVue\User::class, 1)->states('admin')->create(['name' => 'Marcos Kubas', 'email' => 'admin@user.com']);

        foreach (range(1, 30) as $value) {
            factory(CodeLaravelVue\User::class, 1)
            ->create([
                'name'  => "Client da Silva nº {$value}", 
                'email' => "client{$value}@user.com"
            ])->each(function($user) use($clients){
                $client = $clients->random();
                $user->client()->associate($client);
                $user->save();
            });
        }
    }
}
