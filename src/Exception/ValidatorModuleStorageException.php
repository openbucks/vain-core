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
use Vain\Core\Exception\AbstractCoreException;

/**
 * Class ValidatorModuleStorageException
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
class ValidatorModuleStorageException extends AbstractCoreException
{
    private $moduleStorage;

    /**
     * ValidatorModuleStorageException constructor.
     *
     * @param ApiValidatorModuleStorageInterface $moduleStorage
     * @param string                             $message
     * @param int                                $code
     * @param \Exception|null                    $previous
     */
    public function __construct(
        ApiValidatorModuleStorageInterface $moduleStorage,
        string $message,
        int $code = 500,
        \Exception $previous = null
    ) {
        $this->moduleStorage = $moduleStorage;
        parent::__construct($message, $code, $previous);
    }

    /**
     * @return ApiValidatorModuleStorageInterface
     */
    public function getModuleStorage(): ApiValidatorModuleStorageInterface
    {
        return $this->moduleStorage;
    }
}
