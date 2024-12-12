<?php

namespace App\DTO;

use Symfony\Component\Validator\Constraints as Assert;

class ContactDTO
{
    #[Assert\NotBlank(message: 'This value should not be blank')]
    #[Assert\Length(min: 3, max: 200, minMessage: 'This value should be at least {{ limit }} characters long', maxMessage: 'This value should be at most {{ limit }} characters long')]
    public string $name = '';

    #[Assert\NotBlank(message: 'This value should not be blank')]
    #[Assert\Email(message: 'This value is not a valid email address')]
    public string $email = '';

    #[Assert\NotBlank(message: 'This value should not be blank')]
    #[Assert\Length(min: 10, minMessage: 'This value should be at least {{ limit }} characters long')]
    public string $message = '';
    
}