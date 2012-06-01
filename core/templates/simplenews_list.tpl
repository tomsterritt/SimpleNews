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
<p><a href="<?php echo url('/SimpleNews/item/'.$item->id); ?>"><?php echo $item->subject; ?></a> - <?php echo date(DATE_FORMAT, $item->postdate); ?></p>