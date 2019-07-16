<!-- SDK外殼，用來處理舊版檔名相容性問題 -->
<?php

include_once('Opay.Payment.Integration.php');

/**
 * 付款方式。
 */
abstract class PaymentMethod extends OpayPaymentMethod {}

/**
 * 付款方式子項目。
 */
abstract class PaymentMethodItem extends OpayPaymentMethodItem {}

/**
 * 額外付款資訊。
 */
abstract class ExtraPaymentInfo extends OpayExtraPaymentInfo {}

/**
 * 額外付款資訊。
 */
abstract class DeviceType extends OpayDeviceType {}

/**
 * 信用卡訂單處理動作資訊。
 */
abstract class ActionType extends OpayActionType {}

/**
 * 定期定額的週期種類。
 */
abstract class PeriodType extends OpayPeriodType {}

/**
 * 電子發票開立註記。
 */
abstract class InvoiceState extends OpayInvoiceState {}

if(!class_exists('CarruerType', false))
{
    // 電子發票載具類別
    abstract class CarruerType extends OpayCarruerType {}
}

if(!class_exists('PrintMark', false))
{
    // 電子發票列印註記
    abstract class PrintMark extends OpayPrintMark {}
}

if(!class_exists('Donation', false))
{
    // 電子發票捐贈註記
    abstract class Donation extends OpayDonation {}
}


if(!class_exists('ClearanceMark', false))
{
    // 通關方式
    abstract class ClearanceMark extends OpayClearanceMark {}
}

if(!class_exists('TaxType', false))
{
    // 課稅類別
    abstract class TaxType extends OpayTaxType {}
}

if(!class_exists('InvType', false))
{
    // 字軌類別
    abstract class InvType extends OpayInvType {}
}

abstract class EncryptType extends OpayEncryptType {}

abstract class UseRedeem extends OpayUseRedeem {}

class AllInOne extends OpayAllInOne {}

?>