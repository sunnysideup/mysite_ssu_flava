<div class="ss-loading-screen">
	<div class="loading-logo">

/**
  * ### @@@@ START REPLACEMENT @@@@ ###
  * WHY: upgrade to SS4
  * OLD: /images/ (case sensitive)
  * NEW: /client/images/ (COMPLEX)
  * EXP: Check new location, also see: https://docs.silverstripe.org/en/4/developer_guides/templates/requirements/#direct-resource-urls
  * ### @@@@ STOP REPLACEMENT @@@@ ###
  */
		<img class="loading-animation" src="$ModulePath(frameworkadmin)/client/images/spinner.gif" alt="<% _t('CMSLoadingScreen.ss.LOADING','Loading...') %>" />
		<noscript><p class="nojs-warning"><span class="message notice"><% _t('CMSLoadingScreen.ss.REQUIREJS','The CMS requires that you have JavaScript enabled.') %></span></p></noscript>
	</div>
</div>
