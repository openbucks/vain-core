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

namespace Vain\Core\Time\Locale\Ru;

use Vain\Core\Time\Locale\AbstractLocale;
use Vain\Core\Time\TimeInterface;

/**
 * Class RuLocale
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
class RuLocale extends AbstractLocale
{
    /**
     * RuLocale constructor.
     *
     */
    public function __construct()
    {
        parent::__construct(
            TimeInterface::MONDAY,
            TimeInterface::SUNDAY,
            [TimeInterface::SATURDAY, TimeInterface::SUNDAY],
            'Y-m-d H:i:s'
        );
    }

    /**
     * @inheritDoc
     */
    public function getLanguage() : string
    {
        return 'ru';
    }
}