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


/**
 * Class ApiConfigParameterWrongTypeResult
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
class ApiConfigParameterWrongTypeResult extends AbstractApiConfigParameterFailedResult
{
    private $name;

    private $expected;

    private $actualValue;

    /**
     * ApiConfigParameterWrongTypeResult constructor.
     *
     * @param string $name
     * @param string $expected
     * @param        $actualValue
     */
    public function __construct(string $name, string $expected, $actualValue)
    {
        $this->name = $name;
        $this->expected = $expected;
        $this->actualValue = $actualValue;
        parent::__construct();
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return sprintf(
            'Parameter %s [%s] is not an %s',
            $this->name,
            $this->expected,
            var_export($this->actualValue, true)
        );
    }
}