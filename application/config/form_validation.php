<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$config = array(
    'contact_us' => array(
        array(
            'field' => 'info',
            'label' => 'Full Name',
            'rules' => 'required'
        ),
        array(
            'field' => 'email',
            'label' => 'Email',
            'rules' => 'required|valid_email'
        )
    ),
    'login' => array(
        array(
            'field' => 'email',
            'label' => 'Email',
            'rules' => 'required|valid_email'
        ),
        array(
            'field' => 'password',
            'label' => 'Password',
            'rules' => 'required'
        )
    ),
    'register' => array(
        array(
            'field' => 'email',
            'label' => 'Email',
            'rules' => 'required|valid_email|is_unique[user.email]|trim'
        ),
        array(
            'field' => 'password',
            'label' => 'Password',
            'rules' => 'required|min_length[8]'
        ),
        array(
            'field' => 'info',
            'label' => 'Name',
            'rules' => 'required'
        ),
        array(
            'field' => 'terms',
            'label' => 'terms',
            'rules' => 'required'
        )
    ),
    'forget_password' => array(
        array(
            'field' => 'email',
            'label' => 'Email',
            'rules' => 'required|valid_email'
        )
    ),
    'enquire'=>array(
        array(
            'field' => 'info',
            'label' => 'Full Name',
            'rules' => 'required'
        ),
        array(
            'field' => 'email',
            'label' => 'Email',
            'rules' => 'required|valid_email'
        )
    ),
    'search'=>array(
        array(
            'field' => 'search',
            'label' => 'Search Data',
            'rules' => 'required'
        )
    ),
    'find'=>array(
        array(
            'field' => 'City',
            'label' => 'City',
            'rules' => 'required'
        ),
        array(
            'field' => 'Type',
            'label' => 'Type',
            'rules' => 'required'
        ),
        array(
            'field' => 'budget',
            'label' => 'Budget',
            'rules' => 'required'
        ),
        array(
            'field' => 'min_price',
            'label' => 'min price',
            'rules' => 'required'
        ),
        array(
            'field' => 'max_price',
            'label' => 'max price',
            'rules' => 'required'
        ),
        array(
            'field' => 'bedroom',
            'label' => 'bedroom',
            'rules' => 'required'
        )
    ),
    'admin_change_password' => array(
        array(
            'field' => 'OldPassword',
            'label' => 'OldPassword',
            'rules' => 'required'
        ),
        array(
            'label' => 'NewPassword',
            'field' => 'NewPassword',
            'rules' => 'required'
        ),
        array(
            'field' => 'ConfirmPassword',
            'label' => 'ConfirmPassword',
            'rules' => 'required|matches[NewPassword]'
        )
    ),
    'admin_login' => array(
        array(
            'field' => 'username',
            'label' => 'username',
            'rules' => 'required'
        ),
        array(
            'field' => 'password',
            'label' => 'password',
            'rules' => 'required'
        )
    ),
    'reserve' => array(
        array(
            'field' => 'property_refID',
            'label' => 'property refID',
            'rules' => 'required'
        ),
        array(
            'field' => 'property_title',
            'label' => 'property title',
            'rules' => 'required'
        ),
        array(
            'field' => 'user-mail',
            'label' => 'user mail',
            'rules' => 'required|valid_email'
        ),
        array(
            'field' => 'full-name',
            'label' => 'full name',
            'rules' => 'required'
        ),
        array(
            'field' => 'property_url',
            'label' => 'property url',
            'rules' => 'required'
        )
    ),
    'signup' => array(
        array(
            'field' => 'email',
            'label' => 'Email',
            'rules' => 'required|valid_email|trim'
        ),
        array(
            'field' => 'info',
            'label' => 'Name',
            'rules' => 'required'
        ),
        array(
            'field' => 'terms',
            'label' => 'terms',
            'rules' => 'required'
        )
    ),
    'signup_verification' => array(
        array(
            'field' => 'user_email',
            'label' => 'Email',
            'rules' => 'required|valid_email|trim'
        ),
        array(
            'field' => 'vf_code',
            'label' => 'verification code',
            'rules' => 'required'
        )
    ),
    'reset_password' => array(
        array(
            'field' => 'password',
            'label' => 'password',
            'rules' => 'required|min_length[8]'
        ),
        array(
            'field' => 'renter',
            'label' => 'renter_password',
            'rules' => 'required|matches[password]'
        ),
        array(
            'field' => 'hashCode',
            'label' => 'none',
            'rules' => 'required'
        )
    ),
    'user_adding_property' => array(
        array(
            'field' => 'location',
            'label' => 'location',
            'rules' => 'required'
        ),
        array(
            'field' => 'kind',
            'label' => 'kind',
            'rules' => 'required'
        ),
        array(
            'field' => 'bedroom',
            'label' => 'bedroom',
            'rules' => 'required'
        ),
        array(
            'field' => 'bathroom',
            'label' => 'bathroom',
            'rules' => 'required'
        ),
        array(
            'field' => 'living_space',
            'label' => 'living_space',
            'rules' => 'required'
        ),
        array(
            'field' => 'title',
            'label' => 'title',
            'rules' => 'required|is_unique[resale.title]|trim'
        ),
        array(
            'field' => 'price',
            'label' => 'price',
            'rules' => 'required'
        )
    ),
    'comment' => array(
        array(
            'field' => 'kind',
            'label' => 'kind',
            'rules' => 'required'
        ),
        array(
            'field' => 'info',
            'label' => 'info',
            'rules' => 'required'
        ),
        array(
            'field' => 'content',
            'label' => 'content',
            'rules' => 'required'
        ),
        array(
            'field' => 'reference_id',
            'label' => 'reference_id',
            'rules' => 'required'
        )
    ),
    'Career' => array(
        array(
            'field' => 'email',
            'label' => 'email',
            'rules' => 'required'
        ),
        array(
            'field' => 'info',
            'label' => 'info',
            'rules' => 'required'
        )
    ),
);