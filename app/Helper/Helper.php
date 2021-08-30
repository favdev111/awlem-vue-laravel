<?php

namespace App\Helper;

use App\Notification;

class Helper
{

    static function olumNotification($dataArr, $device_token, $saveNotification)
    {
        $url = 'https://fcm.googleapis.com/fcm/send';
        $api_key = 'Key=AAAA_uFmgoc:APA91bFPE8LKvpiImXr_z6fA79F7GAPcWR8vZfVhVKcOMlNWX4cMFXbNFuHb3zDK3waw1dTf5CP67AMTYTq3DSThDttHWFT_lSDYH2OF5rjsMSmv716BIQ-brwOtFbc54gUndIVZFQYd';
        $dataArr['click_action'] = 'HomeActivity';
        $dataArr['sound'] = true;
        $dataArr['icon'] = 'logo';
        $dataArr['android_channel_id'] = 'android_channel_id';
        $dataArr['high_priority'] = 'high_priority';
        $dataArr['show_in_foreground'] = true;
        $fields = array(
            'to' => $device_token,
            'data' => $dataArr,
            'notification' => $dataArr,
            'android' => array(
                "priority" => "high"
            ),
            'priority' => 10
        );
        $headers = array(
            'Content-Type:application/json',
            'Authorization:' . $api_key
        );

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));
        $result = curl_exec($ch);
        if ($result === FALSE) {
            die('FCM Send Error: ' . curl_error($ch));
        }
        curl_close($ch);
        $result = json_decode($result);

        if ($result->success == 1) {
            if ($saveNotification == true) {
                Notification::create([
                    'reciever_id' => $dataArr['reciever_id'],
                    'order_id' => $dataArr['order_id'],
                    'notification_body' => json_encode($dataArr)
                ]);
            }
            return response()->json(true);
        } else {
            return response()->json(false);
        }
    }
}
