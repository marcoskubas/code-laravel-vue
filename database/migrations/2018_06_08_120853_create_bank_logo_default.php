<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use CodeLaravelVue\Models\Bank;
use Illuminate\Support\Facades\Storage;

class CreateBankLogoDefault extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $name     = env('BANK_LOGO_DEFAULT');
        $logo = new Illuminate\Http\UploadedFile(
                    storage_path('app/files/banks/logos/' . $name),
                    $name
                );
        $destFile = Bank::logosDir();

        \Storage::disk('public')->putFileAs($destFile, $logo, $name);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        $file_name = env("BANK_LOGO_DEFAULT");
        $filePath = Bank::logosDir() . "/{$file_name}";
        Storage::disk('public')->delete($filePath);
        echo "Imagem {$file_name} deletada\n";
    }
}
