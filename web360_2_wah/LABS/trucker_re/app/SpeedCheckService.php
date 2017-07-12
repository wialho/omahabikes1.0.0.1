<?php
/**
 * Created by PhpStorm.
 * User: wilsonholland
 * Date: 7/11/17
 * Time: 10:04 PM
 */

namespace App;


class SpeedCheckService
{
    public function getSpeedComment($miles, $minutes){
        $speed = $miles*60 / $minutes;
        if($speed< 55){
            $comment = "too slow";

        } else if($speed < 65) {
            $comment = "ok";
        } else if($speed > 65) {
            $comment = "too fast";

        }
        return $comment;
    }
}