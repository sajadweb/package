<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;
use function PHPSTORM_META\map;

class CreateQearye extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'ql:q {pack} {query}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'it is for create query model';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {

        $app = Storage::disk('app');
        $pack = $this->argument('pack');
        $query = $this->argument('query');
        $app->makeDirectory($pack);
        $app->makeDirectory($pack . '/' . 'Query');
        $app->put($pack . '/' . 'Query/' . $query . "Query.php", $this->ganrator($pack, $query));
        $this->info("create success full $query");
    }

    public function ganrator($pack, $query)
    {
        $mq = $query . 'Query';
        $class = "<?php
namespace App\\Packages\\$pack\\Query;

use GraphQL;
use GraphQL\\Type\\Definition\\Type;
use Folklore\\GraphQL\\Support\\Query;

class $mq extends Query
{
    protected \$attributes = [
        'name' => '$query'
    ];

    public function type()
    {
        return GraphQL::type('$query');
    }

    public function args()
    {
        return [];
    }

    public function resolve(\$root, \$args)
    {

        return [];
    }
}
";
        return $class;
    }


}
