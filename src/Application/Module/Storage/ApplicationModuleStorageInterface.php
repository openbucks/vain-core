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
 * Interface ApplicationModuleStorageInterface
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
interface ApplicationModuleStorageInterface
{
    /**
     * @param ApplicationModuleInterface $applicationModule
     *
     * @return ApplicationModuleStorageInterface
     */
    public function addModule(ApplicationModuleInterface $applicationModule) : ApplicationModuleStorageInterface;


    /**
     * @param string $name
     *
     * @return ApplicationModuleInterface
     */
    public function getModule(string $name) : ApplicationModuleInterface;

    /**
     * @return array
     */
    public function getModules() : array;
}