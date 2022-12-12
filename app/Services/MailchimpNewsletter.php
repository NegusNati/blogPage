<?php

namespace App\Services;
use MailchimpMarketing\ApiClient;
use PhpParser\Node\Expr\Cast\String_;

class MailchimpNewsletter implements Newsletter
{
    public function __construct(protected ApiClient $client)
    {

    }

    public function subscribe(string $email, string $list = null)
    {
        $list ??= config('services.mailchimp.user_key');



        return $this->client->lists->addListMember($list, [
            "email_address" => $email,
            "status" => "subscribed",
        ]);
    }


}
