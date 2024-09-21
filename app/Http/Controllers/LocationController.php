<?php

namespace App\Http\Controllers;

use App\Helpers\ApiResponse;
use App\Http\Requests\BranchRequest;
use App\Http\Requests\DistrictRequest;
use App\Http\Requests\RegionRequest;
use App\Http\Requests\StateRequest;
use App\Http\Requests\WardRequest;
use App\Http\Resources\BranchResource;
use App\Http\Resources\DistrictResource;
use App\Http\Resources\RegionResource;
use App\Http\Resources\StateResource;
use App\Http\Resources\WardResource;
use App\Models\Branch;
use App\Models\District;
use App\Models\Region;
use App\Models\State;
use App\Models\Ward;
use Illuminate\Http\Request;

class LocationController extends Controller
{
    /**
     * Get a region
     *
     * @param int $regionId Region ID to fetch
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function getRegion($regionId)
    {
        $region = Region::findOrFail($regionId);
        return ApiResponse::success(new RegionResource($region), 'Region fetched successfully');
    }

    /**
     * Get all regions
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function getRegions()
    {
        $regions = Region::get();
        return ApiResponse::success(RegionResource::collection($regions), 'Regions fetched successfully');
    }

    /**
     * Create a new region
     *
     * @param RegionRequest $req Validated region details
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function createRegion(RegionRequest $req)
    {
        $req->validated();

        $region = Region::create(['name' => $req->name]);

        return ApiResponse::success(new RegionResource($region), 'Region created successfully');
    }

    /**
     * Update a region
     *
     * @param RegionRequest $req Validated region details
     * @param int $regionId Region ID to update
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function updateRegion(RegionRequest $req, $regionId)
    {
        $req->validated();

        Region::findOrFail($regionId)->update(['name' => $req->name]);

        return ApiResponse::success('Region updated successfully');
    }


    /**
     * Get a district by its ID
     *
     * @param int $districtId District ID to fetch
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function getDistrict($districtId)
    {
        $district = District::findOrFail($districtId);
        return ApiResponse::success(new DistrictResource($district), 'District fetched successfully');
    }

    /**
     * Get all districts
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function getDistricts()
    {
        $districts = District::get();
        return ApiResponse::success(DistrictResource::collection($districts), 'Districts fetched successfully');
    }

    /**
     * Create a new district
     *
     * @param DistrictRequest $req
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function createDistrict(DistrictRequest $req)
    {
        $req->validated();

        $region = District::create(['name' => $req->name, 'region_id' => $req->region]);

        return ApiResponse::success(new DistrictResource($region), 'District created successfully');
    }

    /**
     * Update a district
     *
     * @param DistrictRequest $req Validated district details
     * @param int $districtId District ID to update
     *
     * @return JsonResponse
     */
    public function updateDistrict(DistrictRequest $req, $districtId)
    {
        $req->validated();

        District::findOrFail($districtId)->update(['name' => $req->name, 'region_id' => $req->region]);

        return ApiResponse::success('District updated successfully');
    }



    /**
     * Get a state
     *
     * @param int $stateId
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function getState($stateId)
    {
        $state = State::findOrFail($stateId);
        return ApiResponse::success(new StateResource($state), 'State fetched successfully');
    }

    /**
     * Get all states
     *
     * @return JsonResponse
     */
    public function getStates()
    {
        $states = State::get();
        return ApiResponse::success(StateResource::collection($states), 'State fetched successfully');
    }

    /**
     * Create a state
     *
     * @param StateRequest $req Validated state details
     *
     * @return JsonResponse
     */
    public function createState(StateRequest $req)
    {
        $req->validated();

        $state = State::create(['name' => $req->name, 'district_id' => $req->district]);

        return ApiResponse::success(new StateResource($state), 'State created successfully');
    }


    /**
     * Update a state
     *
     * @param \App\Http\Requests\StateRequest $req
     * @param int $stateId
     *
     * @return \Illuminate\Http\Response
     */
    public function updateState(StateRequest $req, $stateId)
    {
        $req->validated();

        State::findOrFail($stateId)->update(['name' => $req->name, 'district_id' => $req->district]);

        return ApiResponse::success('State updated successfully');
    }

    /**
     * Get a ward
     *
     * @param int $wardId
     *
     * @return JsonResponse
     */
    public function getWard($wardId)
    {
        $ward = Ward::findOrFail($wardId);
        return ApiResponse::success(new Ward($ward), 'Ward fetched successfully');
    }

    /**
     * Get all wards
     *
     * @return JsonResponse
     */
    public function getWards()
    {
        $wards = Ward::get();
        return ApiResponse::success(WardResource::collection($wards), 'Wards fetched successfully');
    }

    /**
     * Create a ward
     *
     * @param \App\Http\Requests\WardRequest $req
     *
     * @return \Illuminate\Http\Response
     */
    public function createWard(WardRequest $req)
    {
        $req->validated();

        $ward = Ward::create(['name' => $req->name, 'state_id' => $req->state]);

        return ApiResponse::success(new WardResource($ward), 'Ward created successfully');
    }

    /**
     * Update a ward
     *
     * @param \App\Http\Requests\WardRequest $req
     * @param int $wardId
     *
     * @return \Illuminate\Http\Response
     */
    public function updateWard(WardRequest $req, $wardId)
    {
        $req->validated();

        Ward::findOrFail($wardId)->update(['name' => $req->name, 'state_id' => $req->state]);

        return ApiResponse::success('Ward updated successfully');
    }

    /**
     * Get a branch
     *
     * @param int $branchId
     *
     * @return \Illuminate\Http\Response
     */
    public function getBranch($branchId)
    {
        $branch = Branch::findOrFail($branchId);
        return ApiResponse::success(new BranchResource($branch), 'Branch fetched successfully');
    }


    /**
     * Get all branches
     *
     * @return \Illuminate\Http\Response
     */
    public function getBranches()
    {
        $branches = Branch::get();
        return ApiResponse::success(BranchResource::collection($branches), 'Branches fetched successfully');
    }

    /**
     * Create a new branch
     *
     * @param \App\Http\Requests\BranchRequest $req
     *
     * @return \Illuminate\Http\Response
     */
    public function createBranch(BranchRequest $req)
    {
        $req->validated();

        $branch = Branch::create(['name' => $req->name, 'ward_id' => $req->ward]);

        return ApiResponse::success(new BranchResource($branch), 'Branch created successfully');
    }

    /**
     * Update a branch
     *
     * @param \App\Http\Requests\BranchRequest $req
     * @param int $branchId
     *
     * @return \Illuminate\Http\Response
     */
    public function updateBranch(BranchRequest $req, $branchId)
    {
        $req->validated();

        Branch::findOrFail($branchId)->update(['name' => $req->name, 'ward_id' => $req->ward]);

        return ApiResponse::success('Branch updated successfully');
    }
}
