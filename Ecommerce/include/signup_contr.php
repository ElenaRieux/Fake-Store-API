<?php

declare(strict_types=1);

function is_input_empty(string $username, string $email, string $password)
{
    if (empty($username) || empty($email) || empty($password)) {
        return true;
    } else {
        return false;
    }
}

function is_email_invalid(string $email)
{
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        return true;
    } else {
        return false;
    }
}

function is_email_taken(object $connessioneDB, string $email)
{
    if (get_username($connessioneDB, $email)) {
        return true;
    } else {
        return false;
    }
}

function create_user(object $connessioneDB, string $username, string $email, string $password)
{
    set_user($connessioneDB,  $username,  $email, $password);
}
