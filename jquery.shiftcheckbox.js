(function($) {
  var ns = '.shiftcheckbox';

  $.fn.shiftcheckbox = function(opts) {
    opts = $.extend({
      checkboxSelector: null,
      selectAll: null
    }, opts);

    var $checkboxes;
    var $rows;

    if(opts.checkboxSelector) {
      // checkboxSelector means that the elements we need to attach handlers to
      // ($rows) are not actually checkboxes but contain them instead
      $rows = this.filter(function() {
        return !!$(this).find(opts.checkboxSelector).filter(':checkbox').length;
      });
      $checkboxes = $rows.map(function() {
        return $(this).find(opts.checkboxSelector).filter(':checkbox')[0];
      });
      for(var i = 0; i < $checkboxes.length; i++) {
        $rows.eq(i).data('childCheckbox', $checkboxes.eq(i));
      }
    } else {
      $checkboxes = this.filter(':checkbox');
    }

    if(!$checkboxes.length) {
      return;
    }

    if(opts.selectAll) {
      // We need to set up a "select all" control
      opts.$selectAll = $(opts.selectAll);
      if(opts.$selectAll && !opts.$selectAll.length) {
        opts.$selectAll = false;
      }
    }
    if(opts.$selectAll) {
      opts.$selectAllCheckbox = opts.$selectAll
        .filter(':checkbox')
        .add(opts.$selectAll.find(':checkbox'));

      if(opts.$selectAllCheckbox && !opts.$selectAllCheckbox.length) {
        opts.$selectAllCheckbox = false;
      }
      opts.$selectAll.bind('click' + ns, function(e) {
        var checked;
        if(opts.$selectAllCheckbox) {
          // Toggle the select all checkbox unless the user clicked on the
          // checkbox itself or a label that points to it
          var labelFor = $(e.target).closest('label').attr('for');
          if(!labelFor || !opts.$selectAllCheckbox.filter('#' + labelFor).length) {
            $(opts.$selectAllCheckbox).not(e.target).attr('checked', function() {
              return !opts.$selectAllCheckbox.attr('checked');
            });
          }
          checked = !!opts.$selectAllCheckbox.attr('checked');
        } else {
          checked = !$checkboxes.eq(0).attr('checked');
        }
        $checkboxes.attr('checked', checked);
      });
    }
    if(opts.$selectAllCheckbox) {
      opts.$selectAllCheckbox.attr('checked', !$checkboxes.not(':checked').length);
    }

    var lastIndex = -1;

    var checkboxClicked = function(e) {
      var curIndex = $checkboxes.index(this);
      var checked = !!$(this).attr('checked');

      if(e.shiftKey && lastIndex != -1) {
        var di = (curIndex > lastIndex ? 1 : -1);
        for(var i = lastIndex; i != curIndex; i += di) {
          $checkboxes.eq(i).attr('checked', checked);
        }
      }

      if(opts.$selectAll && opts.$selectAllCheckbox) {
        if(checked && !$checkboxes.not(':checked').length) {
          opts.$selectAllCheckbox.attr('checked', true);
        } else if(!checked) {
          opts.$selectAllCheckbox.attr('checked', false);
        }
      }

      lastIndex = curIndex;
    };

    if(opts.checkboxSelector) {
      $rows.bind('click' + ns, function(e) {
        var $checkbox = $(this).data('childCheckbox');
        $checkbox.not(e.target).attr('checked', function() {
          return !$checkbox.attr('checked');
        });

        $checkbox[0].focus();
        checkboxClicked.call($checkbox, e);

        // If the user clicked on a label inside the row that points to the
        // current row's checkbox, cancel the event (but putting labels inside
        // rows would be a kind of screwy thing to do anyway, unless it was for
        // progressive enhancement).
        var labelFor = $(e.target).closest('label').attr('for');
        if(labelFor && labelFor == $checkbox.attr('id')) {
          return false;
        }
      }).bind('mousedown' + ns, function(e) {
        if(e.shiftKey) {
          // Prevent selecting text by Shift+click
          return false;
        }
      });
    } else {
      $checkboxes.bind('click' + ns, checkboxClicked);
    }

    return this;
  };
})(jQuery);
