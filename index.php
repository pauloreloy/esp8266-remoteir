<?php

if(isset($_GET['code'])) {
	$code = $_GET['code'];
	$url = "http://192.168.0.201/remote?code=" .$code . "";
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, $url);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	$output = curl_exec($ch);
	curl_close($ch);
}
?>

<html>
<head>
</head>
	
<!-- Image Map Generated by http://www.image-map.net/ -->

<center>
<img src="images/controle-led.jpg" usemap="#image-map">

<map name="image-map">
    <area target="_self" alt="brilhomais" title="brilhomais" 		href="index.php?code=4278251264" 		coords="72,133,34" shape="circle">
    <area target="_self" alt="brilhomenos" title="brilhomenos" 		href="index.php?code=4261539584" 		coords="158,132,32" shape="circle">
    <area target="_self" alt="botaooff" title="botaooff" 			href="index.php?code=4244827904" 		coords="243,133,35" shape="circle">
    <area target="_self" alt="botaoon" title="botaoon" 				href="index.php?code=4228116224" 		coords="328,132,35" shape="circle">
    <area target="_self" alt="botaor" title="botaor" 				href="index.php?code=4211404544" 		coords="73,211,34" shape="circle">
    <area target="_self" alt="botaog" title="botaog" 				href="index.php?code=4194692864" 		coords="159,211,34" shape="circle">
    <area target="_self" alt="botoab" title="botoab" 				href="index.php?code=4177981184" 		coords="243,211,33" shape="circle">
    <area target="_self" alt="botaow" title="botaow" 				href="index.php?code=4161269504" 		coords="327,209,34" shape="circle">
    <area target="_self" alt="botaoflash" title="botaoflash" 		href="index.php?code=4094422784" 		coords="328,287,32" shape="circle">
    <area target="_self" alt="botaostrobe" title="botaostrobe" 		href="index.php?code=4027576064" 		coords="329,366,33" shape="circle">
    <area target="_self" alt="botaofade" title="botaofade" 			href="index.php?code=3960729344" 		coords="330,446,34" shape="circle">
    <area target="_self" alt="botaosmooth" title="botaosmooth" 		href="index.php?code=3893882624" 		coords="330,527,33" shape="circle">
    <area target="_self" alt="botao11" title="botao11" 				href="index.php?code=4144557824" 		coords="72,289,33" shape="circle">
    <area target="_self" alt="botao12" title="botao12" 				href="index.php?code=4077711104" 		coords="72,367,34" shape="circle">
    <area target="_self" alt="botao13" title="botao13" 				href="index.php?code=4010864384" 		coords="71,446,34" shape="circle">
    <area target="_self" alt="botao14" title="botao14" 				href="index.php?code=3944017664" 		coords="71,525,33" shape="circle">
    <area target="_self" alt="botao21" title="botao21" 				href="index.php?code=4127846144" 		coords="158,287,34" shape="circle">
    <area target="_self" alt="botao22" title="botao22" 				href="index.php?code=4060999424" 		coords="157,367,35" shape="circle">
    <area target="_self" alt="botao23" title="botao23" 				href="index.php?code=3994152704" 		coords="158,445,35" shape="circle">
    <area target="_self" alt="botao24" title="botao24" 				href="index.php?code=3927305984" 		coords="158,524,35" shape="circle">
    <area target="_self" alt="botao31" title="botao31" 				href="index.php?code=4111134464" 		coords="243,288,34" shape="circle">
    <area target="_self" alt="botao32" title="botao32" 				href="index.php?code=4044287744" 		coords="243,366,34" shape="circle">
    <area target="_self" alt="botao33" title="botao33" 				href="index.php?code=3977441024" 		coords="244,446,35" shape="circle">
    <area target="_self" alt="botao34" title="botao34" 				href="index.php?code=3910594304" 		coords="244,526,34" shape="circle">
</map>

</html>
