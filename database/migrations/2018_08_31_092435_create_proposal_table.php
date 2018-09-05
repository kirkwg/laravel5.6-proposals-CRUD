<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProposalTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('proposal', function (Blueprint $table) {
            $table->increments('id');
			$table->string('salutation', 15);
			$table->string('firstname', 50);
            $table->string('middlename', 50);
			$table->string('lastname', 50);
			$table->string('email', 128);
			$table->string('phonenumber', 15);
			$table->string('position', 50);
			$table->string('institution', 128);
			$table->string('postaladdress', 128);
            //$table->string('url')->unique();
            $table->text('papertitle');
			$table->string('papertype', 15);
			$table->text('abstract');
			$table->text('summary');
			$table->text('biostatement');	
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('proposal');
    }
}
