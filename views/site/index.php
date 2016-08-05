<?php

/* @var $this yii\web\View */

$this->title = 'My Yii Application';
?>
<div class="site-index">

    <pre>
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
            responses:
                200:
                    description: comment added
                422:
                    description: validation error
                404:
                    description: bookmark not found
    /bookmark/latest:
        GET:
            summary: Get latest bookmarks
            responses:
                200:
                    description: list of bookmarks
    /bookmark/get/{uid}
        GET:
            summary: Get bookmark with comments by uid
            parameters:
                - name: uid
                  in: path
                  description: bookmark uid
                  required: true
                  type: int
            responses:
                200:
                    description: successfully get bookmark
                404:
                    description: bookmark not found
    /comment/update/{uid}
        POST:
            summary: Update comment by comment uid
            parameters:
                - name: uid
                  in: path
                  description: comment uid
                  required: true
                  type: int
                - name: text
                  in: formData
                  required: true
                  type: string
            responses:
                200:
                    description: comment updated
                422:
                    description: validation error
                404:
                    description: bookmark not found
    /comment/delete/{uid}
            GET:
                summary: Delete comment by comment uid
                parameters:
                    - name: uid
                      in: path
                      description: comment uid
                      required: true
                      type: int
                responses:
                    204:
                        description: comment deleted
                    422:
                        description: validation error
                    404:
                        description: bookmark not found




    </pre>
</div>
