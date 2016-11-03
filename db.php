<?php
session_start();
/**
 * 数据库连接函数
 * server:服务器
 * user:服务器数据库账号
 * password:服务器数据库密码
 * db:数据库
 * 此函数只适用于mysql数据库
 */
function conn($server,$user,$password,$db)
{
	$conn=mysql_connect($server,$user,$password) or die("连接失败！");//连接数据库
	mysql_query("SET NAMES gb2312");//选择数据库字符集
	mysql_select_db($db,$conn);//选择数据库
}
/**
 * 多出的文字以省略号表示
 * $str:需要处理的字符串
 * len:需要多长的字符串(汉字是2个字符，英文是一个字符)
 * type:选择是3个单点省略号还是6个单点省略号
 */
function elli($str,$len,$type)
{
	if(strlen($str)>$len){//判断字符串长度是否超过要求长度
		$tmpstr = ""; //定义临时字符串
		for($i=0;$i<$len;$i++)//循环要求长度的每个字符
		{ 
			if(ord(substr($str,$i,1))>0xa0)//判断此字符是否为汉字
			{ 
				$tmpstr.=substr($str,$i,2);//汉字截取为2个字符
				$i++;//汉字自动加一个字符
			}else
			{
				$tmpstr.=substr($str,$i,1);//英文截取为1个字符
			}
		}		
		if($type==1)//判断省略号要求
		{
			$str=$tmpstr."……";//字符串加六点省略号
		}else{
			$str=$tmpstr."…";//字符串加三点省略号
		}
	}
	return $str;//返回字符串
}
/**
 * 检查是否有注入非法字符
 * str:需要检查的字符串
 */
function checkstr($str)
{
	$s=explode("|", "select|insert|update|delete|'|/*|*|../|./|union|into|load_file|outfile|");//将非法字符切割成数组
	for($i=0;$i<count($s);$i++)//循环字符串数组
	{
		$t=strripos($str,$s[$i]);//查找字符串中是否包含注入字符
		if($t!="")//查找有结果
		{
			echo "<script>alert('请勿输入非法注入内容！');history.go(-1);</script>";//弹框返回
		}
	}
	return $str;//返回字符串
}
/**
 * 根据sql语句返回一条数据的一个字段
 * sql:sql字符串
 */
function getone($sql)
{
	$str1=mysql_query($sql);//发送查询
	$str2=mysql_fetch_row($str1);//执行语句
	return $str2[0];//返回结果
}
/**
 * 根据sql语句返回一行数据
 * sql:sql字符串
 */
function getrow($sql)
{
	$str1=mysql_query($sql);//发送查询
	$str2=mysql_fetch_row($str1);//执行语句
	return $str2;//返回结果
}
/**
 * 弹框并且跳转
 */
function allo($str,$url)
{
	echo "<script>alert('".$str."');location.href='".$url."';</script>";
}
/**
 * 弹框并且跳转回上一页
 */
function alhi($str)
{
	echo "<script>alert('".$str."');history.go(-1);</script>";
}
/**
 * 弹框
 */
function al($str)
{
	echo "<script>alert('".$str."');</script>";
}
/**
 * 跳转
 */
function lo($str)
{
	echo "<script>location.href='".$str."';</script>";
}
/**
 * 跳转回上一页
 */
function hi()
{
	echo "<script>history.go(-1);</script>";
}
function im($iid)
{
	$img1=mysql_query("select img_src from img where img_id=".$iid);
	$img2=mysql_fetch_row($img1);
	return $img2[0];
}
conn(localhost,'root','sheep','sinaData');
?>