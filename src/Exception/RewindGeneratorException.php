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

namespace Vain\Core\Exception;

use Vain\Core\Database\Generator\DatabaseGeneratorInterface;

/**
 * Class RewindGeneratorException
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
class RewindGeneratorException extends GeneratorException
{
    /**
     * VainDatabaseGeneratorRewindException constructor.
     *
     * @param DatabaseGeneratorInterface $databaseGenerator
     */
    public function __construct(DatabaseGeneratorInterface $databaseGenerator)
    {
        parent::__construct($databaseGenerator, 'Generators are non-rewindable');
    }
}
