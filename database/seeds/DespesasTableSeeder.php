<?php

use Illuminate\Database\Seeder;
use App\Despesa;
use Illuminate\Support\Facades\DB;

class DespesasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('despesas')->truncate();
        factory(Despesa::class, 150)->create();
    }
}
