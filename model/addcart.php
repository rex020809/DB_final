<?php
    session_start();
    $id=$_GET['id'];
    $num=$_GET['num'];
    if (isset($_SESSION['chart_id'])){
		for($i=0;$i<sizeof($_SESSION['chart_id']);$i++)
		{
			if($id==$_SESSION['chart_id'][$i])
			{
				$_SESSION['chart_num'][$i]=$_SESSION['chart_num'][$i]+$num;
				$jus=1;//判斷有重複則$jus=1
				break;
			}else
			{
				$jus=0;//判斷沒有重複則$jus=0
			}
		}	
		if($jus==0)
		{
			$_SESSION['chart_id'][sizeof($_SESSION['chart_id'])]=$id;
			$_SESSION['chart_num'][sizeof($_SESSION['chart_num'])]=$num;
			//$_SESSION['chart_num'][sizeof($_SESSION['chart_id'])]=$num;
		}
    } else {
        $_SESSION['chart_id'][0]=$id;
        $_SESSION['chart_num'][0]=$num;
    }
?>
