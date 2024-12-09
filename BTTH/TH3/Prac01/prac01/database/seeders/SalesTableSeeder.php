use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SalesTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('sales')->insert([
            [
                'medicine_id' => 1,
                'quantity' => 10,
                'sale_date' => now(),
                'customer_phone' => '0123456789',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'medicine_id' => 2,
                'quantity' => 5,
                'sale_date' => now(),
                'customer_phone' => '0987654321',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
