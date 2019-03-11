# Setup

For Linux, refer to [this page](https://github.com/fluechtlingshilfe-babelsberg/forum).

### Windows
- Install [Xampp](https://www.apachefriends.org/index.html).
- Install the [GitHub](https://desktop.github.com/) client (optional, if you already have a git client)
- Clone the project in the GitHub client to `C:\xampp\htdocs\`, so that you get a folder `C:\xampp\htdocs\portal`.
- Download [Wordpress](https://wordpress.org) and extract the archive to `C:\xampp\htdocs\portal`, so that you get all the wordpress files and keep the `wp-content/themes/flueba-portal` folder from the git repository.
- Start Xampp.
- Go to [localhost/phpmyadmin/]() and click `New` in the sidebar. Name the database portal and choose `utf8_general_ci` als encoding.
- Go to [localhost/portal](). For the database, enter `portal` for the name, `root` as the user, and an empty password. Then follow the remaining installation prompts.
- Once installed, login to the Wordpress admin, go to Plugins and install `Advanced Custom Fields`.
- Lastly, go to Appearance > Themes and choose the `flueba-portal` theme.
