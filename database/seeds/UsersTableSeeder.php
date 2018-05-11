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
        factory(CodeLaravelVue\User::class, 1)->states('admin')->create(['name' => 'Marcos Kubas', 'email' => 'admin@user.com']);
    }
}
