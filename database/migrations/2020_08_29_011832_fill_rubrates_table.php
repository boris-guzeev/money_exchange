<?php

use Illuminate\Database\Migrations\Migration;
use \Illuminate\Support\Facades\DB;

class FillRubratesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $data = [
            [
                'currency' => 'USD',
                'value' => 75.50
            ],
            [
                'currency' => 'EUR',
                'value' => 90
            ]
        ];
        DB::table('rub_rates')->insert(
            $data
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::table('rub_rates')->truncate();
    }
}
