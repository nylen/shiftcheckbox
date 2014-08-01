$('.demo a.block-clicks').click(function() {

    setInfoText('Clicked link: ' + $(this).attr('href')
        + ' at ' + new Date());

    return false;
});
