Bookmarks api
====================
Install steps:

* composer install
* create database (collation utf8_general_ci)
* edit config file `config/db.php`
* run migrations: `php yii migrate/up`
* use api


API Documentation
=====================
Add bookmark

paths:

    /bookmark/add:
        POST:
            summary: Create bookmark
            parameters:
                - name: url
                  in: formData
                  description: bookmark url
                  required: true
                  type: string
            responses:
                200:
                    description: bookmark created
                422:
                    description: validation error

    /comment/add/{uid}:
        POST:
            summary: Add comment
            parameters:
                - name: uid
                  in: path
                  description: bookmark uid
                  required: true
                  type: int
                - name: text
                  in: formData
                  required: true
                  type: string

