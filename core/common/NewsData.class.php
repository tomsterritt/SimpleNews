<?php
/*
 * SimpleNews news module for phpVMS
 *
 * @author	Tom Sterritt
 * @link	http://tomsterritt.com/phpvms
 * @license	The ☺ license (http://license.visualidiot.com)
 *
 */

class NewsData extends CodonData{
	
	public static $itemsperpage = 5;
	
	public function Single($id){
        $id = DB::escape($id);
		$sql = "SELECT id, subject, body, UNIX_TIMESTAMP(postdate) as postdate, postedby FROM ".TABLE_PREFIX."news WHERE id='".$id."'";
		return DB::get_row($sql);
	}
	
	public function GetNews($max = 5, $offset = 0){
		$sql = "SELECT id, subject, body, UNIX_TIMESTAMP(postdate) as postdate, postedby FROM ".TABLE_PREFIX."news ORDER BY postdate DESC LIMIT ".$offset.",".$max;
		return DB::get_results($sql);
	}
	
	public function GetPrev($id){
        $id = DB::escape($id);
		$sql = "SELECT id, subject, UNIX_TIMESTAMP(postdate) as postdate, postedby FROM ".TABLE_PREFIX."news WHERE id < '".$id."' ORDER BY id DESC LIMIT 1";
		return DB::get_row($sql);
	}
	
	public function GetNext($id){
        $id = DB::escape($id);
		$sql = "SELECT id, subject, UNIX_TIMESTAMP(postdate) as postdate, postedby FROM ".TABLE_PREFIX."news WHERE id > '".$id."' ORDER BY id ASC LIMIT 1";
		return DB::get_row($sql);
	}
	
	public function CountPages(){
        $id = DB::escape($id);
		$sql = "SELECT CEIL(COUNT(id)/".self::$itemsperpage.") as count FROM ".TABLE_PREFIX."news";
		$row = DB::get_row($sql);
		return $row->count;
	}
	
	public function IsNextPage($page){
		if($page < self::CountPages()){
			return true;
		} else {
			return false;
		}
	}
	
	public function Truncate($text, $words=100){
		$phrase_array = explode(' ',$text);
		if(count($phrase_array) > $words && $words > 0){
			$text = implode(' ',array_slice($phrase_array, 0, $words)).'...';
		}
		return $text;
	}
	
}

?>