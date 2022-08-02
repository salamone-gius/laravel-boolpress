<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->id();
            // aggiungo la colonna foreign key relativa alla tabella 'posts' (post_id) in modo che se il post viene cancellato vengono cancellati tutti i commenti relativi
            $table->foreignId('post_id')->constrained()->onDelete('cascade');
            // aggiungo la colonna relativa al nome dell'autore settandola nullable
            $table->string('author', 80)->nullable();
            // aggiungo la colonna relativa al testo del commento
            $table->text('content');
            // aggiungo la colonna con il valore booleano che gestirà l'approvazione o meno del commento settandolo 'false' di default
            $table->boolean('is_approved')->default(false);
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
        Schema::dropIfExists('comments');
    }
}
