<?php

namespace App\Http\Response;

use Carbon\Carbon;
use Illuminate\Http\Response as HttpResponse;

class Response extends HttpResponse
{
    private $body;
    /**
     * @var Carbon
     */
    private $carbon;

    public function __construct(Carbon $carbon)
    {
        parent::__construct();

        $this->carbon = $carbon;
    }

    public function getBody()
    {
        return $this->body;
    }

    public function setBody($body)
    {
        $this->body = $body;
    }

    public function getMeta(): array
    {
        return [
            'created_at' => $this->carbon->now()->toDateTimeString(),
            'hash' => md5(json_encode($this->body))
        ];
    }

    public function toResponse(): array
    {
        return [
            'payload' => $this->getBody(),
            'meta' => $this->getMeta()
        ];
    }
}