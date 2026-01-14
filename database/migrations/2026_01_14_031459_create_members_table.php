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
        Schema::create('members', function (Blueprint $table) {
            $table->id();
            //Informacion del miembro
            $table->string('fullname');
            $table->string('document_id')->unique();
            $table->date('birth_date');
            $table->integer('age');
            $table->string('phone');
            $table->enum('gender', ['masculino', 'femenino']);
            //Clasificacion enums
            $table->enum('age_range', ['niños', 'jóvenes', 'adultos', 'adultos_mayores']);
            $table->enum('marital_status', ['soltero', 'casado', 'viudo', 'divorciado']);
            $table->enum('ministry', ['alabanza', 'jóvenes', 'niños', 'líderes', 'intercesión', 'ujieres', 'diaconía', 'multimedia', 'damas_dorcas', 'escuela_dominical', 'evangelismo', 'ninguno']);
            $table->string('ministry_role')->nullable()->comment('Rol específico dentro del ministerio (ej: secretaria, tesorera, director, etc.)');
            $table->enum('church_role', [
                // Roles Ministeriales
                'pastor_principal', 'pastor_asociado', 'evangelista',
                // Junta Local
                'secretario', 'tesorero', 'miembro_junta',
                // Comité Damas Dorcas
                'presidenta_dorcas', 'vicepresidenta_dorcas', 'secretaria_dorcas', 'tesorera_dorcas',
                // Comité Jóvenes
                'presidente_jovenes', 'vicepresidente_jovenes', 'secretario_jovenes', 'tesorero_jovenes',
                // Escuela Dominical
                'director_escuela_dominical', 'subdirector_escuela_dominical', 'secretario_escuela_dominical',
                // Otros
                'líder', 'diácono', 'miembro', 'visitante'
            ]);
            //Datos estaticos
            $table->string('email')->nullable();
            $table->string('address')->nullable();
            $table->string('neighborhood')->nullable();
            $table->boolean('is_baptized')->default(false);
            $table->boolean('is_sealed')->default(false);
            $table->string('friend_relation')->nullable();
            $table->date('join_date');
            //Estado del miembro
            $table->enum('status', ['activo', 'inactivo']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('members');
    }
};
