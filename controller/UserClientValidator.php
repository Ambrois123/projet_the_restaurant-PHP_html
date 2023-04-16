<?php 

class UserClientValidator 
{
    private $data;
    private $errors = [];
    private static $fields = ['username', 'email', 'phone', 'password', 'role'];

    public function __construct($postData)
    {
        $this->data = $postData;
    }

    public function validateForm()
    {
        foreach(self::$fields as $field)
        {
            if(!array_key_exists($field, $this->data))
            {
                trigger_error("$field is not present in data");
                return;
            }
        }
        $this->validateUsername();
        $this->validateEmail();
        $this->validatePhone();
        $this->validatePassword();
        $this->validateRole();
        return $this->errors;
    }

    public function validateUsername()
    {
        $val = trim($this->data['username']);
        if(empty($val))
        {
            $this->addError('username', 'Veuillez saisir votre nom');
        } else {
            if(!preg_match("/^[a-zA-Z ]{6,12}$/", $val))
            {
                $this->addError('username', 'Utilisateur doit contenir max 12 caractères et min 6 caractères');
            }
        }
    }

    public function validateEmail()
    {
        $val = trim($this->data['email']);
        if(empty($val))
        {
            $this->addError('email', 'Veuillez saisir votre email');
        } else {
            if(!filter_var($val, FILTER_VALIDATE_EMAIL))
            {
                $this->addError('email', 'Veuillez saisir un email valide');
            }
        }
    }

    public function validatePhone()
    {
        $val = trim($this->data['phone']);

        if(empty($val))
        {
            $this->addError('phone', 'Veuillez saisir votre numéro de téléphone');
        }else {
            if (!preg_match('/^[0-9]{10}+$/', $val))
            {
                $this->addError('phone', 'Veuillez saisir un numéro de téléphone valide');
            }
        }
    }

    public function validatePassword()
    {
        $val = trim($this->data['password']);

    if (empty($val)) {
        $this->addError('password', 'Veuillez saisir votre mot de passe');
    }else{
        $pwd_pattern = '#.*^(?=.{8,20})(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9]).*$#';
        if (!preg_match($pwd_pattern,$val)) {
            $this->addError('password', 'Le mot de passe doit contenir entre 8 et 20 caractères, une majuscule, une minuscule et un chiffre.');
        }
    }
    }

    public function validateRole()
    {
        
    }

    private function addError($key, $val)
    {
        $this->errors[$key] = $val;
    }
    
}