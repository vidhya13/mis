<?php 
include('../config.php');
include('../common/header.php'); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<!-- OPT live programming prototype started on 2016-05-30 -->

<!--

Online Python Tutor
https://github.com/pgbovine/OnlinePythonTutor/

Copyright (C) Philip J. Guo (philip@pgbovine.net)

Permission is hereby granted, free of charge, to any person obtaining a
copy of this software and associated documentation files (the
"Software"), to deal in the Software without restriction, including
without limitation the rights to use, copy, modify, merge, publish,
distribute, sublicense, and/or sell copies of the Software, and to
permit persons to whom the Software is furnished to do so, subject to
the following conditions:

The above copyright notice and this permission notice shall be included
in all copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS
OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF
MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT.
IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY
CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER IN AN ACTION OF CONTRACT,
TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN CONNECTION WITH THE
SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.

 -->

<head>
  <title>Live Programming Mode - Python Tutor - Visualize Python and JavaScript code</title>
  <meta http-equiv="Content-type" content="text/html; charset=UTF-8"/>

<!-- requirements for pytutor.js -->
<script type="text/javascript" src="js/d3.v2.min.js"></script>
<script type="text/javascript" src="js/jquery-1.8.2.min.js"></script>
<script type="text/javascript" src="js/jquery.ba-bbq.min.js"></script> <!-- for handling back button and URL hashes -->
<script type="text/javascript" src="js/jquery.ba-dotimeout.min.js"></script> <!-- for event debouncing -->
<script type="text/javascript" src="js/jquery.jsPlumb-1.3.10-all-min.js "></script> <!-- for rendering SVG connectors
                                                                                         DO NOT UPGRADE ABOVE 1.3.10 OR ELSE BREAKAGE WILL OCCUR -->
<script type="text/javascript" src="js/diff_match_patch.js"></script>

<script type="text/javascript" src="js/jquery-ui-1.11.4/jquery-ui.min.js"></script> <!-- for sliders and other UI elements -->
<link type="text/css" href="js/jquery-ui-1.11.4/jquery-ui.css" rel="stylesheet" />

<script type="text/javascript" src="js/pytutor.js"></script>
<link rel="stylesheet" href="css/pytutor.css"/>

<script type="text/javascript" src="js/ace/src-min-noconflict/ace.js" charset="utf-8"></script>
<script type="text/javascript" src="js/opt-frontend-common.js"></script>
<script type="text/javascript" src="js/opt-live.js"></script>
<link rel="stylesheet" href="css/opt-frontend.css"/>
<link rel="stylesheet" href="css/opt-live.css"/>

<!-- insert google-analytics.txt contents here -->

</head>

<body>

  <div id="liveModeHeader">

  This is the <b>live programming mode</b> of Python Tutor, which
  continually runs and visualizes your code as you type. It is highly
  <b>experimental</b> and does not yet support all of the languages and
  features of the <a href="visualize.html" target="_blank">regular
  Python Tutor visualizer</a>.

  <p>Help us improve this live programming mode by filling out this <a
  target="_blank"
  href="https://docs.google.com/forms/d/1XT-rPaWxDRNOPAfBxIqzCXs7nYGUgOjNofmUnuQZYV8/viewform">two-question
  survey</a>.</p>

  </div>

  <table>
    <tr>
      <td valign="top">
        <div id="pyInputPane">
          <div id="codeInputWarnings">Write code in
            <select id="pythonVersionSelector">
              <option value="2">Python 2.7</option>
              <option value="3">Python 3.3</option>
              <option value="js">JavaScript ES6</option>
            </select>

            <span style="color: #888; font-size: 8pt; float: right;">(drag lower right corner to resize code editor)</span>
          </div>

          <div id="codeInputPane"></div>
          <div id="legendDiv"></div>
          <div id="executionSlider" style="margin-top: 10px;"></div>

          <!-- copied and pasted from pytutor.js
               TODO: integrate all this together and modularize -->

          <div id="vcrControls" style="display: none;">
            <button id="jmpFirstInstr", type="button">&lt;&lt; First</button>
            <button id="jmpStepBack", type="button">&lt; Back</button>
            <span id="curInstr"></span>
            <button id="jmpStepFwd", type="button">Forward &gt;</button>
            <button id="jmpLastInstr", type="button">Last &gt;&gt;</button>
          </div>

          <div id="rawUserInputDiv" style="display: none;">
            <span id="userInputPromptStr"></span>
            <input type="text" id="raw_input_textbox" size="30"/>
            <button id="raw_input_submit_btn">Submit</button>
          </div>

          <div id="frontendErrorOutput"></div>
        </div>
      </td>
      <td valign="top">
        <div id="pyOutputPane"/>
      </td>
    </tr>
  </table>

<div id="footer">

<p style="color: black; font-size: 10pt; margin-top: 10px; margin-bottom: 15px; line-height: 175%;">
<span>Support our research and keep this tool free by <a href="https://docs.google.com/forms/d/1-aKilu0PECHZVRSIXHv8vJpEuKUO9uG3MrH864uX56U/viewform" target="_blank">filling out this user survey</a>.</span>
<br>
<span style="font-size: 9pt;">If you are <b>at least 60 years old</b>, please also fill out <a href="https://docs.google.com/forms/d/1lrXsE04ghfX9wNzTVwm1Wc6gQ5I-B4uw91ACrbDhJs8/viewform" target="_blank">our survey about learning programming</a>.</span>
</p>

<p>Visualizer options:</p>

<div id="optionsPane" style="margin-top: 10px; padding-bottom: 15px; line-height: 150%;">
  <select id="cumulativeModeSelector">
    <option value="false">hide exited frames [default]</option>
    <option value="true">show exited frames (Python)</option>
    <!-- <option value="holistic">holistic mode (experimental)</option> -->
  </select>
  <select id="heapPrimitivesSelector">
    <option value="false">inline primitives &amp; nested objects [default]</option>
    <option value="true">render all objects on the heap (Python)</option>
  </select>
  <select id="textualMemoryLabelsSelector">
    <option value="false">draw pointers as arrows [default]</option>
    <option value="true">use text labels for pointers</option>
  </select>
</div>

<p>
  <button id="genUrlBtn" class="smallBtn" type="button">Generate permanent link</button> <input type="text" id="urlOutput" size="70"/>
</p>

<p>Click the button above to create a permanent link to your
visualization. To report a bug, paste the link along with a brief error
description in an email addressed to philip@pgbovine.net</p>

<p style="margin-top: 35px;">
This live programming mode of
<a href="http://pythontutor.com/">Python Tutor</a> (<a href="https://github.com/pgbovine/OnlinePythonTutor">code on GitHub</a>) supports three
languages: Python <a href="http://www.python.org/doc/2.7/">2.7</a> and <a
href="http://www.python.org/doc/3.3.0/">3.3</a> with limited module
imports and no file I/O, and
JavaScript running in Node.js v6.0.0 with limited support for ES6.

Try the regular
<a href="http://pythontutor.com/visualize.html">Python Tutor</a>
visualizer for additional language support.</p>

<p style="margin-top: 30px;">Privacy Policy: By using Online Python
Tutor, your visualized code, options, user interactions, text chats, and
IP address are logged on our server and may be analyzed for research
purposes. Nearly all Web services collect this basic information from
users. However, the Online Python Tutor website (pythontutor.com) does
not collect any personal information or session state from users, nor
does it issue any cookies.</p>

<p style="margin-top: 25px;">
Copyright &copy; <a href="http://www.pgbovine.net/">Philip Guo</a>.  All rights reserved.
</p>

</div>

</body>
</html>
