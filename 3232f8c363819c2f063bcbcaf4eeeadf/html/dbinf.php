<?
//MySQL 버전 4.1.13 이상 & PHP 5.0 이상이 아니라면 mysqli 함수들에 문제있을 수 있음

//SQL환경 설정
$DB_HOST="localhost";
$DB_USER="";
$DB_PASSWD="";
$DB_SNAME="";
$db_link = false;

//DB 서버 연결
$db_link=mysqli_connect("$DB_HOST","$DB_USER","$DB_PASSWD");

if (mysqli_connect_errno($db_link)){
printf("%d : %S", mysqli_errno(), mysqli_error());
exit;
}

if(!($stat=mysqli_select_db($db_link,$DB_SNAME))){
printf("DB 실패1");
exit;
}

function f_injection($query_string)
{
	$injection_filter  = "union |delete|select|update |drop table|drop column|alter table|alter column|create |insert into|;--|declare|sysdatabase|exec|set @";

	 $injection_filter_arr = explode("|", $injection_filter);
	$injection_filter_cnt = count($injection_filter_arr);


	 for($j = 0;$j < $injection_filter_cnt; $j++)
	{
		 if(trim(strpos($query_string,$injection_filter_arr[$j])) != "")
		{
			objXML_Log($injection_filter_arr[$j],$query_string);
			echo " 스크립트 구문 입력 시 보안 상 이유로 제한될 수 있습니다. 확인해주세요. <button onclick='javascript:history.back();'>돌아가기</button>";
			exit();
		}
	}
	return true;
}

function AA($VAL)
{
	f_injection($VAL);
	return $VAL;
}

function objXML_Log($BAD_WORD,$QUERY_STRING)
{

	
}

?>