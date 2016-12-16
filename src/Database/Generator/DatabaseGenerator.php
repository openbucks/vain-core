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

namespace Vain\Core\Database\Generator;

use Vain\Core\Database\Cursor\DatabaseCursorInterface;
use Vain\Core\Exception\RewindGeneratorException;

/**
 * Class Generator
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
class DatabaseGenerator implements DatabaseGeneratorInterface
{
    private $cursor;

    private $count = 0;

    /**
     * Generator constructor.
     *
     * @param DatabaseCursorInterface   $cursor
     */
    public function __construct(DatabaseCursorInterface $cursor)
    {
        $this->cursor = $cursor;
    }

    /**
     * @inheritDoc
     */
    public function rewind() : bool
    {
        throw new RewindGeneratorException($this);
    }

    /**
     * @inheritDoc
     */
    public function current() : array
    {
        return $this->cursor->current();
    }

    /**
     * @inheritDoc
     */
    public function next()
    {
        $this->count++;
        $this->cursor->next();
    }

    /**
     * @inheritDoc
     */
    public function valid() : bool
    {
        return $this->cursor->valid();
    }

    /**
     * @inheritDoc
     */
    public function key() : int
    {
        return $this->count;
    }

    /**
     * @inheritDoc
     */
    public function getSingleRow(int $mode) : array
    {
        $this->cursor->mode($mode);
        $result = $this->cursor->getSingle();
        $this->count = 0;

        return $result;
    }

    /**
     * @inheritDoc
     */
    public function getAllRows(int $mode) : array
    {
        $this->cursor->mode($mode);
        $results = $this->cursor->getAll();
        $this->count = count($results);

        return $results;
    }

    /**
     * @inheritDoc
     */
    public function count() : int
    {
        return $this->cursor->count();
    }
}
