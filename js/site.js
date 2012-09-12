(function($) {
	// This is a work-around until #21534 is fixed
	$('#mainnav li').not('.menu-item-has-children').each(function() {
		var $el = $(this);
		if ( $el.find('ul').length > 0 ) {
			$el.addClass('menu-item-has-children');
		}
	});

	// Add speakerdeck to fitvids
	$("article").fitVids({customSelector: "iframe[src^='//speakerdeck.com']"});

	// Prevent widows
	$("header h1").each(function() {
		var wordArray = $(this).text().split(" ");
		wordArray[wordArray.length-2] += "&nbsp;" + wordArray[wordArray.length-1];
		wordArray.pop();
		$(this).html(wordArray.join(" "));
	});

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