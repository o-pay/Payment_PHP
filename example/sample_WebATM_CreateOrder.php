<?php
/**
*
*/

    //載入SDK(路徑可依系統規劃自行調整)
    include('Opay.Payment.Integration.php');
    try {

    	$obj = new OpayAllInOne();

        //服務參數
        $obj->ServiceURL  = "https://payment-stage.opay.tw/Cashier/AioCheckOut/V5"; //服務位置
        $obj->HashKey     = '5294y06JbISpM5x9' ;                                    //測試用Hashkey，請自行帶入OPay提供的HashKey
        $obj->HashIV      = 'v77hoKGq4kWxNNIS' ;                                    //測試用HashIV，請自行帶入OPay提供的HashIV
        $obj->MerchantID  = '2000132';                                              //測試用MerchantID，請自行帶入OPay提供的MerchantID
        $obj->EncryptType = OpayEncryptType::ENC_SHA256;                            //CheckMacValue加密類型，請固定填入1，使用SHA256加密

        //基本參數(請依系統規劃自行調整)
        $MerchantTradeNo = "Test".time() ;

        $obj->Send['ReturnURL']         = 'http://localhost/simple_ServerReplyPaymentStatus.php' ; //付款完成通知回傳的網址
        $obj->Send['MerchantTradeNo']   = $MerchantTradeNo;                                        //訂單編號
        $obj->Send['MerchantTradeDate'] = date('Y/m/d H:i:s');                                     //交易時間
        $obj->Send['TotalAmount']       = 2000;                                                    //交易金額
        $obj->Send['TradeDesc']         = "good to drink" ;                                        //交易描述
        $obj->Send['ChoosePayment']     = OpayPaymentMethod::WebATM ;                              //付款方式:WebATM

        //訂單的商品資料
        array_push($obj->Send['Items'], array('Name' => "歐付寶黑芝麻豆漿", 'Price' => (int)"2000",
                   'Currency' => "元", 'Quantity' => 1, 'URL' => "dedwed"));

        //產生訂單(auto submit至OPay)
        echo $obj->CheckOut();

    } catch (Exception $e) {
    	echo $e->getMessage();
    }

?>