<?php

namespace Database\Seeders;

use App\Enums\TicketTypeStatusEnum;
use App\Models\TicketType;
use Illuminate\Database\Seeder;

class TicketTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $types = [
            [
                'type' => 'Technical Issues',
                'database_name' => 'technical_issues',
            ],
            [
                'type' => 'Account & Billing',
                'database_name' => 'account_billing',
            ],
            [
                'type' => 'Product & Service',
                'database_name' => 'product_service',
            ],
            [
                'type' => 'General Inquiry',
                'database_name' => 'general_enquiry',
            ],
            [
                'type' => 'Feedback & Suggestions',
                'database_name' => 'feedback_suggestions',
            ],
        ];

        foreach ($types as $type) {
            $type['migration_status'] = TicketTypeStatusEnum::Started;
            TicketType::insert($type);
        }

    }
}
