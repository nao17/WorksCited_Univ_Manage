
<?php

$dataFile = 'WorksCited_log1_20171002.txt';

/*
function h($s)
{
    return htmlspecialchars($s, ENT_QUOTES, 'UTF-8');
}*/

// 新規追加"register"の投稿があった場合
if (isset($_POST["register"])){

  //テスト
  var_dump(Post_AuthorName_family);

    //順番を数えて１増やす
    $lines = file('WorksCited_log1_20171002.txt');
    $cnt = count($lines);
    $cnt += 1;

    //投稿されたデータを格納する
    $Reg_AuthorName_family = $_POST['Post_AuthorName_family'];
    $Reg_AuthorName_first = $_POST['Post_AuthorName_first'];
    $Reg_BookTitle = $_POST['Post_BookTitle'];
    $Reg_Year = $_POST['Post_Year'];
    $Reg_Page_Start = $_POST['Post_Page_Start'];
    $Reg_Page_Fin = $_POST['Post_Page_Fin'];
    $Reg_Publisher = $_POST['Post_Page_Publisher'];
    $Reg_comment = $_POST['Post_comment'];
    $Reg_time = date("Y/m/d H:i:s");

    //テスト
    var_dump($Reg_AuthorName_family);

    //書き込む内容を$newDataに格納する。また一行にまとめる
    /*テスト
    $RegTest = $Reg_AuthorName_family;
    fwrite($dataFile, $RegTest, "a");*/


  $Reg_newDataList = ("{番号}" . "<" . $cnt . ">" ."{参考文献リスト}" .  $Reg_AuthorName_family . $Reg_AuthorName_first .". " . $Reg_Year .". " . "『" . $Reg_BookTitle . "』" . $Reg_Page_Start . "-" . $Reg_Page_Fin. ". " . $Reg_Publisher. ". " . "\n");

    var_dump($Reg_newDataList);


  $Reg_newDataText = ("{番号}" . "<" . $cnt . ">" ."{文中}" . "[" . $Reg_AuthorName_family . " ". $Reg_Year. ": " . $Reg_Page_Start. "-". $Reg_Page_Fin.  "]". "\n");

  var_dump($Reg_newDataText);



  //格納した内容をファイルに書き込む
      $fp = fopen($dataFile, "a");
     fwrite($fp, $Reg_newDataList);
     fwrite($fp, $Reg_newDataText);
     fclose($fp);
   } ?>

<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="UTF-8">
<title>"参考文献管理"</title>
</head>
<body>
     <h1>参考文献管理フォーム（東南アジア地域専攻用）</h1>

     <form action="" method="post">
   著者苗字: <br />
   <input type="text" name="Post_AuthorName_family" size="30" value="" /><br />
   著者名前: <br />
   <input type="text" name="Post_AuthorName_first" size="30" value="" /><br />
   題名: <br />
   <input type="text" name="Post_BookTitle" size="30" value="" /><br />
   発行年: <br />
   <input type="text" name="Post_Year" size="30" value="" /><br />
   開始ページ: <br />
   <input type="text" name="Post_Page_Start" size="30" value="" /><br />
   終了ページ: <br />
   <input type="text" name="Post_Page_Fin" size="30" value="" /><br />
   出版社: <br />
   <input type="text" name="Post_Page_Publisher" size="30" value="" /><br />
   Comment: <br />
   <textarea name="comment" cols="30" rows="5"></textarea><br />
   <br />
   <input type="submit" name = "register" value="Register" />
   <br />
</form>

<?php
$Contents_dataFile = file_get_contents($dataFile);
print_r ($Contents_dataFile);
 ?>
