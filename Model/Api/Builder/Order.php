<?php

/**
 * Copyright © 2021 SeQura Engineering. All rights reserved.
 */

namespace Sequra\MagestoreRewardpoints\Model\Api\Builder;

class Order extends \Sequra\Core\Model\Api\Builder\Order
{
    public function extraItems()
    {
        $items = parent::extraItems();
        $discount = round(-100 * $this->order->getRewardpointsBaseDiscount());
        if ($discount < 0) {
            $items[] = [
                'type' => 'other_payment',
                'reference' => 'rewardpoints',
                'name' => $this->order->getRewardpointsSpent() . ' reward points spent',
                'total_with_tax' => $discount,
            ];
        }
        return $items;
    }
}
