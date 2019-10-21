<?php

function presentPrice($price)
{
	return money_format('%n', $price/100); 
}