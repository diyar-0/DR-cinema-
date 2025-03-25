    <div class="input-group w-50 ">
        <input type="text"  class="form-control input-search bg-dark border-0 rounded-3  text-light" aria-label="Text input with dropdown button" placeholder="Search...">
        <ul class="m-0 p-0 d-flex align-items-center">
            <li class="nav-item dropdown dropstart">
                <a title="Filter" class="icon-filter text-light d-flex align-items-center m-0 nav-link " href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class='bx bx-filter-alt fs-5'></i>
                </a>
                <ul class="dropdown-menu-filter dropdown-menu p-0 " onclick="event.stopPropagation()">
                    <div class="d-flex">
                        <div>
                            <!-- <li class="ps-1 fs-5"><i class='bx bx-buildings'></i> City</li> -->
                            
                            <li class="dropdown-item fs-7">
                                <label class="form-check">
                                    <input class="form-check-input" type="checkbox" name="city" value="option1">Hollywood
                                </label>
                            </li>
                            <li class="dropdown-item fs-7">
                                <label class="form-check">
                                    <input class="form-check-input" type="checkbox" name="city" value="option2">Bollywood
                                </label>
                            </li>
                            <hr>
                            <li class="dropdown-item fs-7">
                                <label class="form-check">
                                    <input class="form-check-input" type="checkbox" name="city" value="option2">Action
                                </label>
                            </li>
                            <li class="dropdown-item fs-7">
                                <label class="form-check">
                                    <input class="form-check-input" type="checkbox" name="city" value="option2">Duhok
                                </label>
                            </li>
                        </div>
                        <li class="lineY"></li>
                        <div>
                            <li class="ps-1 fs-5"><i class='bx bx-sort-alt-2'></i>Sort</li>
                            <li class="dropdown-item fs-7">
                                <label class="form-check">
                                    <input class="form-check-input" type="checkbox" name="sort" value="option1">All
                                </label>
                            </li>
                            <li class="dropdown-item fs-7">
                                <label class="form-check">
                                    <input class="form-check-input" type="checkbox" name="sort" value="option1">Cosmetic
                                </label>
                            </li>
                            <li class="dropdown-item fs-7">
                                <label class="form-check">
                                    <input class="form-check-input" type="checkbox" name="sort" value="option2">Clothes
                                </label>
                            </li>
                            <li class="dropdown-item fs-7">
                                <label class="form-check">
                                    <input class="form-check-input" type="checkbox" name="sort" value="option2">Cars
                                </label>
                            </li>
                        </div>
                    </div>
                </ul>
            </li>
        </ul>
    </div>
    <style>
        
        input::placeholder {
            color: whitesmoke !important;
            font-style: italic;
            opacity: 1;
            font-size: 14px;
        }
        .input-search{
            letter-spacing: 2px;
            height: 34px;
        }

        .lineY {
            background-color: gray;
            width: 2px;
            margin: 10px 0px;
            height: auto;
        }

        .dropdown-menu-filter {
            transform: translateY(40px) !important;
        }

        .icon-filter {
            z-index: 10;
            color: white !important;
            position: absolute;
            transform: translateY(-10px)translatex(-40px) !important;
        }
    </style>