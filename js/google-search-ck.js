function getQuery(){var e=""+window.location,t=e.indexOf("?")+1;if(t>0){var n=e.substr(t).split("&");for(var r=0;r<n.length;r++)if(n[r].length>2&&n[r].substr(0,2)=="q=")return decodeURIComponent(n[r].split("=")[1].replace(/\+/g," "))}return""}function onLoad(){var e=new google.search.CustomSearchControl("010175855548164516950:zxya1uapa3s"),t=new google.search.DrawOptions;t.setAutoComplete(!0);e.draw("results",t);e.execute(getQuery())}google.load("search","1");google.setOnLoadCallback(onLoad);