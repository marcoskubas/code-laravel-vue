<?php

use CodeLaravelVue\Models\Bank;
use CodeLaravelVue\Repositories\BankRepository;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Storage;

class CreateBanksData extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        /** @var  CodeLaravelVue\Repositories\BankRepository $repository */
        $repository = app(\CodeLaravelVue\Repositories\BankRepository::class);
        foreach($this->getData() as $bankArray){
            $repository->create($bankArray);
        }

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        /** @var BankRepository $repository */
        $repository = app(BankRepository::class);
        $repository->skipPresenter(true);
        $count = count($this->getData());

        foreach (range(1,$count) as $id) :
            $bank = $repository->find($id);
            $path = Bank::logosDir() . '/' . $bank->logo;
            Storage::disk('public')->delete($path);
            echo "Imagem do {$bank->name} deletada: " . $bank->logo . "\n";
            $bank->delete();
        endforeach;
    }

    public function getData(){
        return [
            [
                'name' => 'Caixa',
                'logo' => new Illuminate\Http\UploadedFile(
                    storage_path('app/files/banks/logos/caixa.png'),
                    'caixa.png'
                )
            ],
            [
                'name' => 'Itaú',
                'logo' => new Illuminate\Http\UploadedFile(
                    storage_path('app/files/banks/logos/itau.png'),
                    'itau.png'
                )
            ],
            [
                'name' => 'Bradesco',
                'logo' => new Illuminate\Http\UploadedFile(
                    storage_path('app/files/banks/logos/bradesco.png'),
                    'bradesco.png'
                )
            ],
            [
                'name' => 'Santander',
                'logo' => new Illuminate\Http\UploadedFile(
                    storage_path('app/files/banks/logos/santander.png'),
                    'santander.png'
                )
            ],
            [
                'name' => 'Banco do Brasil',
                'logo' => new Illuminate\Http\UploadedFile(
                    storage_path('app/files/banks/logos/banco-do-brasil.png'),
                    'banco-do-brasil.png'
                )
            ]
        ];
    }
}
