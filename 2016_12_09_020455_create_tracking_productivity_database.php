<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTracking_ProductivityDatabase extends Migration {

        /**
         * Run the migrations.
         *
         * @return void
         */
         public function up()
         {
            
	    /**
	     * Table: kategori_tugas
	     */
	    Schema::create('kategori_tugas', function($table) {
                $table->increments('id')->unsigned();
                $table->string('nama_tugas', 255);
                $table->timestamp('created_at')->nullable();
                $table->timestamp('updated_at')->nullable();
            });


	    /**
	     * Table: password_resets
	     */
	    Schema::create('password_resets', function($table) {
                $table->string('email', 255);
                $table->string('token', 255);
                $table->timestamp('created_at')->nullable();
                $table->index('password_resets_email_index');
                $table->index('password_resets_token_index');
            });


	    /**
	     * Table: permission_role
	     */
	    Schema::create('permission_role', function($table) {
                $table->increments('permission_id')->unsigned();
                $table->increments('role_id')->unsigned();
                $table->index('permission_role_role_id_foreign');
            });


	    /**
	     * Table: permissions
	     */
	    Schema::create('permissions', function($table) {
                $table->increments('id')->unsigned();
                $table->string('name', 255);
                $table->string('display_name', 255)->nullable();
                $table->string('description', 255)->nullable();
                $table->timestamp('created_at')->nullable();
                $table->timestamp('updated_at')->nullable();
                $table->index('permissions_name_unique');
            });


	    /**
	     * Table: role_user
	     */
	    Schema::create('role_user', function($table) {
                $table->increments('user_id')->unsigned();
                $table->increments('role_id')->unsigned();
                $table->index('role_user_role_id_foreign');
            });


	    /**
	     * Table: roles
	     */
	    Schema::create('roles', function($table) {
                $table->increments('id')->unsigned();
                $table->string('name', 255);
                $table->string('display_name', 255)->nullable();
                $table->string('description', 255)->nullable();
                $table->timestamp('created_at')->nullable();
                $table->timestamp('updated_at')->nullable();
                $table->index('roles_name_unique');
            });


	    /**
	     * Table: users
	     */
	    Schema::create('users', function($table) {
                $table->increments('id')->unsigned();
                $table->string('name', 255);
                $table->string('email', 255);
                $table->string('password', 255);
                $table->string('remember_token', 100)->nullable();
                $table->timestamp('created_at')->nullable();
                $table->timestamp('updated_at')->nullable();
                $table->index('users_email_unique');
            });


         }

        /**
         * Reverse the migrations.
         *
         * @return void
         */
         public function down()
         {
            
	            Schema::drop('kategori_tugas');
	            Schema::drop('password_resets');
	            Schema::drop('permission_role');
	            Schema::drop('permissions');
	            Schema::drop('role_user');
	            Schema::drop('roles');
	            Schema::drop('users');
         }

}