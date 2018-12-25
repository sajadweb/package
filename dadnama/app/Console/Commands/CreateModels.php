<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;
use function PHPSTORM_META\map;

class CreateModels extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'model:make {pack} {model} {attr} {tabel}';

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
        $model = $this->argument('model');
        $tabel = $this->argument('tabel');
        $app->makeDirectory($pack);
        $app->makeDirectory($pack . '/' . 'Model');
        $app->put($pack . '/' . 'Model/' . $model . ".php", $this->ganrator($pack, $model, $attr, $tabel));
        $this->info("create success full $model");
    }

    public function ganrator($pack, $model, $attr, $tabel)
    {
        $attrbutes = "";
        $i = 0;
        foreach ($attr as $key) {
            $i++;
            if (count($attr) == $i) {
                $attrbutes .= "'$key'";
            } else {
                $attrbutes .= "'$key',";
            }
        }

        $class = "<?php
namespace App\\Packages\\$pack\\Model;\n
use App\\Packages\\Tools\\Extend\\Entity; 
class $model extends Entity
{
    protected \$table = '$tabel';
    protected \$fillable = [$attrbutes];
    public \$timestamps = false;
}
";
        return $class;
    }


}
