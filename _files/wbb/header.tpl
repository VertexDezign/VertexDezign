<style>

html {
    overflow-y: scroll;
}
</style>

<link href="http://vertexdezign.net/css/index.css" rel="stylesheet">

<a id="top" style="height:0;"></a>

<nav>
  <div class="logo four">
      <a style="text-decoration: none;color:inherit;" href="http://vertexdezign.net"><img src="http://vertexdezign.net/images/logo.png"/></a>
  </div>
  <div class="container">
      <div class="mobile-menu-toggler" onclick="$('.controllers.responsive-mobile').slideToggle();"></div>
      <div class="menu-holder">
          <ul class="controllers">
                  <li><a href="{{{URL('/projects')}}}">Projects</a></li>
                  <li><a href="{{{URL('/downloads')}}}">Downloads</a></li>
                  <li><a href="{{{URL('/forum')}}}">Forum</a></li>
          </ul>
          <ul class="controllers responsive-mobile" style="display:none;">
                <li><a href="{{{URL('/projects')}}}">Projects</a></li>
                <li><a href="{{{URL('/downloads')}}}">Downloads</a></li>
                <li><a href="{{{URL('/forum')}}}">Forum</a></li>
          </ul>
          <div style="clear:both;"></div>
      </div>
      <div style="clear:both;"></div>
  </div>
</nav>



<header id="pageHeader" style=" margin-top: 0;" class="{if $__wcf->getStyleHandler()->getStyle()->getVariable('useFluidLayout')}layoutFluid{else}layoutFixed{/if}{if $sidebarOrientation|isset && $sidebar|isset} sidebarOrientation{@$sidebarOrientation|ucfirst}{if $sidebarOrientation == 'right' && $sidebarCollapsed} sidebarCollapsed{/if}{/if}">
	<div>
		<nav id="topMenu" class="userPanel" style="position: static; overflow: hidden;">
			<div class="{if $__wcf->getStyleHandler()->getStyle()->getVariable('useFluidLayout')}layoutFluid{else}layoutFixed{/if}" style="margin: 0;">
				{hascontent}
					<ul class="userPanelItems" style="padding-left: 0px;">
						{content}
							{include file='userPanel'}
							{event name='topMenu'}
						{/content}
					</ul>
				{/hascontent}

				{include file='searchArea'}
			</div>
		</nav>
		{event name='headerContents'}
		{include file='mainMenu'}


		<nav class="navigation navigationHeader">
			{include file='mainMenuSubMenu'}


			<ul class="navigationIcons">
				<li id="toBottomLink"><a href="{$__wcf->getAnchor('bottom')}" title="{lang}wcf.global.scrollDown{/lang}" class="jsTooltip"><span class="icon icon16 icon-arrow-down"></span> <span class="invisible">{lang}wcf.global.scrollDown{/lang}</span></a></li>
				<li id="sitemap" class="jsOnly"><a title="{lang}wcf.page.sitemap{/lang}" class="jsTooltip"><span class="icon icon16 icon-sitemap"></span> <span class="invisible">{lang}wcf.page.sitemap{/lang}</span></a></li>
				{if $headerNavigation|isset}{@$headerNavigation}{/if}
				{event name='navigationIcons'}
			</ul>
		</nav>
	</div>
</header>



<div id="main" class="{if $__wcf->getStyleHandler()->getStyle()->getVariable('useFluidLayout')}layoutFluid{else}layoutFixed{/if}{if $sidebarOrientation|isset && $sidebar|isset} sidebarOrientation{@$sidebarOrientation|ucfirst}{if $sidebarOrientation == 'right' && $sidebarCollapsed} sidebarCollapsed{/if}{/if}">
	<div>
		<div>
			{capture assign='__sidebar'}
				{if $sidebar|isset}
					<aside class="sidebar"{if $sidebarOrientation|isset && $sidebarOrientation == 'right'} data-is-open="{if $sidebarCollapsed}false{else}true{/if}" data-sidebar-name="{$sidebarName}"{/if}>
						<div>
							{event name='sidebarBoxesTop'}

							{@$sidebar}

							{event name='sidebarBoxesBottom'}
						</div>
					</aside>

					{if $sidebarOrientation|isset && $sidebarOrientation == 'right'}
						<script data-relocate="true">
							//<![CDATA[
							$(function() {
								new WCF.Collapsible.Sidebar();
							});
							//]]>
						</script>
					{/if}
				{/if}
			{/capture}

			{if !$sidebarOrientation|isset || $sidebarOrientation == 'left'}
				{@$__sidebar}
			{/if}

			<section id="content" class="content">

				{event name='contents'}

				{if $skipBreadcrumbs|empty}{include file='breadcrumbs'}{/if}
