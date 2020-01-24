<div class="modal fade" id="updateModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="exampleModalLabel">Update Status</h3>
            </div>
            <div class="modal-body">
                <form action="index.php?c=Employee&a=updateStatus" id="updateStatusForm" method="post">
                    <input type="hidden" id="empID" name="empID">
                    <div class="row status-type-div">
                        <div class="col-6">
                            <label><input type="radio" class="option-input radio status-type-radio" value="leave" name="status-type"/>Leave</label>
                        </div>
                        <div class="col-6">
                            <label><input type="radio" class="option-input radio status-type-radio" value="out_of_office" name="status-type" />Out of Office</label>
                        </div>
                    </div>
                    <div class="row leave-type-div">
                        <div class="col-6">
                            <label><input type="radio" class="option-input radio status-type-radio" value="sick_leave" name="leave-type" />Sick Leave</label>
                        </div>
                        <div class="col-6">
                            <label><input type="radio" class="option-input radio status-type-radio" value="annual_leave" name="leave-type" />Annual Leave</label>
                        </div>
                    </div>
                    <div class="row out-type-div">
                        <div class="col-6">
                            <label><input type="radio" class="option-input radio status-type-radio" value="training" name="out-type" />Training</label>
                        </div>
                        <div class="col-6">
                            <label><input type="radio" class="option-input radio status-type-radio" value="airbus_office" name="out-type" />Airbus Office</label>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary" id="saveBtn">Save</button>
            </div>
        </div>
  </div>
</div>