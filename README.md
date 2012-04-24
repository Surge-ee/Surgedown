# ExpressionEngine Markdown Fieldtype.

*Note:* This field is in early development, but currently highly functional. Community support welcome and **will be given credit**.

This is a Markdown custom field for ExpressionEngine. It updates as you type to display the rendered Markdown, giving you instant feedback on your output.

![Markdown Field](https://github.com/fideloper/fid.field_markdown.ee_addon/raw/master/markdown.png)

### Features:

1. Comes with a default styesheet for the Markdown preview pane.
2. Users can change the default stylesheet to a custom CSS file.
3. Users can select a stylesheet per custom field - Make the markdown output look and feel just like the front-end!
4. Matrix compatible!

### To Do:
1. Get rid of AJAX, replace with client-side Markdown parser. Suggestions *very* welcome.
2. Since there is already a module portion, add template tags to convert any Markdown string to HTML {exp:markdown:toHTML}content{/exp:markdown:toHTML}


### Change Log

**1.1**

* Global css config abstracted to config.php - The CONST can be overridden anywhere in EE if its loaded before the fieldtype
* Improved / debugged config - Used require_once() over require() and checked that if(defined())
* Fixed bug where new entries had no entry_id (duh)
* **Thanks** to Curtis (@_cpb) for bug hunting / feature requests
* **Thanks** to Rob (@_rsan) for feedback

**1.0**

* Fixed stupidly hard-coded variables.
* Added Matrix support.
* Refactored Javascript.
* Improved/Debugged AJAX calls to preview iFrame
* **Thanks** to Pixel and Tonic (@pixelandtonic) for quick dev help!

**0.5**
Initial Release. Somewhat broken. Well, very broken.

### Credits
Idea for fieldtype and default CSS for Markdown provided by [Mou](http://mouapp.com/ "The missing Markdown editor").