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
 * Class FailedResult
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
class FailedResult extends AbstractResult implements ResultInterface
{
    private $message;

    /**
     * FailedResult constructor.
     *
     * @param string $message
     */
    public function __construct(string $message = '')
    {
        $this->message = $message;
        parent::__construct(false);
    }


    /**
     * @inheritDoc
     */
    public function __toString() : string
    {
        return $this->message;
    }
}
