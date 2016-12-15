<?php
/**
 * Vain Framework
 *
 * PHP Version 7
 *
 * @package   vain-time
 * @license   https://opensource.org/licenses/MIT MIT License
 * @link      https://github.com/allflame/vain-time
 */
declare(strict_types = 1);

namespace Vain\Core\Time\Factory;

use Vain\Core\Time\TimeInterface;

/**
 * Interface TimeFactoryInterface
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
interface TimeFactoryInterface
{
    /**
     * @param string $string
     * @param string $timeZoneName
     * @param string $locale
     *
     * @return \Vain\Core\Time\TimeInterface
     */
    public function createFromString(
        string $string,
        string $timeZoneName = '',
        string $locale = ''
    ) : TimeInterface;
}