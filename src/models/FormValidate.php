<?php

namespace OnlineStoreApp\Models;

class FormValidate
{

    public static function createProductValidate($p_name, $p_price, $p_category, $p_description)
    {
        
        $errors = [];

        if ($p_name == ''){
            $errors[] = 'Product name field must not be empty';
        }
        if ($p_price == ''){
            $errors[] = 'Product price field must not be empty';
        }
        if ($p_category == ''){
            $errors[] = 'Category field must not be empty';
        }
        if ($p_description == ''){
            $errors[] = 'Product description field must not be empty';
        }
    

        return $errors;
    }

    

    public static function createCheckoutValidate($name, $number, $email, $method, $street, $city, $state, $country)
    {
        
        $errors = [];

        if ($name == ''){
            $errors[] = 'The name field must not be empty';
        }
        if ($number == ''){
            $errors[] = 'The phone number field must not be empty';
        }
        if ($email == ''){
            $errors[] = 'The email field must not be empty';
        }
        if ($method == ''){
            $errors[] = 'The payment method field must not be empty';
        }
        if ($street == ''){
            $errors[] = 'The street name field must not be empty';
        }
        if ($city == ''){
            $errors[] = 'The city field must not be empty';
        }
        if ($state == ''){
            $errors[] = 'The state field must not be empty';
        }
        if ($country == ''){
            $errors[] = 'The country field must not be empty';
        }
    
        return $errors;
    }




    public static function signupValidate($full_name, $username, $email, $user_password, $confirm_password)
    {
        $errors = [];

        if ($full_name == ''){
            $errors[] = 'Full name field must not be empty';
        }
        if (strlen($full_name) < 3){
            $errors[] = 'Name cannot be less than 3 characters';
        }
        if (strlen($full_name) > 50){
            $errors[] = 'Name cannot be greater than 30 characters';
        }
       
        if ($username == ''){
            $errors[] = 'Username field must not be empty';
        }
        if (strlen($username) < 3){
            $errors[] = 'Username cannot be less than 3 characters';
        }
        if (strlen($username) > 15){
            $errors[] = 'Userame cannot be greater than 30 characters';
        }

        if ($email == ''){
            $errors[] = 'Email field must not be empty';
        }

        if ($user_password == ''){
            $errors[] = 'User password field must not be empty';
        }
        if ($confirm_password == ''){
            $errors[] = 'Confirm password field must not be empty';
        }
        if (strlen($user_password) < 5 && strlen($confirm_password) < 5){
            $errors[] = "Password cannot  be less than 5 characters";
        }
        if (strlen($user_password) > 30 && strlen($confirm_password) > 30){
            $errors[] = "Password cannot  be more than 30 characters";
        }

        //passwords equality validation
        if ($user_password != $confirm_password){
            $errors[] = 'Your password input fields does not match';
        }

        return $errors;
    }




    public static function signinValidate($username, $user_password)
    {
        $errors = [];

        if ($username == ''){
            $errors[] = 'Username field must not be empty';
        }
        if ($user_password == ''){
            $errors[] = 'Password field must not be empty';
        }

        return $errors;

    }

}