<div>
    <div class="col-12">
        <!-- New Customers -->
        <div class="card ec-cust-card card-table-border-none card-default">
            <div class="card-header justify-content-between ">
                <h2>Referal Lists</h2>
                <div>
                    <button class="text-black-50 mr-2 font-size-20">
                        <i class="mdi mdi-cached"></i>
                    </button>
                    <div class="dropdown show d-inline-block widget-dropdown">
                        <a class="dropdown-toggle icon-burger-mini" href="#" role="button" id="dropdown-customar" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-display="static">
                        </a>
                        <ul class="dropdown-menu dropdown-menu-right">
                            <li class="dropdown-item"><a href="#">Action</a></li>
                            <li class="dropdown-item"><a href="#">Another action</a></li>
                            <li class="dropdown-item"><a href="#">Something else here</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="card-body pt-0 pb-15px">
                <table class="table ">
                    <thead>
                        <th>User Name</th>
                        <th>Total Refered User</th>
                        <th>Referred Amount</th>
                    </thead>
                    <tbody>
                        @foreach ($referals as $referal)
                        <tr>
                            <td>
                                <div class="media">
                                    <div class="media-body align-self-center">
                                        <a href="profile.html">
                                            <h6 class="mt-0 text-dark font-weight-medium"></h6>
                                        </a>
                                        <small></small>
                                    </div>
                                </div>
                            </td>
                            <td></td>
                            <td class="text-dark d-none d-md-block"></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
