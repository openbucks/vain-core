<?php
/**
 * Vain Framework
 *
 * PHP Version 7
 *
 * @package   vain-database
 * @license   https://opensource.org/licenses/MIT MIT License
 * @link      https://github.com/allflame/vain-database
 */
declare(strict_types = 1);

namespace Vain\Core\Database\Extension;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Vain\Core\Extension\AbstractExtension;
use Vain\Core\Database\Extension\Compiler\DatabaseFactoryCompilerPass;

/**
 * Class DatabaseExtension
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
class DatabaseExtension extends AbstractExtension
{
    /**
     * @inheritDoc
     */
    public function load(array $configs, ContainerBuilder $container) : AbstractExtension
    {
        $container->addCompilerPass(new DatabaseFactoryCompilerPass());

        return parent::load($configs, $container);
    }
}
