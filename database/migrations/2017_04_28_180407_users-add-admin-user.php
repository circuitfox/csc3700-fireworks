<?php

use App\User;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UsersAddAdminUser extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $user = User::create([
            "name" => "admin",
            "email" => "admin@example.com",
            "password" => bcrypt("admin"),
        ]);
        $user->is_admin = true;
        $user->must_change_password = true;
        $user->save();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        if (Schema::hasTable("users")) {
            DB::table("users")
                ->where("name", "admin")
                ->where("email", "admin@example.com")
                ->delete();
        }
    }
}
