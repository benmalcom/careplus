<?php
/**
 * Created by PhpStorm.
 * User: ben
 * Date: 7/17/2016
 * Time: 9:18 PM
 */

/**
 * @param array $pageInfo
 * @param null $data
 * @return array
 */

function toResponseFormat(array $pageInfo,$data = null)
{
    $response = array();
    if(array_key_exists('success',$pageInfo))
    {
        $response['success'] = $pageInfo['success'];
    }
    if(array_key_exists('statusCode',$pageInfo))
    {
        $response['status_code'] = $pageInfo['statusCode'];
    }

    if(array_key_exists('errors',$pageInfo))
    {
        $response['errors'] = $pageInfo['errors'];
    }
    if(array_key_exists('message',$pageInfo))
    {
        $response['message'] = $pageInfo['message'];
    }

    if(!is_null($data))
    {
        $response[array_key_exists('dataName',$pageInfo) ? $pageInfo['dataName'] : "data"] = $data;
    }

    return $response;
}

function formatValidationErrors($error)
{
    $string = implode($error,",");
    return $string;
}