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

/**
 * Class AbstractCoreException
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
abstract class AbstractCoreException extends \Exception implements CoreExceptionInterface
{
    /**
     * @inheritDoc
     */
    public function jsonSerialize() : array
    {
        return ['code' => $this->getCode(), 'message' => $this->getMessage()];
    }
}