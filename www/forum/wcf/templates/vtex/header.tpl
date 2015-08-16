<style>

html {
    overflow-y: scroll;
    box-sizing: border-box;
}

.logoVT {
    float: left;
    text-align: right;
    height:100px;
    background-color:#fff;
    position: relative;
    color:#000;
    line-height:100px;
}

.four {
    width:25%;
    float:left;
}

.nav {
    background: #FFF none repeat scroll 0% 0%;
    height: 100px;
    border-bottom: 5px solid #2D8633;
    font-family: verdana; !important;
    font-size:16px;
}

.nav a img{
    float: right;
    display: inline;
    width: 350px;
    color: #FFF;
    padding-top: 25px;
}

.containerVT {
    width: 1000px;
    margin: 0px auto;
}

.mobile-menu-toggler {
    width: 50px;
    height: 50px;
    background: #2D8633 url("http://new.vertexdezign.net/images/backend/menu-alt.png") no-repeat scroll center center;
    display: none;
    float: right;
    margin-top: 25px;
    margin-right: 10px;
    cursor: pointer;
}

.menu-holder {
    width: calc(100% - 445px);
    float: left;
    padding-left: calc(100% - 950px);
    box-sizing: border-box;
}

.controllers {
    margin:0 auto;
    padding:0;
}

.controllers li {
    cursor: pointer;
    list-style-type: none;
    float: left;
    line-height: 100px;
    padding-left: 10px;
    padding-right: 10px;
    transition: border-bottom-width 0.1s ease-in-out 0s;
    -webkit-transition: border-bottom-width 0.1s ease-in-out 0s;-moz-transition: border-bottom-width 0.1s ease-in-out 0s;-o-transition: border-bottom-width 0.1s ease-in-out 0s;
}

.controllers li a {
    color: #000;
    text-decoration: none;
    display: inline-block;
}

.controllers li:hover a {
    color:#2D8633; !important;
}

.controllers li:hover {
    border-bottom:5px solid #fff;
    height:100px;color:#000; !important;
    line-height:100px;
}

.responsive-mobile {
    width: 100%;
    padding-left: 0px;
}

@media only screen and (max-width: 1000px), only screen and (max-device-width: 500px) {
    .responsive-full-width {width:100%;}
    .container {width:100%;box-sizing:Border-box;}
    .four {width:50%;}
    nav {height:auto;min-height:75px;}
}
@media only screen and (max-width: 875px), only screen and (max-device-width: 450px) {
    .responsive-second-full-width {width:100%;}
    .mobile-menu-toggler {display:block;}
    .logo {text-align:left;padding-left:5px;}
    nav .menu-holder {width:100%;}
    nav .controllers {display:none;}
    nav ul.controllers li:hover {border-bottom:5px solid #2D8633;}
    .responsive-mobile {display:block;position:initial;top:initial;}
}

@media only screen and (max-width: 675px), only screen and (max-device-width: 350px) {
    .responsive-third-full-width {width:100%;}
    .mobile-menu-toggler {display:block;}
    nav .menu-holder {width:100%;}
    .responsive-mobile {display:block;position:initial;top:initial;}
    nav .controllers {display:none;}
}
</style>

<a id="top" style="height:0;"></a>

<nav class="nav">
    <div class="logoVT four">
        <a style="text-decoration: none;color:inherit;" href="http://new.vertexdezign.net"><img src="http://new.vertexdezign.net/images/logo.png"/></a>
    </div>
  <div class="containerVT" style="padding: initial">
      <div class="mobile-menu-toggler" onclick="$('.controllers.responsive-mobile').slideToggle();"></div>
      <div class="menu-holder">
          <ul class="controllers">
                  <li><a href="http://new.vertexdezign.net/projects">Projects</a></li>
                  <li><a href="http://new.vertexdezign.net/downloads">Downloads</a></li>
                  <li><a href="http://new.vertexdezign.net/forum">Forum</a></li>
          </ul>
          <ul class="controllers responsive-mobile" style="display:none;">
                <li><a href="http://new.vertexdezign.net/projects">Projects</a></li>
                <li><a href="http://new.vertexdezign.net/downloads">Downloads</a></li>
                <li><a href="http://new.vertexdezign.net/forum">Forum</a></li>
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
