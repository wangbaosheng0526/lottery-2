<script type="text/javascript">
$(function(){
	$('.tabs_involved form input[name=username]')
	.focus(function(){
		if(this.value=='用户名') this.value='';
	})
	.blur(function(){
		if(this.value=='') this.value='用户名';
	})
	.keypress(function(e){
		if(e.keyCode==13) $(this).closest('form').submit();
	});

});

</script>

<article class="module width_full">
<input type="hidden" value="<?=$this->user['username']?>" />
	<header>
		<h3 class="tabs_involved">综合统计
			<form action="/qq836651666.php/countData/betDateSearch"  target="ajax" dataType="html" call="defaultList" class="submit_link wz">
				时间：从 <input type="date" class="alt_btn" name="fromTime" /> 到 <input type="date" class="alt_btn" name="toTime"/>&nbsp;&nbsp;
                <input type="text" class="fqr-in" height="20" value="用户名" name="username"/>&nbsp;&nbsp;
				<input type="submit" value="查找" class="alt_btn">
			</form>
		</h3>
	</header>
    
	<div class="tab_content">
    	<?php
/* 此程序来自家园网络QQ836651666 采集修复 程序修改 仅供研究学习之用 禁止用于商业非法用途 */ $this->display("count/date-list.php");?>
    </div>
</article>