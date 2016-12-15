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

namespace Vain\Core\Locale;

/**
 * Interface LocaleInterface
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
interface LocaleInterface
{
    /**
     * @return string
     */
    public function getLanguage() : string;

    /**
     * @return int
     */
    public function getWeekStartsAt() : int;

    /**
     * @return int
     */
    public function getWeekEndsAt() : int;

    /**
     * @return array
     */
    public function getWeekendDays() : array;

    /**
     * @return string
     */
    public function getDefaultFormat() : string;
}