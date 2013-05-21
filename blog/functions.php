<?php
//run this fucntion on any datetime data to make it human friendly
function convert_date($dateR){
	$engMon=array('January','February','March','April','May','June','July','August','September','October','November','December',' ');
	$l_months='January:February:March:April:May:June:July:August:September:October:November:December';
	$dateFormat='F j, Y';
	$months=explode (':', $l_months);
	$months[]='&nbsp;';
	$dfval=strtotime($dateR);
	$dateR=date($dateFormat,$dfval);
	$dateR=str_replace($engMon,$months,$dateR);
	return $dateR;
}

//show the number of comments on any post with good grammar
// @var $number int
function comments_number($number){
	if( $number == 1 ){
		echo 'One Comment';
	}else if( $number == 0 ){
		echo 'No Comments';
	}else{
		echo "$number Comments";
	}
}