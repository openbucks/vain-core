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
 * Interface ApiConfigParameterMissingResult
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
class ApiConfigParameterMissingResult extends AbstractApiConfigParameterFailedResult
{
    private $name;

    /**
     * ApiConfigParameterMissingResult constructor.
     *
     * @param string $name
     */
    public function __construct($name)
    {
        $this->name = $name;
        parent::__construct();
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return sprintf('Required parameter %s is missing', $this->name);
    }
}