<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
	public function up(): void {
		Schema::create( 'orders', function ( Blueprint $table ) {
			$table->uuid();
			$table->longText( 'description' );
			$table->integer( 'quantity' );
			$table->integer( 'price' );
            $table
                ->foreignUuid('user_id')
                ->constrained()
                ->cascadeOnUpdate()
                ->cascadeOnDelete();
			$table->timestamps();
		} );
	}

	public function down(): void {
		Schema::dropIfExists( 'orders' );
	}
};
