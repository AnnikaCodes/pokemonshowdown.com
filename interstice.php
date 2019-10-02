<?php

header('X-Robots-Tag: noindex');

if (!isset($_REQUEST['uri'])) {
	header('HTTP/1.1 303 See Other');
	header('Location: /');
	die();
}

$uri = htmlspecialchars($_REQUEST['uri']);

if (substr($uri, 0, 4) !== 'http') $uri = 'http://' . $uri;

include 'style/wrapper.inc.php';

$page = 'interstice';
$pageTitle = "External link";

includeHeaderTop();
?>
		<meta name="robots" content="noindex" />
<?php
includeHeaderBottom();

?>
		<div class="main">

			<div class="ps-ad" style="margin: 0 auto;max-width: 728px;">
<!-- BEGIN JS TAG - [728x90] < - DO NOT MODIFY -->
<script type="text/javascript">
document.write('<SCR'+'IPT SRC="http://ads.sonobi.com/ttj?id=1871931&referrer=pokemonshowdown.com&cb='+(parseInt(Math.random()*100000))+'" TYPE="text/javascript"></SCR'+'IPT>');
</script>
<!-- END TAG -->
			</div>

			<p>
				You have clicked on a link to visit the following external site:
			</p>
			<blockquote><p>
				<code><?php echo $uri ?></code>
			</p></blockquote>
			<div style="clear:both"></div>

			<p>Please note:</p>

			<ul>
				<li>This external site is not affiliated with <code>pokemonshowdown.com</code>.
				We cannot guarantee the quality of external sites.</li>
				<li>External sites may contain offensive or shocking content or may harm your computer.</li>
			</ul>

			<p>If you trust the source of this link and want to visit it, you can click the button below to proceed:</p>

			<blockquote><ul class="nav">
				<li><a rel="nofollow" class="button nav-first nav-last" href="<?php echo $uri ?>" title="<?php echo $uri ?>">Visit external site</a></li>
			</ul></blockquote>

		</div>
<?php

includeFooter();

?>
