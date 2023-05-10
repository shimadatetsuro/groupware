<?php
class DateModel {
    public function getCurrentDate() {
    return new DateTime();
    }

    public function getNextWeekDate($date) {
        $modifiedDate = clone $date;
        return $modifiedDate->modify('+1 week')->format('Y/m/d');
    }

    public function getPrevWeekDate($date) {
        $modifiedDate = clone $date;
        return $modifiedDate->modify('-1 week')->format('Y/m/d');
    }
    public function getNextDayDate($date) {
        $modifiedDate = clone $date;
        return $modifiedDate->modify('+1 day')->format('Y/m/d');

    }
}
$week = [
    '日',
    '月',
    '火',
    '水',
    '木',
    '金',
    '土',
  ];
?>
