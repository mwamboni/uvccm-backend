<?php

namespace App\Http\Controllers;

use App\Helpers\ApiResponse;
use App\Http\Requests\MeetingRequest;
use App\Http\Resources\MeetingMemberResource;
use App\Http\Resources\MeetingResource;
use App\Models\Meeting;
use App\Models\MeetingMember;
use Illuminate\Http\Request;

class MeetingController extends Controller
{

    public function getMeetings(Request $request)
    {
        $meetings = Meeting::orderByDesc('date')->get();
        return ApiResponse::success(MeetingResource::collection($meetings), 'Meetings fetched successfully');
    }

    public function getMeeting(Request $request, $meetingId)
    {
        $meeting = Meeting::findOrFail($meetingId);
        return ApiResponse::success(new MeetingResource($meeting), 'Meeting fetched successfully');
    }

    public function getMeetingMembers(Request $request, $meetingId)
    {
        $meetingMembers = MeetingMember::where('meeting_id', $meetingId)->get();
        return ApiResponse::success(MeetingMemberResource::collection($meetingMembers), 'Meeting members fetched successfully');
    }

    public function createMeeting(MeetingRequest $req)
    {
        $req->validated();

        $meeting = Meeting::create([
            'title' => $req->title,
            'description' => $req->description,
            'date' => $req->date,
            'time' => $req->time,
        ]);

        return ApiResponse::success(new MeetingResource($meeting), 'Meeting created successfully');
    }

    public function updateMeeting(MeetingRequest $req, $meetingId)
    {
        $req->validated();

        $meeting = Meeting::findOrFail($meetingId);

        $meeting->update([
            'title' => $req->title,
            'description' => $req->description,
            'date' => $req->date,
            'time' => $req->time,
        ]);

        return ApiResponse::success(new MeetingResource($meeting), 'Meeting updated successfully');
    }
}
