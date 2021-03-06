<?php
/**
 * @package     Joomla.Administrator
 * @subpackage  Template.hathor
 *
 * @copyright   Copyright (C) 2005 - 2012 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

$app = JFactory::getApplication();
JHtml::_('behavior.noframes');
$lang = JFactory::getLanguage();
$doc	= JFactory::getDocument();

// Load optional rtl bootstrap css and bootstrap bugfixes
JHtmlBootstrap::loadCss($includeMaincss = false, $this->direction);

// Load system style CSS
$doc->addStyleSheet('templates/system/css/system.css');

// Loadtemplate CSS
$doc->addStyleSheet('templates/'.$this->template.'/css/template.css');

// Load additional CSS styles for colors
if (!$this->params->get('colourChoice')) :
$colour = 'standard';
else :
$colour = htmlspecialchars($this->params->get('colourChoice'));
endif;
$doc->addStyleSheet('templates/'.$this->template.'/css/colour_'.$colour.'.css');

// Load specific language related CSS
$file = 'language/' . $lang->getTag() . '/' . $lang->getTag() . '.css';
if (is_file($file))
{
	$doc->addStyleSheet($file);
}

// Load additional CSS styles for rtl sites
if ($this->direction == 'rtl')
{
	$doc->addStyleSheet('templates/'.$this->template.'/css/template_rtl.css');
	$doc->addStyleSheet('templates/'.$this->template.'/css/colour_'.$colour.'_rtl.css');
}

// Load specific language related CSS
$file = 'language/'.$lang->getTag().'/'.$lang->getTag().'.css';
if (JFile::exists($file))
{
	$doc->addStyleSheet($file);
}

// Load additional CSS styles for bold Text
if ($this->params->get('boldText'))
{
	$doc->addStyleSheet('templates/'.$this->template.'/css/boldtext.css');
}

// Logo file
if ($this->params->get('logoFile'))
{
	$logo = JURI::root() . $this->params->get('logoFile');
}
else
{
	$logo = $this->baseurl . "/templates/" . $this->template . "/images/logo.png";
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo $this->language; ?>" lang="<?php echo $this->language; ?>" dir="<?php echo $this->direction; ?>" >
<head>
<jdoc:include type="head" />

<!-- Load additional CSS styles for Internet Explorer -->
<!--[if IE 7]>
	<link href="templates/<?php echo  $this->template ?>/css/ie7.css" rel="stylesheet" type="text/css" />
<![endif]-->
<!--[if lt IE 9]>
	<script src="../media/jui/js/html5.js"></script>
<![endif]-->

<!-- Load Template JavaScript -->
<script type="text/javascript" src="templates/<?php  echo  $this->template  ?>/js/template.js"></script>

</head>
<body id="login-page">
	<div id="containerwrap">

		<!-- Header Logo -->
		<div id="header">
			<h1 class="title"><?php echo $this->params->get('showSiteName') ? $app->getCfg('sitename') . " " . JText::_('JADMINISTRATION') : JText::_('JADMINISTRATION'); ?></h1>
		</div><!-- end header -->

		<!-- Content Area -->
		<div id="content">

			<!-- Beginning of Actual Content -->
			<div id="element-box" class="login">
				<div class="pagetitle"><h2><?php echo JText::_('COM_LOGIN_JOOMLA_ADMINISTRATION_LOGIN') ?></h2></div>

					<!-- System Messages -->
					<jdoc:include type="message" />

					<div class="login-inst">
					<p><?php echo JText::_('COM_LOGIN_VALID') ?></p>
					<div id="lock"></div>
					<a href="<?php echo JURI::root(); ?>"><?php echo JText::_('COM_LOGIN_RETURN_TO_SITE_HOME_PAGE') ?></a>
					</div>

					<!-- Login Component -->
					<div class="login-box">
						<jdoc:include type="component" />
					</div>
				<div class="clr"></div>
			</div><!-- end element-box -->

		<noscript>
			<?php echo JText::_('JGLOBAL_WARNJAVASCRIPT') ?>
		</noscript>

		</div><!-- end content -->
		<div class="clr"></div>
	</div><!-- end of containerwrap -->

	<!-- Footer -->
	<div id="footer">
		<p class="copyright">
			<?php $joomla = '<a href="http://www.joomla.org">Joomla!&#174;</a>';
			echo JText::sprintf('JGLOBAL_ISFREESOFTWARE', $joomla) ?>
		</p>
	</div>
</body>
</html>
