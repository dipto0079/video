<?php

namespace Stripe;

/**
 * Class Recipient
 *
 * @property string $id
 * @property string $object
 * @property \Stripe\BankAccount|null $active_account
 * @property \Stripe\Collection|null $cards
 * @property int $created
 * @property string|\Stripe\Card|null $default_card
 * @property string|null $description
 * @property string|null $email
 * @property bool $livemode
 * @property \Stripe\StripeObject $metadata
 * @property string|\Stripe\Account|null $migrated_to
 * @property string|null $name
 * @property string|\Stripe\Account $rolled_back_from
 * @property string $type
 * @property bool $verified
 *
 * @package Stripe
 */
class Recipient extends ApiResource
{
    const OBJECT_NAME = 'recipient';

    use ApiOperations\All;
    use ApiOperations\Create;
    use ApiOperations\Delete;
    use ApiOperations\Retrieve;
    use ApiOperations\Update;
}
