<?php


namespace app\routing;



use Psr\Http\Message\StreamInterface;
use React\Http\Message\Response;
use React\Stream\ReadableStreamInterface;

class JsonResponse
{
    /**
     * Generate a React Json Response
     * @param int                                            $status  HTTP status code (e.g. 200/404)
     * @param array<string,string|string[]>                  $headers additional response headers
     * @param string|ReadableStreamInterface|StreamInterface $body    response body
     * @param string                                         $version HTTP protocol version (e.g. 1.1/1.0)
     * @param ?string                                        $reason  custom HTTP response phrase
     * @throws \InvalidArgumentException for an invalid body
     */
    public static function generate(
        $body = '',
        $status = 200,
        array $headers = array(),
        $version = '1.1',
        $reason = null
    ): Response
    {
        return new Response(
            $status,
            [
                'Content-Type' => 'application/json',
                ...$headers,
            ],
            json_encode($body),
            $version,
            $reason
        );
    }
}