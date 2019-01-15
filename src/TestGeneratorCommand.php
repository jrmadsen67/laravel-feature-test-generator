<?php

namespace jrmadsen67\FeatureTestGenerator;

use Illuminate\Console\Command;
use Illuminate\Console\DetectsApplicationNamespace;
use Illuminate\Filesystem\Filesystem;

class TestGeneratorCommand extends Command
{

    use DetectsApplicationNamespace;

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'feature-test:generate {resource}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generates feature tests for a Resource Controller';

    /**
     * The filesystem instance.
     *
     * @var \Illuminate\Filesystem\Filesystem
     */
    protected $files;

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct(Filesystem $files)
    {
        parent::__construct();

        $this->files = $files;
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {

        $resource = strtolower($this->argument('resource'));

        $path = base_path('tests/Feature');
        $this->replaceTest($path, $resource);

        $this->info($resource . ' test created successfully!');
    }

    protected function replaceTest($path, $resource){

        $stub_file = $this->getStubFile();

        $stub = str_replace(
            [
                '{{resource}}',
                '{{class}}',
                '{{namespace}}',
                '{{routeBase}}',
                '{{tablename}}'
            ],
            [
                $resource,
                studly_case($resource),
                $this->getAppNamespace(),
                str_plural($resource),
                str_plural($resource)
            ],
            $stub_file
        );

        $path .=  '/' . studly_case($resource) . 'Test.php';
        $this->files->put($path, $stub);
    }

    protected function getStubFile(){
        if(file_exists(base_path('config/feature-test-generator/stubs/resource_feature_tests.stub'))){
            return $this->files->get(base_path('config/feature-test-generator/stubs/resource_feature_tests.stub'));
        }

        return $this->files->get(__DIR__.'/stubs/resource_feature_tests.stub');
    }
}
