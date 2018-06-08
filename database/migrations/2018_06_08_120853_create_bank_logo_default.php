<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use CodeLaravelVue\Models\Bank;

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
        //
    }
}
