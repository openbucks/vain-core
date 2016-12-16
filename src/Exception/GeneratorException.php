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

use Vain\Core\Exception\AbstractCoreException;
use Vain\Core\Database\Generator\DatabaseGeneratorInterface;

/**
 * Class GeneratorException
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
class GeneratorException extends AbstractCoreException
{
    private $generator;

    /**
     * DatabaseGeneratorException constructor.
     *
     * @param DatabaseGeneratorInterface $databaseGenerator
     * @param string             $message
     * @param int                $code
     * @param \Exception         $previous
     */
    public function __construct(
        DatabaseGeneratorInterface $databaseGenerator,
        string $message,
        int $code = 500,
        \Exception $previous = null
    ) {
        $this->generator = $databaseGenerator;
        parent::__construct($message, $code, $previous);
    }

    /**
     * @return DatabaseGeneratorInterface
     */
    public function getGenerator() : DatabaseGeneratorInterface
    {
        return $this->generator;
    }
}
