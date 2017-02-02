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

namespace Vain\Core\Api\Config\Parameter\Result;

use Vain\Core\Result\SuccessfulResult;

/**
 * Class ApiConfigParameterSuccessfulResult
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
class ApiConfigParameterSuccessfulResult extends SuccessfulResult implements ApiConfigParameterResultInterface
{
    private $value;

    /**
     * ApiConfigParameterSuccessfulResult constructor.
     *
     * @param mixed $value
     */
    public function __construct($value)
    {
        $this->value = $value;
        parent::__construct();
    }

    /**
     * @inheritDoc
     */
    public function getValue(): array
    {
        return $this->value;
    }
}