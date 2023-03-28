<?php

namespace NextDeveloper\Authentication\Database\Filters;

use Illuminate\Database\Eloquent\Builder;
use NextDeveloper\Commons\Database\Filters\AbstractQueryFilter;

/**
 * This class automatically puts where clause on database so that use can filter
 * data returned from the query.
 */
class UserQueryFilter extends AbstractQueryFilter
{
    /**
    * @var Builder
    */
    protected $builder;
    
    public function name($value)
    {
        return $this->builder->where('name', 'like', '%' . $value . '%');
    }
    
    public function surname($value)
    {
        return $this->builder->where('surname', 'like', '%' . $value . '%');
    }
    
    public function fullname($value)
    {
        return $this->builder->where('fullname', 'like', '%' . $value . '%');
    }
    
    public function email($value)
    {
        return $this->builder->where('email', 'like', '%' . $value . '%');
    }
    
    public function username($value)
    {
        return $this->builder->where('username', 'like', '%' . $value . '%');
    }
    
    public function password($value)
    {
        return $this->builder->where('password', 'like', '%' . $value . '%');
    }
    
    public function about($value)
    {
        return $this->builder->where('about', 'like', '%' . $value . '%');
    }
    
    public function nin($value)
    {
        return $this->builder->where('nin', 'like', '%' . $value . '%');
    }
    
    public function cellPhoneCode($value)
    {
        return $this->builder->where('cell_phone_code', 'like', '%' . $value . '%');
    }
    
    public function cellPhone($value)
    {
        return $this->builder->where('cell_phone', 'like', '%' . $value . '%');
    }
    
    public function defaultLocale($value)
    {
        return $this->builder->where('default_locale', 'like', '%' . $value . '%');
    }
    
    public function iamDn($value)
    {
        return $this->builder->where('iam_dn', 'like', '%' . $value . '%');
    }

    public function iamUid($value)
    {
        $operator = substr($value, 0, 1);

        if ($operator != '<' || $operator != '>') {
           $operator = '=';
        } else {
            $value = substr($value, 1);
        }

        return $this->builder->where('iam_uid', $operator, $value);
    }
    
    public function birthdayStart($date) 
    {
        return $this->builder->where( 'birthday', '>=', $date );
    }

    public function birthdayEnd($date) 
    {
        return $this->builder->where( 'birthday', '<=', $date );
    }

    public function emailVerificationDateStart($date) 
    {
        return $this->builder->where( 'email_verification_date', '>=', $date );
    }

    public function emailVerificationDateEnd($date) 
    {
        return $this->builder->where( 'email_verification_date', '<=', $date );
    }

    public function cellphoneVerificationDateStart($date) 
    {
        return $this->builder->where( 'cellphone_verification_date', '>=', $date );
    }

    public function cellphoneVerificationDateEnd($date) 
    {
        return $this->builder->where( 'cellphone_verification_date', '<=', $date );
    }

    public function ninVerificationDateStart($date) 
    {
        return $this->builder->where( 'nin_verification_date', '>=', $date );
    }

    public function ninVerificationDateEnd($date) 
    {
        return $this->builder->where( 'nin_verification_date', '<=', $date );
    }

    public function passwordLastChangedAtStart($date) 
    {
        return $this->builder->where( 'password_last_changed_at', '>=', $date );
    }

    public function passwordLastChangedAtEnd($date) 
    {
        return $this->builder->where( 'password_last_changed_at', '<=', $date );
    }

    public function passwordExpiryNotificationSentAtStart($date) 
    {
        return $this->builder->where( 'password_expiry_notification_sent_at', '>=', $date );
    }

    public function passwordExpiryNotificationSentAtEnd($date) 
    {
        return $this->builder->where( 'password_expiry_notification_sent_at', '<=', $date );
    }

    public function createdAtStart($date) 
    {
        return $this->builder->where( 'created_at', '>=', $date );
    }

    public function createdAtEnd($date) 
    {
        return $this->builder->where( 'created_at', '<=', $date );
    }

    public function updatedAtStart($date) 
    {
        return $this->builder->where( 'updated_at', '>=', $date );
    }

    public function updatedAtEnd($date) 
    {
        return $this->builder->where( 'updated_at', '<=', $date );
    }

    public function suspendedAtStart($date) 
    {
        return $this->builder->where( 'suspended_at', '>=', $date );
    }

    public function suspendedAtEnd($date) 
    {
        return $this->builder->where( 'suspended_at', '<=', $date );
    }

    public function oldId($value)
    {
        $old = Old::where('id_ref', $value)->first();

        if($old) {
            return $this->builder->where('old_id', '=', $old->id);
        }
    }

    public function countryId($value)
    {
        $country = Country::where('id_ref', $value)->first();

        if($country) {
            return $this->builder->where('country_id', '=', $country->id);
        }
    }

}
