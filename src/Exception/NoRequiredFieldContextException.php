<?php
/**
 * Vain Framework
 *
 * PHP Version 7
 *
 * @package   vain-config
 * @license   https://opensource.org/licenses/MIT MIT License
 * @link      https://github.com/allflame/vain-config
 */
declare(strict_types = 1);

namespace Vain\Core\Exception;

use Vain\Core\Application\Context\Factory\ApplicationContextFactoryInterface;
use Vain\Core\Exception\ApplicationContextFactoryException;

/**
 * Class NoRequiredFieldContextException
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
class NoRequiredFieldContextException extends ApplicationContextFactoryException
{
    /**
     * NoRequiredFieldContextException constructor.
     *
     * @param ApplicationContextFactoryInterface $contextFactory
     * @param string                             $requiredField
     */
    public function __construct(ApplicationContextFactoryInterface $contextFactory, $requiredField)
    {
        parent::__construct($contextFactory, sprintf('Required field %s is missing from config', $requiredField));
    }
}
