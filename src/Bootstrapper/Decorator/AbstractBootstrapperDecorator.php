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

namespace Vain\Core\Bootstrapper\Decorator;

use Vain\Core\Application\ApplicationInterface;
use Vain\Core\Bootstrapper\BootstrapperInterface;

/**
 * Class AbstractBootstrapperDecorator
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
class AbstractBootstrapperDecorator implements BootstrapperInterface
{
    private $bootstrapper;

    /**
     * AbstractBootstrapperDecorator constructor.
     *
     * @param BootstrapperInterface $bootstrapper
     */
    public function __construct(BootstrapperInterface $bootstrapper)
    {
        $this->bootstrapper = $bootstrapper;
    }

    /**
     * @inheritDoc
     */
    public function bootstrap(ApplicationInterface $application) : BootstrapperInterface
    {
        return $this->bootstrapper->bootstrap($application);
    }
}