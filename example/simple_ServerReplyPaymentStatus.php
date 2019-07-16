<?php
/**
*   請確認該目錄擁有寫入檔案權限
*/

    //載入SDK(路徑可依系統規劃自行調整)
    include('Opay.Payment.Integration.php');
    try {

            $obj = new OpayAllInOne();

            /* 服務參數 */
            $obj->HashKey     = '5294y06JbISpM5x9' ;
            $obj->HashIV      =  'v77hoKGq4kWxNNIS' ;
            $obj->MerchantID  = '2000132';
            $obj->EncryptType = OpayEncryptType::ENC_SHA256;

            /* 取得回傳參數 */
            $arFeedback = $obj->CheckOutFeedback();

            // 參數寫入檔案
            if(true)
            {
                $sLog_Path  = __DIR__.'/sample_payment_return.log' ; // LOG路徑
                $sLog = '+++++++++++++++++++++++++++++++++++++++ 接收回傳參數 ' . date('Y-m-d H:i:s') . ' ++++++++++++++++++++++++++++++++++++++++++++' . "\n";
                $fp=fopen($sLog_Path, "a+");
                fputs($fp, $sLog);
                fclose($fp);

                $sLog_File =  print_r($arFeedback, true). "\n";
                $fp=fopen($sLog_Path, "a+");
                fputs($fp, $sLog_File);
                fclose($fp);
            }

            echo '1|OK' ;

    } catch (Exception $e) {
        if(true)
        {
            $sLog_Path  = __DIR__.'/sample_payment_return.log' ; // LOG路徑
            $sLog = '+++++++++++++++++++++++++++++++++++++++ 接收回傳參數(ERROR) ' . date('Y-m-d H:i:s') . ' ++++++++++++++++++++++++++++++++++++++++++++' . "\n";
            $fp=fopen($sLog_Path, "a+");
            fputs($fp, $sLog);
            fclose($fp);

            $sLog_File =  $e->getMessage(). "\n";
            $fp=fopen($sLog_Path, "a+");
            fputs($fp, $sLog_File);
            fclose($fp);
        }
    }



?>