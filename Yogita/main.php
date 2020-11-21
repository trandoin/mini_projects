 <div class="container">

            <div class="tab tab-1">
                <h2 style="font-weight: bold;margin-top: 10px;margin-left: 20px;">Student's Attendance Sheet</h2>
            	<div class="card-body">
            	<label>Sr.No
                <input class="form-control" type="number" name="fname" id="fname" required="">
                </label>
                <label>Date:
                <input class="form-control" type="date" name="lname" id="lname" required="">
                </label>
                <label>Student's Name
                <input class="form-control" type="text" name="age" id="age" required="">
                </label>
                <label>Roll No.:
                <input class="form-control" type="number" name="RollNo" id="roll" required="">
                </label>
                <label>Branch:
                <input class="form-control" type="text" name="Branch" id="branch" required="">
                </label>
                <label>Company Name:
                <input class="form-control" type="text" name="CName" id="cname" required="">
                </label>
                <button class="btn btn-success" onclick="addHtmlTableRow();">Add</button>
                <button class="btn btn-secondary" onclick="editHtmlTbleSelectedRow();">Edit</button>
                <button class="btn btn-danger" onclick="removeSelectedRow();">Remove</button>
            </div>
            </div>
             
            <div class="container">
             <div class="tab tab-1">
                <table id="table" border="1" cellpadding="8" cellspacing="0" style="width: 100%;">
                    <tr>
                        <th>Sr.No.</th>
                        <th>Date</th>
                        <th>Student's Name</th>
                        <th>Roll No.</th>
                        <th>Branch</th>
                        <th>Company Name</th>
                    </tr> 
                </table>
                 <button style="float: right;margin-top: 10px;" class="btn btn-primary" type="Submit" name="Submit">Submit</button>
            </div>
        </div>