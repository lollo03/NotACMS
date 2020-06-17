 This is not a CMS, it is something else.
 NotACMS is a simple solution to allow web developers to add simple management solution to their website with ease. It doesn't need a database, it doesn't need any skill, just paste a simple line of code in your webpage.
 This project is based on bootstrap, PHP, and js.
# TODO
- [x] Add the ability to change the password via the admin interface
- [ ] Add the ability to manage galleries
- [ ] Write a proper documentation
- [ ] Add multi-language support, even if it is alredy possible (sort-off)
- [ ] Rewrite this thing... seriously, this thing is garbage, use just if you are lazy and you don't worry (too much) about security.
# Quickstart
Add this to the beginning of your file:
``` 
$strJsonFileContents = file_get_contents("admin/contents.json") or die("Fatal error, check contents.json! It must not be empty.");
$contents = json_decode($strJsonFileContents, true); 
```
And this when you want to add some text:
```
<?php echo $contents["body"]?>
```
of course, change the `body` to the name of the element you want to change. You can see your elements in the `contents.json` file.
Check the repo and it will become immediately clear!

Note: all your page must be `.php`, otherwise this shit won't work

The default login is admin:admin if you want to change the passowrd you can do it from the GUI.
