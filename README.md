 This is not a CMS, it is something else.
 NotACMS is a ~~garbage~~ simple solution to allow web developers to add simple management solution to their website with ease. It doesn't need a database, it doesn't need any skill, just paste a simple line of code in your webpage.
 This project is based on bootstrap, PHP, and js.
# TODO
- [x] Add the ability to change the password via the admin interface
- [X] Add the ability to manage images
- [X] Add the ability to difference the webiste pages in the admin page
- [ ] Add the ability to manage galleries
- [ ] Write a proper documentation
- [X] Add multi-language support, even if it is alredy possible (you can do it with pages)
- [ ] Rewrite this thing... seriously, this thing is garbage, use just if you are lazy and you don't worry (too much) about security.
# Quickstart
Add this to the beginning of your file (replace "index" with the name of the page you choose in the contents.json file) :
``` 
<?php
require __DIR__ . '/admin/import.php';
setPage("index");
?>
```
And this when you want to add some text:
```
<?php getContent("body", $page); ?>
```
of course, change the `body` to the name of the element you want to change. You can see your elements in the `contents.json` file.
Check the repo and it will become immediately clear!

Note: all your page must be `.php`, otherwise this shit won't work

The default login is admin:admin if you want to change the passowrd you can do it from the GUI.

# Images
Add this to the beginning of your file (if you didin't add it before):
``` 
<?php
require __DIR__ . '/admin/import.php';
setPage("index");
?>
```
And this when you want to add some images:
```
<img src="<?php getImage("test_image") ?>" alt="...">
```
of course, change the `test_images` to the name of the element you want to change. You can see your elements in the `images.json` file.
Check the repo and it will become immediately clear!

# The contents.json file
```
{
    "index": {
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
    },
    "other_page": {
        "example": {
            "text": "This text belong to another page",
            "show_name": "example",
            "note": "An example"
        }
    }
}
```
As you can see NotACMS offer the possibility  to give a note to each part of the website, and it can also display a different name for the customer. It can also difference the varius website pages.
Example:
```
{
    "my-index-page": {
        "long_shitty_name_with_underscores": {
            "text": "The actual text you want to inser in the webpage",
            "show_name": "Cool name without underscores",
            "note": "Cool note to ease the customer life"
        }
    }
}
```

# The db.json file

In this file are stored the credentials and all the customization settings. Please **hide this file** if you use apache the file is alredy hidden. The file is alredy very self-explanatory.

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
