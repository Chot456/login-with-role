<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Role extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('role', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('role_description');
            $table->timestamps();
        });

        $roles = [
            'staff',
            'manager',
            'admin',
        ];
        
        $now = new DateTime();

        foreach($roles as $role) {
            DB::table('role')->insert([
                'role_description' => $role,
                'created_at' => $now,
                'updated_at' => $now
            ]);
        }
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
