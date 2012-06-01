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
</style>
<h1><?php echo $item->subject; ?></h1>
<small>Posted on <?php echo date(DATE_FORMAT,$item->postdate); ?> by <?php echo $item->postedby; ?></small>
<?php echo html_entity_decode($item->body); ?>

<?php 
$prev = NewsData::GetPrev($item->id);
$next = NewsData::GetNext($item->id);

if(!empty($prev)){ ?>
	<a class="news-prev" href="<?php echo url('/SimpleNews/item/'.$prev->id); ?>">&laquo; <?php echo $prev->subject; ?></a>
<?php
} if(!empty($next)){ ?>
	<a class="news-next" href="<?php echo url('/SimpleNews/item/'.$next->id); ?>"><?php echo $next->subject; ?> &raquo;</a>
<?php
}
?>