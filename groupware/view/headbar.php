<div class="head-bar">
    <ul>
        <li>
            <a href="notice.html">
                <i class="fa-solid fa-bell"></i>通知
            </a>
        </li>
        <li><i class="fa-solid fa-user"></i>ようこそ<?php echo $_SESSION['userinfo']['user_name'];?>さん</li>
        <li>
            <form action="logout.php" method="post">
                <button type="submit" name="logout">
                    ログアウト<i class="fa-solid fa-right-from-bracket"></i>
                </button>
            </form>
        </li>
    </ul>
</div>