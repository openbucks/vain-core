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

namespace Vain\Core\Result;

/**
 * Class AbstractFailedResult
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
abstract class AbstractFailedResult extends AbstractResult implements ResultInterface
{
    /**
     * FailedResult constructor.
     *
     * @param string $message
     */
    public function __construct()
    {
        parent::__construct(false);
    }
}
