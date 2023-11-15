
<!-- ADD EMPLOYEE MODAL -->
<div class="modal fade" id="view1">
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
                            <div class="form-group col-sm-6">
                            <label class="" style="font-size: 30px;">FirstName</label>
                            </div>
                            <div class="form-group col-sm-6">
                            <input type="text" class="form-control employeeid_view" style="background:rgba(255, 255, 255, 0.2); color:black;" readonly>
                            <input type="text" class="form-control firstname_view" style="background:rgba(255, 255, 255, 0.2); color:black;" readonly>
                            <input type="text" class="form-control lastname_view" style="background:rgba(255, 255, 255, 0.2); color:black;" readonly>
                            <input type="text" class="form-control username_view" style="background:rgba(255, 255, 255, 0.2); color:black;" readonly>
                            <input type="text" class="form-control password_view" style="background:rgba(255, 255, 255, 0.2); color:black;" readonly>
                            <input type="text" class="form-control company_view" style="background:rgba(255, 255, 255, 0.2); color:black;" readonly>
                            <input type="text" class="form-control departmentid_view" style="background:rgba(255, 255, 255, 0.2); color:black;" readonly>
                            <input type="text" class="form-control position_view" style="background:rgba(255, 255, 255, 0.2); color:black;" readonly>
                            <select class="js-example-basic-multiple2" name="usertype_view" id="usertype_view" multiple="multiple"></select>

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