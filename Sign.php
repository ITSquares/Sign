<form accept-charset="utf-8" action="" method="get" name="person_info">
    이름 : <input name="name" required="" type="text" />
    <br>
    <br>
    이메일 : <input name="email" required="" type="text" />
    <br>
    <br>
    생년월일 : <input name="birth_day" required="" type="text" />

    <br>
    <input type="submit" value="로그인"/>
</form>

<?php
$name = $_GET["name"];
$email = $_GET["email"];
$birthDay = $_GET["birth_day"];

if (strlen($name) < 2) {
    echo "이름 길이는 최소 2자 이상이여야 합니다.";
    return;
}

if (strpos($email, "@") === false) {
    echo "이메일이 올바르지 않습니다.";
    return;
}

if (!in_array(explode("@", $email)[1], ["naver.com", "gmail.com"])) {
    echo "지원하지 않는 이메일 입니다.";
    return;
}

$split = explode("-", $birthDay);
if (count($split) === 3) {
    foreach ($split as $str) {
        if (!is_numeric($str)) {
            echo "생년월일은 숫자만 적어주세요.";
            return;
        }
    }
} else {
    echo "생년월일은 yyyy-mm-dd 형식으로 적어주세요.";
    return;
}

foreach ([
             "------- 회원가입 정보 ------",
             " - 이름: " . $name,
             " - 이메일: " . $email,
             " - 생년월일: " . $birthDay
         ] as $str)
    echo $str . PHP_EOL;

?>