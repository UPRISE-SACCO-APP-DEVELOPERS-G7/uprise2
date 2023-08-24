<?php

namespace App\Imports;


use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use App\Models\Deposit;
use App\Models\Member;

class DepositsImport implements ToModel, WithHeadingRow
{
    public function model(array $row)
    {
        // Create a new deposit
        $deposit = new Deposit([
            'amount' => $row["amount"],
            'member_id' => $row["member_id"],
            'receipt_number' => $row["receipt_number"],
            'created_at' => $row["created_at"],
        ]);
        
        // Save the deposit
        $deposit->save();
        
        // Find the corresponding member and update their deposit balance
        $member = Member::find($row["member_id"]);
        if ($member) {
            $newDepositBalance = $member->deposit_balance + $deposit->amount;
            $member->update(['deposit_balance' => $newDepositBalance]);
        }
        
        return $deposit;
    }
}
