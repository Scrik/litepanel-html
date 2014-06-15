<?php
/*
* @LitePanel
* @Version: 1.0.1
* @Date: 29.12.2012
* @Developed by QuickDevel
*/
?>
<?php echo $header ?>
				<h2>Новости компании</h2>
						<?php foreach($tickets as $item): ?> 
						<pre>
							<h2 style="color:red">Новость #<?php echo $item['news_id'] ?>(<?php echo $item['news_title'] ?>)</h2>
							<p style="font-size=18px"><?php echo $item['news_text'] ?></p>
							<p style="color:blue">Опубликованно в <?php echo date("d.m.Y в H:i", strtotime($item['news_date_add'])) ?></p>
						</pre>
						<hr>
						<?php endforeach; ?> 
				<?php echo $pagination ?> 
<?php echo $footer ?>
