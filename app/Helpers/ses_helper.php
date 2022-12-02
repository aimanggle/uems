<?php

//function get session user id
function userid()
{
    return session()->get('user_id');
}

//function get session username
function username()
{
    return session()->get('user_name');
}

//function get session user role
function userrole()
{
    return session()->get('user_role');
}

//function get session user email
function useremail()
{
    return session()->get('user_email');
}
