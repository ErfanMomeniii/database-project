<div style="min-height: 40px;">
<div style="float:right;display:inline-block;direction: rtl;">
    <a href="main.php"><img src="../public/svgs/logo-quera-heavy.2-1c1287ee3575.svg"></a>
    <a href="#" class="btn btn-info" >سامانه آموزشی</a>
    <a href="#" class="btn btn-info">بانک سوالات</a>
    <a href="contest.php" class="btn btn-info">مسابقات</a>
    <a href="#" class="btn btn-info">مگنت(استخدام)</a>
</div>

<?php if (!isset($_SESSION['auth'])){
    echo'
<div style="float:left;margin-top:5px;margin-left:10px;direction: ltr; width: 50%">
<a href="login.php" class="btn btn-primary" >ورود</a>
<a href="register.php" class="btn btn-primary">عضویت</a>
</div>';
}?>
</div>