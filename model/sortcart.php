<?php

    function sortcart()
	{
		$a=array();//暫存id的陣列
		$b=array();//暫存num的陣列
		$c=array();//空
		for($i=0;$i<sizeof($_SESSION['chart_id']);$i++)
		{
			if($_SESSION['chart_num'][$i]!=0)
			{
				if (isset($a))
				{
					$a[sizeof($a)]=$_SESSION['chart_id'][$i];
					$b[sizeof($b)]=$_SESSION['chart_num'][$i];
				}else
				{
					$a[0]=$_SESSION['chart_id'][$i];
					$b[0]=$_SESSION['chart_num'][$i];
				}
			}
		}
		$_SESSION['chart_id']=$c;
		$_SESSION['chart_num']=$c;
		for($i=0;$i<sizeof($a);$i++)
		{
			$_SESSION['chart_id'][$i]=$a[$i];
			$_SESSION['chart_num'][$i]=$b[$i];
		}
	}
?>