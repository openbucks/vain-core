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

namespace Vain\Core\Time\Zone;

/**
 * Class TimeZoneInterface
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
interface TimeZoneInterface
{
    /**
     * @return string
     */
    public function getSynonym() : string;

    /**
     * @return string
     */
    public function getAbbreviation() : string;
}