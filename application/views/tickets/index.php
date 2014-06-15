<?php
/*
* @LitePanel
* @Developed by QuickDevel
*/
?>
<?php echo $header ?>
				<div class="page-header">
					<h1>Мои запросы</h1>
				</div>
				<table class="table">
					<thead>
						<tr>
							<th>ID</th>
							<th>Статус</th>
							<th>Тема</th>
							<th>Дата создания</th>
						</tr>
					</thead>
					<tbody>
						<?php foreach($tickets as $item): ?> 
						<tr class="<?php if($item['ticket_status'] == 0){echo 'primary';}elseif($item['ticket_status'] == 1){echo 'warning';}elseif($item['ticket_status'] == 2){echo 'success';}?>" onClick="redirect('/tickets/view/index/<?php echo $item['ticket_id'] ?>')">
							<td>№<?php echo $item['ticket_id'] ?></td>
							<td>
								<?php if($item['ticket_status'] == 0): ?> 
								<span class="label label-primary">Закрыт</span>
								<?php elseif($item['ticket_status'] == 1): ?> 
								<span class="label label-warning">Ответ от клиента</span>
								<?php elseif($item['ticket_status'] == 2): ?> 
								<span class="label label-success">Ответ от поддержки</span>
								<?php endif; ?> 
							</td>
							<td><?php echo $item['ticket_name'] ?></td>
							<td><?php echo date("d.m.Y в H:i", strtotime($item['ticket_date_add'])) ?></td>
						</tr>
						<?php endforeach; ?> 
						<?php if(empty($tickets)): ?> 
						<tr>
							<td colspan="4" style="text-align: center;">На данный момент у вас нет запросов.</td>
						<tr>
						<?php endif; ?> 
					</tbody>
				</table>
				<?php echo $pagination ?> 
<?php echo $footer ?>
