<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Filesystem\Filesystem;

class ModuleCommand extends Command
{
    public $files;
    const NAMESPACE = 'app/Modules';

    /**
     * __DIR__ = /var/www/html/app/Console/Commands
     * SOURCE_FILE = /var/www/html/app/Console/Commands/../../../resources/stubs/
     */
    const SOURCE_FILE = __DIR__ . '/../../../resources/stubs/';
    public function __construct(Filesystem $files)
    {
        parent::__construct();

        $this->files = $files;
    }

    protected $signature = 'make:module {path}';
    protected $description = 'Create module successfully';

    public function handle()
    {
        $pathArgument = $this->argument('path');

        [$path, $class, $instance] = $this->getNameModule($pathArgument);

        $this->mkdirModel($pathArgument, $path, $class);
        $this->mkdirController($pathArgument, $path, $class, $instance);
        $this->mkdirRequest($pathArgument, $path, $class);
        $this->mkdirInterface($pathArgument, $path, $class);
        $this->mkdirService($pathArgument, $path, $class, $instance);
        $this->mkdirTrait($pathArgument, $path);

        return $this->info("Module [app/Modules/{$pathArgument}] created successfully");
    }

    /**
     * @param $pathArgument
     * @param $path
     * @param $class
     *
     * @return bool|void
     */
    protected function mkdirModel($pathArgument, $path, $class)
    {
        $fullPath = base_path(self::NAMESPACE) . '/' . $pathArgument . '/Models';
        $resultMakeDirectory = $this->makeDir($fullPath);

        if ($resultMakeDirectory) {
            $stubModel = self::SOURCE_FILE.'model.module.stub';
            $fileStubContent = file_get_contents($stubModel);

            $content = str_replace(
                [
                    '{{ path }}',
                    '{{ nameModule }}'
                ],
                [$path, $class],
                $fileStubContent
            );

            return $this->putFile($fullPath . "/{$class}.php", $content);
        }
    }

    /**
     * @param $pathArgument
     * @param $path
     * @param $class
     * @param $instance
     *
     * @return bool|void
     */
    protected function mkdirController($pathArgument, $path, $class, $instance)
    {
        $fullPath = base_path(self::NAMESPACE) . '/' . $pathArgument . '/Http/Controllers';
        $resultMakeDirectory = $this->makeDir($fullPath);

        if ($resultMakeDirectory) {
            $stubModel = self::SOURCE_FILE.'controller.module.stub';
            $fileStubContent = file_get_contents($stubModel);

            $content = str_replace(
                [
                    '{{ path }}',
                    '{{ nameModule }}',
                    '{{ name }}'
                ],
                [$path, $class, $instance],
                $fileStubContent
            );

            return $this->putFile($fullPath . "/{$class}Controller.php", $content);
        }
    }

    /**
     * @param $pathArgument
     * @param $path
     * @param $class
     *
     * @return bool|void
     */
    protected function mkdirRequest($pathArgument, $path, $class)
    {
        $fullPath = base_path(self::NAMESPACE) . '/' . $pathArgument . '/Http/Requests';
        $resultMakeDirectory = $this->makeDir($fullPath);

        if ($resultMakeDirectory) {
            $stubModel = self::SOURCE_FILE.'request.module.stub';
            $fileStubContent = file_get_contents($stubModel);

            $content = str_replace(
                [
                    '{{ path }}',
                    '{{ nameModule }}'
                ],
                [$path, $class],
                $fileStubContent
            );

            return $this->putFile($fullPath . "/{$class}Request.php", $content);
        }
    }

    /**
     * @param $pathArgument
     * @param $path
     * @param $class
     *
     * @return bool|void
     */
    protected function mkdirInterface($pathArgument, $path, $class)
    {
        $fullPath = base_path(self::NAMESPACE) . '/' . $pathArgument . '/Interfaces';
        $resultMakeDirectory = $this->makeDir($fullPath);

        if ($resultMakeDirectory) {
            $stubModel = self::SOURCE_FILE.'interface.module.stub';
            $fileStubContent = file_get_contents($stubModel);

            $content = str_replace(
                [
                    '{{ path }}',
                    '{{ nameModule }}'
                ],
                [$path, $class],
                $fileStubContent
            );

            return $this->putFile($fullPath . "/{$class}Interface.php", $content);
        }
    }

    /**
     * @param $pathArgument
     * @param $path
     * @param $class
     * @param $instance
     *
     * @return bool|void
     */
    protected function mkdirService($pathArgument, $path, $class, $instance)
    {
        $fullPath = base_path(self::NAMESPACE) . '/' . $pathArgument . '/Services';
        $resultMakeDirectory = $this->makeDir($fullPath);

        if ($resultMakeDirectory) {
            $stubModel = self::SOURCE_FILE.'service.module.stub';
            $fileStubContent = file_get_contents($stubModel);

            $content = str_replace(
                [
                    '{{ path }}',
                    '{{ nameModule }}',
                    '{{ name }}'
                ],
                [$path, $class, $instance],
                $fileStubContent
            );

            return $this->putFile($fullPath . "/{$class}Service.php", $content);
        }
    }

    protected function mkdirTrait($pathArgument, $path)
    {
        $fullPath = base_path(self::NAMESPACE) . '/' . $pathArgument . '/Traits';
        $resultMakeDirectory = $this->makeDir($fullPath);

        if ($resultMakeDirectory) {
            $stubModel = self::SOURCE_FILE.'trait.module.stub';
            $fileStubContent = file_get_contents($stubModel);

            $content = str_replace(['{{ path }}', '{{ nameTrait }}'], [$path, 'Attribute'], $fileStubContent);
            $this->putFile($fullPath . "/AttributeTrait.php", $content);
            $content = str_replace(['{{ path }}', '{{ nameTrait }}'], [$path, 'Relationship'], $fileStubContent);
            $this->putFile($fullPath . "/RelationshipTrait.php", $content);
            $content = str_replace(['{{ path }}', '{{ nameTrait }}'], [$path, 'Scope'], $fileStubContent);
            $this->putFile($fullPath . "/ScopeTrait.php", $content);
        }
    }

    /**
     * @param $path
     *
     * @return bool
     */
    private function makeDir($path)
    {
        if (!$this->files->isDirectory($path)) {
            $this->files->makeDirectory($path, 0777, true, true);

            return true;
        }

        return false;
    }

    /**
     * @param $fullPath
     * @param $content
     *
     * @return bool
     */
    private function putFile($fullPath, $content)
    {
        if(!$this->files->exists($fullPath)) {
            $this->files->put($fullPath, $content);

            return true;
        }

        return false;
    }

    /**
     * @param $path
     *
     * @return array
     */
    private function getNameModule($path)
    {
        $path = str_replace('/', '\\', $path);
        $pathElementArray = explode('\\', $path);
        $lastElementInArray = $pathElementArray[count($pathElementArray) - 1];

        return [$path, ucfirst($lastElementInArray), strtolower($lastElementInArray)];
    }
}
