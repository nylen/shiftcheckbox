<!DOCTYPE html>
<html>
  <head>
    <script type="text/javascript" src="jquery.min.js"></script>
    <script type="text/javascript" src="jquery.shiftcheckbox.js"></script>
    <script type="text/javascript" src="//google-code-prettify.googlecode.com/svn/loader/run_prettify.js"></script>
    <script type="text/javascript">
      function setInfoText(text) {
        $('#demo1-link').text(text);
        if (console && console.log) console.log(text);
      }

      $(function() {
<?php echo file_get_contents('demo1.js'); ?>

<?php echo file_get_contents('demo2.js'); ?>

<?php echo file_get_contents('demo3.js'); ?>

<?php echo file_get_contents('block-clicks.js'); ?>

        $('.toggle-code').click(function() {
          var $pre = $(this).parent().next('pre');
          if ($pre.is(':visible')) {
            $pre.hide();
            $(this).text('show');
          } else {
            $pre.show();
            $(this).text('hide');
          }
          return false;
        });
      });
    </script>
    <style type="text/css">
      body {
        padding-bottom: 4em;
      }
      p {
        margin-bottom: 1em;
        max-width: 850px;
      }
      h2 {
        margin: 1em 0;
      }
      #demo1 .all, #demo2 .all {
        margin-bottom: .75em;
      }
      .all:hover, .checkbox:hover, div.row:hover {
        background: #eee;
      }
      code, pre {
        background: #eee;
        border: 1px solid #aaa !important;
      }
      code {
        padding: 1px 3px;
      }
      pre {
        max-width: 550px;
        padding: 6px !important;
        margin: 25px 15px;
      }
      label, span.label {
        padding: 0 8px;
        margin: 0 4px;
      }
      label {
        font-weight: bold;
      }
      label:hover {
        background: #999;
        color: white;
      }
      #demo1-link {
        font-style: italic;
        color: #999;
      }
    </style>
  </head>
  <body>
    <h1>ShiftCheckbox jQuery plugin</h1>
    <p>
      This jQuery plugin can perform the following checkbox-related functions:
      <ul>
        <li>
          Shift+click to select/deselect ranges of checkboxes, like in GMail
        </li>
        <li>
          Handling the events of one or more "Select all" checkboxes
        </li>
        <li>
          Passing clicks from a "row" element that contains a checkbox to the
          checkbox itself
        </li>
      </ul>
      A couple demos of the plugin's functionality are below.
    </p>

    <p>
      <a href="https://github.com/nylen/shiftcheckbox">
        Click here to browse the plugin source on GitHub.
      </a>
    </p>

    <p>
      <a href="jquery.shiftcheckbox.js">Click here to download the plugin.</a>
    </p>

    <h2>Demo 1 - All features in use</h2>
    <div class="demo" id="demo1">
      <p>
        Click (or Shift+click) on any part of a row to select the corresponding
        checkbox.  The rows are the <code>div.checkbox</code> elements, and the
        presence of the <code>checkboxSelector</code> option tells the plugin
        that it should handle click events on the rows and pass them to the
        checkboxes.
      </p>
      <p>
        Because the <code>ignoreClick</code> option is set,
        clicking on one of the links inside the rows will
        not toggle the associated checkboxes.
      </p>
      <p>
        Code (<a class="toggle-code" href="#">hide</a>):
        <pre class="prettyprint"><?php echo file_get_contents('demo1.js'); ?></pre>
        To disable the plugin:
        <pre class="prettyprint">$('#demo1 div.checkbox, #demo1 .all').off('.shiftcheckbox');</pre>
      </p>
      <p id="demo1-link">Nothing interesting has happened yet</p>
      <div class="all">
        <input type="checkbox" id="all-1" />
        <label for="all-1">Select all</label>
        <label for="none">This is another label</label>
      </div>
      <div class="checkbox">
        <input type="checkbox" id="cb-1-1" />
        <label for="cb-1-1">Demo 1 checkbox 1 label</label>
        <span>test - this is some other text</span>
      </div>
      <div class="checkbox">
        <input type="checkbox" id="cb-1-2" />
        <label for="cb-1-2">Demo 1 checkbox 2 label</label>
        <span>test - this is some other text</span>
      </div>
      <div class="checkbox">
        <input type="checkbox" id="cb-1-3" />
        <label for="cb-1-3">Demo 1 checkbox 3 label</label>
        <span>test - this is some other text</span>
      </div>
      <div class="checkbox">
        <input type="checkbox" id="cb-1-4" />
        <label for="cb-1-4">Demo 1 checkbox 4 label</label>
        <span>test - this is some other text</span>
      </div>
      <div class="checkbox">
        <input type="checkbox" id="cb-1-5" />
        <label for="cb-1-5">Demo 1 checkbox 5 label</label>
        <a href="#test-5">test - this is a link within a row</a>
      </div>
      <div class="checkbox">
        <input type="checkbox" id="cb-1-6" />
        <label for="cb-1-6">Demo 1 checkbox 6 label</label>
        <a href="#test-6">test - this is a link within a row</a>
      </div>
      <div class="checkbox">
        <input type="checkbox" id="cb-1-7" />
        <label for="cb-1-7">Demo 1 checkbox 7 label</label>
        <span>test - this is some other text</span>
      </div>
      <div class="checkbox">
        <input type="checkbox" id="cb-1-8" />
        <label for="cb-1-8">Demo 1 checkbox 8 label</label>
        <span>test - this is some other text</span>
      </div>
      <div class="checkbox">
        <input type="checkbox" id="cb-1-9" />
        <label for="cb-1-9">Demo 1 checkbox 9 label</label>
        <span>test - this is some other text</span>
      </div>
      <div class="checkbox">
        <input type="checkbox" id="cb-1-10" />
        <label for="cb-1-10">Demo 1 checkbox 10 label</label>
        <label for="null">Another label</label>
      </div>
      <div class="checkbox">
        <input type="checkbox" id="cb-1-11" />
        <label for="cb-1-11">Demo 1 checkbox 11 label</label>
        <label for="whatever">Another label</label>
      </div>
      <div class="checkbox">
        <input type="checkbox" id="cb-1-12" />
        <label for="cb-1-12">Demo 1 checkbox 12 label</label>
        <label for="null">Another label</label>
      </div>
    </div>

    <h2>Demo 2 - Basic functionality</h2>
    <div class="demo" id="demo2">
      <p>
        For this demo, only the checkboxes pick up the Shift+click events and
        not the labels attached to them.  For usability purposes, it is better
        to wrap both the label and the checkbox in a row element and specify
        the <code>checkboxSelector</code> option like the first demo does.
      </p>
      <p>
        Code:
        <pre class="prettyprint"><?php echo file_get_contents('demo2.js'); ?></pre>
        To disable the plugin:
        <pre class="prettyprint">$('#demo2 :checkbox').off('.shiftcheckbox');</pre>
      </p>
      <div>
        <input type="checkbox" id="cb-2-1" />
        <label for="cb-2-1">Demo 2 checkbox 1 label</label>
      </div>
      <div>
        <input type="checkbox" id="cb-2-2" />
        <label for="cb-2-2">Demo 2 checkbox 2 label</label>
      </div>
      <div>
        <input type="checkbox" id="cb-2-3" />
        <label for="cb-2-3">Demo 2 checkbox 3 label</label>
      </div>
      <div>
        <input type="checkbox" id="cb-2-4" />
        <span class="label">Demo 2 checkbox 4 text (not a label)</span>
      </div>
      <div>
        <input type="checkbox" id="cb-2-5" />
        <span class="label">Demo 2 checkbox 5 text (not a label)</span>
      </div>
      <div>
        <input type="checkbox" id="cb-2-6" />
        <label for="cb-2-6">Demo 2 checkbox 6 label</label>
      </div>
      <div>
        <input type="checkbox" id="cb-2-7" />
        <label for="cb-2-7">Demo 2 checkbox 7 label</label>
      </div>
      <div>
        <input type="checkbox" id="cb-2-8" />
        <label for="cb-2-8">Demo 2 checkbox 8 label</label>
      </div>
      <div>
        <input type="checkbox" id="cb-2-9" />
        <label for="cb-2-9">Demo 2 checkbox 9 label</label>
      </div>
    </div>

    <h2>Demo 3 - Special cases</h2>
    <div class="demo" id="demo3">
      <p>
        This demo tests a couple of special cases: labels that contain the
        checkboxes they point to (whether or not they are row elements) and
        select-all checkboxes and links inside and outside of row elements.
      </p>
      <p>
        Code:
        <pre class="prettyprint"><?php echo file_get_contents('demo3.js'); ?></pre>
        To disable the plugin:
        <pre class="prettyprint">$('#demo3 .row, #demo3 .all').off('.shiftcheckbox');</pre>
      </p>
      <input type="checkbox" class="all" />
      <a class="all block-click" href="#demo3-all1">Select all 1</a>
      <div class="row all">
        <input type="checkbox" />
        <a class="all block-click" href="#demo3-all2">Select all 2</a>
      </div>
      <div class="row">
        <input type="checkbox" class="all" />
        <a class="all block-click" href="#demo3-all3">Select all 3</a>
      </div>
      <div>
        <label class="row" for="cb-3-1">
          <input type="checkbox" id="cb-3-1" />
          Demo 3 checkbox 1 label
        </label>
      </div>
      <div>
        <label class="row" for="cb-3-2">
          <input type="checkbox" id="cb-3-2" />
          Demo 3 checkbox 2 label
        </label>
      </div>
      <div>
        <label class="row" for="cb-3-3">
          <input type="checkbox" id="cb-3-3" />
          Demo 3 checkbox 3 label
        </label>
      </div>
      <div class="row">
        <label for="cb-3-4">
          <input type="checkbox" id="cb-3-4" />
          Demo 3 checkbox 4 label
        </label>
      </div>
      <div class="row">
        <label for="cb-3-5">
          <input type="checkbox" id="cb-3-5" />
          Demo 3 checkbox 5 label
        </label>
      </div>
      <div class="row">
        <label for="cb-3-6">
          <input type="checkbox" id="cb-3-6" />
          Demo 3 checkbox 6 label
        </label>
      </div>
    </div>
  </body>
</html>
