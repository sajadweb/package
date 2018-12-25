<?php
/**
 * Created by PhpStorm.
 * User: sajadweb
 * Date: 06/08/2018
 * Time: 21:16
 */

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;
use function PHPSTORM_META\map;

class CreateMutation extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'ql:m {pack} {mutation}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create Mutation in graph ql';

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
        $mutation = $this->argument('mutation');

        $app->makeDirectory($pack);
        $app->makeDirectory($pack . '/' . 'Mutation');
        $app->put($pack . '/' . 'Mutation/' . $mutation . "Mutation.php", $this->ganrator($pack, $mutation));
        $this->info("create success full  $mutation Mutation");
    }

    public function ganrator($pack, $mutation)
    {

        $mq=$mutation.'Mutation';
        $class = "<?php
namespace App\\Packages\\$pack\\Mutation;

use Folklore\\GraphQL\\Support\\Mutation;
use GraphQL\\Type\\Definition\\ResolveInfo;
use GraphQL\\Type\\Definition\\Type;
use GraphQL;
use Illuminate\\Support\\Facades\\Hash;

class $mq extends Mutation
{
    protected \$attributes = [
       'name' => '$mq',
        'description' => 'A mutation'
    ];
    
    public function type()
    {
        return GraphQL::type('$mutation');
    } 
    public function args()
    {
        return [
            'name' => [
                'name' => 'name',
                'type' => Type::string(),
                'rules' => ['required'],
            ],
        ];
     }
     
    public function resolve(\$root, \$args,\$context, ResolveInfo \$info)
    {
        return ;

    }
 }
";
        return $class;
    }


}
