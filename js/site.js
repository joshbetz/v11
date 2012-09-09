(function($) {
	// Add speakerdeck to fitvids
	$("article").fitVids({customSelector: "iframe[src^='//speakerdeck.com']"});

	// Style <pre><code> blocks with Google's prettyPrint (syntax highlighting)
	function styleCode() {
		if (typeof disableStyleCode !== "undefined") {
			return;
		}

		var a = false;

		$("pre code").parent().each(function() {
			if (!$(this).hasClass("prettyprint")) {
				$(this).addClass("prettyprint").addClass("linenums");
				a = true;
			}
		});

		if (a) { prettyPrint(); }
	}
	styleCode();
})(jQuery);