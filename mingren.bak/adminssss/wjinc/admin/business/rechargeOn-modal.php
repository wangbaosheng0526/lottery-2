<?php
/* 此程序来自家园网络QQ836651666 采集修复 程序修改 仅供研究学习之用 禁止用于商业非法用途 */
    $this->getSystemSettings();
	$sql="select r.*,u.username username from {$this->prename}member_recharge r, {$this->prename}members u where r.uid=u.uid and r.id=?";
	$rechargeData=$this->getRow($sql, $args[0]);
?>
<div>
<input type="hidden" value="<?=$this->user['username']?>" />
<form action="/qq836651666.php/business/rechargeHandle"  target="ajax" method="post" call="rechargeSubmitCode" onajax="rechargeBeforeSubmit" dataType="html">
	<input type="hidden" name="id" value="<?=$args[0]?>"/>
<table cellpadding="0" cellspacing="0" width="320" class="layout">
	<tr>
		<th>用户名：</th>
		<td><input type="text" value="<?=$rechargeData['username']?>" /></td>
	</tr>
	<tr>
		<th>充值金额：</th>
		<td><input type="text" name="amount" readonly="readonly" value="<?=$rechargeData['amount']?>" /></td>
	</tr>
	<tr>
		<th>实际到账：</th>
		<td><input type="text" name="rechargeAmount" value="<?=$this->iff($this->settings['czzs'],number_format($rechargeData['amount']*(1+$this->settings['czzs']/100.00),2,'.',''),$rechargeData['amount'])?>"/></td>
	</tr>
	<tr>
		<th><span class="spn9">提示：</span></th>
		<td><span class="spn9">赠送充值额的<?=$this->settings['czzs']?>%</span></td>
	</tr>
</table>
</form>
</div>