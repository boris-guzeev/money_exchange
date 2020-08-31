<?php

use Illuminate\Database\Migrations\Migration;
use \Illuminate\Support\Facades\DB;

class FillRatesTable extends Migration
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
                'pair' => 'USD/RUB',
                'rate' => 74.00
            ],
            [
                'pair' => 'EUR/USD',
                'rate' => 1.20
            ],
            [
                'pair' => 'EUR/RUB',
                'rate' => 88.00
            ]
        ];
        DB::table('rates')->insert(
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
        DB::table('rates')->truncate();
    }
}
