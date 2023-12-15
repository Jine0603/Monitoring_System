<!-- ADD EMPLOYEE MODAL -->
<div class="modal fade" id="edit_data" data-backdrop="static">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">EDIT ITEM</h5>
                                <button type="button" id="close_modal1" class="close" data-dismiss="modal"><span>&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="col-xl-6 col-lg-12">
                                    <div class="statusMsg"></div>
                                    <form>
                                        <div class="form-row">
                                            <div class="form-group col-sm-6">
                                                <label>EmployeeID</label>
                                                <input type="text" class="form-control" id="id_edit" name="id_edit" placeholder="EmployeeID" hidden>
                                                <input type="text" class="form-control" id="employeeid_edit" name="employeeid_edit" placeholder="EmployeeID">
                                            </div>
                                            <div class="form-group col-sm-6">
                                                <label>FirstName</label>
                                                <input type="text" class="form-control letters-only" id="firstname_edit" name="firstname_edit" placeholder="FirstName">
                                            </div>
                                            <div class="form-group col-sm-6">
                                                <label>LastName</label>
                                                <input type="text" class="form-control letters-only" id="lastname_edit" name="lastname_edit" placeholder="LastName">
                                            </div>
                                            <div class="form-group col-sm-6">
                                                <label for="email_edit">Email</label>
                                                <input type="email" class="form-control" id="email_edit" name="email_edit" placeholder="example@gmail.com" required>
                                            </div>
                                            <div class="form-group col-sm-6">
                                                <label>UserName</label>
                                                <input type="text" id="username_edit" name="username_edit" class="form-control" placeholder="UserName">
                                            </div>
                                            <div class="form-group col-sm-6">
                                                <label>Password</label>
                                                <input type="text" id="password_edit" name="password_edit" class="form-control" placeholder="Password">
                                            </div>
                                            <div class="form-group col-sm-6">
                                                <label>Company</label>
                                                <select id="company_edit" name="company_edit" class="form-control default-select">
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
                                                <select id="departmentid_edit" name="departmentid_edit" class="form-control default-select">
                                                    <option selected="">Select Department</option>
                                                </select>
                                            </div>
                                            <div class="form-group col-sm-6">
                                                <label>Position</label>
                                                <select id="positionid_edit" name="positionid_edit" class="form-control default-select">
                                                    <option selected="">Select Department
                                                    </option>
                                                </select>
                                            </div>
                                            <div class="form-group col-sm-6">
                                                <label>UserAccess</label>
                                                <select class="js-example-basic-multiple1" name="usertype_edit" id="usertype_edit" multiple="multiple">
                                                    <?php
                                                    $result = mysqli_query($conn, "SELECT * FROM access_tbl");
                                                    while ($row = mysqli_fetch_array($result)) {
                                                    ?>
                                                        <option class="userole_edit" value="<?php echo $row['id']; ?>">
                                                            <?php echo $row["access"]; ?></option>
                                                    <?php
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                        <br>
                                        <br>
                                        <button type="button" name="edit" class="btn btn-primary submitBtn" id="edit">Edit</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- END ADD EMPLOYEE MODAL -->