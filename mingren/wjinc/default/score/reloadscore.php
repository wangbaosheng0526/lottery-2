<span class="scoreinfo"><li>1、您当前积分为：<span style="color:yellow;font-size:14px"><?=$this->user['score']?></span>，可以抽奖：<span style="color:yellow;font-size:14px">&nbsp<?=$this->iff($this->user['score']<$this->dzpsettings['score'],0,intval($this->user['score']/$this->dzpsettings['score']))?></span>&nbsp次；</li>
<li>2、每次抽奖需要&nbsp<span style="color:yellow;font-size:14px"><?=$this->dzpsettings['score']?></span>&nbsp积分；</li></span>