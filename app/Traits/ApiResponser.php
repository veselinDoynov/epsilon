<?php

namespace App\Traits;

use Illuminate\Http\Response;

trait ApiResponser
{
    /**
     * Build a success response
     * @param  string|array $data
     * @param  int $code
     * @return Illuminate\Http\Response
     */
    public function successResponse($data, $code = Response::HTTP_OK)
    {
        return response()->json(['data' => ["success" => $data]], $code);
    }

    /**
     * Build a success response
     * @param  string|array $data
     * @param  int $code
     * @return Illuminate\Http\Response
     */
    public function metaResponse($data, $code = Response::HTTP_OK)
    {
        return response($data, $code)->header('Content-Type', 'application/json');
    }

    /**
     * Build a valid response
     * @param  string|array $data
     * @param  int $code
     * @return Illuminate\Http\JsonResponse
     */
    public function validResponse($data, $code = Response::HTTP_OK)
    {
        return response()->json(['data' => $data], $code);
    }

    /**
     * Build error responses
     * @param  string $message
     * @param  int $code
     * @return Illuminate\Http\JsonResponse
     */
    public function errorResponse($message, $code)
    {
        if(!is_object($message))
        {
            return response()->json(['error' => $message, 'code' => $code], $code);
        }
        $message = $message->toArray();
        $messageFormatted = [];
        foreach($message as $key => $error)
        {
            $key = explode('.', $key);
            if(isset($key[2])){
                $messageFormatted[$key[2]] = $error;
            }
        }

        $message = !empty($messageFormatted) ? $messageFormatted : $message;
        return response()->json(['error' => $message, 'code' => $code], $code);
    }

    /**
     * Build error responses
     * @param  string $message
     * @param  int $code
     * @return Illuminate\Http\JsonResponse
     */
    public function generalErrorResponse($message, $code)
    {
        return response()->json(['error' => ['generalError' => [$message]], 'code' => $code], $code);
    }

    /**
     * Return an error in JSON format
     * @param  string $message
     * @param  int $code
     * @return Illuminate\Http\Response
     */
    public function errorMessage($message, $code)
    {
        return response($message, $code)->header('Content-Type', 'application/json');
    }
}
