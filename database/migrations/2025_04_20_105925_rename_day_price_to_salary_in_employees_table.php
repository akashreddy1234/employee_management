<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class RenameDayPriceToSalaryInEmployeesTable extends Migration
{
    public function up()
    {
        DB::statement("ALTER TABLE employees CHANGE day_price salary DOUBLE");
    }

    public function down()
    {
        DB::statement("ALTER TABLE employees CHANGE salary day_price DOUBLE");
    }
}
