<?php
$t=$_GET['t'];
if($t=='j'){
function read(...$filelist){
$list=[];
foreach($filelist as $file){
$handle=fopen($file,'r');
while(($line = fgets($handle))!== false){
array_push($list,trim($line));
}
fclose($handle);
}
return $list;
}
$list=read('http://470.web3v.com/sjxjj.txt');
$url=$list[array_rand($list)];
header("Location:{$url}");
exit;
};

$t=$_GET['t'];
if($t=='s'){
$url='https://mm.diskgirl.com/get/get1.php';
$info=file_get_contents($url);
Header("Location:$info");
exit;
};

$url='http://v.6.cn/coop/pub/videoPlayer.php?src=6rooms_test';
$info=file_get_contents($url);
preg_match('|rid: (.*?),|i',$info,$m);
$url='http://v.6.cn/'.$m[1];
$info=file_get_contents($url);
preg_match('|"flvtitle\":\"v(.*?)\",\"so|i',$info,$mm);

$t=$_GET['t'];
if($t=='m'){
echo "function playnext(){location.reload()};video.onended=function(){playnext()};dw('<'+'script src='+cd+'hls.js/dist/hls.min.js><\/'+'script>');onload=function(){
if(Hls.isSupported()){
var hls=new Hls();
hls.loadSource('http://59-44-60-101.6rooms.com/v$mm[1]/playlist.m3u8');
hls.attachMedia(video);
hls.on(Hls.Events.MANIFEST_PARSED,function(){play()});video.style.backgroundColor='black';
};
}"; 
exit;
}
if($t=='f'){
echo "function playnext(){location.reload()};video.onended=function(){playnext()};dw('<'+'script src='+cd+'flv.js/dist/flv.min.js></'+'script>');onload=function(){
if(flvjs.isSupported()){
var fP=flvjs.createPlayer({type:'flv',url:'http://59-44-60-101.6rooms.com/httpflv/v$mm[1].flv'});
fP.attachMediaElement(video);fP.load();play();video.style.backgroundColor='black';
};
}"; 
exit;
}
?>