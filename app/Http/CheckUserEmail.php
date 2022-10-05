<?php

declare(strict_types=1);

namespace App\Http;

use Illuminate\Support\Facades\Log;

class CheckUserEmail
{
    /**
     * @param string $email
     * @param array $usersDataValid
     * @param string $columnForSearch
     * @return bool
     */
    public function check(string $email, array $usersDataValid, string $columnForSearch): bool
    {
        $result = false;

        $emails = array_column($usersDataValid, $columnForSearch);
        $found_key = array_search($email, $emails);
        if($found_key !== false){
            $result = true;
            Log::channel('my_log')->info('User with "' . $email .  '" - True.');
        } else {
            Log::channel('my_log')->error('User with "' . $email .  '" - False.');
        }

        return $result;
    }

}
