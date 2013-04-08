<?php

require_once "WebService/PagSeguro/PagSeguroLibrary/PagSeguroLibrary.php";

class NotificationListener {

    public static function main() {

        $code = (isset($_POST['notificationCode']) && trim($_POST['notificationCode']) !== "" ? trim($_POST['notificationCode']) : null);
        $type = (isset($_POST['notificationType']) && trim($_POST['notificationType']) !== "" ? trim($_POST['notificationType']) : null);

        if ($code && $type) {

            $notificationType = new PagSeguroNotificationType($type);
            $strType = $notificationType->getTypeFromValue();

            switch ($strType) {

                case 'TRANSACTION':
                    self::TransactionNotification($code);
                    break;

                default:
                    LogPagSeguro::error("Unknown notification type [" . $notificationType->getValue() . "]");
            }

            self::printLog($strType);
        } else {

            LogPagSeguro::error("Invalid notification parameters.");
            self::printLog();
        }
    }

    private static function TransactionNotification($notificationCode) {

        $credentials = new PagSeguroAccountCredentials("giftinsta@gmail.com", "F5163FDBEEA34F01B6911BB1E642E73E");

        try {
            $transaction = PagSeguroNotificationService::checkTransaction($credentials, $notificationCode);
        } catch (PagSeguroServiceException $e) {
            die($e->getMessage());
        }
    }

    private static function printLog($strType = null) {
        $count = 4;
        echo "<h2>Receive notifications</h2>";
        if ($strType) {
            echo "<h4>notifcationType: $strType</h4>";
        }
        echo "<p>Last <strong>$count</strong> items in <strong>log file:</strong></p><hr>";
        echo LogPagSeguro::getHtml($count);
    }

}

NotificationListener::main();
?>