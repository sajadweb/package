<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;
use function PHPSTORM_META\map;

class CreateTypes extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'ql:type {pack} {type} {attr}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'it is for create project or bundle or pack in laravel';

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

        $attr = json_decode($this->argument('attr'));
        $app = Storage::disk('app');
        $pack = $this->argument('pack');
        $type = $this->argument('type');
        $classType = $type . 'Type';
        $app->makeDirectory($pack);
        $app->makeDirectory($pack . '/' . 'Type');
        $app->put($pack . '/' . 'Type/' . $classType . ".php", $this->ganrator($pack, $type, $attr));
        $this->info("create success full $classType");
    }

    public function ganrator($pack, $type, $attr)
    {
        $attrbutes = "";
        foreach ($attr as $key => $value) {
            $tp = '';
            if ($value == "type") {
                $uc=ucfirst($key);
                $tp = "GraphQL::type('$uc')";
            } else if ($value == "listOf") {
                $uc=ucfirst($key);
                $tp = " Type::listOf(GraphQL::type('$uc')))";
            } else {
                $tp = "Type::$value()";
            }
            $attrbutes .= "
            '$key' => [
                'type' =>$tp,
                'description' => 'The $key of $type'
            ],
            ";
        }
        $classType = $type . 'Type';
        $class = "<?php
namespace App\\Packages\\$pack\\Type;\n
use GraphQL\\Type\\Definition\\Type;
use Folklore\\GraphQL\\Support\\Type as BaseType;
use GraphQL;\n
class $classType extends BaseType
{
         protected \$attributes = [
        'name' => '$classType',
        'description' => 'A $type'
    ];
    public function fields()
    {
        return [
            $attrbutes
        ];
    }
}
";
        return $class;
    }


}
