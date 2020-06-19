 This is not a CMS, it is something else.
 NotACMS is a ~~garbage~~ simple solution to allow web developers to add simple management solution to their website with ease. It doesn't need a database, it doesn't need any skill, just paste a simple line of code in your webpage.
 This project is based on bootstrap, PHP, and js.
# TODO
- [x] Add the ability to change the password via the admin interface
- [X] Add the ability to manage images
- [ ] Add the ability to differece the webiste pages in the admin page
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
<?php echo $contents["body"]["text"]?>
```
of course, change the `body` to the name of the element you want to change. You can see your elements in the `contents.json` file.
Check the repo and it will become immediately clear!

Note: all your page must be `.php`, otherwise this shit won't work

The default login is admin:admin if you want to change the passowrd you can do it from the GUI.

# Images
Add this to the beginning of your file:
``` 
$strJsonFileContents = file_get_contents("admin/images.json") or die("Fatal error, check images.json! It must not be empty.");
$images = json_decode($strJsonFileContents, true); 
```
And this when you want to add some images:
```
<img src="<?php echo $images["test_image"]?>" alt="...">
```
of course, change the `test_images` to the name of the element you want to change. You can see your elements in the `images.json` file.
Check the repo and it will become immediately clear!

# The contents.json file
```
{
    "intro": {
        "text": "Welcome to <strong>NotACMS<\/strong> the simple way to manage your custom-built site with ease.",
        "show_name": "intro",
        "note": "Intro text on the index.html page"
    },
    "body": {
        "text": "Go check the documentation or log-in to the admin page to begin!",
        "show_name": "body",
        "note": "Body of the index.html page"
    },
    "title": {
        "text": "NotACMS",
        "show_name": "title",
        "note": "Title of the index page"
    }
}
```
As you can see NotACMS offer the possibility  to give a note to each part of the website, and it can also display a different name for the customer.
Example:
```
{
    "long_shitty_name_with_underscores": {
        "text": "The actual text you want to inser in the webpage",
        "show_name": "Cool name without underscores",
        "note": "Cool note to ease the customer life"
    }
}
```

# The db.json file

In this file are stored the credentials and all the customization settings. Please **hidden this file** if you use apache the file is alredy hidden. The file is alredy very self-explanatory.

```
{
    "credentials": {
        "username": "admin",
        "password": "$1$X6KyoCjV$.zquA5gdA\/7T5oxi82eOk0"
    },
    "customization": {
        "admin_title": "Admin_title",
        "description": "Customize this text in db.json",
        "home": "Home",
        "images": "Images",
        "change_password": "Change password",
        "logout": "Logout",
        "save": "save",
        "select_image_text": "Select the image to upload:",
        "select_image_btn": "Upload Image!",
        "image_not_found": "File not found. Please upload it.",
        "show_image": "Show image.",
        "delete": "Delete",
        "delete_btn": "Delete selected"
    }
}
```
