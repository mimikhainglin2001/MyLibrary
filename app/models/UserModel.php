<?php

class UserModel
{
    private $name;
    private $email;
    private $password;
    //private $profile_image;
    private $is_confirmed;
    private $is_active;
    private $is_login;
    private $token;
    private $date;

    // New fields
    private $rollno;
    private $gender;
    private $year;
    private $role_id;

    private $otp;
    private $otp_expiry;

    public function setName($name)
    {
        $this->name = $name;
    }
    public function getName()
    {
        return $this->name;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }
    public function getEmail()
    {
        return $this->email;
    }

    public function setPassword($password)
    {
        $this->password = $password;
    }
    public function getPassword()
    {
        return $this->password;
    }

    // Uncomment if needed
    // public function setProfileImage($profile_image)
    // {
    //     $this->profile_image = $profile_image;
    // }
    // public function getProfileImage()
    // {
    //     return $this->profile_image;
    // }

    public function setIsConfirmed($is_confirmed)
    {
        $this->is_confirmed = $is_confirmed;
    }
    public function getIsConfirmed()
    {
        return $this->is_confirmed;
    }

    public function setIsActive($is_active)
    {
        $this->is_active = $is_active;
    }
    public function getIsActive()
    {
        return $this->is_active;
    }

    public function setIsLogin($is_login)
    {
        $this->is_login = $is_login;
    }
    public function getIsLogin()
    {
        return $this->is_login;
    }

    public function setToken($token)
    {
        $this->token = $token;
    }
    public function getToken()
    {
        return $this->token;
    }

    public function setDate($date)
    {
        $this->date = $date;
    }
    public function getDate()
    {
        return $this->date;
    }

    // ✅ NEW: rollno
    public function setRollno($rollno)
    {
        $this->rollno = $rollno;
    }
    public function getRollno()
    {
        return $this->rollno;
    }

    // ✅ NEW: gender
    public function setGender($gender)
    {
        $this->gender = $gender;
    }
    public function getGender()
    {
        return $this->gender;
    }

    // ✅ NEW: year
    public function setYear($year)
    {
        $this->year = $year;
    }
    public function getYear()
    {
        return $this->year;
    }
    public function setrole_id($role_id)
    {
        $this->role_id = $role_id;
    }
 
    public function getrole_id()
    {
        return $this->role_id;
    }

        public function setotp($otp)
    {
        $this->otp = $otp;
    }
 
    public function getotp()
    {
        return $this->otp;
    }

        public function setotp_expiry($otp_expiry)
    {
        $this->otp_expiry = $otp_expiry;
    }
 
    public function getotp_expiry()
    {
        return $this->otp_expiry;
    }


    public function toArray() {
        return [
            "name" => $this->getName(),
            "email" => $this->getEmail(),
            "password" => $this->getPassword(),
            //"profile_image" => $this->getProfileImage(),
            "is_confirmed" => $this->getIsConfirmed(),
            "is_active" => $this->getIsActive(),
            "is_login" => $this->getIsLogin(),
            "token" => $this->getToken(),
            "date" => $this->getDate(),
            "rollno" => $this->getRollno(),
            "gender" => $this->getGender(),
            "year" => $this->getYear(),
            "role_id" => $this->getrole_id(),
            "otp" => $this->getotp(),
            "otp_expiry" => $this->getotp_expiry()
        ];
    }
    

    // // If profile_image is needed in toArray, implement these methods:
    // public function setProfileImage($profile_image)
    // {
    //     $this->profile_image = $profile_image;
    // }
    // public function getProfileImage()
    // {
    //     return $this->profile_image;
    // }
}
