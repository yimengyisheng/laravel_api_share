<?php

/**
 * 系统错误统一方法
 * @throws \App\Exceptions\SystemException
 */
function serverError($exception, $msg = 'internal_server_error')
{
    logError($exception);
    throw new \App\Exceptions\SystemException($msg,
        \Illuminate\Http\Response::HTTP_INTERNAL_SERVER_ERROR);
}

function isDebug()
{
    return config('app.debug');
}

function logError(\Exception $e, $prefix = '', $data = [])
{
    $prefix = !empty($prefix) ? $prefix : request()->route()->getName();
    Log::error($prefix . ' [message]:' . $e->getMessage() . '  in' . $e->getFile() . '(L:' . $e->getLine() . ')。参数为：' . print_r($data,
            true));
}

/**
 * 获取用户token
 */
function getToken()
{
    return auth('api')->getToken();
}

/**
 * 获取当前用户信息
 */
function getUser()
{
    return auth('api')->user();
}


