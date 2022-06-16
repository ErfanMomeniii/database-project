<div style="min-height: 40px;">
<div style="float:right;display:inline-block;direction: rtl;">
    <a href="main.php"><img src="../public/svgs/logo-quera-heavy.2-1c1287ee3575.svg"></a>
    <a href="#" class="button" >سامانه آموزشی</a>
    <a href="#" class="button">بانک سوالات</a>
    <a href="#" class="button">مسابقات</a>
    <a href="#" class="button">مگنت(استخدام)</a>
</div>

<?php if (!isset($_SESSION['auth'])){
    echo'
<div style="float:left;margin-top:5px;margin-left:10px;direction: ltr; width: 50%">
<a href="#" class="button2" >ورود</a>
<a href="#" class="button2">عضویت</a>
</div>';
}?>
</div>