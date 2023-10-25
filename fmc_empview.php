<!-- ADD EMPLOYEE MODAL -->
<div class="modal fade" id="view_data">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">EDIT ITEM</h5>
                                <button type="button" id="close_modal" class="close" data-dismiss="modal"><span>&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="col-xl-6 col-lg-12">
                                    <div class="statusMsg"></div>
                                    <form>
                                        <div class="form-row">
                                            <div class="form-group col-sm-12">
                                                <label>EmployeeID</label>
                                                <input type="text" class="form-control" id="employeeid" name="employeeid" placeholder="EmployeeID">
                                            </div>
                                            <div class="form-group col-sm-6">
                                                <label>FirstName</label>
                                                <input type="text" class="form-control letters-only" id="firstname" name="firstname" placeholder="FirstName">
                                            </div>
                                            <div class="form-group col-sm-6">
                                                <label>LastName</label>
                                                <input type="text" class="form-control letters-only" id="lastname" name="lastname" placeholder="LastName">
                                            </div>
                                            <div class="form-group col-sm-6">
                                                <label>UserName</label>
                                                <input type="text" id="username" name="username" class="form-control" placeholder="UserName">
                                            </div>
                                            <div class="form-group col-sm-6">
                                                <label>Password</label>
                                                <input type="text" id="password" name="password" class="form-control" placeholder="Password">
                                            </div>
                                            <div class="form-group col-sm-6">
                                                <label>Company</label>
                                                <select id="company" name="company" class="form-control default-select">
                                                    <option value="default" selected>Select Company</option>
                                                    <?php
                                                    $result = mysqli_query($conn, "SELECT * FROM com_tbl");
                                                    while ($row = mysqli_fetch_array($result)) {
                                                    ?>
                                                        <option value="<?php echo $row['id']; ?>">
                                                            <?php echo $row["company"]; ?></option>
                                                    <?php
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                            <div class="form-group col-sm-6">
                                                <label>Department</label>
                                                <select id="departmentid" name="departmentid" class="form-control default-select">
                                                    <option selected="">Select Department</option>
                                                </select>
                                            </div>
                                            <div class="form-group col-sm-6">
                                                <label>Position</label>
                                                <select id="positionid" name="positionid" class="form-control default-select">
                                                    <option selected="">Select Department
                                                    </option>
                                                </select>
                                            </div>
                                            <div class="form-group col-sm-6">
                                                <label>UserAccess</label>
                                                <select class="js-example-basic-multiple" name="usertype" id="usertype" multiple="multiple">
                                                    <?php
                                                    $result = mysqli_query($conn, "SELECT * FROM access_tbl");
                                                    while ($row = mysqli_fetch_array($result)) {
                                                    ?>
                                                        <option class="user_role" value="<?php echo $row['id']; ?>">
                                                            <?php echo $row["access"]; ?></option>
                                                    <?php
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                        <br>
                                        <br>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- END ADD EMPLOYEE MODAL -->