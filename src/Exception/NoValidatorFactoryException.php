<?php
/**
 * Vain Framework
 *
 * PHP Version 7
 *
 * @package   vain-api
 * @license   https://opensource.org/licenses/MIT MIT License
 * @link      https://github.com/allflame/vain-api
 */
declare(strict_types = 1);

namespace Vain\Core\Exception;

use Vain\Core\Api\Request\Validator\Module\Storage\ApiValidatorModuleStorageInterface;

/**
 * Class NoValidatorFactoryException
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
class NoValidatorFactoryException extends ValidatorModuleStorageException
{
    /**
     * NoValidatorFactoryException constructor.
     *
     * @param ApiValidatorModuleStorageInterface $moduleStorage
     * @param string                             $moduleName
     */
    public function __construct(ApiValidatorModuleStorageInterface $moduleStorage, string $moduleName)
    {
        parent::__construct($moduleStorage, sprintf('No validator factories registered for module %s', $moduleName));
    }
}
