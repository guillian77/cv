jQuery('.twitter-block').delegate('#twitter-widget-0','DOMSubtreeModified propertychange', function() {

	hideTweetMedia();

});
var hideTweetMedia = function() {

	jQuery('.twitter-block').find('.twitter-timeline').contents().find('.timeline-Tweet-media').css('display', 'none');

	jQuery('.twitter-block').css('height', '100%');

	jQuery('.twitter-block').find('.twitter-timeline').contents().find('.timeline-TweetList').bind('DOMSubtreeModified propertychange', function() {

		hideTweetMedia(this);

	});

}