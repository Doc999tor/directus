<?php
​
use function Directus\send_mail_with_layout;
use Directus\Mail\Message;
​
return [
    'actions' => [
        'item.create.applications' => function ($data) {

            $content = 'New message from: {{name}}. The message is {{message}}.';
​
            $replaceme = array(
                "name" => $data['first_name'] . ' ' . $data['last_name'],
                "message" => "expelliarmus"
            );

            send_mail_with_layout(
                'base.twig',
                $content,
                $replaceme,
                'text/html',
                function (Message $message) use ($data) {
                    $message->setFrom("name@example.com");
                    $message->setTo("doc999tor@gmail.com");
                    $message->setSubject("subject");
                }
            );
​
        }
    ]
];