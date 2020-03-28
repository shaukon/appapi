<?php
/**
 * Class Response
 * 封装通信接口数据方法
 */


class Response
{
    const JSON = "json";
    /**
     * 综合方式方式输出通信数据
     * @param integer $code 状态码
     * @param string $message 提示信息
     * @param array $data 数据
     * @param string $type 返回类型
     * return string
     */
    public static function show($code, $message='', $data = array(),$type=self::JSON){
        if (!is_numeric($code)){
            return '';
        }

        $type = isset($_GET['format'])?$_GET['format']:self::JSON;

        $result = array(
            'code' => $code,
            'message' => $message,
            'data' => $data
        );

        if ($type == 'json'){
            self::json($code,$message,$data);
            exit;
        }elseif ($type == 'array'){
            var_dump($result);
        }elseif ($type == 'xml'){
            self::xmlEncode($code,$message,$data);
            exit;
        }else{
            //TODO 后续数据类型
        }

    }
    /**
     * 按json方式输出通信数据
     * @param integer $code 状态码
     * @param string $message 提示信息
     * @param array $data 数据
     * return string
     */
    public static function json($code, $message='', $data = array()){
        if (!is_numeric($code)){
            return '';
        }

        $result = array(
            'code' => $code,
            'message' => $message,
            'data' => $data
        );

        echo json_encode($result);
        exit;
    }

    public static function xmlEncode($code, $message='', $data = array()){
        if (!is_numeric($code)){
            return '';
        }

        $result = array(
            'code' => $code,
            'message' => $message,
            'data' => $data
        );

        // 指定页面显示类型
        header("Content-Type:text/xml");
        $xml = "<?xml version='1.0' encoding='UTF-8'?>";
        $xml .= "<root>";

        $xml .= self::xmlToEncode($result);

        $xml .= "</root>";

        echo $xml;
    }

    public static function xmlToEncode($data){
        $xml = $attrm= "";
        foreach ($data as $key => $value){
            if (is_numeric($key)){
                $attr = " id='{$key}'";
                $key = "item";
            }

            $xml .= "<{$key}{$attr}>";
            $xml .= is_array($value)?self::xmlToEncode($value):$value;
            $xml .= "</{$key}>";
        }
        return $xml;
    }
}






















