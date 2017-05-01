<?php

include_once("config/pay_config.php");

/*
 * ��ȡ��������
 * */
$order_id = $_POST['account']; //���Ķ���Id�ţ�������Լ���֤�����ŵ�Ψһ�ԣ�˳���������Ƹ�ֵ��Ψһ��
$payType = $_POST['payType'];  //��ֵ��ʽ��bankΪ������cardΪ����֧��
$account = $_POST['account'];  //��ֵ���˺�
$amount = $_POST['amount'];   //��ֵ�Ľ��
//����֧��
if ('bank' == $payType) {
    $bankType = $_POST['bankType'];   //��������


    /*
     * �ύ����
     * */
    include_once("shunfoo/class.bankpay.php");
    $bankpay = new bankpay();
    $bankpay->parter = $shunfoo_merchant_id;  //�̼�Id
    $bankpay->key = $shunfoo_merchant_key; //�̼���Կ
    $bankpay->type = $bankType;   //�̼���Կ
    $bankpay->value = $amount;    //�ύ���
    $bankpay->orderid = $order_id;   //����Id��
    $bankpay->callbackurl = $shunfoo_callback_url; //����url��ַ
    $bankpay->hrefbackurl = $shunfoo_bank_hrefbackurl; //����url��ַ
    //����
    $bankpay->send();
}
//����֧��
else if ('card' == $payType) {
    $cardType = $_POST['cardType'];   //������
    $card_number = $_POST['card_number'];  //����
    $card_password = $_POST['card_password'];  //����
    /*
     * �ύ����
     * */
    include_once("shunfoo/class.shunfoopay.php");
    $shunfoo = new shunfoo();
    $shunfoo->type = $cardType;   //������	
    $shunfoo->cardno = $card_number;   //����
    $shunfoo->cardpwd = $card_password;  //����
    $shunfoo->value = $amount;    //�ύ���
    $shunfoo->restrict = $shunfoo_restrict;  //��������, 0��ʾȫ����Χ
    $shunfoo->orderid = $order_id;   //������
    $shunfoo->callbackurl = $shunfoo_callback_url; //����url��ַ
    $shunfoo->parter = $shunfoo_merchant_id;  //�̼�Id
    $shunfoo->key = $shunfoo_merchant_key; //�̼���Կ
    //����
    $result = $shunfoo->send();

    /*
     * �������
     * */
    switch ($result) {
        case '0':
            header("location: pay_card_finish.php?order_id=$order_id");
            break;
        case '-1':
            header("location: pay_card_finish.php?order_id=$order_id");
            break;
        case '-2':
            print('ǩ������');
            break;
        case '-3':
            print('<script language="javascript">alert("�Բ�������д�Ŀ��ſ�������"); history.go(-1);</script>');
            break;
        case '-999':
            print('<script language="javascript">alert("�Բ��𣬽ӿ�ά���У���ѡ�������ĳ�ֵ��ʽ��"); history.go(-1);</script>');
            break;
        default:
            print('δ֪�ķ���ֵ, ����ϵ˳���ٷ���');
            break;
    }
} else if ('card_muti' == $payType) {
    include_once("shunfoo/class.shunfoo.muti.php");

    $cardType_muti = $_POST['cardType_muti'];

    $card_number = $_POST['card_number'];
    $card_password = $_POST['card_password'];
    $card_value = $_POST['card_value'];
    $restrict = $_POST['restrict'];
    $attach = $_POST['attach'];

    $shunfoo = new shunfoo();

    $shunfoo->type = $cardType_muti;
    $shunfoo->parter = $shunfoo_merchant_id;
    $shunfoo->cardno = implode(",", $card_number);
    $shunfoo->cardpwd = implode(",", $card_password);
    $shunfoo->value = implode(",", $card_value);
    $shunfoo->restrict = implode(",", $restrict);
    $shunfoo->orderid = $order_id;
    $shunfoo->attach = $attach;
    $shunfoo->callbackurl = $shunfoo_callback_url_muti;
    $shunfoo->key = $shunfoo_merchant_key;

    $result = $shunfoo->send();

    switch ($result) {
        case '0':
            header("location: pay_card_finish.php?order_id=$order_id");
            break;
        case '-1':
            print("���������Ч");
            break;
        case '-2':
            print('ǩ������');
            break;
        case '-3':
            print('<script language="javascript">alert("����Ϊ�ظ��ύ��˳��ϵͳ�����������Ҳ������������̡�"); history.go(-1);</script>');
            break;
        case '-4':
            print("���ܲ�����˳������Ŀ���������ֵ����˳��ϵͳ�����������Ҳ������������̡�");
            break;
        case '-999':
            print('<script language="javascript">alert("�Բ���˳�����ӿ�ά���У���ѡ�������ĳ�ֵ��ʽ��"); history.go(-1);</script>');
            break;
        default:
            print('δ֪�ķ���ֵ, ����ϵ˳���ٷ���');
            break;
    }
}
?>