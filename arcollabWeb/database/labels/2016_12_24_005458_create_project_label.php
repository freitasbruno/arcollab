<?php
use Vinelab\NeoEloquent\Schema\Blueprint;
use Vinelab\NeoEloquent\Migrations\Migration;
class CreateProjectLabel extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Neo4jSchema::label('Project', function(Blueprint $label)
        {
            //
        });
    }
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Neo4jSchema::label('Project', function(Blueprint $label)
        {
            //
        });
    }
}