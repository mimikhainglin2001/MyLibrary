<?php
require_once __DIR__ .'/BaseModel.php';
class PremiumUser extends UserModel
{
    public $subscription_date;
    public $premium_features_enabled = true;
    public function getUserType()
    {
        return 'Premium User';
    }
}
?>