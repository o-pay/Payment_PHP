<?php

    //載入SDK(路徑可依系統規劃自行調整)
    include('Opay.Payment.Integration.php');
    try {

        $obj = new OpayAllInOne();

        //服務參數
        $obj->ServiceURL  = "https://payment-stage.opay.tw/Cashier/QueryTradeInfo/V5";      //服務位置
        $obj->HashKey     = '5294y06JbISpM5x9' ;                                            //測試用Hashkey，請自行帶入OPay提供的HashKey
        $obj->HashIV      = 'v77hoKGq4kWxNNIS' ;                                            //測試用HashIV，請自行帶入OPay提供的HashIV
        $obj->MerchantID  = '2000132';                                                      //測試用MerchantID，請自行帶入OPay提供的MerchantID
        $obj->EncryptType = '1';                                                            //CheckMacValue加密類型，請固定填入1，使用SHA256加密


        //基本參數(請依系統規劃自行調整)
        $obj->Query['MerchantTradeNo']      = 'Test1563189924' ;
        $obj->Query['TimeStamp']            = time();

        //產生訂單(auto submit至OPay)
        $html = $obj->QueryTradeInfo();
        var_dump($html);

    } catch (Exception $e) {
        echo $e->getMessage();
    }
?>