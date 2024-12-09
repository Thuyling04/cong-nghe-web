use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MedicinesTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('medicines')->insert([
            [
                'name' => 'Paracetamol',
                'brand' => 'ABC Pharma',
                'dosage' => '500mg',
                'form' => 'Tablet',
                'price' => 100.00,
                'stock' => 500,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Amoxicillin',
                'brand' => 'XYZ Pharma',
                'dosage' => '250mg',
                'form' => 'Capsule',
                'price' => 150.00,
                'stock' => 300,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
