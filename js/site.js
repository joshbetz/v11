(function($) {
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
	$("article").fitVids({customSelector: "iframe[src^='//speakerdeck.com']"});
})(jQuery);