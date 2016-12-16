<?php
/**
 * Vain Framework
 *
 * PHP Version 7
 *
 * @package   vain-api
 * @license   https://opensource.org/licenses/MIT MIT License
 * @link      https://github.com/allflame/vain-api
 */

namespace Vain\Core\Api\Command;

/**
 * Class AbstractApiCommand
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
abstract class AbstractApiCommand implements ApiCommandInterface
{
    private $nextCommand;

    /**
     * AbstractApiCommand constructor.
     *
     * @param ApiCommandInterface $apiCommand
     */
    public function __construct(ApiCommandInterface $apiCommand)
    {
        $this->nextCommand = $apiCommand;
    }

    /**
     * @return ApiCommandInterface
     */
    public function getNextCommand(): ApiCommandInterface
    {
        return $this->nextCommand;
    }
}
