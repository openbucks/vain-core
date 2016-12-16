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

namespace Vain\Core\Time\Locale\Us;

use Vain\Core\Time\Locale\AbstractLocale;
use Vain\Core\Time\TimeInterface;

/**
 * Class UsLocale
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
class UsLocale extends AbstractLocale
{
    /**
     * UsLocale constructor.
     *
     */
    public function __construct()
    {
        parent::__construct(
            TimeInterface::SUNDAY,
            TimeInterface::SATURDAY,
            [TimeInterface::SATURDAY, TimeInterface::SUNDAY],
            'Y-m-d H:i:s'
        );
    }

    /**
     * @inheritDoc
     */
    public function getLanguage() : string
    {
        return 'us';
    }
}