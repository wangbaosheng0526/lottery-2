<input type="hidden" name="playedGroup" value="<?=$this->groupId?>" />
<input type="hidden" name="playedId" value="<?=$this->played?>" />
<input type="hidden" name="type" value="<?=$this->type?>" />
<div class="pp" action="tzSscInput" length="3" random="sscRandom">
	<textarea id="textarea-code"></textarea>
</div>
<?php
/* 此程序来自家园网络QQ836651666 采集修复 程序修改 仅供研究学习之用 禁止用于商业非法用途 */ $maxPl=$this->getPl($this->type, $this->played); ?>
<script type="text/javascript">
$(function(){
	gameSetPl(<?=json_encode($maxPl)?>);
})
</script>
