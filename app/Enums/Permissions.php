<?php

namespace App\Enums;

enum Permissions: string
{
    case LIST_ARTICLE = 'list_article';
    case SHOW_ARTICLE = 'show_article';
    case UPDATE_ARTICLE = 'update_article';
    //IMAGE
    case LIST_IMAGE = 'list_image';
    case SHOW_IMAGE = 'show_image';
    case UPDATE_IMAGE = 'update_image';
    case CREATE_IMAGE = 'create_image';
    case DELETE_IMAGE  = 'delete_image';
    //USER
    case CREATE_USER  = 'create_user';
    case UPDATE_USER  = 'update_user';
    case DELETE_USER  = 'delete_user';


}
