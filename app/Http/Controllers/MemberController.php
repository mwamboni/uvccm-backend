<?php

namespace App\Http\Controllers;

use App\Helpers\ApiResponse;
use App\Http\Requests\MemberRequest;
use App\Http\Resources\MemberResource;
use App\Models\Member;
use Illuminate\Http\Request;

class MemberController extends Controller
{
    public function getMember($memberId)
    {
        $member = Member::find($memberId);
        return ApiResponse::success(new MemberResource($member));
    }
    /**
     * Get all members
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function getMembers()
    {
        $members = Member::all();
        return ApiResponse::success(MemberResource::collection($members));
    }
    /**
     * Create a new member
     *
     * @param MemberRequest $req
     * @return \Illuminate\Http\JsonResponse
     */
    public function createMember(MemberRequest $req)
    {
        $req->validated();

        $member = Member::create([
            'branch_id' => $req->branch,
            'first_name' => $req->first_name,
            'middle_name' => $req->middle_name,
            'last_name' => $req->last_name,
            'id_card_type' => $req->id_card_type,
            'id_card' => $req->id_card,
            'phone' => $req->phone,
            'gender' => $req->gender,
            'dob' => $req->dob,
            'disability_status' => $req->disability_status,
            'disablity' => $req->disablity,
            'disability_description' => $req->disability_description,
            'employment_status' => $req->employment_status,
        ]);

        // send_otp_sms((string)$req->phone);

        return ApiResponse::success(new MemberResource($member), 'Member created successfully');
    }

    public function updateMember(MemberRequest $req, $memberId)
    {
        $req->validated();

        Member::findOrFail($memberId)->update([
            'branch_id' => $req->branch,
            'first_name' => $req->first_name,
            'middle_name' => $req->middle_name,
            'last_name' => $req->last_name,
            'id_card_type' => $req->id_card_type,
            'id_card' => $req->id_card,
            'phone' => $req->phone,
            'gender' => $req->gender,
            'dob' => $req->dob,
            'disability_status' => $req->disability_status,
            'disablity' => $req->disablity,
            'disability_description' => $req->disability_description,
            'employment_status' => $req->employment_status,
        ]);

        return ApiResponse::success([],'Member updated successfully');
    }
}
