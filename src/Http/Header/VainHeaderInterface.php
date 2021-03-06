<?php
/**
 * Vain Framework
 *
 * PHP Version 7
 *
 * @package   vain-http
 * @license   https://opensource.org/licenses/MIT MIT License
 * @link      https://github.com/allflame/vain-http
 */
declare(strict_types = 1);

namespace Vain\Core\Http\Header;

use Vain\Core\String\StringInterface;

/**
 * Interface VainHeaderInterface
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
interface VainHeaderInterface extends StringInterface
{
    /**
     * @param string $name
     *
     * @return VainHeaderInterface
     */
    public function setName(string $name) : VainHeaderInterface;

    /**
     * @return string
     */
    public function getName() : string;

    /**
     * @param array $values
     *
     * @return VainHeaderInterface
     */
    public function setValues(array $values) : VainHeaderInterface;

    /**
     * @return array
     */
    public function getValues() : array;

    /**
     * @param string $value
     *
     * @return VainHeaderInterface
     */
    public function addValue($value) : VainHeaderInterface;
}