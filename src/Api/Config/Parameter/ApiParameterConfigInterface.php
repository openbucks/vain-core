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

namespace Vain\Core\Api\Config\Parameter;

/**
 * Interface ApiParameterConfigInterface
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
interface ApiParameterConfigInterface
{
    /**
     * @return string
     */
    public function getName() : string;

    /**
     * @return string
     */
    public function getType() : string;

    /**
     * @return string
     */
    public function getSource() : string;

    /**
     * @return string
     */
    public function getSourceName() : string;

    /**
     * @return bool
     */
    public function isOptional() : bool;

    /**
     * @return mixed
     */
    public function getDefaultValue();
}
