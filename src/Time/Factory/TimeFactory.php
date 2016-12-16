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

use Vain\Core\Locale\Storage\LocaleStorageInterface;
use Vain\Core\Time\Time;
use Vain\Core\Time\TimeInterface;
use Vain\Core\Time\Zone\Factory\TimeZoneFactoryInterface;

/**
 * Class TimeFactory
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
class TimeFactory implements TimeFactoryInterface
{
    private $localeRepository;

    private $timeZoneFactory;

    private $defaultTimeZone;

    private $defaultLocale;

    /**
     * TimeFactory constructor.
     *
     * @param LocaleStorageInterface   $localeRepository
     * @param TimeZoneFactoryInterface $timeZoneFactory
     * @param string                   $defaultTimeZone
     * @param string                   $defaultLocale
     */
    public function __construct(
        LocaleStorageInterface $localeRepository,
        TimeZoneFactoryInterface $timeZoneFactory,
        string $defaultTimeZone,
        string $defaultLocale
    ) {
        $this->localeRepository = $localeRepository;
        $this->timeZoneFactory = $timeZoneFactory;
        $this->defaultTimeZone = $defaultTimeZone;
        $this->defaultLocale = $defaultLocale;
    }

    /**
     * @inheritDoc
     */
    public function createFromString(
        string $string,
        string $timeZoneName = '',
        string $locale = ''
    ) : TimeInterface
    {
        $targetLocale = ('' !== $locale) ? $locale : $this->defaultLocale;
        $locale = $this->localeRepository->getLocale($targetLocale);
        $targetZone = ('' !== $timeZoneName) ? $timeZoneName : $this->defaultTimeZone;
        $timeZone = $this->timeZoneFactory->getTimeZone($targetZone, new \DateTime($string));
        $timeZoneNow = $this->timeZoneFactory->getTimeZone($targetZone, new \DateTime('now'));

        return new Time($string, $locale, $timeZone, new Time('now', $locale, $timeZoneNow));
    }
}