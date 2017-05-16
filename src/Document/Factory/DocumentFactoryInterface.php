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

namespace Vain\Core\Document\Factory;

use Vain\Core\Document\DocumentInterface;

/**
 * Class DocumentFactoryInterface
 *
 * @author Nazar Ivanenko <nivanenko@gmail.com>
 */
interface DocumentFactoryInterface
{
    /**
     * @param string $documentName
     * @param array  $documentData
     *
     * @return DocumentInterface
     */
    public function createDocument(string $documentName, array $documentData) : DocumentInterface;

    /**
     * @param DocumentInterface $document
     * @param array           $documentData
     *
     * @return DocumentInterface
     */
    public function updateDocument(DocumentInterface $document, array $documentData) : DocumentInterface;
}
