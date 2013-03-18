Deployment Instructions
===============

- Remember to commit any changes / push to remotes.

- There is only the `master` branch

- A production version of index.php will automatically be copied into the build dir, from /deploy/files

- The .htaccess file is same (and gets used) for both dev and prod

Deploy using Phing.

    cd /path/to/code/repo
    phing deploy

You'll then be prompted to choose which server to deploy to. There is no staging server, only production.
