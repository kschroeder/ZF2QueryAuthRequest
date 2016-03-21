<?php

namespace Eschrade\QueryAuth\Request\Incoming;

use QueryAuth\Request\IncomingRequestInterface;
use QueryAuth\Request\RequestInterface;
use Zend\Http\Request;

class Zf2RequestAdapter  implements IncomingRequestInterface, RequestInterface
{

    protected $request;

    public function __construct(
        Request $request
    )
    {
        $this->request = $request;
    }

    public function getMethod()
    {
        return $this->request->getMethod();
    }

    public function getHost()
    {
        return $this->request->getUri()->getHost();
    }

    public function getPath()
    {
        $this->request->getUri()->getPath();
    }

    public function getParams()
    {
        if ($this->getMethod() === Request::METHOD_GET) {
            return $this->request->getQuery()->toString();
        }

        return $this->request->getPost()->toArray();
    }


}