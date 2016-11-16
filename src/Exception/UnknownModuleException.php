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

namespace Vain\Core\Exception;

use Vain\Core\Application\Module\Storage\ApplicationModuleStorageInterface;

/**
 * Class UnknownModuleException
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
class UnknownModuleException extends ApplicationModuleStorageException
{
    /**
     * UnknownConnectionException constructor.
     *
     * @param ApplicationModuleStorageInterface $moduleStorage
     * @param string                            $moduleName
     */
    public function __construct(ApplicationModuleStorageInterface $moduleStorage, string $moduleName)
    {
        parent::__construct($moduleStorage, sprintf('Module %s is not registered', $moduleName));
    }
}