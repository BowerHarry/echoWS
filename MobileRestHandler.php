<?php
require_once ("SimpleRest.php");
require_once ("Mobile.php");

class MobileRestHandler extends SimpleRest
{

    function getAllMobiles()
    {
        echo "in function";
        $mobile = new Mobile();
        $rawData = $mobile->getAllMobile();

        if (empty($rawData)) {
            $statusCode = 404;
            $rawData = array(
                'error' => 'No mobiles found!'
            );
        } else {
            $statusCode = 200;
        }

        echo "json";
        $response = $this->encodeJson($rawData);
        echo $response;
    }

    public function encodeJson($responseData)
    {
        $jsonResponse = json_encode($responseData);
        return $jsonResponse;
    }

    public function getMobile($id)
    {
        $mobile = new Mobile();
        $rawData = $mobile->getMobile($id);

        if (empty($rawData)) {
            $statusCode = 404;
            $rawData = array(
                'error' => 'No mobiles found!'
            );
        } else {
            $statusCode = 200;
        }

        $requestContentType = $_SERVER['HTTP_ACCEPT'];
        $this->setHttpHeaders($requestContentType, $statusCode);
        $response = $this->encodeJson($rawData);
        echo $response;
    }
}
?>