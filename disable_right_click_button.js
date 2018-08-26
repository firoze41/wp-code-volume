//Past this code in your header.php
<script type="text/javascript">
/******************************************************************************
***   COPY PROTECTED BY CHETANGOLE.COM/BLOG/WP-COPYPROTECT   version 2.2.0 ****
******************************************************************************/
function clickIE4(){
if (event.button==2){
return false;
}
}
function clickNS4(e){
if (document.layers||document.getElementById&amp;&amp;!document.all){
if (e.which==2||e.which==3){
return false;
}
}
}
 
if (document.layers){
document.captureEvents(Event.MOUSEDOWN);
document.onmousedown=clickNS4;
}
else if (document.all&amp;&amp;!document.getElementById){
document.onmousedown=clickIE4;
}
 
document.oncontextmenu=new Function("return false")
// --&gt;
&lt;/script&gt;
 
&lt;script type="text/javascript"&gt;
 
function disableSelection(target){
if (typeof target.onselectstart!="undefined") //For IE
    target.onselectstart=function(){return false}
else if (typeof target.style.MozUserSelect!="undefined") //For Firefox
    target.style.MozUserSelect="none"
else //All other route (For Opera)
    target.onmousedown=function(){return false}
target.style.cursor = "default"
}
</script>