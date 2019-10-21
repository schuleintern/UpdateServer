<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReleasesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('releases', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string("name");
            $table->date("releaseDate");

            $table->integer("branchID")->nullable();

            $table->integer("versionMajor");
            $table->integer("versionMinor");
            $table->integer("versionPatch");

            $table->longText("changeLog")->nullable();
            $table->boolean("isSecurityFix")->default(false);
            $table->boolean("isMajorUpdate")->default(false);

            $table->integer("nextVersionID")->default(0);

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
        Schema::dropIfExists('releases');
    }
}
