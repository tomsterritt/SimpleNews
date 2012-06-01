<?php
/*
 * SimpleNews news module for phpVMS
 *
 * @author	Tom Sterritt
 * @link	http://tomsterritt.com/phpvms
 * @license	The ☺ license (http://license.visualidiot.com)
 *
 */

class SimpleNews extends CodonModule{
	
	public $title = 'News';
	
	public function index(){
		// List of latest news items
		$this->set('page',1);
		$this->set('items', NewsData::GetNews());
		$this->render('simplenews_page.tpl');
	}
	
	public function page($pageid = 1){
		if($pageid <= 1 || !is_numeric($pageid)){
			$this->index();
		} else {
			// Get page 2+
			$this->set('page',$pageid);
			$this->set('items', NewsData::GetNews(NewsData::$itemsperpage,($pageid * NewsData::$itemsperpage) - NewsData::$itemsperpage));
			$this->render('simplenews_page.tpl');
		}
	}
	
	public function item($id){
		// Get single item
		if(!is_numeric($id)){
			$this->index();
		} else {
			$item = NewsData::Single($id);
			$this->set('item', $item);
			$this->title = $item->subject;
			$this->render('simplenews_single.tpl');
		}
	}
	
	public function NewsList($max = 5){
		$items = NewsData::GetNews($max);
		if(empty($items)){
			return 'No news items found!';
		}
		foreach($items as $item){
			Template::Set('item', $item);
			Template::Show('simplenews_list.tpl');
		}
	}
	
}

?>