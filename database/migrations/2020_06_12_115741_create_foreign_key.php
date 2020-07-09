<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateForeignKey extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('producteurs', function (Blueprint $table) {
            $table->foreign('cooperative_id')->references('id')->on('cooperatives')
                ->onDelete('restrict')
                ->onUpdate('restrict');
        });

        Schema::table('ventes', function (Blueprint $table) {
            $table->foreign('producteur_id')->references('id')->on('producteurs')
                ->onDelete('restrict')
                ->onUpdate('restrict');

            $table->foreign('produit_id')->references('id')->on('produits')
                ->onDelete('restrict')
                ->onUpdate('restrict');

            $table->foreign('pisteur_id')->references('id')->on('pisteurs')
                ->onDelete('restrict')
                ->onUpdate('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('producteurs', function (Blueprint $table) {

            $table->dropForeign('producteurs_cooperative_id_foreign');

        });

        Schema::table('ventes', function (Blueprint $table) {

            $table->dropForeign('ventes_producteur_id_foreign');
            $table->dropForeign('ventes_produit_id_foreign');
            $table->dropForeign('ventes_pisteur_id_foreign');

        });
    }
}
