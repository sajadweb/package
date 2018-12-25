<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;
use function PHPSTORM_META\map;

class CreatePackages extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:packages {pack}';

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
        $app = Storage::disk('app');
        if (strpos($this->argument('pack'), ':') >= 1) {
            $array = explode(':', $this->argument('pack'));
            if (count($array) == 2) {
                $dir = ucfirst($array[0]);
                if (preg_match('/#[a-z,A-z]/', $array[1])) {
                    $c = ucfirst(str_replace('#', '', $array[1]));
                    $app->makeDirectory($dir);
                    $app->makeDirectory($dir . '/' . 'Controller');
                    $this->info('Create Controller in ' . $dir . '/' . 'Controller/' . $c . '' . "Controller.php");
                    $app->put($dir . '/' . 'Controller/' . $c . '' . "Controller.php", $this->controler($dir, $c));
                    $this->info("create success full " . $c . '' . "Controller in pack" . $dir);
                } else if (preg_match('/@[a-z,A-z]/', $array[1])) {
                    $m = ucfirst(str_replace('@', '', $array[1]));
                    $app->makeDirectory($dir);
                    $app->makeDirectory($dir . '/' . 'Model');
                    $app->put($dir . '/' . 'Model/' . "$m.php", $this->model($dir, $m));
                    $this->info("create success full Model " . $m . '' . " in pack" . $dir);

                } else {
                    $this->info('for mak use [controler as #,model as @] example Main:#GitControler');
                }
            } else {
                $this->info('for mak use [controler as #,model as @] example Main:#GitControler');
            }


        } else {

            $dir = ucfirst($this->argument('pack'));
            $app->makeDirectory($dir);
            $app->makeDirectory($dir . '/' . 'Controller');
            $app->put($dir . '/' . 'Controller/' . $dir . "Controller.php", $this->controler($dir, $dir));

            $app->makeDirectory($dir . '/' . 'Model');
            $app->put($dir . '/' . 'Model/' . "$dir.php", $this->model($dir, $dir));


            $this->routBase($dir, $app, $dir);

            $app->makeDirectory($dir . '/' . 'View');
            $this->alert("create success full " . $this->argument('pack'));
        }
    }

    public function controler($pack, $controler)
    {
        $controler = $controler . "Controller";
        return "<?php\n
namespace App\\Packages\\$pack\\Controller;
use App\\Packages\\Tools\\Extend\\WebPackages;

class $controler extends WebPackages{
    
}";
    }

    public function model($pack, $model)
    {
        return "<?php\n

namespace App\\Packages\\$pack\\Model;

use App\\Packages\\Tools\\Extend\\Entity;

class $model extends Entity
{

    protected \$table = '$model';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected \$fillable = [
        'id',
    ];
    public \$timestamps = false;

}
";
    }

    public function routBase($pack, $app, $dir)
    {
        $pack = ucfirst($pack);
//        $last = include base_path('routes/routes.php');
//        die(print_r($last));
//        if (!in_array($pack, $last)) {
//            $last[] = $pack;
//        }
//        $last1 = collect($last);
//        $new = $last1->map(function ($name) {
//            return $name;
//        });
//        $this->info("add pack '$pack' in routes");
//        $route = Storage::disk('routes');
//        $route->put('routes.php', '<?php ' . "\n" . 'return ' . $new . ';');

        $app->makeDirectory($dir . '/' . 'Route');
        $app->put($dir . '/' . 'Route/routes.php', '<?php' . "\n\n");
        $app->put($dir . '/' . 'Route/api.php', '<?php' . "\n\n");
    }
}
