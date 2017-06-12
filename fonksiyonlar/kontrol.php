<?php
function temizle($metin)
{
	$gdeger=array("Ş","ş","İ","Ç","ç","ı","Ö","ö","?","<",">","'/'");
	$ddeger=array("S","s","i","C","c","i","O","o","","","","");
	$gidenKod=str_replace($gdeger,$ddeger,$metin);
	return $gidenKod;
}
function temizle2($metin)
{
	$gdeger=array("?","<",">","'","\"");
	$ddeger=array("","","","","");
	$gidenKod=str_replace($gdeger,$ddeger,$metin);
	return $gidenKod;
}
?>