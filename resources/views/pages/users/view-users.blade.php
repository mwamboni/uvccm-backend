@extends('temp.app')
@section('contents')

<section id="content" class="content">
    <div class="content__header content__boxed overlapping">
       <div class="content__wrap">
          <h1 class="page-title mb-0 mt-2">All Users</h1>
          <div class="d-md-flex align-items-baseline mt-3">
             <button type="button" class="btn btn-info hstack gap-2 mb-3">
                <i class="demo-psi-add fs-4"></i>
                <span class="vr"></span>
                Add new user
             </button>

             <div class="d-flex align-items-center gap-1 text-nowrap ms-auto mb-3">
                <span class="d-none d-md-inline-block me-2">Sort by : </span>
                <select class="d-inline-block w-auto form-select">
                   <option value="date-created" selected="">Date Created</option>
                   <option value="date-modified">Date Modified</option>
                   <option value="frequency-used">Frequency Used</option>
                   <option value="alpabetically">Alpabetically</option>
                   <option value="alpabetically-reversed">Alpabetically Reversed</option>
                </select>

                <button type="button" class="btn btn-light">Filter</button>
                <button type="button" class="btn btn-light btn-icon">
                   <i class="demo-pli-gear fs-5"></i>
                </button>
             </div>
          </div>
       </div>

    </div>


    <div class="content__boxed">
       <div class="content__wrap">
          <div class="row">
             <div class="col-sm-6 col-md-4 col-xl-3 mb-3">
                <div class="card hv-grow">
                   <div class="card-body hv-outline-parent">


                      <!-- Profile picture and short information -->
                      <div class="d-flex align-items-center position-relative pb-3">
                         <div class="flex-shrink-0">
                            <img class="hv-oc img-md rounded-circle" src="../../assets/img/profile-photos/3.png" alt="Profile Picture" loading="lazy">
                         </div>
                         <div class="flex-grow-1 ms-3">
                            <a href="#" class="h5 stretched-link btn-link">Stephen Tran</a>
                            <p class="text-body-secondary m-0">Marketing manager</p>
                         </div>
                      </div>

                      <div class="mt-3 pt-2 text-center border-top">
                         <div class="d-flex justify-content-center gap-3">
                            <a href="#" class="btn btn-sm btn-hover btn-outline-light">
                               <i class="d-block demo-pli-consulting fs-3 mb-2"></i> View
                            </a>
                            <a href="#" class="btn btn-sm btn-hover btn-outline-light">
                                <i class="d-block demo-pli-pen-5 fs-3 mb-2"></i> Edit
                             </a>
                         </div>
                      </div>
                   </div>
                </div>
             </div>
          </div>
       </div>
    </div>
 </section>

@endsection
