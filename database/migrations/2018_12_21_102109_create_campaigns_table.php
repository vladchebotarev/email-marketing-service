<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCampaignsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('campaigns', function (Blueprint $table) {
            $table->increments('id');
            $table->string('subject');
            $table->string('from_name');
            $table->unsignedInteger('from_email_id');
            $table->unsignedInteger('template_id');
            $table->unsignedInteger('subscribers_list_id');

            $table->boolean('scheduled')->default(false);
            $table->timestamp('schedule_date')->nullable();

            $table->enum('status', ['Sending', 'Complete', 'Scheduled', 'Failed', 'Warning']);
            $table->string('exception_message')->nullable();

            $table->unsignedInteger('user_id');
            $table->timestamps();

            //foreign keys
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('from_email_id')->references('id')->on('ses_verified_mails');
            $table->foreign('template_id')->references('id')->on('templates');
            $table->foreign('subscribers_list_id')->references('id')->on('subscribers_lists');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('campaigns');
    }
}
