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

namespace Vain\Core\Extension;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Vain\Core\Extension\Compiler\CacheFactoryCompilerPass;
use Vain\Core\Extension\Compiler\ConnectionFactoryCompilerPass;
use Vain\Core\Extension\Compiler\DatabaseFactoryCompilerPass;

/**
 * Class CoreExtension
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
class CoreExtension extends AbstractExtension
{
    /**
     * @inheritDoc
     */
    public function load(array $configs, ContainerBuilder $container) : AbstractExtension
    {
        $container
            ->addCompilerPass(new ConnectionFactoryCompilerPass())
            ->addCompilerPass(new DatabaseFactoryCompilerPass())
            ->addCompilerPass(new CacheFactoryCompilerPass());

        return parent::load($configs, $container);
    }
}
