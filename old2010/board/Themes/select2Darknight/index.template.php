
<?php
// Version: 1.1.10; index

/*	This template is, perhaps, the most important template in the theme. It
	contains the main template layer that displays the header and footer of
	the forum, namely with main_above and main_below. It also contains the
	menu sub template, which appropriately displays the menu; the init sub
	template, which is there to set the theme up; (init can be missing.) and
	the linktree sub template, which sorts out the link tree.

	The init sub template should load any data and set any hardcoded options.

	The main_above sub template is what is shown above the main content, and
	should contain anything that should be shown up there.

	The main_below sub template, conversely, is shown after the main content.
	It should probably contain the copyright statement and some other things.

	The linktree sub template should display the link tree, using the data
	in the $context['linktree'] variable.

	The menu sub template should display all the relevant buttons the user
	wants and or needs.

	For more information on the templating system, please see the site at:
	http://www.simplemachines.org/
*/

// Initialize the template... mainly little settings.


function template_init()
{
	global $context, $settings, $options, $txt;

	/* Use images from default theme when using templates from the default theme?
		if this is 'always', images from the default theme will be used.
		if this is 'defaults', images from the default theme will only be used with default templates.
		if this is 'never' or isn't set at all, images from the default theme will not be used. */
	$settings['use_default_images'] = 'never';

	/* What document type definition is being used? (for font size and other issues.)
		'xhtml' for an XHTML 1.0 document type definition.
		'html' for an HTML 4.01 document type definition. */
	$settings['doctype'] = 'xhtml';

	/* The version this template/theme is for.
		This should probably be the version of SMF it was created for. */
	$settings['theme_version'] = '1.1';

	/* Set a setting that tells the theme that it can render the tabs. */
	$settings['use_tabs'] = true;

	/* Use plain buttons - as oppossed to text buttons? */
	$settings['use_buttons'] = true;

	/* Show sticky and lock status seperate from topic icons? */
	$settings['seperate_sticky_lock'] = true;
}

// The main sub template above the content.
function template_main_above()
{
	global $context, $settings, $options, $scripturl, $txt, $modSettings;

	// Show right to left and the character set for ease of translating.
	echo '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"', $context['right_to_left'] ? ' dir="rtl"' : '', '><head>
<style type="text/css">
<!--
.style1 {
	color: #FFFFFF;
	font-family: Tahoma;
	font-size: 12px;
}
-->
</style>
	<meta http-equiv="Content-Type" content="text/html; charset=', $context['character_set'], '" />
	<meta name="description" content="', $context['page_title'], '" />', empty($context['robot_no_index']) ? '' : '
	<meta name="robots" content="noindex" />', '
	<meta name="keywords" content="PHP, MySQL, bulletin, board, free, open, source, smf, simple, machines, forum" />
	<script language="JavaScript" type="text/javascript" src="', $settings['default_theme_url'], '/script.js?fin11"></script>
	<script type="text/javascript" src="', $settings['theme_url'], '/js/jquery-1.3.2.min.js"></script>
	<script type="text/javascript" src="', $settings['theme_url'], '/js/jquery.scrollTo-min.js"></script>
	<script type="text/javascript" src="', $settings['theme_url'], '/js/jquery.scrollShow.js"></script>
	<script language="JavaScript" type="text/javascript"><!-- // --><![CDATA[
		var smf_theme_url = "', $settings['theme_url'], '";
		var smf_images_url = "', $settings['images_url'], '";
		var smf_scripturl = "', $scripturl, '";
		var smf_iso_case_folding = ', $context['server']['iso_case_folding'] ? 'true' : 'false', ';
		var smf_charset = "', $context['character_set'], '";
	// ]]>
	
	

	jQuery(function( $ ){
	//borrowed from jQuery easing plugin
	//http://gsgd.co.uk/sandbox/jquery.easing.php
	$.easing.backout = function(x, t, b, c, d){
	var s=1.70158;
	return c*((t=t/d-1)*t*((s+1)*t + s) + 1) + b;
	};
	$(\'#screen\').scrollShow({
	view:\'#view\',
	content:\'#images\',
	easing:\'backout\',
	wrappers:\'crop\',
	navigators:\'a[id]\',
	navigationMode:\'sr\',
	circular:false,
	start:0
	});
	});
	</script>
	<title>', $context['page_title'], '</title>';

	// The ?fin11 part of this link is just here to make sure browsers don't cache it wrongly.
	echo '
	<link rel="stylesheet" type="text/css" href="', $settings['theme_url'], '/style.css?fin11" />
	<link rel="stylesheet" type="text/css" href="', $settings['theme_url'], '/css/layout.css" />
	<link rel="stylesheet" type="text/css" href="', $settings['default_theme_url'], '/print.css?fin11" media="print" />';

	/* Internet Explorer 4/5 and Opera 6 just don't do font sizes properly. (they are big...)
		Thus, in Internet Explorer 4, 5, and Opera 6 this will show fonts one size smaller than usual.
		Note that this is affected by whether IE 6 is in standards compliance mode.. if not, it will also be big.
		Standards compliance mode happens when you use xhtml... */
	if ($context['browser']['needs_size_fix'])
		echo '
	<link rel="stylesheet" type="text/css" href="', $settings['default_theme_url'], '/fonts-compat.css" />';

	// Show all the relative links, such as help, search, contents, and the like.
	echo '
	<link rel="help" href="', $scripturl, '?action=help" target="_blank" />
	<link rel="search" href="' . $scripturl . '?action=search" />
	<link rel="contents" href="', $scripturl, '" />';

	// If RSS feeds are enabled, advertise the presence of one.
	if (!empty($modSettings['xmlnews_enable']))
		echo '
	<link rel="alternate" type="application/rss+xml" title="', $context['forum_name'], ' - RSS" href="', $scripturl, '?type=rss;action=.xml" />';

	// If we're viewing a topic, these should be the previous and next topics, respectively.
	if (!empty($context['current_topic']))
		echo '
	<link rel="prev" href="', $scripturl, '?topic=', $context['current_topic'], '.0;prev_next=prev" />
	<link rel="next" href="', $scripturl, '?topic=', $context['current_topic'], '.0;prev_next=next" />';

	// If we're in a board, or a topic for that matter, the index will be the board's index.
	if (!empty($context['current_board']))
		echo '
	<link rel="index" href="' . $scripturl . '?board=' . $context['current_board'] . '.0" />';

	// We'll have to use the cookie to remember the header...
	if ($context['user']['is_guest'])
	{
		$options['collapse_header'] = !empty($_COOKIE['upshrink']);
		$options['collapse_header_ic'] = !empty($_COOKIE['upshrinkIC']);
	}

	// Output any remaining HTML headers. (from mods, maybe?)
	echo $context['html_headers'], '

	<script language="JavaScript" type="text/javascript"><!-- // --><![CDATA[
		var current_header = ', empty($options['collapse_header']) ? 'false' : 'true', ';

		function shrinkHeader(mode)
		{';

	// Guests don't have theme options!!
	if ($context['user']['is_guest'])
		echo '
			document.cookie = "upshrink=" + (mode ? 1 : 0);';
	else
		echo '
			smf_setThemeOption("collapse_header", mode ? 1 : 0, null, "', $context['session_id'], '");';

	echo '
			document.getElementById("upshrink").src = smf_images_url + (mode ? "/upshrink2.gif" : "/upshrink.gif");

			document.getElementById("upshrinkHeader").style.display = mode ? "none" : "";
			document.getElementById("upshrinkHeader2").style.display = mode ? "none" : "";

			current_header = mode;
		}
	// ]]></script>';

	// the routine for the info center upshrink
	echo '
		<script language="JavaScript" type="text/javascript"><!-- // --><![CDATA[
			var current_header_ic = ', empty($options['collapse_header_ic']) ? 'false' : 'true', ';

			function shrinkHeaderIC(mode)
			{';

	if ($context['user']['is_guest'])
		echo '
				document.cookie = "upshrinkIC=" + (mode ? 1 : 0);';
	else
		echo '
				smf_setThemeOption("collapse_header_ic", mode ? 1 : 0, null, "', $context['session_id'], '");';

	echo '
				document.getElementById("upshrink_ic").src = smf_images_url + (mode ? "/expand.gif" : "/collapse.gif");

				document.getElementById("upshrinkHeaderIC").style.display = mode ? "none" : "";

				current_header_ic = mode;
			}
		// ]]></script>
</head>
<body>';

	echo '
<div class="main">
  <div class="header">
    <div class="block_header">
      <div class="logo"><a href="',$scripturl,'"><img src="',$settings['theme_url'],'/images/logo.gif" width="257" height="154" border="0" alt="',$context['forum_name'],'" /></a></div>
      <div class="simple_text"></div>
      <div class="search">
        <form action="', $scripturl, '?action=search2" method="post" accept-charset="', $context['character_set'], '">
          <label>
            <input name="search" type="text" class="keywords" id="search" maxlength="50" value="',($_POST['search'])?$_POST['search']:'Search...','" />
            <input name="b" type="image" src="',$settings['theme_url'],'/images/search.gif" class="button" />
          </label>
			<input type="hidden" name="advanced" value="0" />
	';
		// Search within current topic?
		if (!empty($context['current_topic']))
		echo '<input type="hidden" name="topic" value="', $context['current_topic'], '" />';
		
		// If we're on a certain board, limit it to this board ;).
		elseif (!empty($context['current_board']))
		echo '<input type="hidden" name="brd[', $context['current_board'], ']" value="', $context['current_board'], '" />';
		
		echo '
		</form>
      </div>
      <div class="clr"></div>
      <!-- Menu Begin -->
      ',template_menu(),'
      <!-- Menu End -->
      <div class="clr"></div>
    
      <!-- Slide Begin -->
      ',Slide(),'
      <!-- Slide End -->
    </div>
    <div class="clr"></div>
  </div>
  <div class="clr"></div>
  <div class="body">
    <div class="body_resize">
		<div class="design">
		<!-- Content Begin -->
	';
}

function template_main_below()
{
	global $context, $settings, $options, $scripturl, $txt;
	
	echo '
    <!-- Content End -->
    </div>
    
    <div class="clr"></div>
  </div>
  <div class="footer">
    <div class="footer_resize">
	 <ul>
     <li><a href="http://www.simplemachines.org/" target="_blank">Powered by SMF 1.1.10</a> | © 2010 ZYNEKTECHNOLOGIES.CO.TH </li>
	 </ul>
     <p> <a href="http://www.zynektechnologies.co.th/" target="_blank"><span class="style1">หน้าแรก Zynektechonologies&nbsp;</span></a> |<a href="http://www.zynektechnologies.co.th/contact.php" target="_blank"> <span class="style1">&nbsp;ติดต่อเรา</span></a> | <a href="http://www.zynektechnologies.co.th/board/index.php?board=1.0" ><span class="style1">&nbsp;webboard</span></a></p>
     <p style="display:none">',theme_copyright(),'</p>
     <div class="clr"></div>
    </div>
  </div>
</div>
	';
	
	// This is an interesting bug in Internet Explorer AND Safari. Rather annoying, it makes overflows just not tall enough.
	if (($context['browser']['is_ie'] && !$context['browser']['is_ie4']) || $context['browser']['is_mac_ie'] || $context['browser']['is_safari'] || $context['browser']['is_firefox'])
	{
		// The purpose of this code is to fix the height of overflow: auto div blocks, because IE can't figure it out for itself.
		echo '
		<script language="JavaScript" type="text/javascript"><!-- // --><![CDATA[';

		// Unfortunately, Safari does not have a "getComputedStyle" implementation yet, so we have to just do it to code...
		if ($context['browser']['is_safari'])
			echo '
			window.addEventListener("load", smf_codeFix, false);

			function smf_codeFix()
			{
				var codeFix = document.getElementsByTagName ? document.getElementsByTagName("div") : document.all.tags("div");

				for (var i = 0; i < codeFix.length; i++)
				{
					if ((codeFix[i].className == "code" || codeFix[i].className == "post" || codeFix[i].className == "signature") && codeFix[i].offsetHeight < 20)
						codeFix[i].style.height = (codeFix[i].offsetHeight + 20) + "px";
				}
			}';
		elseif ($context['browser']['is_firefox'])
			echo '
			window.addEventListener("load", smf_codeFix, false);
			function smf_codeFix()
			{
				var codeFix = document.getElementsByTagName ? document.getElementsByTagName("div") : document.all.tags("div");

				for (var i = 0; i < codeFix.length; i++)
				{
					if (codeFix[i].className == "code" && (codeFix[i].scrollWidth > codeFix[i].clientWidth || codeFix[i].clientWidth == 0))
						codeFix[i].style.overflow = "scroll";
				}
			}';
		else
			echo '
			var window_oldOnload = window.onload;
			window.onload = smf_codeFix;

			function smf_codeFix()
			{
				var codeFix = document.getElementsByTagName ? document.getElementsByTagName("div") : document.all.tags("div");

				for (var i = codeFix.length - 1; i > 0; i--)
				{
					if (codeFix[i].currentStyle.overflow == "auto" && (codeFix[i].currentStyle.height == "" || codeFix[i].currentStyle.height == "auto") && (codeFix[i].scrollWidth > codeFix[i].clientWidth || codeFix[i].clientWidth == 0) && (codeFix[i].offsetHeight != 0 || codeFix[i].className == "code"))
						codeFix[i].style.height = (codeFix[i].offsetHeight + 36) + "px";
				}

				if (window_oldOnload)
				{
					window_oldOnload();
					window_oldOnload = null;
				}
			}';

		echo '
		// ]]></script>';
	}

	// The following will be used to let the user know that some AJAX process is running
	echo '
	<div id="ajax_in_progress" style="display: none;', $context['browser']['is_ie'] && !$context['browser']['is_ie7'] ? 'position: absolute;' : '', '">', $txt['ajax_in_progress'], '</div>
</body></html>';
}

// Show a linktree. This is that thing that shows "My Community | General Category | General Discussion"..
function theme_linktree()
{
	global $context, $settings, $options;

	echo '<div class="nav" style="font-size: smaller; margin-bottom: 2ex; margin-top: 2ex;">';
    
	// Each tree item has a URL and name. Some may have extra_before and extra_after.
	foreach ($context['linktree'] as $link_num => $tree)
	{
	
		// Show something before the link?
		if (isset($tree['extra_before']))
			echo $tree['extra_before'];

		// Show the link, including a URL if it should have one.
		echo '<b>', $settings['linktree_link'] && isset($tree['url']) ? '<a href="' . $tree['url'] . '" class="nav">' . $tree['name'] . '</a>' : $tree['name'], '</b>';

		// Show something after the link...?
		if (isset($tree['extra_after']))
			echo $tree['extra_after'];

		// Don't show a separator for the last one.
		if ($link_num != count($context['linktree']) - 1)
			echo '&nbsp;>&nbsp;';
	}

	echo '</div>';
}

// Show the menu up top. Something like [home] [help] [profile] [logout]...
function template_menu()
{
	global $context, $settings, $options, $scripturl, $txt;
	
	echo '
<div class="menu">
		<ul>
	';

	// Work out where we currently are.
	$current_action = 'home';
	if (in_array($context['current_action'], array('admin', 'ban', 'boardrecount', 'cleanperms', 'detailedversion', 'dumpdb', 'featuresettings', 'featuresettings2', 'findmember', 'maintain', 'manageattachments', 'manageboards', 'managecalendar', 'managesearch', 'membergroups', 'modlog', 'news', 'optimizetables', 'packageget', 'packages', 'permissions', 'pgdownload', 'postsettings', 'regcenter', 'repairboards', 'reports', 'serversettings', 'serversettings2', 'smileys', 'viewErrorLog', 'viewmembers')))
		$current_action = 'admin';
	if (in_array($context['current_action'], array('search', 'admin', 'calendar', 'profile', 'mlist', 'register', 'login', 'help', 'pm')))
		$current_action = $context['current_action'];
	if ($context['current_action'] == 'search2')
		$current_action = 'search';
	if ($context['current_action'] == 'theme')
		$current_action = isset($_REQUEST['sa']) && $_REQUEST['sa'] == 'pick' ? 'profile' : 'admin';
	
	// Show the [home] button.
	echo '<li><a href="http://www.zynektechnologies.co.th/board/index.php?board=1.0" class="' , $current_action == 'home' ? 'active' : '' , '"><span>' , $txt[103] , '</span></a></li>';

	// Show the [help] button.
	echo '<li><a href="', $scripturl, '?action=help" class="' , $current_action == 'help' ? 'active' : '' , '"><span>' , $txt[119] , '</span></a></li>';

	// How about the [search] button?
	if ($context['allow_search']){
		echo '<li><a href="', $scripturl, '?action=search" class="' , $current_action == 'search' ? 'active' : '' , '"><span>' , $txt[182], '</span></a></li>';
	}

	// Is the user allowed to administrate at all? ([admin])
	if ($context['allow_admin']){
		echo '<li><a href="', $scripturl, '?action=admin" class="' , $current_action == 'admin' ? 'active' : '' , '"><span>' , $txt[2], '</span></a></li>';
	}

	// Edit Profile... [profile]
	if ($context['allow_edit_profile']){
		echo '<li><a href="', $scripturl, '?action=profile" class="' , $current_action == 'profile' ? 'active' : '' , '"><span>' , $txt[79], '</span></a></li>';
	}

	// Go to PM center... [pm]
	if ($context['user']['is_logged'] && $context['allow_pm']){
		echo '<li><a href="', $scripturl, '?action=pm" class="' , $current_action == 'pm' ? 'active' : '' , '"><span>' , $txt['pm_short'] , ' ', $context['user']['unread_messages'] > 0 ? '[<strong>'. $context['user']['unread_messages'] . '</strong>]' : '' , '</span></a></li>';
	}

	// The [calendar]!
	if ($context['allow_calendar']){
		echo '<li><a href="', $scripturl, '?action=calendar" class="' , $current_action == 'calendar' ? 'active' : '' , '"><span>' , $txt['calendar24'], '</span></a></li>';
	}

	// the [member] list button
	if ($context['allow_memberlist']){
		echo '<li><a href="', $scripturl, '?action=mlist" class="' , $current_action == 'mlist' ? 'active' : '' , '"><span>' , $txt[331], '</span></a></li>';
	}

	// If the user is a guest, show [login] button.
	if ($context['user']['is_guest']){
		echo '<li><a href="', $scripturl, '?action=login" class="' , $current_action == 'login' ? 'active' : '' , '"><span>' ,$txt[34], '</span></a></li>';
	}

	// If the user is a guest, also show [register] button.
	if ($context['user']['is_guest']){
		echo '<li><a href="', $scripturl, '?action=register" class="' , $current_action == 'register' ? 'active' : '' , '"><span>' ,$txt[97], '</span></a></li>';
	}

	// Otherwise, they might want to [logout]...
	if ($context['user']['is_logged']){
		echo '<li><a href="', $scripturl, '?action=logout;sesc=', $context['session_id'], '" class="' , $current_action == 'logout' ? 'active' : '' , '"><span>' ,$txt[108], '</span></a></li>';
	}

	echo '
		</ul>
	<div class="clr"></div>
</div>	
	';
}

// Generate a strip of buttons.
function template_button_strip($button_strip, $direction = 'top', $force_reset = false, $custom_td = '')
{
	global $settings, $buttons, $context, $txt, $scripturl;

	// Create the buttons...
	foreach ($button_strip as $key => $value)
	{
		if (isset($value['test']) && empty($context[$value['test']]))
		{
			unset($button_strip[$key]);
			continue;
		}
		elseif (!isset($buttons[$key]) || $force_reset)
			$buttons[$key] = '<a href="' . $value['url'] . '" ' .( isset($value['custom']) ? $value['custom'] : '') . '>' . $txt[$value['text']] . '</a>';

		$button_strip[$key] = $buttons[$key];
	}

	if (empty($button_strip))
		return '<td>&nbsp;</td>';

	echo '
		<td class="', $direction == 'top' ? 'main' : 'mirror', 'tab_' , $context['right_to_left'] ? 'last' : 'first' , '">&nbsp;</td>
		<td class="', $direction == 'top' ? 'main' : 'mirror', 'tab_back">', implode(' &nbsp;|&nbsp; ', $button_strip) , '</td>
		<td class="', $direction == 'top' ? 'main' : 'mirror', 'tab_' , $context['right_to_left'] ? 'first' : 'last' , '">&nbsp;</td>';
}


// Slide
function Slide(){
	global $settings, $buttons, $context, $txt, $scripturl;
	
	/*echo '
<div class="slider">
     <center>   
          <a href="http://www.zynekcctv.com/contact.php"><img src="http://www.zynekcctv.com/board/Themes/select2Darknight/images/vinyl_dvrcam.jpg" alt="ZYNEKCCTV : เว็บบอร์ดเกี่ยวกับกล้องวงจรปิด"  /></a>
     </center>       
</div>	
	';*/
} 
?>