<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\OrganizationMeta;
use Illuminate\Support\Facades\Validator;
use Exception;
use Illuminate\Support\Facades\DB;

class OrganizationMetaController extends Controller
{

    public function update(Request $request, OrganizationMeta $organizationMeta)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'nullable|email',
            'legal_name' => 'nullable|string',
            'bank_statement' => 'nullable|string',
            'org_phone' => 'nullable|string',
            'org_address' => 'nullable|string',
            'org_address_2' => 'nullable|string',
            'mailing_address' => 'nullable|string',
            'tax_id' => 'nullable|string',
            'statement_descriptor' => 'nullable|string',
            'twilio_phone_number' => 'nullable|string',
            'forward_to_number' => 'nullable|string',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => 'Validation failed.', 'messages' => $validator->errors()], 422);
        }

        try {
            DB::beginTransaction();

            $organizationMeta->updateOrCreate(
                ['id' => $organizationMeta->id],
                $request->all()
            );

            DB::commit();

            return response()->json(['organization_meta' => $organizationMeta], 200);
        } catch (Exception $e) {
            DB::rollBack();

            return response()->json(['error' => 'Failed to update.', 'message' => $e->getMessage()], 500);
        }
    }
}
