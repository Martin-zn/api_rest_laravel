<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('proveedors', function (Blueprint $table) {

            //Elimino las columnas que no usare
            // $table->dropColumn(['category', 'address', 'website']);

            //Renombro las categorias que debo renombrar
            // $table->renameColumn('name', 'nombre');

            //agrego nuevas columnas
            // $table->unsignedBigInteger('categoria_id')->after('razon_social');
            // $table->foreign('categoria_id')->references('id')->on('categoria');
            // $table->renameColumn('address', 'direccion');
            // $table->string('direccion')->after('categoria_id');
            // $table->string('telefono')->after('direccion');
            $table->string('pagina')->after('telefono');
            $table->string('email')->after('pagina');
            $table->text('observaciones')->nullable()->after('email');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('proveedors', function (Blueprint $table) {
            // Revertimos los cambios
            $table->dropForeign(['categoria_id']);
            $table->dropColumn(['categoria_id', 'telefono', 'email', 'observaciones']);
            
            // Renombramos las columnas de vuelta a su estado original
            $table->renameColumn('nombre', 'name');
            $table->renameColumn('direccion', 'address');
            $table->renameColumn('pagina', 'website');
            
            // Recreamos las columnas eliminadas
            $table->string('category');
            $table->string('rut');
        });
    }
};
