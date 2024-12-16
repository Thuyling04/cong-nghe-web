use App\Models\Issue;
use App\Models\Computer;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class IssuesSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();

        $computers = Computer::all();

        foreach ($computers as $computer) {
            Issue::create([
                'computer_id' => $computer->id,
                'reported_by' => $faker->name,
                'reported_date' => $faker->dateTimeThisYear(),
                'description' => $faker->sentence,
                'urgency' => $faker->randomElement(['Low', 'Medium', 'High']),
                'status' => $faker->randomElement(['Open', 'In Progress', 'Resolved']),
            ]);
        }
    }
}
