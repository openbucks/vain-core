<?php
/**
 * Vain Framework
 *
 * PHP Version 7
 *
 * @package   vain-core
 * @license   https://opensource.org/licenses/MIT MIT License
 * @link      https://github.com/allflame/vain-core
 */
declare(strict_types = 1);

namespace Vain\Core\Application\Module\Storage;

use Vain\Core\Application\Module\ApplicationModuleInterface;
use Vain\Core\Exception\DuplicateApplicationModuleException;
use Vain\Core\Exception\UnknownModuleException;

/**
 * Class ApplicationModuleStorage
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
class ApplicationModuleStorage implements ApplicationModuleStorageInterface
{
    private $modules;

    public function __construct(array $modules = [])
    {
        foreach ($modules as $module) {
            $this->addModule($module);
        }
    }

    /**
     * @inheritDoc
     */
    public function addModule(ApplicationModuleInterface $applicationModule) : ApplicationModuleStorageInterface
    {
        $name = $applicationModule->getName();
        if (array_key_exists($name, $this->modules)) {
            throw new DuplicateApplicationModuleException($this, $name, $applicationModule, $this->modules[$name]);
        }
        $this->modules[$name] = $applicationModule;

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function getModule(string $name) : ApplicationModuleInterface
    {
        if (false === array_key_exists($name, $this->modules)) {
            throw new UnknownModuleException($this, $name);
        }

        return $this->modules[$name];
    }

    /**
     * @inheritDoc
     */
    public function getModules() : array
    {
        return $this->modules;
    }

}