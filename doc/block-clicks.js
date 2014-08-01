$('.demo a:not(.toggle-code)').click(function() {

    setInfoText('Clicked link: ' + $(this).attr('href')
        + ' at ' + new Date());

    if ($(this).hasClass('block-click')) {
        return false;
    }
});
