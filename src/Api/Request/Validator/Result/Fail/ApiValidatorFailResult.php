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
declare(strict_types = 1);

namespace Vain\Core\Api\Request\Validator\Result\Fail;

use Vain\Core\Api\Request\ApiRequestInterface;
use Vain\Core\Api\Request\Validator\Result\ApiValidatorResultInterface;
use Vain\Core\Result\FailedResult;

/**
 * Class ApiValidatorFailResult
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
class ApiValidatorFailResult extends FailedResult implements ApiValidatorResultInterface
{
    private $errors;

    /**
     * ApiRequestValidatorFailResult constructor.
     *
     * @param array $errors
     */
    public function __construct(array $errors = [])
    {
        $this->errors = $errors;
        parent::__construct();
    }

    /**
     * @inheritDoc
     */
    public function getRequest() : ApiRequestInterface
    {
        return null;
    }

    /**
     * @inheritDoc
     */
    public function toDisplay(): array
    {
        return array_merge(parent::toDisplay(), ['errors' => $this->errors]);
    }

    /**
     * @return array
     */
    public function getErrors(): array
    {
        return $this->errors;
    }
}
