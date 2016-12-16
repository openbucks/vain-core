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

namespace Vain\Core\Locale;

/**
 * Class AbstractLocale
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
abstract class AbstractLocale implements LocaleInterface
{
    private $weekStartsAt;

    private $weekEndsAt;

    private $weekendDays;

    private $defaultFormat;

    /**
     * AbstractLocale constructor.
     *
     * @param int    $weekStartsAt
     * @param int    $weekEndsAt
     * @param array  $weekendDays
     * @param string $defaultFormat
     */
    public function __construct(int $weekStartsAt, int $weekEndsAt, array $weekendDays, string $defaultFormat)
    {
        $this->weekStartsAt = $weekStartsAt;
        $this->weekEndsAt = $weekEndsAt;
        $this->weekendDays = $weekendDays;
        $this->defaultFormat = $defaultFormat;
    }

    /**
     * @return int
     */
    public function getWeekStartsAt() : int
    {
        return $this->weekStartsAt;
    }

    /**
     * @return int
     */
    public function getWeekEndsAt() : int
    {
        return $this->weekEndsAt;
    }

    /**
     * @return array
     */
    public function getWeekendDays() : array
    {
        return $this->weekendDays;
    }

    /**
     * @return string
     */
    public function getDefaultFormat() : string
    {
        return $this->defaultFormat;
    }
}