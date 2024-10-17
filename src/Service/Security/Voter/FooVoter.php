<?php

namespace App\Service\Security\Voter;

use Symfony\Component\ExpressionLanguage\Expression;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Core\Authorization\Voter\CacheableVoterInterface;

class FooVoter implements CacheableVoterInterface
{
    public function supportsAttribute(string $attribute): bool
    {
        return 'ROLE_FOO' === $attribute;
    }

    public function supportsType(string $subjectType): bool
    {
        return true;
    }

    public function vote(TokenInterface $token, mixed $subject, array $attributes): int
    {
        foreach ($attributes as $attribute) {
            if ($attribute instanceof Expression) {
                // Unexpected call and can't be caught/filtered with supports...
                continue;
            }

            return self::ACCESS_GRANTED;
        }

        return self::ACCESS_ABSTAIN;
    }
}
