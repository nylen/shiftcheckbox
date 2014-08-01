$('#demo1 div.checkbox').shiftcheckbox({

    // Options accept selectors, jQuery objects, or DOM
    // elements.

    checkboxSelector : ':checkbox',
    selectAll        : $('#demo1 .all'),
    ignoreClick      : 'a',

    // The onChange function will be called whenever the
    // plugin changes the state of a checkbox.

    onChange : function(checked) {
        setInfoText(
            'Changed checkbox ' + $(this).attr('id')
            + ' to ' + checked + ' programmatically');
    }

});

// If you also want to handle the user clicking on a
// checkbox, use the jQuery .change() event.
$('#demo1 :checkbox').change(function() {
    setInfoText(
        'Clicked checkbox ' + $(this).attr('id')
        + ', checked=' + this.checked);
});
