<input type="hidden" name="playedGroup" value="<?=$this->groupId?>" />
<input type="hidden" name="playedId" value="<?=$this->played?>" />
<input type="hidden" name="type" value="<?=$this->type?>" />
<?php
/* 此程序来自家园网络QQ836651666 采集修复 程序修改 仅供研究学习之用 禁止用于商业非法用途 */ $wfName=$this->getValue("select name from {$this->prename}played where id={$this->played}"); ?>
<?php
/* 此程序来自家园网络QQ836651666 采集修复 程序修改 仅供研究学习之用 禁止用于商业非法用途 */ foreach(array($wfName) as $var){ ?>
<div class="pp pp11" delimiter=" " action="tzAllSelect" length="1" >
	<div class="title"><?=$var?></div>
	<input type="button" value="3" class="code min d" />
	<input type="button" value="4" class="code min s" />
	<input type="button" value="5" class="code min d" />
	<input type="button" value="6" class="code min s" />
	<input type="button" value="7" class="code min d" />
	<input type="button" value="8" class="code min s" />
	<input type="button" value="9" class="code min d" />
	<input type="button" value="10" class="code min s" />
	<input type="button" value="11" class="code max d" />
    <input type="button" value="12" class="code max s" />
    <input type="button" value="13" class="code max d" />
	<input type="button" value="14" class="code max s" />
	<input type="button" value="15" class="code max d" />
	<input type="button" value="16" class="code max s" />
	<input type="button" value="17" class="code max d" />
	<input type="button" value="18" class="code max s" />
	<input type="button" value="19" class="code max d" />
	
</div>
<?php
/* 此程序来自家园网络QQ836651666 采集修复 程序修改 仅供研究学习之用 禁止用于商业非法用途 */
	}
	
	$maxPl=$this->getPl($this->type, $this->played);
?>
<script type="text/javascript">
$(function(){
	gameSetPl(<?=json_encode($maxPl)?>);
})
</script>