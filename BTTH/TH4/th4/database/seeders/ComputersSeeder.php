use App\Models\Computer;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class ComputersSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();

        foreach (range(1, 20) as $index) {
            Computer::create([
                'computer_name' => $faker->word . '-' . $index,
                'model' => $faker->randomElement(['Dell Optiplex 7090', 'HP EliteDesk 800', 'Lenovo ThinkCentre M720']),
                'operating_system' => $faker->randomElement(['Windows 10', 'Ubuntu 20.04', 'macOS Big Sur']),
                'processor' => $faker->randomElement(['Intel Core i5', 'Intel Core i7', 'AMD Ryzen 5']),
                'memory' => $faker->numberBetween(4, 64),
                'available' => $faker->boolean(),
            ]);
        }
    }
}
