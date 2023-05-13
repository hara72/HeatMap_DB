<?
//MySQL ���� 4.1.13 �̻� & PHP 5.0 �̻��� �ƴ϶�� mysqli �Լ��鿡 �������� �� ����
$allResouces = get_defined_vars();

//echo get_resource_type($allResouces["result"]);
foreach($allResouces as $each_resource)
{
	if($each_resource instanceof MySQLi_Result)
	{
		@mysqli_free_result($each_resource);
	}
}

if($db_link)
{
	mysqli_close($db_link);
	$db_link = null;
}
?>
