<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('data_plans', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable(); //MTN SME.
            $table->string("subcategory_id")->nullable();
            $table->string('network'); // mtn, glo, airtel, etc.
            $table->string('plan_id'); // e.g., MTN500MB
            $table->string('display_name'); // e.g., 500MB Daily
            $table->decimal('price', 12, 2);
            $table->string('category')->nullable(); // optional, e.g., 'daily', 'weekly', 'monthly', 'social', 'streaming'
            $table->decimal('reseller_price', 12, 2)->nullable(); // optional
            $table->string('validity'); // e.g., 1 day
            $table->string('status')->default('active'); // active, inactive
            $table->timestamps();
        });

        DB::table('data_plans')->insert([
            // MTN Weekly
            ['network' => 'mtn', "title" => 'SME', 'plan_id' => '500MB for 7 Days', 'display_name' => '500MB (SME)', 'price' => 490, 'category' => 'weekly', 'reseller_price' => 482, 'validity' => '7 Days', 'status' => 'active', "subcategory_id" => 1],

            ['network' => 'mtn', "title" => 'SME', 'plan_id' => '1GB for 7 Days', 'display_name' => '1GB (SME)', 'price' => 785, 'category' => 'weekly', 'reseller_price' => 772, 'validity' => '7 Days ', 'status' => 'active', "subcategory_id" => 1],

            // MTN DIRECT
            ['network' => 'mtn', "title" => 'MTN DIRECT', 'plan_id' => '75MB Daily plan', 'display_name' => '75MB', 'price' => 73, 'category' => 'daily', 'reseller_price' => 73, 'validity' => '1 Day ', 'status' => 'active', "subcategory_id" => 25],
            ['network' => 'mtn', "title" => 'MTN DIRECT', 'plan_id' => '110MB Daily plan', 'display_name' => '110MB', 'price' => 97, 'category' => 'daily', 'reseller_price' => 97, 'validity' => '1 Day ', 'status' => 'active', "subcategory_id" => 25],
            ['network' => 'mtn', "title" => 'MTN DIRECT', 'plan_id' => '500MB Daily Plan', 'display_name' => '110MB', 'price' => 350, 'category' => 'daily', 'reseller_price' => 337, 'validity' => '1 day ', 'status' => 'active', "subcategory_id" => 25],
            ['network' => 'mtn', "title" => 'MTN DIRECT', 'plan_id' => '1.5GB 2 - Days Plan', 'display_name' => '1.5GB', 'price' => 585, 'category' => 'daily', 'reseller_price' => 579, 'validity' => '2 days ', 'status' => 'active', "subcategory_id" => 25],
            ['network' => 'mtn', "title" => 'MTN DIRECT', 'plan_id' => 'GET 2.5GB for 1 Day', 'display_name' => '2.5GB', 'price' => 750, 'category' => 'daily', 'reseller_price' => 726, 'validity' => '1 day ', 'status' => 'active', "subcategory_id" => 25],
            ['network' => 'mtn', "title" => 'MTN DIRECT', 'plan_id' => '2.5GB 2 Days plan', 'display_name' => '2.5GB', 'price' => 880, 'category' => 'daily', 'reseller_price' => 868, 'validity' => '2 day ', 'status' => 'active', "subcategory_id" => 25],
            ['network' => 'mtn', "title" => 'MTN DIRECT', 'plan_id' => 'GET 3.2GB for 2 Days', 'display_name' => '3.2GB', 'price' => 975, 'category' => 'daily', 'reseller_price' => 965, 'validity' => '2 day ', 'status' => 'active', "subcategory_id" => 25],


            //weekly
            ['network' => 'mtn', "title" => 'MTN DIRECT', 'plan_id' => '1GB Weekly plan', 'display_name' => '3.2GB', 'price' => 780, 'category' => 'weekly', 'reseller_price' => 772, 'validity' => '7 days ', 'status' => 'active', "subcategory_id" => 25],
            ['network' => 'mtn', "title" => 'MTN DIRECT', 'plan_id' => '6GB weekly plan', 'display_name' => '3.2GB', 'price' => 2440, 'category' => 'weekly', 'reseller_price' => 2412, 'validity' => '7 days ', 'status' => 'active', "subcategory_id" => 25],
            ['network' => 'mtn', "title" => 'MTN DIRECT', 'plan_id' => '11GB Weekly plan', 'display_name' => '11GB', 'price' => 3400, 'category' => 'weekly', 'reseller_price' => 3377, 'validity' => '7 days ', 'status' => 'active', "subcategory_id" => 25],
            ['network' => 'mtn', "title" => 'MTN DIRECT', 'plan_id' => 'GET 20GB for 7 Days', 'display_name' => '20GB', 'price' => 4900, 'category' => 'weekly', 'reseller_price' => 4830, 'validity' => '7 days ', 'status' => 'active', "subcategory_id" => 25],

            //monthly
            ['network' => 'mtn', "title" => 'MTN DIRECT', 'plan_id' => '3.5GB + 5Mins for 30 Days', 'display_name' => '3.5GB + 5Mins', 'price' => 2430, 'category' => 'monthly', 'reseller_price' => 2412, 'validity' => '30 days ', 'status' => 'active', "subcategory_id" => 25],
            ['network' => 'mtn', "title" => 'MTN DIRECT', 'plan_id' => '7GB for 30 Days', 'display_name' => '7GB', 'price' => 3400, 'category' => 'monthly', 'reseller_price' => 3377, 'validity' => '30 days ', 'status' => 'active', "subcategory_id" => 25],
            ['network' => 'mtn', "title" => 'MTN DIRECT', 'plan_id' => '10GB +10Mins for 30days', 'display_name' => '10GB +10Mins', 'price' => 4400, 'category' => 'monthly', 'reseller_price' => 4342, 'validity' => '30 days ', 'status' => 'active', "subcategory_id" => 25],
            ['network' => 'mtn', "title" => 'MTN DIRECT', 'plan_id' => '20GB for 30 days', 'display_name' => '20GB', 'price' => 7350, 'category' => 'monthly', 'reseller_price' => 7237, 'validity' => '30 days ', 'status' => 'active', "subcategory_id" => 25],
            ['network' => 'mtn', "title" => 'MTN DIRECT', 'plan_id' => '25GB Monthly plan', 'display_name' => '25GB', 'price' => 8750, 'category' => 'monthly', 'reseller_price' => 8685, 'validity' => '30 days ', 'status' => 'active', "subcategory_id" => 25],
            ['network' => 'mtn', "title" => 'MTN DIRECT', 'plan_id' => '36GB for 30days', 'display_name' => '36GB', 'price' => 10700, 'category' => 'monthly', 'reseller_price' => 10615, 'validity' => '30 days ', 'status' => 'active', "subcategory_id" => 25],
            ['network' => 'mtn', "title" => 'MTN DIRECT', 'plan_id' => '75GB for 30days', 'display_name' => '75GB', 'price' => 17500, 'category' => 'monthly', 'reseller_price' => 17370, 'validity' => '30 days ', 'status' => 'active', "subcategory_id" => 25],
            ['network' => 'mtn', "title" => 'MTN DIRECT', 'plan_id' => '165GB for 30days', 'display_name' => '165GB', 'price' => 34000, 'category' => 'monthly', 'reseller_price' => 33775, 'validity' => '30 days ', 'status' => 'active', "subcategory_id" => 25],



            // Airtel Daily
            ['network' => 'airtel', "title" => 'AIRTEL DIRECT', 'plan_id' => '75MB for 1 day', 'display_name' => '75MB', 'price' => 74, 'category' => 'daily', 'reseller_price' => 73, 'validity' => '1 day ', 'status' => 'active', "subcategory_id" => 3],
            ['network' => 'airtel', "title" => 'AIRTEL DIRECT', 'plan_id' => '100MB for 1 day', 'display_name' => '100MB', 'price' => 98, 'category' => 'daily', 'reseller_price' => 97, 'validity' => '1 day ', 'status' => 'active', "subcategory_id" => 3],
            ['network' => 'airtel', "title" => 'AIRTEL DIRECT', 'plan_id' => '1GB for 1 day', 'display_name' => '1GB', 'price' => 492, 'category' => 'daily', 'reseller_price' => 486, 'validity' => '1 day ', 'status' => 'active', "subcategory_id" => 3],

            ['network' => 'airtel', "title" => 'AIRTEL DIRECT', 'plan_id' => '300MB for 2 days', 'display_name' => '300MB', 'price' => 296, 'category' => 'daily', 'reseller_price' => 292, 'validity' => '2 day ', 'status' => 'active', "subcategory_id" => 3],
            ['network' => 'airtel', "title" => 'AIRTEL DIRECT', 'plan_id' => '1.5GB for 2 day', 'display_name' => '1.5GB', 'price' => 590, 'category' => 'daily', 'reseller_price' => 583, 'validity' => '2 day ', 'status' => 'active', "subcategory_id" => 3],
            ['network' => 'airtel', "title" => 'AIRTEL DIRECT', 'plan_id' => '2GB for 2 day', 'display_name' => '2GB', 'price' => 735, 'category' => 'daily', 'reseller_price' => 728, 'validity' => '2 day ', 'status' => 'active', "subcategory_id" => 3],
            ['network' => 'airtel', "title" => 'AIRTEL DIRECT', 'plan_id' => '3GB for 2 days', 'display_name' => '3GB', 'price' => 985, 'category' => 'daily', 'reseller_price' => 970, 'validity' => '2 day ', 'status' => 'active', "subcategory_id" => 3],
            ['network' => 'airtel', "title" => 'AIRTEL DIRECT', 'plan_id' => '1GB Social plan for 3 days', 'display_name' => '1GB Social Plan', 'price' => 985, 'category' => 'daily', 'reseller_price' => 292, 'validity' => '3 day ', 'status' => 'active', "subcategory_id" => 3],







            // Airtel Weekly
            ['network' => 'airtel', "title" => 'AIRTEL DIRECT', 'plan_id' => '500MB for 7 days', 'display_name' => '500MB', 'price' => 489, 'category' => 'weekly', 'reseller_price' => 486, 'validity' => '7 day', 'status' => 'active', "subcategory_id" => 3],
            ['network' => 'airtel', "title" => 'AIRTEL DIRECT', 'plan_id' => '1GB for 7 days', 'display_name' => '1GB', 'price' => 785, 'category' => 'weekly', 'reseller_price' => 777, 'validity' => '7 day', 'status' => 'active', "subcategory_id" => 3],
            ['network' => 'airtel', "title" => 'AIRTEL DIRECT', 'plan_id' => '1.5GB Social plan for 7 days', 'display_name' => '1.5GB Social plan', 'price' => 489, 'category' => 'weekly', 'reseller_price' => 486, 'validity' => '7 day', 'status' => 'active', "subcategory_id" => 3],
            ['network' => 'airtel', "title" => 'AIRTEL DIRECT', 'plan_id' => '3.5GB for 7 days', 'display_name' => '3.5GB', 'price' => 1470, 'category' => 'weekly', 'reseller_price' => 1457, 'validity' => '7 day', 'status' => 'active', "subcategory_id" => 3],
            ['network' => 'airtel', "title" => 'AIRTEL DIRECT', 'plan_id' => '6GB for 7 days', 'display_name' => '6GB', 'price' => 2450, 'category' => 'weekly', 'reseller_price' => 2429, 'validity' => '7 day', 'status' => 'active', "subcategory_id" => 3],
            ['network' => 'airtel', "title" => 'AIRTEL DIRECT', 'plan_id' => '10GB for 7 Days', 'display_name' => '10GB', 'price' => 2950, 'category' => 'weekly', 'reseller_price' => 2913, 'validity' => '7 day', 'status' => 'active', "subcategory_id" => 3],
            ['network' => 'airtel', "title" => 'AIRTEL DIRECT', 'plan_id' => '15GB for 7 days', 'display_name' => '15GB', 'price' => 4840, 'category' => 'weekly', 'reseller_price' => 4830, 'validity' => '7 day', 'status' => 'active', "subcategory_id" => 3],

            // Airtel Monthly
            ['network' => 'airtel', "title" => 'AIRTEL DIRECT', 'plan_id' => '8GB for 30 days', 'display_name' => '8GB', 'price' => 2940, 'category' => 'monthly', 'reseller_price' => 2913, 'validity' => '30 days', 'status' => 'active', "subcategory_id" => 3],
            ['network' => 'airtel', "title" => 'AIRTEL DIRECT', 'plan_id' => '10GB for 30 days', 'display_name' => '10GB', 'price' => 3900, 'category' => 'monthly', 'reseller_price' => 3885, 'validity' => '30 days', 'status' => 'active', "subcategory_id" => 3],
            ['network' => 'airtel', "title" => 'AIRTEL DIRECT', 'plan_id' => '13GB for 30 days', 'display_name' => '13GB', 'price' => 4870, 'category' => 'monthly', 'reseller_price' => 4855, 'validity' => '30 days', 'status' => 'active', "subcategory_id" => 3],
            ['network' => 'airtel', "title" => 'AIRTEL DIRECT', 'plan_id' => '18GB for 30 days', 'display_name' => '18GB', 'price' => 5835, 'category' => 'monthly', 'reseller_price' => 5826, 'validity' => '30 days', 'status' => 'active', "subcategory_id" => 3],
            ['network' => 'airtel', "title" => 'AIRTEL DIRECT', 'plan_id' => '25GB for 30 days', 'display_name' => '25GB', 'price' => 7900, 'category' => 'monthly', 'reseller_price' => 7770, 'validity' => '30 days', 'status' => 'active', "subcategory_id" => 3],
            ['network' => 'airtel', "title" => 'AIRTEL DIRECT', 'plan_id' => '35GB for 30 days', 'display_name' => '35GB', 'price' => 9880, 'category' => 'monthly', 'reseller_price' => 9700, 'validity' => '30 days', 'status' => 'active', "subcategory_id" => 3],
            ['network' => 'airtel', "title" => 'AIRTEL DIRECT', 'plan_id' => '60GB for 30 days', 'display_name' => '60GB', 'price' => 14750, 'category' => 'monthly', 'reseller_price' => 14565, 'validity' => '30 days', 'status' => 'active', "subcategory_id" => 3],
            ['network' => 'airtel', "title" => 'AIRTEL DIRECT', 'plan_id' => '100GB for 30 days', 'display_name' => '100GB', 'price' => 19600, 'category' => 'monthly', 'reseller_price' => 19420, 'validity' => '30 days', 'status' => 'active', "subcategory_id" => 3],


            //AIRTEL CG
            ['network' => 'airtel', "title" => 'AIRTEL CG', 'plan_id' => '100MB [CG] for 7 days', 'display_name' => '100MB [CG]', 'price' => 95, 'category' => 'weekly', 'reseller_price' => 94, 'validity' => '7 days', 'status' => 'active', "subcategory_id" => 4],
            ['network' => 'airtel', "title" => 'AIRTEL CG', 'plan_id' => '300MB [CG] for 7 days', 'display_name' => '300MB [CG]', 'price' => 290, 'category' => 'weekly', 'reseller_price' => 284, 'validity' => '7 days', 'status' => 'active', "subcategory_id" => 4],
            ['network' => 'airtel', "title" => 'AIRTEL CG', 'plan_id' => '500MB [CG] for 30 days', 'display_name' => '300MB [CG]', 'price' => 478, 'category' => 'monthly', 'reseller_price' => 473, 'validity' => '30 days', 'status' => 'active', "subcategory_id" => 4],
            ['network' => 'airtel', "title" => 'AIRTEL CG', 'plan_id' => '5GB [CG] for 30 days', 'display_name' => '5GB [CG]', 'price' => 4750, 'category' => 'monthly', 'reseller_price' => 4725, 'validity' => '30 days', 'status' => 'active', "subcategory_id" => 4],







            // Glo Daily
            ['network' => 'glo', "title" => 'GLO DIRECT', 'plan_id' => '500MB Night for 1 day', 'display_name' => '500MB Night', 'price' => 47, 'category' => 'daily', 'reseller_price' => 47, 'validity' => '1 day', 'status' => 'active', "subcategory_id" => 5],
            ['network' => 'glo', "title" => 'GLO DIRECT', 'plan_id' => '220MB + 40MB Night for 2 days', 'display_name' => '220MB + 40MB Night', 'price' => 190, 'category' => 'daily', 'reseller_price' => 186, 'validity' => '2 days', 'status' => 'active', "subcategory_id" => 5],


            ['network' => 'glo', "title" => 'GLO DIRECT', 'plan_id' => '1GB for 7 days', 'display_name' => '1GB', 'price' => 470, 'category' => 'weekly', 'reseller_price' => 463, 'validity' => '7 days', 'status' => 'active', "subcategory_id" => 5],
            ['network' => 'glo', "title" => 'GLO DIRECT', 'plan_id' => '1.1GB + 1.5GB Night for 30 days', 'display_name' => '1.1GB + 1.5GB Night', 'price' => 950, 'category' => 'monthly', 'reseller_price' => 925, 'validity' => '30 days', 'status' => 'active', "subcategory_id" => 5],
            ['network' => 'glo', "title" => 'GLO DIRECT', 'plan_id' => '4.25GB + 3GB Night for 30 days', 'display_name' => '1.1GB + 1.5GB Night', 'price' => 2305, 'category' => 'monthly', 'reseller_price' => 2305, 'validity' => '30 days', 'status' => 'active', "subcategory_id" => 5],
            ['network' => 'glo', "title" => 'GLO DIRECT', 'plan_id' => '36GB + 2GB Night for 30 days', 'display_name' => '6GB + 2GB Night', 'price' => 9500, 'category' => 'monthly', 'reseller_price' => 9205, 'validity' => '30 days', 'status' => 'active', "subcategory_id" => 5],
            ['network' => 'glo', "title" => 'GLO DIRECT', 'plan_id' => '62GB + 2GB Night for 30 days', 'display_name' => '62GB + 2GB Night', 'price' => 14500, 'category' => 'monthly', 'reseller_price' => 13810, 'validity' => '30 days', 'status' => 'active', "subcategory_id" => 5],
            ['network' => 'glo', "title" => 'GLO DIRECT', 'plan_id' => '105GB + 2GB Night for 30 days', 'display_name' => '105GB + 2GB Night', 'price' => 19000, 'category' => 'monthly', 'reseller_price' => 18410, 'validity' => '30 days', 'status' => 'active', "subcategory_id" => 5],
            ['network' => 'glo', "title" => 'GLO DIRECT', 'plan_id' => '165GB for 30 day', 'display_name' => '165GB', 'price' => 28500, 'category' => 'monthly', 'reseller_price' => 27605, 'validity' => '30 days', 'status' => 'active', "subcategory_id" => 5],
            ['network' => 'glo', "title" => 'GLO DIRECT', 'plan_id' => '310GB for 60 days', 'display_name' => '310GB', 'price' => 47500, 'category' => 'monthly', 'reseller_price' => 46050, 'validity' => '60 days', 'status' => 'active', "subcategory_id" => 5],


            //GLO CG
            ['network' => 'glo', "title" => 'GLO CG', 'plan_id' => '200MB [CG] for 14 days', 'display_name' => '200MB [CG]', 'price' => 90, 'category' => 'weekly', 'reseller_price' => 84, 'validity' => '14 days', 'status' => 'active', "subcategory_id" => 24],
            ['network' => 'glo', "title" => 'GLO CG', 'plan_id' => '500MB [CG] for 30 days', 'display_name' => '500MB [CG]', 'price' => 220, 'category' => 'monthly', 'reseller_price' => 205, 'validity' => '30 days', 'status' => 'active', "subcategory_id" => 24],
            ['network' => 'glo', "title" => 'GLO CG', 'plan_id' => '5GB [CG] for 30 days', 'display_name' => '5GB [CG]', 'price' => 2050, 'category' => 'monthly', 'reseller_price' => 2050, 'validity' => '30 days', 'status' => 'active', "subcategory_id" => 24],
            ['network' => 'glo', "title" => 'GLO CG', 'plan_id' => '10GB [CG] for 30 days', 'display_name' => '10GB [CG]', 'price' => 4250, 'category' => 'monthly', 'reseller_price' => 4100, 'validity' => '30 days', 'status' => 'active', "subcategory_id" => 24],






            // 9mobile Daily
            ['network' => '9mobile', "title" => '9MOBILE DIRECT', 'plan_id' => '40MB for 1 day', 'display_name' => '40MB', 'price' => 40, 'category' => 'daily', 'reseller_price' => 40, 'validity' => '1 day', 'status' => 'active', "subcategory_id" => 6],
            ['network' => '9mobile', "title" => '9MOBILE DIRECT', 'plan_id' => '150MB Daily Data Plan', 'display_name' => '150MB', 'price' => 135, 'category' => 'daily', 'reseller_price' => 120, 'validity' => '1 day', 'status' => 'active', "subcategory_id" => 6],
            ['network' => '9mobile', "title" => '9MOBILE DIRECT', 'plan_id' => '1GB Daily + 100MB Social', 'display_name' => '1GB Daily + 100MB', 'price' => 245, 'category' => 'daily', 'reseller_price' => 240, 'validity' => '1 day', 'status' => 'active', "subcategory_id" => 6],
            ['network' => '9mobile', "title" => '9MOBILE DIRECT', 'plan_id' => '2GB 3-Days +100MB Social', 'display_name' => '2GB + 100MB Social', 'price' => 450, 'category' => 'daily', 'reseller_price' => 400, 'validity' => '1 day', 'status' => 'active', "subcategory_id" => 6],



            // 9mobile Weekly
            ['network' => '9mobile', "title" => '9MOBILE DIRECT', 'plan_id' => '200MB for 7 days', 'display_name' => '200MB', 'price' => 135, 'category' => 'weekly', 'reseller_price' => 120, 'validity' => '7 day', 'status' => 'active', "subcategory_id" => 6],
            ['network' => '9mobile', "title" => '9MOBILE DIRECT', 'plan_id' => '7GB + 100MB Social Weekly', 'display_name' => '7GB + 100MB Social', 'price' => 1350, 'category' => 'weekly', 'reseller_price' => 1200, 'validity' => '7 day', 'status' => 'active', "subcategory_id" => 6],

            // 9mobile Monthly
            ['network' => '9mobile', "title" => '9MOBILE DIRECT', 'plan_id' => '500MB Monthly', 'display_name' => '500MB', 'price' => 420, 'category' => 'monthly', 'reseller_price' => 405, 'validity' => '30 day', 'status' => 'active', "subcategory_id" => 6],
            ['network' => '9mobile', "title" => '9MOBILE DIRECT', 'plan_id' => '12GB Monthly', 'display_name' => '12GB', 'price' => 2550, 'category' => 'monthly', 'reseller_price' => 2400, 'validity' => '30 day', 'status' => 'active', "subcategory_id" => 6],
            ['network' => '9mobile', "title" => '9MOBILE DIRECT', 'plan_id' => '24GB Monthly', 'display_name' => '24GB', 'price' => 4300, 'category' => 'monthly', 'reseller_price' => 4000, 'validity' => '30 day', 'status' => 'active', "subcategory_id" => 6],
            ['network' => '9mobile', "title" => '9MOBILE DIRECT', 'plan_id' => '50GB Monthly', 'display_name' => '50GB', 'price' => 8800, 'category' => 'monthly', 'reseller_price' => 8000, 'validity' => '30 day', 'status' => 'active', "subcategory_id" => 6],






        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('data_plans');
    }
};
