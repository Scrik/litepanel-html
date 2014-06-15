<?php
/*
* @LitePanel
* @Developed by QuickDevel
*/
?>
<?php echo $header ?>
				<div class="page-header">
					<h1>Пополнение баланса(UnitPay)</h1>
				</div>
				<div class="thumbnail">
					<div class="alert alert-success" align="center">Пополнение в личном кабинете c помощью <img src="http://partner.robokassa.ru/Content/images/robo_main_logo.png" width="130" height="16"></div>
					<form class="form-horizontal" action="#" id="unitpayForm" method="POST">
						<div class="form-group">
							<label for="ammount" class="col-sm-3 control-label">Сумма:</label>
							<div class="col-sm-3">
								<div class="input-group">
									<input type="text" class="form-control" id="ammount" name="ammount" placeholder="Сумма">
									<span class="input-group-addon">руб.</span>
								</div>
							</div>
						</div>
						<div class="form-group">
							<div class="col-sm-offset-3 col-sm-9">
								<button type="submit" class="btn btn-primary">Продолжить</button>
							</div>
						</div>
					</form>
				</div>
				<script>
					$('#unitpayForm').ajaxForm({ 
						url: '/account/unitpay/ajax',
						dataType: 'text',
						success: function(data) {
							console.log(data);
							data = $.parseJSON(data);
							switch(data.status) {
								case 'error':
									showError(data.error);
									$('button[type=submit]').prop('disabled', false);
									break;
								case 'success':
									redirect(data.url);
									break;
							}
						},
						beforeSubmit: function(arr, $form, options) {
							$('button[type=submit]').prop('disabled', true);
						}
					});
				</script>
<?php echo $footer ?>
