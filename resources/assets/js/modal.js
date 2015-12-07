$('.photo-modal-lg').on('show.bs.modal', function (event) {
	var image = $(event.relatedTarget),
		standardResolution = image.data('standard-resolution'),
		captionText = image.data('caption-text'),
		link = image.data('link'),
		modal = $(this);

	modal.find('img.standard-resolution').attr('src', standardResolution);
	modal.find('.caption-text').text(captionText + "<br />" + link);
})