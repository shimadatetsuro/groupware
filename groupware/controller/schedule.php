<?php
require_once('../model/date.php');
require_once('../model/schedule.php');
if(isset($_SESSION['userinfo']['id'])){
  $id = htmlspecialchars($_SESSION['userinfo']['id'],ENT_QUOTES,'UTF-8');
}
class DateController {
  private $model;

  public function __construct() {
    $this->model = new DateModel();
  }

  public function show() {
    $currentDate = $this->model->getCurrentDate();
    if(isset($_GET['ymd'])){
        $currentDate = htmlspecialchars($_GET['ymd'],ENT_QUOTES,'UTF-8');
        $currentDate = DateTime::createFromFormat('Y/m/d', $currentDate);
    }
    $nextWeekDate = $this->model->getNextWeekDate($currentDate);
    $prevWeekDate = $this->model->getPrevWeekDate($currentDate);
    $result = [
        'currentDate'=>$currentDate,
        'nextWeekDate'=>$nextWeekDate,
        'prevWeekDate'=>$prevWeekDate
    ];
    return $result;
  }
}


$topCalendar = new DateController;
$ymdresult = $topCalendar -> show();
$date = $ymdresult['currentDate']->format('Y-m-d');
$topSchedule = new Schedule;
$topScheduleresult = $topSchedule -> searchSuchedule($id,$date);

?>