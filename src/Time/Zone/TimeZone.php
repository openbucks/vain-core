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

namespace Vain\Core\Time\Zone;

use Vain\Core\Time\Zone\TimeZoneInterface;

/**
 * Class TimeZone
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
class TimeZone extends \DateTimeZone implements TimeZoneInterface
{
    private $synonym;

    private $abbreviation;

    /**
     * TimeZone constructor.
     *
     * @param string $timezone
     * @param string $synonym
     * @param string $abbreviation
     */
    public function __construct(string $timezone, string $synonym, string $abbreviation)
    {
        $this->synonym = $synonym;
        $this->abbreviation = $abbreviation;
        parent::__construct($timezone);
    }

    /**
     * @return string
     */
    public function getSynonym() : string
    {
        return $this->synonym;
    }

    /**
     * @return string
     */
    public function getAbbreviation() : string
    {
        return $this->abbreviation;
    }
}