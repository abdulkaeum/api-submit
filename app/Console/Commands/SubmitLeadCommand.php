<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Request;

class SubmitLeadCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'lead:submit';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Submit a lead';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $response = Http::acceptJson()
            ->post(config('services.supadata.endpoint'), $this->lead())
            ->ok();

        return $this->info($response);
    }

    protected function lead(): array
    {
        return [
            "aff_id" => config('services.supadata.id'),
            "aff_password" => config('services.supadata.password'),
            "sub_id" => "123789",
            "referring_website" => "www.some-loan-company.co.uk",
            "loan_amount" => 1000,
            "loan_purpose" => "other",
            "loan_term" => 12,
            "guarantor" => "no",
            "title" => "mr",
            "first_name" => "KaeumTest",
            //"middle_name" => "KaeumTest",
            "last_name" => "KaeumTest",
            "gender" => "male",
            "date_of_birth" => "30-11-1999",
            "marital_status" => "single",
            "number_of_dependents" => 0,
            "house_number" => 2,
            //"house_name" => "clifford house",
            //"flat_number" => 2,
            "street_name" => "clifford avenue",
            "city" => "Nurse",
            "county" => "greater manchester",
            "post_code" => "m3 2hw",
            "residential_status" => "private_tenant",
            "address_move_in_date" => "08-03-2016",
            "mobile_number" => "07824516323",
            "home_number" => "01611234567",
            "work_number" => "01617654321",
            //"mobile_phone_type" => "contract",
            "email_address" => "test@mediablanket.co.uk",
            "employment_status" => "full_time",
            "payment_frequency" => "last_working_day",
            "payment_method" => "uk_direct_deposit",
            "monthly_income" => 3000,
            "next_pay_date" => "25-05-2022",
            "following_pay_date" => "24-06-2022",
            "job_title" => "webmaster",
            "employer_name" => "mediablanket",
            "employer_industry" => "health",
            "employment_start_date" => "03-01-2017",
            "expenditure_housing" => 500,
            "expenditure_credit" => 20,
            "expenditure_transport" => 5,
            "expenditure_food" => 50,
            "expenditure_utilities" => 100,
            "expenditure_other" => 5,
            "bank_name" => "rbs",
            "bank_account_number" => "12345678",
            "bank_sort_code" => "12-34-56",
            "bank_card_type" => "visa_debit",
            "consent_email_sms" => true,
            "consent_email" => true,
            "consent_sms" => true,
            "consent_call" => true,
            "consent_credit_search" => true,
            "consent_financial" => true,
            "user_agent" => Request::header('user-agent'),
            "ip_address" => Request::ip()
        ];
    }
}
