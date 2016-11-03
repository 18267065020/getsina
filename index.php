<?php
include("db.php");
/**    
 * 发送post请求    
 * @param string $url 请求地址    
 * @param array $post_data post键值对数据    
 * @return string    
 */    
function send_post($url, $post_data) {    
      $postdata = http_build_query($post_data);    
      $options = array(    
            'http' => array(    
                'method' => 'POST',    
                'header' => 'Content-type:application/x-www-form-urlencoded',    
                'content' => $postdata,    
                'timeout' => 15 * 60 // 超时时间（单位:s）    
            )    
        );    
        $context = stream_context_create($options);    
        $result = file_get_contents($url, false, $context);             
        return $result;    
}
function msectime() {
       list($tmp1, $tmp2) = explode(' ', microtime());
       return (float)sprintf('%.0f', (floatval($tmp1) + floatval($tmp2)) * 1000);
}
$post_data = array(
    'username' => 'username',
    'password' => 'password'
);
$sinadata = send_post("http://hq.sinajs.cn/rn=" . msectime() . "list=fx_susdcny", $post_data);
echo $sinadata;
    ignore_user_abort();//关闭浏览器后，继续执行php代码
    set_time_limit(0);//程序执行时间无限制
    $sleep_time = 1;//多长时间执行一次
    $switch = include 'switch.php';
    $xmls = "";
    while($switch){
        $switch = include 'switch.php';
        $msg = date("Y-m-d H:i:s").$switch;
        if($xmls != $sinadata)
        {
          $sql = "INSERT INTO  money(`id` ,`moneycode` ,`xmlData`) VALUES (NULL ,  1,  '".$sinadata."');"; 
          $query = mysql_query($sql);
          sleep($sleep_time);//等待时间，进行下一次操作。
          $xmls = $sinadata;
        }
    }
    exit();
    
?>