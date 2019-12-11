<?php
/////////////////////////////////////////////////
// Youtubeレスポンシブ対応プラグイン
// youtube_res.inc.php
//
// Copyright(c) 2019 bb
// for PukiWiki




function plugin_youtube_res_convert()
{
	define('DEFAULT_WIDTH',"560px" , true);
	define('AUTOPLAY_COMMAND','?autoplay=1',true);

	$width = DEFAULT_WIDTH;


        if (func_num_args() < 1) return FALSE;

        $args = func_get_args();
        $name = trim($args[0]);

	if($args[1]){ //横幅設定
        	$width = trim($args[1])."px";
	}

	if($args[2]==="auto"){ //オートプレイ設定
        	$autoplay = AUTOPLAY_COMMAND;
	}

        $body = <<<EOM
<div style="
    max-width: $width;
">
<div style="
  height: 0;
  position: relative;
  padding-bottom: 56.25%;
">
<iframe style="
  position: absolute;
  width: 100%;
  height: 100%;
  left: 0;
  right: 0;
  top: 0;
  bottom: 0;"
width="1280" height="720" src="https://www.youtube.com/embed/$name$autoplay" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
</div>
</div>
EOM;
        return $body . "</a>\n";

}


function plugin_youtube_res_inline() {
        //使用しない
}
?>
