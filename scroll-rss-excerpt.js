function ScrollRssExcerptSlider() {
	ObjScrollRssExcerpt.scrollTop = ObjScrollRssExcerpt.scrollTop + 1;
	srsse_scrollPos++;
	if ((srsse_scrollPos%srsse_heightOfElm) == 0) {
		srsse_numScrolls--;
		if (srsse_numScrolls == 0) {
			ObjScrollRssExcerpt.scrollTop = '0';
			ScrollRssExcerptContent();
		} else {
			if (srsse_scrollOn == 'true') {
				ScrollRssExcerptContent();
			}
		}
	} else {
		setTimeout("ScrollRssExcerptSlider();", 10);
	}
}

var ScrollRssExcerptNum = 0;
/*
Creates amount to show + 1 for the scrolling ability to work
scrollTop is set to top position after each creation
Otherwise the scrolling cannot happen
*/
function ScrollRssExcerptContent() {
	var tmp_ScrollRssExcerpt = '';

	w_ScrollRssExcerpt = ScrollRssExcerptNum - parseInt(srsse_numberOfElm);
	if (w_ScrollRssExcerpt < 0) {
		w_ScrollRssExcerpt = 0;
	} else {
		w_ScrollRssExcerpt = w_ScrollRssExcerpt%rssslider.length;
	}
	
	// Show amount of IR
	var elementsTmp_ScrollRssExcerpt = parseInt(srsse_numberOfElm) + 1;
	for (i_ScrollRssExcerpt = 0; i_ScrollRssExcerpt < elementsTmp_ScrollRssExcerpt; i_ScrollRssExcerpt++) {
		
		tmp_ScrollRssExcerpt += rssslider[w_ScrollRssExcerpt%rssslider.length];
		w_ScrollRssExcerpt++;
	}

	ObjScrollRssExcerpt.innerHTML 	= tmp_ScrollRssExcerpt;	
	ScrollRssExcerptNum 				= w_ScrollRssExcerpt;
	srsse_numScrolls 	= rssslider.length;
	ObjScrollRssExcerpt.scrollTop 	= '0';
	// start scrolling
	setTimeout("ScrollRssExcerptSlider();", 2000);
}