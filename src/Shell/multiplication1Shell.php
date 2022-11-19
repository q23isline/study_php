<?php
print_r("乗算結果を表示したい数値を入力してください: ");
$baseNumber=(integer)fgets(STDIN);
$result=$baseNumber;
// 10乗分繰り返す
for($i=2;$i<=10;$i++){
  $result=$result*$baseNumber;
  print_r("$baseNumber^$i = $result\n");
}
?>
