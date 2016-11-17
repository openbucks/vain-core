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

/**
 * Class ApplicationModuleStorage
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
class ApplicationModuleStorage implements ApplicationModuleStorageInterface
{
    private $modules = [];

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
        $this->modules[] = $applicationModule;

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function getModules() : array
    {
        return $this->modules;
    }

}