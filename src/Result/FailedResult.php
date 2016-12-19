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

    private $errors;

    /**
     * FailedResult constructor.
     *
     * @param string $message
     * @param array  $errors
     */
    public function __construct(string $message = '', array $errors = [])
    {
        $this->message = $message;
        $this->errors = $errors;
        parent::__construct(false);
    }


    /**
     * @inheritDoc
     */
    public function __toString() : string
    {
        return $this->message;
    }

    /**
     * @inheritDoc
     */
    public function toDisplay() : array
    {
        if ([] === $this->errors) {
            return parent::toDisplay();
        }

        return array_merge(parent::toDisplay(), $this->errors);
    }
}
