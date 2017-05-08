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

namespace Vain\Core\Document\Operation\Factory;

use Vain\Core\Document\DocumentInterface;
use Vain\Core\Operation\OperationInterface;

/**
 * Interface DocumentOperationFactoryInterface
 *
 * @author Nazar Ivanenko <nivanenko@gmail.com>
 */
interface DocumentOperationFactoryInterface
{
    /**
     * @param DocumentInterface $document
     *
     * @return OperationInterface
     */
    public function createOperation(DocumentInterface $document) : OperationInterface;

    /**
     * @param DocumentInterface $newDocument
     * @param DocumentInterface $oldDocument
     *
     * @return OperationInterface
     */
    public function updateOperation(DocumentInterface $newDocument, DocumentInterface $oldDocument) : OperationInterface;

    /**
     * @param DocumentInterface $document
     *
     * @return OperationInterface
     */
    public function deleteOperation(DocumentInterface $document) : OperationInterface;
}
