<?php
/*
 * SimpleNews news module for phpVMS
 *
 * @author	Tom Sterritt
 * @link	http://tomsterritt.com/phpvms
 * @license	The ☺ license (http://license.visualidiot.com)
 *
 */
?>
<style type="text/css">
/* Probably ought to put this in your own stylesheet and customise */
small{clear:both;display:block;}
.news-prev{float:left;margin:10px 0 0 0;}
.news-next{float:right;margin:10px 0 0 0;}
.news-full{display:block;margin:10px 0;}
</style>
<h1>News<?php if($page>=2){ echo ' - Page '.$page; } ?></h1>
<?php foreach($items as $item){ ?>
	<h2><?php echo $item->subject; ?></h2>
	<small>Posted on <?php echo date(DATE_FORMAT, $item->postdate); ?> by <?php echo $item->postedby; ?></small>
	<?php echo NewsData::Truncate(html_entity_decode($item->body)); ?>
	<a href="<?php echo url('/SimpleNews/item/'.$item->id); ?>" class="news-full">Read in full</a>
	<hr />
<?php }

if($page>=2){ ?>
	<a class="news-prev" href="<?php echo url('/SimpleNews/page/'.($page - 1)); ?>">&laquo; Page <?php echo ($page-1); ?></a>
<?php
} if(NewsData::IsNextPage($page)){ ?>
	<a class="news-next" href="<?php echo url('/SimpleNews/page/'.($page + 1)); ?>">&raquo; Page <?php echo ($page + 1); ?></a>
<?php
}
?>