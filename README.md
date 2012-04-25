# ExpressionEngine Markdown Fieldtype.

*Note:* This field is in early development, but currently highly functional. Community support welcome and **will be given credit**.

This is a Markdown custom field for ExpressionEngine. It updates as you type to display the rendered Markdown, giving you instant feedback on your output.

![Markdown Field](https://github.com/fideloper/fid.field_markdown.ee_addon/raw/master/markdown.png)

### Features:

1. Comes with a default styesheet for the Markdown preview pane.
2. Users can change the default stylesheet to a custom CSS file.
3. Users can select a stylesheet per custom field - Make the markdown output look and feel just like the front-end!
4. Matrix compatible!

### Usage:

1. Install into themes/third_party and expressionengine/third_party as usual
2. Install Module and Fieldtype from Add-Ons area in Admin
3. Use Markdown fieldtype, either alone or within Matrix
4. Module tag: {exp:markdown:toHTML}content{/exp:markdown:toHTML}

**Example Usage:**

	{exp:markdown:toHTML}
	### This is an h3 tag

	1. This is
	2. A numbered list
	3. Of fun and excitement!

	And this will show as a paragraph
	{/exp:markdown:toHTML}

### To Do:
1. Get rid of AJAX, replace with client-side Markdown parser. Suggestions *very* welcome.


### Change Log

**1.2**

* Added support for module template tag:{exp:markdown:toHTML}Markdown Content Here{/exp:markdown:toHTML}
* This applies to To Do item: "2. Since there is already a module portion, add template tags to convert any Markdown string to HTML {exp:markdown:toHTML}content{/exp:markdown:toHTML}"

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