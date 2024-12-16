public function run()
{
    $this->call([
        ComputersSeeder::class,
        IssuesSeeder::class,
    ]);
}
