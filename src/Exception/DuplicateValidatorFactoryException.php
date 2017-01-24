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

use Vain\Core\Api\Request\Validator\Module\Factory\ApiValidatorModuleFactoryInterface;
use Vain\Core\Api\Request\Validator\Module\Storage\ApiValidatorModuleStorageInterface;

/**
 * Class DuplicateValidatorFactoryException
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
class DuplicateValidatorFactoryException extends ValidatorModuleStorageException
{
    /**
     * DuplicateValidatorFactoryException constructor.
     *
     * @param ApiValidatorModuleStorageInterface $moduleStorage
     * @param ApiValidatorModuleFactoryInterface $new
     * @param ApiValidatorModuleFactoryInterface $old
     */
    public function __construct(
        ApiValidatorModuleStorageInterface $moduleStorage,
        ApiValidatorModuleFactoryInterface $new,
        ApiValidatorModuleFactoryInterface $old
    ) {
        parent::__construct(
            $moduleStorage,
            sprintf(
                'Trying to register validator factory %s with the same name %s as already registered %s',
                get_class($new),
                implode(', ', $new->getNames()),
                get_class($old)
            )
        );
    }
}
