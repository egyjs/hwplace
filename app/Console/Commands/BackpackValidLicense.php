<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use ReflectionClass;

class BackpackValidLicense extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:backpack-valid';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'make a valid license for backpack';

    protected $backpack_service_provider = "Backpack\\CRUD\\BackpackServiceProvider";
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
     * @return int
     */
    public function handle()
    {
        // set new content
        file_put_contents($this->backpack_service_provider_file_path(),$this->service_new_content());
        return 0;
    }

    private function backpack_service_provider_file_path(){
        $reflector = new ReflectionClass($this->backpack_service_provider);
        return $reflector->getFileName();
    }

    private function service_new_content(){
        // path
        $service_path = $this->backpack_service_provider_file_path();
        $service_content = file_get_contents($service_path);

        // regex
        $re = '/(\$this\->sendUsageStats\(\)\;|\$this->checkLicenseCodeExists\(\)\;)/m';
        $subst = '// $1 ----------sorry-----------';
        $str = $service_content;

        // replace
        return preg_replace($re, $subst, $str);
    }
}
