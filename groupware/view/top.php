<?php session_start();?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- GoogleFontsここから -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Zen+Loop&display=swap" rel="stylesheet">
    <!-- GoogleFontsここまで -->
    <!-- FontAwsomeここから -->
    <script src="https://kit.fontawesome.com/7ba2902154.js" crossorigin="anonymous"></script>
    <!-- FontAwsomeここまで -->
<!-- CSSここから -->
<link rel="stylesheet" href="../css/reset.css">
<link rel="stylesheet" href="../css/style.css">
<link rel="stylesheet" href="../css/index.css">
<!-- CSSここまで -->
<!-- PHPcontrollerここから -->
<?php require_once '../controller/schedule.php';?>

<!-- PHPcontrollerここまで -->
</head>
<body>
<?php require_once 'sidebar.php';?>
    <div class="main-bar">
<?php require_once 'headbar.php';?>
        <div class="content">
            <div class="top-schedule">
                <div class="flex">
                    <div class="blue-square">
                        <p class="content-nav">スケジュール</p>
                    </div>
                    <div class="blue-square">
                        <p class="datetime-title"><?php echo $ymdresult['currentDate']->format('Y年n月d日'); ?></p>
                    </div>
                    <ul>
                        <li>
                            <div class="button-shadow">
                                <a href="top.php?ymd=<?= $ymdresult['prevWeekDate'];?>">
                                    <button class="button">
                                        前週
                                    </button>
                                </a>
                            </div>
                        </li>
                        <li>
                            <div class="button-shadow">
                                <a href="top.php" >
                                    <button class="button">
                                        今週
                                    </button>
                                </a>
                            </div>
                        </li>
                        <li>
                            <div class="button-shadow">
                            <a href="top.php?ymd=<?= $ymdresult['nextWeekDate'];?>">
                                    <button class="button">
                                        翌週
                                    </button>
                                </a>
                            </div>
                        </li>
                    </ul>
                </div>
                <table class="schedule-table">
                    <tr>
                        <th>名前</th>
                        <?php for($i=0;$i<7;$i++): ?>
                        <th><?php echo $ymdresult['currentDate']->format('d日').'('.$week[$ymdresult['currentDate']->format('w')].')'; ?></th>
                        <?php $ymdresult['currentDate']->modify('+1 day'); ?>
                        <?php endfor; ?>
                        <!-- 日付の初期化 -->
                        <?php $ymdresult['currentDate']->modify('-7 day'); ?>
                    </tr>
                    <tr>
                        <td>
                            <i class="fa-solid fa-user"></i><?php echo $_SESSION['userinfo']['user_name'];?>
                        </td>
                        <?php for($i=0;$i<7;$i++): ?>
                            <td>
                                <a href=""><i class="fa-solid fa-pen-to-square"></i></a>
                                <?php $date = $ymdresult['currentDate']->format('Y-m-d'); ?>
                                <?php $count = 0; ?>
                                <?php foreach($topSchedule -> searchSuchedule($id,$date)as $topScheduleProduct):?>
                                    <?php if ($count >= 4) {break;}?>
                                    <a href="">
                                        <p>
                                            <?php echo $topScheduleProduct['title'];?>
                                        </p>
                                    </a>
                                    <?php $count ++;?>
                                <?php endforeach;?>
                                <?php $ymdresult['currentDate']->modify('+1 day'); ?>
                            </td>
                        <?php endfor; ?>
                    </tr>
                </table>
            </div>
            <div class="board-group-message">
                <div class="board-group">
                    <div class ="board">
                    <?php require_once '../controller/thread.php';?>
                        <div class="blue-square">
                            <p class="content-nav">掲示板</p>
                        </div>
                        <div class="blue-square white-border">
                            <ul>
                                <?php $i = 0; ?>
                                <?php foreach($resultThreadToplist as $topthreadlist): ?>
                                    <?php if($i >= 6){break;} ?>
                                <li>
                                    <time>
                                        <?= $topthreadlist['create_date'];  ?>
                                    </time>
                                    <span>
                                        <a href="">
                                            <?=$topthreadlist['title']; ?>
                                        </a>
                                    </span>
                                </li>
                                <?php $i++; ?>
                                <?php endforeach;?>
                            </ul>
                        </div>
                    </div>
                    <div class="group">
                    <?php require_once '../controller/group.php';?>
                        <div class="blue-square">
                            <p class="content-nav">グループ</p>
                        </div>
                        <div class="blue-square white-border">
                            <ul>
                            <?php foreach($topGroupMember as $memberlist):?>
                                <li>
                                    <img src="../image/<?=$memberlist['thumbnail'];?>">
                                    <span><?= $memberlist['user_name'];?></span>
                                </li>
                            <?php endforeach;?>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="message">
                    <div class="blue-square">
                        <p class="content-nav">メッセージ</p>
                    </div>
                    <?php require_once '../controller/message.php';?>
                    <div class="blue-square white-border">
                        <ul>
                            <li>
                                <div class="icon-name">
                                    <i class="fa-solid fa-circle-user"></i>
                                    <span>ユーザー1</span>
                                </div>
                                <span>テストテストテストテストテストテストテストテストテストテストテストテストテストテスト</span>
                            </li>
                            <li>
                                <div class="icon-name">
                                    <i class="fa-solid fa-circle-user"></i>
                                    <span>ユーザー2</span>
                                </div>
                                <span>テストテストテストテストテストテストテストテストテストテストテストテストテストテスト</span>
                            </li>
                            <li>
                                <div class="icon-name">
                                    <i class="fa-solid fa-circle-user"></i>
                                    <span>ユーザー3</span>
                                </div>
                                <span>テストテストテストテストテストテストテストテストテストテストテストテストテストテスト</span>
                            </li>
                            <li>
                                <div class="icon-name">
                                    <i class="fa-solid fa-circle-user"></i>
                                    <span>ユーザー4</span>
                                </div>
                                <span>テストテストテストテストテストテストテストテストテストテストテストテストテストテスト</span>
                            </li>
                            <li>
                                <div class="icon-name">
                                    <i class="fa-solid fa-circle-user"></i>
                                    <span>ユーザー5</span>
                                </div>
                                <span>テストテストテストテストテストテストテストテストテストテストテストテストテストテスト</span>
                            </li>
                            <li>
                                <div class="icon-name">
                                    <i class="fa-solid fa-circle-user"></i>
                                    <span>ユーザー5</span>
                                </div>
                                <span>テストテストテストテストテストテストテストテストテストテストテストテストテストテスト</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
<footer>
    <script src="../js/datetime.js"></script>
</footer>
</html>